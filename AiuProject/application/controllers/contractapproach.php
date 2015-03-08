<?php
class ContractApproach extends CI_Controller {

    var $array;  // 契約情報
    
    function ContractApproach() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('accident_model');
        $this->load->model('master_model');
        $this->load->model('history_model');
        $this->load->model('approachinfo_model');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    
    /*
     * アプローチ状況
     */
    function index() {
        
        $data['approach_list'] = $this->approachinfo_model->get_approach_info($this->session->userdata('contract_id'));
        $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'));
        foreach ($data['company_id'] as $row) {
                $this->session->set_userdata('company_id', $row->company_id);
        }
        $data['list1'] = $this->corpstatus_model->get_company_detail($this->session->userdata('company_id'));
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $this->session->set_userdata('approach_list', $data['approach_list']);
        
        $this->load->view('contract_approach_view', $data);
    }
    
    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function approach_conform() {

        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == '戻る') {
            // メインメニューから来た場合、company_idをsessionに持っていない為、ここでcontract_idから逆引きしてセット        
            $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'));
            foreach ($data['company_id'] as $row) {
                $this->session->set_userdata('company_id', $row->company_id);
            }
            redirect('contractinfolist/index');
        } elseif ($data['move'] == '登録') {
            $this->conform_add();
        } else {
            $this->index();
        }
    }
    
    /*
     * アプローチ状況追加ロジック
     */
    function conform_add() {

        $data['company_data'] = $this->corpstatus_model->get_company_data($this->session->userdata('company_id'))->row(0);
        $corp_name = $data['company_data']->corp_name;
        
        // 既存アプローチ状況変更
        // TODO 出来ればindexのsession情報を利用したい。
        $data['approach_list'] = $this->approachinfo_model->get_approach_info($this->session->userdata('contract_id'));
        if (!empty($data['approach_list'])) {
            foreach ($this->session->userdata('approach_list') as $row) {
                $this->conform_Prepare_status_quo($row->approach_id);
                $this->approachinfo_model->set_approach_info($row->approach_id, $this->array2);
            }
            $this->history_model->insert_history('アプローチ状況が更新されました', $this->session->userdata('user'), $corp_name);
        }

        
        // アプローチ状況追加
        $approach_content_new = $this->input->post('approach_content_new');
        if (!empty($approach_content_new)){
            $this->conform_Prepare_status_quo_new();
            $this->approachinfo_model->insert_approach_info($this->array3);
        }
        $this->history_model->insert_history('アプローチ状況が更新されました', $this->session->userdata('user'), $corp_name);
        
        $this->index();
    }
    
    /*
     * 事故状況登録準備ロジック２
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo($approach_id) {

        $this->array2 = array('contract_id' => $this->session->userdata('contract_id'),
            'approach_id' => $approach_id,
            'approach_content' => $this->input->post('approach_content' . $approach_id),
            'upd_date' => $this->input->post('upd_date' . $approach_id),
            'upd_user' => $this->input->post('upd_user' . $approach_id));
    }

    /*
     * 事故状況登録準備ロジック３
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo_new() {

        $this->array3 = array('contract_id' => $this->session->userdata('contract_id'),
            'approach_content' => $this->input->post('approach_content_new'),
            'upd_date' => $this->input->post('upd_date_new'),
            'upd_user' => $this->input->post('upd_user_new'));
    }
}
?>
