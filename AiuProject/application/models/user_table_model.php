<?php
Class User_table_model extends CI_Model {
    
    function user_table_model(){
        parent::__construct();
        $this->load->database();
    }

    function get_user_list() {
        $this->db->order_by('user_num');
        $query = $this->db->get('aiu_user');
        return $query->result();
    }

    function get_user_data($check_radio) {
        $this->db->where('user_num', $check_radio);
        $this->db->order_by('user_num');
        $query = $this->db->get('aiu_user');
        return $query->result();
    }

    function get_login_user_data($user) {
        $this->db->where('user_id', $user);
        $this->db->order_by('user_num');
        $query = $this->db->get('aiu_user');
        return $query;
    }
    function set_user_data($user_num, $array) {
        $this->db->where('user_num', $user_num);
        $this->db->update('aiu_user', $array); 
    }
    function insert_user_data($array) {
        $this->db->insert('aiu_user', $array); 
    }

    function get_user_count($user, $password) {
        $this->db->where('user_id', $user);
        $this->db->where('password', $password);
        $this->db->from('aiu_user');
        return $this->db->count_all_results();
    }
    
    function set_user_delflg($user_num) {
        $this->db->where('user_num', $user_num);
        $this->db->update('aiu_user', array('del_flg' => '1'));
    }
    
}
?>
