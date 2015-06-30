<?php

class UserManagement extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		is_logged_in();	
	}
	
	function index()
	{
		$this->load->model("users_model");
		$data['userlist'] = $this->users_model->getAll();
		
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'user_management';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "User Management";
		$data['body_class'] = "dashboard usermanagement";
		$this->load->view('template', $data);
	}
		
	function add($message = "", $message_type = "")
	{
                $this->load->model('users_model');
                $data['BMs'] = $this->users_model->getAllBMs();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_user';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Add a user";
		$data['body_class'] = "dashboard usermanagement";
                
                $this->load->model('users_model');
                if($this->users_model->getUserCount($this->session->userdata('client_db'))>=$this->session->userdata('max_users')){
                   $data['userlist'] = $this->users_model->getAll();
                   $data['message'] = 'You reached the maximum number of users';
                   $data['message_type'] = 'error'; 
                   $data['main_content'] = 'user_management';
                }
		$this->load->view('template', $data);
	}
	
	function edit($message = "", $message_type = "")
	{
                $this->load->model('users_model');
                $data['BMs'] = $this->users_model->getAllBMs();
            
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_user';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit user information";
		$data['body_class'] = "usermanagement";
		
		$user_id = $this->uri->segment(3);
		$this->load->model("users_model");
		$data['record'] = $this->users_model->select_user($user_id);
		
		
		$this->load->view('template', $data);
	}
	
	function settings($message = "", $message_type = "")
	{
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_user';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit user information";
		$data['body_class'] = "dashboard usermanagement";
		
		$user_id = $this->session->userdata('user_id');
		$this->load->model("users_model");
		$data['row'] = $this->users_model->select_user($user_id);
		
		
		$this->load->view('template', $data);
	}
		// AJAX function calls
	
	function add_user()
	{
		// This will be called via ajax
		$this->load->model("users_model"); 
		$data['user_login'] = $this->input->post('first_name');
		//$data['last_name'] = $this->input->post('last_name');
		$data['user_email'] = $this->input->post('email_address');
		$data['user_pass'] = $this->input->post('password');
		$data['password2'] = $this->input->post('password2');
		$data['bis_access_level'] = $this->input->post('user_type');
        $data['bms'] = $this->input->post('bms');
		$result = $this->users_model->create_user($data);
		
                
                
                
		echo $result;
		return $result;
	}
	
	function edit_user()
	{
		// This will be called via ajax
		$this->load->model("users_model");
		$data['user_login'] = $this->input->post('first_name');
		$data['user_email'] = $this->input->post('email_address');
		$data['user_pass'] = $this->input->post('password');
                $data['password2'] = $this->input->post('password2');
		$data['bis_access_level'] = $this->input->post('user_type');
		$data['report_to'] = $this->input->post('bms');
		$user_id = $this->input->post('user_id');
		$result = $this->users_model->update_user($user_id, $data);
	
                echo $result;
		return $result;
	}
        function dropbox_credentials(){
                $this->load->model("users_model");
		$data['dropbox_user'] = $this->input->post('dropbox_user');
		$data['dropbox_pass'] = $this->input->post('dropbox_pass');
                $data['id'] = $this->session->userdata('user_id');
                $result = $this->users_model->dropbox_auth($data);
                
                echo $result;
                return $result;
        }
        function skydrive_credentials(){
                $this->load->model("users_model");
		$data['skydrive_user'] = $this->input->post('skydrive_user');
		$data['skydrive_pass'] = $this->input->post('skydrive_pass');
                $data['id'] = $this->session->userdata('user_id');
                $result = $this->users_model->skydrive_auth($data);
                
                echo $result;
                return $result;
        }
        function delete_user_page()
	{
		// This will be called via ajax
		$this->load->model("users_model");
		$data['record'] = $this->users_model->select_user($this->uri->segment(3));
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_user_page';
		$data['page_title'] = "Delete user information";
		$data['body_class'] = "dashboard usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
	}
        function delete_user() {
                $this->load->model("users_model");
		$this->users_model->deleteUser($this->input->post('userid'));
                      
                echo "User Deleted";     
                return "User Deleted";     
        }
        function alot_buildings(){
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
                $this->load->model('users_model');
                $data['users'] = $this->users_model->getAll();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'alot_buildings';
		$data['page_title'] = "Alot Buildings";
		$data['body_class'] = "usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
        }
        function alloted_buildings(){
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
              
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'alloted_buildings';
		$data['page_title'] = "Alot Buildings";
		$data['body_class'] = "usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
        }
        function account_profile(){
                $this->load->model('building_model');
                $data['buildingcount'] = $this->building_model->getBuildingCount();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'account_profile';
		$data['page_title'] = "Account Profile";
		$data['body_class'] = "usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
        }
        function edit_alot_buildings(){
                $this->load->model('building_model');
                $data['building'] = $this->building_model->getBuildingRecord($this->uri->segment(3));
                $this->load->model('users_model');
                $data['users'] = $this->users_model->getAll();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_alot_buildings';
		$data['page_title'] = "Edit Alot Buildings";
		$data['body_class'] = "usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
        }
        function edit_allotment(){
                $bid = $this->input->post('building_id');
		$uid = $this->input->post('user_id');
                $this->load->model('building_model');
                $this->building_model->editbuildinguser($bid,$uid);
                
                echo "Building Updated";
                return "Building Updated";
        }
        function activity_log(){
                $this->load->model('users_model');
                $data['notifications'] = $this->users_model->showNotifications();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'activity_log';
		$data['page_title'] = "Activity Log";
		$data['body_class'] = "usermanagement";
                $data['message'] = "";
		$data['message_type'] = "";
                
                $this->load->view('template', $data);
        }
}

/* End of file usermanagement.php */
/* Location: ./application/controllers/usermanagement.php */