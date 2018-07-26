<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('language_code'))
{
	function language_code()
	{
		$ci =& get_instance();
		return $ci->uri->segment(1) . '/';
	}
}
if ( ! function_exists('limit_words'))
{
		function limit_words($string, $word_limit)
		{
			    $words = explode(" ",$string);
			    return implode(" ",array_splice($words,0,$word_limit));
			    echo 'sudah 40kata';
	}
}

if ( ! function_exists('current_language'))
{
	function current_language()
	{
		$ci =& get_instance();
		
		// $id = $ci->db->select('language_id')->where('language_code', $ci->uri->segment(1))->get('language')->row_array();
		$id = $ci->db->select('language_id')->where('language_code', $ci->config->config['language_abbr'])->get('language')->row_array();
		
		return $id['language_id'];
	}
}

if ( ! function_exists('check_for_new_language'))
{
	function check_for_new_language($item_id, $database)
	{
		$ci =& get_instance();

		foreach (language(TRUE)->result_array() as $lang)
		{			
			foreach ($lang as $coba)
			{
				$row[$coba] = $ci->db->get_where($database, array('unique_id' => $item_id, 'flag !=' => 3, 'language_id' => $coba))->row_array();
			}
		}
		
		$temp = array_keys($row);
		$first = $temp[0];
		
#		echo '<pre>';
#		print_r($row);exit;

		foreach (language()->result_array() as $check_lang)
		{
			if ( ! $row[$check_lang['language_id']])
			{
				$offset = array(
					'unique_id' => $item_id,
					'language_id' => $check_lang['language_id']
				);

				$ci->db->insert($database, $offset);
			}
		}
		
		return $first;
	}
}

if ( ! function_exists('unique_id'))
{
	function unique_id($table_name)
	{
		$ci =& get_instance();
		$last_entry = $ci->db->select('unique_id')->order_by('unique_id', 'desc')->get($table_name)->row_array();
		
		$unique_id = ($last_entry) ? $last_entry['unique_id'] + 1 : 1;
		
		return $unique_id;
	}
}

if ( ! function_exists('language'))
{
	function language($query = FALSE)
	{
		$ci =& get_instance();
		
		$select = ($query == FALSE) ? 'language_id, language_code' : 'language_id';

		return $ci->db->select($select)->order_by('language_id', 'asc')->where('flag', 1)->get('language');
	}
}

if ( ! function_exists('language_bar'))
{
	function language_bar()
	{
		$ci =& get_instance();
		
		// How many languages are there?
		$check = $ci->db->select('language_name, language_id, language_code')->order_by('language_id', 'asc')->where('flag', 1)->get('language');
		
		if ($check->num_rows() > 1)
		{
			if (in_array($ci->uri->segment(2), explode(',', ALLOW_LANGUAGE)))
			{
				// Show language bar
				$html = '<ul id="language-bar">';
				$x = 0;
				foreach ($check->result_array() as $item)
				{
					$show = ($x == 0) ? ' active' : '';
					$html .= '<li><a class="input-submit' . $show . '" href="javascript:;" id="lang-' . $item['language_code'] . '">' . $item['language_name'] . '</a></li>';
					$x++;
				}
				
				$html .= '</ul>';
				
				return $html;	
			}
		}
	}
}
if ( ! function_exists('change_language'))
{
	function change_language()
	{
		$ci =& get_instance();
		
		// How many languages are there?
		$check = $ci->db->select('language_name, language_id, language_code')->order_by('language_id', 'asc')->where('flag', 1)->get('language');
		
		if ($check->num_rows() > 1)
		{
			if (in_array($ci->uri->segment(2), explode(',', ALLOW_LANGUAGE)))
			{
				// Show language bar
				$html = '<ul id="language-bar">';
				$x = 0;
				
				foreach ($check->result_array() as $item)
				{
					$show = ($x == 0) ? ' active' : '';
					$html .= '<li><a class="input-submitaaaa' . $show . '" href="javascript:;" id="lang-' . $item['language_code'] . '">' . $item['language_name'] . '</a></li>';
					$x++;
				}
				
				$html .= '</ul>';
				
				return $html;	
			}
		}
	}
}

