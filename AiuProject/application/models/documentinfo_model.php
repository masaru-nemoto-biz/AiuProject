<?php
Class Documentinfo_model extends CI_Model {
    
    function Documentinfo_model(){
        parent::__construct();
        $this->load->helper(array('form','url'));
        $this->load->database();
    }

    function get_document_company($company_id, $type) {
        $this->db->from('document_info');
        $this->db->where('document_info.doc_type', $type);
        $this->db->where('document_info.company_id', $company_id);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    function get_document_contract($contract_id, $type) {
        $this->db->from('document_info');
        $this->db->where('document_info.doc_type', $type);
        $this->db->where('document_info.contract_id', $contract_id);
        $query = $this->db->get();
        
        return $query->result();
    }
}

?>
