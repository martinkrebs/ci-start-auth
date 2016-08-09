<?php

// Not needed as only index.php is in public webroot folder
//defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        session_start();
    }

    public function index() {
        if (isset($_SESSION['username'])) {
            $this->load->view('welcome_message');
        } else {
            // minimal example
            // $this->load->view('load_view', ['view' => 'path/to/viewfile']);
            
            // full
             $data = [
                'heading' => 'Access Denied',
                'message' => 'You do not have permission to access this page',
                'view' => 'errors/html/error_403'
            ];             
            $this->load->view('load_view', $data);
        }
    }

}
