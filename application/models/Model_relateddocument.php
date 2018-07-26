<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_relateddocument extends CI_Model {

var $table = 'relateddocument';
	var $image_height = 325;
	var $image_width = 1280;
	
	public function insert()
	{
		// Upload Image
		$file = file_upload('relateddocument_image', 'images/relateddocument', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->image_width, $this->image_height);
			$file_name = $image['file_name'];
		}
		
		else $file_name = '';


		// Upload document
		$file_doc = file_upload_web('relateddocument_doc', 'images/relateddocument', FALSE);
		
		if ($file_doc)
		{
			// $doc = image_resize($file_doc, $this->image_width, $this->image_height);
			
			$file_name_doc = $file_doc['file_name'];
		}

		else $file_name_doc = '';

		
		$language = language()->result_array();
		$unique_id = unique_id($this->table);

		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'					=> $unique_id,
					'language_id'				=> $lang_data['language_id'],
					'relateddocument_name'		=> $this->input->post('relateddocument_name_' . $lang_data['language_id']),
					'seo_url'					=> url_title(trim($this->input->post('relateddocument_name_' . $language[0]['language_id'])), 'underscore', TRUE),
					'relateddocument_doc'		=> $file_name_doc,
					'relateddocument_image'		=> $file_name,
					'relateddocument_content'	=> $this->input->post('relateddocument_content_' . $lang_data['language_id']),
					'relateddocument_start'		=> $this->input->post('relateddocument_start'),
					'relateddocument_end'		=> $this->input->post('relateddocument_end'),
					'flag'						=> $this->input->post('flag'),
					'flag_memo'					=> $this->input->post('flag_memo')
				);

			 $this->db->insert($this->table, $data);
		}
			
		// Query for log :)
		$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $data['unique_id']))->row_array();
		
		action_log('ADD', $this->table, $row['unique_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}

	public function update()
	{
		// Upload Image
		$file = file_upload('relateddocument_image', 'images/relateddocument', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->image_width, $this->image_height);
			$file_name = $image['file_name'];
		}
		else
		{
			$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
			$file_name = $row[0]['relateddocument_image'];
		}

		//upload doc
		$file_doc = file_upload_web('relateddocument_doc', 'images/relateddocument', FALSE);
		
		if ($file_doc)
		{
			// $doc = image_resize($file_doc, $this->image_width, $this->image_height);
			$file_name_doc = $file_doc['file_name'];
		}
		else
		{

			$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
			$file_name_doc = $row[0]['relateddocument_doc'];
		}

		// pre($_FILES);
		$language = language()->result_array();
		$unique_id = unique_id($this->table);
		
		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'					=> $this->input->post('id'),
					'language_id'				=> $lang_data['language_id'],
					'relateddocument_name'		=> $this->input->post('relateddocument_name_' . $lang_data['language_id']),
					'seo_url'					=> url_title(trim($this->input->post('relateddocument_name_' . $language[0]['language_id'])), 'underscore', TRUE),
					'relateddocument_doc'		=> $file_name_doc,
					'relateddocument_image'		=> $file_name,
					'relateddocument_content'	=> $this->input->post('relateddocument_content_' . $lang_data['language_id']),
					'relateddocument_start'		=> $this->input->post('relateddocument_start'),
					'relateddocument_end'		=> $this->input->post('relateddocument_end'),
					'flag'						=> $this->input->post('flag'),
					'flag_memo'					=> $this->input->post('flag_memo')
				);
				
			// Pertama cek, language itu udah ada ato blom
			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();
		// pre($exist);
			// Kalo ada, kita update aja :)
			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);
			$this->db->update($this->table, $data);
		}
		
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		// pre($row);
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');	

		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}

}
