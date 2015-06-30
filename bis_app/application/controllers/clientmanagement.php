<?php

class ClientManagement extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}
	
function index()
	{	
		$data['group'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['clients'] = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		$group = $data['group'];
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		if ($this->uri->segment(4)) {
		$data['record'] = $this->client_model->getSelectedRecords($this->uri->segment(4));
		} else {
		$data['record'] = $this->client_model->getFirstRecords($group);
		}
                
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
                
                
		//$data['notes'] = $this->client_model->getNotesForClient();			
		//$this->load->model("users_model");
		//$data['users'] = $this->users_model->getAll();
			
		$data['load_header'] = true;
		$data['load_footer'] = true;
                //if($this->uri->segment(4)) {
		$data['main_content'] = 'clientmanagement';
                //} else {
                //$data['main_content'] = 'clientmanagementnone';    
                //}
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Client Management";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function view_client() {
                $data['group'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
                $this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
                $data['clientgroups'] = $this->client_model->getGroups();
                $this->load->model('group_model');
		$data['record'] = $this->group_model->getSelectedRecords($this->uri->segment(3));
                $data['countries'] = $this->group_model->getCountries();
                $data['company_type'] = $this->group_model->getCompany_type();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'view_client';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Client Details";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
}
function view_contact() {
                $data['group'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['clients'] = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		$group = $data['group'];
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		if ($this->uri->segment(4)) {
		$data['record'] = $this->client_model->getSelectedRecords($this->uri->segment(4));
		} else {
		$data['record'] = $this->client_model->getFirstRecords($group);
		}
                $this->load->model("client_model");
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
                
                
		//$data['notes'] = $this->client_model->getNotesForClient();			
		//$this->load->model("users_model");
		//$data['users'] = $this->users_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'view_contact';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Contact Details";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
}
function group($message = "", $message_type = "", $group = 1)
	{	
		$group = $this->uri->segment(2) ? $this->uri->segment(2) : $group;	
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
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
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}


function edit($message = "", $message_type="")
	{
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
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
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
	
function add_client_page($message = "", $message_type="")
	{
                $this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
                $data['clientgroups'] = $this->client_model->getGroups();
                $this->load->model('group_model');
                $data['countries'] = $this->group_model->getCountries();
                $data['company_type'] = $this->group_model->getCompany_type();
                
		$this->load->model("group_model");
		$data['groups'] = $this->group_model->get_group_list();            
                $this->load->model("client_model");
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_client_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Add a Client";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function edit_client_page($message = "", $message_type="")
	{
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
                $data['clientgroups'] = $this->client_model->getGroups();
                $this->load->model('group_model');
                $data['record'] = $this->group_model->getSelectedRecords($this->uri->segment(3));
                $data['countries'] = $this->group_model->getCountries();
                $data['company_type'] = $this->group_model->getCompany_type();
		$this->load->model("client_model");
                $data['countries'] = $this->client_model->getCountries();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_client_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit a Contact";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function add_group_page($message = "", $message_type="")
	{
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
                $this->load->model('group_model');
                $data['countries'] = $this->group_model->getCountries(); 
                $data['company_type'] = $this->group_model->getCompany_type();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_group_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Add a Company";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function edit_group_page($message = "", $message_type="")
	{   
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$this->load->model('group_model');
		$data['record'] = $this->group_model->getSelectedRecords($this->uri->segment(3));
                $data['countries'] = $this->group_model->getCountries();
                $data['company_type'] = $this->group_model->getCompany_type();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_group_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit a Company";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function edit_group($message = "", $message_type="")
	{
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$this->load->model('group_model');
                $data['id'] = $this->input->post('groupid');
		$data['company'] = $this->input->post('company');
		$data['address_line_1'] = $this->input->post('address_line_1');
		$data['address_line_2'] = $this->input->post('address_line_2');
		$data['suburb'] = $this->input->post('suburb');
		$data['city'] = $this->input->post('city');
                
                $data['poaddress'] = $this->input->post('poaddress');
                $data['pocode'] = $this->input->post('pocode');
                $data['posuburb'] = $this->input->post('posuburb');
                $data['pocity'] = $this->input->post('pocity');
                
		$data['country'] = $this->input->post('country');
		$data['phone'] = $this->input->post('phone');
		
		$data['email'] = $this->input->post('email');
		$data['website'] = $this->input->post('website');
		$data['company_type'] = $this->input->post('group_type');
                
                $result = $this->group_model->update_group($data);
                
                echo $result;
                return $result;
	}
function add_group()
	{
		// This will be called via ajax
		$this->load->model("group_model");
		$data['company'] = $this->input->post('company');
		$data['address_line_1'] = $this->input->post('address_line_1');
		
                $data['address_line_2'] = $this->input->post('address_line_2');
		
                $data['suburb'] = $this->input->post('suburb');
                
                $data['poaddress'] = $this->input->post('poaddress');
                $data['pocode'] = $this->input->post('pocode');
                $data['posuburb'] = $this->input->post('posuburb');
                $data['pocity'] = $this->input->post('pocity');
                
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');
		$data['phone'] = $this->input->post('phone');
		
		$data['email'] = $this->input->post('email');
		$data['website'] = $this->input->post('website');
		$data['company_type'] = $this->input->post('group_type');

		$result = $this->group_model->create_group($data);
		
		//$result = "Successfully created Company";
		echo $result;
		return $result;
	}
function add_client()
	{
		// This will be called via ajax
		$this->load->model("client_model");
		$data['title'] = $this->input->post('title');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['address_line_1'] = $this->input->post('address_line_1');
		$data['address_line_2'] = $this->input->post('address_line_2');
		$data['suburb'] = $this->input->post('suburb');
                
                $data['poaddress'] = $this->input->post('poaddress');
                $data['pocode'] = $this->input->post('pocode');
                $data['posuburb'] = $this->input->post('posuburb');
                $data['pocity'] = $this->input->post('pocity');
                
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');
		$data['phone'] = $this->input->post('phone');
		$data['mobile'] = $this->input->post('mobile');
		$data['bussphone'] = $this->input->post('bussphone');
		$data['email'] = $this->input->post('email');
		$data['website'] = $this->input->post('website');
		$data['group'] = $this->input->post('group');
		$data['bussphone'] = $this->input->post('bussphone');

		$result = $this->client_model->create_client($data);
		
		//$result = "Successfully created Client";
		echo $result;
		return $result;
	}
function edit_client()
	{
		// This will be called via ajax
		$this->load->model("client_model");
		$data['title'] = $this->input->post('title');
		$data['first_name'] = $this->input->post('first_name');
		$data['last_name'] = $this->input->post('last_name');
		$data['address_line_1'] = $this->input->post('address_line_1');
		$data['address_line_2'] = $this->input->post('address_line_2');
		$data['suburb'] = $this->input->post('suburb');
                $data['poaddress'] = $this->input->post('poaddress');
                $data['pocode'] = $this->input->post('pocode');
                $data['posuburb'] = $this->input->post('posuburb');
                $data['pocity'] = $this->input->post('pocity');
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');
		$data['phone'] = $this->input->post('phone');
		$data['mobile'] = $this->input->post('mobile');
		$data['bussphone'] = $this->input->post('bussphone');
		$data['email'] = $this->input->post('email');
		$data['website'] = $this->input->post('website');
		$data['group'] = $this->input->post('group');
		$data['clientid'] = $this->input->post('clientid');

		$result = $this->client_model->update_client($data);
		
		//$result = "Client Updated";
		echo $result;
		return $result;
	}
function delete_client_page()
	{		
                $this->load->model('client_model');
                $data['record'] = $this->client_model->getRecordByID($this->uri->segment(3));                
                foreach($data['record'] as $row) {
                    $data['siteid'] = $row->group_id;
                }
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
                $this->load->model('group_model');
                $data['group'] = $this->group_model->getSelectedRecords($data['siteid']);               
                foreach($data['group'] as $row) {
                    $data['company'] = $row->company;                             
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_client_page';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Delete a Client";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
	}
function delete_client()
        {
        $this->load->model('client_model');
        $this->client_model->deleteClient($this->input->post('clientid'));
        
        echo "Contact Deleted";
        return "Contact Deleted";
        }
function delete_group_page()
{
        $this->load->model('group_model');
        $data['record'] = $this->group_model->getSelectedRecords($this->uri->segment(3));
        $data['countries'] = $this->group_model->getCountries();
        $data['company_type'] = $this->group_model->getCompany_type();
        $data['load_header'] = true;
	$data['load_footer'] = true;
	$data['main_content'] = 'delete_group_page';
	$data['message'] = "";
	$data['message_type'] = "";
	$data['page_title'] = "Delete a Client";
	$data['body_class'] = "clientmanagement";
	$this->load->view('template', $data);
}
function delete_group()
{
        $this->load->model('group_model');
        $this->group_model->deleteGroup($this->input->post('groupid')); 
        echo "Client Deleted";
        return "Client Deleted";
        
}
function add_contact() {
                $data['group'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['clients'] = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		$group = $data['group'];
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		if ($this->uri->segment(4)) {
		$data['record'] = $this->client_model->getSelectedRecords($this->uri->segment(4));
		} else {
		$data['record'] = $this->client_model->getFirstRecords($group);
		}
                $this->load->model("client_model");
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
                
                
		//$data['notes'] = $this->client_model->getNotesForClient();			
		//$this->load->model("users_model");
		//$data['users'] = $this->users_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_contact';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Contact Details";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
}
function edit_contact() {
                $data['group'] = $this->uri->segment(3) ? $this->uri->segment(3) : 0;
		$data['clients'] = $this->uri->segment(4) ? $this->uri->segment(4) : 1;
		$group = $data['group'];
		$this->load->model("client_model");
                $data['clients'] = $this->client_model->getAll();
                if($this->uri->segment(3)){
                    $data['contacts'] = $this->client_model->getAllByGroup($this->uri->segment(3));
                }
		$data['clientlist'] = $this->client_model->getAllByGroup($group);
		$data['clientgroups'] = $this->client_model->getGroups();
		if ($this->uri->segment(4)) {
		$data['record'] = $this->client_model->getSelectedRecords($this->uri->segment(4));
		} else {
		$data['record'] = $this->client_model->getFirstRecords($group);
		}
                $this->load->model("client_model");
                $data['titles'] = $this->client_model->getTtitles();
                $data['countries'] = $this->client_model->getCountries();
                
                
		//$data['notes'] = $this->client_model->getNotesForClient();			
		//$this->load->model("users_model");
		//$data['users'] = $this->users_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_contact';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Edit Contact";
		$data['body_class'] = "clientmanagement";
		$this->load->view('template', $data);
}
}
/* End of file clientmanagement.php */
/* Location: ./application/controllers/clientmanagement.php */