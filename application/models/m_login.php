<?php

class m_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function retrieveuser(){
		$query = $this->db->query('SELECT kode_user,nama_user,tipe_user FROM users where status = 1');
		return $query->result();
	}

	function getKodeUser(){
		$query = $this->db->query("SELECT max(kode_user) as max_code FROM users");
		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id,1,5);

		$max_user = $max_fix + 1;
		$kode_user = "U".sprintf("%05s", $max_user);
		return $kode_user;
	}	
}