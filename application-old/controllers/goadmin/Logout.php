<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function index()
	{
		
		if(!empty($this->session->userdata['admin_id'])){
		action_log('LOGOUT', 'admin', $this->session->userdata('admin_id'), $this->session->userdata('admin_name'), 'Logout');
				
		$sess_data = array(
						'admin_login'	=> '',
						'admin_name'	=> '',
						'admin_id'		=> ''
					);
					
		$this->session->unset_userdata($sess_data);		
		 $this->session->sess_destroy();
		}
		redirect(base_url() . 'goadmin');
	}
}