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
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    /*
     * 事故状況追加ロジック
     */
    function conform_add() {
        
        $this->conform_Prepare();
        
        $this->accident_model->insert_accident_data($this->array);
        
        redirect('contractinfolist/index');
    }
    
    /*
     * 事故状況登録準備ロジック
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $this->array = array('contract_id' => $this->session->userdata('contract_id'),
            'company_id' => $this->session->userdata('company_id'),
            'acc_contents' => $this->input->post('acc_contents'),
            'status_quo' => $this->input->post('status_quo'),
            'occurrence_date' => $this->input->post('occurrence_date'),
            'sonsa' => $this->input->post('sonsa'),
            'acc_phone' => $this->input->post('acc_phone'),
            'payment' => $this->input->post('payment'),
            'acc_status' => $this->input->post('acc_status'));
    }
    
}
?>
