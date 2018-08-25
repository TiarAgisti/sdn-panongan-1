<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('m_login');
	}
	
	function index()
	{
		$this->load->view('v_login');
	}

	function login_handler()
	{
		$username = $this->input->post('txtusername');
		$password = $this->input->post('txtpassword');
		$where = array(
			'kode_user' => $username,
			'password_user' => md5($password)
		);
		$cek = $this->m_login->cek_login("users",$where)->num_rows();
		if($cek > 0){

			$result = $this->m_login->cek_login("users",$where)->result_array();
			foreach ($result as $data) {
				$data_session = array(
					'nama' => $username,
					'status' => "login",
					'type' => $data['tipe_user']
				);
				
				$this->session->set_userdata($data_session);	
 			 	# code...
			} 
			

			redirect('home');

		}else{
			$this->session->set_flashdata("msg", "<div class='alert alert-danger' role='alert'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<strong>Peringatan!</strong> Kode user / password salah.
				</div>");
			redirect('login');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

}