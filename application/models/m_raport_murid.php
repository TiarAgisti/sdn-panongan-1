<?php

class m_raport_murid extends CI_Model{
	function __construct(){
        parent::__construct();
    }

	function retrieveKelas(){
		$sql = "SELECT wl.kode_kelas,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM wali_kelas as wl 
        INNER join kelas as kls on kls.kode_kelas = wl.kode_kelas
        where wl.status = 1";
		$res = $this->db->query($sql)->result();
		return $res;
	}

	function retrieveListMuridByKelas($kodeKelas){
		$query = "SELECT m.kode_murid,m.nisn,m.nama_murid,m.tahun_ajaran
			,m.kode_kelas,CONCAT(k.tingkat_kelas,k.keterangan_tingkat) as ket_kelas 
			FROM murid as m 
			INNER JOIN Kelas as k ON k.kode_kelas = m.kode_kelas 
			WHERE m.status = 1 and m.kode_kelas = '$kodeKelas'";
		$res = $this->db->query($query)->result();
		return $res;	
	}

	function get_kode_raport() {
  		$query = $this->db->query("SELECT COUNT(kode_raport) as max_kode_raport FROM raport_header"); 
  		$row = $query->row_array();
  		$max_id = $row['max_kode_raport'];
  		$kodeRaport = $max_id + 1;
  		return $kodeRaport;
 	}

 	function RetrieveMuridByKodeMurid($kodeMurid){
 		$query = "SELECT m.kode_murid,m.nisn,m.nama_murid,m.tahun_ajaran
			,m.kode_kelas,CONCAT(k.tingkat_kelas,k.keterangan_tingkat) as ket_kelas 
			FROM murid as m 
			INNER JOIN Kelas as k ON k.kode_kelas = m.kode_kelas 
			WHERE m.status = 1 and m.kode_murid = '$kodeMurid'";
 		$res =  $this->db->query($query)->row();
 		return $res;
 	}

 	function RetrieveWaliKelasByKodeKelas($kodeKelas){
 		$query = "SELECT w.kode_guru,g.nama_guru FROM wali_kelas as w
 		INNER JOIN guru as g ON g.kode_guru = w.kode_guru
 		WHERE w.status = 1 and w.kode_kelas = '$kodeKelas'";
 		$res =  $this->db->query($query)->row();
 		return $res;
 	}

 	function RetrieveListNilaiByKodeMurid($kodeMurid){
 		$query = "SELECT nm.kode_mapel,mapel.nama_mapel,kkm.nilai_kkm,nm.nilai
			, CASE WHEN nm.nilai > kkm.nilai_kkm THEN 'Terpenuhi' ELSE 'Tidak Terpenuhi' END keterangan 
			FROM nilai_murid as nm
			INNER JOIN mata_pelajaran AS mapel ON mapel.kode_mapel = nm.kode_mapel
			INNER JOIN kelas AS k ON k.kode_kelas = nm.kode_kelas
			INNER JOIN kkm_murid AS kkm ON kkm.kode_mapel = nm.kode_mapel AND k.tingkat_kelas = kkm.tingkat_kelas
			WHERE nm.kode_murid = '$kodeMurid'";

		$res = $this->db->query($query)->result();
		return $res;
 	}
}