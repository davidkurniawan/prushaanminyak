<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_send_message extends CI_Model {

	var $table = 'send_message';
	
    public function insert($post = ''){
        /*
            [message_to] => edwin@gositus.com
    [message_subject] => edwin@gositus.com
    [message_cc] => 
    [message_bcc] => 
    [message] => 
        */
        $data = array(
            'send_message_to'       => $post['message_to'],
            'send_message_subject'  => $post['message_subject'],
            'send_message_content'  => $post['message'],
            'send_message_attach'   => $post['file_name'],
            'send_message_date'     => date('YmdHis'),
            'flag'                  => 1
        );
        $post['message_cc']?$data['send_message_cc']=$post['message_cc']:'';
        $post['message_bcc']?$data['send_message_bcc']=$post['message_bcc']:'';
        $this->db->insert($this->table, $data);
    }
    
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