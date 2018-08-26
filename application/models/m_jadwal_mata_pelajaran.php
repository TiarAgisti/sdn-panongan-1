<?php
class m_jadwal_mata_pelajaran extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievejadwal(){
        $query = $this->db->query('SELECT jdwl.kode_jadwal,case WHEN jdwl.hari = 1 THEN "SENIN" 
        WHEN jdwl.hari = 2 THEN "SELASA" 
        WHEN jdwl.hari = 3 THEN "RABU" 
        WHEN jdwl.hari = 4 THEN "KAMIS" 
        WHEN jdwl.hari = 5 THEN "JUMAT" 
        WHEN jdwl.hari = 6 THEN "SABTU" 
        WHEN jdwl.hari = 7 THEN "MINGGU" ELSE "-" END as ket_hari
        ,kls.tingkat_kelas
        ,mapel.nama_mapel
        FROM jadwal_mapel as jdwl
        INNER JOIN kelas as kls ON kls.kode_kelas = jdwl.kode_kelas
        INNER JOIN mata_pelajaran as mapel ON mapel.kode_mapel = jdwl.kode_mapel
        WHERE jdwl.status = 1');
        return $query->result();
    }
}