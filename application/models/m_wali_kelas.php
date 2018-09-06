<?php

class m_wali_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievewalikelas(){
        $query = $this->db->query('SELECT wl.kode_wali,wl.tahun_ajaran,g.nama_guru 
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM wali_kelas as wl 
        INNER JOIN guru as g on g.kode_guru = wl.kode_guru 
        INNER join kelas as kls on kls.kode_kelas = wl.kode_kelas
        where wl.status = 1');
        return $query->result();
    }

    function getKodeWaliKelas(){
        $query = $this->db->query("SELECT max(kode_wali) as max_code FROM wali_kelas");
        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id,1,5);

        $max_wali = $max_fix + 1;
        $kode_wali = "W".sprintf("%05s", $max_wali);
        return $kode_wali;
    }   
}