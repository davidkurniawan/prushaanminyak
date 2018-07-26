<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Model_setting extends CI_Model {

	

	var $table = 'setting';

	

	public function update()

	{

		// Get previous row

		$sitekey= '6Le9dCQUAAAAAB9ASht9jdjc5H7bHIyUo8oPmQ0';

		$secretkey = '6Le9dCQUAAAAAEVoiCDrW9atkl4sjwhIASK39zv';

		$active_row = $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array();



		// Update to flag = 2

		$this->db->where('setting_id', $active_row['setting_id']);

		$this->db->update('setting', array('flag' => 2));



		// Upload image!

		$file = file_upload('setting_web_logo', 'images', FALSE);



		if ($file)

		{

			$image = image_resize($file, 200, 200);

			$file_name = $image['file_name'];

		}

		else $file_name = $active_row['setting_web_logo'];



		// Upload favicon!

		// $icon = file_upload('setting_favicon', 'favicon',FALSE);



		// if ($icon) $icon_name = $icon['file_name'];

		// else $icon_name = $active_row['setting_favicon'];





		$data = array(

				'setting_name'             => $this->input->post('setting_name'),

				'setting_address'          => $this->input->post('setting_address'),

				'setting_country'          => $this->input->post('setting_country'),

				'setting_city'             => $this->input->post('setting_city'),

				'setting_postcode'         => $this->input->post('setting_postcode'),

				'setting_phone'            => $this->input->post('setting_phone'),

				'setting_fax'              => $this->input->post('setting_fax'),

				'setting_email'            => $this->input->post('setting_email'),

				'setting_career_email'     => $this->input->post('setting_career_email'),

				'setting_latitude'         => $this->input->post('setting_latitude'),

				'setting_longitude'        => $this->input->post('setting_longitude'),

				'setting_recaptcha_site'   => $this->input->post('setting_recaptcha_site'),

				'setting_recaptcha_secret' => $this->input->post('setting_recaptcha_secret'),

				'setting_web_title'        => $this->input->post('setting_web_title'),

				'setting_web_motto'        => $this->input->post('setting_web_motto'),

				'setting_web_logo'         => $file_name,

				'setting_website'		   => $this->input->post('setting_website'),

				'setting_meta_desc'        => $this->input->post('setting_meta_desc'),

				'setting_meta_key'         => $this->input->post('setting_meta_key'),

				'flag'                     => 1,

				'flag_memo'                => 2,

			);


		$this->db->insert($this->table, $data);

	}

}