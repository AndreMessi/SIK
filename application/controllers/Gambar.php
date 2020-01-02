<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gambar extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        
        $this->load->model('GambarModel');
    }
    
    public function index(){
        $data['mahasiswa'] = $this->GambarModel->view();
        // $this->load->view('user/view', $data);
        

    }
    
    public function tambah(){
        // exit(json_encode($this->input->post()));
        $data = array();
        
        if($this->input->post('submit')){ // Jika user menekan tombol Submit (Simpan) pada form
            // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
            $upload = $this->GambarModel->upload();
            
            if($upload['result'] == "success"){ // Jika proses upload sukses
                 // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
                $this->GambarModel->save($upload);
                
                //redirect('user'); // Redirect kembali ke halaman awal / halaman view data
                //  echo 'anda gagal upload';
            }else{ // Jika proses upload gagal
                $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }
        
        $this->load->view('user/dashboard', $data);
    }

    public function save(){
		$config['upload_path'] = './images/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
        }
        
		$data_mhs = array(
			'nim'=>$this->input->post('nim'),
			'nama'=>$this->input->post('nama'),
			'jurusan'=>$this->input->post('jurusan'),
			'tglKirim'=>$this->input->post('tglKirim'),
			'gambar' => $return['file']['file_name'],
			
		);

		$data_dosen = array(
			'nama_dosen'=>$this->input->post('nama_dosen'),
			
		);

		$data_matkul = array(
			'nama_matkul'=>$this->input->post('nama_matkul'),
			'jlmh_sks'=>$this->input->post('jmlh_sks'),
			'kelas'=>$this->input->post('kelas'),
		);

		$mhs_id = $this->GambarModel->add_dml_get_id('mahasiswa',$data_mhs);
		$dosen_id = $this->GambarModel->add_dml_get_id('dosen',$data_dosen);
		$matkul_id = $this->GambarModel->add_dml_get_id('matakuliah',$data_matkul);

		$data_kompen = array(
			'id_mahasiswa'=>$mhs_id,
			'id_dosen'=>$dosen_id,
			'id_matakuliah'=>$matkul_id,
			'pertemuan_matkul'=>$this->input->post('pertemuan_matkul'),
			'thn_akademik'=>$this->input->post('thn_akademik'),
			'semester'=>$this->input->post('semester'),
			
		);

        $last = $this->db->insert('kompensasi', $data_kompen);
        if($last) redirect(base_url('index.php/user/dashboard'));
    }
	public function edit_status($id){

		$ds = $this->GambarModel->tampil_status(" where id_kompensasi = '$id'");
		$data = array(
			"id" => $ds[0]['id_kompensasi'],
			"status" => $ds[0]['status'],
		);
		$this->load->view('prodi/editstatus',$data);

	}
	public function status1(){
		$id = $_POST['id'];
		$status1 = $_POST['status'];
		$statusupdate = array(
			'status' => $status1
		);
		$where = array("id_kompensasi"=>$id);
		$hasil = $this->GambarModel->update_data_status('kompensasi',$statusupdate,$where);
		if($hasil > 0){
			redirect('prodi/dashboard');
		}
		else
		{
			echo "gagal";
		}

	}

}
