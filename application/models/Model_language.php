<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_language extends CI_Model {
	
	var $table = 'language';
	
	public function insert()
	{
		// Upload Image
		$file = file_upload('language_icon', 'images/language', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->icon_width, $this->icon_height);
			$file_name = $image['file_name'];
		}
		
		else $file_name = '';
		
		$data = array(
				'unique_id'		=> unique_id($this->table),
				'language_name'	=> $this->input->post('language_name'),
				'language_code'	=> $this->input->post('language_code'),
				'language_icon'	=> $file_name,
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
		// Upload Image
		$file = file_upload('language_icon', 'images/language', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->icon_width, $this->icon_height);
			$file_name = $image['file_name'];
		}
		else
		{
			$row = $this->db->get_where('language', array('unique_id' => $this->input->post('id')))->row_array();
			$file_name = $row['language_icon'];
		}
		
		$data = array(
				'language_name'	=> $this->input->post('language_name'),
				'language_code'	=> $this->input->post('language_code'),
				'language_icon'	=> $file_name,
				'flag'			=> $this->input->post('flag'),
				'flag_memo'		=> $this->input->post('flag_memo')
			);
		
		$this->db->where('unique_id', $this->input->post('id'));
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		
		action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
	}
}