if ( ! function_exists('check_login'))
{
	function check_login()
	{
		$ci =& get_instance();
		// if online HTTP_X_FORWARDED_FOR
		// if (!in_array ($_SERVER['REMOTE_ADDR'], $ci->config->config['filter_ip'])) {
		//    header('Location:'.$config['base_url'].'not_found'); 
		//    exit();
		// }
		if ($ci->session->userdata('admin_login') === FALSE || !($ci->session->userdata('admin_login')))
		{
			// Save session "referral"
			$ci->session->set_userdata('referral', current_url());
			$ci->session->set_flashdata('error_message', 'Harap login terlebih dahulu');
			redirect(base_url() . 'goadmin');
		}
	}
}

if ( ! function_exists('action_log'))
{
	function action_log($action, $db, $val = '#', $name, $desc)
	{
		$ci =& get_instance();
		
		$data = array(
				'log_admin_id' => $ci->session->userdata('admin_unique_id'), 
				'log_action' => $action,
				'log_db' => $db,
				'log_value' => $val,
				'log_name' => $name,
				'log_desc' => $desc,
				'log_ip' => $ci->input->ip_address()
			);
			
		$ci->db->insert('log', $data);
	}
}

if ( ! function_exists('show_menu'))
{
	function show_menu()
	{
		$ci =& get_instance();
		
		// Get all parent modules
		$parent_modules = $ci->db->order_by('module_name', 'asc')->get_where('module', array('module_parent' => 0, 'flag' => 1, 'module_id !=' => 1));
		
		$html = '';
		
		// And get setting modules - INTERNAL USE ONLY.
		$setting = $ci->db->get_where('module', array('module_id' => 1))->row_array();
		
		if ($ci->session->userdata('admin_id') == 2)
		{
			$html .= '<li>';
			$html .= '<a href="' . $setting['module_url'] . '">' . $setting['module_name'] . '</a>';
			// Check for submenu
			$submenu = $ci->db->order_by('module_name', 'asc')->get_where('module', array('module_parent' => $setting['module_id'], 'flag' => 1));
			
			// If there's submenu, display them
			if ($submenu->num_rows() >= 0)
			{
				$html .= '<ul>';
				
				foreach ($submenu->result_array() as $subitem)
				{
					if (check_access($subitem['module_url'], 'menu'))
						$html .= '<li><a href="' . base_url() . 'goadmin/' . $subitem['module_url'] . '">' . $subitem['module_name'] . '</a></li>';
				}
					
				$html .= '</ul>';
			}
			
			$html .= '</li>';
		}
		
		// All other modules
		
		foreach ($parent_modules->result_array() as $item)
		{
			$access = FALSE;
			
			// Message module :)
			
			$unread = '';
			if ($item['module_id'] == 27)
			{
				// Get unread message count.
				$unread = $ci->db->get_where('apply', array('apply_read' => 0))->num_rows();
				
				$unread = ($unread > 0) ? '<strong>('.$unread.')</strong>' : '';
			}

			if ($item['module_id'] == 21)
			{
				// Get unread message count.
				$unread = $ci->db->get_where('message', array('flag' => 2))->num_rows();
				
				$unread = ($unread > 0) ? '<strong>('.$unread.')</strong>' : '';
			}
			
			
			// Check for submenu
			$submenu = $ci->db->order_by('module_name', 'asc')->get_where('module', array('module_parent' => $item['module_id'], 'flag' => 1));

			// If there's submenu, display them
			if ($submenu->num_rows() > 0)
			{
				$temp = '<ul>';
				
				foreach ($submenu->result_array() as $subitem)
				{
					if (check_access($subitem['module_url'], 'menu'))
					{
						$access = TRUE;
						
						if ($subitem['module_id'] == 6)
						{
							if ($ci->session->userdata('admin_privilege') == 1)
								$temp .= '<li><a href="' . base_url() . 'goadmin/' . $subitem['module_url'] . '">' . $subitem['module_name'] . '</a></li>';
						}
						else
						{
							$temp .= '<li><a href="' . base_url() . 'goadmin/' . $subitem['module_url'] . '">' . $subitem['module_name'] . '</a></li>';
						}
					}
				}
					
				$temp .= '</ul>';
			}
			
			if ($access == TRUE)
			{
				$html .= '<li>';
				$html .= '<a href="' . $item['module_url'] . '">' . $item['module_name'] . ' ' . $unread . '</a>';
				$html .= $temp;
			}
			
			$html .= '</li>';
		}
		
		return $html;
	}
}

