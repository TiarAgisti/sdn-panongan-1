<?php

class m_raport_murid extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function retrieveKelas(){
		$query = $this->db->query('SELECT kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas FROM kelas where status = 1');
		return $query->result();
	}

	function retrieveMuridByKelas($kodeKelas){
		$query = $this->db->query("SELECT m.kode_murid,m.nisn,m.nama_murid,m.tahun_ajaran
			,m.kode_kelas,CONCAT(k.tingkat_kelas,k.keterangan_tingkat) as ket_kelas 
			FROM murid as m 
			INNER JOIN Kelas as k ON k.kode_kelas = m.kode_kelas 
			WHERE m.status = 1 and m.kode_kelas = '$kodeKelas'");
		return $query->result();	
	}
}