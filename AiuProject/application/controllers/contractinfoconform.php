<?php
class ContractInfoConform extends CI_Controller {

    var $array;  // 契約情報
    
    function ContractInfoConform() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model('corpstatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        $this->load->model('history_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }

    function index() {
                
        $data['contract_list'] = $this->contractInfo_model->get_contract_info($this->session->userdata('contract_id'));
        $data['insurance_classification_mst'] = $this->master_model->insurance_classification_mst();
        $data['insurance_company_mst'] = $this->master_model->insurance_company_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        $data['contract_status_mst'] = $this->master_model->contract_status_mst();
        
        $data['car_list'] = $this->contractInfo_model->get_car_info($this->session->userdata('contract_id'));
        
        $this->load->view('contractinfo_conform_view', $data);
    }
    
    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function conform() {
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == '戻る') {
            // メインメニューから来た場合、company_idをsessionに持っていない為、ここでcontract_idから逆引きしてセット        
            $data['company_id'] = $this->contractInfo_model->get_company_id($this->session->userdata('contract_id'));
            foreach ($data['company_id'] as $row) {
                $this->session->set_userdata('company_id', $row->company_id);
            }
            redirect('contractinfolist/index');
        } elseif ($data['move'] == '登録') {
            $this->conform_add();
        } else {
            $this->index();
        }
    }
    /*
     * 契約情報追加ロジック
     */
    function conform_add() {

        $data['company_data'] = $this->corpstatus_model->get_company_data($this->session->userdata('company_id'))->row(0);
        $corp_name = $data['company_data']->corp_name;
        
        $contract_id = $this->session->userdata('contract_id');
        $this->conform_Prepare();

        
        if (empty($contract_id)){
            $this->contractInfo_model->insert_contract_data($this->array);
            $this->history_model->insert_history('契約情報が追加されました', $this->session->userdata('user'), $corp_name);
            redirect('contractinfolist/index');
        } else {
            $this->contractInfo_model->set_contract_data($contract_id, $this->array);
        
            $data['car_list'] = $this->contractInfo_model->get_car_info($this->session->userdata('contract_id'));
            foreach ($data['car_list'] as $row) {
                $this->car_conform_Prepare($row->carinfo_no);
                $this->contractInfo_model->set_car_data($row->carinfo_no, $this->array_car);
            }
            
            $carinfo_no = $this->input->post('add_date');
            if (!empty($carinfo_no)) {
                $this->car_conform_Prepare_new($contract_id);
                $this->contractInfo_model->insert_car_data($this->array_newcar);
            }
            $this->history_model->insert_history('契約情報が更新されました', $this->session->userdata('user'), $corp_name);
            redirect('contractinfoconform/index');
        }
        
        
    }
    
    /*
     * 契約情報登録準備ロジック
     * 
     * 画面入力された契約情報を各変数へ詰め替える
     */
    function conform_Prepare() {
        
        $data['company_id'] = $this->session->userdata('company_id');
        
        $this->array = array('insurance_classification_id' => $this->input->post('insurance_classification_id'),
            'insurance_company_id' => $this->input->post('insurance_company_id'),
            'company_id' => $data['company_id'],
            'brand_name' => $this->input->post('brand_name'),
            'division' => $this->input->post('division'),
            'policy_number' => $this->input->post('policy_number'),
            'policy_branch_number' => $this->input->post('policy_branch_number'),
            'contract_period_y' => $this->input->post('contract_period_y'),
            'contract_period_m' => $this->input->post('contract_period_m'),
            'contract_period_d' => $this->input->post('contract_period_d'),
            'insurance_period_start' => $this->input->post('insurance_period_start'),
            'insurance_period_end' => $this->input->post('insurance_period_end'),
            'month_p' => $this->input->post('month_p'),
            'yearly_payment' => $this->input->post('yearly_payment'),
            'anp' => $this->input->post('anp'),
            'total_anp' => $this->input->post('total_anp'),
            'contract_status' => $this->input->post('contract_status'),
            'contract_owner' => $this->input->post('contract_owner'));
    }

    /*
     * 契約情報登録準備ロジック
     * 
     * 画面入力された契約情報を各変数へ詰め替える
     */
    function car_conform_Prepare($carinfo_no) {
                
        $this->array_car = array('car_name' => $this->input->post('car_name' .$carinfo_no),
            'regist_num' => $this->input->post('regist_num' .$carinfo_no),
            'car_type' => $this->input->post('car_type' .$carinfo_no),
            'int_person' => $this->input->post('int_person' .$carinfo_no),
            'int_object' => $this->input->post('int_object' .$carinfo_no),
            'passenger' => $this->input->post('passenger' .$carinfo_no),
            'personal_injury' => $this->input->post('personal_injury' .$carinfo_no),
            'vehicle' => $this->input->post('vehicle' .$carinfo_no),
            'remarks' => $this->input->post('remarks' .$carinfo_no),
            'add_date' => $this->input->post('add_date' .$carinfo_no),
            'scrap_date' => $this->input->post('scrap_date' .$carinfo_no),
            'insurance' => $this->input->post('insurance' .$carinfo_no));
    }
    
    /*
     * 契約情報登録準備ロジック
     * 
     * 画面入力された契約情報を各変数へ詰め替える
     */
    function car_conform_Prepare_new($contract_id) {
        
        $data['company_id'] = $this->session->userdata('company_id');
        
        $this->array_newcar = array('contract_id' => $contract_id,
            'company_id' => $data['company_id'],
            'car_name' => $this->input->post('car_name'),
            'regist_num' => $this->input->post('regist_num'),
            'car_type' => $this->input->post('car_type'),
            'int_person' => $this->input->post('int_person'),
            'int_object' => $this->input->post('int_object'),
            'passenger' => $this->input->post('passenger'),
            'personal_injury' => $this->input->post('personal_injury'),
            'vehicle' => $this->input->post('vehicle'),
            'remarks' => $this->input->post('remarks'),
            'add_date' => $this->input->post('add_date'),
            'scrap_date' => $this->input->post('scrap_date'),
            'insurance' => $this->input->post('insurance'));
    }
}
?>
