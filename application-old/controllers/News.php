<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->library('pagination');
	}

	public function index()
	{	
		$jml = $this->Model_global->countRowContent('news');
		//pagination config
		$config['base_url'] = base_url().'news';
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
			'title'	=>  $this->lang->line('News'),
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'page'  => $this->pagination->create_links(),
			'banner' => $this->Model_global->getMenuBanner(10)
		);
		// limit db here 
		$this->db->limit($config['per_page'],$id);
		$asset['content_year'] = $this->Model_global->contentYear('news','news_start');
		$asset['list_news'] = $this->Model_global->getNews('',TRUE);
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('news_view');
		$this->load->view('template/footer');
	}

	public function news_detail($seo= '')
	{
		$asset = array(
			'title'	=> 'News',
			'js'	=> array('scrollreveal'),
			'css'	=> array('font-awesome/font-awesome.min'),
			'banner' => $this->Model_global->getMenuBanner(10),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array()

		);
		$data_check['seo_url'] = $seo;
		$check = $this->Model_global->getNews($data_check,'');
		if($check)
		{
			$asset['result'] = $check;
			$asset['content_year'] = $this->Model_global->contentYear('news','news_start');
			$asset['other_content'] = $this->Model_global->otherContent('news',$seo,3);

			$asset['title'] = $check['news_name'];

			// GET SLIDE
			$dataslide['unique_id'] = $check['unique_id'];
			$check_slide = $this->Model_global->get_multipleimage($dataslide, 'news_multiple');
			if($check_slide){
				$asset['list_slide'] = $check_slide;
			}

			$this->load->view('template/header', $asset);
			$this->load->view('template/top');
			$this->load->view('news_detail_view');
			$this->load->view('template/footer');
		}
		else
		{
			show_404();
		}	
	}

	public function news_archive($year = '')
	{	
		$asset = array(
			'title'	=> 'News',
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(10)
			
		);
		if($year != '')
		{
			$asset['list_news'] =$this->Model_global->listContentYear('news','news_start',$year);
			if($asset['list_news'])
			{
				$asset['content_year'] = $this->Model_global->contentYear('news','news_start');
			}
			else
			{
				redirect('news');
			}
		}
		else
		{
			redirect('news');
		}
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('news_view');
		$this->load->view('template/footer');
	}
}
