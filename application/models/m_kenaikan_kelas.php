<?php
class m_kenaikan_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievelist(){
        $query = $this->db->query('SELECT kk.tahun_ajaran
        ,kls1.tingkat_kelas as dari_kelas
        ,kls2.tingkat_kelas as ke_kelas
        FROM kenaikan_kelas as kk
        INNER JOIN kelas as kls1 ON kls1.kode_kelas = kk.dari_kode_kelas
        INNER JOIN kelas as kls2 ON kls2.kode_kelas = kk.ke_kode_kelas
        WHERE kk.status = 1');
        return $query->result();
    }
}