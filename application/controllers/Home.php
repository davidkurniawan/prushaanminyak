<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$title = $this->db->get_where('setting',array('flag' => 1))->row_array();
		$x = $title['setting_name'];
		$z = '';
		$asset = array(
			'title'	=> $x,
			'js'	=> array('owlcarousel/owl.carousel','scrollreveal'),
			'css'	=> array('owlcarousel/owl.carousel'),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			// 'other_content' => $this->Model_global->newContent('news',3)
			'other_content' => $this->Model_global->newContent('csr',3)
		);
		$asset['banner'] = $this->Model_global->getBanner();
		$asset['pttepindo'] = $this->Model_global->getHomePttep();
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('home_view');
		$this->load->view('template/footer');
	}
}
