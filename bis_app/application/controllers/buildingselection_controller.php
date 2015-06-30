<?php
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
                }
                $data['countries'] = $this->building_model->getCountries();
?>
