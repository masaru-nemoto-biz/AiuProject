<?php
Class Master_model extends CI_Model {
    
    function Master_model(){
        parent::__construct();
        $this->load->database();
    }

    /*
     * 性別マスタ
     */
    function get_sex_list() {
        $query = $this->db->get('sex_mst');
        return $query->result();
    }

    /*
     * 法人格マスタ
     */
    function jurid_personal_mst() {
        $query = $this->db->get('jurid_personal_mst');
        return $query->result();
    }

    /*
     * 預金種目マスタ
     */
    function deposits_event_mst() {
        $query = $this->db->get('deposits_event_mst');
        return $query->result();
    }

    /*
     * お知らせ送付先マスタ
     */
    function announcement_mst() {
        $query = $this->db->get('announcement_mst');
        return $query->result();
    }
}

?>
