<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_message extends CI_Model {

	var $table = 'message';
	
	public function read($message_id)
	{
		// Get current message!
		$check = $this->db->get_where('message', array('message_id' => $message_id))->row_array();
		
		$data = array(
					'flag' => 1
				);
				
		if ($check['flag_memo'] == 'New Message') $data['flag_memo'] = '';
		
		$this->db->where('message_id', $message_id);
		$this->db->update('message', $data);
		
	}
	
	public function reply()
	{
		$data = array(
					'message_reply'	=> $this->input->post('message_reply'),
					'flag_memo'		=> 'Message replied on: ' . date('l, d F Y'),
					'replied'		=> 1
				);
				
		$this->db->where('message_id', $this->input->post('id'));
		$this->db->update('message', $data);
	}
}