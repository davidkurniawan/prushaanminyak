<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_section extends CI_Model {
	
	var $table = 'section';
	
	public function insert()
	{
		$data_post = $this->security->xss_clean($this->input->post());
		$data = array(
				'unique_id'		=> unique_id($this->table),
				'section_name'	=> htmlspecialchars($data_post['section_name']),
				'flag'			=> htmlspecialchars($data_post['flag']),
				'flag_memo'		=> htmlspecialchars($data_post['flag_memo'])
			);
		
		$this->db->insert($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array($this->table . '_id' => $this->db->insert_id()))->row_array();
		
		action_log('ADD', $this->table, $row[$this->table . '_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}
	
	public function update()
	{
		$data_post = $this->security->xss_clean($this->input->post());
		$data = array(
				'section_name'	=> htmlspecialchars($data_post['section_name']),
				'flag'			=> htmlspecialchars($data_post['flag']),
				'flag_memo'		=> htmlspecialchars($data_post['flag_memo']))
		;
		
		$this->db->where('unique_id', $data_post['id']);
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		
		action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
	}
}