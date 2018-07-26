<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Job_vacancy extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$asset = array(
			'title'	=> $this->lang->line('job'),
			'js'	=> array('fancybox/jquery.fancybox','jquery.validate.min'),
			'css'	=> array('fancybox/jquery.fancybox'),
			'web'	=> $this->db->get_where('setting', array('flag' => 1))->row_array(),
			'banner' => $this->Model_global->getMenuBanner(19),
			// isi dari dropdown & radio
			'job_function_list' => $this->Model_global->getOption('job_function'),
			'country_list' => $this->Model_global->getOption('country'),
			'work_location_list' => $this->Model_global->getOption('work_location'),
			'employment_type_list' => $this->Model_global->getOption('employment_type')
			//end isi
		);

		if($this->input->post())
		{
			$work_location = $this->input->post('work_location');
			$employment_type = $this->input->post('employment_type');
			$data['job_function'] = $this->input->post('job_function');
			$data['country'] = $this->input->post('country');
			$data['free_search'] = $this->input->post('free_search');


			$asset['job_function'] = $this->input->post('job_function');
			$asset['free_search'] = $this->input->post('free_search');

			
			/* enable this code if u want enabled work location option and dont forget ENABLE IN MODEL !!
			if(!empty($work_location))
			{
				$data['work_location'] = 'career_work_location in('.implode(',' , $this->input->post('work_location')).')';
			}
			*/ 

			if(!empty($employment_type))
			{
				$data['employment_type'] = 'career_employment_type in('.implode(',' , $this->input->post('employment_type')).')';
			}
			$asset['list_vacancy'] = $this->Model_global->getVacancy($data,TRUE);
			if(empty($asset['list_vacancy'])){
				$this->session->set_flashdata('notavailable','Thank you for your advice and criticism');
				// redirect(base_url('job_vacancy'));
			}
		}
		else
		{
			// daftar list lowongan
			$asset['list_vacancy'] = $this->Model_global->getVacancy('',TRUE);
		}
		// check apakah ada lowongan //
		$asset['check_row'] = $this->Model_global->checkRow('career');
		$this->load->view('template/header', $asset);
		$this->load->view('template/top');
		$this->load->view('job_vacancy_view');
		$this->load->view('template/footer');

	}

	public function apply_job()
	{
		
		if($_POST)
		{
			//get unique id for job name
			$unique_id = $this->input->post('unique_career');
			$job = $this->db->get_where('career',array('unique_id' => $unique_id))->row_array();
			$email = $this->input->post('email');
			$captcha = trim($this->input->post("g-recaptcha-response"));
			$secret_key = '6LePsiIUAAAAAAoLtge26rsN2uvknZeFFWwaR10A';
			$verify_capt = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret_key ."&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR'];
			$response = file_get_contents($verify_capt);
			$response = json_decode($response, TRUE);

			if($response["success"] == TRUE)
			{
				// upload file
				$file = file_upload_web('upload', 'upload/files/job_apply', FALSE);
				if($file)
				{
					$filename = $file['file_name'];
				}
				// insert applicant data to db
				if($this->Model_global->insertApply($filename))
				{
				    // Get email to
					$row = $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array();
					$email_to = $row['setting_career_email'];
					$email_name = $row['setting_name'];
					//send email
					$data_email = array(
						'type' => 'template_send_email',
						'contact_message' => '',
            			'from'  => 'noreply@gositus.com',
						'name' => 'Job Application',
						'to_name' =>  $email_name,
						'to' => $email_to,
						'subject' => 'Job Applicant',
						'link' => '',
						'link_title' => '',
						'title' => 'Application',
						'attachment' => $filename
					);

					//Message for email
                	$data_email['message'] = '
					<p style="margin-bottom:15px; font-size:13px;">You got message from '. base_url() .' : </p><br>
			     
	            	<table>
	            	<tr><td>Name</td><td> : </td><td>'. $this->input->post('name') .'</td></tr>
	            	<tr><td>Email</td><td> : </td><td>'. $this->input->post('email') .'</td></tr>
	            	<tr><td>Phone Number</td><td> : </td><td>'. $this->input->post('phone') .'</td></tr>
	            	<tr><td>Apply For Position</td><td> : </td><td>'. $job['career_name'] .'</td></tr>
	              	</table>
	               
					<p style="margin-bottom:15px; font-size:13px;"><i>This is an automatic mail,<br />
	                please do not reply</i></p>
					';
                	if(sendemail($data_email,1))
                	{
                		$this->session->set_flashdata('success','Thank u, You have successfully applied');
                		redirect(base_url().'job_vacancy','refresh');
                	}
                	else
                	{
                		// if cannot send email
                		$this->session->set_flashdata('failure','Something wrong, cant send email');
                	}
				}
				else
				{
					// if database or model not working well
					$this->session->set_flashdata('failure','Cannot save to database');
				}
			}
			else
			{
				//if response captcha false 
				$this->session->set_flashdata('failure','Racaptha not valid');
				redirect(base_url().'job_vacancy','refresh');
			}
		}
		else
		{
			// if no request / post, dont allow user access this controller
			redirect(base_url().'job_vacancy','refresh');
		}
	}
}
