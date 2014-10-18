<?php
Class corpStatus_model extends CI_Model {
    
    function corpStatus_model(){
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }
    
    function get_3m_ago($id) {
        
        $this->db->select('contract_info.company_id');
        $this->db->from('company_info');
        $this->db->join('contract_info', 'contract_info.company_id = company_info.company_id', 'left');
        $this->db->where('contract_info.insurance_period_end <', date('Y-m-d', strtotime("-3 month")));
        $this->db->where('contract_info.insurance_classification_id', $id);

        $this->db->distinct();
        $query = $this->db->get();
        
        return $query->result();
    }
    
        function get_accident() {
            
        $this->db->select('accident_info.company_id');
        $this->db->from('company_info');
        $this->db->join('accident_info', 'accident_info.company_id = company_info.company_id', 'left');

        $this->db->distinct();
        $query = $this->db->get();
        
        return $query->result();
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
    
    function get_company_detail($check_radio) {
        $this->db->select('*');
        $this->db->from('company_info');
        $this->db->join('contract_detail', 'contract_detail.company_id = company_info.company_id', 'left');
        $this->db->where('company_info.company_id', $check_radio);
        $query = $this->db->get();
        
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

    function set_upload_data($company_id, $business_card) {
        $data = array(
               'business_card' => $business_card
            );
        $this->db->where('company_id', $company_id);
        //$this->db->where('contract_id', $contract_id);
        $this->db->update('contract_detail', $data); 
    }

    function insert_company_data($array) {
        $this->db->insert('company_info', $array); 
    }
    function insert_representative_data($array2) {
        $this->db->insert('representative_detail', $array2); 
    }
    function insert_contractant_data($array3) {
        $this->db->insert('contract_detail', $array3); 
    } 
    function insert_bank_data($array4) {
        $this->db->insert('bank_account_info', $array4); 
    }
    function insert_other_data($array5) {
        $this->db->insert('other_info', $array5); 
    }
    
    
    function insert_img($param) {
        $this->db
                ->set('img_data', $param->image)
                ->set('ima_mime', $param->mime)
                ->insert('image_tb'); 
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
