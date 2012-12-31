<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pagenotfound extends CI_Controller {

	function index()
	{
		$this->load->view('404/404_page.php');
	}

}
?>