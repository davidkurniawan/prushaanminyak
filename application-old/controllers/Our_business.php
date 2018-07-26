<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Our_business extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		
	}
	public function index()
	{
		$asset = array(
			'title'       =>  $this->lang->line('ourbussines'),
			'js'          => array('jquery.validate.min'),
			'css'         => array(),
			'web'         => $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'ourbussines' => $this->Model_global->getOurBussines(),
			'slide'       => $this->Model_global->getSliderBusiness(),
			'slider'      => $this->Model_global->getSliderBusiness(),
			'phase'       => $this->Model_global->getPhaseOrInvestment('phase'),
			'investment'  => $this->Model_global->getPhaseOrInvestment('investment'),
			'banner'      => $this->Model_global->getMenuBanner(16)
		);

		$dataLocation['join']   = TRUE;
		$asset['list_location'] = $this->Model_global->getSetLocation($dataLocation, FALSE);
		
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('our_business_view');
		$this->load->view('template/footer');
	}
}
