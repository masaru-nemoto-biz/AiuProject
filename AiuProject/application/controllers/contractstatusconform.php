<?php
class ContractStatusConform extends CI_Controller {

    var $array;  // 企業情報
    var $array2; // 代表者詳細
    var $array3; // 契約担当者詳細
    var $array4; // 口座詳細
    var $array5; // その他
    
    function ContractStatusConform() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('contractStatusList_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    /*
     * 契約状況変更ロジック
     */
    function conform() {
        
        $this->conform_Prepare();
        
        $this->contractStatusList_model->set_company_data($this->session->userdata('company_id'), $this->array);
        $this->contractStatusList_model->set_representative_data($this->session->userdata('company_id'), $this->array2);
        $this->contractStatusList_model->set_contract_data($this->session->userdata('company_id'), $this->array3);
        $this->contractStatusList_model->set_bank_data($this->session->userdata('company_id'), $this->array4);
        $this->contractStatusList_model->set_other_data($this->session->userdata('company_id'), $this->array5);
       
        $data['list'] = $this->contractStatusList_model->get_company_list();
        $this->load->view('contractStatusList_view', $data);
    }
    
    /*
     * 契約状況追加ロジック
     */
    function conform_add() {
        
        $this->conform_Prepare();
        
        $this->contractStatusList_model->insert_company_data($this->array);
        $this->contractStatusList_model->insert_representative_data($this->array2);
        $this->contractStatusList_model->insert_contract_data($this->array3);
        $this->contractStatusList_model->insert_bank_data($this->array4);
        $this->contractStatusList_model->insert_other_data($this->array5);
        
        $data['list'] = $this->contractStatusList_model->get_company_list();
        $this->load->view('contractStatusList_view', $data);
    }
    
    /*
     * 契約状況登録準備ロジック
     * 
     * 画面入力された契約状況を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $this->array = array('corp_name' => $this->input->post('corp_name'),
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
        
        $this->array2 = array('representative_name' => $this->input->post('representative_name'),
            'representative_kana' => $this->input->post('representative_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        
        $this->array3 = array('contract_name' => $this->input->post('contract_name'),
            'contract_kana' => $this->input->post('contract_kana'),
            'title' => $this->input->post('title'),
            'sex' => $this->input->post('sex'),
            'birthday' => $this->input->post('birthday'),
            'mobile_phone' => $this->input->post('mobile_phone'),
            'mail' => $this->input->post('mail'),
            'post' => $this->input->post('post'),
            'address' => $this->input->post('address'),
            'home_phone' => $this->input->post('home_phone'));
        
        $this->array4 = array('account_transfer_num' => $this->input->post('account_transfer_num'),
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
        
        $this->array5 = array('contact_way' => $this->input->post('contact_way'),
            'contact_place' => $this->input->post('contact_place'),
            'contact_time' => $this->input->post('contact_time'),
            'personality' => $this->input->post('personality'),
            'family_structure' => $this->input->post('family_structure'),
            'taste' => $this->input->post('taste'),
            'state' => $this->input->post('state'));
    }
    
}
?>