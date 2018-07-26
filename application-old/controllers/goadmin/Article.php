<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends CI_Controller {

	// Also for table name
	var $url = 'article';
	var $model = 'model_article';
	var $title = 'Article';
	
	var $article_heading = TRUE;
	var $article_image = TRUE;
	var $char_max =40;

	var $mxlength_visi_misi = '400';
	var $mxlength_our_business_milestone = '3000';

	// done
	var $corporate_width = 862;
	var $corporate_height = 596;

	var $sshe_width = 631 ;
	var $sshe_height = 837 ;

	var $our_width = 1137;
	var $our_height = 800;

	var $working_width = 524;
	var $working_height = 254;

	var $visimisi_width = 1181;
	var $visimisi_height = 297;

	var $image_width = 1280;
	var $image_height = 451;

	var $home_width = 842;
	var $home_height = 564;

	public function __construct()
	{
		parent::__construct();
		check_login();
	}
	
	public function index()
	{
		check_access($this->url, 'menu', TRUE);
		
		$asset = array(
					'title'	=> $this->title,
					'url'	=> $this->url,
					'js'	=> array('jquery.tablesorter.min', 'jquery.tablesorter.pager', 'admin/list'),
					'css'	=> array('blue/style')
				);
				
		// Buat ngelisting, just to prevent data skipped.
		foreach (language()->result_array() as $find)
		{
			$asset['query'] = $this->db->order_by('unique_id', 'desc')->get_where($this->url, array('flag !=' => 3, 'language_id' => $find['language_id']));
			
			// Kalo ada just stop :D
			if ($asset['query']->row_array()) break;
		}
		
		$this->load->view('admin/template/header', $asset);
		$this->load->view('admin/template/menu');
		$this->load->view('admin/' . $this->url . '/list_' . $this->url);
		$this->load->view('admin/template/footer');
	}
	
	public function add()
	{
		check_access($this->url, 'add', TRUE);
		
		$asset = array(
					'title'	=> $this->title,
					'url'	=> $this->url,
					'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form'),
					'css'	=> array()
				);
		
		$this->form_validation->set_rules('flag', 'flag', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			// List section
			$asset['sections'] = $this->db->get_where('section', array('flag' => 1));
			$this->load->view('admin/template/header', $asset);
			$this->load->view('admin/template/menu');
			$this->load->view('admin/' . $this->url . '/add_' . $this->url);
			$this->load->view('admin/template/footer');
		}
		else
		{
			$this->load->model($this->model);
			$model_name = $this->model;			
			$this->$model_name->insert();
			redirect(base_url() . 'goadmin/' . $this->url);
		}
	}
	
	public function view($item_id)
	{
		check_access($this->url, 'read', TRUE);
		
		// Cek apakah ada ato ngga.
		$check = $this->db->get_where($this->url, array('unique_id' => $item_id, 'flag !=' => 3))->result_array();
		
		if ($check)
		{
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form'),
						'css'	=> array()
					);
			

			$this->form_validation->set_rules('flag', 'flag', 'required');
			
			$first = check_for_new_language($item_id, $this->url);
			
			$data['first'] = $first;
			
			// Perlu di ulang untuk query selanjutnya.
			foreach (language(TRUE)->result_array() as $lang)
			{			
				foreach ($lang as $coba)
				{
					$data['row'][$coba] = $this->db->get_where($this->url, array('unique_id' => $item_id, 'flag !=' => 3, 'language_id' => $coba))->row_array();
				}
			}
			
			if ($data['row'][$first]['article_image']) array_push($asset['js'], 'jquery.imgpreview.min', 'admin/imgpreview');
			
			if ($this->form_validation->run() == FALSE)
			{
				$data['sections'] = $this->db->get_where('section', array('flag' => 1));
				
				$this->load->view('admin/template/header', $asset);
				$this->load->view('admin/template/menu');
				$this->load->view('admin/' . $this->url . '/view_' . $this->url, $data);
				$this->load->view('admin/template/footer');
			}
			else
			{
				$this->load->model($this->model);
				$model_name = $this->model;
				$this->$model_name->update();
				redirect(base_url() . 'goadmin/' . $this->url);
			}
		}
		else redirect(base_url() . 'goadmin/' . $this->url);
	}
}