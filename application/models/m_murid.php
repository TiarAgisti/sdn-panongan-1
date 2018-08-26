<?php

class m_murid extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function listmurid(){
		$query = $this->db->query('SELECT m.kode_murid,m.nisn,m.nama_murid,m.tahun_ajaran
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM murid as m
        inner join kelas as kls on kls.kode_kelas = m.kode_kelas
        where m.status = 1');
		return $query->result();
	}	
}