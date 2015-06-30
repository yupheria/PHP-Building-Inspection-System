<?php

class Group_model extends CI_Model {
        function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
	function get_group_list() {
	$data = null;
        if($this->session->userdata('access_level') == 0) {
            $query = 'SELECT id,company FROM company';
        } else {
            $query = 'SELECT id,company FROM company where user_id ='.$this->session->userdata('user_id');
        }
        $query = $query.' ORDER BY company ASC';
	$query = $this->db->query($query);
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
        function getCompany_type(){
                $data = null;
                $query = $this->db->get('company_type');
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
	function getSelectedRecords($id)
	{
		$query = $this->db->query('SELECT * FROM company WHERE id = ?', $id);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	function getCompanyByName($company)
	{
		$query = $this->db->query('SELECT * FROM company WHERE company = ? LIMIT 1', $company);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	function create_group($data)
	{	
		
		$current_date = date("Y-m-d H:i:s");
		
				
		$error = "";
		
		// Input validation
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['company'])) { 
                        $error .= "Client name should be alphabetic<br />";
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
		if(!$this->companyIsUnique($data['company'])) {
                        $error .= "Company name should be unique<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
		if ($error == null)
		{
			$new_user_insert_data = array(
                                        'user_id' => $this->session->userdata('user_id'),
					'company' => $data['company'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],
                                            
                                        'po_address' => $data['poaddress'],
                                        'po_code' => $data['pocode'],
                                        'po_suburb' => $data['posuburb'],
                                        'po_city' => $data['pocity'],
                         
					'city' => $data['city'],
					'country' => $data['country'],
					'phone' =>$data['phone'],
					'email' => $data['email'],
					'website' => $data['website'],
					'date_created' => $current_date,
					'company_type' => $data['company_type']
			);		
			
			$insert = $this->db->insert('company', $new_user_insert_data);
                        
                        $lastid = $this->db->insert_id();
                        
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Add',
                                        'name' => anchor('index.php/clientmanagement/view_client/'.$lastid,$data['company']),
                                        'type' => 'Client'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
			return $lastid;
		}
		else {
			return $error;
		}
	}
        function deleteGroup($groupid) {
                $this->db->where('id',$groupid);
                $query = $this->db->get('company');
                $companyname = "";
		foreach ($query->result() as $row)
		{
			$companyname = $row->company;
		}
                
                $current_date = date("Y-m-d H:i:s");
                $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Deletion',
                                        'name' => $companyname,
                                        'type' => 'Client'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
           $this->db->delete('company', array('id' => $groupid));
        }
        function update_group($data) {
            $current_date = date("Y-m-d H:i:s");
		
				
		$error = "";
		
		// Input validation
		if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['company'])) { 
                        $error .= "Client name should be alphabetic<br />";
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
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
		if (!$error)
		{
			$update_data = array(
					'company' => $data['company'],
					'address_line_1' => $data['address_line_1'],
					'address_line_2' => $data['address_line_2'],			
					'suburb' => $data['suburb'],	
                            
                                        'po_address' => $data['poaddress'],
                                        'po_code' => $data['pocode'],
                                        'po_suburb' => $data['posuburb'],
                                        'po_city' => $data['pocity'],
                            
					'city' => $data['city'],
					'country' => $data['country'],
					'phone' =>$data['phone'],
					'email' => $data['email'],
					'website' => $data['website'],
					'date_created' => $current_date,
					'company_type' => $data['company_type']
			);		
			$this->db->where('id', $data['id']);
			$insert = $this->db->update('company', $update_data); 
                        
                        $notify_data = array(
                                        'timestamp' => $current_date,
                                        'user' => $this->session->userdata('display_name'),
                                        'action' => 'Update',
                                        'name' => anchor('index.php/clientmanagement/view_client/'.$data['id'],$data['company']),
                                        'type' => 'Client'
                        );
                        $insert = $this->db->insert('notifications', $notify_data);
                        
			return "Client Updated";
		}
		else {
			return $error;
		}
        }
        function companyIsUnique($company)
	{
		$this->db->where('company', $company);
		$query = $this->db->get('company');
		
		if($query->num_rows == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}