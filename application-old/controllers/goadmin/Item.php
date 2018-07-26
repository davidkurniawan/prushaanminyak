<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Controller {

	// Also for table name
	var $url = 'item';
	var $model = 'model_item';
	var $title = 'Item';
	
	var $item_image = TRUE;
	var $item_content = TRUE;
	
	var $subcategory = TRUE;
	
	var $image_height = 100;
	var $image_width = 100;
	
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
					'js'	=> array('ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'jquery.validate.min'),
					'css'	=> array()
				);
		
		$this->form_validation->set_rules('flag', 'flag', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
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
						'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form'),
						'css'	=> array(),
						'row'	=> $check
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
					
			// Kalo ada image, include jquery image preview :)
			if ($data['row'][$first]['item_image']) array_push($asset['js'], 'jquery.imgpreview.min', 'admin/imgpreview');
			
			$this->form_validation->set_rules('flag', 'flag', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$asset['parent_category'] = $this->db->group_by('unique_id')->get_where('product_category', array('flag !=' => 3, 'product_category_parent' => 0));
				
				// Category yang sekarang parent ato child?
				$current = $this->db->group_by('unique_id')->get_where('product_category', array('unique_id' => $data['row'][$first]['item_category']))->result_array();
				
				// If it's a parent category,
				if ($current[0]['product_category_parent'] == 0)
				{
					$asset['parent_selected'] = $check['item_category'];
					$asset['child_selected'] = '';
					#$asset['subcategory'] = $this->db->group_by('unique_id')->get_where('product_category', array('product_category_parent' => $data['row'][$first]['item_category'], 'flag !=' => 3))->result_array();
					
					
					foreach (language()->result_array() as $find)
					{
						$asset['subcategory'] = $this->db->order_by('unique_id', 'desc')->get_where('product_category', array('product_category_parent' => $data['row'][$first]['item_category'], 'flag !=' => 3, 'language_id' => $find['language_id']));
						
						// Kalo ada just stop :D
						if ($asset['subcategory']->row_array()) break;
					}
					
					
				}
				else
				{
					$asset['parent_selected'] = $current[0]['product_category_parent'];
					
					$asset['child_selected'] = $check['item_category'];
					#$asset['subcategory'] = $this->db->group_by('unique_id')->get_where('product_category', array('product_category_parent' => $current[0]['product_category_parent'], 'flag !=' => 3))->result_array();
					
					foreach (language()->result_array() as $find)
					{
						$asset['subcategory'] = $this->db->order_by('unique_id', 'desc')->get_where('product_category', array('product_category_parent' => $current[0]['product_category_parent'], 'flag !=' => 3, 'language_id' => $find['language_id']));
						
						// Kalo ada just stop :D
						if ($asset['subcategory']->row_array()) break;
					}
				}
				
				
				
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