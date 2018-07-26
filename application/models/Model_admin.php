<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_admin extends CI_Model {
	
	var $table = 'admin';
	
	public function insert()
	{
		$data_post = $this->security->xss_clean($this->input->post());
		$data = array(
				'unique_id'			=> unique_id($this->table),
				'admin_name'		=> htmlspecialchars($data_post['admin_name']),
				'admin_username'	=> htmlspecialchars($data_post['admin_username']),
				'admin_password'	=> md5(htmlspecialchars($data_post['admin_password'])),
                // 'admin_email'		=> htmlspecialchars($data_post['admin_email']),
                'admin_email'		=> '',

                'admin_mobile'		=> htmlspecialchars($data_post['admin_mobile']),
				'admin_privilege'	=> htmlspecialchars($data_post['admin_privilege']),
				'module_list'		=> '',
				'access'			=> '',
				'flag'				=> htmlspecialchars($data_post['flag']),
				'flag_memo'			=> htmlspecialchars($data_post['flag_memo'])
			);
			
		
		// For custom privilege
		if ($data_post['admin_privilege'] == 3)
		{
			// Get all module list
			$modules = $this->db->query('SELECT child.* from module as child inner join module as parent on `child`.`module_parent` = `parent`.`module_id` where `child`.`flag` = 1 and `parent`.flag = 1 and `child`.`module_parent` != 0');
			// $modules = $this->db->get_where('module', array('flag' => 1, 'module_parent !=' => 0))->result_array();
			foreach ($modules->result_array() as $item)
				$module_list[$item['module_id']] = $data_post[$item['module_id']];
			
			$data['module_list'] = implode(',', array_keys($module_list));
			$data['access'] = implode(',', array_values($module_list));
		}
		
		$this->db->insert($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array($this->table . '_id' => $this->db->insert_id()))->row_array();
		
		action_log('ADD', $this->table, $row[$this->table . '_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}
	
	public function update()
	{

		$data_post = $this->security->xss_clean($this->input->post());
		$data = array(
				'admin_privilege'	=> htmlspecialchars($data_post['admin_privilege']),
				'flag'				=> htmlspecialchars($data_post['flag']),
				'flag_memo'			=> htmlspecialchars($data_post['flag_memo']),
                // 'admin_email'		=> htmlspecialchars($data_post['admin_email']),
                'admin_email'		=> '',
                'admin_mobile'		=> htmlspecialchars($data_post['admin_mobile']),
                'admin_name'		=> $data_post['admin_name'],
				'module_list'		=> '',
				'access'			=> ''
			);
		
		if ($this->input->post('admin_password')) $data['admin_password'] = md5($this->input->post('admin_password'));
		
		if ($data_post['admin_privilege'] == 3)
		{
			// Get all module list
			// $modules = $this->db->get_where('module', array('flag' => 1, 'module_parent !=' => 0));
			$modules = $this->db->query('SELECT child.* from module as child inner join module as parent on `child`.`module_parent` = `parent`.`module_id` where `child`.`flag` = 1 and `parent`.flag = 1 and `child`.`module_parent` != 0');

			foreach ($modules->result_array() as $item)
				$module_list[$item['module_id']] = $data_post[$item['module_id']];
			
			$data['module_list'] = implode(',', array_keys($module_list));
			$data['access'] = implode(',', array_values($module_list));
		}
		
		$this->db->where('unique_id', $data_post['id']);
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $data_post['id']))->row_array();
		
		action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
	}

		public function update_other()
	{

		$data_post = $this->security->xss_clean($this->input->post());
		$data = array(
				
                // 'admin_email'		=> htmlspecialchars($data_post['admin_email']),
                'admin_email'		=> '',
                'admin_mobile'		=> htmlspecialchars($data_post['admin_mobile']),
               
			);
		
		if ($this->input->post('admin_re_password')) $data['admin_password'] = md5($this->input->post('admin_re_password'));
		
		
		
		$this->db->where('unique_id', $data_post['id']);
		$this->db->update($this->table, $data);
		
		// Query for log :)
		$row = $this->db->get_where($this->table, array('unique_id' => $data_post['id']))->row_array();
		
		action_log('UPDATE', $this->table, $row['unique_id'], $row[$this->table . '_name'], 'MODIFY ' . $this->table . ' ( ' . $row[$this->table . '_name'] . ' ) ');
	}
}