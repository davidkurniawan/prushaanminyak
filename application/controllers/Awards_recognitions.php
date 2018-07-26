<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Awards_recognitions extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index($year = '')
	{
		$asset = array(
			'title'	=> $this->lang->line('AwardsRecoginitions'),
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'list_awards' => $this->Model_global->getAwards('',TRUE),
			'check_row' => $this->Model_global->checkRow('awards'),
			'content_year' => $this->Model_global->contentYear('awards','awards_start'),
			'count_content' => $this->Model_global->countContentyear($year),
			'banner' => $this->Model_global->getMenuBanner(14)
		);
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('awards_recognitions_view');
		$this->load->view('template/footer');
	}

	public function awards_recognitions_archive($year='')
	{
		$asset = array(
			'title'	=> 'Awards & Recognitions',
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'check_row' => $this->Model_global->checkRow('awards'),
			'list_awards' => $this->Model_global->listContentYear('awards','awards_start',$year),
			'content_year' => $this->Model_global->contentYear('awards','awards_start'),
			'count_content' => $this->Model_global->countContentyear($year),
			'banner' => $this->Model_global->getMenuBanner(14)
		);
		
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('awards_recognitions_view');
		$this->load->view('template/footer');
	}

	public function detail($seo = '')
	{
		$asset = array(
			'title'	=> 'Awards & Recognitions Detail',
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(14)

		);
		$data_check['seo_url'] = $seo;
		$check = $this->Model_global->getAwards($data_check,FALSE);

		if($check)
		{
			$asset['result'] = $check;
			$asset['other_content'] = $this->Model_global->otherContent('awards',$seo,4);
			$asset['content_year'] = $this->Model_global->contentYear('awards','awards_start');
			$asset['title'] = $check['awards_name'];
			$this->load->view('template/header', $asset);
			$this->load->view('template/top');
			$this->load->view('awards_recognitions_detail_view');
			$this->load->view('template/footer');
		}
		else
		{
			show_404();
		}
	}
}
