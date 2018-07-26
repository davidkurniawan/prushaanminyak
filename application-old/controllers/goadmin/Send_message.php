<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Send_message extends CI_Controller {

	// Also for table name
	var $url = 'send_message';
	var $model = 'model_send_message';
	var $title = 'Send Message';
	
	public function __construct(){
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
		
		$this->form_validation->set_rules('message_to', 'Email', 'required');
        $this->form_validation->set_rules('message_subject', 'Subject', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$this->load->view('admin/template/header', $asset);
			$this->load->view('admin/template/menu');
			$this->load->view('admin/' . $this->url . '/add_' . $this->url);
			$this->load->view('admin/template/footer');
		}else{
			$this->load->model($this->model);
			$model_name = $this->model;
            $post_data = $this->input->post();
            
            // Upload
    		$file = file_upload_web('message_attach', 'images/mail_attachment', FALSE);
    		if ($file){
    			$post_data['file_name'] = $file['file_name'];
    		}else{
  		        $post_data['file_name'] = '';
    		}
            
            $this->send_email($post_data);
			$this->$model_name->insert($post_data);
			redirect(base_url() . 'goadmin/send_message');
		}
	}
	
	public function view($item_id)
	{
		check_access($this->url, 'read', TRUE);
		
		$check = $this->db->get_where($this->url, array($this->url . '_id' => $item_id, 'flag !=' => 3))->row_array();
		
		if ($check)
		{
            $this->load->model($this->model);
            $model_name = $this->model;
            
			$asset = array(
						'title'	=> $this->title,
						'url'	=> $this->url,
						'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form'),
						'css'	=> array(),
						'row'	=> $check,
                        'user'  => $this->$model_name->user($this->session->userdata('admin_id'))
					);

				$this->load->view('admin/template/header', $asset);
				$this->load->view('admin/template/menu');
				$this->load->view('admin/' . $this->url . '/view_' . $this->url);
				$this->load->view('admin/template/footer');

		}
		else redirect(base_url() . 'goadmin/inbox');
	}
	
	private function send_email($data = ''){
        $asset['web'] = $this->db->get_where('setting', array('flag' => 1))->row_array();
        $asset['admin'] = $this->db->get_where('admin', array('flag' => 1, 'admin_id' => $this->session->userdata('admin_id')))->row_array();
        $asset['to'] = $data['message_to'];
        $asset['message'] = $data['message'];
        $final_msg = $this->load->view('template/template_send_email', $asset, TRUE);

        $this->load->library('email');
        $config = array('mailtype' => 'html');
        $this->email->initialize($config);
        
        if(!empty($asset['admin']['admin_email'])){
            $this->email->from($asset['admin']['admin_email'], $asset['admin']['admin_name']);
        }else{
            $this->email->from('noreply@gositus.com', 'gositus');
        }
        
        $this->email->to($asset['to']);
        if($data['message_cc']){ $this->email->cc($data['message_cc']); }
        if($data['message_bcc']){ $this->email->bcc($data['message_bcc']); }
        if($data['file_name']){ $this->email->attach('images/mail_attachment/'.$data['file_name']); }
        $this->email->subject($data['message_subject']);
        $this->email->message($final_msg);

        $this->email->send();
        echo $this->email->print_debugger();exit;
	}
    
    public function email_view(){
        exit;
        $asset['web'] = $this->db->get_where('setting', array('flag' => 1))->row_array();
        $asset['to'] = $data['message_to'];
        $asset['message'] = $data['message'];
        $final_msg = $this->load->view('template/template_send_email', $asset, TRUE);
        
        echo $final_msg;
    }
    
}