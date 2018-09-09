<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wali_kelas extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_wali_kelas');

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
        $data['body'] = "wali_kelas/v_list_wali_kelas";

        $getData = $this->m_wali_kelas->retrievewalikelas();
        $data['listwalimurid'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "wali_kelas/v_add_wali_kelas";

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $sql_guru = "select kode_guru,concat(nip,' - ',nama_guru) as ket_guru from guru where status = 1";

        $data['kelas'] = $this->db->query($sql_kelas);
        $data['guru'] = $this->db->query($sql_guru);
        $data['thn_ajaran_wali'] = date('Y');
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "wali_kelas/v_edit_wali_kelas";

        $kodeWali = $this->uri->segment(3);
        $query = "SELECT kode_wali,kode_guru,kode_kelas,tahun_ajaran FROM wali_kelas where kode_wali = '$kodeWali'";
        $res = $this->db->query($query)->row();

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $sql_guru = "select kode_guru,concat(nip,' - ',nama_guru) as ket_guru from guru where status = 1";

        $data['kd_wali'] =  $res->kode_wali;
        $data['kd_guru'] =  $res->kode_guru;
        $data['kd_kls'] =  $res->kode_kelas;
        $data['thn_ajaran'] =  $res->tahun_ajaran;
        $data['kelas'] = $this->db->query($sql_kelas);
        $data['guru'] = $this->db->query($sql_guru);
        $this->load->view('v_home', $data);
    }
}
