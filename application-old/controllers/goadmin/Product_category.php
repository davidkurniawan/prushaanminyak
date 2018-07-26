<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_category extends CI_Controller {

	// Also for table name
	var $url = 'product_category';
	var $model = 'model_product_category';
	var $title = 'Product Category';
	
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
			#$asset['parent_category'] = $this->db->get_where('product_category', array('product_category_parent' => 0, 'flag' => 1));
			$asset['parent_category'] = $this->db->group_by('unique_id')->get_where('product_category', array('flag !=' => 3, 'product_category_parent' => 0));
			
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
			
			$this->form_validation->set_rules('flag', 'flag', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{	
				#$asset['parent_category'] = $this->db->get_where('product_category', array('product_category_parent' => 0, 'flag' => 1));			
				$asset['parent_category'] = $this->db->group_by('unique_id')->get_where('product_category', array('flag !=' => 3, 'unique_id !=' => $data['row'][$first]['unique_id'], 'product_category_parent' => 0));
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
	
	public function show_subcategory($parent_id = '')
	{
#		$category = $this->db->get_where('product_category', array('product_category_parent' => $parent_id, 'flag' => 1));
		
		$category = $this->db->group_by('unique_id')->get_where('product_category', array('flag !=' => 3, 'product_category_parent' => $parent_id));
		
		echo '<option value="">-- Select Subcategory --</option>';
		
		foreach ($category->result_array() as $item)
		{
			echo '<option value="', $item['unique_id'] ,'">', $item['product_category_name'], '</option>';
		}
	}
}