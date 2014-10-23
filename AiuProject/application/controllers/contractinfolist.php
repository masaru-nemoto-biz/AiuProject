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
        $data['month_p_sum'] = $this->contractInfo_model->get_month_p_sum($this->session->userdata('company_id'));
        $data['yearly_p_sum'] = $this->contractInfo_model->get_yearly_p_sum($this->session->userdata('company_id'));
        $data['anp_sum'] = $this->contractInfo_model->get_anp_sum($this->session->userdata('company_id'));
        $data['month_3ago'] = date('Y-m-d', strtotime("+3 month"));
        
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
        
        if ($data['move'] == '契約者情報一覧画面へ') {
            $this->move_contractInfoList();
        } elseif ($data['move'] == '事故状況登録/変更画面へ') {
            $this->accident_add();
        } elseif ($data['move'] == '契約情報登録画面へ') {
            $this->contractInfo_add();
        } elseif ($data['move'] == '契約情報変更画面へ') {
            $this->contractInfo_change();
        } elseif ($data['move'] == '3か月前') {
            $this->contractInfo_add();
        } else {
            $this->index();
        }
    }

    /*
     * 契約者情報画面へ
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
     * 契約情報変更画面へ
     */
    function contractInfo_change() {
                
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }
        
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['insurance_classification_mst'] = $this->master_model->insurance_classification_mst();
        $data['insurance_company_mst'] = $this->master_model->insurance_company_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        
        $this->load->view('contractinfo_conform_view', $data);
    }

    /*
     * 事故状況登録/変更画面へ
     */
    function accident_add() {
        
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '登録したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }
        
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['acc_list'] = $this->contractInfo_model->get_accident_data($this->session->userdata('contract_id'));
        $data['accident_status_mst'] = $this->master_model->accident_status_mst();
        
        if (!empty($data['acc_list'])) {
            foreach ($data['acc_list'] as $row) {
                $acc_id = $row->acc_id;
            }
            $this->session->set_userdata('acc_id', $acc_id);
        } else {
            $this->session->unset_userdata('acc_id');
        }
        
        $this->load->view('accident_conform_view', $data);
    }
}
?>
