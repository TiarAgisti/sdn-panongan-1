<?php
class m_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievekelas(){
        $query = $this->db->query('SELECT * FROM kelas where status = 1');
        return $query->result();
    }
}