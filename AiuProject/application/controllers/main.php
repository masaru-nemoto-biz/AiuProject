<?php
class Main extends CI_Controller {
    
    var $message;
    var $acc_id;
    
    function Main() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        $this->load->model('accident_model');
        $this->load->model('history_model');
        $this->load->model('corpStatus_model');
        $this->load->model('documentinfo_model');
        $this->load->library('user_agent');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $this->session->unset_userdata('seach_obj');
        $data['message'] = $this->session->userdata('message');
        $data['contract_list'] = $this->contractInfo_model->get_contract_join_accident_active();
        $data['mst_seach_obj'] = $this->master_model->mst_seach_obj();
        $data['history_list'] = $this->history_model->get_history_all();
        $data['seach_obj'] = $this->session->userdata('seach_obj');
        $this->load->view('main_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function main_conform() {

        $this->session->set_userdata('contract_id', $this->input->post('check_radio'));
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == '契約者情報一覧画面へ') {
            redirect('corpinfolist/index');
        } elseif ($data['move'] == '契約情報追加/変更') {
            $this->contractInfo_change();
        } elseif ($data['move'] == '事故進捗状況') {
            $this->accident_add();
        } elseif ($data['move'] == '契約状況') {
            $this->contract_approach();
        } elseif ($data['move'] == '企業アプローチ状況') {
            $this->corp_approach();
        } elseif ($data['move'] == '各種書類印刷へ') {
            redirect('printing/index');
        } elseif ($data['move'] == '契約者書類') {
            $this->customer_document();
        } else {
            $this->index();
        }
    }

    /*
     * 検索ロジック
     * 
     * 検索を行う。
     */
    function seach() {
        
        $this->session->set_userdata('seach_obj', $this->input->post('seach_obj'));
        $seach_column = $this->input->post('seach_column');

        $data['contract_list'] = $this->contractInfo_model->get_contract_join_accident_info($seach_column,$this->session->userdata('seach_obj'));
        $data['mst_seach_obj'] = $this->master_model->mst_seach_obj();
        $data['seach_obj'] = $this->session->userdata('seach_obj');
        $data['history_list'] = $this->history_model->get_history_all();
        $this->load->view('main_view', $data);
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
            redirect('main/index');
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
            redirect('main/index');
        }

        redirect('accidentconform/index');
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
            redirect('main/index');
        }
        
        redirect('contractapproach/index');
    }
        
    /*
     * 企業アプローチ画面へ
     */
    function corp_approach() {
                
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('main/index');
        }
        
        redirect('corpapproach/index');
    }

    /*
     * 契約者書類画面へ
     */
    function customer_document() {
        $data['check1'] = $this->input->post('check_radio');
                
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '参照したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('main/index');
        }
        $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'))->row(0);
        $company_id = $data['company_id']->company_id;
        $data['referrer1'] = $this->agent->referrer();
        $data['list1'] = $this->corpStatus_model->get_company_detail($company_id);
        $data['doclist'] = $this->documentinfo_model->get_document_company($company_id, '1');
        $data['doclist2'] = $this->documentinfo_model->get_document_company($company_id, '2');
        $data['doclist3'] = $this->documentinfo_model->get_document_company($company_id, '3');
        $data['doclist4'] = $this->documentinfo_model->get_document_company($company_id, '4');
        $this->load->view('customer_ref_view', $data);
    }
}
?>
