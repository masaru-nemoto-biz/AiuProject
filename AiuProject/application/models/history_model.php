<?php
Class History_model extends CI_Model {
    
    function History_model(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
    }

    function insert_history($content) {
        $this->array = array('history_content' => $content);
        $this->db->insert('history', $this->array); 
    }

    function get_history_all() {
        $this->db->from('history');
        $this->db->limit(15);
        $query = $this->db->get();
        
        return $query->result();
    }
    
}

?>
