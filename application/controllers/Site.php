<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Testimony_model');
	}

	public function index()
	{
		$testimony = $this->Testimony_model->get_all();

		$data = array(
			'testimony_data' => $testimony,
			'pageTitle' => 'Home', 
			);

		$this->load->view('theme/tpl_frontend_header',$data);
		$this->load->view('home/home', $data);		
		$this->load->view('theme/tpl_frontend_footer');		
	}

	public function login($error = NULL) 
	{
		$data = array(
			'pageTitle' => 'Login',
			'action' => site_url('auth/login'),
			'error' => $error,
			);	
		
		$this->load->view('theme/tpl_frontend_full_header',$data);
		$this->load->view('home/login',$data);
		$this->load->view('theme/tpl_frontend_full_footer');		
	}


	public function register() 
	{
		$data = array(
			'pageTitle' => 'Registrasi',
			'button' => 'Registrasi',
			'action' => site_url('site/register_action'),
			'id_user' => set_value('id_user'),
			'create_time' => set_value('create_time'),
			'update_time' => set_value('update_time'),
			'visit_time' => set_value('visit_time'),
			'fullname' => set_value('fullname'),
			'gender' => set_value('gender'),
			'birth' => set_value('birth'),
			'email' => set_value('email'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'level' => set_value('level'),
			'division' => set_value('division'),
			'image' => set_value('image'),
			'ipaddress' => set_value('ipaddress'),
			'active' => set_value('active'),
			'status' => set_value('status'),
			);
		$this->load->view('theme/tpl_frontend_full_header',$data);
		$this->load->view('home/register',$data);
		$this->load->view('theme/tpl_frontend_full_footer');	         
	}

	public function register_action() 
	{
		$this->_rules();

		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {

			$data = array(
				'create_time' => date('Y-m-d h:i:s'),
				'update_time' => date('Y-m-d h:i:s'),
				'visit_time' => date('Y-m-d h:i:s'),
				'fullname' => $this->input->post('fullname',TRUE),
				'gender' => $this->input->post('gender',TRUE),
				'birth' => 0,
				'email' => $this->input->post('email',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => md5($this->input->post('password',TRUE)),
				'level' => 3,
				'division' => 0,
				'image' => "avatar.png",
				'ipaddress' => 0,
				'active' => 0,
				'status' => 0,
				);

			$this->User_model->insert($data);
			redirect(site_url('site/login'));
		}

	}

	public function _rules() 
	{
		$this->form_validation->set_rules('fullname', 'fullname', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');

		$this->form_validation->set_rules('id_user', 'id_user', 'trim');
		$this->form_validation->set_error_delimiters('<span class="label label-danger">', '</span>');
	}
}
