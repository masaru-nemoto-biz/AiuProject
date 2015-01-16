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
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    
    /*
     * 事故状況登録/変更画面へ
     */
    function index() {
        
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['acc_list'] = $this->contractInfo_model->get_accident_data($this->session->userdata('contract_id'));
        $data['accident_status_mst'] = $this->master_model->accident_status_mst();
        $data['acc_count'] = $this->accident_model->count_accident_info($this->session->userdata('contract_id'));
        
        if (!empty($data['acc_list'])) {
            
            $data['acc_detail_list'] = $this->accident_model->get_accident_detail_contract_id($this->session->userdata('contract_id'));
            
            $this->session->set_userdata('acc_detail_list', $data['acc_detail_list']);
            $this->session->set_userdata('acc_list', $data['acc_list']);
            $this->session->set_userdata('acc_count', $data['acc_count']);
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
        
        if ($data['move'] == '戻る') {
            redirect('contractinfolist/index');
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
        
        // 既存事故情報変更
        // TODO 出来ればindexのsession情報を利用したい。
        //$data['acc_list'] = $this->session->userdata('acc_list');
        $data['acc_list'] = $this->contractInfo_model->get_accident_data($this->session->userdata('contract_id'));
        foreach ($data['acc_list'] as $row) {
            $this->conform_Prepare($row->acc_id);
            $this->accident_model->set_accident_data($row->acc_id, $this->array);
        }
        
        // 事故情報追加
        $acc_id_new = $this->input->post('acc_id_new');
        if (!empty($acc_id_new)) {
            $this->conform_Prepare_new();
            $this->accident_model->insert_accident_data($this->array_new);
        }
         
        // 既存事故詳細変更
        // TODO 出来ればindexのsession情報を利用したい。
        $data['acc_detail_list'] = $this->accident_model->get_accident_detail_contract_id($this->session->userdata('contract_id'));
        if (!empty($data['acc_detail_list'])) {
            foreach ($this->session->userdata('acc_detail_list') as $row) {
                $this->conform_Prepare_status_quo($row->acc_status_id);
                $this->accident_model->set_accident_detail($row->acc_status_id, $this->array2);
            }
        }

        
        // 事故詳細追加
        foreach ($data['acc_list'] as $row) {
            $status_quo_new = $this->input->post('status_quo_new' . $row->acc_id);
            if (!empty($status_quo_new)){
                $this->conform_Prepare_status_quo_new($row->acc_id);
                $this->accident_model->insert_accident_detail($this->array3);
            }
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
}
?>
