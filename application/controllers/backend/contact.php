<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class about extends CI_Controller {
	
	public function index()
	{
		return null;
	}
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('contact_model');
		
	}



}
