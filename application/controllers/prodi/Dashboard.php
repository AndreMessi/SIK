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
        $query = $this->db->query("SELECT kompensasi.pertemuan_matkul, kompensasi.status, kompensasi.thn_akademik, kompensasi.semester, mahasiswa.nim, mahasiswa.nama, mahasiswa.gambar, mahasiswa.tglKirim, matakuliah.nama_matkul,matakuliah.kelas, dosen.nama_dosen FROM kompensasi JOIN mahasiswa ON kompensasi.id_mahasiswa = mahasiswa.id_mahasiswa JOIN dosen ON kompensasi.id_dosen = dosen.id_dosen JOIN matakuliah ON kompensasi.id_matakuliah = matakuliah.id_matakuliah ORDER BY id_kompensasi DESC")->result();
        $data['title'] = "Join CodeIgniter"; 
        
        $where = array(
            //   '' => '',
        );

        $data['join3'] = $this->modelprodi->tigatable($where, $query); 

       $this->load->view("prodi/dashboard",$data);       

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}