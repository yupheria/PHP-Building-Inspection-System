<?php

class Site_model extends CI_Model {
        function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
     function getSitebyClient($clientid){
                $data = null;
               $query = 'select sites.* from sites, company where sites.company = company.id = company.id = '.$clientid;
               $query = $this->db->query($query);
               foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
     }
     function siteIsUnique($sitename)
	{
		$this->db->where('sitename', $sitename);
		$query = $this->db->get('sites');
		
		if($query->num_rows == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
    function getSite($id) {
                $data = null;
        $query = $this->db->query('SELECT * FROM sites WHERE id = ? LIMIT 1', $id);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function addSite($data){
        $error = "";
        $current_date = date("Y-m-d H:i:s");
        if(!$this->siteIsUnique($data['sitename'])) {
                        $error .= "";
                }
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['sitename'])) { 
                        $error .= "Site name is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['address_line_1'])) { 
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
                                        'user_id' => $this->session->userdata('user_id'),
					'sitename' => $data['sitename'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],				
					'city' => $data['city'],
					'country' => $data['country'],	
                                        'company' => $data['company']
			);		
			
			$this->db->insert('sites', $new_user_insert_data); 
                        $lastid = $this->db->insert_id();
                        
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/buildingmanagement/view_site/'.$data['company'].'/'.$lastid,$data['sitename']),
                                        'type' => 'Site'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return $lastid;
                        
		}
		else {
			return $error;
                    
		}       
    }
    function editSite($data){
        $error = "";
        $current_date = date("Y-m-d H:i:s");
        if(!preg_match("/^[A-Za-z_ ]+$/", $data['sitename'])) { 
                        $error .= "Site name is invalid<br />";
                }
        if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['address_line_1'])) { 
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
					'sitename' => $data['sitename'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],				
					'city' => $data['city'],
					'country' => $data['country'],	
                                        'company' => $data['company']
			);		
			$this->db->where('id', $data['siteid']);
			$this->db->update('sites', $new_user_insert_data);   
                        
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/buildingmanagement/view_site/'.$data['company'].'/'.$data['siteid'],$data['sitename']),
                                        'type' => 'Site'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return $data['siteid'];
                        
		}
		else {
			return $error;
                    
		}       
    }
    function deleteSite($siteid) {
        $this->db->where('id',$siteid);
                $query = $this->db->get('sites');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->sitename;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Site'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
        
        $this->db->delete('sites', array('id' => $siteid));
    }
}