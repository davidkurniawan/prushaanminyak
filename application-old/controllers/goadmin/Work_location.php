<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Work_location extends CI_Controller {

	// Also for table name
	var $url = 'work_location';
	var $model = 'Model_work_location';
	var $title = 'Work Location';
	
	
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
	
	public function view($work_location_id)
	{
		check_access($this->url, 'read', TRUE);

		$check = $this->db->get_where($this->url, array('unique_id' => $work_location_id, 'flag !=' => 3))->row_array();

		if ($check)
		{
			$asset = array(
				'title'	=> $this->title,
				'url'	=> $this->url,
				'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'admin/datepicker'),
				'css'	=> array()
			);

			// $first = check_for_new_language($work_location_id, $this->url);

			// $data['first'] = $first;

			// Perlu di ulang untuk query selanjutnya.
			// foreach (language(TRUE)->result_array() as $lang)
			// {
			// 	foreach ($lang as $coba)
			// 	{
			// 	}
			// }
			$data['row'] = $this->db->get_where($this->url, array('unique_id' => $work_location_id, 'flag !=' => 3, 'language_id' => 1))->row_array(); 
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
}