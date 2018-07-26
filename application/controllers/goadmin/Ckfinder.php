<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ckfinder extends CI_Controller {
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
	public function upload(){
		pre($this->uri);
	}
}