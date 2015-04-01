<?php
Class Approachinfo_model extends CI_Model {
    
    function Approachinfo_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_approach_all() {
        $query = $this->db->get('approach_info');
        return $query->result();
    }

    function get_approach_info($contract_id,$approach_div) {
        $this->db->where('contract_id', $contract_id);
        $this->db->where('approach_div', $approach_div);
        $this->db->order_by('upd_date');
        $query = $this->db->get('approach_info');
        return $query->result();
    }

    function set_approach_info($approach_id, $array) {
        $this->db->where('approach_id', $approach_id);
        $this->db->update('approach_info', $array); 
    }

    function insert_approach_info($array) {
        $this->db->insert('approach_info', $array); 
    }
}
?>
