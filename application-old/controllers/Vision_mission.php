<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vision_mission extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$asset = array(
					'title'	=> $this->lang->line('about_us'),
					'js'	=> array('jquery.validate.min'),
					'css'	=> array(),
					'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
					'banner' => $this->Model_global->getMenuBanner(17)
				);
		$asset['imgCorporate'] = $this->Model_global->getCorporateValuesImg();
		// $asset['valuescorporate'] = $this->Model_global->getArtikelValuesCorporate();
		$asset['misi'] = $this->Model_global->getArtikelVisi();
		$asset['visi'] = $this->Model_global->getArtikelMisi();
		$asset['corporate'] = $this->Model_global->getArtikelCorporate();
		
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('vision_mission_view');
		$this->load->view('template/footer');

	}
	
}
