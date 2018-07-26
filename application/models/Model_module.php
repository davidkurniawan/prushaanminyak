<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_module extends CI_Model {
	
	var $table = 'module';
	
	public function insert()
	{
		$data = array(
				'unique_id'		=> unique_id($this->table),
				'module_name'	=> $this->input->post('module_name'),
				'module_alias'	=> trim(url_title($this->input->post('module_name'), 'underscore', TRUE)),
				'module_parent'	=> $this->input->post('module_parent'),
				'module_url'	=> $this->input->post('module_url'),
				'module_notes'	=> $this->input->post('module_notes'),
				'flag'			=> $this->input->post('flag'),
				'flag_memo'		=> $this->input->post('flag_memo')
			);
		
		$this->db->insert($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array($this->table . '_id' => $this->db->insert_id()))->row_array();
		
		action_log('ADD', $this->table, $row[$this->table . '_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}
	
	public function update()
	{
		$data = array(
				'module_name'	=> $this->input->post('module_name'),
				'module_alias'	=> trim(url_title($this->input->post('module_name'), 'underscore', TRUE)),
				'module_parent'	=> $this->input->post('module_parent'),
				'module_url'	=> $this->input->post('module_url'),
				'module_notes'	=> $this->input->post('module_notes'),
				'flag'			=> $this->input->post('flag'),
				'flag_memo'		=> $this->input->post('flag_memo')
			);
		
		$this->db->where($this->table . '_id', $this->input->post('id'));
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array($this->table . '_id' => $this->input->post('id')))->row_array();
		
		action_log('UPDATE', $this->table, $row[$this->table . '_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
	}
}