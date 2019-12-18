<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class modelKompensasi extends CI_Model {
    
    public function tigatable() {
        $this->db->select('*');
        $this->db->from('mahasiswa');
        $this->db->join('matakuliah','matakuliah.id_matakuliah=dosen.id_dosen');
        $this->db->join('kompensasi','kompensasi.id_kompensasi=matakuliah.id_matakuliah');
        $this->db->where($aktif);
        $query = $this->db->get();
        return $query->result();
    }


    //contoh model
    function tesmodel() {
		return $this->db->query("SELECT * FROM mahasiswa join matakuliah ON mahasiswa.id_mahasiswa=matakuliah.id_matakuliah join kompensasi ON matakuliah.id_matakuliah = kompensasi.id_kompensasi join dosen ON kompensasi.id_dosen = dosen.id_dosen")->result();

	}

}