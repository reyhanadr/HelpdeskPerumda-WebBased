<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function index() {
        $this->load->view('administator/templates/header');
        $this->load->view('administator/templates/sidebar');
        $this->load->view('administator/dashboard');
        $this->load->view('administator/templates/footer');
    } 
}
