<?php
class CorpInfoConform extends CI_Controller {

    var $array;  // 契約者情報
    var $array2; // 代表者詳細
    var $array3; // 契約担当者詳細
    var $array4; // 口座詳細
    var $array5; // その他
    
    function CorpInfoConform() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('corpStatus_model');
        $this->load->model('history_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    /*
     * 契約者情報変更ロジック(変更)
     */
    function conform() {
        
        $this->conform_Prepare();
        
        $this->corpStatus_model->set_company_data($this->session->userdata('company_id'), $this->array);
        $this->corpStatus_model->set_representative_data($this->session->userdata('company_id'), $this->array2);
        $this->corpStatus_model->set_contract_data($this->session->userdata('company_id'), $this->array3);
        $this->corpStatus_model->set_bank_data($this->session->userdata('company_id'), $this->array4);
        $this->corpStatus_model->set_other_data($this->session->userdata('company_id'), $this->array5);
       
        $this->history_model->insert_history('契約者情報が更新されました', $this->session->userdata('user'), $this->input->post('corp_name'));
        redirect('corpinfolist/index');
    }
    
    /*
     * 契約者情報追加ロジック(新規)
     */
    function conform_add() {
        
        $this->conform_Prepare();
        
        $this->corpStatus_model->insert_company_data($this->array);
        $this->corpStatus_model->insert_representative_data($this->array2);
        $this->corpStatus_model->insert_contractant_data($this->array3);
        $this->corpStatus_model->insert_bank_data($this->array4);
        $this->corpStatus_model->insert_other_data($this->array5);
        
        $this->history_model->insert_history('契約者情報が追加されました', $this->session->userdata('user'), $this->input->post('corp_name'));
        redirect('corpinfolist/index');
    }
    
    /*
     * 契約者情報登録準備ロジック
     * 
     * 画面入力された契約状況を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $this->array = array('corp_name' => $this->input->post('corp_name'),
            'corp_kana' => $this->input->post('corp_kana'),
            'post' => $this->input->post('corp_post'),
            'corp_address' => $this->input->post('corp_address'),
            'phone' => $this->input->post('corp_phone'),
            'phone_sec' => $this->input->post('phone_sec'),
            'fax' => $this->input->post('corp_fax'),
            'company_mail' => $this->input->post('company_mail'),
            'company_hp' => $this->input->post('company_hp'),
            'establishment' => $this->input->post('establishment'),
            'capital' => $this->input->post('capital'),
            'settling_month' => $this->input->post('settling_month'),
            'biz_first' => $this->input->post('biz_first'),
            'biz_second' => $this->input->post('biz_second'),
            'employees' => $this->input->post('employees'),
            'corp_member' => $this->input->post('corp_member'),
            'upd_user' => $this->input->post('upd_user'),
            'contracter_type' => $this->input->post('contracter_type'),
            'juridical_personality' => $this->input->post('juridical_personality'));
        
        $this->array2 = array('representative_name' => $this->input->post('representative_name'),
            'representative_kana' => $this->input->post('representative_kana'),
            'title' => $this->input->post('rep_title'),
            'sex' => $this->input->post('rep_sex'),
            'birthday' => $this->input->post('rep_birthday'),
            'rep_mobile_phone' => $this->input->post('rep_mobile_phone'),
            'mail' => $this->input->post('rep_mail'),
            'post' => $this->input->post('rep_post'),
            'address' => $this->input->post('rep_address'),
            'home_phone' => $this->input->post('rep_home_phone'),
            'rep_phone_sec' => $this->input->post('rep_phone_sec'),
            'rep_fax' => $this->input->post('rep_fax'));
        
        $this->array3 = array('contract_name' => $this->input->post('contract_name'),
            'contract_kana' => $this->input->post('contract_kana'),
            'title' => $this->input->post('con_title'),
            'sex' => $this->input->post('con_sex'),
            'birthday' => $this->input->post('con_birthday'),
            'mobile_phone' => $this->input->post('con_mobile_phone'),
            'mail' => $this->input->post('con_mail'),
            'post' => $this->input->post('con_post'),
            'address' => $this->input->post('con_address'),
            'home_phone' => $this->input->post('con_home_phone'),
            'cont_phone_sec' => $this->input->post('cont_phone_sec'),
            'cont_fax' => $this->input->post('cont_fax'));
        
        $this->array4 = array('account_transfer_num' => $this->input->post('account_transfer_num'),
            'address' => $this->input->post('bank_address'),
            'holder_name' => $this->input->post('bank_holder_name'),
            'phone' => $this->input->post('bank_phone'),
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'deposit_type' => $this->input->post('deposit_type'),
            'account_num' => $this->input->post('account_num'),
            'swift_code' => $this->input->post('swift_code'),
            'branch_number' => $this->input->post('branch_number'),
            'japan_post_bank_symbol' => $this->input->post('japan_post_bank_symbol'),
            'japan_post_bank_num' => $this->input->post('japan_post_bank_num'),
            'mailing' => $this->input->post('mailing'));
        
        $this->array5 = array('contract_way' => $this->input->post('contract_way'),
            'contact_place' => $this->input->post('contact_place'),
            'contact_time' => $this->input->post('contact_time'),
            'fin_st_acq' => $this->input->post('fin_st_acq'),
            'remarks' => $this->input->post('remarks'));
    }
    
}
?>
