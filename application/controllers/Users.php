<?php

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();        
    }
    

    public function index() {
        if (isset($_SESSION['username'])) {
            redirect('welcome');
        } else {
            $data = [
                'heading' => 'You are currently not logged in.',
                'view' => 'not_logged_in'
            ];        
            $this->load->view('load_view', $data); 
        }
    }
    
    
    public function login() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
                'email_address', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules(
                'password', 'Password', 'required|min_length[4]');
        if ($this->form_validation->run() !== FALSE) {
            $this->load->model('user_model');
            $user = $this->user_model->get_user(
                    $this->input->post('email_address'), 
                    $this->input->post('password'));
            if ($user !== FALSE) {
                $_SESSION['username'] = $this->input->post('email_address');
                redirect('welcome');
            }
        } 
        $data = [
            'heading' => 'Login',
            'view' => 'login_register'
        ];        
        $this->load->view('load_view', $data);        
    }
    
    
    public function register() {
        $this->load->library('form_validation');
        $this->form_validation ->set_rules('email_address', 'Email Address',
                'required|valid_email|is_unique[users.email_address]');
        $this->form_validation->set_rules('password', 'Password', 
                'required|min_length[4]');        
        $data = [
            'heading' => 'Register',
            'view' => 'login_register'
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('load_view', $data);
        } else {
            $this->load->model('user_model');
            $this->user_model->create(
                    $this->input->post('email_address'),                       
                    $this->input->post('password'));
            $_SESSION['username'] = $this->input->post('email_address');
            redirect('welcome');             
        }
    }
    

    public function logout() {
        unset($_SESSION['username']);
        redirect('users');
    }

}
