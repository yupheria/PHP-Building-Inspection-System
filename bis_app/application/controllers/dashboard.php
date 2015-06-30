<?php

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	function admin()
	{	
		//$this->load->model('inspection_model');
		//$data['calendar_events'] = $this->inspection_model->get_user_inspections_for_calendar($this->session->userdata('user_id'));
		//$this->load->helper('calendarhtml');
		//$data['calendar'] = generateCalendarHTML($data['calendar_events']);
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
                $this->load->model('users_model');
                $data['month'] = date('m')+1-1;
                $data['year'] = date('Y');
                if($this->uri->segment(3) && $this->uri->segment(4)) {
                $data['month'] = $this->uri->segment(3);
                $data['year'] = $this->uri->segment(4);
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);
                } else {
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);    
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'dashboard_main_admin';
                
		$data['message'] = "";
		$data['message_type'] = "";
                
                $data['page_title'] = "Dashboard";
		$data['body_class'] = "dashboard";
		$this->load->view('template', $data);
	}
	function user()
	{	$this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
		$this->load->model('users_model');
                $data['month'] = date('m')+1-1;
                $data['year'] = date('Y');
                if($this->uri->segment(3) && $this->uri->segment(4)) {
                $data['month'] = $this->uri->segment(3);
                $data['year'] = $this->uri->segment(4);
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);
                } else {
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);    
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'dashboard_main_user';
                
		$data['message'] = "";
		$data['message_type'] = "";
                
		$data['page_title'] = "Dashboard";
		$data['body_class'] = "dashboard";
		$this->load->view('template', $data);
	}
        function bm()
	{	
		$this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
		$this->load->model('users_model');
                $data['month'] = date('m')+1-1;
                $data['year'] = date('Y');
                if($this->uri->segment(3) && $this->uri->segment(4)) {
                $data['month'] = $this->uri->segment(3);
                $data['year'] = $this->uri->segment(4);
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);
                } else {
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);    
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'dashboard_main_user';
                
		$data['message'] = "";
		$data['message_type'] = "";
                
		$data['page_title'] = "Dashboard";
		$data['body_class'] = "dashboard";
		$this->load->view('template', $data);
	}
        function guest()
	{	
		$this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
		$this->load->model('users_model');
                $data['month'] = date('m')+1-1;
                $data['year'] = date('Y');
                if($this->uri->segment(3) && $this->uri->segment(4)) {
                $data['month'] = $this->uri->segment(3);
                $data['year'] = $this->uri->segment(4);
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);
                } else {
                $data['activites'] = $this->users_model->getActivitesByMonth($data['month'],$data['year']);    
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'dashboard_main_user';
                
		$data['message'] = "";
		$data['message_type'] = "";
                
		$data['page_title'] = "Dashboard";
		$data['body_class'] = "dashboard";
		$this->load->view('template', $data);
	}
	function add_activities_page() {
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_activities_page';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Add Event";
		$data['body_class'] = "dashboard";
		$this->load->view('template', $data);
        }
        function add_activities() {
           $data['act_name'] = $this->input->post('act_name');  
           $data['act_des'] = $this->input->post('act_des');
           $data['client'] = $this->input->post('client');
           $data['building'] = $this->input->post('building');
           $data['inputDate'] = $this->input->post('inputDate');
           $data['purpose'] = $this->input->post('purpose');
           $this->load->model("users_model");
           $result = $this->users_model->add_activity($data);
            echo $result;
            return $result;
        }
        function edit_activities() {
           $data['id'] = $this->input->post('act_id'); 
           $data['act_name'] = $this->input->post('act_name');  
           $data['act_des'] = $this->input->post('act_des');
           $data['client'] = $this->input->post('client');
           $data['building'] = $this->input->post('building');
           $data['inputDate'] = $this->input->post('inputDate');
           $data['purpose'] = $this->input->post('purpose');
           $this->load->model("users_model");
           $result = $this->users_model->edit_activity($data);
            echo $result;
            return $result;
        }
        function delete_activites() {
           $this->load->model('users_model');
           $this->users_model->delete_activity($this->uri->segment(3));
           if($this->session->userdata('access_level')==0) {
               header( 'Location:'.base_url().'index.php/dashboard/admin/');
           } else {
               header( 'Location:'.base_url().'index.php/dashboard/user/');
           }
        }
        function delete_activities_page(){
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_activities_page';
                $data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Delete Event";
		$data['body_class'] = "dashboard";
                
                $this->load->model('users_model');
                $data['act'] = $this->users_model->get_activity($this->uri->segment(3));
		$this->load->view('template', $data);
        }
	function settings() // just for sample
	{
		echo 'Sample Settings Page';
	}
	function edit_activities_page(){
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model('building_model');
                $data['buildings'] = $this->building_model->getAll();
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_activities_page';
                $data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Edit Event";
		$data['body_class'] = "dashboard";
                
                $this->load->model('users_model');
                $data['act'] = $this->users_model->get_activity($this->uri->segment(3));
		$this->load->view('template', $data);
        }
	// Ajax methods
	
	function ajaxcalendar()
	{
	
		$this->load->model('inspection_model');
	
		$data['calendar_events'] = $this->inspection_model->get_user_inspections_for_calendar($this->session->userdata('user_id'));

		$month = $this->input->post('month');
		$year = $this->input->post('year');
		
		$this->load->helper('calendarhtml');
		
		echo generateCalendarHTML($data['calendar_events'], $month, $year);
		
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */