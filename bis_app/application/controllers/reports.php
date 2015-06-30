<?php

class Reports extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		is_logged_in();
	}
	
	function index()
	{
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
                if($this->uri->segment(5)) {
                $this->load->model('report_model');
                $data['report_type'] = $this->report_model->getAllTypes();
                }
                if($this->uri->segment(6)) {
                    $this->load->model('report_model');
                    if($this->uri->segment(6) == 1) {
                    $data['datum']= $this->report_model->getInspections($this->uri->segment(5));
                    }
                    if($this->uri->segment(6) == 2) {
                    $details = $this->report_model->getUpdatedInspections($this->uri->segment(5));
                    $data['iid'] = null;
                    if($details != null) {
                    foreach($details as $detail) {
                        $data['iid'] = $detail->iid;
                    }
                    }
                    $data['datum']= $this->report_model->getBWoFs($this->uri->segment(5));
                    }
                }
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'reports';
		$data['message'] = $this->uri->segment(7) ? $this->uri->segment(7) : "";
		$data['message_type'] = $this->uri->segment(8) ? $this->uri->segment(8) : "";
		$data['page_title'] = "Building Report";
		$data['body_class'] = "reports";
                
                $this->load->model('users_model');
                $record = $this->users_model->select_user($this->session->userdata('user_id'));
                foreach($record as $row){
                $data['dropbox_user'] = $row->dropbox_user;
                $data['dropbox_pass'] = $row->dropbox_pass;
                }
                $this->load->view('template', $data);
	}
        function print_inspection() {
                $this->load->model('report_model');
                $data['buildingdetails'] = $this->report_model->getBuildingDetails($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6));
                $data['buildinghazards'] = $this->report_model->getBuildingHazards($this->uri->segment(5));
               
                $this->load->model('group_model');
                $data['company_types'] = $this->group_model->getCompany_type();
                $data['countries'] = $this->group_model->getCountries();
                
                $this->load->model('hazard_model');
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_inspection';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Inspection Report";
		$data['body_class'] = "reports";
		//$this->load->view('template', $data);
                $this->load->library('pdf');
                
                $this->pdf->SetAuthor('Capital Planning');
                $this->pdf->SetTitle('Inspection Report');
                $this->pdf->SetSubject('Inspection Report');
                $this->pdf->SetKeywords('Inspection, BIS, CPC, PDF');
             
                $this->pdf->setPrintHeader(false);
                $this->pdf->setPrintFooter(false);
                
                $this->pdf->SetFont('times', '', 10);
    
                $this->pdf->AddPage();
                $html = $this->load->view('template', $data, true);
                $this->pdf->writeHTML($html, true, false, true, false, '');
            
                $this->pdf->Output("Inspection Report.pdf", "I"); 
        }
        function print_bwof() {
                $this->load->model('report_model');
                $data['buildingdetails'] = $this->report_model->getBuildingDetails($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6));
                $data['buildinghazards'] = $this->report_model->getBuildingHazards($this->uri->segment(5));
               
                $this->load->model('group_model');
                $data['company_types'] = $this->group_model->getCompany_type();
                $data['countries'] = $this->group_model->getCountries();
                
                $this->load->model('hazard_model');
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_bwof';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building BWoF Report";
		$data['body_class'] = "reports";
		//$this->load->view('template', $data);
                
                $this->load->library('pdf');
                
                $this->pdf->SetAuthor('Capital Planning');
                $this->pdf->SetTitle('BwoF Report');
                $this->pdf->SetSubject('BwoF Report');
                $this->pdf->SetKeywords('BwoF, BIS, CPC, PDF');
             
                $this->pdf->setPrintHeader(false);
                $this->pdf->setPrintFooter(false);
                
                $this->pdf->SetFont('times', '', 10);
    
                $this->pdf->AddPage();
                $html = $this->load->view('template', $data, true);
                $this->pdf->writeHTML($html, true, false, true, false, '');
            
                $this->pdf->Output("BwoF Report.pdf", "I"); 
        }
        function print_inspection_word() {
                $this->load->model('report_model');
                $data['buildingdetails'] = $this->report_model->getBuildingDetails($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6));
                $data['buildinghazards'] = $this->report_model->getBuildingHazards($this->uri->segment(5));
               
                $this->load->model('group_model');
                $data['company_types'] = $this->group_model->getCompany_type();
                $data['countries'] = $this->group_model->getCountries();
                
                $this->load->model('hazard_model');
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_inspection';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building Inspection Report";
		$data['body_class'] = "reports";
		//$this->load->view('template', $data);
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"Inspection Report.doc\"");

                $output = $this->load->view('template', $data, true);
                echo $output;
                exit;
        }
        function print_bwof_word() {
                $this->load->model('report_model');
                $data['buildingdetails'] = $this->report_model->getBuildingDetails($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5),$this->uri->segment(6));
                $data['buildinghazards'] = $this->report_model->getBuildingHazards($this->uri->segment(5));
               
                $this->load->model('group_model');
                $data['company_types'] = $this->group_model->getCompany_type();
                $data['countries'] = $this->group_model->getCountries();
                
                $this->load->model('hazard_model');
                $data['hazard_levels'] = $this->hazard_model->getHazardLevels();
                $data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'print_bwof';
		$data['message'] = "";
		$data['message_type'] = "";
		$data['page_title'] = "Building BWoF Report";
		$data['body_class'] = "reports";
		//$this->load->view('template', $data);
                header("Content-Type: application/vnd.ms-word");
                header("Expires: 0");
                header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
                header("Content-disposition: attachment; filename=\"BWoF Report.doc\"");

                $output = $this->load->view('template', $data, true);
                echo $output;
                exit;
        }
}

/* End of file worklist.php */
/* Location: ./application/controllers/worklist.php */