<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
		check_login();
		
	}

	public function flag()
	{
		if($this->input->post()){
		$this->model_process->flag();
		} else {
			redirect(base_url('goadmin'));
		}
	}
	
	public function delete()
	{
		if($this->input->post()){
		$this->model_process->delete();
		} else {
			redirect(base_url('goadmin'));
		}
	}
	
	public function delete_image()
	{
		if($this->input->post()){
		$this->model_process->delete_image();
		} else {
			redirect(base_url('goadmin'));
		}
	}
}