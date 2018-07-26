<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apply extends CI_Controller {

	// Also for table name
	var $url = 'apply';
	var $model = 'Apply';
	var $title = 'Applicants';
	var $career_applicant_file = TRUE;
	var $career_applicant_file_2 = TRUE;
	
	
	public function __construct()
	{
		parent::__construct(); 
		check_login();
		$this->load->helper('download');
		$this->load->library('encrypt');
	}
	
	public function index()
	{
		check_access($this->url, 'menu', TRUE);
		
		$asset = array(
			'title'	=> $this->title,
			'url'	=> $this->url,
			'js'	=> array('admin/datepicker','admin/jquery.datetimepicker.full','jquery.tablesorter.min', 'jquery.tablesorter.pager', 'admin/list'),
			'css'	=> array('blue/style','jquery.datetimepicker')
		);
				
		$query = $this->db->order_by('unique_id', 'desc')->get_where($this->url, array('flag !=' => 3))->result_array();
		
		//start Filter date range
        $date_start = $this->input->get('date_start');
        $date_end = $this->input->get('date_end');

        $asset['date_start'] = ($date_start) ? $date_start : NULL;
        $asset['date_end'] = ($date_end) ? $date_end : NULL;

        if(!empty($date_start) or !empty($date_end))
        {
            $sql = "SELECT * FROM apply WHERE DATE(apply_date)  BETWEEN '$date_start' AND '$date_end' AND flag = '1' ORDER BY apply_date DESC";
            $query = $this->db->query($sql)->result_array();
        }

        $asset['query'] = $query;
		$this->load->view('admin/template/header', $asset);
		$this->load->view('admin/template/menu');
		$this->load->view('admin/' . $this->url . '/list_' . $this->url);
		$this->load->view('admin/template/footer');
	}

	public function download_cv($file)
	{
		$data['file'] = file_get_contents($file);
		return force_download('filename',$data);

	}
	
	public function add()
	{
		check_access($this->url, 'add', TRUE);
		
		$asset = array(
			'title'	=> $this->title,
			'url'	=> $this->url,
			'js'	=> array('ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'jquery.validate.min'),
			'css'	=> array()
		);
		
		$this->form_validation->set_rules('flag', 'flag', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('admin/template/header', $asset);
			$this->load->view('admin/template/menu');
			$this->load->view('admin/' . $this->url . '/add_' . $this->url);
			$this->load->view('admin/template/footer');
		}
		else
		{
			$this->load->model($this->model);
			$model_name = $this->model;
			$this->$model_name->insert();
			redirect(base_url() . 'goadmin/' . $this->url);
		}
	}
	
	public function view($apply_id)
	{
		check_access($this->url, 'read', TRUE);
		

		$check = $this->db->get_where($this->url, array('unique_id' => $apply_id, 'flag !=' => 3))->row_array();

		if ($check)
		{

			$asset = array(
				'title'	=> $this->title,
				'url'	=> $this->url,
				'js'	=> array('jquery.validate.min', 'ckeditor/ckeditor', 'ckeditor/adapters/jquery', 'admin/ckeditor', 'admin/form', 'admin/datepicker'),
				'css'	=> array()
			);

			$this->load->model('Model_apply');

			$this->Model_apply->read($apply_id);

			$data['row'] = $this->db->get_where($this->url, array('unique_id' => $apply_id, 'flag !=' => 3))->row_array(); 

			$this->form_validation->set_rules('flag', 'flag', 'required');

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('admin/template/header', $asset);
				$this->load->view('admin/template/menu');
				$this->load->view('admin/' . $this->url . '/view_' . $this->url, $data);
				$this->load->view('admin/template/footer');
			}
			else
			{
				$this->load->model($this->model);
				$model_name = $this->model;
				$this->$model_name->update();
				redirect(base_url() . 'goadmin/' . $this->url);
			}
		}
		else redirect(base_url() . 'goadmin/' . $this->url);
	}

	public function export($date_start=NULL, $date_end=NULL)
    {
    	$this->load->model('Model_apply');
        // Starting the PHPExcel library
        $this->load->library('excel');
        $this->excel->getProperties()->setTitle("Career Applicant Report")->setDescription("none");
        $this->excel->getActiveSheet()->setTitle('Career Applicant Report');

        //ROW 1 --> Title Report
        $this->excel->getActiveSheet()->setCellValue('A1', 'List Career Applicant');
        $this->excel->getActiveSheet()->mergeCells('A1:C1');

        //ROW 2
        $this->excel->getActiveSheet()->setCellValue('A2', 'No.');
        $this->excel->getActiveSheet()->setCellValue('B2', 'Name');
		$this->excel->getActiveSheet()->setCellValue('C2', 'Position');
		$this->excel->getActiveSheet()->setCellValue('D2', 'Email');
        $this->excel->getActiveSheet()->setCellValue('E2', 'Phone');
        $this->excel->getActiveSheet()->setCellValue('F2', 'Date');
        // $this->excel->getActiveSheet()->setCellValue('G2', 'Career');
        // $this->excel->getActiveSheet()->setCellValue('H2', 'Date Added');
        // $this->excel->getActiveSheet()->setCellValue('I2', 'Status');
        // $this->excel->getActiveSheet()->setCellValue('J2', 'Memo');
        $this->excel->getActiveSheet()->getStyle('A2:F2')->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' => 'D0D0D0')));
        
        // column width
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
        // $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        // $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        // $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
        // $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(10);

        //border
        $this->excel->getActiveSheet()->getStyle('A2:F2')->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);

        //DATA ROW
        $row = 3;
        $no =1;

        $query = $this->Model_apply->getApplicant($date_start, $date_end);
        foreach ($query as $v) 
        {
            $this->excel->getActiveSheet()->setCellValue('A'.$row, $no);
            $this->excel->getActiveSheet()->setCellValue('B'.$row, $v['apply_name']);
			$this->excel->getActiveSheet()->setCellValue('C'.$row, $v['job_function_name']);
			$this->excel->getActiveSheet()->setCellValue('D'.$row, $v['apply_email']);
            $this->excel->getActiveSheet()->setCellValue('E'.$row, $v['apply_phone']);
            $this->excel->getActiveSheet()->setCellValue('F'.$row, $v['apply_date']);
            // $this->excel->getActiveSheet()->setCellValue('G'.$row, $v['career_name']);
            // $this->excel->getActiveSheet()->setCellValue('H'.$row, $v['career_applicant_date_apply']);
            // $this->excel->getActiveSheet()->setCellValue('I'.$row, ($v['applicant_flag'] == 1) ? 'Read' : 'Unread');
            // $this->excel->getActiveSheet()->setCellValue('J'.$row, $v['applicant_flag_memo']);
            $this->excel->getActiveSheet()->getStyle('A'.$row.':F'.$row)->getBorders()->getAllBorders()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
            $this->excel->getActiveSheet()->getStyle('A'.$row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $row++;
            $no++;
			
			// $data = array(
   //          	'flag' => 1
   //      	);
                
  //       if ($v['applicant_flag_memo'] == 'New Message') $data['flag_memo'] = '';
        
		// if($v['applicant_flag'] != 1)
		// 	{
	 //        $this->db->where('unique_id', $v['applicant_unique_id']);
		// 	$this->db->update('career_applicant', $data);
		// }
		
        }
        
        $this->excel->setActiveSheetIndex(0);
        $writer = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
 
        // Sending headers to force the user to download the file
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Application_report'.date('d-m-Y').'.xls"');
        header('Cache-Control: max-age=0');
 
        $writer->save('php://output');
    }
}