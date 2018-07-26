<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inbox extends CI_Controller {

	// Also for table name
	var $url = 'message';
	var $model = 'model_message';
	var $title = 'Message';
	
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
					'query'	=> $this->db->order_by($this->url.'_id', 'desc')->get_where($this->url, array('flag !=' => 3))
				);
				
		// Unread count.
		$unread = $this->db->get_where('message', array('flag' => 2))->num_rows();
		
		$message = ($unread > 1) ? 'messages' : 'message';
		$asset['unread'] = $unread . ' new ' . $message;
		
		if ($unread == 0) $asset['unread'] = 'No new message';
		
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
		
		$this->form_validation->set_rules('faq_name', 'name', 'required');
		
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
			redirect(base_url() . 'goadmin/inbox');
		}
	}
	
	public function view($item_id)
	{
		check_access($this->url, 'read', TRUE);
		
		$check = $this->db->get_where($this->url, array($this->url . '_id' => $item_id, 'flag !=' => 3))->row_array();
		
		if ($check)
		{
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form'),
						'css'	=> array(),
						'row'	=> $check
					);
					
			$this->load->model($this->model);
			$model_name = $this->model;
			$this->$model_name->read($item_id);

			$this->form_validation->set_rules('message_reply', 'Reply', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/template/header', $asset);
				$this->load->view('admin/template/menu');
				$this->load->view('admin/' . $this->url . '/view_' . $this->url);
				$this->load->view('admin/template/footer');
			}
			else
			{
				$this->$model_name->reply();
				
				$this->send_email($check);
				
				redirect(base_url() . 'goadmin/inbox');
			}
		}
		else redirect(base_url() . 'goadmin/inbox');
	}
	
	public function send_email($row)
	{
		$this->load->library('email');
		
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
		
		// Get contact info.
		$web = $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array();
		$subject = $web['setting_name'];
		$email_name = $row['message_email'];
		$email_to = $row['message_email'];
		$data_email = array(
						'type' => 'template_send_email',
						'contact_message' => '',
            			'from'  => 'noreply@gositus.com',
						'name' => $subject,
						'to_name' =>  $email_name,
						'to' => $email_to,
						'subject' => 'Application from ',
						'link' => '',
						'link_title' => '',
						'title' => 'Application'
					);

					//Pesan untuk email
                	$data_email['message'] = '
					<p style="margin-bottom:15px; font-size:13px;">Hey There : '. $this->input->post('message_name') .'  </p><br>

					<p style="margin-bottom:15px; font-size:13px;">'. $this->input->post('message_reply') .' </p><br>
	               
	               <p style="margin-bottom:15px; font-size:13px;">Terima Kasih atas saran dan Kritiknya </p><br>

					<p style="margin-bottom:15px; font-size:13px;"><i>This is an automatic mail,<br />
	                please do not reply</i></p>
					';
                	sendemail($data_email,1);
	}
}