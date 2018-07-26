<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_news extends CI_Model {

	var $table = 'news';

	public function insert()
	{
		// Upload Image
		$file = file_upload('news_image', 'images/news', FALSE);
		$filethumb = file_upload('news_image', 'images/news/thumb', FALSE);

		if ($file)
		{
			$file2 = file_upload('news_image', 'images/news/home', FALSE);

			image_resize($file2, $this->thumb_home_width, $this->thumb_home_height);
			image_resize($file, $this->image_width, $this->image_height);
			image_resize($filethumb, $this->thumb_width, $this->thumb_height);

			$file_name = $file['file_name'];
			$file_thumb = $filethumb['file_name'];
		}
		else $file_name = '';
	

		$language = language()->result_array();
		$unique_id = unique_id($this->table);

		foreach ($language as $lang_data)
		{
			$data = array(
				'unique_id'		=> $unique_id,
				'language_id'	=> $lang_data['language_id'],
				'news_name'		=> $this->input->post('news_name_' . $lang_data['language_id']),
				'seo_url'		=> trim(url_title($this->input->post('news_name_' . $language[0]['language_id']), 'dash', TRUE)),
				'news_type'		=> 1,
				'news_image'	=> $file_name,
				'news_image_thumb' => $file_thumb,
				'news_start'	=> $this->input->post('news_start'),
				'news_end'		=> $this->input->post('news_end'),
				'news_content'	=> $this->input->post('news_content_' . $lang_data['language_id']),
				'flag'			=> $this->input->post('flag'),
				'flag_memo'		=> $this->input->post('flag_memo')
			);

			$this->db->insert($this->table, $data);
		}

		$images = '';
        $multi_file = RFw_multi_upload('multipleimage', 'images/news/slide/', TRUE);
        $image_sort = $this->input->post('multipleimage_sort');
        if(!empty($multi_file)) {
            foreach($multi_file as $key_image => $images){
            	image_resize($images, $this->image_width, $this->image_height);
                $upload = array(
                    'unique_id'				=> $data['unique_id'],
                    'news_multiple_name'	=> $images['file_name'],
                    'news_multiple_sort'	=> $image_sort[$key_image]
                );
                $this->db->insert('news_multiple', $upload);
            }
        }

		// Query for log :)
		$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $data['unique_id']))->row_array();

		action_log('ADD', $this->table, $row['unique_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}

	public function update()
	{
		// Upload Image
		$file = file_upload('news_image', 'images/news', FALSE);
		$filethumb = file_upload('news_image', 'images/news/thumb', FALSE);

	
		if ($file)
		{
			$file2 = file_upload('news_image', 'images/news/home', FALSE);
			image_resize($file2, $this->thumb_home_width, $this->thumb_home_height);

			image_resize($file, $this->image_width, $this->image_height);
			image_resize($filethumb, $this->thumb_width, $this->thumb_height);

			$file_name = $file['file_name'];
			$file_thumb = $filethumb['file_name'];
		}
		else
		{
			$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();
			$file_name = $row[0]['news_image'];
			$file_thumb = $row[0]['news_image_thumb'];
		}
		// pre($row);
		$language = language()->result_array();

		foreach ($language as $lang_data)
		{
			$data = array(
					'unique_id'		=> $this->input->post('id'),
					'language_id'	=> $lang_data['language_id'],
					'news_name'		=> $this->input->post('news_name_' . $lang_data['language_id']),
					'seo_url'		=> trim(url_title($this->input->post('news_name_' . $language[0]['language_id']), 'dash', TRUE)),
					'news_type'		=> 1,
					// 'news_type'		=> $this->input->post('news_type'),
					'news_image'	=> $file_name,
					'news_image_thumb' => $file_thumb,
					'news_start'	=> $this->input->post('news_start'),
					'news_end'		=> $this->input->post('news_end'),
					'news_content'	=> $this->input->post('news_content_' . $lang_data['language_id']),
					'flag'			=> $this->input->post('flag'),
					'flag_memo'		=> $this->input->post('flag_memo')
				);

			// Pertama cek, language itu udah ada ato blom
			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();

			// Kalo ada, kita update aja :)
			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);
			$this->db->update($this->table, $data);
		}

		$images = '';
        $multi_file = RFw_multi_upload('multipleimage', 'images/news/slide/', TRUE);
        $image_sort = $this->input->post('multipleimage_sort');
        if(!empty($multi_file)) {
            foreach($multi_file as $key_image => $images){
            	image_resize($images, $this->image_width, $this->image_height);
                $upload = array(
                    'unique_id'				=> $data['unique_id'],
                    'news_multiple_name'	=> $images['file_name'],
                    'news_multiple_sort'	=> $image_sort[$key_image]
                );
                $this->db->insert('news_multiple', $upload);
            }
        }

		$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->row_array();
		if($row['flag'] == 3) {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'DELETED ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		} else {
			action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
		}
	}

	public function delete_image($item_id)
	{
        $this->db->delete('news_multiple', array('news_multiple_id' => $item_id));
    }

}
