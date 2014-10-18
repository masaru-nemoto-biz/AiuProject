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
        $this->load->model('accident_model');
                        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        $data['list1'] = $this->corpstatus_model->get_company_detail($this->session->userdata('company_id'));
        $data['list2'] = $this->contractInfo_model->get_contract_list($this->session->userdata('company_id'));
        $data['acc_list'] = $this->contractInfo_model->get_accident_list($this->session->userdata('company_id'));
        $this->load->view('contractinfo_list_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function contractInfoList_conform() {

        $this->session->set_userdata('contract_id', $this->input->post('check_radio'));
        
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

        redirect('corpinfolist/index');
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
     * 事故状況登録画面へ
     */
    function accident_add() {
        
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '登録したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }
        
        $data['list'] = $this->accident_model->get_accident_info($data['check1']);
        
        $this->load->view('accident_conform_view');
    }
}
?>
