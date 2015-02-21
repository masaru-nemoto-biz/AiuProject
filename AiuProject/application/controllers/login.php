<?php
class Login extends CI_Controller {
    
    function Login() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('user_table_model');

        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $this->load->view('login_view');
    }
    
    /*
     * ログイン機能
     */
    function success() {

        $user = $this->input->post('user');
        $password = $this->input->post('password');
        
        $count = $this->user_table_model->get_user_count($user, $password);
        $data['user_data'] = $this->user_table_model->get_login_user_data($user)->row(0);
        $this->session->set_userdata('user_name', $data['user_data']->user_name);
        $this->session->set_userdata('user_mail_address', $data['user_data']->user_mail_address);
        
        if ($user == 'master' and $password == 'master' and $this->input->post('move') == 'user manage') {
            $data['list'] = $this->user_table_model->get_user_list();
            $this->load->view('user_table_view', $data);

        } elseif ($count == 1 and $this->input->post('move') == 'Sign in') {
            // 遷移
            //redirect('contractinfolist/index');
            $this->session->set_userdata('user', $this->input->post('user'));
            redirect('main/index');
//            redirect('pdf_test/index');
        } else {
            redirect('login/index');
        }
    }
    
    /*
     * ユーザー管理画面へ
     */
    function user_manage() {
        
        $data['list'] = $this->user_table_model->get_user_list();
        $this->load->view('user_table_view', $data);

    }
}
?>