if ( ! function_exists('file_upload'))
{
	function file_upload($field_name, $folder, $debug = FALSE)
	{
		$ci =& get_instance();
		
		
		$config = array(
					'upload_path'	=> $folder,
					'allowed_types'	=> 'gif|jpeg|jpg|png|register_tick_function(function)'
				);
				
		$ci->load->library('upload');
		$ci->upload->initialize($config);
		
		// If upload failed, whether it's permission problem OR no chosen files,
		if ( ! $ci->upload->do_upload($field_name))
		{
			// Return errors if debug is true.
			return ($debug == TRUE) ? $ci->upload->display_errors() : '';
		}
		else return $ci->upload->data();
	}
}

if ( ! function_exists('file_upload_web')){
	function file_upload_web($field_name, $folder, $debug = FALSE){
		$ci =& get_instance();
		$config = array(
					'upload_path'	=> $folder,
					'allowed_types'	=> 'doc|pdf|txt|docx|xls|xlsx|rtf'
				);
				
		$ci->load->library('upload', $config);
		
		// If upload failed, whether it's permission problem OR no chosen files,
		if ( ! $ci->upload->do_upload($field_name)){
			// Return errors if debug is true.
			return ($debug == TRUE) ? $ci->upload->display_errors() : '';
		}
		else return $ci->upload->data();
	}
}

if ( ! function_exists('image_resize'))
{
	function image_resize($image, $width, $height, $keep_ratio = TRUE)
	{
		
		if ($image)
		{
			// Does the current resolution exceed limit?
			if ($image['image_width'] > $width || $image['image_height'] > $height)
			{
				$config = array(
							'height'		=> $height,
							'width'			=> $width,
							'source_image'	=> $image['full_path'],
							'new_image'		=> $image['file_path'],
							'maintain_ratio'=> $keep_ratio
						);
						
				$ci =& get_instance();
				$ci->load->library('image_lib');
				
				$ci->image_lib->initialize($config);
				$ci->image_lib->resize();
			}
			return $image;
		}
	}
}

if ( ! function_exists('image_thumbnail'))
{
	function image_thumbnail($image, $width, $height, $folder, $ratio = TRUE)
	{
		if ($image)
		{
			$ci =& get_instance(); 
			
			$config = array(
						'image_library'	=> 'gd2',
						'width'				=> $width,
						'height'			=> $height,
						'source_image'		=> $image['full_path'],
						'new_image'			=> $image['file_path'] . $folder,
						'maintain_ratio'	=> $ratio
					);
			
			$ci->load->library('image_lib');		
			$ci->image_lib->initialize($config);
			$ci->image_lib->resize();
			
			return $image;
		}
	}
}

if ( ! function_exists('image_crop'))
{
	function image_crop($image, $width, $height, $ratio, $directory, $new_image = TRUE)
	{
		if ( ! $image) return FALSE;
		
		$ci =& get_instance();
	
		// Check if image resolution exceeds limit
		list($lebarThumb, $tinggiThumb, $type, $attr) = getimagesize($directory . $image['file_name']);
			
		$x_axis = ($lebarThumb - $width) / 2;
		$y_axis = ($tinggiThumb - $height) / 2; 
			
		// Resize process goes here
		$resize = array(
					'image_lib'		=> 'gd2',
					'quality'		=> '70',
					'height'		=> $height,
					'width'			=> $width,
					'source_image'	=> $directory . $image['file_name'],
					'maintain_ratio'=> $ratio,
					'x_axis'		=> $x_axis,
					'y_axis'		=> $y_axis
				);
				
		if ($new_image == TRUE) $resize['new_image'] = $directory . 'thumbs';
		else $resize['new_image'] = $image['file_path'] . 'thumbs';
				
		$ci->load->library('image_lib');
			
		$ci->image_lib->initialize($resize);
		$ci->image_lib->crop();		
		
		#echo $ci->image_lib->display_errors();
	}
}


