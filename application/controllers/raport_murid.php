<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class raport_murid extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_raport_murid');
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
        $data['body'] = "raport_murid/v_cari_kelas";

        $resListKelas = $this->m_raport_murid->retrieveKelas();
        $data['resKelas'] = $resListKelas;
        $this->load->view('v_home', $data);
    }

    function list_murid()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "raport_murid/v_raport_list_murid";

        $kdKls = trim($this->input->post('kd_kls'));
        $resListMurid = $this->m_raport_murid->retrieveMuridByKelas($kdKls);
        $data['resMurid'] = $resListMurid;
        $this->load->view('v_home', $data);
    }

    function add_raport()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "raport_murid/v_add_raport_murid";

        $this->load->view('v_home', $data);
    }

    
}
