<?php
Class ContractInfo_model extends CI_Model {
    
    function ContractInfo_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_contract_all() {
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get('contract_info');
        return $query->result();
    }

    function get_contract_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get('contract_info');
        return $query->result();
    }

    function get_company_id($contract_id) {
        $this->db->select('company_id');
        $this->db->where('contract_id', $contract_id);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get('contract_info');
        return $query;
    }

    function get_contract_list($company_id) {
        $this->db->select('*');
        $this->db->from('contract_info');
        $this->db->join('insurance_classification_mst', 'insurance_classification_mst.insur_class_id = contract_info.insurance_classification_id', 'left');
        $this->db->join('insurance_company_mst', 'insurance_company_mst.insur_corp_id = contract_info.insurance_company_id', 'left');
        $this->db->join('corp_division_mst', 'corp_division_mst.corp_div_id = contract_info.division', 'left');
        $this->db->join('company_info', 'company_info.company_id = contract_info.company_id', 'left');
        $this->db->where('contract_info.company_id', $company_id);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_month_p_sum($company_id) {
        
        $status_in = array('1', '2', '3', '7');
        
        $this->db->select_sum('month_p');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $this->db->where_in('contract_status', $status_in);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_yearly_p_sum($company_id) {
        
        $status_in = array('1', '2', '3', '7');
        
        $this->db->select_sum('yearly_payment');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $this->db->where_in('contract_status', $status_in);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_anp_sum($company_id) {
        
        $status_in = array('1', '2', '3', '7');
        
        $this->db->select_sum('anp');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $this->db->where_in('contract_status', $status_in);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_accident_list($company_id) {
        $this->db->select('*');
        $this->db->from('contract_info');
        $this->db->join('accident_info', 'accident_info.contract_id = contract_info.contract_id', 'left');
        $this->db->join('accident_status_mst', 'accident_status_mst.acc_status_id = accident_info.acc_status_id', 'left');
        $this->db->where('contract_info.company_id', $company_id);
        $this->db->where('accident_info.del_flg', '0');
        $query = $this->db->get();
        
        return $query->result();
    }

    function get_accident_data($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->order_by('acc_id');
        $query = $this->db->get('accident_info');
        return $query->result();
    }

    function get_car_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->order_by('carinfo_no');
        $query = $this->db->get('car_info');
        return $query->result();
    }

    function insert_contract_data($array) {
        $this->db->insert('contract_info', $array); 
    }

    function set_contract_data($contract_id, $array) {
        $this->db->where('contract_id', $contract_id);
        $this->db->update('contract_info', $array); 
    }

    function set_contract_delflg($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->update('contract_info', array('del_flg' => '1'));
    }

    function insert_car_data($array) {
        $this->db->insert('car_info', $array);
    }
    
    function set_car_data($carinfo_no, $array) {
        $this->db->where('carinfo_no', $carinfo_no);
        $this->db->update('car_info', $array); 
    }
    
    function get_contract_join_accident_info($seach_column,$seach_obj) {
        $this->db->select('contract_info.contract_id, contract_info.brand_name, policy_number, policy_branch_number, acc_id, contract_owner, contract_info.company_id, company_info.contracter_type, company_info.corp_name, representative_detail.representative_name');
        $this->db->like($seach_column, $seach_obj);
        $this->db->from('contract_info');
        $this->db->join('company_info', 'contract_info.company_id = company_info.company_id', 'left outer');
        $this->db->join('representative_detail', 'representative_detail.company_id = company_info.company_id', 'left outer');
        $this->db->join('accident_info', 'contract_info.contract_id = accident_info.contract_id', 'left outer');
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_contract_join_accident_all() {
        $this->db->select('contract_info.contract_id, contract_info.brand_name, policy_number, policy_branch_number, acc_id, contract_owner, contract_info.company_id, company_info.contracter_type, company_info.corp_name, representative_detail.representative_name');
        $this->db->from('contract_info');
        $this->db->join('company_info', 'contract_info.company_id = company_info.company_id', 'left outer');
        $this->db->join('representative_detail', 'representative_detail.company_id = company_info.company_id', 'left outer');
        $this->db->join('accident_info', 'contract_info.contract_id = accident_info.contract_id', 'left outer');
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_contract_join_accident_active() {
        $this->db->select('contract_info.contract_id, contract_info.brand_name, policy_number, policy_branch_number, acc_id, contract_owner, contract_info.company_id, company_info.contracter_type, company_info.corp_name, representative_detail.representative_name');
        $this->db->from('contract_info');
        $this->db->join('company_info', 'contract_info.company_id = company_info.company_id', 'left outer');
        $this->db->join('representative_detail', 'representative_detail.company_id = company_info.company_id', 'left outer');
        $this->db->join('accident_info', 'contract_info.contract_id = accident_info.contract_id', 'left outer');
        $this->db->where('contract_info.insurance_period_end >=', mdate('%Y-%m-%d'));
        $this->db->where('accident_info.acc_status_id', '2');
        $this->db->where('contract_info.del_flg', '0');
        $this->db->or_where('contract_info.insurance_period_end >=', mdate('%Y-%m-%d'));
        $this->db->where('accident_info.acc_status_id', '1');
        $this->db->where('contract_info.del_flg', '0');
        $this->db->or_where('contract_info.insurance_period_end >=', mdate('%Y-%m-%d'));
        $this->db->where('accident_info.acc_status_id', null);
        $this->db->where('contract_info.del_flg', '0');
        $query = $this->db->get();
        
        return $query->result();
    }
}
?>
