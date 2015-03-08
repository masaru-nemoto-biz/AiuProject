<?php
Class History_model extends CI_Model {
    
    function History_model(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
    }

    function insert_history($content, $user, $contractant) {
        $this->array = array('contractant' => $contractant,
                             'history_content' => $content,
                             'update_user' => $user);
        $this->db->insert('history', $this->array); 
    }

    function get_history_all() {
        $this->db->from('history');
        $this->db->limit(10);
        $this->db->order_by('insert_date','desc');
        $query = $this->db->get();
        
        return $query->result();
    }
    
}

?>
