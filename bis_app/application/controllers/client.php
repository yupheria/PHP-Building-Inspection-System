<?php

class Client extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		is_logged_in();		
	}
	
function index($message = "", $message_type = "", $group = 1)
	{	
		$group = $this->uri->segment(2) ? $this->uri->segment(2) : $group;	
		$this->load->model("client_model");
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		$data['record'] = $this->client_model->getFirstRecords($group);
		$data['notes'] = $this->client_model->getNotesForClient();	
		
		$this->load->model("users_model");
		$data['users'] = $this->users_model->getAll();
			
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'client/index';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Client";
		$data['body_class'] = "client";
		$this->load->view('template', $data);
	}
	
function group($message = "", $message_type = "", $group = 1)
	{	
		$group = $this->uri->segment(2) ? $this->uri->segment(2) : $group;	
		$this->load->model("client_model");
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		$data['record'] = $this->client_model->getFirstRecords($group);
		$data['notes'] = $this->client_model->getNotesForClient();	
		
		$this->load->model("users_model");
		$data['users'] = $this->users_model->getAll();
			
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'client/index';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Client";
		$data['body_class'] = "client";
		$this->load->view('template', $data);
	}


function edit($message = "", $message_type="")
	{
		$this->load->model("client_model");
		$data['clientlist'] = $this->client_model->getAll();
		$data['clientgroups'] = $this->client_model->getGroups();
		$data['record'] = $this->client_model->getRecordByID($this->uri->segment(3));
		$data['notes'] = $this->client_model->getNotesForClient($this->uri->segment(3));
		
		$this->load->model("users_model");
		$data['users'] = $this->users_model->getAll();
		
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'client/index';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Client";
		$data['body_class'] = "client";
		$this->load->view('template', $data);
	}
	
function add($message = "", $message_type="")
	{
		$this->load->model("client_model");
		$data['clientlist'] = $this->client_model->getAll();
		$data['clientgroups'] = $this->client_model->getGroups();
		
		$this->load->model("users_model");
		$data['users'] = $this->users_model->getAll();
			
		$data['record'] = "";
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'client/index';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Client";
		$data['body_class'] = "client";
		$this->load->view('template', $data);
	}

}
/* End of file client.php */
/* Location: ./application/controllers/client.php */