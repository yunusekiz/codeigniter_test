<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class contact extends CI_Controller {
	
	protected $data;
	protected $row_data;
	
	public function index()
	{
		return null;
	}
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('contact_model');
		
		$base = base_url();
		$this->row_data = $this->contact_model->getContactRowAsArray();
		
		$address_column		= $this->row_data['address'];
		$phone_column		= $this->row_data['phone'];
		$fax_column			= $this->row_data['fax'];
		$email_column		= $this->row_data['email'];
		$facebook_column	= $this->row_data['facebook'];
		$twitter_column		= $this->row_data['twitter'];
		$gplus_column		= $this->row_data['gplus'];
		
		$this->data = array(
							'base'		=> $base,
							'address'	=> $address_column,
							'phone'		=> $phone_column,	
							'fax'		=> $fax_column,
							'email'		=> $email_column,
							'facebook'	=> $facebook_column,
							'twitter'	=> $twitter_column,
							'gplus'		=> $gplus_column
							);
		
	}
	
	public function editContact()
	{
		// admin panelinin ilgili view lerini yükler
		$this->parser->parse('backend_views/admin_header_view',$this->data);
		$this->parser->parse('backend_views/admin_main_view',$this->data);
		$this->parser->parse('backend_views/contact_view',$this->data);
		$this->parser->parse('backend_views/admin_footer_view',$this->data);
	}
	
	public function controlContact()
	{
		$address_field	= $this->input->post('address_field');
		$phone_field	= $this->input->post('phone_field');
		$fax_field		= $this->input->post('fax_field');
		$email_field	= $this->input->post('email_field');
		$facebook_field	= $this->input->post('facebook_field');
		$twitter_field	= $this->input->post('twitter_field');
		$gplus_field	= $this->input->post('gplus_field');
		/*$textt			= $this->input->post('textt');*/
		
		if(($address_field == '') || ($phone_field == '') || ($fax_field == '') || ($email_field == '') ||
		  ($facebook_field == '') || ($twitter_field == '') || ($gplus_field == ''))
		{
			echo '<h1>lutfen bos alan birakmayiniz</h1>';
			echo ' <br> address_field i : ';
			var_dump($address_field);
			echo '<br>';
			echo 'phone_field i : ';
			var_dump($phone_field);
			echo '<br>';
			echo 'fax_field i : ';
			var_dump($fax_field);
			echo '<br>';
			echo ' <br> email_field i : ';
			var_dump($email_field);
			echo '<br>';
			echo 'facebook_field i : ';
			var_dump($facebook_field);
			echo '<br>';
			echo 'twitter_field i : ';
			var_dump($twitter_field);
			echo '<br>';
			echo 'gplus_field i : ';
			var_dump($gplus_field);
	/*		echo 'texxt fiel i : ';
			var_dump($textt);*/
			die();
		
		}
		
		$update = $this->contact_model->updateContact($address_field, $phone_field, $fax_field, $email_field, $facebook_field, $twitter_field, $gplus_field);
		
		if($update == FALSE)
		{
			echo '<h1> HATA:: update islemi basarisiz  </h1>';
		}
			
		echo '<h1> :::TEBRIKLER UPDATE ISLEMI BASARILI::: </h1>';
		
	}



}
