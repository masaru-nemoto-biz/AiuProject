<?php
class User_table extends CI_Controller {
    
    function user_table() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('user_table_model');
        
        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $data['list'] = $this->user_table_model->get_user_list();
        $this->load->view('user_table_view', $data);
    }
    
    function userInfo_conform() {

        $data['check1'] = $this->input->post('check_radio');
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
        //$this->load->view('user_table_view', $data);
        $this->load->view('user_table_complete', $data);
    }
    
    function conform_add() {
        
//        $timedata = date('Y_m_d');
//        echo "$timedata";          この２行はできなかった。$timedataはdbにその値を入れることはできない。

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
        //$data['list'] = $this->user_table_model->get_user_list();
        //$this->load->view('user_table_view', $data);この画面で更新ボタンを押すと前回制作した同じ配列が増える
        $this->load->view('user_table_complete', $data);//この画面でも上と同じ現象
    }
    
    
    
    
    
}
?>
