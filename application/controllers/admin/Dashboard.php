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
        $query = $this->db->query("SELECT kompensasi.pertemuan_matkul, mahasiswa.nim, mahasiswa.nama, matakuliah.nama_matkul,matakuliah.kelas, dosen.nama_dosen FROM kompensasi JOIN mahasiswa ON kompensasi.id_mahasiswa = mahasiswa.id_mahasiswa JOIN dosen ON kompensasi.id_dosen = dosen.id_dosen JOIN matakuliah ON kompensasi.id_matakuliah = matakuliah.id_matakuliah")->result();
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