<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kenaikan_kelas extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_kenaikan_kelas');

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
        $data['body'] = "kenaikan_kelas/v_kenaikan_kelas";

        $getData = $this->m_kenaikan_kelas->retrievelist();
        $data['listkenaikan'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "kenaikan_kelas/v_add_kenaikan_kelas";

        $this->load->view('v_home', $data);
    }
    
}
