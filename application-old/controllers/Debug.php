<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Debug extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		/*
		debug controller only use for debuging in development mode
		if site online, u can delete this controller
		*/ 
		show_404();
	}



}

/* End of file Debug.php */
/* Location: ./application/controllers/Debug.php */ 
?>