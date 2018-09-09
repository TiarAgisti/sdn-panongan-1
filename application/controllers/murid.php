<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class murid extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_murid');

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
        $data['body'] = "murid/v_list_murid";

        $listmurid = $this->m_murid->listmurid();
        $data['listmurid'] = $listmurid;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "murid/v_add_murid";

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $data['kelas'] = $this->db->query($sql_kelas);
        $data['thn_ajaran'] = date('Y');
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "murid/v_edit_murid";

        $kodeMurid = $this->uri->segment(3);
        $query = "SELECT kode_murid,nisn,nama_murid,tanggal_lahir,jenis_kelamin,alamat,no_telp,kode_kelas,tahun_ajaran
        FROM murid where kode_murid = '$kodeMurid'";
        $res = $this->db->query($query)->row();

        $data['kode_murid'] = $res->kode_murid;     
        $data['nama_murid'] = $res->nama_murid;
        $data['nisn'] = $res->nisn;
        $data['tanggal_lahir'] = $res->tanggal_lahir;
        $data['jenis_kelamin'] = $res->jenis_kelamin;
        $data['alamat'] = $res->alamat;
        $data['no_telp'] = $res->no_telp;
        $data['kd_kelas'] = $res->kode_kelas;
        $data['tahun_ajaran'] = $res->tahun_ajaran;
        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $data['kelas'] = $this->db->query($sql_kelas);
        $this->load->view('v_home', $data);
    }

    function simpan()
    {
        $get_kode_murid = $this->m_murid->getKodeMurid();
        $nisn_murid = trim($this->input->post('nisn_murid'));
        $nm_mrd = trim($this->input->post('nm_murid'));
        $tgl_lhr_mrd = trim($this->input->post('tgl_lahir_murid'));
        $jk_mrd = trim($this->input->post('jk_murid'));
        $almt_mrd = trim($this->input->post('alamat_murid'));
        $tlp_mrd = trim($this->input->post('tlp_murid'));
        $kls_mrd = trim($this->input->post('kls_murid'));
        $thn_ajaran_mrd = trim($this->input->post('thn_ajaran'));

        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_murid'] = $get_kode_murid;
        $data['nisn'] = $nisn_murid;
        $data['nama_murid'] = $nm_mrd;
        $data['tanggal_lahir'] = $tgl_lhr_mrd;
        $data['jenis_kelamin'] = $jk_mrd;
        $data['alamat'] = $almt_mrd;
        $data['no_telp'] = $tlp_mrd;
        $data['kode_kelas'] = $kls_mrd;
        $data['tahun_ajaran'] = $thn_ajaran_mrd;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('murid', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('murid'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('murid'); 
        }
    }

    function ubah()
    {
        $kdMurid = trim($this->input->post('kd_murid'));
        $nisn_murid = trim($this->input->post('nisn_murid'));
        $nm_mrd = trim($this->input->post('nm_murid'));
        $tgl_lhr_mrd = trim($this->input->post('tgl_lahir_murid'));
        $jk_mrd = trim($this->input->post('jk_murid'));
        $almt_mrd = trim($this->input->post('alamat_murid'));
        $tlp_mrd = trim($this->input->post('tlp_murid'));
        $kls_mrd = trim($this->input->post('kls_murid'));
        $thn_ajaran_mrd = trim($this->input->post('thn_ajaran'));

        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_murid'] = $kdMurid;
        $data['nisn'] = $nisn_murid;
        $data['nama_murid'] = $nm_mrd;
        $data['tanggal_lahir'] = $tgl_lhr_mrd;
        $data['jenis_kelamin'] = $jk_mrd;
        $data['alamat'] = $almt_mrd;
        $data['no_telp'] = $tlp_mrd;
        $data['kode_kelas'] = $kls_mrd;
        $data['tahun_ajaran'] = $thn_ajaran_mrd;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;


        $this->db->trans_start();

        $this->db->where('kode_murid', $kdMurid);
        $this->db->update('murid', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('murid'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('murid'); 
        }
    }

    function hapus()
    {
        $kode_murid = $this->uri->segment(3);
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');


        $data['kode_murid'] = $kode_murid;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 0;

        $this->db->trans_start();

        $this->db->where('kode_murid', $kode_murid);
        $this->db->update('murid', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal dihapus.
                </div>");
            redirect('murid'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil dihapus. 
            </div>");
            redirect('murid'); 
        }
    }

    
}