if ( ! function_exists('check_access'))
{
	function check_access($module_url, $privilege, $redirect = FALSE)
	{
		if ($module_url == 'message') $module_url = 'inbox';
		
		$ci =& get_instance();
		
		$row = $ci->db->get_where('admin', array('admin_id' => $ci->session->userdata('admin_id')))->row_array();
		
		$module_query = $ci->db->select('module_id')->where('module_url', $module_url)->get('module')->row_array();
		
		$module_id = $module_query['module_id'];
		
		// Custom privilege
		if ($row['admin_privilege'] == 3)
		{
			$module_list = explode(',', $row['module_list']);
			$access = explode(',', $row['access']);
			$array_key = array_search($module_id, $module_list);
			
			if ($privilege == 'menu')
			{
				// If there's no access, redirect back to home.
				if ($access[$array_key] == 0)
				{
					if ($redirect == TRUE) redirect(base_url() . 'goadmin');
					return FALSE;
				}
				else return TRUE;
			}
			elseif ($privilege == 'add')
			{
				if (($access[$array_key] & 1) == 1) return TRUE;
				else
				{
					if ($redirect == TRUE) redirect(base_url() . 'goadmin/' . $module_url);
					else return FALSE;
				}
			}
			elseif ($privilege == 'edit')
			{
				if (($access[$array_key] & 2) == 2) return TRUE;
				else return FALSE;
			}
			elseif ($privilege == 'delete')
			{
				if (($access[$array_key] & 4) == 4) return TRUE;
				else return FALSE;
			}
			elseif ($privilege == 'read')
			{
				if (($access[$array_key] & 8) == 8) return TRUE;
				else
				{
					if ($redirect == TRUE) redirect(base_url() . 'goadmin/' . $module_url);
					else return FALSE;
				}
			}
		}
		elseif ($row['admin_privilege'] == 2)
		{
			if ($privilege == 'add' || $privilege == 'edit' || $privilege == 'read' || $privilege == 'menu') return TRUE;
			elseif ($privilege == 'delete') return FALSE;
		}
		elseif ($row['admin_privilege'] == 1) return TRUE;
	}
}

if ( ! function_exists('keywords'))
{
	function keywords($title, $eachword = true)
	{
		$word = explode("-", $title);
		$keywords = '';
		foreach($word as $item):
			$keywords .= trim($item) . ',';
		endforeach;

		if($eachword):
			$replace = array(" ", ":", " -", "|");
			$replace_to = array(", ", "", "", "");
			$keywords = str_replace($replace,$replace_to,$keywords);
		else:
			$keywords = $keywords;
		endif;

		return strtolower($keywords);
	}
}

