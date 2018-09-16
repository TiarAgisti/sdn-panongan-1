<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kkm extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_kkm');

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
        $data['body'] = "user/v_list_kkm";

        $getData = $this->m_kkm->retrievekkm();
        $data['listkkm'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "user/v_add_kkm";

        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "user/v_edit_kkm";

        $kodeKkm = $this->uri->segment(3);
        $query = "SELECT kode_kkm,kode_mapel,tingkat_kelas,nilai_kkm FROM kkm_murid WHERE kode_kkm = '$kodeKkm'";
        $res = $this->db->query($query)->row();

        $data['kode_kkm'] = $res->kode_kkm;     
        $data['kode_mapel'] = $res->kode_mapel;
        $data['tingkat_kelas'] = $res->tingkat_kelas;
        $data['nilai_kkm'] = $res->nilai_kkm;
        $this->load->view('v_home', $data);
    }

    function simpan(){
        $get_kode_kkm = $this->m_kkm->getKodeKKM();
        $kodeMapel = trim($this->input->post('kode_mapel'));
        $tingkatKelas = trim($this->input->post('tingkat_kelas'));
        $nilaiKKM = trim($this->input->post('nilai_kkm'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_kkm'] = $get_kode_kkm;
        $data['kode_mapel'] = $kodeMapel;
        $data['tingkat_kelas'] = $tingkatKelas;
        $data['nilai_kkm'] = $nilaiKKM;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('kkm_murid', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('kkm'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('kkm'); 
        }
    }


    function ubah()
    {
        $kodeKKM = trim($this->input->post('kode_kkm'));
        $kodeMapel = trim($this->input->post('kode_mapel'));
        $tingkatKelas = trim($this->input->post('tingkat_kelas'));
        $nilaiKKM = trim($this->input->post('nilai_kkm'));
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_kkm'] = $kodeKKM;
        $data['kode_mapel'] = $kodeMapel;
        $data['tingkat_kelas'] = $tingkatKelas;
        $data['nilai_kkm'] = $nilaiKKM;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;

        $this->db->trans_start();

        $this->db->where('kode_kkm', $kodeKKM);
        $this->db->update('kkm_murid', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('kkm'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('kkm'); 
        }
    }

    function hapus()
    {
        $kodeKKM = $this->uri->segment(3);
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');


        $data['kode_kkm'] = $kodeKKM;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 0;

        $this->db->trans_start();

        $this->db->where('kode_kkm', $kodeKKM);
        $this->db->update('kkm_murid', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal dihapus.
                </div>");
            redirect('kkm'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil dihapus. 
            </div>");
            redirect('kkm'); 
        }
    }
    
}
