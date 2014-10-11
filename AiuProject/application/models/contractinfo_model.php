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
}

?>
