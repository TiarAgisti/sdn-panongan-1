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
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as tingkat_kelas
        ,mapel.nama_mapel
        FROM jadwal_mapel as jdwl
        INNER JOIN kelas as kls ON kls.kode_kelas = jdwl.kode_kelas
        INNER JOIN mata_pelajaran as mapel ON mapel.kode_mapel = jdwl.kode_mapel
        WHERE jdwl.status = 1');
        return $query->result();
    }

    function retrievejadwalbyhari($hari){
        $sql = "SELECT jdwl.kode_jadwal,case WHEN jdwl.hari = 1 THEN 'SENIN' 
        WHEN jdwl.hari = 2 THEN 'SELASA' 
        WHEN jdwl.hari = 3 THEN 'RABU' 
        WHEN jdwl.hari = 4 THEN 'KAMIS' 
        WHEN jdwl.hari = 5 THEN 'JUMAT' 
        WHEN jdwl.hari = 6 THEN 'SABTU' 
        WHEN jdwl.hari = 7 THEN 'MINGGU' ELSE '-' END as ket_hari
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as tingkat_kelas
        ,mapel.nama_mapel
        FROM jadwal_mapel as jdwl
        INNER JOIN kelas as kls ON kls.kode_kelas = jdwl.kode_kelas
        INNER JOIN mata_pelajaran as mapel ON mapel.kode_mapel = jdwl.kode_mapel
        WHERE jdwl.status = 1 and jdwl.hari='$hari'";
        $res = $this->db->query($sql)->result();
        return $res;   
    }

    function retrievejadwalbykelas($kelas){
        $sql = "SELECT jdwl.kode_jadwal,case WHEN jdwl.hari = 1 THEN 'SENIN' 
        WHEN jdwl.hari = 2 THEN 'SELASA' 
        WHEN jdwl.hari = 3 THEN 'RABU' 
        WHEN jdwl.hari = 4 THEN 'KAMIS' 
        WHEN jdwl.hari = 5 THEN 'JUMAT' 
        WHEN jdwl.hari = 6 THEN 'SABTU' 
        WHEN jdwl.hari = 7 THEN 'MINGGU' ELSE '-' END as ket_hari
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as tingkat_kelas
        ,mapel.nama_mapel
        FROM jadwal_mapel as jdwl
        INNER JOIN kelas as kls ON kls.kode_kelas = jdwl.kode_kelas
        INNER JOIN mata_pelajaran as mapel ON mapel.kode_mapel = jdwl.kode_mapel
        WHERE jdwl.status = 1 and jdwl.kode_kelas='$kelas'";
        $res = $this->db->query($sql)->result();
        return $res;   
    }

    function getKodeJadwal(){
        $query = $this->db->query("SELECT max(kode_jadwal) as max_code FROM jadwal_mapel");
        $row = $query->row_array();

        $max_id = $row['max_code'];
        $max_fix = (int) substr($max_id,1,5);

        $max_jadwal = $max_fix + 1;
        $kode_jadwal = "J".sprintf("%05s", $max_jadwal);
        return $kode_jadwal;
    }

    function RetrieveJadwalMapel($hari,$kelas,$mapel)
    {
        $query = "SELECT * FROM jadwal_mapel
            WHERE hari = '$hari' and kode_kelas = '$kelas' and kode_mapel = '$mapel'";
        
        $res =  $this->db->query($query)->row();
        return $res;
    }   
}