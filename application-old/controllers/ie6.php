<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ie6 extends CI_Controller {

	public function index()
	{
		$data['web'] = $this->db->get_where('setting', array('flag' => 1))->row_array();
		$this->load->view('template/ie6', $data);	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */