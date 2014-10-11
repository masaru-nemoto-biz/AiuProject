<?php
class Login extends CI_Controller {
    
    function Login() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        
        $this->load->model('user_table_model');
        $this->load->model('contractStatusList_model');

        $this->output->set_header('Content-Type: text/html; charset=UTF-8');

    }
    
    function index() {

        $this->load->view('login_view');
    }
    
    function success() {

        $user = $this->input->post('user');
        $password = $this->input->post('password');
        
        $count = $this->user_table_model->get_user_count($user, $password);
        
        if ($count == 1) {
            // 遷移
            $data['list'] = $this->contractStatusList_model->get_company_list();
            $this->load->view('contractStatusList_view', $data);
        } else {
            redirect('login/index');
        }

    }
}
?>
