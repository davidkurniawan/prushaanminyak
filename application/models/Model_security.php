<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_security extends CI_Model {
	
	public function login()
	{
		$data_post = $this->security->xss_clean($this->input->post());
		$condition = array(
						'admin_username'	=> $data_post['username'],
						'admin_password'	=> md5($data_post['password']),
						'flag !='		=> 3
					);
		$asset['web'] = $this->db->order_by('setting_id', 'desc')->get_where('setting', array('flag' => 1))->row_array();			
		$query = $this->db->get_where('admin', $condition)->row_array();

		

			if (empty($query)){
				if($this->config->config['banned_login'] === TRUE){
					$cek_user = $this->db->get_where('admin', array('admin_username' =>  $data_post['username']))->row_array();
					if(!empty($cek_user)){
						$id['admin_id']  = $cek_user['admin_id'];
						$up['tolerant'] = ($cek_user['tolerant'] +1);
						
						if($up['tolerant'] < ($this->config->config['banned_login_time'] + 1)){
							$this->db->query("UPDATE admin SET tolerant=tolerant+1 WHERE admin_id={$id['admin_id']}");
							
						} else {
							$waktu = "+".$this->config->config["banned_login_duration"]." minutes" ;
						
							$time['timeout'] = date("Y-m-d H:i:s", strtotime($waktu));
							$this->db->update('admin',$time,$id);
							return 'timeout';
							
						}
					} else {
						if(!empty($this->session->userdata['salah'])){
							$this->session->userdata['salah'] += 1;
						}else {
							 $this->session->set_userdata('salah', 1);
						}
							if($this->session->userdata['salah'] >6){
								return 'timeout';
							} else return NULL;
					}
				}
				else {
					return NULL;
				}
			} else {
				if(!empty($this->session->userdata['salah'])){
						$this->session->unset_userdata('salah');
					}
				if($query['timeout'] < date("Y-m-d H:i:s")) {

					$up['tolerant'] = 0;
					$id['admin_id'] = $query['admin_id'];
					$this->db->update('admin',$up,$id);

					if ($query['flag'] == 1)
					{
						$sess_data = array(
										'admin_login'     => TRUE,
										'admin_name'      => $query['admin_name'],
										'admin_privilege' => $query['admin_privilege'],
										'admin_id'        => $query['admin_id'],
										'admin_unique_id' => $query['unique_id'],
										'CMSLogin'        =>"CMSLogin"
									);
									
						$this->session->set_userdata($sess_data);

						$ses_generate= $this->session->userdata['__ci_last_regenerate'];
						$ses_ci= $this->session->userdata('__ci_last_regenerate');

						$adm_ses = 'admin_id|s:1:"' .$this->session->userdata('admin_id').'"';
						// $this->db->query("delete from {$this->config->config['sess_save_path']} where data like  '%{$adm_ses}%' and data not like '%{$ses_ci}%'");
						action_log('LOGIN', 'admin', $query['admin_id'], $query['admin_name'], 'Successful Login');
						
						return TRUE;
					}

					elseif ($query['flag'] == 2)
					{
						action_log('LOGIN', 'admin', $query['admin_id'], $query['admin_name'], 'Login Failed (Inactive)');
						return FALSE;
					}
				} else {
					return 'timeout';
				}
			}
		
	}
}
