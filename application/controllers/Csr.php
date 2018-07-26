<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csr extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('pagination');
	}

	public function index()
	{
		$jml = $this->Model_global->countRowContent('csr');
		//pengaturan pagination
		$config['base_url'] = base_url().'csr';
		$config['total_rows'] = $jml;
		$config['per_page'] = '10';
		$config['first_link'] = false;
		$config['last_link'] = false;
		//inisialisasi config
		if($this->uri->segment(2) != '')
		{
			$id = $this->uri->segment(2);
		}
		else
		{
			$id = 0; 
		}
 		$this->pagination->initialize($config);

		$asset = array(
			'title'	=> $this->lang->line('sustainable_development'),
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(13),
			'page'  => $this->pagination->create_links()

		);
		$this->db->limit($config['per_page'],$id);

		$asset['list_csr'] = $this->Model_global->getCsr('',TRUE);
		$asset['content_year'] = $this->Model_global->contentYear('csr','csr_start');
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('csr_view');
		$this->load->view('template/footer');
	}

	public function csr_detail($seo = '')
	{
		$asset = array(
			'title'	=> 'News',
			'js'	=> array('scrollreveal'),
			'css'	=> array('font-awesome/font-awesome.min'),
			'banner' => $this->Model_global->getMenuBanner(10),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array()
			);

		$data_check['seo_url'] = $seo;
		$check = $this->Model_global->getCsr($data_check,FALSE);
		if($check)
		{
			$asset['result'] = $check;
			$asset['other_content'] = $this->Model_global->otherContent('csr',$seo,3);
			$asset['content_year'] = $this->Model_global->contentYear('csr','csr_start');
			$asset['title'] = $check['csr_name'];

			// GET SLIDE
			$dataslide['unique_id'] = $check['unique_id'];
			$check_slide = $this->Model_global->get_multipleimage($dataslide, 'csr_multiple');
			if($check_slide){
				$asset['list_slide'] = $check_slide;
			}
			
			$this->load->view('template/header', $asset);
			$this->load->view('template/top');
			$this->load->view('csr_detail_view');
			$this->load->view('template/footer');
		}
		else
		{
			show_404();
		}	
	}

	public function csr_archive($year = '')
	{
		$asset = array(
			'title'	=> 'CSR Archive',
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'banner' => $this->Model_global->getMenuBanner(10),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array()
		);

		if($year != '')
		{
			
			$asset['list_csr'] =$this->Model_global->listContentYear('csr','csr_start',$year);

			if($asset['list_csr'])
			{
				$asset['content_year'] = $this->Model_global->contentYear('csr','csr_start');
			}
		}
		else
		{
			redirect('csr');
		}

		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('csr_view');
		$this->load->view('template/footer');
	}


}
