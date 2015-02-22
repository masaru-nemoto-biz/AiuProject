<?php
Class Documentinfo_model extends CI_Model {
    
    function Documentinfo_model(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
    }

    function get_document_company($company_id) {
        $this->db->from('document_info');
        $this->db->where('document_info.doc_type', '1');
        $this->db->where('document_info.company_id', $company_id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
}

?>
