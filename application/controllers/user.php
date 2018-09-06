<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_login');

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
        $data['body'] = "user/v_list_user";

        $getData = $this->m_login->retrieveuser();
        $data['listuser'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "user/v_add_user";
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "user/v_edit_user";

        $kodeUser = $this->uri->segment(3);
        $query = "SELECT kode_user,nama_user,password_user,tipe_user FROM users WHERE kode_user = '$kodeUser'";
        $res = $this->db->query($query)->row();

        $data['kode_user'] = $res->kode_user;     
        $data['nama_user'] = $res->nama_user;
        $data['password_user'] = $res->password_user;
        $data['tipe_user'] = $res->tipe_user;
        $this->load->view('v_home', $data);
    }

    function simpan(){
        $get_kode_user = $this->m_login->getKodeUser();
        $nama_user = trim($this->input->post('nm_usr'));
        $password_user = trim($this->input->post('pass_usr'));
        $tipe_user = trim($this->input->post('tipe_usr'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_user'] = $get_kode_user;
        $data['nama_user'] = $nama_user;
        $data['password_user'] = md5($password_user);
        $data['tipe_user'] = $tipe_user;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('users', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('user'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('user'); 
        }
    }
    
}
