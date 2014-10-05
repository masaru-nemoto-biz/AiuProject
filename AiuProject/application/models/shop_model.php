<?php
Class Shop_model extends CI_Model {
    
    function Shop_model(){
        parent::__construct();
        $this->load->database();
    }
    
    function get_category_list() {
        $this->db->order_by('id');
        $query = $this->db->get('category');
        return $query->result();
    }

    function get_product_list($cat_id, $limit, $offset) {
        $this->db->where('category_id', $cat_id);
        $this->db->order_by('id');
        $query = $this->db->get('product', $limit, $offset);
        return $query->result();
    }

    function get_category_name($id) {
        $this->db->select('name');
        $this->db->where('id', $id);
        $query = $this->db->get('category');
        $row = $query->row();
        return $row->name;
    }

    function get_product_count($cat_id) {
        $this->db->where('category_id', $cat_id);
        $query = $this->db->get('product');
        return $query->num_rows();
    }
    
    function get_product_item($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('product');
        return $query->row();
    }
}

?>
