<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_global extends CI_Model 
{
	var $lang;
	var $date;
	public function __construct()
	{
		parent::__construct();
		// cek language aktif saat ini
		$this->lang = current_language();
		$this->date = date("Y-m-d h:i:s");
		pre(current_language());
	}

	public function getArticle($array=array(), $single=FALSE)
	{
		if(!empty($array['unique_id'])){
			$this->db->where('unique_id', $array['unique_id']);
		}

		$query = $this->db->get_where('article', array('language_id'=>$this->lang,'flag'=>1));
		
		if($single){
			return $query->result_array();
		}else{
			return $query->row_array();
		}
	}

	public function getCorporateValuesImg()
	{
		return $this->db->get_where('article',array('flag'=>1, 'language_id' => $this->lang, 'flag_memo' => 'Corporate Values'))->row_array();
	}

	public function getMenuBanner($id)
	{
		return $this->db->get_where('banner',array(
			'flag_memo' => 'Menu Banner',
			'flag'=>1,
			'language_id'=>$this->lang, 
			'unique_id'=> $id))->row_array();
	}

	public function getPhaseOrInvestment($table)
	{
		return $this->db->order_by('unique_id','ASC')->get_where($table,array('flag'=>1, 'language_id'=>$this->lang))->result_array();
	}

	public function getContactUsHeading()
	{
		return $this->db->get_where('article',array('flag'=>1, 'language_id'=>$this->lang, 'unique_id'=>26))->row_array();
	}

	public function insertApply($filename)
	{
		$unique_id = unique_id('apply');
		$data = array(
			'unique_id' => $unique_id,
			'flag' => 1,
			'apply_name' => $this->input->post('name',TRUE),
			'apply_job_function' => $this->input->post('unique_career',TRUE),
			'apply_email' => $this->input->post('email',TRUE),
			'apply_phone' => $this->input->post('phone',TRUE),
			'apply_cv' => $filename,
			'apply_date' => $this->date,
			'apply_read' => 0
		);

		return $this->db->insert('apply',$data);
	}

	// get content Our Business Slider
	public function getSliderBusiness()
	{
		 return $this->db->get_where('business',array('flag'=>1, 'language_id'=>$this->lang))->result_array();
	}

	// get content working at
	public function workingAt()
	{
		//section 4 = carrer
		return $this->db->get_where('article',array('flag'=>1, 'language_id'=> $this->lang, 'article_section'=>4))->row_array();
	}

	public function checkRow($table)
	{
		return $this->db->select('flag')->get_where($table,array('flag'=>1,'language_id' => $this->lang))->num_rows();
	}

	public function getOption($table)
	{
		return $this->db->get_where($table,array('flag' =>1))->result_array();
	}
        
    // get job vacancy
	public function getVacancy($array=array(),$single = TRUE)
	{

		// if(!empty($array['work_location']))
		// {
		// 	$this->db->where($array['work_location']);
		// }
		// 
		// 
		// if(!empty($array['country']))
		// {
		// 	$this->db->where('career_country',$array['country']);
		// }	

		if(!empty($array['employment_type']))
		{
			$this->db->where($array['employment_type']);
		}

		if(!empty($array['job_function']))
		{
			$this->db->where('career_job_function',$array['job_function']);
		}

		if(!empty($array['free_search']))
      	{
        	$this->db->like('career_name',$array['free_search']);
      	}

      	if(!empty($array['free_search']))
      	{
        	$this->db->or_like('career_content',$array['free_search']);
      	}
		
		if(!empty($array['seo_url']))
		{
			$this->db->where('seo_url',$array['seo_url']);
		}

		$query = $this->db->get_where('career',array('language_id'=>$this->lang, 'flag'=>1));
		
		if($single)
		{
			return $query->result_array();

		}
		else
		{
			return $query->row_array();
		}
	}

	// get awards
	public function getAwards($array=array(),$single = TRUE)
	{
		if(!empty($array['seo_url']))
		{
			$this->db->where('seo_url',$array['seo_url']);
		}
		$this->db->order_by('awards_start','desc');
		$this->db->order_by('unique_id','desc');

		$query = $this->db->get_where('awards',array('language_id'=>$this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}

	// count row for pagination
	public function countRowContent($table)
	{	
		return $this->db->get_where($table,array('flag'=>1, 'language_id'=>$this->lang))->num_rows();
	}

	//get news test
	public function getAllNews($num,$offset)
	{
		$this->db->where('language_id',$this->lang);
		$this->db->where('flag',1);
		$this->db->order_by('news_start', 'desc');
		$data = $this->db->get('news',$num,$offset);
		return $data->result_array();
	}
	//end

	// get news
	public function getNews($array=array(),$single = TRUE)
	{
		if(!empty($array['seo_url']))
		{
			$this->db->where('seo_url',$array['seo_url']);
		}

		$this->db->order_by('news_start','desc');
		$this->db->order_by('unique_id','desc');
		$query = $this->db->get_where('news',array('language_id'=>$this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	 // get publications
   public function getPublications($array=array(),$single = TRUE)
   {

      if(!empty($array['seo_url']))
      {
         $this->db->where('seo_url',$array['seo_url']);
      }

      if(!empty($array['year']))
      {
         $this->db->like('publications_start', $array['year'] );
         $this->db->where('language_id',$this->lang);
      }
      
      if(!empty($array['keyword']))
      {
         $this->db->or_like('publications_name',$array['keyword']);
         $this->db->where('language_id',$this->lang);
      }

      if(!empty($array['keyword']))
      {
         $this->db->or_like('publications_doc',$array['keyword']);
         $this->db->where('language_id',$this->lang);

      }
      $this->db->order_by('publications_start','DESC');
      $this->db->order_by('unique_id','desc');
      
      $query = $this->db->get_where('publications',array('language_id'=>$this->lang, 'flag'=>1));
      if($single)
      {
         return $query->result_array();
      }
      else
      {
         return $query->row_array();
      }

   }

	// get csr
	public function getCsr($array=array(),$single = TRUE)
	{
		if(!empty($array['seo_url']))
		{
			$this->db->where('seo_url',$array['seo_url']);
		}
		// $this->db->group_by('publications_category');
		$this->db->order_by('csr_start','DESC');
		$this->db->order_by('unique_id','DESC');

		$query = $this->db->get_where('csr',array('language_id'=>$this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}

	public function newContent($table,$limit)
	{
		$this->db->order_by($table.'_start', 'DESC');
		$this->db->order_by('unique_id', 'DESC');
		return $this->db->get_where($table, array('language_id'=>$this->lang ,'flag' => 1), $limit)->result_array();
	}

	//get other content 
	public function otherContent($table,$seo,$limit)
	{
		return $this->db->get_where($table, array('seo_url !=' => $seo, 'language_id'=>$this->lang ,'flag' => 1), $limit)->result_array();
	}

	public function get_multipleimage($array = array(), $table, $single = FALSE){

		if(!empty($array['unique_id'])){
			$this->db->where('unique_id', $array['unique_id']);
		}

		$query = $this->db->get_where($table);

		if($single){
			return $query->row_array();
		}else{
			 return $query->result_array();
		}

	}

	public function countContentyear($year)
	{
		if(!empty($year))
		{
			$query =  $this->db->query("SELECT * FROM awards  WHERE flag = 1 && language_id = $this->lang && DATE_FORMAT(awards_start, '%Y')  = $year ");
			return $query->num_rows();	
		}
		else
		{
			$query =  $this->db->query("SELECT * FROM awards  WHERE flag = 1 && language_id = $this->lang");
			return $query->num_rows();	
		}

	}

	//list content berdasarkan tahun 
	public function listContentyear($table,$select,$year)
	{
		$query =  $this->db->query("SELECT * FROM $table  WHERE flag = 1 && language_id = $this->lang && DATE_FORMAT($select, '%Y')  = $year order by {$table}_start DESC ");
		return $query->result_array();	
	}


	//list tahun yang ada di berita
	public function contentYear($table,$select)
	{
		$query =  $this->db->query("SELECT $select  FROM $table WHERE flag = 1 && language_id = $this->lang GROUP BY DATE_FORMAT($select, '%Y') ORDER BY $select DESC");
		return $query->result_array();
	}


	public function getBanner($array=array(),$single = TRUE)
	{
		$query = $this->db->where('flag_memo !=','Menu Banner');
		$query = $this->db->order_by('banner_sort','ASC');
		$query = $this->db->order_by('unique_id','DESC');
		$query = $this->db->get_where('banner',array('language_id'=>$this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getArtikelMisi($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('article',array('language_id'=> $this->lang, 'flag'=>1 ,'unique_id'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getArtikelValuesCorporate($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('article',array('language_id'=> $this->lang, 'flag'=>1 ,'unique_id'=>12));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getArtikelVisi($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('article',array('language_id'=> $this->lang, 'flag'=>1 ,'unique_id'=>2));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getArtikelCorporate($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('corporate',array('language_id'=> $this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function contactForm($table,$data){
		$query = $this->db->insert($table,$data);
		if ($query) {
			return TRUE;
		}
		return FALSE;
	}
	public function settingWeb($array=array(),$single = TRUE)
	{
		$query = $this->db->get_where('setting',array('flag'=> 1,'setting_id' => 22));

		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getVideo($array=array(),$single = TRUE)
	{
		$query = $this->db->order_by('unique_id','DESC');
		$query = $this->db->get_where('video',array('language_id'=>$this->lang, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}

	public function createContact($data)
	{
   		 $this->db->insert('message',$data);
  	}

  	public function getArticleSshe($array=array(),$single = TRUE){
  		$query = $this->db->get_where('article',array('language_id'=> $this->lang,'article_section'=> 6, 'flag'=>1));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
  	}
  	public function getDocument($array=array(),$single = TRUE){
  		$query = $this->db->get_where('relateddocument',array('language_id'=>$this->lang, 'flag'=>1));
  		if($single)
  		{
  			return $query->result_array();
  		}
  		else
  		{
  			return $query->row_array();
  		}
  	}
  	public function getOurBussines($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('article',array('language_id'=> $this->lang, 'flag'=>1 ,'article_section' => 8));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}
	public function getHomePttep($array=array(),$single = TRUE)
	{

		$query = $this->db->get_where('article',array('language_id'=> $this->lang, 'flag'=>1 ,'article_section' => 9));
		if($single)
		{
			return $query->result_array();
		}
		else
		{
			return $query->row_array();
		}
	}


	public function getSetLocation($array=array(), $single = TRUE)
   {

      if(!empty($array['join']))
      {         
      		$this->db->select('set_location.*, phase.phase_image, investment.investment_image');
	      	$this->db->join('phase', 'phase.unique_id = set_location.phase_id','left');
	      	$this->db->join('investment', 'investment.unique_id = set_location.investment_id','left');
	      	$this->db->group_by('set_location.unique_id');
      }

      $this->db->order_by('unique_id', 'DESC');
      
      $query = $this->db->get_where('set_location', array('set_location.language_id'=>$this->lang, 'set_location.flag'=>1));
      if($single){
         return $query->row_array();
      } else {
         return $query->result_array();
      }
   }
}