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

        $kodeGuru = $this->uri->segment(3);
        $query = "SELECT kode_guru,nip,nama_guru,tanggal_lahir,jenis_kelamin,alamat,no_telp FROM guru WHERE kode_guru = '$kodeGuru'";
        $res = $this->db->query($query)->row();

        $data['kode_guru'] = $res->kode_guru;     
        $data['nip'] = $res->nip;
        $data['nama_guru'] = $res->nama_guru;
        $data['tanggal_lahir'] = $res->tanggal_lahir;
        $data['jenis_kelamin'] = $res->jenis_kelamin;
        $data['alamat'] = $res->alamat;
        $data['no_telp'] = $res->no_telp;
        $this->load->view('v_home', $data);
    }

    function simpan(){
        $get_kode_guru = $this->m_guru->getKodeGuru();
        $nip = trim($this->input->post('nip_guru'));
        $nama = trim($this->input->post('nm_guru'));
        $tgl_lahir = trim($this->input->post('tgl_lahir'));
        $jk = trim($this->input->post('jenis_kelamin'));
        $alamat = trim($this->input->post('alamat_guru'));
        $tlp = trim($this->input->post('tlp_guru'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_guru'] = $get_kode_guru;
        $data['nip'] = $nip;
        $data['nama_guru'] = $nama;
        $data['tanggal_lahir'] = $tgl_lahir;
        $data['jenis_kelamin'] = $jk;
        $data['alamat'] = $alamat;
        $data['no_telp'] = $tlp;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('guru', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('guru'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('guru'); 
        }
    }

    function ubah()
    {
        $kode_guru = trim($this->input->post('kd_guru'));
        $nip = trim($this->input->post('nip_guru'));
        $nama = trim($this->input->post('nm_guru'));
        $tgl_lahir = trim($this->input->post('tgl_lahir'));
        $jk = trim($this->input->post('jenis_kelamin'));
        $alamat = trim($this->input->post('alamat_guru'));
        $tlp = trim($this->input->post('tlp_guru'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_guru'] = $kode_guru;
        $data['nip'] = $nip;
        $data['nama_guru'] = $nama;
        $data['tanggal_lahir'] = $tgl_lahir;
        $data['jenis_kelamin'] = $jk;
        $data['alamat'] = $alamat;
        $data['no_telp'] = $tlp;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->where('kode_guru', $kode_guru);
        $this->db->update('guru', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('guru'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('guru'); 
        }
    }

    function hapus()
    {
        $kodeGuru = $this->uri->segment(3);
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_guru'] = $kodeGuru;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 0;

        $this->db->trans_start();

        $this->db->where('kode_guru', $kodeGuru);
        $this->db->update('guru', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal dihapus.
                </div>");
            redirect('guru'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil dihapus. 
            </div>");
            redirect('guru'); 
        }
    }
}
