<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}	

	public function index($error = NULL) 
	{
		$data = array(
			'pageTitle' => 'Authentication',
			'action' => site_url('auth/login'),
			'error' => $error,
			);	
		
		$this->load->view('theme/tpl_header_page',$data);
		$this->load->view('site/login',$data);
		$this->load->view('theme/tpl_footer_page');		
	}	

	public function login() {
		
		$this->load->model('auth_model','useridentity');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->useridentity->login($username, md5($password));

		if ($login == 1) {

			// Ambil Detail Data
			$row = $this->useridentity->data_login($username, md5($password));


			// daftarkan session
			$data = array(
				'logged' => TRUE,
				'id' => $row->id_user,
				'fullname' => $row->fullname,
				'username' => $row->username,
				'email' => $row->email,
				'level' => $row->level,
				'image' => $row->image,
				);

			$this->session->set_userdata($data);


			$online = array(
				'active' => 1,
				);

			$this->User_model->update($this->session->userdata('id'), $online);				

			//Superadmin
			if ($this->session->userdata('level')=='1'){
				redirect(site_url('dashboard'));
			//Admin
			}elseif($this->session->userdata('level')=='2'){
				redirect(site_url('post/index'));
			//Member
			}else{
				redirect(site_url('post/create'));
			}			

		} else {

			// tampilkan pesan error
			$error = 'Username atau Password Salah';
			$this->index($error);

		}
	}

	function logout() {
		date_default_timezone_set('Asia/Jakarta');
		$offline = array(
			'active' => 0,
			'visit_time' => date('Y-m-d h:i:s'),
			);

		$this->User_model->update($this->session->userdata('id'), $offline);

		// destroy session
		$this->session->sess_destroy();
		
		// redirect ke halaman login
		redirect(site_url('auth'));
	}

}
