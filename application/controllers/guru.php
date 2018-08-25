<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guru extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_guru');

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
        $data['body'] = "guru/v_list_guru";

        $listguru = $this->m_guru->listguru();
        $data['listguru'] = $listguru;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "guru/v_add_guru";

        
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "guru/v_edit_guru";

        
        $this->load->view('v_home', $data);
    }

    
}
