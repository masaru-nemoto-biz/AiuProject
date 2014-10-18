<?php
Class Accident_model extends CI_Model {
    
    function Accident_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_accident_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $query = $this->db->get('accident_info');
        return $query->result();
    }
    
    function insert_accident_data($array) {
        $this->db->insert('accident_info', $array); 
    }
}

?>
