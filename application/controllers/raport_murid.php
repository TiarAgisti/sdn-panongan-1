<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class raport_murid extends CI_Controller {

    // require_once 'dompdf/autoload.inc.php';

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

    function view_raport()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "raport_murid/v_raport";

        $this->load->view('v_home', $data);
    }

    function get_raport()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "raport_murid/v_detail_raport";

        $cmbPilih = trim($this->input->post('cmb_pilih'));
        $txtCari = trim($this->input->post('txt_cari'));

        $res = $this->m_raport_murid->RetrieveRaportHeader($cmbPilih,$txtCari);
        $kodeRaport = $res->kode_raport;
        if ($kodeRaport != ""){
            $listNilai = $this->m_raport_murid->RetrieveRaportDetail($kodeRaport);

            $data['nama_guru'] = $res->nama_guru;
            $data['nama_murid'] = $res->nama_murid;
            $data['ket_kelas'] = $res->ket_kelas;
            $data['thn_ajaran'] = $res->tahun_ajaran;
            $data['sakit'] = $res->sakit;
            $data['ijin'] = $res->ijin;
            $data['alpa'] = $res->alpa;
            $data['keterangan'] = $res->keterangan;
            $data['list_nilai'] = $listNilai;

            $data['res_pilih'] = $cmbPilih;
            $data['res_cari'] = $txtCari;
        // echo ".$res->nama_murid.";
        // exit();
            $this->load->view('v_home', $data);
        }else{
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data tidak ditemukan.
                </div>");
            redirect('raport_murid/view_raport'); 
        }
    }

    function list_murid()
    {
        $data['header'] = "header/v_header";
        $data['navbar'] = "navbar/v_navbar";
        $data['sidebar'] = "sidebar/v_sidebar";
        $data['footer'] = "footer/v_footer";
        $data['body'] = "raport_murid/v_raport_list_murid";

        $kdKls = trim($this->input->post('kd_kls'));
        $resListMurid = $this->m_raport_murid->retrieveListMuridByKelas($kdKls);
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

        $kodeMurid = $this->uri->segment(3);
        $kodeKelas = $this->uri->segment(4);
        $resWaliKelas = $this->m_raport_murid->RetrieveWaliKelasByKodeKelas($kodeKelas);
        $resMurid = $this->m_raport_murid->RetrieveMuridByKodeMurid($kodeMurid);
        $resListNilai =  $this->m_raport_murid->RetrieveListNilaiByKodeMurid($kodeMurid);

        $data['kode_guru'] = $resWaliKelas->kode_guru;
        $data['nama_guru'] = $resWaliKelas->nama_guru;
        $data['kode_murid'] = $resMurid->kode_murid;
        $data['nisn_murid'] = $resMurid->nisn;
        $data['nama_murid'] = $resMurid->nama_murid;
        $data['kode_kelas'] = $resMurid->kode_kelas;
        $data['ket_kelas'] = $resMurid->ket_kelas;
        $data['thn_ajaran'] = date('Y');
        $data['list_nilai'] = $resListNilai;

        $this->load->view('v_home', $data);
    }

    function simpan_raport()
    {
        $get_kode_raport_header = $this->m_raport_murid->get_kode_raport();
        $kodeGuru = trim($this->input->post('kd_guru'));
        $kodeMurid = trim($this->input->post('kd_murid'));
        $kodeKelas = trim($this->input->post('kd_kelas'));
        $tahunAjaran = date('Y');
        $sakit = trim($this->input->post('txt_sakit'));
        $ijin = trim($this->input->post('txt_ijin'));
        $alpa = trim($this->input->post('txt_alpa'));
        $ketNaik = trim($this->input->post('cmb_keterangan'));
        $status = 1;
        $kode_user=$this->session->userdata('kode_user');
        $tanggal = date('Y-m-d');

        $data['kode_guru'] = $kodeGuru;
        $data['kode_raport'] = $get_kode_raport_header;
        $data['kode_murid'] = $kodeMurid;
        $data['kode_kelas'] = $kodeKelas;
        $data['tahun_ajaran'] = $tahunAjaran;
        $data['sakit'] = $sakit;
        $data['ijin'] = $ijin;
        $data['alpa'] = $alpa;
        $data['keterangan'] = $ketNaik;
        $data['status'] = $status;
        $data['created_at'] = $tanggal;
        $data['created_by'] = $kode_user;
        $data['updated_at'] = $tanggal;
        $data['updated_by'] = $kode_user;

        $this->db->trans_start();
        $this->db->insert('raport_header', $data);

        $resListNilai = $this->m_raport_murid->RetrieveListNilaiByKodeMurid($kodeMurid);
        foreach ($resListNilai as $row) {
            $detail['kode_raport'] = $get_kode_raport_header;
            $detail['kode_mapel'] = $row->kode_mapel;
            $detail['nilai'] = $row->nilai;

            $this->db->insert('raport_detail', $detail);    
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE)
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Peringatan!</strong> Data gagal tersimpan.
                </div>");
            redirect('raport_murid'); 
        }
        else 
        {
            $this->session->set_flashdata("msg", "<div class='alert alert-info' role='alert'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            <strong>Informasi!</strong> Data berhasil tersimpan. 
            </div>");
            redirect('raport_murid'); 
        }
    }


    public function laporan_pdf()
    {
        $cmbPilih = trim($this->input->post('cmb_pilih'));
        $txtCari = trim($this->input->post('txt_cari'));
        $res = $this->m_raport_murid->RetrieveRaportHeader($cmbPilih,$txtCari);
        $kodeRaport = $res->kode_raport;
        $listNilai = $this->m_raport_murid->RetrieveRaportDetail($kodeRaport);

        $data = array(
            "dataku" => array(
                'nama_guru' => $res->nama_guru,
                'nama_murid' => $res->nama_murid,
                'ket_kelas' => $res->ket_kelas,
                'thn_ajaran' => $res->tahun_ajaran,
                'sakit' => $res->sakit,
                'ijin' => $res->ijin,
                'alpa' => $res->alpa,
                'keterangan' => $res->keterangan,
                'list_nilai' => $listNilai
            )
        );

        // var_dump($data['dataku']['list_nilai']);
        // exit();

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = $res->nama_murid.'-'.$res->ket_kelas.'-'.$res->tahun_ajaran;
        $this->pdf->load_view('raport_murid/laporan_pdf', $data);
    }

    
}
