<?php
class AccidentConform extends CI_Controller {

    var $array;  // 契約情報
    
    function AccidentConform() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('accident_model');
        $this->load->model('master_model');
        $this->load->model('history_model');
        $this->load->model('documentinfo_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    
    /*
     * 事故進捗状況
     */
    function index() {
        
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['acc_list'] = $this->contractInfo_model->get_accident_data($this->session->userdata('contract_id'));
        $data['accident_status_mst'] = $this->master_model->accident_status_mst();
        
        if (!empty($data['acc_list'])) {
            
            $data['acc_detail_list'] = $this->accident_model->get_accident_detail_contract_id($this->session->userdata('contract_id'));
            
            $this->session->set_userdata('acc_detail_list', $data['acc_detail_list']);
            $this->session->set_userdata('acc_list', $data['acc_list']);
        } else {
            $this->session->unset_userdata('acc_detail_list');
            $this->session->unset_userdata('acc_list');
        }
        
        $this->load->view('accident_conform_view', $data);
    }
    
    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function contractInfoList_conform() {

        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == 'main menu') {
            redirect('main/index');
            
        } elseif ($data['move'] == '契約状況一覧') {
            // メインメニューから来た場合、company_idをsessionに持っていない為、ここでcontract_idから逆引きしてセット        
            $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'))->row(0);
            $this->session->set_userdata('company_id', $data['company_id']->company_id);
            
            redirect('contractinfolist/index');
            
        } elseif ($data['move'] == '契約者書類') {
            $this->customer_document();
            
        } elseif ($data['move'] == '登録') {
            $this->conform_add();
        } else {
            $this->index();
        }
    }
    
    /*
     * 事故状況追加ロジック
     */
    function conform_add() {
        
        $data['company_data'] = $this->corpstatus_model->get_company_data($this->session->userdata('company_id'))->row(0);
        $corp_name = $data['company_data']->corp_name;
        
        // 既存事故情報変更
        // TODO 出来ればindexのsession情報を利用したい。
        //$data['acc_list'] = $this->session->userdata('acc_list');
        $data['acc_list'] = $this->contractInfo_model->get_accident_data($this->session->userdata('contract_id'));
        foreach ($data['acc_list'] as $row) {
            $this->conform_Prepare($row->acc_id);
            $this->accident_model->set_accident_data($row->acc_id, $this->array);
            $this->history_model->insert_history('事故情報が更新されました', $this->session->userdata('user'), $corp_name);
        }
        
        // 事故情報追加
        $acc_id_new = $this->input->post('acc_id_new');
        if (!empty($acc_id_new)) {
            $this->conform_Prepare_new();
            $this->accident_model->insert_accident_data($this->array_new);
            $this->history_model->insert_history('事故情報が追加されました', $this->session->userdata('user'), $corp_name);
        }
         
        // 既存事故詳細変更
        // TODO 出来ればindexのsession情報を利用したい。
        $data['acc_detail_list'] = $this->accident_model->get_accident_detail_contract_id($this->session->userdata('contract_id'));
        if (!empty($data['acc_detail_list'])) {
            foreach ($this->session->userdata('acc_detail_list') as $row) {
                $this->conform_Prepare_status_quo($row->acc_status_id);
                $this->accident_model->set_accident_detail($row->acc_status_id, $this->array2);
            }
            $this->history_model->insert_history('事故状況が更新されました', $this->session->userdata('user'), $corp_name);
        }

        
        // 事故詳細追加
        foreach ($data['acc_list'] as $row) {
            $status_quo_new = $this->input->post('status_quo_new' . $row->acc_id);
            if (!empty($status_quo_new)){
                $this->conform_Prepare_status_quo_new($row->acc_id);
                $this->accident_model->insert_accident_detail($this->array3);
            }
           $this->history_model->insert_history('事故状況が更新されました', $this->session->userdata('user'), $corp_name);
        }
        
        $this->index();
    }
    
    /*
     * 事故状況登録準備ロジック
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare($acc_id) {
        
        $this->array = array('acc_id' => $this->input->post('acc_id' .$acc_id),
            'contract_id' => $this->session->userdata('contract_id'),
            'company_id' => $this->session->userdata('company_id'),
            'acc_contents' => $this->input->post('acc_contents' .$acc_id),
            'occurrence_date' => $this->input->post('occurrence_date' .$acc_id),
            'sonsa' => $this->input->post('sonsa' .$acc_id),
            'acc_phone' => $this->input->post('acc_phone' .$acc_id),
            'sonsa_mail' => $this->input->post('sonsa_mail' .$acc_id),
            'payment' => $this->input->post('payment' .$acc_id),
            'acc_status_id' => $this->input->post('acc_status_id' .$acc_id));

    }
    
    /*
     * 事故状況登録準備ロジック new
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_new() {
        
        $this->array_new = array('acc_id' => $this->input->post('acc_id_new'),
            'contract_id' => $this->session->userdata('contract_id'),
            'company_id' => $this->session->userdata('company_id'),
            'acc_contents' => $this->input->post('acc_contents_new'),
            'occurrence_date' => $this->input->post('occurrence_date_new'),
            'sonsa' => $this->input->post('sonsa_new'),
            'acc_phone' => $this->input->post('acc_phone_new'),
            'sonsa_mail' => $this->input->post('sonsa_mail_new'),
            'payment' => $this->input->post('payment_new'),
            'acc_status_id' => $this->input->post('acc_status_id_new'));

    }
    /*
     * 事故状況登録準備ロジック２
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo($acc_status_id) {

        $this->array2 = array('contract_id' => $this->session->userdata('contract_id'),
            'acc_status_id' => $acc_status_id,
            'status_quo' => $this->input->post('status_quo' . $acc_status_id),
            'upd_date' => $this->input->post('upd_date' . $acc_status_id),
            'upd_user' => $this->input->post('upd_user' . $acc_status_id));
    }

    /*
     * 事故状況登録準備ロジック３
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo_new($acc_id) {

        $this->array3 = array('acc_id' => $acc_id,
            'contract_id' => $this->session->userdata('contract_id'),
            'status_quo' => $this->input->post('status_quo_new' . $acc_id),
            'upd_date' => $this->input->post('upd_date_new' . $acc_id),
            'upd_user' => $this->input->post('upd_user_new' . $acc_id));
    }
    
    /*
     * 契約者書類画面へ
     */
    function customer_document() {

        $company_id = $this->session->userdata('company_id');
        $data['list1'] = $this->corpstatus_model->get_company_detail($company_id);
        $data['doclist'] = $this->documentinfo_model->get_document_company($company_id, '1');
        $data['doclist2'] = $this->documentinfo_model->get_document_company($company_id, '2');
        $data['doclist3'] = $this->documentinfo_model->get_document_company($company_id, '3');
        $data['doclist4'] = $this->documentinfo_model->get_document_company($company_id, '4');
        $this->load->view('customer_ref_view', $data);
    }
}
?>
