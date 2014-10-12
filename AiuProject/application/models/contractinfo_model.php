<?php
Class ContractInfo_model extends CI_Model {
    
    function ContractInfo_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_contract_list($company_id) {
        $this->db->where('company_id', $company_id);
        $this->db->order_by('contract_id');
        $query = $this->db->get('contract_info');
        return $query->result();
    }

    function get_contract_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $query = $this->db->get('contract_info');
        return $query->result();
    }
    
    
    function insert_contract_data($array) {
        $this->db->insert('contract_info', $array); 
    }
}

?>
