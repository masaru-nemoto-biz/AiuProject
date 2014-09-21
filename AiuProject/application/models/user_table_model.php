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
    function set_user_data($user_num, $array) {
        $this->db->where('user_num', $user_num);
        $this->db->update('aiu_user', $array); 
    }
    function insert_user_data($array) {
        $this->db->insert('aiu_user', $array); 
    }
//    function get_category_name($id) {
//        $this->db->select('name');
//        $this->db->where('id', $id);
//        $query = $this->db->get('category');
//        $row = $query->row();
//        return $row->name;
//    }
//
//    function get_product_count($cat_id) {
//        $this->db->where('category_id', $cat_id);
//        $query = $this->db->get('product');
//        return $query->num_rows();
//    }
//    
//    function get_product_item($id) {
//        $this->db->where('id', $id);
//        $query = $this->db->get('product');
//        return $query->row();
//    }
}

?>
