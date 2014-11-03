<?php
Class ContractInfo_model extends CI_Model {
    
    function ContractInfo_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_contract_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $query = $this->db->get('contract_info');
        return $query->result();
    }
    
    function get_contract_list($company_id) {
        $this->db->select('*');
        $this->db->from('contract_info');
        $this->db->join('insurance_classification_mst', 'insurance_classification_mst.insur_class_id = contract_info.insurance_classification_id', 'left');
        $this->db->join('insurance_company_mst', 'insurance_company_mst.insur_corp_id = contract_info.insurance_company_id', 'left');
        $this->db->join('corp_division_mst', 'corp_division_mst.corp_div_id = contract_info.division', 'left');
        $this->db->join('company_info', 'company_info.company_id = contract_info.company_id', 'left');
        $this->db->where('contract_info.company_id', $company_id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_month_p_sum($company_id) {
        
        $this->db->select_sum('month_p');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_yearly_p_sum($company_id) {
        
        $this->db->select_sum('yearly_payment');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_anp_sum($company_id) {
        
        $this->db->select_sum('anp');
        $this->db->from('contract_info');
        $this->db->where('company_id', $company_id);
        $query = $this->db->get();

        return $query->result();
    }
    
    function get_accident_list($company_id) {
        $this->db->select('*');
        $this->db->from('contract_info');
        $this->db->join('accident_info', 'accident_info.contract_id = contract_info.contract_id', 'left');
        $this->db->join('accident_status_mst', 'accident_status_mst.acc_status_id = accident_info.acc_status_id', 'left');
        $this->db->where('contract_info.company_id', $company_id);
        $this->db->where('accident_info.acc_status_id', '1');
        $this->db->or_where('accident_info.acc_status_id', '2');
        $query = $this->db->get();
        
        return $query->result();
    }

    function get_accident_data($contract_id) {
        $this->db->select('*');
        $this->db->from('accident_info');
        $this->db->join('accident_status_mst', 'accident_status_mst.acc_status_id = accident_info.acc_status_id', 'left');
        $this->db->where('accident_info.contract_id', $contract_id);
        $this->db->where('accident_info.acc_status_id', '1');
        $this->db->or_where('accident_info.contract_id', $contract_id);
        $this->db->where('accident_info.acc_status_id', '2');
        $query = $this->db->get();
        
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
}

?>
