<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jadwal_mata_pelajaran extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_jadwal_mata_pelajaran');

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
        $data['body'] = "jadwal_mata_pelajaran/v_list_jadwal_mata_pelajaran";

        $getData = $this->m_jadwal_mata_pelajaran->retrievejadwal();
        $data['listjadwal'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "jadwal_mata_pelajaran/v_add_jadwal_mata_pelajaran";

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $sql_mapel = "select kode_mapel,nama_mapel from mata_pelajaran where status = 1";

        $data['kelas'] =  $this->db->query($sql_kelas);
        $data['mapel'] =  $this->db->query($sql_mapel);
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "jadwal_mata_pelajaran/v_edit_jadwal_mata_pelajaran";

        $kodeJadwal = $this->uri->segment(3);
        $query = "SELECT kode_jadwal,hari,kode_kelas,kode_mapel FROM jadwal_mapel where kode_jadwal = '$kodeJadwal'";
        $res = $this->db->query($query)->row();

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $sql_mapel = "select kode_mapel,nama_mapel from mata_pelajaran where status = 1";

        $data['kd_jdwl'] = $res->kode_jadwal;
        $data['hari_jdwl'] = $res->hari;
        $data['kd_kls'] = $res->kode_kelas;
        $data['kd_mapel'] = $res->kode_mapel;
        $data['kelas'] = $this->db->query($sql_kelas);
        $data['mapel'] = $this->db->query($sql_mapel);
        $this->load->view('v_home', $data);
    }

    function simpan()
    {
        $get_kode_jadwal = $this->m_jadwal_mata_pelajaran->getKodeJadwal();
        $hari = trim($this->input->post('kd_hari'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $kd_mapel = trim($this->input->post('kd_mapel'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_jadwal'] = $get_kode_jadwal;
        $data['hari'] = $hari;
        $data['kode_kelas'] = $kd_kls;
        $data['kode_mapel'] = $kd_mapel;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();
        $this->db->insert('jadwal_mapel', $data);
        $this->db->trans_complete();
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('jadwal_mata_pelajaran'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('jadwal_mata_pelajaran'); 
        }
    }

    function ubah()
    {
        $kodeJadwal = trim($this->input->post('kd_jdwl'));
        $hari = trim($this->input->post('kd_hari'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $kd_mapel = trim($this->input->post('kd_mapel'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['hari'] = $hari;
        $data['kode_kelas'] = $kd_kls;
        $data['kode_mapel'] = $kd_mapel;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;

        $this->db->trans_start();
        $this->db->where('kode_jadwal', $kodeJadwal);
        $this->db->update('jadwal_mapel', $data);
        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('jadwal_mata_pelajaran'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('jadwal_mata_pelajaran'); 
        }
    }
}
