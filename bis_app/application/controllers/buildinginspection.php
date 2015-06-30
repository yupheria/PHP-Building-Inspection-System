<?php

class BuildingInspection extends CI_Controller {
//var $fileImage = null;
	function __construct()
	{
		parent::__construct();
		is_logged_in();	
	}
	
	function index($message = "", $message_type = "")
	
	{	
                $this->load->model("client_model");
                $data['companies'] = $this->client_model->getAll();
                
                $this->load->model("building_model");
                $data['sites'] = null;
                if($this->uri->segment(3)){
                $data['sites'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3));
                }
                $data['buildings'] = null;
                if($this->uri->segment(4)){
                $data['buildings'] = $this->building_model->getBuildingSites($this->uri->segment(4));
                }
                if($this->uri->segment(6)){
                $levels = $this->building_model->getBuildingRecord($this->uri->segment(5));
                foreach($levels as $level){
                    $data['levelsabove'] = $level->levels_above;
                    $data['levelsabelow'] = $level->levels_below; 
                }
                }
                $data['areas1'] = null;
                if($this->uri->segment(7) || $this->uri->segment(7)==0){
                $this->load->model('area_model');
                $data['areas1'] = $this->area_model->getLevelArea($this->uri->segment(5),$this->uri->segment(6),$this->uri->segment(7));
                }
                $this->load->model("area_model");
                $this->load->model("hazard_model");
                $data['areas'] = null;
                $data['hazards'] = null;
                if($this->uri->segment(5)){
                $data['areas'] = $this->area_model->getArea($this->uri->segment(5));
                $data['hazards'] = $this->hazard_model->getBuildingHazardList($this->uri->segment(5));
                }
                
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                
                $data['hazardsdone'] = null;
		if($this->uri->segment(8)) {
                $data['hazards'] = $this->hazard_model->getHazardList($this->uri->segment(5),$this->uri->segment(8));
                //$data['hazardsdone'] = $this->hazard_model->getHazardListDone($this->uri->segment(5));
                }
                //$data['fileImage'] = $this->fileImage;
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'buildinginspection';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
	}
        function edit_hazard_page($message = "", $message_type = "") {
                $this->load->model("client_model");
                $data['companies'] = $this->client_model->getAll();
                
                $this->load->model("building_model");
                $data['sites'] = null;
                if($this->uri->segment(3)){
                $data['sites'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3));
                }
                if($this->uri->segment(4)){
                $data['buildings'] = $this->building_model->getBuildingsbySite($this->uri->segment(4));
                }
                if($this->uri->segment(6)){
                $levels = $this->building_model->getBuildingRecord($this->uri->segment(5));
                foreach($levels as $level){
                    $data['levelsabove'] = $level->levels_above;
                    $data['levelsabelow'] = $level->levels_below; 
                }
                }
                $data['areas1'] = null;
                if($this->uri->segment(7) || $this->uri->segment(7)==0){
                $this->load->model('area_model');
                $data['areas1'] = $this->area_model->getLevelArea($this->uri->segment(5),$this->uri->segment(6),$this->uri->segment(7));
                }
                $data['areas'] = null;
                $data['hazards'] = null;
                $this->load->model("hazard_model");
                if($this->uri->segment(5)){
                $data['areas'] = $this->area_model->getArea($this->uri->segment(5));
                $data['hazards'] = $this->hazard_model->getBuildingHazardList($this->uri->segment(5));
                }
                $this->load->model("hazard_model");
                $data['hazards'] = $this->hazard_model->getHazardList($this->uri->segment(5),$this->uri->segment(8));
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['hazardes'] = $this->hazard_model->getHazardDetails($this->uri->segment(9));
                //echo print_r($data['hazard']);
                $this->load->model("area_model");
                $data['areas'] = $this->area_model->getArea($this->uri->segment(5));
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'edit_hazard';
		if($this->uri->segment(10) && $this->uri->segment(11)) {
                    $data['message'] = $this->uri->segment(10);
                    $data['message_type'] = $this->uri->segment(11);
                } else {
                    $data['message'] = $message;
                    $data['message_type'] = $message_type;
                }
		$data['page_title'] = "Building Inspection";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
                
		
        }
        function view_hazard(){
                $this->load->model("client_model");
                $data['companies'] = $this->client_model->getAll();
                
                $this->load->model("building_model");
                $data['sites'] = null;
                if($this->uri->segment(3)){
                $data['sites'] = $this->building_model->getSitesbyBuilding($this->uri->segment(3));
                }
                if($this->uri->segment(4)){
                $data['buildings'] = $this->building_model->getBuildingsbySite($this->uri->segment(4));
                }
                
                if($this->uri->segment(6)){
                $levels = $this->building_model->getBuildingRecord($this->uri->segment(5));
                foreach($levels as $level){
                    $data['levelsabove'] = $level->levels_above;
                    $data['levelsabelow'] = $level->levels_below; 
                }
                }
                $data['areas1'] = null;
                if($this->uri->segment(7) || $this->uri->segment(7)==0){
                $this->load->model('area_model');
                $data['areas1'] = $this->area_model->getLevelArea($this->uri->segment(5),$this->uri->segment(6),$this->uri->segment(7));
                }
       
                $this->load->model("hazard_model");
                $data['hazards'] = $this->hazard_model->getHazardList($this->uri->segment(5),$this->uri->segment(8));
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['hazardes'] = $this->hazard_model->getHazardDetails($this->uri->segment(9));
                //echo print_r($data['hazard']);
                $this->load->model("area_model");
                $data['areas'] = $this->area_model->getArea($this->uri->segment(5));
                
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'view_hazard';
		if($this->uri->segment(7) && $this->uri->segment(8)) {
                $data['message'] = $this->uri->segment(7);
		$data['message_type'] = $this->uri->segment(8);    
                } else {
                $data['message'] = "";
		$data['message_type'] = "";
                }
		$data['page_title'] = "Building Inspection";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
        }
        function delete_hazard_page($message = "", $message_type = "") {
                $this->load->model("hazard_model");
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['hazard'] = $this->hazard_model->getHazardDetails($this->uri->segment(9));
                $this->load->model("area_model");
                $data['areas'] = $this->area_model->getArea($this->uri->segment(4));
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'delete_hazard_page';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
        }
        function add_hazard() {
                $this->load->model("hazard_model");
                $data['hname'] = $this->input->post('hname');
		$data['hdate'] = $this->input->post('hdate');
		$data['harea'] = $this->input->post('harea');	
                $data['hlevel'] = $this->input->post('hlevel');	
                $data['hstatus'] = $this->input->post('hstatus');
		$data['hdescription'] = $this->input->post('hdescription');
		$data['hsolution'] = $this->input->post('hsolution');
                $data['buildingid'] = $this->input->post('buildingid');
                //$data['img'] = $this->fileImage;
                $result = $this->hazard_model->addHazard($data);
                
                echo $result;
                return $result;
        }
        function delete_hazard() {
                $this->load->model("hazard_model");
                $result = $this->hazard_model->deleteHazard($this->input->post('hid'));       
                echo "Hazard Deleted";
                return "Hazard Deleted";
        }
        function upload_img() {
                $config['upload_path'] = $_SERVER['DOCUMENT_ROOT']."bis_app/uploads";
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']    = '2048';
                $config['max_width']  = '0';
                $config['max_height']  = '0';

                // You can give video formats if you want to upload any video file.
                //echo $_SERVER['DOCUMENT_ROOT'];
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('myFile'))
                {
                $error = array('error' => $this->upload->display_errors());
               
                // uploading failed. $error will holds the errors.
                
                header( 'Location:'.base_url().'index.php/buildinginspection/view_hazard/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9).'/Upload_Failed/error');
                echo print_r($error);
				//echo phpinfo();
		//		echo $config['upload_path'];				
                return $error;
                }
                else
                {
                $data = array('upload_data' => $this->upload->data());
                $this->load->model("hazard_model");
                $result = $this->hazard_model->addImg($this->uri->segment(9),$data['upload_data']['orig_name']);
                header( 'Location:'.base_url().'index.php/buildinginspection/view_hazard/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(5).'/'.$this->uri->segment(6).'/'.$this->uri->segment(7).'/'.$this->uri->segment(8).'/'.$this->uri->segment(9).'/Upload_Success/success');
                echo $result;
                return $result;
                // uploading successfull, now do your further actions
                }
        }
        function edit_hazard() {
                $this->load->model("hazard_model");
                $data['hid'] = $this->input->post('hid');
                $data['hname'] = $this->input->post('hname');
		$data['hdate'] = $this->input->post('hdate');
		$data['harea'] = $this->input->post('harea');	
                $data['hlevel'] = $this->input->post('hlevel');	
                $data['hstatus'] = $this->input->post('hstatus');
		$data['hdescription'] = $this->input->post('hdescription');
		$data['hsolution'] = $this->input->post('hsolution');
                $result = $this->hazard_model->editHazard($data);
                
                echo $result;
                return $result;
        }
        function print_inspection_list($message = "", $message_type = "") {
                $this->load->model("hazard_model");
                $data['hazards'] = $this->hazard_model->getAllHazard($this->uri->segment(5));
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_inspection_list';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection List";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
        }
        function print_unsolved_hazard($message = "", $message_type = "") {
                $this->load->model("hazard_model");
                $data['hazards'] = $this->hazard_model->getUnsolvedHazard($this->uri->segment(5));
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_inspection_list';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection List";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
        }
        function print_inspected_hazard($message = "", $message_type = "") {
                $this->load->model("hazard_model");
                $data['hazards'] = $this->hazard_model->getInspectedHazard($this->uri->segment(5));
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['status'] = $this->hazard_model->getHazardStatus();
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_inspection_list';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection List";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data); 
        }
        function inspection_complete_page($message = "", $message_type = "") {
                $this->load->model('building_model');
                $building = $this->building_model->getBuildingRecord($this->uri->segment(5));
                foreach($building as $build) {
                    $data['buildingid'] = $build->id;
                    $data['buildingname'] = $build->buildingname;
                    $siteid = $build->site;
                }
                $this->load->model('group_model');
                $company = $this->group_model->getSelectedRecords($this->uri->segment(3));
                foreach($company as $comp) {
                    $data['companyid'] = $comp->id;
                    $data['companyname'] = $comp->company;
                }
                $this->load->model('site_model');
                $sites = $this->site_model->getSite($siteid);
                foreach($sites as $site) {
                    $data['siteid'] = $site->id;
                    $data['sitename'] = $site->sitename;
                }    
                $data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'inspection_complete';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Inspection Completion";
		$data['body_class'] = "building_inspection";
		$this->load->view('template', $data);
        }
        function inspection_complete() {
                $this->load->model("inspection_model");
                $data['buildingid'] = $this->input->post('buildingid');
                $data['companyid'] = $this->input->post('companyid');
		$data['user_id'] = $this->input->post('user_id');
		$data['status'] = $this->input->post('status');
                $data['siteid'] = $this->input->post('siteid');	
                $result = $this->inspection_model->addInspection($data);
                echo $result;
                return $result;
        }
}

/* End of file buildinginspection.php */
/* Location: ./application/controllers/buildinginspection.php */