<?php
class DocumentList extends CI_Controller {
    
    var $message;
    
    function DocumentList() {
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
    function document_conform() {


        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == 'main menu') {
            redirect('main/index');
            
        } elseif ($data['move'] == '契約状況一覧') {
            // メインメニューから来た場合、company_idをsessionに持っていない為、ここでcontract_idから逆引きしてセット        
            $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'))->row(0);
            $this->session->set_userdata('company_id', $data['company_id']->company_id);
            
            redirect('contractinfolist/index');
            
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
        $data = file_get_contents(mb_convert_encoding('../'.base_url().'uploads/'.$file, "SJIS", "UTF-8")); // ファイルの内容を読み取る
        force_download($file, $data);
        
    }
}
?>
