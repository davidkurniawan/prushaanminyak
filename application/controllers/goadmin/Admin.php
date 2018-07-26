<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	// Also for table name
	var $url = 'admin';
	var $model = 'model_admin';
	
	var $title = 'Admin';
	
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
					'query'	=> $this->db->order_by($this->url.'_id', 'desc')->get_where($this->url, array('flag !=' => 3, 'admin_id !=' => 2))
				);
		if(	$this->session->userdata('admin_privilege') != 1 && $this->uri->rsegments[2] == 'index'){
		redirect(base_url() . 'goadmin/' );
		}
		$this->load->view('admin/template/header', $asset);
		$this->load->view('admin/template/menu');
		$this->load->view('admin/' . $this->url . '/list_' . $this->url);
		$this->load->view('admin/template/footer');
	}
	
	public function add()
	{
		if(	$this->session->userdata('admin_privilege') != 1 ){
		redirect(base_url() . 'goadmin/' );
		}
		$asset = array(
					'title'	=> $this->title,
					'url'	=> $this->url,
					'js'	=> array('jquery.validate.min', 'admin/form', 'admin/privilege'),
					'css'	=> array('blue/style')
				);
				
		// Get all parent modules.
		$data['parent_modules'] = $this->db->get_where('module', array('flag' => 1, 'module_parent' => 0));

		$this->form_validation->set_rules('admin_name', 'name', 'required');
		
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
		if(	$this->session->userdata('admin_unique_id') != $item_id && $this->session->userdata('admin_privilege') != 1  ){
		redirect(base_url() . 'goadmin/' );
		}
		$check = $this->db->get_where($this->url, array('unique_id' => $item_id, 'flag !=' => 3))->result_array();
		
		if ($check)
		{
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.tablesorter.min', 'jquery.tablesorter.pager', 'jquery.validate.min', 'admin/form', 'admin/privilege', 'admin/log'),
						'css'	=> array('blue/style'),
						'row'	=> $check
					);
					
					
			// Get all parent modules.
			$data['parent_modules'] = $this->db->get_where('module', array('flag' => 1, 'module_parent' => 0));
			
			// Get logs by selected admin.
			$data['logs'] = $this->db->join('admin', 'log_admin_id = admin_id')->order_by('log_id', 'desc')->get_where('log', array('log_admin_id' => $item_id));
			
			$this->form_validation->set_rules('admin_name', 'name', 'required');
		
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
				if($this->session->userdata['admin_privilege'] == 1){
					 $this->$model_name->update();
				} else {
					 $this->$model_name->update_other();
				}
				
					redirect(base_url() . 'goadmin/' . $this->url);
				
			}
		}
		else redirect(base_url() . 'goadmin/' . $this->url);
	}
	
	public function check_username()
	{
		if( $this->session->userdata('admin_privilege') == 1 ){
			$row = $this->db->get_where('admin', array('admin_username' => $this->input->get('admin_username'), 'flag !=' => 3))->row_array();
			echo ($row) ? 'false' : 'true';
		}
	}
	


		public function cari_token()
	{
		
		$row =  $this->security->get_csrf_hash(); 
		
		echo $row ;
		
	}
		public function check_password()
	{
		
		$row = $this->db->get_where('admin', array('admin_id' => $this->session->userdata['admin_id'], 'admin_password' => md5($this->input->get('old_password')), 'flag !=' => 3))->row_array();
		
		echo ($row) ? 'true' : 'false';
	
	}
	public function check_password_valid(){
		$pwd = $this->input->post('admin_password');
			
			$valid ='';
			if (preg_match("#[a-z]+#", $pwd) && 
				preg_match("#[A-Z]+#", $pwd) && 
				preg_match("#[0-9]+#", $pwd) &&
				!strpos($pwd, $this->input->post('admin_username')) &&
				!strpos($pwd, 'asd123') &&
				preg_match("#[\W]+#", $pwd)  &&
				strlen($pwd) >=8 ) {
		       $valid = "valid";
		    } 
		    echo ($valid) ? 'true' : 'false';
		  
	}
}