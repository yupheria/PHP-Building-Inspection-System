<?php
class area_model extends CI_Model {
    function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
    function addAreas($data){
        $error = "";    
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['area_name'])) { 
                        $error .= "Area name should be alpha numeric<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['room_number'])) { 
                        $error .= "Room number should be alpha numeric<br />";
                }
        if ($error == "")
		{
			$new_user_insert_data = array(
					'buildingid' => $data['buildingid'],
                                        'description' => $data['description'],
                                        'area_level' => $data['area_level'],
					'above' => $data['above'],
					'room_number' => $data['room_number'],			
					'area_name' => $data['area_name']									
			);		
			
			$this->db->insert('building_areas', $new_user_insert_data); 
                        
                        $lastid = $this->db->insert_id();
                        $this->db->where('site',$data['buildingid']);
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
                        switch($data['above']) {
                            case 0: $above = 'b';
                            case 1: if($data['area_level']==0){
                                    $above = 'g';
                                    } else {
                                    $above = 'a';
                                    }
                        }
                        
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/buildingmanagement/view_area_page/'.$cid.'/'.$sid.'/'.$data['buildingid'].'/'.$above.'/'.$data['area_level'].'/'.$lastid,$data['area_name']),
                                        'type' => 'Area'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return $lastid;
                        //return $new_user_insert_data;
                        
		}
		else {
			return $error;
                    
		}       
    }
    function editAreas($data){
        $error = ""; 
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['area_name'])) { 
                        $error .= "Area name should be alpha numeric<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['room_number'])) { 
                        $error .= "Room number should be alpha numeric<br />";
                }
        if ($error == "")
		{
			$new_user_insert_data = array(
					'buildingid' => $data['buildingid'],
                                        'description' => $data['description'],
                                        'area_level' => $data['area_level'],
					'above' => $data['above'],
					'room_number' => $data['room_number'],			
					'area_name' => $data['area_name']									
			);		
			$this->db->where('id',$data['areaid']);
			$this->db->update('building_areas', $new_user_insert_data);
                     
                        $this->db->where('site',$data['buildingid']);
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
                        switch($data['above']) {
                            case 0: $above = 'b';
                            case 1: if($data['area_level']==0){
                                    $above = 'g';
                                    } else {
                                    $above = 'a';
                                    }
                        }
                        
                        $current_date = date("Y-m-d H:i:s");
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/buildingmanagement/view_area_page/'.$cid.'/'.$sid.'/'.$data['buildingid'].'/'.$above.'/'.$data['area_level'].'/'.$data['areaid'],$data['area_name']),
                                        'type' => 'Area'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
			return "Area Updated";
                        //return $new_user_insert_data;
                        
		}
		else {
			return $error;
                    
		}       
    }
    function getArea($buildingid) {
                $data = null;
		$query = $this->db->query('SELECT * FROM building_areas WHERE buildingid = ?',$buildingid);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
                if ($data != null) {
                    return $data;
                } else {
                    return null;
                }		
	}  
    function getBuildingAreas($buildingid,$above,$level) {
                $data = null;
		$query = $this->db->query('SELECT * FROM building_areas WHERE buildingid = ? and above = ? and area_level = ?',array($buildingid,$above,$level));
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
                if ($data != null) {
                    return $data;
                } else {
                    return null;
                }		
	}  
    function getAreaDetails($id) {
                $data = null;
		$query = $this->db->query('SELECT * FROM building_areas WHERE id = ?',$id);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
    function deleteArea($areaid) {
        $this->db = $this->load->database($this->session->userdata('client_db'), true);
        $this->db->where('id',$areaid);
                $query = $this->db->get('building_areas');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->area_name;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Area'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
        $this->db->delete('building_areas', array('id' => $areaid));
    }
    function getLevelArea($bid,$above,$level){
        if($above==1){
            $aboves = 1;
        } else {
            $aboves = 0;
        }
        $data = null;
		$query = $this->db->query('SELECT * FROM building_areas WHERE buildingid = ? and above = ? and area_level = ?',array($bid,$aboves,$level));
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
}
?>
