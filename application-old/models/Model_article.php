<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_article extends CI_Model {
	
	var $table = 'article';
	
	
	public function insert()
	{
		// Upload Image
		$file = file_upload('article_image', 'images/article', FALSE);
		
		if ($file)
		{
			if($this->input->post('section_key') == '6')
			{
				// sshe image
				$image = image_resize($file, $this->sshe_width, $this->sshe_height);
			}
			else if($this->input->post('section_key') == '2')
			{
				// vision mission image
				$image = image_resize($file, $this->visimisi_width, $this->visimisi_height);
			}
			else if($this->input->post('section_key') == '3')
			{
				// vision mission image
				$image = image_resize($file, $this->corporate_width, $this->corporate_height);
			}
			else if($this->input->post('section_key') == '4')
			{
				// working mission image
				$image = image_resize($file, $this->working_width, $this->working_height);
			}
			else if($this->input->post('section_key') == '9')
			{
				// working mission image
				$image = image_resize($file, $this->home_width, $this->home_height);
			}
			else if($this->input->post('section_key') == '8')
			{
				// our bussines image
				$image = image_resize($file, $this->our_width, $this->our_height);
			}
			else
			{
				$image = image_resize($file, $this->image_width, $this->image_height);
			}

			$file_name = $image['file_name'];
		}
		else
		{
			 $file_name = '';
		}
		
		
		$language = language()->result_array();
		$unique_id = unique_id($this->table);
		
		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'			=> $unique_id,
					'language_id'		=> $lang_data['language_id'],
					'article_name'		=> $this->input->post('article_name_' . $lang_data['language_id']),
					'seo_url'			=> url_title(trim($this->input->post('article_name_' . $language[0]['language_id'])), 'underscore', TRUE),
					'article_head'		=> $this->input->post('article_head_' . $lang_data['language_id']),
					'article_image'		=> $file_name,
					'article_content'	=> $this->input->post('article_content_' . $lang_data['language_id']),
					'flag'				=> $this->input->post('flag'),
					'flag_memo'			=> $this->input->post('flag_memo')
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
		$file = file_upload('article_image', 'images/article', FALSE);
		
		if ($file)
		{
			if($this->input->post('section_key') == 6)
			{
				// sshe image
				$image = image_resize($file, $this->sshe_width, $this->sshe_height);
			}
			else if($this->input->post('section_key') == 2)
			{
				// vision mission image
				$image = image_resize($file, $this->visimisi_width, $this->visimisi_height);
			}
			else if($this->input->post('section_key') == 3)
			{
				// vision mission image
				$image = image_resize($file, $this->corporate_width, $this->corporate_height);
			}
			else if($this->input->post('section_key') == 4)
			{
				// working mission image
				$image = image_resize($file, $this->working_width, $this->working_height);
			}
			else if($this->input->post('section_key') == 8)
			{
				// our bussines image
				$image = image_resize($file, $this->our_width, $this->our_height);
			}
			else if($this->input->post('section_key') == 9)
			{
				// working mission image
				$image = image_resize($file, $this->home_width, $this->home_height);
			}
			else
			{
				// default image
				$image = image_resize($file, $this->image_width, $this->image_height);
			}
			
			$file_name = $image['file_name'];
		}
		else
		{
			$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('article_section'=> $this->input->post('section_key'),'unique_id' => $this->input->post('id')))->result_array();
			$file_name = $row[0]['article_image'];
		}
		
		$language = language()->result_array();
		
		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'			=> $this->input->post('id'),
					'language_id'		=> $lang_data['language_id'],
					'article_name'		=> $this->input->post('article_name_' . $lang_data['language_id']),
					'seo_url'			=> url_title(trim($this->input->post('article_name_' . $language[0]['language_id'])), 'underscore', TRUE),
					'article_head'		=> $this->input->post('article_head_' . $lang_data['language_id']),
					'article_image'		=> $file_name,
					'article_content'	=> $this->input->post('article_content_' . $lang_data['language_id']),
					// 'article_section'	=> $this->input->post('article_section'),
					'flag'				=> $this->input->post('flag'),
					'flag_memo'			=> $this->input->post('flag_memo')
				);
				
			// Pertama cek, language itu udah ada ato blom
			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();
		
			// Kalo ada, kita update aja :)
			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);
			$this->db->update($this->table, $data);
		}
		
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id') ))->row_array();
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');		
		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}
}