<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_banner extends CI_Model {
	
	var $table = 'banner';

	
	public function insert()
	{
		// Upload Image
		$file = file_upload('banner_image', 'images/banner', FALSE);
		
		if ($file)
		{
			if($this->input->post('flag_memo') == 'Menu Banner')
			{
				$image = image_resize($file, $this->menu_banner_width, $this->menu_banner_height);

			}
			else
			{
				$image = image_resize($file, $this->image_width, $this->image_height);
				
			}
			$file_name = $image['file_name'];
		}
		
		else $file_name = '';
		
		
		$data_post = $this->security->xss_clean($this->input->post());
		$language = language()->result_array();		
		$unique_id = unique_id($this->table);
		
		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'		=> $unique_id,
					'language_id'	=> $lang_data['language_id'],
					'banner_name'	=> $this->input->post('banner_name_' . $lang_data['language_id']),
					'seo_url'		=> trim(url_title($this->input->post('banner_name_' . $language[0]['language_id']), 'dash', TRUE)),
					'banner_heading'	=> $this->input->post('banner_heading_' . $lang_data['language_id']),
					'banner_caption'=> $this->input->post('banner_caption_' . $lang_data['language_id']),
					'banner_image'	=> $file_name,
					'banner_sort' 	=> $this->input->post('banner_sort'),
					'banner_link' 	=> $this->input->post('banner_link'),
					'flag'			=> $this->input->post('flag'),
					'flag_memo'		=> $this->input->post('flag_memo')
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
		$file = file_upload('banner_image', 'images/banner', FALSE);
		
		if ($file)
		{
			if($this->input->post('flag_memo') == 'Menu Banner')
			{
				$image = image_resize($file, $this->menu_banner_width, $this->menu_banner_height);
			}
			else
			{
				$image = image_resize($file, $this->image_width, $this->image_height);
			}
			$file_name = $image['file_name'];
		}
		else
		{
			$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
			$file_name = $row[0]['banner_image'];
		}
		
		$language = language()->result_array();
		
		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'		=> $this->input->post('id'),
					'language_id'	=> $lang_data['language_id'],
					'banner_name'	=> $this->input->post('banner_name_' . $lang_data['language_id']),
					'banner_heading'	=> $this->input->post('banner_heading_' . $lang_data['language_id']),
					'seo_url'		=> trim(url_title($this->input->post('news_name_' . $language[0]['language_id']), 'dash', TRUE)),
					'banner_caption'=> $this->input->post('banner_caption_' . $lang_data['language_id']),
					'banner_image'	=> $file_name,
					'banner_sort' 	=> $this->input->post('banner_sort'),
					'banner_link' 	=> $this->input->post('banner_link'),
					'flag'			=> $this->input->post('flag'),
					'flag_memo'		=> $this->input->post('flag_memo')
				);
				
				
			// Pertama cek, language itu udah ada ato blom
			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();

			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);
			$this->db->update($this->table, $data);
		}
			
		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');		
		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}
	public function ReadLanguage(){
		$query = $this->db->select('language_name,language_id,language_code')->order_by('language_id','asc')->where('flag',1)->get('language');
		if($query->num_rows() > 0)
		{
			if (in_array($ci->uri->segment(2), explode(',', ALLOW_LANGUAGE)))
			{
			foreach($query->result_array() as $row){
				$data[] = $row;
			}
			$query->free_result();
		}else{
			$data = NULL;
		}
		return $data;
		}
	}
}