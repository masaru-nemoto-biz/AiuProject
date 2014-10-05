<?php
class ContractStatusList extends CI_Controller {
    
    var $message;
    
    function ContractStatusList() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('contractStatusList_model');
        
        $this->config->load('config_shop', TRUE);
        
        $this->limit = $this->config->item('per_page', 'config_shop');
        $this->admin = $this->config->item('admin_email', 'config_shop');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        $data['list'] = $this->contractStatusList_model->get_company_list();
        $this->load->view('contractstatuslist_view', $data);
    }
    
    function reference_index() {
        
        $data['company_list'] = $this->contractStatusList_model->get_company_list();
        $data['representative_list'] = $this->contractStatusList_model->get_representative_list();
        $data['contract_list'] = $this->contractStatusList_model->get_contract_list();
        $data['bank_list'] = $this->contractStatusList_model->get_bank_list();
        $data['other_list'] = $this->contractStatusList_model->get_other_list();
        $this->load->view('contractinfo_reference_view', $data);
        
    }
    
    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function contractInfo_conform() {

        $data['move'] = $this->input->post('move');
        if ($data['move'] == '企業情報変更画面へ') {
            $this->contractInfo_change();
        } elseif ($data['move'] == '企業情報照会画面へ') {
            $this->contractInfo_reference();
        } elseif ($data['move'] == '企業情報登録画面へ') {
            $this->contractInfo_add();
        } else {
            $this->index();
        }
    }

    /*
     * 企業情報照会画面へ
     */
    function contractInfo_reference() {
        $this->load->view('customer_reference_view');
    }
    
    
    /*
     * 企業情報追加画面へ
     */
    function contractInfo_add() {
        $data['company_data'] = null;
        $this->load->view('contractinfo_conform_view', $data);
    }
    
    /*
     * 企業情報変更画面へ
     */
    function contractInfo_change() {
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('ContractStatusList/index');
        }
        
        $data['company_data'] = $this->contractStatusList_model->get_company_data($data['check1']);
        foreach ($data['company_data'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);

        $data['representative'] = $this->contractStatusList_model->get_representative_data($data['check1']);
        foreach ($data['representative'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
        
        $data['contract'] = $this->contractStatusList_model->get_contract_data($data['check1']);
        foreach ($data['contract'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
        
        $data['bank'] = $this->contractStatusList_model->get_bank_data($data['check1']);
        foreach ($data['bank'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
        
        $data['other'] = $this->contractStatusList_model->get_other_data($data['check1']);
        foreach ($data['other'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
          
//        $data['test1']= $this->session->userdata('company_id');
        $this->load->view('contractinfo_conform_view', $data);
    }
}
?>
