<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class modelKompensasi extends CI_Model {
    
    public function tigatable($where) {
        // $this->db->select('*,YEAR(k.thn_akademik) as thn_akademik');
        // $this->db->join('matakuliah mk','mk.id_matakuliah=k.id_matakuliah');
        // $this->db->join('dosen d','d.id_dosen=k.id_dosen');
        // $this->db->join('mahasiswa m','m.id_mahasiswa=k.id_matakuliah');
        // if(isset($where)) $this->db->where($where);
        // return $this->db->get('kompensasi k')->result();
        $this->db->select('*');
        $this->db->from('kompensasi');
        $this->db->join('mahasiswa','mahasiswa.id_mahasiswa = kompensasi.id_mahasiswa');
        $this->db->join('matakuliah','matakuliah.id_matakuliah = kompensasi.id_matakuliah');
        $this->db->join('dosen','dosen.id_dosen=kompensasi.id_dosen');
        //$this->db->where($aktif);
        $query = $this->db->get();
        return $query->result();
    }


    //contoh model
    function tesmodel() {
		return $this->db->query("SELECT * from kompensasi join mahasiswa on mahasiswa.id_mahasiswa=kompensasi.id_mahasiswa join matakuliah on matakuliah.id_matakuliah = kompensasi.id_matakuliah join dosen on kompensasi.id_dosen = dosen.id_dosen")->result();

	}

     function delete($id){
        return $this->db->delete(_table,array("id_kompensasi"=>$id));
    }


}