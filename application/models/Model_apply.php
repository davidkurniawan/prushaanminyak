<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_apply extends CI_Model {
	
	var $table = 'apply';

	function read($apply_id)
	{	
		$data = array(
					'apply_read' => 1
				);
				
		$this->db->where('apply_id', $apply_id);
		$this->db->update('apply', $data);
		return TRUE;
	}
	
	
	public function insert()
	{	
		$unique_id = unique_id($this->table);
			$data = array(
			'unique_id'		=> $unique_id,
			'language_id'	=> 1,
			'apply_name'	=> $this->input->post('apply_name'),
			'flag'			=> $this->input->post('flag'),
			'flag_memo'		=> $this->input->post('flag_memo')
		);
			
		$this->db->insert($this->table, $data);
		
		// Query for log :)
		$row = $this->db->order_by($this->table . '_id', 'asc')->get_where($this->table, array('unique_id' => $data['unique_id']))->row_array();
		
		action_log('ADD', $this->table, $row['unique_id'], $row[$this->table. '_name'], 'ADDED ' . $this->table. ' ( ' . $row[$this->table. '_name'] . ' ) ');
	}
	
	public function update()
	{
		$language = language()->result_array();
		foreach ($language as $lang_data)
		{	
			$data = array(
					'unique_id'		=> $this->input->post('id'),
					'language_id'	=> 1,
					'apply_name'	=> $this->input->post('apply_name'),
					'flag'			=> $this->input->post('flag'),
					'flag_memo'		=> $this->input->post('flag_memo')
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

	public function getApplicant($date_start=FALSE, $date_end=FALSE)
	{
		$this->db->select('*');
		$this->db->select('job_function.job_function_name');
		$this->db->from('apply');
		$this->db->join('job_function', 'apply.apply_job_function = job_function.unique_id','left');
		$this->db->where('apply.flag =',1);

		if($date_start AND $date_end) :
			$this->db->where('(DATE(apply.apply_date) BETWEEN "'.$date_start.'" AND "'.$date_end.'")',NULL);
		endif;
        $this->db->order_by('apply.apply_date','DESC');

		return $this->db->get()->result_array();
	}
}