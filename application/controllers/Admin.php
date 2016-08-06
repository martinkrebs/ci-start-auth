<?php

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        if (isset($_SESSION['username'])) {
            redirect('welcome');
        }

        $this->load->library('form_validation');
        $this->form_validation->set_rules(
                'email_address', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules(
                'password', 'Password', 'required|min_length[4]');

        if ($this->form_validation->run() !== FALSE) {
            $this->load->model('admin_model');
            $user = $this->admin_model->verify_user(
                    $this->input->post('email_address'), $this->input->post('password'));
            if ($user !== FALSE) {
                $_SESSION['username'] = $this->input->post('email_address');
                redirect('welcome');
            }
        }

        $this->load->view('login_view');
    }

    public function logout() {
        unset($_SESSION['username']);
        redirect('admin');
    }

}
