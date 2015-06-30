<?php

class BWoF extends CI_Controller {

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
                if($this->uri->segment(4)){
                $data['buildings'] = $this->building_model->getBuildingsbySite($this->uri->segment(4));
                }
            
                $this->load->model('bwof_model');
                $data['inspections'] = null;
                $data['bwofs'] = null;
                if($this->uri->segment(5)){
                $data['inspections'] = $this->bwof_model->getAllInspections($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5));
                $data['bwofs'] = $this->bwof_model->getAllBWofs($this->uri->segment(3),$this->uri->segment(4),$this->uri->segment(5));
                $this->load->model('group_model');
                            $client = $this->group_model->getSelectedRecords($this->uri->segment(3));
                            foreach($client as $cdetails){
                                $data['sdetail'] = $cdetails->company;
                            }
                $data['cdetail'] = null;
                 $this->load->model('site_model');
                            $site = $this->site_model->getSite($this->uri->segment(4));
                            foreach($site as $sdetails){
                                $data['cdetail'] = $sdetails->sitename;
                            }
                $data['bdetail'] = null;
                 $this->load->model('building_model');
                            $building = $this->building_model->getBuildingRecord($this->uri->segment(5));
                            foreach($building as $bdetails){
                                $data['bdetail'] = $bdetails->buildingname;
                            }     
                }
                $data['sdetail'] = null;
                       
		$data['load_header'] = true;
		$data['load_footer'] = true;
		$data['main_content'] = 'bwof';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Building Warrant of Fitness";
		$data['body_class'] = "bwof";
		$this->load->view('template', $data);
	}
        function issue_bwof() {
                $this->load->model('bwof_model');
                $data['user_id'] = $this->session->userdata('user_id');
                $data['company_id'] = $this->uri->segment(3);
                $data['site_id'] = $this->uri->segment(4);
                $data['building_id'] = $this->uri->segment(5);
                $data['iid'] = $this->uri->segment(6);
                $result = $this->bwof_model->issueBWof($data);
                $this->index("BWoF Issued", "success");
        }
}

/* End of file bwof.php */
/* Location: ./application/controllers/bwof.php */