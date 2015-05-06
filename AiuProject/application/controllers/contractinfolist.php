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
        $this->load->model('documentinfo_model');
                        
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
        $data['contract_status_mst'] = $this->master_model->contract_status_mst();
        
        $data['contract_select_id'] = $this->session->userdata('contract_select_id');
        
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
        $this->session->set_userdata('contract_select_id', $this->input->post('check_radio'));
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == '契約者情報一覧画面へ') {
            $this->move_contractInfoList();
        } elseif ($data['move'] == '事故進捗状況') {
            $this->accident_add();
        } elseif ($data['move'] == '新規契約登録') {
            $this->contractInfo_add();
        } elseif ($data['move'] == '契約情報追加/変更') {
            $this->contractInfo_change();
        } elseif ($data['move'] == '削除') {
            $this->contractInfo_delete();
        } elseif ($data['move'] == '契約状況') {
            $this->contract_approach();
        } elseif ($data['move'] == '企業アプローチ状況') {
            $this->corp_approach();
        } elseif ($data['move'] == '契約者書類') {
            $this->customer_document();
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
     * 新規契約登録画面へ
     */
    function contractInfo_add() {

        $data['insurance_classification_mst'] = $this->master_model->insurance_classification_mst();
        $data['insurance_company_mst'] = $this->master_model->insurance_company_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        $data['contract_status_mst'] = $this->master_model->contract_status_mst();
        
        $this->load->view('contractinfo_conform_view', $data);
    }

    /*
     * 契約情報追加/変更画面へ
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
        $data['contract_status_mst'] = $this->master_model->contract_status_mst();
        
        $data['car_list'] = $this->contractInfo_model->get_car_info($this->session->userdata('contract_id'));
        
        $this->load->view('contractinfo_conform_view', $data);
    }

    /*
     * 事故進捗状況画面へ
     */
    function accident_add() {
        
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '登録したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }

        redirect('accidentconform/index');
    }

    /*
     * 契約情報削除
     */
    function contractInfo_delete() {
                
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '削除したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }
        
        $this->contractInfo_model->set_contract_delflg($this->session->userdata('contract_id'));
        
        redirect('contractinfolist/index');
    }

    /*
     * 契約状況画面へ
     */
    function contract_approach() {
                
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい契約情報にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('contractinfolist/index');
        }
        
        redirect('contractapproach/index');
    }
        
    /*
     * 企業アプローチ画面へ
     */
    function corp_approach() {

        redirect('corpapproach/index');
    }

    /*
     * 契約者書類画面へ
     */
    function customer_document() {

        $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'))->row(0);
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
