<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wali_kelas extends CI_Controller {


	function __construct(){
        parent::__construct();
        $this->load->model('m_wali_kelas');

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
        $data['body'] = "wali_kelas/v_list_wali_kelas";

        $getData = $this->m_wali_kelas->retrievewalikelas();
        $data['listwalimurid'] = $getData;
        $this->load->view('v_home', $data);
    }

    function add()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "wali_kelas/v_add_wali_kelas";

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1 
                        and kode_kelas not in(select kode_kelas from wali_kelas where status = 1)";
        $sql_guru = "select kode_guru,concat(nip,' - ',nama_guru) as ket_guru from guru where status = 1 
                    and kode_guru not in(select kode_guru from wali_kelas where status = 1)";

        $data['kelas'] = $this->db->query($sql_kelas);
        $data['guru'] = $this->db->query($sql_guru);
        $data['thn_ajaran_wali'] = date('Y');
        $this->load->view('v_home', $data);
    }

    function edit()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "wali_kelas/v_edit_wali_kelas";

        $kodeWali = $this->uri->segment(3);
        $query = "SELECT kode_wali,kode_guru,kode_kelas,tahun_ajaran FROM wali_kelas where kode_wali = '$kodeWali'";
        $res = $this->db->query($query)->row();

        $sql_kelas = "select kode_kelas,concat(tingkat_kelas,keterangan_tingkat) as ket_kelas from kelas where status = 1";
        $sql_guru = "select kode_guru,concat(nip,' - ',nama_guru) as ket_guru from guru where status = 1";

        $data['kd_wali'] =  $res->kode_wali;
        $data['kd_guru'] =  $res->kode_guru;
        $data['kd_kls'] =  $res->kode_kelas;
        $data['thn_ajaran'] =  $res->tahun_ajaran;
        $data['kelas'] = $this->db->query($sql_kelas);
        $data['guru'] = $this->db->query($sql_guru);
        $this->load->view('v_home', $data);
    }


    function simpan()
    {
        $get_kode_wali = $this->m_wali_kelas->getKodeWaliKelas();
        $kd_guru = trim($this->input->post('kd_guru'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $thn_ajaran = trim($this->input->post('thn_ajaran')); 
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        if ($kd_guru == ""){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan,silahkan pilih guru sebagai wali kelas.
                </div>");
            redirect('wali_kelas/add'); 
        }

        if ($kd_kls == ""){
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan,kelas belum di pilih.
                </div>");
            redirect('wali_kelas/add');
        }

        $data['kode_wali'] = $get_kode_wali;
        $data['kode_guru'] = $kd_guru;
        $data['kode_kelas'] = $kd_kls;
        $data['tahun_ajaran'] = $thn_ajaran;
        $data['created_date'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 1;

        $this->db->trans_start();

        $this->db->insert('wali_kelas', $data);

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('wali_kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('wali_kelas'); 
        }
    }

    function ubah()
    {
        $kodeWali = trim($this->input->post('kd_wali'));;
        $kd_guru = trim($this->input->post('kd_guru'));
        $kd_kls = trim($this->input->post('kd_kelas'));
        $thn_ajaran = trim($this->input->post('thn_ajaran')); 
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_wali'] = $kodeWali;
        $data['kode_guru'] = $kd_guru;
        $data['kode_kelas'] = $kd_kls;
        $data['tahun_ajaran'] = $thn_ajaran;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;

        $this->db->trans_start();

        $this->db->where('kode_wali', $kodeWali);
        $this->db->update('wali_kelas', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('wali_kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('wali_kelas'); 
        }
    }

    function hapus()
    {
        $kodeWali = $this->uri->segment(3);
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');


        $data['kode_wali'] = $kodeWali;
        $data['updated_date'] = $tanggal;
        $data['updated_by'] = $kode_user;
        $data['status'] = 0;

        $this->db->trans_start();

        $this->db->where('kode_wali', $kodeWali);
        $this->db->update('wali_kelas', $data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal dihapus.
                </div>");
            redirect('wali_kelas'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil dihapus. 
            </div>");
            redirect('wali_kelas'); 
        }
    }
}
