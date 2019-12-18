<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('modelprodi');
        //cek session dan level user
        if($this->admin->is_role() != "prodi"){
            redirect("login/");
        }
    }

    public function index()
    {
        
  $data['title'] = "Join CodeIgniter"; 
  // query memanggil function duatable di model
  $where = array(
    //   '' => '',
  );
  $data['join3'] = $this->modelprodi->tigatable($where); 
//   print_r($data);
        $this->load->view("prodi/dashboard",$data);            

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}