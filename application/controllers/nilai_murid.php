<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nilai_murid extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_murid');

        if($this->session->userdata('status') != "login")
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info'>
             <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
             <strong><span class='glyphicon glyphicon-remove-sign'></span></strong> Silahkan login terlebih dahulu.
             </div>");
            redirect('login');
        }
    }

    
    function index()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "nilai_murid/v_list_nilai";

        $listmurid = $this->m_murid->listmurid();
        $data['listmurid'] = $listmurid;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "nilai_murid/v_add_nilai";

        $kodeMurid = $this->uri->segment(3);

        $sql_murid = "SELECT m.kode_murid,m.nisn,m.nama_murid,m.tahun_ajaran,m.kode_kelas
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM murid as m inner join kelas as kls on kls.kode_kelas = m.kode_kelas where m.status = 1 and m.kode_murid = '$kodeMurid'";
        $sql_mapel = "select kode_mapel,nama_mapel from mata_pelajaran where status = 1";

        $res = $this->db->query($sql_murid)->row();
        $data['kd_murid'] = $res->kode_murid;
        $data['nisn_murid'] = $res->nisn;
        $data['nm_murid'] = $res->nama_murid;
        $data['thn_ajaran'] = $res->tahun_ajaran;
        $data['kd_kelas'] = $res->kode_kelas;
        $data['kelas'] = $res->ket_kelas;

        $data['mapel'] =  $this->db->query($sql_mapel);
        $this->load->view('v_home', $data);
    }

    function list_nilai_murid()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "nilai_murid/v_list_nilai_murid";

        $kodeMurid = $this->uri->segment(3);

        $sql_murid = "SELECT m.kode_murid,m.nisn,m.nama_murid,m.kode_kelas
        ,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas 
        FROM murid as m inner join kelas as kls on kls.kode_kelas = m.kode_kelas where m.status = 1 and m.kode_murid = '$kodeMurid'";
        $sql_nilai = "select nm.kode_mapel,nm.nilai,nm.tahun_ajaran,mapel.nama_mapel from nilai_murid as nm 
        inner join mata_pelajaran as mapel on nm.kode_mapel = mapel.kode_mapel where kode_murid='$kodeMurid'";

        $res = $this->db->query($sql_murid)->row();
        $data['kd_murid'] = $res->kode_murid;
        $data['nisn_murid'] = $res->nisn;
        $data['nm_murid'] = $res->nama_murid;
        $data['kd_kelas'] = $res->kode_kelas;
        $data['kelas'] = $res->ket_kelas;
        $data['list_nilai'] = $this->db->query($sql_nilai)->result();
        
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "nilai_murid/v_edit_nilai";

        $kodeMurid = $this->uri->segment(3);
        $kodeMapel = $this->uri->segment(4);

        $this->load->view('v_home', $data);
    }
    
}
