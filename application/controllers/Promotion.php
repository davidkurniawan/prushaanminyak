<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promotion extends CI_Controller {

	public function index()
	{
		$asset = array(
			'title'	=>  $this->lang->line('News'),
			'js'	=> array('scrollreveal'),
			'css'	=> array(),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array()
		);

		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('sales_promotion_view');
		$this->load->view('template/footer');
	}
}
