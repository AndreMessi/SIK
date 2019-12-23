<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GambarModel extends CI_Model {
	// Fungsi untuk menampilkan semua data gambar
	public function view(){
		return $this->db->get('mahasiswa')->result();
	}
	
	// Fungsi untuk melakukan proses upload file
	public function upload(){
		$config['upload_path'] = './images';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']	= '2048';
		$config['remove_space'] = TRUE;
	
		$this->load->library('upload', $config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	function add_dml_get_id($table,$data){
		$this->db->insert($table, $data);
		$insert_id = $this->db->insert_id();
	 
		return $insert_id;
 }
	// Fungsi untuk menyimpan data ke database
	public function save($upload){
		$data_mhs = array(
			'nim'=>$this->input->post('nim'),
			'nama'=>$this->input->post('nama'),
			'jurusan'=>$this->input->post('jurusan'),
			'input_gambar' => $upload['file']['file_name'],
			
		);

		$data_dosen = array(
			'nama_dosen'=>$this->input->post('nama_dosen'),
			
		);

		$data_matkul = array(
			'nama_matkul'=>$this->input->post('nama_matkul'),
			'jlmh_sks'=>$this->input->post('jmlh_sks'),
			'kelas'=>$this->input->post('kelas'),
		);

		$mhs_id = $this->add_dml_get_id('mahasiswa',$data_mhs);
		$dosen_id = $this->add_dml_get_id('dosen',$data_dosen);
		$matkul_id = $this->add_dml_get_id('matakuliah',$data_matkul);

		$data_kompen = array(
			'id_mahasiswa'=>$mhs_id,
			'id_dosen'=>$dosen_id,
			'id_matakuliah'=>$matkul_id,
			'pertemuan_matkul'=>$this->input->post('pertemuan_matkul'),
			'thn_akademik'=>date_format($this->input->post('thn_akademik')),
			'semester'=>$this->input->post('semester'),
			
		);

		$this->db->insert('kompensasi', $data_kompen);
	}
	
}
