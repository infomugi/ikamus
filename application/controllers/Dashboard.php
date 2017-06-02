<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		if ($this->session->userdata('logged')<>1) {
			redirect(site_url('auth'));
		}
	}

	public function index()
	{
		$this->load->library('parser');

		$data = array(
			'pageTitle' => 'PUSJATAN', 
			);

		$this->load->view('theme/tpl_header',$data);
		$this->parser->parse('site/dashboard', $data);		
		$this->load->view('theme/tpl_footer');		
	}
}