if ( ! function_exists('sendemail')){
	function sendemail($data = array(), $clear = ''){
       
		$ci =& get_instance();
		$ci->load->library('email');
        
        //$config['useragent']        = 'CodeIgniter';    
        $config['protocol']         = 'smtp';
        $config['smtp_host']        = 'ssl://smtp.gmail.com';
        $config['smtp_port']        = '465';
        $config['smtp_user']        = 'dev@gositus.com'; 
        $config['smtp_pass']        = 'Go123456!';
        $config['smtp_timeout']     = 5;
	
        
        $config['wordwrap']         = TRUE;
        $config['wrapchars']        = 76;
        $config['mailtype']         = 'html';
        $config['charset']          = 'utf-8';
        $config['validate']         = FALSE;
        $config['priority']         = 3;
        //$config['crlf']             = "\r\n";
       // $config['newline']          = "\r\n";
        $config['bcc_batch_mode']   = FALSE;
        $config['bcc_batch_size']   = 200;
		$config['validation']	= TRUE;        
        $ci->email->initialize($config);
		
		$ci->email->set_newline("\r\n");
        
        //if($clear == 1){
            $ci->email->clear();
        //}
        
        if(!empty($data['name']) && !empty($data['from'])){
        	$ci->email->from($data['from'], $data['name']);
        }else{
        	$ci->email->from('noreply@gositus.com', 'GO Online Solusi');
        }
        $ci->email->to($data['to']);
        if(!empty($data['cc'])){ $ci->email->cc($data['cc']); }
        if(!empty($data['bcc'])){ $ci->email->bcc($data['bcc']); }
        if(!empty($data['attachment']))
        	{ 
        		$ci->email->attach('upload/files/job_apply/'.$data['attachment']);
        	}


        $ci->email->subject($data['subject']);
        
        $template['title'] = $data['title'];
        $template['message'] = $data['message'];
        $template['to'] = $data['to'];
        $template['to_name'] = $data['to_name'];
        $template['from'] = $data['from'];
        $template['name'] = $data['name'];
        $template['link'] = !empty($data['link'])?$data['link']:'';
		$template['link_title'] = !empty($data['link_title'])?$data['link_title']:'';
        $template['type'] = $data['type'];

       
        
        $template['web'] = $ci->db->query('select * from setting where flag = 1')->row_array();
        $email_view = $ci->load->view('template/template_send_email', $template, TRUE);
        
        //echo $email_view; exit;
        // pre($email_view);
        
        $ci->email->message($email_view);
        $ci->email->send();
        
        //if($clear == 1){
            return TRUE;
        //}
        
	}
}


	
if ( ! function_exists('go_captcha'))
{
	function go_captcha()
	{

		$ci =& get_instance();
		if( !empty($ci->session->userdata['anti_spam']) && $ci->session->userdata['anti_spam'] > date("Y-m-d H:i:s")  ){
			return false;
	}
	else
	{
		if(!empty($ci->session->userdata['anti_spam'])){
			$ci->session->unset_userdata('anti_spam');
			$ci->session->unset_userdata('waktu_captcha');
			$ci->session->unset_userdata('request_captcha');
		}
		if(!empty($ci->session->userdata['waktu_captcha']) || !empty($ci->session->userdata['request_captcha'])){
			if($ci->session->userdata['waktu_captcha'] > date("Y-m-d H:i:s")  ){
				$alasan = 'belum_dapat_generate';
				return FALSE;
			}
			else if( $ci->session->userdata['request_captcha'] >= 10){
				$ci->session->set_userdata('anti_spam' , date("Y-m-d H:i:s", strtotime('+ 1 hours')));
				return FALSE;
			}
			$ci->session->userdata['waktu_captcha'] = date("Y-m-d H:i:s", strtotime('+ 5 seconds'));
			$ci->session->userdata['request_captcha'] = $ci->session->userdata['request_captcha'] + 1;
		} else {
			$ci->session->userdata['waktu_captcha'] = date("Y-m-d H:i:s", strtotime('+ 5 seconds'));
			$ci->session->userdata['request_captcha'] = 0;
		}
		
		$vals = array(
         'img_path'      => './images/captcha/',
         'img_url'       => base_url().'images/captcha/',
         'font_path'     => './css/fonts/Arial-BoldMT.ttf',
         'img_width'     => '200',
         'img_height'    => 50,
         'expiration'    => 900,
         'word_length'   => 4,
         'font_size'     => 20,
         'img_id'        => 'Imageid',
            'pool'          => '0123456789abcdefghijklmnopqrstuvwxyz',
            
            // White background and border, black text and red grid
            'colors'        => array(
            'background'	=> array(244,249,255),
				'border'	=> array(153,102,102),
				'text'		=> array(0,0,0),
				'grid'		=> array(92,145,192)
			
            )
            );

            $cap = create_captcha($vals);
   
            return $cap;
    	}
    }
}