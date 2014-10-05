<?php
class ContractStatusList extends CI_Controller {
    
    function ContractStatusList() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('contractStatusList_model');
        
        $this->config->load('config_shop', TRUE);
        
        $this->limit = $this->config->item('per_page', 'config_shop');
        $this->admin = $this->config->item('admin_email', 'config_shop');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

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
    
    function contractInfo_conform() {

        $data['check1'] = $this->input->post('check_radio');
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
    
        
    function contractInfo_add() {
        $data['company_data'] = null;
        $this->load->view('contractinfo_conform_view', $data);
    }
    
    function conform() {

        $data['company_name'] = $this->input->post('company_name');
        $array = array('corp_name' => $this->input->post('corp_name'),
            'corp_kana' => $this->input->post('corp_kana'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'company_mail' => $this->input->post('company_mail'),
            'company_hp' => $this->input->post('company_hp'),
            'establishment' => $this->input->post('establishment'),
            'capital' => $this->input->post('capital'),
            'settling_month' => $this->input->post('settling_month'),
            'biz_first' => $this->input->post('biz_first'),
            'biz_second' => $this->input->post('biz_second'),
            'employees' => $this->input->post('employees'),
            'contract_staff' => $this->input->post('contract_staff'),
            'contact_address' => $this->input->post('contact_address'),
            'corp_member' => $this->input->post('corp_member'),
            'juridical_personality' => $this->input->post('juridical_personality'));
        $this->contractStatusList_model->set_company_data($this->session->userdata('company_id'), $array);
        
        $array2 = array('representative_name' => $this->input->post('representative_name'),
            'representative_kana' => $this->input->post('representative_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        $this->contractStatusList_model->set_representative_data($this->session->userdata('company_id'), $array2);
        
        $array3 = array('contract_name' => $this->input->post('contract_name'),
            'contract_kana' => $this->input->post('contract_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        $this->contractStatusList_model->set_contract_data($this->session->userdata('company_id'), $array3);
        
        $array4 = array('account_transfer_num' => $this->input->post('account_transfer_num'),
            'address' => $this->input->post('address'),
            'holder_name' => $this->input->post('holder_name'),
            'phone' => $this->input->post('phone'),
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'deposit_type' => $this->input->post('deposit_type'),
            'account_num' => $this->input->post('account_num'),
            'swift_code' => $this->input->post('swift_code'),
            'branch_number' => $this->input->post('branch_number'),
            'japan_post_bank_symbol' => $this->input->post('japan_post_bank_symbol'),
            'japan_post_bank_num' => $this->input->post('japan_post_bank_num'),
            'mailing' => $this->input->post('mailing'));
        $this->contractStatusList_model->set_bank_data($this->session->userdata('company_id'), $array4);
        
        $array5 = array('contact_way' => $this->input->post('contact_way'),
            'contact_place' => $this->input->post('contact_place'),
            'contact_time' => $this->input->post('contact_time'),
            'personality' => $this->input->post('personality'),
            'family_structure' => $this->input->post('family_structure'),
            'taste' => $this->input->post('taste'),
            'state' => $this->input->post('state'));
        $this->contractStatusList_model->set_other_data($this->session->userdata('company_id'), $array5);
        
        $data['company_data'] = $this->contractStatusList_model->get_company_data($this->session->userdata('company_id'));
        $data['list'] = $this->contractStatusList_model->get_company_list();
        $this->load->view('contractStatusList_view', $data);
    }
    
    function conform_add() {

        $data['company_name'] = $this->input->post('company_name');
        $array = array('corp_name' => $this->input->post('corp_name'),
            'corp_kana' => $this->input->post('corp_kana'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
            'fax' => $this->input->post('fax'),
            'company_mail' => $this->input->post('company_mail'),
            'company_hp' => $this->input->post('company_hp'),
            'establishment' => $this->input->post('establishment'),
            'capital' => $this->input->post('capital'),
            'settling_month' => $this->input->post('settling_month'),
            'biz_first' => $this->input->post('biz_first'),
            'biz_second' => $this->input->post('biz_second'),
            'employees' => $this->input->post('employees'),
            'contract_staff' => $this->input->post('contract_staff'),
            'contact_address' => $this->input->post('contact_address'),
            'corp_member' => $this->input->post('corp_member'),
            'juridical_personality' => $this->input->post('juridical_personality'));
        $this->contractStatusList_model->insert_company_data($array);
        
        $array2 = array('representative_name' => $this->input->post('representative_name'),
            'representative_kana' => $this->input->post('representative_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        $this->contractStatusList_model->insert_representative_data($array2);
        
        $array3 = array('contract_name' => $this->input->post('contract_name'),
            'contract_kana' => $this->input->post('contract_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        $this->contractStatusList_model->insert_contract_data($array3);
        
        $array4 = array('account_transfer_num' => $this->input->post('account_transfer_num'),
            'address' => $this->input->post('address'),
            'holder_name' => $this->input->post('holder_name'),
            'phone' => $this->input->post('phone'),
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'deposit_type' => $this->input->post('deposit_type'),
            'account_num' => $this->input->post('account_num'),
            'swift_code' => $this->input->post('swift_code'),
            'branch_number' => $this->input->post('branch_number'),
            'japan_post_bank_symbol' => $this->input->post('japan_post_bank_symbol'),
            'japan_post_bank_num' => $this->input->post('japan_post_bank_num'),
            'mailing' => $this->input->post('mailing'));
        $this->contractStatusList_model->insert_bank_data($array4);
        
        $array5 = array('contact_way' => $this->input->post('contact_way'),
            'contact_place' => $this->input->post('contact_place'),
            'contact_time' => $this->input->post('contact_time'),
            'personality' => $this->input->post('personality'),
            'family_structure' => $this->input->post('family_structure'),
            'taste' => $this->input->post('taste'),
            'state' => $this->input->post('state'));
        $this->contractStatusList_model->insert_other_data($array5);
        
        $data['company_data'] = $this->contractStatusList_model->get_company_data($this->session->userdata('company_id'));
        $data['list'] = $this->contractStatusList_model->get_company_list();
        $this->load->view('contractStatusList_view', $data);
    }
    
    
//この行以降はテストなので最後に消すこと
    function reference(){
        
        $data['check1'] = $this->input->post('check_radio');
        $data['company_data'] = $this->contractStatusList_model->get_company_data($data['check1']);
        foreach ($data['company_data'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
        
//        $data['test1']= $this->session->userdata('company_id');
        $this->load->view('contractinfo_conform_view', $data);
        
    }
    
    function customer_view(){

        $this->load->view('customer_reference_view');
        
    }
    
    function contractinfo_view(){
        $this->load->view('contractinfo_view');
        
    }
    
}
?>
