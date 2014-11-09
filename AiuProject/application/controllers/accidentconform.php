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
        $acc_id = $this->session->userdata('acc_id');
        $upd_date_new = $this->input->post('upd_date_new');
        
        if (empty($acc_id)){
            $this->accident_model->insert_accident_data($this->array);
        } else {
            $this->accident_model->set_accident_data($acc_id, $this->array);
            foreach ($this->session->userdata('acc_detail_list') as $row) {
                $this->conform_Prepare_status_quo($row);
                $this->accident_model->set_accident_detail($row->acc_status_id, $this->array2);
            }
        }

        
        if (!empty($upd_date_new)){
            $this->conform_Prepare_status_quo_new();
            $this->accident_model->insert_accident_detail($this->array3);
        }
        
        redirect('contractinfolist/index');
    }
    
    /*
     * 事故状況登録準備ロジック
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $this->array = array('acc_id' => $this->input->post('acc_id'),
            'contract_id' => $this->session->userdata('contract_id'),
            'company_id' => $this->session->userdata('company_id'),
            'acc_contents' => $this->input->post('acc_contents'),
            'occurrence_date' => $this->input->post('occurrence_date'),
            'sonsa' => $this->input->post('sonsa'),
            'acc_phone' => $this->input->post('acc_phone'),
            'payment' => $this->input->post('payment'),
            'acc_status_id' => $this->input->post('acc_status_id'));

    }

    /*
     * 事故状況登録準備ロジック２
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo($row) {

        $this->array2 = array('acc_id' => $this->input->post('acc_id'),
            'acc_status_id' => $row->acc_status_id,
            'status_quo' => $this->input->post('status_quo' . $row->acc_status_id),
            'upd_date' => $this->input->post('upd_date' . $row->acc_status_id),
            'upd_user' => $this->input->post('upd_user' . $row->acc_status_id));
    }

    /*
     * 事故状況登録準備ロジック３
     * 
     * 画面入力された事故状況を各変数へ詰め替える
     */
    function conform_Prepare_status_quo_new() {

        $this->array3 = array('acc_id' => $this->input->post('acc_id'),
            'status_quo' => $this->input->post('status_quo_new'),
            'upd_date' => $this->input->post('upd_date_new'),
            'upd_user' => $this->input->post('upd_user_new'));
    }
}
?>
