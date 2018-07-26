<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
	
		// if (!in_array ($_SERVER['HTTP_X_FORWARDED_FOR'], $this->config->config['filter_ip'])) {
		//    header('Location:'.$config['base_url'].'not_found'); 
		//    exit();
		// }
	}

	public function index()
	{
		$asset = array(
					'title'	=> 'Login',
					'js'	=> array('jquery.validate.min', 'admin/login'),
					'css'	=> array(),
					'web'	=> $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array()
				);
			
		if ($this->session->userdata('admin_login') === TRUE) $asset['title'] = 'Home';
		   
		$this->load->view('admin/template/header', $asset);
		
		if ($this->session->userdata('admin_login') === FALSE || !($this->session->userdata('admin_login'))) $this->load->view('admin/login_view');
		elseif ($this->session->userdata('admin_login') === TRUE)
		{
			if ($this->session->userdata('referral'))
			{
				$url = $this->session->userdata('referral');
				$this->session->unset_userdata('referral');
				redirect($url);
			}
			$this->load->view('admin/template/menu');
		}
		
		$this->load->view('admin/template/footer');
	}
	
	public function validate()
	{
		$this->load->model('model_security');
		$check = $this->model_security->login();
		
		if ($check === TRUE)
		{
		
			$html = 'success';
		}
		
		elseif ($check === FALSE) $html= 'warning';
		elseif ($check === NULL) $html= 'incorrect';
		elseif ($check === 'timeout') $html= 'timeout';
		elseif ($check === 'captcha') $html= 'captcha';
		if ($html == 'incorrect'){ 
			$this->session->set_flashdata('message', 'username dan password salah');
		
		}
		else if ($html == 'warning'){
			$this->session->set_flashdata('message', 'username tidak aktif. hubungi bagian terkait.');

			
		}
		else if ($html == 'timeout'){
			$menit = $this->config->config["banned_login_duration"];
			$this->session->set_flashdata('message', 'Account has been temporary locked for '. $menit.' minutes. ');

		}
		else if ($html == 'captcha'){
			$this->session->set_flashdata('message', 'Captcha Invalid.');

		}
	
		redirect(base_url('goadmin'));
		
	}
}