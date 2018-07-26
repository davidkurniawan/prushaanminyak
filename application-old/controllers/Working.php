<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Working extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$asset = array(
			'title'	=> $this->lang->line('career'),
			'js'	=> array(),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(9)
		);

		$asset['content'] = $this->Model_global->workingAt();
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('working_view');
		$this->load->view('template/footer');
	}
}
