<?php

class m_murid extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function listmurid(){
		$query = $this->db->query('SELECT * FROM murid where status = 1');
		return $query->result();
	}	
}