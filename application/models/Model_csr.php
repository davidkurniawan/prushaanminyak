<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_csr extends CI_Model {



	var $table = 'csr';



	public function insert()

	{

		// Upload Image

		$file = file_upload('csr_image', 'images/csr', FALSE);

		$file = file_upload('csr_image', 'images/csr/thumb', FALSE);



		if ($file)

		{

			$image = image_resize($file, $this->image_width, $this->image_height);

			$thumb = image_resize($file, $this->thumb_width, $this->thumb_height);



			$file_name = $image['file_name'];

			$file_thumb = $thumb['file_name'];

		}



		else {
			$file_name = '';
			$file_thumb = '';
		}



		$language = language()->result_array();

		$unique_id = unique_id($this->table);



		foreach ($language as $lang_data)

		{

			$data = array(

				'unique_id'		=> $unique_id,

				'language_id'		=> $lang_data['language_id'],

				'csr_name'		=> $this->input->post('csr_name_' . $lang_data['language_id']),

				'seo_url'		=> trim(url_title($this->input->post('csr_name_' . $language[0]['language_id']), 'dash', TRUE)),

				'csr_type'		=> 1,

				'csr_image'		=> $file_name,

				'csr_image_thumb'	=> $file_thumb,

				'csr_start'		=> $this->input->post('csr_start'),

				// 'csr_end'		=> $this->input->post('csr_end'),

				'csr_content'		=> $this->input->post('csr_content_' . $lang_data['language_id']),

				'flag'			=> $this->input->post('flag'),

				'flag_memo'		=> $this->input->post('flag_memo')

			);



			// if ($this->input->post('csr_type') == 1 || $this->input->post('csr_type') == 3) $data['csr_end'] = '2999-12-31';



			$this->db->insert($this->table, $data);

			// pre($data);

		}


		$images = '';
        $multi_file = RFw_multi_upload('multipleimage', 'images/csr/slide/', TRUE);
        $image_sort = $this->input->post('multipleimage_sort');
        if(!empty($multi_file)) {
            foreach($multi_file as $key_image => $images){
            	image_resize($images, $this->image_width, $this->image_height);
                $upload = array(
                    'unique_id'				=> $data['unique_id'],
                    'csr_multiple_name'	=> $images['file_name'],
                    'csr_multiple_sort'	=> $image_sort[$key_image]
                );
                $this->db->insert('csr_multiple', $upload);
            }
        }



		// Query for log :)

		$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $data['unique_id']))->row_array();



		action_log('ADD', $this->table, $row['unique_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');

	}



	public function update()

	{

		// Upload Image

		$file = file_upload('csr_image', 'images/csr', FALSE);

		$file = file_upload('csr_image', 'images/csr/thumb', FALSE);



		if ($file)

		{

			$image = image_resize($file, $this->image_width, $this->image_height);

			$thumb = image_resize($file, $this->thumb_width, $this->thumb_height);



			$file_name = $image['file_name'];

			$file_thumb = $thumb['file_name'];

		}

		else

		{

			$row = $this->db->get_where($this->table, array('unique_id' => $this->input->post('id')))->result_array();

			$file_name = $row[0]['csr_image'];

			$file_thumb = $row[0]['csr_image_thumb'];

		}

		// pre($row);

		$language = language()->result_array();



		foreach ($language as $lang_data)

		{

			$data = array(

					'unique_id'		=> $this->input->post('id'),

					'language_id'		=> $lang_data['language_id'],

					'csr_name'		=> $this->input->post('csr_name_' . $lang_data['language_id']),

					'seo_url'		=> trim(url_title($this->input->post('csr_name_' . $language[0]['language_id']), 'dash', TRUE)),

					'csr_type'		=> 1,

					'csr_image'		=> $file_name,

					'csr_image_thumb' 	=> $file_thumb,

					'csr_start'		=> $this->input->post('csr_start'),

					'csr_end'		=> $this->input->post('csr_end'),

					'csr_content'		=> $this->input->post('csr_content_' . $lang_data['language_id']),

					'flag'			=> $this->input->post('flag'),

					'flag_memo'		=> $this->input->post('flag_memo')

				);



			// if ($this->input->post('csr_type') == 1 || $this->input->post('csr_type') == 3) $data['csr_end'] = '2999-12-31';



			// Pertama cek, language itu udah ada ato blom

			$exist = $this->db->select($this->table . '_id')->where(array('language_id' => $lang_data['language_id'], 'unique_id' => $this->input->post('id')))->get($this->table)->row_array();



			// Kalo ada, kita update aja :)

			$this->db->where($this->table . '_id', $exist[$this->table . '_id']);

			$this->db->update($this->table, $data);

		}

		$images = '';
        $multi_file = RFw_multi_upload('multipleimage', 'images/csr/slide/', TRUE);
        $image_sort = $this->input->post('multipleimage_sort');
        if(!empty($multi_file)) {
            foreach($multi_file as $key_image => $images){
            	image_resize($images, $this->image_width, $this->image_height);
                $upload = array(
                    'unique_id'			=> $data['unique_id'],
                    'csr_multiple_name'	=> $images['file_name'],
                    'csr_multiple_sort'	=> $image_sort[$key_image]
                );
                $this->db->insert('csr_multiple', $upload);
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
        $this->db->delete('csr_multiple', array('csr_multiple_id' => $item_id));
    }



	// public function CountAll()

	// {

	// 	return $this->db->get_where($this->table,array('flag !=' => 3, 'language_id' => 1))->num_rows();

	// }







 

	// public function readAll($num,$offset)

	// {

	// 	$this->db->select('*');

	// 	$this->db->where('flag !=',3);

	// 	$this->db->where('language_id',1);

	// 	$this->db->order_by('csr_start', 'desc');

	// 	return  $this->db->get($this->table,$num,$offset)->result_object();

	// }







	// public function readAll()

	// {

	// 	return $this->db->get_where($this->table,array('flag !=' => 3))->result_object();

	// }



}

