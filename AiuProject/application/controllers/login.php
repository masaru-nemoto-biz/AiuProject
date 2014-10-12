<?php
class Login extends CI_Controller {
    
    function Login() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('user_table_model');
        $this->load->model('corpStatus_model');

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
        
        if ($user == 'master' and $password == 'master' and $this->input->post('move') == 'user manage') {
            $data['list'] = $this->user_table_model->get_user_list();
            $this->load->view('user_table_view', $data);

        } elseif ($count == 1 and $this->input->post('move') == 'Sign in') {
            // 遷移
            $data['list'] = $this->corpStatus_model->get_company_list();
            $this->load->view('corpinfo_list_view', $data);
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
