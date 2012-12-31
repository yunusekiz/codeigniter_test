<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about extends CI_Controller {
	
	protected $data;
	protected $row_data;
	
	public function index()
	{
		return null;
	}
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('about_model');
		
		$base = base_url();
		$this->row_data = $this->about_model->getAboutUsRowAsArray();
		$about_column	= $this->row_data['about'];
		$vision_column	= $this->row_data['vision'];
		$mission_column = $this->row_data['mission'];
		
		$this->data = array('base' => $base, 'about' => $about_column, 'vision' => $vision_column, 'mission' => $mission_column);
		
	}
	
	
	public function editAboutUs()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->data);
		$this->parser->parse('backend_views/admin_main_view',$this->data);
		$this->parser->parse('backend_views/about_view',$this->data);
		$this->parser->parse('backend_views/admin_footer_view',$this->data);
				
	}
	
	public function controlAboutUs()
	{
		$about_field	= $this->input->post('about_field');
		$vision_field	= $this->input->post('vision_field');
		$mission_field	= $this->input->post('mission_field');
		/*$textt			= $this->input->post('textt');*/
		
		if(($about_field == '') || ($vision_field == '') || ($mission_field == '') )
		{
			echo '<h1>lutfen bos alan birakmayiniz</h1>';
			echo ' <br> about field i : ';
			var_dump($about_field);
			echo '<br>';
			echo 'vision field i : ';
			var_dump($vision_field);
			echo '<br>';
			echo 'mission fiel i : ';
			var_dump($mission_field);
			echo '<br>';
	/*		echo 'texxt fiel i : ';
			var_dump($textt);*/
			die();
		
		}
		
		$update = $this->about_model->updateAboutUs($about_field, $vision_field, $mission_field);
		
		if($update == FALSE)
		{
			echo '<h1> HATA:: update islemi basarisiz  </h1>';
		}
			
		echo '<h1> :::TEBRIKLER UPDATE ISLEMI BASARILI::: </h1>';
		
	}
	
}