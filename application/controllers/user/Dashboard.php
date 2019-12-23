<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('GambarModel');
        //cek session dan level user
        if($this->admin->is_role() != "user"){
            redirect("login/");
        }
    }

    public function index()
    {

        $this->load->view("user/dashboard");            

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}