<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
  {
		parent::__construct();
    $this->load->helper('language');
	}

	public function index()
	{
		$asset = array(
					'title'	=> $this->lang->line('contact_us'),
					'js'	=> array('jquery.validate.min'),
					'css'	=> array(),
					'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
          'banner' => $this->Model_global->getMenuBanner(18),
          'contactHeading' => $this->Model_global->getContactUsHeading()
				);
    
    $this->form_validation->set_rules('message_name', 'Name', 'trim|required');
    $this->form_validation->set_rules('message_email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('message_phone', 'Subject','trim|required');
    $this->form_validation->set_rules('message_content', 'Message', 'trim|required');
    $this->form_validation->set_rules('g-recaptcha-response', 'Recaptcha', 'trim|required');
    $captcha = trim($this->input->post("g-recaptcha-response"));

    $secret_key = '6LePsiIUAAAAAAoLtge26rsN2uvknZeFFWwaR10A';
    $verify_capt = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key .
        "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];

    // $response = file_get_contents($verify_capt);
    // $response = json_decode($response, true);

    

    if($this->form_validation->run() == true && isset($captcha)){
        
      $unique = unique_id('message');
      $this->Model_global->createContact( array(
        "unique_id" => $unique,
        "message_name"=>$this->input->post("message_name"),
        "message_email"=>$this->input->post("message_email"),
        "message_phone"=>$this->input->post("message_phone"),
        "message_content"=>$this->input->post("message_content")
      ));

      $this->load->library('email');

      $config=array(
      'protocol'     => 'smtp',
      'smtp_host'    => 'smtp.mailgun.org',
      'smtp_port'    => '587',
      'smtp_user'    => 'postmaster@mg.pttep.co.id',
      'smtp_pass'    => 'bb294df8165a8f9a2bfe22418bd6f9d0',
      'mailtype'     => 'html',
      'charset'      => 'utf-8',
      'newline'      => '\r\n',
      'validation'   => 'true',
      'smtp_timeout' => '7'
      );

      $config['mailtype'] = 'html';
      $this->email->initialize($config);

      // Get contact info.
      $web = $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array();

      $this->email->from($this->input->post("message_email"),$this->input->post("message_name"));
      $this->email->to($web['setting_email']);

      $this->email->subject('Contact Us #'.($unique));
      $assetemail = array(
          'message_name'=>$this->input->post("message_name"),
          'message_email'=>$this->input->post("message_email"),
          'message_phone'=>$this->input->post("message_phone"),
          'message_company'=>$this->input->post("message_company"),
          'message_subject'=> '',
          'message_content' => $this->input->post("message_content"),
          'web' => $this->db->get_where('setting', array('flag' => 1))->row_array()

                        );
      $this->email->message($this->load->view('template/template_send_email2', $assetemail, TRUE));
      $this->email->send();
      // pre( $this->email->print_debugger());
      $this->session->set_flashdata('success','Thank you for your advice and criticism','');
      redirect(base_url('contact'));
      
    }

		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('contact_view');
		$this->load->view('template/footer');
	}
	public function add()
	{
        $asset = array(
      		'title'	=> 'Contact',
      		'js'	=> array('jquery.validate.min'),
      		'css'	=> array(),
      		'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array()
      	);

        $message = 'message_content';

             $data = array(    
              'message_name'			=>	 	$this->input->post('message_name'),
              'message_email' 			=>   	$this->input->post('message_email'),
              'message_phone' 			=>   	$this->input->post('message_phone'),
              'message_content'			=>		$this->input->post('message_content')
              );
           
           $recaptcha = $this->input->post('g-recaptcha-response');
       		 $response = $this->recaptcha->verifyResponse($recaptcha);

        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) 
        {
    			$this->load->view('template/header', $asset);
    			$this->load->view('template/top');
    			$this->load->view('contact_view');
    			$this->load->view('template/footer');
        } 
        else 
        {
	  		if($this->Model_global->contactform('message',$data))
	        {
            $this->session->set_flashdata('successindo','Terima Kasih atas sarannya');
				    $this->session->set_flashdata('success','Thank you for your advice and criticism');
	          redirect(base_url('contact'));
	       	}
	       	else
	       	{
            $this->session->set_flashdata('failureindo','Ada yang salah, Hubungi IT atau Admin');
    				$this->session->set_flashdata('failure','Something wrong, Please contact administrator or IT information');
    				redirect(base_url('contact'));
	       	}
        }

       	
       }

}
