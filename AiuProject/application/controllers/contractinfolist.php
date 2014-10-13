<?php
class ContractInfoList extends CI_Controller {
    
    var $message;
    
    function ContractInfoList() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
                        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        $data['list1'] = $this->corpstatus_model->get_company_detail($data['company_id']);
        $data['list2'] = $this->contractInfo_model->get_contract_list($data['company_id']);
        $this->load->view('contractinfo_list_view', $data);
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
        
        if ($data['move'] == '企業情報一覧画面へ') {
            $this->move_contractInfoList();
        } elseif ($data['move'] == '事故状況登録画面へ') {
            $this->accident_add();
        } elseif ($data['move'] == '契約情報登録画面へ') {
            $this->contractInfo_add();
        } else {
            $this->index();
        }
    }

    /*
     * 企業情報画面へ
     */
    function move_contractInfoList() {

        $data['list'] = $this->corpstatus_model->get_company_list();
        $this->load->view('corpinfo_list_view', $data);
    }

    /*
     * 契約情報登録画面へ
     */
    function contractInfo_add() {

        $data['insurance_classification_mst'] = $this->master_model->insurance_classification_mst();
        $data['insurance_company_mst'] = $this->master_model->insurance_company_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        
        $this->load->view('contractinfo_conform_view', $data);
    }

    /*
     * 契約情報登録画面へ
     */
    function accident_add() {

        $this->load->view('accident_conform_view');
    }
}
?>
