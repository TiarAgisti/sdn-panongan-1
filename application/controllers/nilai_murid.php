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
        $sql_mapel = "select kode_mapel,nama_mapel from mata_pelajaran where status = 1 and kode_mapel not in(select kode_mapel
        from nilai_murid where kode_murid = '$kodeMurid')";

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

        $sqlNilai = "select nm.kode_murid,nm.kode_mapel,nm.kode_kelas,nm.tahun_ajaran,nm.nilai
        ,m.nama_murid,m.nisn,mapel.nama_mapel,concat(kls.tingkat_kelas,kls.keterangan_tingkat) as ket_kelas from nilai_murid as nm
        inner join murid as m on m.kode_murid = nm.kode_murid
        inner join kelas as kls on kls.kode_kelas = nm.kode_kelas
        inner join mata_pelajaran as mapel on mapel.kode_mapel = nm.kode_mapel
        where nm.kode_murid = '$kodeMurid' and nm.kode_mapel = '$kodeMapel'";

        $res = $this->db->query($sqlNilai)->row();
        $data['kdMurid'] = $res->kode_murid;
        $data['nisnMurid'] = $res->nisn;
        $data['nmMurid'] = $res->nama_murid;
        $data['thnAjaran'] = $res->tahun_ajaran;
        $data['kdMapel'] = $res->kode_mapel;
        $data['nmMapel'] = $res->nama_mapel;
        $data['nilai'] = $res->nilai;
        $data['kdKelas'] = $res->kode_kelas;
        $data['ketKelas'] = $res->ket_kelas;


        $this->load->view('v_home', $data);
    }

    function simpan()
    {
        $kd_murid = trim($this->input->post('kd_murid'));
        $kd_kls = trim($this->input->post('kd_kls'));
        $kd_mapel = trim($this->input->post('mapel_murid'));
        $thn_ajaran = trim($this->input->post('thn_ajaran'));
        $nilai = trim($this->input->post('nilai_murid'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_murid'] = $kd_murid;
        $data['kode_kelas'] = $kd_kls;
        $data['kode_mapel'] = $kd_mapel;
        $data['tahun_ajaran'] = $thn_ajaran;
        $data['nilai'] = $nilai;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();
        $this->db->insert('nilai_murid', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('nilai_murid'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('nilai_murid'); 
        }
    }
    
}
