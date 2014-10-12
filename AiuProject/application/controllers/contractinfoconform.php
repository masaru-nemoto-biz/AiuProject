<?php
class ContractInfoConform extends CI_Controller {

    var $array;  // 契約情報
    
    function ContractInfoConform() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    /*
     * 契約情報追加ロジック
     */
    function conform_add() {
        
        $this->conform_Prepare();
        
        $this->contractInfo_model->insert_contract_data($this->array);
        
        $data['company_id'] = $this->session->userdata('company_id');
        $data['list1'] = $this->corpstatus_model->get_company_detail($data['company_id']);
        $data['list2'] = $this->contractInfo_model->get_contract_list($data['company_id']);
        $this->load->view('contractinfo_list_view', $data);
    }
    
    /*
     * 契約情報登録準備ロジック
     * 
     * 画面入力された契約情報を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $data['company_id'] = $this->session->userdata('company_id');
        
        $this->array = array('insurance_classification_id' => $this->input->post('corp_kana'),
            'insurance_company_id' => $this->input->post('insurance_company_id'),
            'company_id' => $data['company_id'],
            'brand_name' => $this->input->post('brand_name'),
            'division' => $this->input->post('division'),
            'policy_number' => $this->input->post('policy_number'),
            'insurance_period' => $this->input->post('insurance_period'),
            'contract_period' => $this->input->post('contract_period'),
            'month_p' => $this->input->post('month_p'),
            'yearly_payment' => $this->input->post('yearly_payment'),
            'anp' => $this->input->post('anp'),
            'total_anp' => $this->input->post('total_anp'));
    }
    
}
?>