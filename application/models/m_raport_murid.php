<?php

class m_raport_murid extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function listKelas(){
		$query = $this->db->query('SELECT kode_kelas,concat(tingkat_kelas,keterangan_kelas) as ket_kelas FROM kelas where status = 1');
		return $query->result();
	}
}