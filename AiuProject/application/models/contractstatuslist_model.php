<?php
Class ContractStatusList_model extends CI_Model {
    
    function ContractStatusList_model(){
        parent::__construct();
        $this->load->database();
    }

    
    function get_company_list() {
        $this->db->order_by('company_id');
        $query = $this->db->get('company_info');
        return $query->result();
    }
    function get_representative_list() {
        $this->db->order_by('company_id');
        $query = $this->db->get('representative_detail');
        return $query->result();
    }
    function get_contract_list() {
        $this->db->order_by('company_id');
        $query = $this->db->get('contract_detail');
        return $query->result();
    }
    function get_bank_list() {
        $this->db->order_by('company_id');
        $query = $this->db->get('bank_account_info');
        return $query->result();
    }
    function get_other_list() {
        $this->db->order_by('company_id');
        $query = $this->db->get('other_info');
        return $query->result();
    }
    
    
    function get_company_data($check_radio) {
        $this->db->where('company_id', $check_radio);
        $this->db->order_by('company_id');
        $query = $this->db->get('company_info');
        return $query->result();
    }
    function get_representative_data($check_radio) {
        $this->db->where('company_id', $check_radio);
        $this->db->order_by('company_id');
        $query = $this->db->get('representative_detail');
        return $query->result();
    }
    function get_contract_data($check_radio) {
        $this->db->where('company_id', $check_radio);
        $this->db->order_by('company_id');
        $query = $this->db->get('contract_detail');
        return $query->result();
    }
    function get_bank_data($check_radio) {
        $this->db->where('company_id', $check_radio);
        $this->db->order_by('company_id');
        $query = $this->db->get('bank_account_info');
        return $query->result();
    }
    function get_other_data($check_radio) {
        $this->db->where('company_id', $check_radio);
        $this->db->order_by('company_id');
        $query = $this->db->get('other_info');
        return $query->result();
    }
    
    
    function set_company_data($company_id, $array) {
        $this->db->where('company_id', $company_id);
        $this->db->update('company_info', $array); 
    }
    function set_representative_data($company_id, $array2) {
        $this->db->where('company_id', $company_id);
        $this->db->update('representative_detail', $array2); 
    }
    function set_contract_data($company_id, $array3) {
        $this->db->where('company_id', $company_id);
        $this->db->update('contract_detail', $array3); 
    }
    function set_bank_data($company_id, $array4) {
        $this->db->where('company_id', $company_id);
        $this->db->update('bank_account_info', $array4); 
    }
    function set_other_data($company_id, $array5) {
        $this->db->where('company_id', $company_id);
        $this->db->update('other_info', $array5); 
    }
    
    
    function insert_company_data($array) {
        $this->db->insert('company_info', $array); 
    }
    function insert_representative_data($array2) {
        $this->db->insert('representative_detail', $array2); 
    }
    function insert_contract_data($array3) {
        $this->db->insert('contract_detail', $array3); 
    } 
    function insert_bank_data($array4) {
        $this->db->insert('bank_account_info', $array4); 
    }
    function insert_other_data($array5) {
        $this->db->insert('other_info', $array5); 
    }
//    function get_category_name($id) {
//        $this->db->select('name');
//        $this->db->where('id', $id);
//        $query = $this->db->get('category');
//        $row = $query->row();
//        return $row->name;
//    }
//
//    function get_product_count($cat_id) {
//        $this->db->where('category_id', $cat_id);
//        $query = $this->db->get('product');
//        return $query->num_rows();
//    }
//    
//    function get_product_item($id) {
//        $this->db->where('id', $id);
//        $query = $this->db->get('product');
//        return $query->row();
//    }
}

?>
