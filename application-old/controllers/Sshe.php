<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sshe extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$asset = array(
			'title'	=> $this->lang->line('SSHE'),
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(15)
		);
		$asset['sshe'] = $this->Model_global->getArticleSshe();
		$asset['document'] = $this->Model_global->getDocument();
		$this->load->view('template/header',$asset);
		$this->load->view('template/top');
		$this->load->view('sshe_view');
		$this->load->view('template/footer');
	}
}
