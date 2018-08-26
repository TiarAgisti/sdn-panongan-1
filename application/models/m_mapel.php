<?php

class m_mapel extends CI_Model{
	 function __construct(){
        parent::__construct();
    }

	function listmapel(){
		$query = $this->db->query('SELECT * FROM mata_pelajaran where status = 1');
		return $query->result();
	}	
}