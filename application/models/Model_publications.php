<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_publications extends CI_Model {

	var $table = 'publications';
	
	public function insert()
	{
		// Upload Image
		$file = file_upload('publications_image', 'images/publications', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->thumb_width, $this->thumb_height);
			$file_name = $image['file_name'];
		}
		else
		{
			$file_name = '';
		}
		
		

		// Upload document
		// $x = file_upload('publications_doc', 'upload/files/publication', FALSE);
		// if($x)
		// {
		// 	$file_doc_name = $x['file_name'];
		// }
		// else 
		// {
		// 	$file_doc_name = '';
		// }

		
		$language = language()->result_array();
		$unique_id = unique_id($this->table);

		foreach ($language as $lang_data)
		{
			// Upload document
			$x = RFw_file_upload('publications_doc_'.$lang_data['language_id'], 'upload/files/publication');
			if($x)
			{
				$file_doc_name = $x['file_name'];
			}
			else 
			{
				$file_doc_name = '';
			}
			$data = array(
				'unique_id'					=> $unique_id,
				'language_id'				=> $lang_data['language_id'],
				'publications_name'		=> $this->input->post('publications_name_' . $lang_data['language_id']),
				// 'seo_url'					=> url_title(trim($this->input->post('publications_name_' . $language[0]['language_id'])), 'underscore', TRUE),

				'seo_url'					=> url_title(trim($this->input->post('publications_name_' . $lang_data['language_id'])), 'underscore', TRUE),
				'publications_doc'		=> $file_doc_name,
				'publications_image'	=> $file_name,
				'publications_category'	=> $this->input->post('publications_category_'.$lang_data['language_id']),

				// 'publications_content'	=> $this->input->post('publications_content_' . $lang_data['language_id']),
				'publications_content'	=> '',
				'publications_start'		=> $this->input->post('publications_start'),
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
		$file = file_upload('publications_image', 'images/publications', FALSE);
		
		if ($file)
		{
			$image = image_resize($file, $this->thumb_width, $this->thumb_height);
			$file_name = $image['file_name'];
		}
		else
		{
			$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
			$file_name = $row[0]['publications_image'];
		}

		//upload doc
		// $file_doc = file_upload('publications_doc', 'upload/files/publication', FALSE);
		
		// if ($file_doc)
		// {
		// 	$file_name_doc = $file_doc['file_name'];
		// }
		// else
		// {

		// 	$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
		// 	$file_name_doc = $row[0]['publications_doc'];
		// }

		$language = language()->result_array();
		$unique_id = unique_id($this->table);
		
		foreach ($language as $lang_data)
		{
			$file_doc = RFw_file_upload('publications_doc_'.$lang_data['language_id'], 'upload/files/publication');
			
			if ($file_doc)
			{
				$file_name_doc = $file_doc['file_name'];
			}
			else
			{
				$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
				$file_name_doc = $row[$lang_data['language_id']-1]['publications_doc'];
			}
			$data = array(
					'unique_id'					=> $this->input->post('id'),
					'language_id'				=> $lang_data['language_id'],
					'publications_name'		=> $this->input->post('publications_name_' . $lang_data['language_id']),
					// 'seo_url'					=> url_title(trim($this->input->post('publications_name_' . $language[0]['language_id'])), 'underscore', TRUE),
					'seo_url'					=> url_title(trim($this->input->post('publications_name_' . $lang_data['language_id'])), 'underscore', TRUE),
					'publications_doc'		=> $file_name_doc,
					'publications_image'		=> $file_name,
					'publications_category'	=> $this->input->post('publications_category_'.$lang_data['language_id']),
					// 'publications_content'	=> $this->input->post('publications_content_' . $lang_data['language_id']),
					'publications_content'	=> '',
					'publications_start'		=> $this->input->post('publications_start'),
					'flag'						=> $this->input->post('flag'),
					'flag_memo'					=> $this->input->post('flag_memo')
				);
				
			// Pertama cek, language itu udah ada ato blom
			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();
		
			// Kalo ada, kita update aja :)
			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);
			$this->db->update($this->table, $data);
		}
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}

}
