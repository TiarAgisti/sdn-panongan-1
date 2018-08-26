<?php

class m_wali_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievewalimurid(){
        $query = $this->db->query('SELECT wl.kode_wali,wl.tahun_ajaran,g.nama_guru 
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM wali_kelas as wl 
        INNER JOIN guru as g on g.kode_guru = wl.kode_guru 
        INNER join kelas as kls on kls.kode_kelas = wl.kode_kelas
        where wl.status = 1');
        return $query->result();
    }
}