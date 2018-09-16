<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {


	function __construct(){
        parent::__construct();
        // $this->load->model('model_app');

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
        $data['body'] = "dashboard/v_dashboard";

        $guru = "SELECT COUNT(*) AS jml_guru FROM guru where status = 1";
        $jmlGuru = $this->db->query($guru)->row();
        $data['jml_guru'] =  $jmlGuru->jml_guru;

        $murid = "SELECT COUNT(*) AS jml_murid FROM murid where status = 1";
        $jmlMurid = $this->db->query($murid)->row();
        $data['jml_murid'] =  $jmlMurid->jml_murid;

        $mapel = "SELECT COUNT(*) AS jml_mapel FROM mata_pelajaran where status = 1";
        $jmlMapel = $this->db->query($mapel)->row();
        $data['jumlah_mapel'] =  $jmlMapel->jml_mapel;

        $kelas = "SELECT COUNT(*) AS jml_kelas FROM kelas where status = 1";
        $jmlKls = $this->db->query($kelas)->row();
        $data['jumlah_kelas'] =  $jmlKls->jml_kelas;
        $this->load->view('v_home', $data);
    }

    
}
