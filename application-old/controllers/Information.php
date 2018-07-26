<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
	}

	public function toc()
	{
		$asset = array(
			'title'       => $this->lang->line('toc'),
			'js'          => array(),
			'css'         => array(),
			'web'         => $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'toc'         => $this->Model_global->getMenuBanner(31),
			'article_toc' => $this->Model_global->getArticle(array('unique_id'=>28))
		);

		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('toc_view');
		$this->load->view('template/footer');
	}
}
