<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$asset = array(
			'title'	=> 'Video',
			'js'	=> array(),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' =>$this->Model_global->getMenuBanner(12)
		);
		$asset['video'] = $this->Model_global->getVideo();
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('video_view');
		$this->load->view('template/footer');
	}
}
