<?php
class CustomerRef extends CI_Controller {
    
    var $message;
    
    function CustomerRef() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        $this->load->model('accident_model');
                        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        $data['list1'] = $this->corpstatus_model->get_company_detail($this->session->userdata('company_id'));
        $data['file'] = './uploads/nesakiスキルシート.pdf';
        $this->load->view('customer_ref_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function customerref_conform() {
        
        $data['move'] = $this->input->post('move');

        if ($data['move'] == '戻る') {
            redirect('main/index');
        } elseif (!empty($data['move'])) {
            $this->outputpdf($data['move']);
        } else {
            $this->index();
        }
    }
    
    /*
     * pdf出力画面
     */
    function outputpdf($file) {
        
        $this->load->helper('download');
        force_download($file, base_url().'/uploads/'.$file);
        
    }
}
?>
