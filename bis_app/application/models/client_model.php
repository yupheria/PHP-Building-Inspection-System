<?php

class Client_model extends CI_Model {
        function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
        function getTtitles(){
                $data = null;
                $query = $this->db->get('title');
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
        function getCountries(){
                $data = null;
                $this->db->order_by("id", "desc"); 
                $query = $this->db->get('countries');
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
	function getAll()
	{
                $data = null;
                
                $this->db->order_by("company", "asc"); 
		$query = $this->db->get('company');
		//$query = $this->db->query('select * from company');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;	
	}
	
	function getAllByGroup($group)
	{
		$query = $this->db->get_where('clients', array('group_id' => $group));
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
	
	function getGroups()
	{
                $data = null;
                 if($this->session->userdata('access_level') == 0 || $this->session->userdata('access_level')==3) {
                  $query = 'SELECT * FROM company';
                 } else {
                  $query = 'SELECT * FROM company where user_id ='.$this->session->userdata('user_id');
                 }
                 if($this->session->userdata('access_level') == 2) {
                   $query = 'SELECT * FROM company where user_id in (select id from users where report_to = '.$this->session->userdata('user_id').')';   
                 }
                 $query = $query." ORDER BY company asc";
		$query = $this->db->query($query);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	
	function getFirstRecords($group)
	{
		$query = $this->db->query('SELECT * FROM clients WHERE group_id = ? LIMIT 1', $group);
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
	function getSelectedRecords($id)
	{
		$query = $this->db->query('SELECT * FROM clients WHERE id = ? LIMIT 1', $id);
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
	
	function getRecordByID($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('clients');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	
	function getGroupByRecordID($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('clients');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	
	function getNotesForClient($id = "1")
	{
		$this->db->where('clientid', $id);
		$query = $this->db->get('client_notes');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		if ($query->result() != NULL)
		{
			return $data;
		}
		else
		{
			return NULL;
		}
	}
	function create_client($data)
	{			
		$current_date = date("Y-m-d H:i:s");
		$error = "";
                
		// Input validation
		if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['first_name'])) { 
                        $error .= "First name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['last_name'])) { 
                        $error .= "Last name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['address_line_1'])) { 
                        $error .= "Address Line 1 name should be alpha numeric<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['suburb'])) { 
                        $error .= "Suburb name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['city'])) { 
                        $error .= "City name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['poaddress'])) { 
                        $error .= "Postal Address name should be alpha numeric<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['posuburb'])) { 
                        $error .= "Postal Suburb name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['pocity'])) { 
                        $error .= " Postal City name should be alphabetic<br />";
                }
		 if(!preg_match("/^[0-9+ ]+$/", $data['phone'])) { 
                        $error .= "Phone should be numeric<br />";
                }
                 if(!preg_match("/^[0-9+ ]+$/", $data['mobile'])) { 
                        $error .= "Mobile should be numeric<br />";
                }
                if(!preg_match("/^[0-9+ ]+$/", $data['bussphone'])) { 
                        $error .= "Bussiness Phone should be numeric<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
                
		if (!$error)
		{
			$new_user_insert_data = array(
					
					'first_name' => $data['first_name'],
					'last_name' => $data['last_name'],
					'email_address' => $data['email'],
					'title' => $data['title'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],	
                                        'po_address' => $data['poaddress'],
                                        'po_code' => $data['pocode'],
                                        'po_suburb' => $data['posuburb'],
                                        'po_city' => $data['pocity'],                                          
					'city' => $data['city'],
					'country' => $data['country'],
					'home_phone' =>$data['phone'],
					'mobile_phone' =>$data['mobile'],
					'business_phone' =>$data['bussphone'],	
					'website' => $data['website'],
					'created' =>  $current_date,
					'last_contacted' =>  $current_date,
					'group_id' => $data['group'],
					'image_url' => "none"
			);		
			
			$insert = $this->db->insert('clients', $new_user_insert_data); 
                        $lastid = $this->db->insert_id(); 
                        
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/clientmanagement/view_contact/'.$data['group'].'/'.$lastid,$data['first_name']." ".$data['last_name']),
                                        'type' => 'Contact'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return $lastid;
                      
		}
		else {
			return $error;
		}
	}
	function update_client($data) {
		$current_date = date("Y-m-d H:i:s");
		$error = "";
		if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['first_name'])) { 
                        $error .= "First name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['last_name'])) { 
                        $error .= "Last name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['address_line_1'])) { 
                        $error .= "Address Line 1 name should be alpha numeric<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['suburb'])) { 
                        $error .= "Suburb name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['city'])) { 
                        $error .= "City name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_, ]+$/", $data['poaddress'])) { 
                        $error .= "Postal Address name should be alpha numeric<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['posuburb'])) { 
                        $error .= "Postal Suburb name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z_ ]+$/", $data['pocity'])) { 
                        $error .= " Postal City name should be alphabetic<br />";
                }
		 if(!preg_match("/^[0-9+ ]+$/", $data['phone'])) { 
                        $error .= "Phone should be numeric<br />";
                }
                 if(!preg_match("/^[0-9+ ]+$/", $data['mobile'])) { 
                        $error .= "Mobile should be numeric<br />";
                }
                if(!preg_match("/^[0-9+ ]+$/", $data['bussphone'])) { 
                        $error .= "Bussiness Phone should be numeric<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
              
		if($error == "")
			{
				$datum = array(
					'first_name' => $data['first_name'],
					'last_name' => $data['last_name'],
					'email_address' => $data['email'],
					'title' => $data['title'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],
                                        'po_address' => $data['poaddress'],
                                        'po_code' => $data['pocode'],
                                        'po_suburb' => $data['posuburb'],
                                        'po_city' => $data['pocity'],
					'city' => $data['city'],
					'country' => $data['country'],
					'home_phone' =>$data['phone'],
					'mobile_phone' =>$data['mobile'],
					'business_phone' =>$data['bussphone'],	
					'website' => $data['website'],
					'created' =>  $current_date,
					'last_contacted' =>  $current_date,
					'group_id' => $data['group'],
					'image_url' => "none"
            );

				$this->db->where('id', $data['clientid']);
				$this->db->update('clients', $datum); 
                                
                                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/clientmanagement/view_contact/'.$data['group'].'/'.$data['clientid'],$data['first_name']." ".$data['last_name']),
                                        'type' => 'Contact'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
				return "Contact Updated";				
			} else {
				return $error;
			}
		
		
	}
        function deleteClient($clientid)
	{
                $this->db->where('id',$clientid);
                $query = $this->db->get('clients');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->first_name." ".$row->last_name;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Contact'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
		$this->db->delete('clients', array('id' => $clientid));
                
	}

}