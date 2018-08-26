<?php

class m_mapel extends CI_Model{
	 function __construct(){
        parent::__construct();
    }

	function listmapel(){
		$query = $this->db->query('SELECT * FROM mata_pelajaran where status = 1');
		return $query->result();
	}
	
	function getKodeMapel(){
		$query = $this->db->query("SELECT max(kode_mapel) as max_code FROM mata_pelajaran");
		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id,1,5);

		$max_mapel = $max_fix + 1;
		$kode_mapel = "M".sprintf("%05s", $max_mapel);
		return $kode_mapel;
	}
}