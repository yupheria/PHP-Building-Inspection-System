<?php

class Building_model extends CI_Model {
        function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
        function getBuildingCount()
	{
                $query = $this->db->get('buildings');
		return $query->num_rows;
	}
        function getClientid($bid) {
                $data[] = null;
                $query = $this->db->query('select company.id as cid, sites.id as sid from company, buildings, sites where buildings.site = sites.id and sites.company = company.id and
buildings.id = ?',$bid);
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
        function getSitesbyBuilding($building){
                $data[] = null;
		$query = $this->db->query('select company.company, sites.sitename, sites.id from company, sites where company.id = sites.company and company.id = ? order by sites.sitename asc', $building);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
        function getBuildingsbySite($site){
                $data[] = null;
                if($this->session->userdata('access_level')==1){
                $query = $this->db->query('select sites.sitename, buildings.buildingname, buildings.id from sites,buildings where buildings.site = sites.id and sites.id = ? and buildings.user_id = ? order by buildings.buildingname asc', array($site,$this->session->userdata('user_id')));    
                } else {
		$query = $this->db->query('select sites.sitename, buildings.buildingname, buildings.id from sites,buildings where buildings.site = sites.id and sites.id = ? order by buildings.buildingname asc', $site);
                }
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
        function getAll()
	{
                $data = null;
                if($this->session->userdata('access_level') == 1){
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                }
		$query = $this->db->get('buildings');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
	}
        function getSitesbyClient($client){
                $data[] = null;
		$query = $this->db->query('SELECT * FROM `sites` WHERE company = ?', $client);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
	function getAllSites()
	{   
                $data = null;
                if($this->session->userdata('access_level') == '1') {
                    $this->db->where('user_id',$this->session->userdata('user_id'));
                }
                $query = $this->db->order_by('sitename','asc');
		$query = $this->db->get('sites');
		$this->db->order_by("id", "asc"); 
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
        function getMonths()
	{
                $data = null;
		$query = $this->db->get('months');
		$this->db->order_by("id", "asc"); 
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
        function getCountries()
	{        
                $data = null;
                $this->db->order_by("id", "asc"); 
                $query = $this->db->get('countries');
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	function getBuildingSites($id) {
		$this->db->where('site', $id);
                if($this->session->userdata('access_level')==1){
                $this->db->where('user_id', $this->session->userdata('user_id'));
                }
		$query = $this->db->get('buildings');
                $data = null;
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	function getBuildingRecord($id) {
                $data = null;
		$this->db->where('id', $id);
		$query = $this->db->get('buildings');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
                return $data;
	}
	function getFirstRecords($site)
	{
		$query = $this->db->query('SELECT * FROM buildings WHERE site = ? LIMIT 1', $site);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		if($query->result() != NULL) {
			return $data;
		}
		else {
			return NULL;
		}
	}
        function siteIsUnique($buildingname)
	{
		$this->db->where('buildingname', $buildingname);
		$query = $this->db->get('buildings');
		
		if($query->num_rows == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
        function addBuilding($data){
        $error = "";  
        if(!$this->siteIsUnique($data['buildingname'])) {
            $error .= "Building name should be unique<br />";
        }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['buildingname'])) { 
                        $error .= "Building name is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_,\- ]+$/", $data['address_line_1'])) { 
                        $error .= "Address Line 1 is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['suburb'])) { 
                        $error .= "Suburb is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['city'])) { 
                        $error .= "City is invalid<br />";
                }       
        if ($error == "")
		{
			$new_user_insert_data = array(
					'buildingname' => $data['buildingname'],
                                        'site' => $data['site'],
                                        'description' => $data['description'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],				
					'city' => $data['city'],
					'country' => $data['country'],	
                                        
                                        'levels_above' => $data['levels_above'],
                                        'levels_below' => $data['levels_below'],
                                        'month_contructed' => $data['month_contructed'],
                                        'year_constructed' => $data['year_constructed'],                                       
                                        'map' => $data['map'],
                                        'user_id' => $this->session->userdata('user_id')
			);		
			
			$this->db->insert('buildings', $new_user_insert_data);
                        $lastid = $this->db->insert_id();
                        
                        
                        $this->db->where('id',$data['site']);
                        $result = $this->db->get('sites');
                        $clientid = "";
                        foreach ($result->result() as $row)
                        {
                            $clientid = $row->company;
                        }
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/buildingmanagement/view_building/'.$clientid.'/'.$data['site'].'/'.$lastid,$data['buildingname']),
                                        'type' => 'Building'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return $lastid;
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}       
    }
    function editBuilding($data){
        $error = "";
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['buildingname'])) { 
                        $error .= "Building name is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_,\- ]+$/", $data['address_line_1'])) { 
                        $error .= "Address Line 1 is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['suburb'])) { 
                        $error .= "Suburb is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['city'])) { 
                        $error .= "City is invalid<br />";
                }              
        if ($error == "")
		{
			$new_user_insert_data = array(
					'buildingname' => $data['buildingname'],
                                        'site' => $data['site'],
                                        'description' => $data['description'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],				
					'city' => $data['city'],
					'country' => $data['country'],	
                            
                                        'levels_above' => $data['levels_above'],
                                        'levels_below' => $data['levels_below'],
                                        'month_contructed' => $data['month_contructed'],
                                        'year_constructed' => $data['year_constructed'],
                                        'map' => $data['map']
			);		
			$this->db->where('id', $data['buildingid']);
			$this->db->update('buildings', $new_user_insert_data);        
                        
                        $this->db->where('id',$data['site']);
                        $result = $this->db->get('sites');
                        $clientid = "";
                        foreach ($result->result() as $row)
                        {
                            $clientid = $row->company;
                        }
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/buildingmanagement/view_building/'.$clientid.'/'.$data['site'].'/'.$data['buildingid'],$data['buildingname']),
                                        'type' => 'Building'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
                        
			return "Building Updated";
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}       
    }
     function deleteBuilding($id) {
         $this->db->where('id',$id);
                $query = $this->db->get('buildings');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->buildingname;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Building'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
         
        $this->db->delete('buildings', array('id' => $id));
    }
     function editbuildinguser($bid,$uid) {
         $error = "";
         $update_data = array('user_id'=>$uid);
         $this->db->where('id', $bid);
         $this->db->update('buildings', $update_data);
     }
}