<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class modelProdi extends CI_Model {
    
    public function tigatable($where) {
        $this->db->select('*,YEAR(k.thn_akademik) as thn_akademik');
        $this->db->join('matakuliah mk','mk.id_matakuliah=k.id_matakuliah');
        $this->db->join('dosen d','d.id_dosen=k.id_dosen');
        $this->db->join('mahasiswa m','m.id_mahasiswa=k.id_matakuliah');
        if(isset($where)) $this->db->where($where);
        return $this->db->get('kompensasi k')->result();
    }


    //contoh model
    function tesmodel() {
		return $this->db->query("SELECT * FROM mahasiswa join matakuliah ON mahasiswa.id_mahasiswa=matakuliah.id_matakuliah join kompensasi ON matakuliah.id_matakuliah = kompensasi.id_kompensasi join dosen ON kompensasi.id_dosen = dosen.id_dosen")->result();

	}

}