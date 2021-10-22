<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_page extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('modelLogin');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $process = $this->modelLogin->process_login();

        if ($process == 1) {
            # redirect to teacher page
            redirect('teacher', 'refresh');
        } elseif ($process == 2) {
            # redirect to administrator page
            redirect('pageAdmin', 'refresh');
        } elseif ($process == 3) {
            # wrong password
            redirect('login_page', 'refresh');
        } elseif ($process == 4) {
            # email not registered
            redirect('login_page', 'refresh');
        }
    }
}

/* End of file Login_page.php */
