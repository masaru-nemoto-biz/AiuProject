<?php
class CorpInfoList extends CI_Controller {
    
    var $message;
    
    function CorpInfoList() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->library('session');
        $this->load->model('corpStatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('accident_model');
        $this->load->model('master_model');
        $this->load->model('documentinfo_model');
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        
        $data['fire'] = $this->corpStatus_model->get_3m_ago('1');
        $data['accident'] = $this->corpStatus_model->get_3m_ago('2');
        $data['liability'] = $this->corpStatus_model->get_3m_ago('3');
        $data['large'] = $this->corpStatus_model->get_3m_ago('4');
        $data['other'] = $this->corpStatus_model->get_3m_ago('5');
        $data['auto'] = $this->corpStatus_model->get_3m_ago('6');
        $data['count_acc'] = $this->corpStatus_model->get_accident();
        $data['list'] = $this->corpStatus_model->get_company_list();
        $data['list2'] = $this->contractInfo_model->get_contract_all();
        $data['acc_list'] = $this->accident_model->get_accident_all();
        
        $this->load->view('corpinfo_list_view', $data);
    }

    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function contractInfo_conform() {

        $this->session->set_userdata('company_id', $this->input->post('check_radio'));
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == '情報変更/追加') {
            $this->contractInfo_change();
        } elseif ($data['move'] == '情報照会') {
            $this->contractInfo_reference();
        } elseif ($data['move'] == '新規登録') {
            $this->contractInfo_add();
        } elseif ($data['move'] == '契約状況一覧') {
            $this->move_contractInfo();
        } elseif ($data['move'] == '削除') {
            $this->contractInfo_delete();
        } elseif ($data['move'] == '契約者書類') {
            $this->customer_document();
        } else {
            $this->index();
        }
    }

    /*
     * 情報照会画面へ
     */
    function contractInfo_reference() {
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '参照したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('corpinfolist/index');
        }
        
        $data['company_data'] = $this->corpStatus_model->get_company_data($data['check1'])->row(0);
        $company_id = $data['company_data']->company_id;

        $data['representative'] = $this->corpStatus_model->get_representative_data($data['check1'])->row(0);
        
        $data['contract'] = $this->corpStatus_model->get_contract_data($data['check1'])->row(0);
        
        $data['bank'] = $this->corpStatus_model->get_bank_data($data['check1']);
        
        $data['other'] = $this->corpStatus_model->get_other_data($data['check1']);

        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);

        $data['sex_mst'] = $this->master_model->get_sex_list();
        $data['jurid_personal_mst'] = $this->master_model->jurid_personal_mst();
        $data['deposits_event_mst'] = $this->master_model->deposits_event_mst();
        $data['announcement_mst'] = $this->master_model->announcement_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        
        $this->load->view('corpinfo_reference_view', $data);
    }
    
    
    /*
     * 契約者情報追加画面へ
     */
    function contractInfo_add() {
        $data['company_data'] = null;
        $data['sex_mst'] = $this->master_model->get_sex_list();
        $data['jurid_personal_mst'] = $this->master_model->jurid_personal_mst();
        $data['deposits_event_mst'] = $this->master_model->deposits_event_mst();
        $data['announcement_mst'] = $this->master_model->announcement_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        
        $this->load->view('corpinfo_conform_view', $data);
    }
    
    /*
     * 情報変更/追加画面へ
     */
    function contractInfo_change() {
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('corpinfolist/index');
        }

        $data['company_data'] = $this->corpStatus_model->get_company_data($data['check1'])->row(0);
        $company_id = $data['company_data']->company_id;

        $data['representative'] = $this->corpStatus_model->get_representative_data($data['check1'])->row(0);
        
        $data['contract'] = $this->corpStatus_model->get_contract_data($data['check1'])->row(0);
        
        $data['bank'] = $this->corpStatus_model->get_bank_data($data['check1']);
        foreach ($data['bank'] as $row) {
            $company_id = $row->company_id;
        }
        
        $data['other'] = $this->corpStatus_model->get_other_data($data['check1']);
        foreach ($data['other'] as $row) {
            $company_id = $row->company_id;
        }
        $this->load->library('session');
        $this->session->set_userdata('company_id', $company_id);
        
        $data['sex_mst'] = $this->master_model->get_sex_list();
        $data['jurid_personal_mst'] = $this->master_model->jurid_personal_mst();
        $data['deposits_event_mst'] = $this->master_model->deposits_event_mst();
        $data['announcement_mst'] = $this->master_model->announcement_mst();
        $data['corp_division_mst'] = $this->master_model->corp_division_mst();
        
        $this->load->view('corpinfo_conform_view', $data);
    }

    /*
     * 契約情報画面へ
     */
    function move_contractInfo() {
        $data['company_id'] = $this->input->post('check_radio');
                
        if (empty($data['company_id'])) {
            // チェックなしの場合は自画面遷移
            $message = '参照したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('corpinfolist/index');
        }
        
        redirect('contractinfolist/index');
    }

    /*
     * ファイルアップロード
     */
    function do_upload() {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
        $config['overwrite']  = 'TRUE';
        $config['remove_spaces']  = 'TRUE';

        $this->load->library('upload', $config);
        $file_name = null;
   
        if ( ! $this->upload->do_upload()) {
            $data['message'] = $this->upload->display_errors();
        } else {
            $data['file_name'] =$this->upload->file_name();
            $this->corpStatus_model->set_upload_data($this->session->userdata('company_id'),$this->upload->file_name());
        }
        
        $data['contract_detail'] = $this->corpStatus_model->get_contract_data($this->session->userdata('company_id'));
        $this->load->view('customer_reference_view', $data);
    }

    /*
     * 契約者情報削除
     */
    function contractInfo_delete() {
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '削除したい契約者にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('corpinfolist/index');
        }
        
        $this->corpStatus_model->set_company_del($this->session->userdata('company_id'));
        
        redirect('corpinfolist/index');
    }

    /*
     * 契約者書類画面へ
     */
    function customer_document() {
        $data['check1'] = $this->input->post('check_radio');
                
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '参照したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('corpinfolist/index');
        }
        $data['list1'] = $this->corpStatus_model->get_company_detail($this->session->userdata('company_id'));
        $data['doclist'] = $this->documentinfo_model->get_document_company($this->session->userdata('company_id'), '1');
        $data['doclist2'] = $this->documentinfo_model->get_document_company($this->session->userdata('company_id'), '2');
        $data['doclist3'] = $this->documentinfo_model->get_document_company($this->session->userdata('company_id'), '3');
        $data['doclist4'] = $this->documentinfo_model->get_document_company($this->session->userdata('company_id'), '4');
        $this->load->view('customer_ref_view', $data);
    }
}
?>
