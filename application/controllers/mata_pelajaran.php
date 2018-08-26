<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mata_pelajaran extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_mapel');

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
        $data['body'] = "mata_pelajaran/v_list_mata_pelajaran";

        $listmapel = $this->m_mapel->listmapel();
        $data['listmapel'] = $listmapel;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "mata_pelajaran/v_add_mata_pelajaran";
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "mata_pelajaran/v_edit_mata_pelajaran";
        $this->load->view('v_home', $data);
    }

    function simpan(){
        $get_kode_mapel = $this->m_mapel->getKodeMapel();
        $nama_mapel = trim($this->input->post('nm_mapel'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_mapel'] = $get_kode_mapel;
        $data['nama_mapel'] = $nama_mapel;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

 	    $this->db->insert('mata_pelajaran', $data);

 	    $this->db->trans_complete();

 	    if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Peringatan!</strong> Data gagal tersimpan.
				</div>");
            redirect('mata_pelajaran');	
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('mata_pelajaran');	
        }
    }
}
