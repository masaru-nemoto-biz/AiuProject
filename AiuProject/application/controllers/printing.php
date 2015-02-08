<?php
class Printing extends CI_Controller {
    
    var $message;
    var $acc_id;
    var $policy_number;
    
    function Printing() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('corpStatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        $this->load->model('accident_model');
        $this->load->model('history_model');
                        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $this->session->unset_userdata('seach_obj');
        $data['message'] = $this->session->userdata('message_printing');
        $data['mst_print_documents'] = $this->master_model->mst_print_documents();
        $data['list'] = $this->corpStatus_model->get_company_list();
        $this->load->view('printing_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function conform() {
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message_printing');
        
        if ($data['move'] == '印刷') {
            redirect('printing/printing_docments');
        } else {
            $this->index();
        }
    }

    /*
     * 契約情報追加/変更画面へ
     */
    function printing_docments() {
                
        $data['check1'] = $this->input->post('check_radio1');
        $data['check2'] = $this->input->post('check_radio2');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '印刷したい書類にチェックを入れてください';
            $this->session->set_userdata('message_printing', $message);
            redirect('printing/index');
        } elseif (empty($data['check2'])) {
            // チェックなしの場合は自画面遷移
            $message = '印刷したい企業にチェックを入れてください';
            $this->session->set_userdata('message_printing', $message);
            redirect('printing/index');
        }
        
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['insurance_classification_mst'] = $this->master_model->insurance_classification_mst();
        $data['insurance_company_mst'] = $this->master_model->insurance_company_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        $data['contract_status_mst'] = $this->master_model->contract_status_mst();
        
        $data['car_list'] = $this->contractInfo_model->get_car_info($this->session->userdata('contract_id'));
        
        $this->load->view('contractinfo_conform_view', $data);
    }

}
?>
