<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kelas extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_kelas');

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
        $data['body'] = "kelas/v_list_kelas";

        $getlist = $this->m_kelas->retrievekelas();
        $data['listkelas'] = $getlist;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "kelas/v_add_kelas";
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "kelas/v_edit_kelas";

        $kodeKelas = $this->uri->segment(3);
        $query = "SELECT kode_kelas,tingkat_kelas,keterangan_tingkat FROM kelas WHERE kode_kelas = '$kodeKelas'";
        $res = $this->db->query($query)->row();

        $data['kode_kelas'] = $res->kode_kelas;		
        $data['tingkat_kelas'] = $res->tingkat_kelas;
        $data['keterangan_tingkat'] = $res->keterangan_tingkat;
        $this->load->view('v_home', $data);
    }

    function simpan(){
        $get_kode_kelas = $this->m_kelas->getKodeKelas();
        $tingkat_kelas = trim($this->input->post('tngkt_kls'));
        $ket_kelas = trim($this->input->post('ket_tngkt_kls'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_kelas'] = $get_kode_kelas;
        $data['tingkat_kelas'] = $tingkat_kelas;
        $data['keterangan_tingkat'] = $ket_kelas;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('kelas', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('kelas'); 
        }
    }

    function ubah()
    {
        $kode_kelas = trim($this->input->post('kd_kls'));
        $tingkat_kelas = trim($this->input->post('tngkt_kls'));
        $ket_tingkat = trim($this->input->post('ket_tngkt_kls'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_kelas'] = $kode_kelas;
        $data['tingkat_kelas'] = $tingkat_kelas;
        $data['keterangan_tingkat'] = $ket_tingkat;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;

        $this->db->trans_start();

        $this->db->where('kode_kelas', $kode_kelas);
        $this->db->update('kelas', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('kelas'); 
        }
    }

    function hapus()
    {
        $kodeKelas = $this->uri->segment(3);
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');


        $data['kode_kelas'] = $kodeKelas;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 0;

        $this->db->trans_start();

        $this->db->where('kode_kelas', $kodeKelas);
        $this->db->update('kelas', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal dihapus.
                </div>");
            redirect('kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil dihapus. 
            </div>");
            redirect('kelas'); 
        }
    }

    
}
