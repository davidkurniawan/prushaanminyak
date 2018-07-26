<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class News extends CI_Controller {



	// Also for table name

	var $url = 'news';

	var $model = 'model_news';

	var $title = 'News';



	var $news_image = TRUE;



	var $thumb_home_width = 450;

	var $thumb_home_height = 262;



	var $thumb_width = 306;

	var $thumb_height = 234;



	var $image_height = 690;

	var $image_width = 1181;

	// var $image_height = 500;
	// var $image_width = 980;



	public function __construct()

	{

		parent::__construct();

		check_login();

	}



	public function index()

	{

		check_access($this->url, 'menu', TRUE);



		$filter = $this->input->post('news_filter');



		$where = array(

					'flag !=' => 3

		);



		if ($filter) $where['news_type'] = $filter;



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

					'js'	=> array('ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'jquery.validate.min', 'admin/datepicker', 'admin/imagemultiple'),

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

						'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'admin/datepicker', 'admin/imagemultiple'),

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

			$asset['imagesmultiple'] = $this->db->get_where('news_multiple', array('unique_id' => $data['row'][$first]['unique_id']))->result_array();	



			// Kalo ada image, include jquery image preview :)

			if ($data['row'][$first]['news_image']) array_push($asset['js'], 'jquery.imgpreview.min', 'admin/imgpreview');



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

	public function delete_image($item_id)
    {
        $this->load->model($this->model);
        $model_name = $this->model;
        $this->$model_name->delete_image($item_id);
    }

}

