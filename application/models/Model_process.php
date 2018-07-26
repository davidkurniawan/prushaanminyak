<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_process extends CI_Model {
	
	public function flag()
	{
		$action = ($this->input->post('new_flag') == 1) ? 'ACTIVATE ' : 'DEACTIVATE ';
		$this->db->where('unique_id', $this->input->post('id'));
		$this->db->update($this->input->post('table'), array('flag' => $this->input->post('new_flag'), 'flag_memo' => $this->input->post('flag_memo')));
		
		$row = $this->db->get_where($this->input->post('table'), array('unique_id' => $this->input->post('id')))->row_array();
		
		action_log('UPDATE', $this->input->post('table'), $this->input->post('id'), $row[$this->input->post('table') . '_name'], $action . $this->input->post('table') . ' ( ' . $row[$this->input->post('table') . '_name'] . ' ) - Reason: ' . $this->input->post('flag_memo'));
	}
	
	public function delete()
	{
		$this->db->where('unique_id', $this->input->post('id'));
		$this->db->update($this->input->post('table'), array('flag' => 3));
		
		$table_with_language = explode(',', ALLOW_LANGUAGE);
		
		if ($this->input->post('table') == 'language')
		{
			foreach ($table_with_language as $table)
			{
				$this->db->where('language_id', $this->input->post('id'));
				$this->db->update($table, array('flag' => 3));
			}
		}
		
		$row = $this->db->order_by($this->input->post('table') . '_id', 'asc')->get_where($this->input->post('table'), array('unique_id' => $this->input->post('id')))->row_array();
		
		action_log('DELETE', $this->input->post('table'), $this->input->post('id'), $row[$this->input->post('table') . '_name'], 'DELETED ' . $this->input->post('table') . ' ( ' . $row[$this->input->post('table') . '_name'] . ' ) ');
		
	}
	
	public function delete_image()
	{
		$data = array(
				$this->input->post('field') => ''
			);
			
		$this->db->where('unique_id', $this->input->post('id'));
		$this->db->update($this->input->post('table'), $data);
	}
}