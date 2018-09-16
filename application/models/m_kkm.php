<?php

class m_kkm extends CI_Model{	
	function retrievekkm(){
		$query = $this->db->query('SELECT kkm.kode_kkm,kkm.tingkat_kelas,kkm.nilai_kkm,mapel.nama_mapel FROM kkm_murid as kkm 
		inner join mata_pelajaran as mapel on mapel.kode_mapel = kkm.kode_mapel where kkm.status = 1');
		return $query->result();
	}

	function getKodeKKM(){
		$query = $this->db->query("SELECT max(kode_kkm) as max_code FROM kkm_murid");
		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id,1,5);

		$max_kkm = $max_fix + 1;
		$kode_kkm = "N".sprintf("%05s", $max_kkm);
		return $kode_kkm;
	}	
}