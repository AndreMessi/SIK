<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('modelKompensasi');
        //cek session dan level user
        if($this->admin->is_role() != "admin"){
            redirect("login/");
        }
    }

    public function index()
    {
        $query = $this->db->query("SELECT * FROM mahasiswa join matakuliah ON mahasiswa.id_mahasiswa=matakuliah.id_matakuliah join kompensasi ON matakuliah.id_matakuliah = kompensasi.id_kompensasi join dosen ON kompensasi.id_dosen = dosen.id_dosen")->result();
        $data['title'] = "Join CodeIgniter"; 
        $data['join3'] = $query;
        
       $this->load->view("admin/dashboard",$data);       

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

   

}