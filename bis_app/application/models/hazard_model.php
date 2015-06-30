<?php
class hazard_model extends CI_Model {
     function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
    function getHazardDetails($id) {
                $data = null;
		$query = $this->db->query('SELECT * FROM hazards WHERE id = ?',$id);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
    function deleteHazard($id) {
        $this->db->where('id',$id);
                $query = $this->db->get('hazards');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->name;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Hazard'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
        
        
        $image = $this->getHazardDetails($id);
        $img = null;
        foreach($image as $mage) {
            $img = $mage->img;
        }
        $error = "";
        $file = $_SERVER['DOCUMENT_ROOT']."bis_app/uploads/".$img;
        if($img != null) {
        if(!unlink($file)) {
            $error += "Former Image could not be deleted<br />";
            $error += $file;
        }
        }
        $this->db->delete('hazards', array('id' => $id));
        return $error;
    }
    function addHazard($data) {
         $error = "";  
         if(!preg_match("/^[A-Za-z_ ]+$/", $data['hname'])) { 
                        $error .= "Hazard name should be alpha numeric<br />";
                }
          if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['hdescription'])) { 
                        $error .= "Hazard description should be alpha numeric<br />";
                }
          if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['hsolution'])) { 
                        $error .= "Hazard solution should be alpha numeric<br />";
                }
          $data['hdate'] = date("Y-m-d",strtotime($data['hdate']));
         if ($error == "")
		{
			$new_user_insert_data = array(
					'name' => $data['hname'],
                                        'date' => $data['hdate'],
                                        'area' => $data['harea'],
					'level' => $data['hlevel'],
					'status' => $data['hstatus'],			
					'description' => $data['hdescription'],				
					'solution' => $data['hsolution']	
			);		
			
			$this->db->insert('hazards', $new_user_insert_data);
                        $lastid = $this->db->insert_id();
			
                        //$result = $this->addJustImg($lastid, $data['img']);
                        $bid = "";
                        $this->db->where('id',$data['harea']);
                        $result = $this->db->get('building_areas');
                        $sid = "";
                        $lvl = "";
                        foreach ($result->result() as $row)
                        {
                            $bid = $row->buildingid;
                            $lvl = $row->area_level;
                            $areabove = $row->above;
                        }
                        
                        $this->db->where('site',$bid);
                        $result = $this->db->get('buildings');
                        $sid = "";
                        foreach ($result->result() as $row)
                        {
                            $sid = $row->site;
                        }
                        
                        $this->db->where('id', $sid);
                        $result = $this->db->get('sites');
                        $cid = "";
                        foreach ($result->result() as $row)
                        {
                            $cid = $row->company;
                        }
                        
                        $above = 'g';
                        switch($areabove) {
                            case 0: $above = '0';
                            case 1: if($areabove==0){
                                    $above = '1';
                                    } else {
                                    $above = '2';
                                    }
                        }
                        
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/buildinginspection/view_hazard/'.$cid.'/'.$sid.'/'.$bid.'/'.$above.'/'.$lvl.'/'.$data['harea'].'/'.$lastid,$data['hname']),
                                        'type' => 'Hazard'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
                        
                        return $lastid;
                        
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}
    }
    function editHazard($data) {
         $error = "";
          if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['hname'])) { 
                        $error .= "Hazard name should be alpha numeric<br />";
                }
          if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['hdescription'])) { 
                        $error .= "Hazard description should be alpha numeric<br />";
                }
          if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['hdescription'])) { 
                        $error .= "Hazard solution should be alpha numeric<br />";
                }
          $data['hdate'] = date("Y-m-d",strtotime($data['hdate']));
         if ($error == "")
		{
			$new_user_insert_data = array(
					'name' => $data['hname'],
                                        'date' => $data['hdate'],
                                        'area' => $data['harea'],
					'level' => $data['hlevel'],
					'status' => $data['hstatus'],			
					'description' => $data['hdescription'],				
					'solution' => $data['hsolution']	
			);		
			
			$this->db->where('id', $data['hid']);
			$this->db->update('hazards', $new_user_insert_data);
                        
                        $bid = "";
                        $this->db->where('id',$data['harea']);
                        $result = $this->db->get('building_areas');
                        $sid = "";
                        $lvl = "";
                        foreach ($result->result() as $row)
                        {
                            $bid = $row->buildingid;
                            $lvl = $row->area_level;
                            $areabove = $row->above;
                        }
                        
                        $this->db->where('site',$bid);
                        $result = $this->db->get('buildings');
                        $sid = "";
                        foreach ($result->result() as $row)
                        {
                            $sid = $row->site;
                        }
                        
                        $this->db->where('id', $sid);
                        $result = $this->db->get('sites');
                        $cid = "";
                        foreach ($result->result() as $row)
                        {
                            $cid = $row->company;
                        }
                        
                        $above = 'g';
                        switch($areabove) {
                            case 0: $above = '0';
                            case 1: if($areabove==0){
                                    $above = '1';
                                    } else {
                                    $above = '2';
                                    }
                        }
                        
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/buildinginspection/view_hazard/'.$cid.'/'.$sid.'/'.$bid.'/'.$above.'/'.$lvl.'/'.$data['harea'].'/'.$data['hid'],$data['hname']),
                                        'type' => 'Hazard'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return "Hazard Updated";
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}
    }
    function addImg($hid, $path) {
        $image = $this->getHazardDetails($hid);
        $img = null;
        if($image != null) {
        foreach($image as $mage) {
            $img = $mage->img;
        }
        }
        $error = "";
        $file = $_SERVER['DOCUMENT_ROOT']."bis_app/uploads/".$img;
        if($img != null) {
        if(!unlink($file)) {
            $error += "Former Image could not be deleted<br />";
            $error += $file;
        }
        }
        if($error == "") {
        $new_user_insert_data = array('img' => $path);
        $this->db->where('id', $hid);
        $this->db->update('hazards', $new_user_insert_data);
        //$this->db->query('update hazards set img ="'.$path.'" where id ='.$hid);
        //return "Hazard Image Added";
        return $hid;
        } else {
        return $error;
        }
    }
    function addJustImg($hid, $img) {
        $error = "";
        if($error == "") {
        $new_user_insert_data = array('img' => $img);
        $this->db->where('id', $hid);
        $this->db->update('hazards', $new_user_insert_data);
        return "Hazard Image Added";
        } else {
        return $error;
        }
    }
    function getHazardLevels() {
                $data = null;
                $query = $this->db->get('hazard_levels');
		$this->db->order_by("id", "asc"); 
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getHazardStatus() {
                $data = null;
                $query = $this->db->get('hazard_status');
		$this->db->order_by("id", "asc"); 
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getHazardListUndone($buildingid) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, building_areas.above, building_areas.area_name, hazards.name, hazards.id from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ? and (hazards.status = 1 or hazards.status = 2)',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getHazardListDone($buildingid) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, building_areas.above, building_areas.area_name, hazards.name, hazards.id from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ? and hazards.status = 3',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getHazardList($bid,$area) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, building_areas.above, building_areas.area_name, hazards.name, hazards.id as hid, building_areas.id as aid from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ? and hazards.area = ?',array($bid,$area));
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getAllHazard($buildingid) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, 
                building_areas.above, 
                building_areas.area_name, 
                hazards.name, 
                hazards.level,
                hazards.status,
                hazards.description,
                hazards.solution
                from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ?',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getUnsolvedHazard($buildingid) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, 
                building_areas.above, 
                building_areas.area_name, 
                hazards.name, 
                hazards.level,
                hazards.status,
                hazards.description,
                hazards.solution
                from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ? and (hazards.status = 1 or hazards.status = 2)',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getInspectedHazard($buildingid) { 
                $data[] = null;
		$query = $this->db->query('select building_areas.area_level, 
                building_areas.above, 
                building_areas.area_name, 
                hazards.name, 
                hazards.level,
                hazards.status,
                hazards.description,
                hazards.solution
                from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ? and hazards.status = 3',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
    }
    function getBuildingHazardList($bid){
                 $data[] = null;
		$query = $this->db->query('select building_areas.area_level, building_areas.above, building_areas.area_name, hazards.name, hazards.id as hid, building_areas.id as aid from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ?',$bid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
}
?>
