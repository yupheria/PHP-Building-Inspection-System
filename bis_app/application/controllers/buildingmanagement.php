<?php

class BuildingManagement extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		is_logged_in();	
	}
	
function index()
	{			
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                
		
		//if($this->uri->segment(3)){
                $this->load->model('site_model');
                //$data['sites'] = $this->site_model->getSitebyClient($this->uri->segment(3));
                //} else {
                //$data['sites'] = $this->building_model->getAllSites();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		} else {
			$data['record'] = $this->building_model->getFirstRecords($this->uri->segment(4) ? $this->uri->segment(4) : 1);
		}
                $build = $data['record'];
                $data['levels'] = 0;
                //unset($build[0]);
                switch($this->uri->segment(6)){
                    case 'a': 
                        foreach($build as $details){
                        $data['levels'] = $details->levels_above;
                        }
                        break;
                    case 'b': 
                        foreach($build as $details){
                        $data['levels'] = $details->levels_below;
                        }
                        break;
                    case 'g':
                        $data['levels'] = 0;
                        $this->load->model('area_model');
                        $data['areas'] = $this->area_model->getBuildingAreas($this->uri->segment(5),1,0);
                        break;
                }
                if($this->uri->segment(7)){
                    $this->load->model('area_model');
                    $above = 1;
                    switch($this->uri->segment(6)){
                        case 'a': $above = 1;
                        break;
                        case 'b': $above = 0;
                        break;
                        case 'g': $above = 1;
                        break;
                    }
                    $data['areas'] = $this->area_model->getBuildingAreas($this->uri->segment(5),$above,$this->uri->segment(7));  
                    //echo print_r($data['areas']);
                }
                $data['countries'] = $this->building_model->getCountries();
		$data['load_header'] = true;
		$data['load_footer'] = true;
                //if($this->uri->segment(4)) {
		$data['main_content'] = 'buildingmanagement';
                //} else {
                //$data['main_content'] = 'buildingmanagementnone';    
                //}
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Management";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
function view_site() {
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		} else {
			$data['record'] = $this->building_model->getFirstRecords($this->uri->segment(4) ? $this->uri->segment(4) : 1);
		}
                $data['countries'] = $this->building_model->getCountries();
    
                $this->load->model("building_model");
		$data['sites'] = $this->building_model->getAllSites();
                $data['countries'] = $this->building_model->getCountries();
                $this->load->model('site_model');
                $data['record'] = $this->site_model->getSite($this->uri->segment(4));
		$this->load->model("group_model");
		$data['companylist'] = $this->group_model->get_group_list();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
                //if($this->uri->segment(4)) {
		$data['main_content'] = 'view_site';
                //} else {
                //$data['main_content'] = 'buildingmanagementnone';    
                //}
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Management";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);       
}
function view_levels(){
                $this->load->model('building_model');
                $data['building'] = $this->building_model->getBuildingRecord($this->uri->segment(4));
                $this->load->model('area_model');
                $data['areas'] = $this->area_model->getArea($this->uri->segment(4));
                if($this->uri->segment(7)) {
                $data['sarea'] = $this->area_model->getAreaDetails($this->uri->segment(7));
                }
                $data['load_header'] = true;
		$data['load_footer'] = true;             
		$data['main_content'] = 'view_levels';    
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Management";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);       
}
function add_site_page() {
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		}
                $data['countries'] = $this->building_model->getCountries();
                
                $this->load->model("building_model");
		$data['sites'] = $this->building_model->getAllSites();
                $data['countries'] = $this->building_model->getCountries();
		$this->load->model("group_model");
		$data['companylist'] = $this->group_model->get_group_list();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
                //if($this->uri->segment(4)) {
		$data['main_content'] = 'add_site';
                //} else {
                //$data['main_content'] = 'buildingmanagementnone';    
                //}
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Add Building Site";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
}
function view_building() {
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
                $building_address = '1600 Amphitheatre Parkway in Mountain View, Santa Clara County, California';
                $building_name = 'Capital Planning';
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
                         foreach($data['record'] as $building){
                              $building_address = $building->address_line_1.", ".$building->address_line_2.", ".$building->suburb.", ".$building->city;
                              $building_name = $building->buildingname;
                        }
		}
                //echo $building_address;
                $data['countries'] = $this->building_model->getCountries();
                
                $this->load->model("building_model");
		$data['sites'] = $this->building_model->getAllSites();
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(3) ? $this->uri->segment(3) : 0);
                
                $data['countries'] = $this->building_model->getCountries();
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
                //if($this->uri->segment(4)) {
		$data['main_content'] = 'view_building';
                //} else {
                //$data['main_content'] = 'buildingmanagementnone';    
                //}
                
                // Load the library
                $this->load->library('googlemaps');
                // Initialize our map. Here you can also pass in additional parameters for customising the map (see below) 
                $config['center'] = $building_address;
                  //$config['zoom'] = "12";
                 
                //$this->googlemaps->initialize();
                 $this->googlemaps->initialize($config);
                 
                $marker = array();
                $marker['position'] = $building_address;
                $marker['title'] = $building_name;
                $this->googlemaps->add_marker($marker);
                 
                // Create the map. This will return the Javascript to be included in our pages <head></head> section and the HTML code to be 
                // placed where we want the map to appear.
                $data['gmaps'] = $this->googlemaps->create_map();
                // Load our view, passing the map data that has just been created
             
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Management";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);       
}
function delete_site_page($message = "", $message_type="")
	{			
		$this->load->model("group_model");
		$data['companylist'] = $this->group_model->get_group_list();
		$this->load->model('building_model');
                $data['countries'] = $this->building_model->getCountries();
                $this->load->model('site_model');
                $data['record'] = $this->site_model->getSite($this->uri->segment(4));
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_site_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Delete Site";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
function delete_building_page($message = "", $message_type="")
	{			
		$this->load->model('building_model');
                $data['countries'] = $this->building_model->getCountries();              
                $data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
                $data['sites'] = $this->building_model->getAllSites();
                $data['months'] = $this->building_model->getMonths();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_building_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Delete a Building";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
function delete_building($message = "", $message_type="")
	{			
		$this->load->model('building_model');
                $this->building_model->deleteBuilding($this->input->post('buildingid'));
                
                echo "Building Deleted";
                return "Building Deleted";
		
	}
function edit_site_page($message = "", $message_type="")
	{
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		} else {
			$data['record'] = $this->building_model->getFirstRecords($this->uri->segment(4) ? $this->uri->segment(4) : 1);
		}
                $data['countries'] = $this->building_model->getCountries();
                
                $this->load->model('site_model');
                $data['record'] = $this->site_model->getSite($this->uri->segment(4));
		$this->load->model("group_model");
		$data['companylist'] = $this->group_model->get_group_list();
		$this->load->model('building_model');
                $data['sites'] = $this->building_model->getAllSites();
                $data['countries'] = $this->building_model->getCountries();
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_site';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit Site";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
function add_areas_page($message = "", $message_type="")
	{ 
                include('buildingselection_controller.php');

		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_area';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Add Areas";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
function delete_site() {
                
                $this->load->model("site_model");
                $siteid = $this->input->post('siteid');		                
                $this->site_model->deleteSite($siteid);
                echo "Site Deleted";
                return "Site Deleted";
                
}
function delete_area() {
                
                $this->load->model("area_model");
                $areaid = $this->input->post('areaid');		                
                $this->area_model->deleteArea($areaid);
                echo "Area Deleted";
                return "Area Deleted";
                
}
function edit_site() {
                
                $this->load->model("site_model");
                $data['siteid'] = $this->input->post('siteid');
		$data['sitename'] = $this->input->post('sitename');
		$data['address_line_1'] = $this->input->post('address_line_1');
		
                $data['address_line_2'] = $this->input->post('address_line_2');
		
                $data['suburb'] = $this->input->post('suburb');
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');
                $data['company'] = $this->input->post('company');
                
                $result = $this->site_model->editSite($data);
                echo $result;
                return $result;
                
}
function add_site() {
                
                $this->load->model("site_model");
                
		$data['sitename'] = $this->input->post('sitename');
		$data['address_line_1'] = $this->input->post('address_line_1');
		
                $data['address_line_2'] = $this->input->post('address_line_2');
		
                $data['suburb'] = $this->input->post('suburb');
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');
                $data['company'] = $this->input->post('company');
                
                $result = $this->site_model->addSite($data);
                echo $result;
                return $result;
                
}
function add_building() {
                
                $this->load->model("building_model");
                
		$data['buildingname'] = $this->input->post('buildingname');
                $data['description'] = $this->input->post('description');
                $data['site'] = $this->input->post('site');
		$data['address_line_1'] = $this->input->post('address_line_1');
		
                $data['address_line_2'] = $this->input->post('address_line_2');
		
                $data['suburb'] = $this->input->post('suburb');
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');              
                
                $data['levels_above'] = $this->input->post('levels_above');
                $data['levels_below'] = $this->input->post('levels_below');
                $data['month_contructed'] = $this->input->post('month_contructed');
                $data['year_constructed'] = $this->input->post('year_constructed');              
                $data['map'] = $this->input->post('map');
                
                $this->load->model('building_model');
                $result = $this->building_model->addBuilding($data);
                echo $result;
                return $result;
                
}
function add_areas() {
                
                $this->load->model("area_model");
                
		$data['buildingid'] = $this->input->post('buildingid');
                $data['area_name'] = $this->input->post('area_name');
                $data['description'] = $this->input->post('description');
		$data['room_number'] = $this->input->post('room_number');		
                $data['area_level'] = $this->input->post('area_level');		
                $data['above'] = $this->input->post('above');
		
                $result = $this->area_model->addAreas($data);
                //return print_r($result);
                echo $result;
                return $result;
                
}
function edit_areas() {
                
                $this->load->model("area_model");
                
		$data['buildingid'] = $this->input->post('buildingid');
                $data['area_name'] = $this->input->post('area_name');
                $data['description'] = $this->input->post('description');
		$data['room_number'] = $this->input->post('room_number');		
                $data['area_level'] = $this->input->post('area_level');		
                $data['above'] = $this->input->post('above');
                $data['areaid'] = $this->input->post('areaid');
		
                $result = $this->area_model->editAreas($data);
                //return print_r($result);
                echo $result;
                return $result;
                
}
function view_area_page() {
                include('buildingselection_controller.php');
                $this->load->model('area_model');
                $data['area_record'] = $this->area_model->getAreaDetails($this->uri->segment(8));
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'view_area_page';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "View Areas";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
                
}
function edit_area_page() {
                include('buildingselection_controller.php');
                $this->load->model('area_model');
                $data['area_detail'] = $this->area_model->getAreaDetails($this->uri->segment(8));
                
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_area';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Edit Area";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
                
}
function delete_area_page() {
               
                $this->load->model('area_model');
                $data['record'] = $this->area_model->getAreaDetails($this->uri->segment(8));
                
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_area_page';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Delete Area";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
                
}
function edit_building() {
                
                $this->load->model("building_model");
                $data['buildingid'] = $this->input->post('buildingid');
		$data['buildingname'] = $this->input->post('buildingname');
                $data['description'] = $this->input->post('description');
                $data['site'] = $this->input->post('site');
		$data['address_line_1'] = $this->input->post('address_line_1');
		
                $data['address_line_2'] = $this->input->post('address_line_2');
		
                $data['suburb'] = $this->input->post('suburb');
		$data['city'] = $this->input->post('city');
		$data['country'] = $this->input->post('country');              
                
                $data['levels_above'] = $this->input->post('levels_above');
                $data['levels_below'] = $this->input->post('levels_below');
                $data['month_contructed'] = $this->input->post('month_contructed');
                $data['year_constructed'] = $this->input->post('year_constructed');              
                $data['map'] = $this->input->post('map');
                
                $this->load->model('building_model');
                //return print_r($data);
                $result = $this->building_model->editBuilding($data);
                echo $result;
                return $result;
                
}
function add_building_page($message = "", $message_type="")
	{		
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
		$this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                foreach($data['clients'] as $clients){
                    if($this->uri->segment(3)==$clients->id){
                        $data['companame'] = $clients->company;
                    }
                }
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		} else {
			$data['record'] = $this->building_model->getFirstRecords($this->uri->segment(4) ? $this->uri->segment(4) : 1);
		}
                $data['countries'] = $this->building_model->getCountries();
                
                $this->load->model('site_model');
                $sitedetail = $this->site_model->getSite($this->uri->segment(3));
                $this->load->model('group_model');
                $clients = $this->group_model->get_group_list();

		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'add_building';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Add Building";
		$data['body_class'] = "buildingmanagement";
                
                if($this->building_model->getBuildingCount()>=$this->session->userdata('max_buildings')){
                    $data['message'] = "You reached the maximum number of buildings";
                    $data['message_type'] = 'error';
                    $data['main_content'] = "buildingmanagement";
                }
                
		$this->load->view('template', $data);
	}
function edit_building_page($message = "", $message_type="")
	{	
                $this->load->model('client_model');
                $data['clients'] = $this->client_model->getAll();
                $this->load->model("building_model");
                if($this->uri->segment(3)) {
                $data['sitesbyclient'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3)); // get list of sites
                foreach($data['clients'] as $clients){
                    if($this->uri->segment(3)==$clients->id){
                        $data['companame'] = $clients->company;
                    }
                }
                }
                if($this->uri->segment(4)) {
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                //}
                $data['months'] = $this->building_model->getMonths();
		$data['selectedBuildings'] = $this->building_model->getBuildingSites($this->uri->segment(4) ? $this->uri->segment(4) : 0);
		if($this->uri->segment(5)) {
			$data['record'] = $this->building_model->getBuildingRecord($this->uri->segment(5));
		} 
                $data['countries'] = $this->building_model->getCountries();
    
		$this->load->model("building_model");

		$data['sites'] = $this->building_model->getAllSites();
		$data['countries'] = $this->building_model->getCountries();
                $data['months'] = $this->building_model->getMonths();
                
                $this->load->model('site_model');
                $sitedetail = $this->site_model->getSite($this->uri->segment(3));
                $this->load->model('group_model');
                $clients = $this->group_model->get_group_list();

		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_building';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Edit Building";
		$data['body_class'] = "buildingmanagement";
		$this->load->view('template', $data);
	}
	
}

/* End of file buildingmanagement.php */
/* Location: ./system/application/controllers/buildingmanagement.php */