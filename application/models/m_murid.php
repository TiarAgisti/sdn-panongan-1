<?php

class m_murid extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function listmurid(){
		$query = $this->db->query('SELECT kode_murid,nisn,nama_murid,tahun_ajaran
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM murid as m
        inner join kelas as kls on kls.kode_kelas = m.kode_kelas');
		return $query->result();
	}	
}