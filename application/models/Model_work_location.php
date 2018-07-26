<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_work_location extends CI_Model {
	
	var $table = 'work_location';
	
	public function insert()
	{	
		$unique_id = unique_id($this->table);
		
			$data = array(
					'unique_id'		=> $unique_id,
					'language_id'	=> 1,
					'work_location_name' => $this->input->post('work_location_name'),
					'flag'			=> $this->input->post('flag'),
					'flag_memo'		=> $this->input->post('flag_memo')
				);
			
			$this->db->insert($this->table, $data);
		
		// Query for log :)
		$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $data['unique_id']))->row_array();
		
		action_log('ADD', $this->table, $row['unique_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}
	
	public function update()
	{
		$language = language()->result_array();

		$data = array(
				'unique_id'		=> $this->input->post('id'),
				'language_id'	=> 1,
				'work_location_name'	=> $this->input->post('work_location_name'),
				'flag'			=> $this->input->post('flag'),
				'flag_memo'		=> $this->input->post('flag_memo')
			);
	
		$this->db->where($this->table . '_id', $this->input->post('id'));
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');		
		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}
}