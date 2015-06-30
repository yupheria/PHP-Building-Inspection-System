<?php

class Worklist extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		is_logged_in();
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */