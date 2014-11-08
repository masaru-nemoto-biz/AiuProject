<?php
class User_table extends CI_Controller {
    
    function user_table() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('user_table_model');
        
        $this->load->library('session');
        $this->load->model('corpStatus_model');
        $this->load->model('contractInfo_model');
        $this->load->model('master_model');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['message'] = $this->session->userdata('message');
        
        $data['list'] = $this->user_table_model->get_user_list();
        $this->load->view('user_table_view', $data);
    }
    
    /*
     * 遷移先画面判定ロジック
     * 
     * ボタン押下時のバリュー値によって遷移先画面を判定し、
     * 遷移先画面毎に別理を行う。
     */
    function user_Info_conform() {

        $this->session->set_userdata('user_num', $this->input->post('check_radio'));
        
        $data['move'] = $this->input->post('move');
        $this->session->unset_userdata('message');
        
        if ($data['move'] == 'ユーザー情報登録画面へ') {
            $this->userInfo_add();
        } elseif ($data['move'] == 'ユーザー情報変更画面へ') {
            $this->userInfo_conform();
        } elseif ($data['move'] == '削除') {
            $this->userInfo_delete();
        } else {
            $this->index();
        }
    }
    
    function userInfo_conform() {
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '変更したい企業にチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('user_table/index');
        }
        
        $data['user_data'] = $this->user_table_model->get_user_data($data['check1']);
        foreach ($data['user_data'] as $row) {
            $user_num = $row->user_num;
        }
        $this->load->library('session');
        $this->session->set_userdata('user_num', $user_num);
//        $data['test1']= $this->session->userdata('company_id');
        $this->load->view('userinfo_conform_view', $data);
        
    }
    
        
    function userInfo_add() {
        $data['user_data'] = null;
        $this->load->view('userinfo_conform_view', $data);
    }
    
    function conform() {
        
        $data['user_name'] = $this->input->post('user_name');
        $array = array(
            'user_id' => $this->input->post('user_id'),
            'password' => $this->input->post('password'),
            'user_name' => $this->input->post('user_name'),
            'user_name_kana' => $this->input->post('user_name_kana'),
            'authority' => $this->input->post('authority'),
            'registration_time_and_date' => (date('Y_m_d H:i:s')),
            'renovate_time_and_date' => (date('Y_m_d H:i:s')),
            'registration_user_id' => $this->input->post('registration_user_id'),
            'renovate_user_id' => $this->input->post('renovate_user_id'));
        $this->user_table_model->set_user_data($this->session->userdata('user_num'), $array);
        
        $data['user_data'] = $this->user_table_model->get_user_data($this->session->userdata('user_num'), $array);
        $data['list'] = $this->user_table_model->get_user_list();
        $this->load->view('user_table_view', $data);
    }
    
    function conform_add() {

        $data['user_name'] = $this->input->post('user_name');
        $array = array(
            'user_id' => $this->input->post('user_id'),
            'password' => $this->input->post('password'),
            'user_name' => $this->input->post('user_name'),
            'user_name_kana' => $this->input->post('user_name_kana'),
            'authority' => $this->input->post('authority'),
            'registration_time_and_date' => (date('Y_m_d H:i:s')),
            'renovate_time_and_date' => (date('Y_m_d H:i:s')),
            'registration_user_id' => $this->input->post('registration_user_id'),
            'renovate_user_id' => $this->input->post('renovate_user_id'));
        $this->user_table_model->insert_user_data($array);
        
        $data['user_data'] = $this->user_table_model->get_user_data($this->session->userdata('user_num'));
        $this->load->view('user_table_view', $data);
    }
    
    /*
     * ユーザー情報削除
     */
    function userInfo_delete() {
        
        $data['check1'] = $this->input->post('check_radio');
        
        if (empty($data['check1'])) {
            // チェックなしの場合は自画面遷移
            $message = '削除したいユーザーにチェックを入れてください';
            $this->session->set_userdata('message', $message);
            redirect('user_table/index');
        }
        
        $this->user_table_model->set_user_delflg($this->session->userdata('user_num'));
        
        redirect('user_table/index');
    }  
}
?>
