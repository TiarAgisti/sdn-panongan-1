<?php
class m_kelas extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    function retrievekelas(){
        $query = $this->db->query('SELECT * FROM kelas where status = 1');
        return $query->result();
    }

    function getKodeKelas(){
		$query = $this->db->query("SELECT max(kode_kelas) as max_code FROM kelas");
		$row = $query->row_array();

		$max_id = $row['max_code'];
		$max_fix = (int) substr($max_id,1,5);

		$max_kelas = $max_fix + 1;
		$kode_kelas = "K".sprintf("%05s", $max_kelas);
		return $kode_kelas;
	}
}