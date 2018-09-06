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

    function getKodeMurid(){
        $query = $this->db->query("SELECT max(kode_murid) as max_code FROM murid");
        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id,1,5);

        $max_murid = $max_fix + 1;
        $kode_murid = "S".sprintf("%05s", $max_murid);
        return $kode_murid;
    }   	
}