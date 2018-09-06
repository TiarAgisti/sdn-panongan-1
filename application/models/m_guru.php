<?php

class m_guru extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function listguru(){
		$query = $this->db->query('SELECT * FROM guru where status = 1');
		return $query->result();
	}

	function getKodeGuru(){
		$query = $this->db->query("SELECT max(kode_guru) as max_code FROM guru");
		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id,1,5);

		$max_guru = $max_fix + 1;
		$kode_guru = "G".sprintf("%05s", $max_guru);
		return $kode_guru;
	}	
}