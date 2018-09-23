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
  		$query = $this->db->query("SELECT MAX(kode_raport) as max_kode_raport FROM raport_header"); 
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

 	function RetrieveRaportHeader($pilih,$txtCari)
 	{
 		$query = "";
 		if ($pilih == 1){
 			$query = "SELECT rh.kode_raport,rh.kode_guru , g.nama_guru, m.nama_murid, CONCAT(k.tingkat_kelas,k.keterangan_tingkat) AS ket_kelas
			, rh.tahun_ajaran, rh.sakit, rh.ijin, rh.alpa, rh.keterangan
			FROM raport_header AS rh
			INNER JOIN guru AS g ON g.kode_guru = rh.kode_guru
			INNER JOIN murid AS m ON m.kode_murid = rh.kode_murid
			INNER JOIN kelas AS k ON k.kode_kelas = rh.kode_kelas
			WHERE rh.kode_murid = '$txtCari'";
 		}else{
	 		$query = "SELECT rh.kode_raport,rh.kode_guru , g.nama_guru, m.nama_murid, CONCAT(k.tingkat_kelas,k.keterangan_tingkat) AS ket_kelas
			, rh.tahun_ajaran, rh.sakit, rh.ijin, rh.alpa, rh.keterangan
			FROM raport_header AS rh
			INNER JOIN guru AS g ON g.kode_guru = rh.kode_guru
			INNER JOIN murid AS m ON m.kode_murid = rh.kode_murid
			INNER JOIN kelas AS k ON k.kode_kelas = rh.kode_kelas
			WHERE m.nisn = '$txtCari'";
 		}
 		
 		$res =  $this->db->query($query)->row();
 		return $res;
 	}

 	function RetrieveRaportDetail($kodeRaport)
 	{
 		$query = "SELECT rd.kode_raport,rd.kode_raport_detail,rd.kode_mapel,mapel.nama_mapel
			,kkm.nilai_kkm,rd.nilai,CASE WHEN rd.nilai > kkm.nilai_kkm THEN 'Terpenuhi'ELSE 'Tidak Terpenuhi' END keterangan
			FROM raport_detail AS rd
			INNER JOIN raport_header AS rh ON rh.kode_raport = rd.kode_raport
			INNER JOIN mata_pelajaran AS mapel ON mapel.kode_mapel = rd.kode_mapel     
			INNER JOIN kelas AS k ON rh.kode_kelas = k.kode_kelas
			INNER JOIN kkm_murid AS kkm ON kkm.kode_mapel = rd.kode_mapel AND kkm.tingkat_kelas = k.tingkat_kelas
			WHERE rd.kode_raport = '$kodeRaport'";
		$res = $this->db->query($query)->result();
		return $res;
 	}
}