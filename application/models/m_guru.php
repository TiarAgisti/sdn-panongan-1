<?php

class m_guru extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function listguru(){
		$query = $this->db->query('SELECT * FROM guru where status = 1');
		return $query->result();
	}	
}