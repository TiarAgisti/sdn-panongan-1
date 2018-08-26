<?php
class m_kenaikan_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievelist(){
        $query = $this->db->query('SELECT tahun_ajaran,dari_kode_kelas,ke_kode_kelas 
        FROM kenaikan_kelas WHERE status = 1');
        return $query->result();
    }
}