<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_category extends CI_Controller {

	// Also for table name
	var $url = 'gallery_category';
	var $model = 'model_gallery_category';
	var $title = 'Gallery Category';
	
	public function __construct()
	{
		parent::__construct();
		check_login();
	}
	
	public function index()
	{
		check_access($this->url, 'menu', TRUE);
		
		$filter = $this->input->post('gallery_filter');
		
		$where = array(
					'flag !=' => 3
				);
				
		if ($filter) $where['gallery_category_type'] = $filter;
		
		$asset = array(
					'title'	=> $this->title,
					'url'	=> $this->url,
					'js'	=> array('jquery.tablesorter.min', 'jquery.tablesorter.pager', 'admin/list'),
					'css'	=> array('blue/style'),
//					'query'	=> $this->db->order_by($this->url.'_id', 'desc')->get_where($this->url, $where)
				);
		
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
					'js'	=> array('jquery.validate.min', 'admin/form'),
					'css'	=> array()
				);
		
		$this->form_validation->set_rules('flag', 'flag', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
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
		
		$check = $this->db->get_where($this->url, array('unique_id' => $item_id, 'flag !=' => 3))->row_array();
		
		if ($check)
		{
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.validate.min', 'admin/form'),
						'css'	=> array()
					);
					
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
					
			// Get listing parent category for the type.
			#$asset['parent_category'] = $this->db->get_where('gallery_category', array('flag' => 1, 'gallery_category_type' => $check['gallery_category_type'], 'gallery_category_parent' => 0));
			
			$asset['category'] = $this->db->group_by('unique_id')->get_where('gallery_category', array('flag !=' => 3));

			$this->form_validation->set_rules('flag', 'flag', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{				
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
	
	public function show_parent($type = '')
	{
		// First get all parent gallery category with the selected type
		//$parent = $this->db->get_where('gallery_category', array('gallery_category_parent' => 0, 'gallery_category_type' => $type, 'flag' => 1));
		
		/*
		foreach (language()->result_array() as $find)
		{
			$parent = $this->db->order_by('unique_id', 'desc')->get_where($this->url, array('flag !=' => 3, 'language_id' => $find['language_id'], 'gallery_category_type' => $type));
			
			// Kalo ada just stop :D
			if ($parent->row_array()) break;
		}*/
		
		$parent = $this->db->group_by('unique_id')->get_where('gallery_category', array('flag !=' => 3, 'gallery_category_type' => $type));
		
		echo '<option value="">-- Select Parent Category --</option>';
		echo '<option value="0">(Parent Category)</option>';
		
		foreach ($parent->result_array() as $item)
		{
			echo '<option value="', $item['unique_id'] ,'">', $item['gallery_category_name'], '</option>';
		}
	}
}