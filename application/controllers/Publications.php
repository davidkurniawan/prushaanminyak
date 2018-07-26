<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Publications extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$asset = array(
			'title'	=>  $this->lang->line('Publications'),
			'js'	=> array(),
			'css'	=> array(),
			'banner' => $this->Model_global->getMenuBanner(11),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'list_year' => $this->Model_global->contentYear('publications','publications_start')
		);

		if($_POST)
		{
			$data = array(
				'keyword' => $this->input->post('keyword'),
				'year' =>$this->input->post('year')
			);
			$asset['list_publications'] = $this->Model_global->getPublications($data,TRUE);
		}
		else 
		{
			$asset['list_publications'] = $this->Model_global->getPublications('',TRUE);
		}
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('publications_view');
		$this->load->view('template/footer');
	}

}
