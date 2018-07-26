<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Module extends CI_Controller {

	// Also for table name
	var $url = 'module';
	var $model = 'model_module'; 
	var $title = 'Module';
	
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
					'css'	=> array('blue/style'),
					'query' => $this->db->query("SELECT child.module_id, child.unique_id, child.module_name, child.module_alias, parent.module_name AS module_parent, child.module_url, child.module_notes, child.flag, child.flag_memo FROM module AS child LEFT JOIN module AS parent ON parent.module_id = child.module_parent WHERE child.flag != 3 ORDER BY child.unique_id desc;")
                   
				);

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
				
		// Get all parent modules
		$data['modules'] = $this->db->get_where('module', array('module_parent' => 0, 'flag !=' => 3));
		
		$this->form_validation->set_rules('module_name', 'name', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('admin/template/header', $asset);
			$this->load->view('admin/template/menu');
			$this->load->view('admin/' . $this->url . '/add_' . $this->url, $data);
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
		
		$check = $this->db->get_where($this->url, array('unique_id' => $item_id, 'flag !=' => 3))->result_array();
		
		if ($check)
		{
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.validate.min', 'admin/form'),
						'css'	=> array(),
						'row'	=> $check
					);
					
			$data['modules'] = $this->db->get_where('module', array('module_parent' => 0, 'flag !=' => 3, 'module_id !=' => $item_id));
			
			$this->form_validation->set_rules('module_name', 'name', 'required');
		
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