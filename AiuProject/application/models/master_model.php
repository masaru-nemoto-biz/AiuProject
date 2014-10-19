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

    /*
     * 保険種別マスタ
     */
    function insurance_classification_mst() {
        $query = $this->db->get('insurance_classification_mst');
        return $query->result();
    }
 
    /*
     * 保険会社マスタ
     */
    function insurance_company_mst() {
        $query = $this->db->get('insurance_company_mst');
        return $query->result();
    }
 
    /*
     * 法人区分マスタ
     */
    function corp_division_mst() {
        $query = $this->db->get('corp_division_mst');
        return $query->result();
    }
 
    /*
     * 事故ステータスマスタ
     */
    function accident_status_mst() {
        $query = $this->db->get('accident_status_mst');
        return $query->result();
    }
}

?>
