<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('Home/loginPage');
        }
    }

    public function loginPage(){
        $this->load->view("login");
    }

    public function login() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        $users = $this->UserModel->get_user($username, $password);
        
        if ($users) {
            $session_data = array(
                'user_id' => $users->user_id,
                'username' => $users->username,
                'role' => $users->role_id, // Assume 'role' field in the database
                'logged_in' => TRUE
            );
            $this->session->set_userdata($session_data);
            
            // Redirect based on user role
            switch ($users->role_id) {
                case '1':
                    redirect('Administator/Dashboard');
                    break;
                case '2':
                    redirect('Karyawan/Dashboard');
                    break;
                case '3':
                    redirect('Teknisi/Dashboard');
                    break;
            }
        } else {
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('Dashboard');
        }
    }
    

    public function logout() {
        $this->session->sess_destroy();
        redirect('Home');
    }
}
