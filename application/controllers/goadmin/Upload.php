<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		check_login();
	}
	
	public function index()
	{
		$this->load->view('admin/ckfinder');
	}

	public function connector(){
		$this->load->library('ckf');
		$this->ckf->load();
	}
	public function images($images=""){
		$direct = $this->uri->uri_string;
		$redirect = str_replace("goadmin/", "", $direct);
		redirect(base_url($redirect));
		
	}
}