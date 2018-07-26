<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sequential extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        check_login();
    }

	public function index(){
		redirect();
	}
    
    public function delete(){
        $idList = json_decode($this->input->post('id'));
        $tableName = $this->input->post('table');
        $total = count($idList);
        $data = array(
            'flag' => 3
        );
        foreach($idList as $v1){
            $this->db->where('unique_id', $v1)->update($tableName, $data);

            $row = $this->db->order_by('unique_id', 'asc')->get_where($tableName , array('unique_id' => $v1))->row_array();

            if(!empty($row[$tableName . '_name'])){
               $nama  = $row[$tableName . '_name'];
            } else {
                $nama = 'unique_id = ' . $v1;
            }
            action_log('DELETE', $tableName , $v1, $nama, 'DELETED ' . $tableName  . ' ( ' . $nama . ' ) ');
        }
        $return['result'] = 'success';
        $return = array(
            'result' => 'success',
            'count' => $total
        );
        

    }
    
}