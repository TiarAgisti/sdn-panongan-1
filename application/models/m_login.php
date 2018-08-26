<?php

class m_login extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}
	
	function retrieveuser(){
		$query = $this->db->query('SELECT kode_user,nama_user,tipe_user FROM users where status = 1');
		return $query->result();
	}
}