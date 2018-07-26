<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Setting extends CI_Controller {



	// Also for table name

	var $url = 'setting';

	var $model = 'model_setting';

	var $title = 'Setting';

	

	var $logo_width = 200;

	var $logo_height = 200;

	

	public function __construct()

	{

		parent::__construct();

		check_login();

	}

	

	public function index()

	{
// pre('tes');	
#		check_access($this->url, 'read', TRUE);

		

		$check = $this->db->order_by('setting_id', 'desc')->get_where($this->url, array('flag' => 1))->result_array();

		

		$asset = array(

					'title'	=> $this->title,

					'url'	=> $this->url,

					'js'	=> array('jquery.validate.min', 'admin/form'),

					'css'	=> array(),

					'row'	=> $check

				);

		

		$this->form_validation->set_rules('setting_web_title', 'name', 'required');

	

		if ($this->form_validation->run() == FALSE)

		{

			$this->load->view('admin/template/header', $asset);

			$this->load->view('admin/template/menu');

			$this->load->view('admin/' . $this->url . '/view_' . $this->url);

			$this->load->view('admin/template/footer');

		}

		else

		{
			$this->load->model($this->model);

			$model_name = $this->model;

			$this->$model_name->update();

			$this->session->set_flashdata('success', '<h2 class="success">Your Settings has been saved!</h2>');

			redirect(base_url() . 'goadmin/' . $this->url);

		}

	}

}