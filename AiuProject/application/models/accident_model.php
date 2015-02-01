<?php
Class Accident_model extends CI_Model {
    
    function Accident_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_accident_all() {
        $query = $this->db->get('accident_info');
        return $query->result();
    }
    
    function count_accident_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->from('accident_info');
        return $this->db->count_all_results();
    }
    
    function get_accident_info($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $query = $this->db->get('accident_info');
        return $query->result();
    }
    
    function get_accident_detail_contract_id($contract_id) {
        $this->db->where('contract_id', $contract_id);
        $this->db->order_by('upd_date');
        $query = $this->db->get('accident_detail');
        return $query->result();
    }
    
    function get_accident_detail($acc_id) {
        $this->db->where('acc_id', $acc_id);
        $this->db->order_by('upd_date');
        $query = $this->db->get('accident_detail');
        return $query->result();
    }
    
    function insert_accident_data($array) {
        $this->db->insert('accident_info', $array); 
    }
    
    function insert_accident_detail($array) {
        $this->db->insert('accident_detail', $array); 
    }
    
    function set_accident_data($acc_id, $array) {
        $this->db->where('acc_id', $acc_id);
        $this->db->update('accident_info', $array); 
    }
    
    function set_accident_detail($acc_status_id, $array) {
        $this->db->where('acc_status_id', $acc_status_id);
        $this->db->update('accident_detail', $array); 
    }
}

?>
