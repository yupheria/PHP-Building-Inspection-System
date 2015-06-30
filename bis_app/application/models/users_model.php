<?php
class Users_model extends CI_Model {

	function validate()
	{
                
		$this->db->where('user_login', $this->input->post('email'));
		$this->db->where('user_pass', md5($this->input->post('password')));
		$query = $this->db->get('wp_users');
		
		if($query->num_rows > 0)
		{
                        $row = $query->row(); 
                        $login_count = $row->login_times;
                        $login_count++;
                        $update_data = array('last_login'=>date('Y-m-d'),'login_times'=>$login_count);
                        $this->db->where('ID',$row->ID);
                        $this->db->update('wp_users',$update_data);
			return array('id'=>$row->ID,'user_login'=>$row->user_login);
		} else {
                        return false;
                }
	}
	
	function getAll()
	{
                $this->db = $this->load->database('default', true);
				$sql = "SELECT * FROM wp_usermeta JOIN wp_users ON wp_users.id = wp_usermeta.user_id where
				wp_usermeta.meta_key = 'bis_c_db' and 
				wp_usermeta.meta_value = '".$this->session->userdata('client_db')."'";
		$query = $this->db->query($sql);
	
		foreach ($query->result() as $row)
		{
			$row->user_url = $this->getAccessLvl($row->ID);
			$data[] = $row;
		}
		return $data;
	}
	function getAccessLvl($id)
	{	
		$this->db = $this->load->database('default', true);
		$sql = "select * from wp_usermeta where meta_key = 'bis_access_level' and user_id =".$id;
		$query = $this->db->query($sql);
		$access = 3;
		if($query->num_rows > 0)
		{
			$row = $query->row();
			$access = $row->meta_value;
		}
		return $access;
	}
	function getUserCount($db_client)
	{
                $this->db = $this->load->database('default', true);
                $data = null;
				$sql = "SELECT * FROM `wp_usermeta` WHERE meta_key = 'bis_c_db' and meta_value = '".$db_client."'";
				$query = $this->db->query($sql);
                //query = $this->db->get('users');
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return sizeof($data);
	}
	function create_user($data)
	{	
		
		$current_date = date("Y-m-d H:i:s");
		
				
		$error = "";
		
		// Input validation
		if ($data['user_pass'] != $data['password2'])
		{
			$error .= "Passwords don't match<br />";	
		}
                 if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['user_email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
                if(strlen($data['user_pass']) < 6) {
                        $error .= "Password should have more than 6 or more characters<br />";
                }  
                if(strlen($data['password2']) < 6) {
                        $error .= "Password2 should have more than 6 or more characters<br />";
                }
                if(strlen($data['user_login']) < 2) {
                        $error .= "Username should have more than 1 character<br />";
                }
                
		if (!$this->user_email_is_unique($data['user_email']))
		{
		
			$error .= "Email address is registered to another account<br />";
                }
		if (!$error)
		{
			$new_user_insert_data = array(
					'user_login' => $data['user_login'],
					'display_name' => $data['user_login'],
					'user_email' => $data['user_email'],			
					'user_pass' => md5($data['user_pass'])
			);	
			$this->db->insert('wp_users', $new_user_insert_data);
			$id = $this->db->insert_id();
			$second_data = array(
					'meta_key' =>'bis_report_to', 
					'meta_value' =>$data['bms'],
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
			$second_data = array(
					'meta_key' =>'bis_c_db', 
					'meta_value' =>$this->session->userdata('client_db'),
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
            $second_data = array(
					'meta_key' =>'bis_c_name', 
					'meta_value' =>$this->session->userdata('client_name'),
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);                        
            $second_data = array(
					'meta_key' =>'bis_m_user', 
					'meta_value' =>$this->session->userdata('max_users'),
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
			$second_data = array(
					'meta_key' =>'bis_m_build', 
					'meta_value' =>$this->session->userdata('max_buildings'),
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
			$second_data = array(
					'meta_key' =>'bis_c_license', 
					'meta_value' =>$this->session->userdata('client_license'),
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
			$second_data = array(
					'meta_key' =>'bis_access_level', 
					'meta_value' =>$data['bis_access_level'],
					'user_id' =>$id,
			);
			$inser2 = $this->db->insert('wp_usermeta',$second_data);
                        
			$this->load->model('email_model');
                        $message = "Congratulations! ".$data['user_login']."\n You are now a member of the BIS System";
						$message .= "\n Your username is: ".$data['user_login'];
						$message .= "\n Your password is: ".$data['user_pass'];
                        $this->email_model->sendEmailNotification($data['user_email'],$message);
                        return "Successfully created user";
		}
		else {
			return $error;
		}
	}
	
	function select_user_name_from_email($id)
	{
		
		//$this->db->where('user_id', $id);
		//$this->db->where('meta_key', 'bis_c_name');
		//$query = $this->db->get('wp_usermeta');
		
		$query = $this->db->query("select * from wp_usermeta where user_id =".$id." and meta_key = 'bis_c_name'");
		$bis_c_name = '';
		foreach($query->result() as $row){
			$bis_c_name = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_c_db');
		$query = $this->db->get('wp_usermeta');
		$bis_c_db = '';
		foreach($query->result() as $row){
			$bis_c_db = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_report_to');
		$query = $this->db->get('wp_usermeta');
		$bis_c_report_to = '';
		foreach($query->result() as $row){
			$bis_c_report_to = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_access_level');
		$query = $this->db->get('wp_usermeta');
		$bis_access_level = '';
		foreach($query->result() as $row){
			$bis_access_level = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_c_license');
		$query = $this->db->get('wp_usermeta');
		$bis_c_license = '';
		foreach($query->result() as $row){
			$bis_c_license = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_m_user');
		$query = $this->db->get('wp_usermeta');
		$bis_m_user = '';
		foreach($query->result() as $row){
			$bis_m_user = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$this->db->where('user_id', $id);
		$this->db->where('meta_key', 'bis_m_build');
		$query = $this->db->get('wp_usermeta');
		$bis_m_build = '';
		foreach($query->result() as $row){
			$bis_m_build = $row->meta_value;
		}
		//$this->db->flush_cache();
		
		$count = 0;
		$count = $this->getUserCount($bis_c_db);
		
		return array('access_level'=>$bis_access_level,
					'report_to'=>$bis_c_report_to,
					'client_db'=>$bis_c_db,
					'client_name'=>$bis_c_name,
					'client_license'=>$bis_c_license,
					'max_users'=>$bis_m_user,
					'max_buildings'=>$bis_m_build,
					'usercount'=>$count);
	}
	
	function select_user($id)
	{
                $this->db = $this->load->database('default', true);
		$query = $this->db->query("SELECT * FROM `wp_usermeta` JOIN wp_users ON wp_usermeta.user_id = wp_users.ID
									where
									wp_usermeta.user_id = ? and
									wp_usermeta.meta_key = '".'bis_report_to'."'", $id);
		foreach ($query->result() as $row)
		{
			$row->user_url = $this->getAccessLvl($row->ID);
			$data[] = $row;
		}
		if($query->result() != NULL) {
			return $data;
		}
		else {
			return NULL;
		}
	}
	
	function update_user($user_id, $data)
	{
             
                $error = "";
                if($data['user_pass'] != $data['password2']) {
                    $error .= "Passwords don't match<br />";
                }
                if(strlen($data['user_pass']) < 6) {
                        $error .= "Password should have more than 6 or more characters<br />";
                }  
                if(strlen($data['password2']) < 6) {
                        $error .= "Verify Password should have more than 6 or more characters<br />";
                }
                if(strlen($data['user_login']) < 2) {
                        $error .= "Username should have more than 1 character<br />";
                }
                //if(strlen($data['last_name']) < 2) {
                //        $error .= "Last Name should have more than 1 character<br />";
                //}
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['user_email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
		//$data['password'] = $data['password'];
                if ($error == "") {
                unset($data['password2']);
				
				$report_to = $data['report_to'];
				unset($data['report_to']);
				
				$bis_access_level = $data['bis_access_level'];
				unset($data['bis_access_level']);
				
				$this->db->where('id', $user_id);
				$data['user_pass'] = md5($data['user_pass']);
				$this->db->update('wp_users', $data);
                
				$this->db->where('user_id', $user_id);
				$this->db->where('meta_key', 'report_to');
				$second_data = array('meta_value' =>$report_to);
				$this->db->update('wp_usermeta',$second_data);
				
				$this->db->where('user_id', $user_id);
				$this->db->where('meta_key', 'bis_access_level');
				$second_data = array('meta_value' =>$bis_access_level);
				$this->db->update('wp_usermeta',$second_data);
					      
                //$this->load->model('Email_model');
                //$message = "Your password has been changed to: \r\n".$data['user_pass'];
                //$this->Email_model->sendEmailMessage($data['user_email'],$message);
                
                return "User Updated";                              
                
                } else {
                return $error;
                }
                
	}
	function dropbox_auth($data){
                $this->db->where('ID', $data['id']);
                $update_data = array('dropbox_user'=>$data['dropbox_user'],'dropbox_pass'=>$data['dropbox_pass']);
                $this->db->update('wp_users',$update_data);
                return "Dropbox Credentials Updated";
                //return print_r($data);
        }
        function skydrive_auth($data){
                $this->db->where('ID', $data['id']);
                $update_data = array('skydrive_user'=>$data['skydrive_user'],'skydrive_pass'=>$data['skydrive_pass']);
                $this->db->update('wp_users',$update_data);
                return "SkyDrive Credentials Updated";
                //return print_r($data);
        }
	function user_email_is_unique($user_email)
	{
		$this->db->where('user_email', $user_email);
		$query = $this->db->get('wp_users');
		
		if($query->num_rows == 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
        function checkEmail($user_email)
	{
		$this->db->where('user_email', $user_email);
		$query = $this->db->get('wp_users');
		//$this->db->count_all_results();
		if($query->num_rows == 1)
		{
			return true;
		}
		else
		{
			return false;
		}
               
	}
	
	function update_login_time($user_id, $logintime)
	{
		
		$sql = "UPDATE users SET last_login= ? WHERE id = ?";
		
		$this->db->query($sql, array($logintime, $user_id));
		
	}
	
	function generate_password_reset_link_hash($email)
	{
		$this->load->helper("authentication");
		$this->load->library('encrypt');
		
		$salt = unique_salt();
		
		if (!$this->insert_salt_into_db_for_user_with_email($email, $salt))
		{
			die("Error inserting salt into database for user with email address");
		}
		
		$hash = md5($salt.$email);
		
		return $hash;
		
	}
	
	function insert_salt_into_db_for_user_with_email($email, $salt)
	{
		$this->db->where('email_address', $email);
		$query = $this->db->get('users');
		
		if($query->num_rows == 1)
		{
			foreach  ($query->result() as $row)
			{
				$data['email_check_hash'] = $salt;
				
				$this->db->where('id', $row->id);
				$this->db->update('users', $data);
			}
		
			return true;
		}
		else 
		{
			return false;
		}
	}
	
	
	function check_password_reset_hash($email, $hash_to_check)
	{
		$this->load->library('encrypt');
		
		$query = $this->db->get('users');
	}
        function deleteUser($userid)
	{
		$this->db->delete('wp_users', array('ID' => $userid));
                $this->db->delete('wp_usermeta', array('user_id' => $userid));
                
	}
        function generateRandomString( )
        {
           $character_set_array = array( );
           $character_set_array[ ] = array( 'count' => 7, 'characters' => 'abcdefghijklmnopqrstuvwxyz' );
           $character_set_array[ ] = array( 'count' => 1, 'characters' => '0123456789' );
           $temp_array = array( );
            foreach ( $character_set_array as $character_set )
            {
                 for ( $i = 0; $i < $character_set[ 'count' ]; $i++ )
                    {
                 $temp_array[ ] = $character_set[ 'characters' ][ rand( 0, strlen( $character_set[ 'characters' ] ) - 1 ) ];
                     }
             }
         shuffle( $temp_array );
         return implode( '', $temp_array );
        }
        function updatePassword($email_address) {
            $data['password'] = $this->generateRandomString();
            $this->db->where('email_address', $email_address);
	    $this->db->update('users', $data);
            
            return $data['password'];
        }
        function add_activity($data) {
            $error = "";
            if(!preg_match("/^[A-Za-z0-9$:\-_@(). ]+$/", $data['act_name'])) { 
                        $error .= "Event name should be alpha numeric<br />";
                }
            $this->db = $this->load->database($this->session->userdata('client_db'), true);
            $data['inputDate'] = date("Y-m-d",strtotime($data['inputDate']));
            if($error == "") {
                $input_data = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'name' => $data['act_name'],
                    'client' => $data['client'],
                    'building' => $data['building'],
                    'activities' => $data['act_des'],
                    'date' => $data['inputDate'],
                    'purpose' => $data['purpose']
                );
                $this->db->insert('user_notes', $input_data);
                $lastid = $this->db->insert_id();
                return $lastid;
                //return print_r($input_data);
            } else {
                return $error;
            }
        }
        function edit_activity($data) {
            $this->db = $this->load->database($this->session->userdata('client_db'), true);
            $error = "";
            if(!preg_match("/^[A-Za-z0-9$:\-_@(). ]+$/", $data['act_name'])) { 
                        $error .= "Event name should be alpha numeric<br />";
                }
            $data['inputDate'] = date("Y-m-d",strtotime($data['inputDate']));
            if($error == "") {
                $input_data = array(
                    //'user_id' => $this->session->userdata('user_id'),
                    'name' => $data['act_name'],
                    'client' => $data['client'],
                    'building' => $data['building'],
                    'activities' => $data['act_des'],
                    'date' => $data['inputDate'],
                    'purpose' => $data['purpose']
                );
                $this->db->where('id',$data['id']);
                $this->db->update('user_notes', $input_data);
                //$lastid = $this->db->insert_id();
                return $data['id'];
                //return print_r($input_data);
            } else {
                return $error;
            }
        }
        function delete_activity($id)
	{
                $this->db = $this->load->database($this->session->userdata('client_db'), true);
		$this->db->delete('user_notes', array('id' => $id));
	}
        function get_activity($id) {
            $this->db = $this->load->database($this->session->userdata('client_db'), true);
            $data = null;
		$query = $this->db->query('SELECT * FROM user_notes WHERE id = ?',$id);
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
        function getActivitesByMonth($month,$year)
	{
                $this->db = $this->load->database($this->session->userdata('client_db'), true);
                $data = null;
		
                if($this->session->userdata('access_level')=='0' || $this->session->userdata('access_level')=='3') {
                    $query = $this->db->query('select * from user_notes where month(date) = ? and year(date) = ? order by date asc',array($month,$year));
                } else {
                     $query = $this->db->query('select * from user_notes where user_id = ? and month(date) = ? and year(date) = ? order by date asc',array($this->session->userdata('user_id'),$month,$year));
                }
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
        function getAllBMs() {
                $data = null;
				$sql = "SELECT * FROM wp_usermeta JOIN wp_users ON wp_users.id = wp_usermeta.user_id where
				wp_usermeta.meta_key = 'bis_c_db' and 
				wp_usermeta.meta_value = '".$this->session->userdata('client_db')."'";
                $query = $this->db->query($sql);
		foreach ($query->result() as $row)
		{
			if($this->getAccessLvl($row->ID)==0){
			$data[] = $row;
			}
		}
		return $data;
        }
        function showNotifications(){
                $this->db = $this->load->database($this->session->userdata('client_db'), true);
                $data = null;
                $query = $this->db->query('SELECT * FROM notifications order by timestamp desc');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
        }
       function plum_reg($data)
	{	
		
		$current_date = date("Y-m-d H:i:s");
				
		$error = "";
		
		$this->db->where('meta_key',$data['company']);
		$query = $this->db->get('wp_usermeta');
		if($query->num_rows > 0) {
			$error .= "Company Name has already been registered<br />";
		}
		if(strlen($data['company']) < 3) {
                        $error .= "Company Name should have more than 2 or more characters<br />";
                }
                if(strlen($data['client_name']) < 2) {
                        $error .= "Name should have more than 1 or more characters<br />";
                }
                if(!preg_match("/^[0-9+ ]+$/", $data['phone_number'])) { 
                        $error .= "Phone Number should be numeric<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['client_name'])) { 
                        $error .= "Name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['username'])) { 
                        $error .= "Username should be alphabetic<br />";
                }
                 if(strlen($data['username']) < 4) {
                        $error .= "Username should have more than 3 or more characters<br />";
                }
                if(strlen($data['user_password']) < 8) {
                        $error .= "Password should have more than 7 or more characters<br />";
                }
                if($data['user_password'] != $data['user_password1']) {
                        $error .= "Password does not match<br />";
                }
               if($data['license'] == "0") {
                        $error .= "Please agree to the terms and conditions<br />";
                }
		if (!$error)
		{
                        $new_data = array('user_email'=>$data['email'],
                                           'display_name'=>$data['client_name'],
                                           'user_login'=>$data['username'],
                                           'user_pass'=>md5($data['user_password']),
                                           'user_registered'=>$current_date,
                                           'last_login'=>date("Y-m-d"));
                        $this->db->insert('wp_users',$new_data);
                        $id = $this->db->insert_id();
                        
                        $clientdb = preg_replace('/\s+/', '',$data['company']);
                        $clientdb = trim($clientdb);
						
						//insert 4 rows into wp_usermeta table
						$second_data = array(
								'meta_key' =>'bis_report_to', 
								'meta_value' =>0,
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'bis_c_db', 
								'meta_value' =>$clientdb,
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'bis_c_name', 
								'meta_value' =>$data['company'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);                        
						$second_data = array(
								'meta_key' =>'bis_m_user', 
								'meta_value' =>1,
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'bis_m_build', 
								'meta_value' =>1,
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'bis_c_license', 
								'meta_value' =>date("Y-m-d",strtotime("+30 days")),
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'bis_access_level', 
								'meta_value' =>0,
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'company', 
								'meta_value' =>$data['company'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'phone_number', 
								'meta_value' =>$data['phone_number'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'nickname', 
								'meta_value' =>$data['client_name'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
			
			
			$message = 'Registration Success';
                        $message1 = "";
                         //$message = "Congratulations!".$data['first_name']." ".$data['last_name']." You are now a member of the BIS System";
                        //if($this->email_model->sendEmailNotification($data['email_address'],$message)) {
                        $this->load->dbforge();
                        if ($this->dbforge->create_database($clientdb))
                        {}
                        $this->db->query("  CREATE  TABLE  `".$clientdb."`.`buildings` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `buildingname` varchar( 255  )  NOT  NULL ,
                             `address_line_1` varchar( 255  )  NOT  NULL ,
                             `clientid` int( 11  )  NOT  NULL ,
                             `contact_type` int( 11  )  NOT  NULL ,
                             `site` int( 11  )  NOT  NULL ,
                             `description` varchar( 255  )  NOT  NULL ,
                             `address_line_2` varchar( 255  )  NOT  NULL ,
                             `suburb` varchar( 255  )  NOT  NULL ,
                             `city` varchar( 255  )  NOT  NULL ,
                             `country` int( 11  )  NOT  NULL ,
                             `levels_above` int( 11  )  NOT  NULL ,
                             `levels_below` int( 11  )  NOT  NULL ,
                             `month_contructed` int( 11  )  NOT  NULL ,
                             `year_constructed` int( 11  )  NOT  NULL ,
                             `map` varchar( 500  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =28;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`buildings_contact_types` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `type` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =6;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`building_areas` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `buildingid` int( 11  )  NOT  NULL ,
                             `area_level` int( 11  )  NOT  NULL ,
                             `above` int( 11  )  NOT  NULL ,
                             `room_number` varchar( 255  )  NOT  NULL ,
                             `area_name` varchar( 255  )  NOT  NULL ,
                             `description` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =62;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`bwof` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `issue_date` date NOT  NULL ,
                             `expiry_date` date NOT  NULL ,
                             `company_id` int( 11  )  NOT  NULL ,
                             `site_id` int( 11  )  NOT  NULL ,
                             `building_id` int( 11  )  NOT  NULL ,
                             `user_id` int( 11  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =22;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`clients` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `first_name` varchar( 255  )  NOT  NULL ,
                             `last_name` varchar( 255  )  NOT  NULL ,
                             `email_address` varchar( 255  )  NOT  NULL ,
                             `title` int( 32  )  NOT  NULL ,
                             `address_line_1` varchar( 255  )  NOT  NULL ,
                             `address_line_2` varchar( 255  )  NOT  NULL ,
                             `suburb` varchar( 255  )  NOT  NULL ,
                             `po_address` varchar( 255  )  NOT  NULL ,
                             `po_code` int( 11  )  NOT  NULL ,
                             `po_suburb` varchar( 255  )  NOT  NULL ,
                             `po_city` varchar( 255  )  NOT  NULL ,
                             `city` varchar( 255  )  NOT  NULL ,
                             `country` int( 255  )  NOT  NULL ,
                             `home_phone` varchar( 255  )  NOT  NULL ,
                             `mobile_phone` varchar( 255  )  NOT  NULL ,
                             `business_phone` varchar( 255  )  NOT  NULL ,
                             `website` varchar( 255  )  NOT  NULL ,
                             `created` datetime NOT  NULL ,
                             `last_contacted` datetime  DEFAULT NULL ,
                             `group_id` int( 11  )  NOT  NULL ,
                             `image_url` varchar( 255  )  DEFAULT NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =37;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`client_notes` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `clientid` int( 11  )  NOT  NULL ,
                             `userid` int( 11  )  NOT  NULL ,
                             `created` timestamp NOT  NULL  DEFAULT CURRENT_TIMESTAMP ,
                             `title` text NOT  NULL ,
                             `note` text NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =2;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`client_tags` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `name` varchar( 255  )  NOT  NULL ,
                             `contents` text NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =4;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`company` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `user_id` int( 11  )  NOT  NULL ,
                             `company` varchar( 255  )  NOT  NULL ,
                             `address_line_1` varchar( 255  )  NOT  NULL ,
                             `address_line_2` varchar( 255  )  NOT  NULL ,
                             `suburb` varchar( 255  )  NOT  NULL ,
                             `po_address` varchar( 255  )  NOT  NULL ,
                             `po_code` int( 11  )  NOT  NULL ,
                             `po_suburb` varchar( 255  )  NOT  NULL ,
                             `po_city` varchar( 255  )  NOT  NULL ,
                             `city` varchar( 255  )  NOT  NULL ,
                             `country` varchar( 255  )  NOT  NULL ,
                             `phone` varchar( 255  )  NOT  NULL ,
                             `email` varchar( 255  )  NOT  NULL ,
                             `website` varchar( 255  )  NOT  NULL ,
                             `date_created` datetime NOT  NULL ,
                             `company_type` int( 11  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =36;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`company_type` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `company_type` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =6;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`countries` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `name` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =163;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`countries_copy` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `name` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =253;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`hazards` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `name` varchar( 255  )  NOT  NULL ,
                             `date` date NOT  NULL ,
                             `area` int( 11  )  NOT  NULL ,
                             `level` int( 11  )  NOT  NULL ,
                             `status` int( 11  )  NOT  NULL ,
                             `description` varchar( 255  )  NOT  NULL ,
                             `solution` varchar( 255  )  NOT  NULL ,
                             `img` varchar( 500  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =47;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`hazard_levels` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `levels` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =4;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`hazard_status` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `status` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =4;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`inspections` (  `userid` int( 11  )  NOT  NULL ,
                             `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `date` date NOT  NULL ,
                             `buildingid` int( 11  )  NOT  NULL ,
                             `status` int( 11  )  NOT  NULL ,
                             `companyid` int( 11  )  NOT  NULL ,
                             `siteid` int( 11  )  NOT  NULL ,
                             `wof_given` int( 11  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =24;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`months` (  `id` int( 11  )  NOT  NULL ,
                             `month` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`report_type` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `report` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =3;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`sites` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `user_id` int( 11  )  NOT  NULL ,
                             `sitename` varchar( 255  )  NOT  NULL ,
                             `address_line_1` varchar( 255  )  NOT  NULL ,
                             `address_line_2` varchar( 255  )  NOT  NULL ,
                             `suburb` varchar( 255  )  NOT  NULL ,
                             `city` varchar( 255  )  NOT  NULL ,
                             `country` int( 11  )  NOT  NULL ,
                             `company` int( 11  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =15;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`title` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `title` varchar( 255  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  =  MyISAM  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =5;");
                        $this->db->query("CREATE  TABLE  `".$clientdb."`.`user_notes` (  `id` int( 11  )  NOT  NULL  AUTO_INCREMENT ,
                             `name` varchar( 255  )  NOT  NULL ,
                             `user_id` int( 11  )  NOT  NULL ,
                             `activities` varchar( 255  )  NOT  NULL ,
                             `client` int( 11  )  NOT  NULL ,
                             `building` int( 11  )  NOT  NULL ,
                             `date` date NOT  NULL ,
                             `purpose` int( 11  )  NOT  NULL ,
                             PRIMARY  KEY (  `id`  )  ) ENGINE  = InnoDB  DEFAULT CHARSET  = latin1 AUTO_INCREMENT  =36;");
                        
                        $this->db->query("INSERT INTO  `".$clientdb."`.`company_type` 
                                SELECT * 
                                FROM  `cpc`.`company_type` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`countries` 
                                SELECT * 
                                FROM  `cpc`.`countries` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`title` 
                                SELECT * 
                                FROM  `cpc`.`title` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`hazard_levels` 
                                SELECT * 
                                FROM  `cpc`.`hazard_levels` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`hazard_status` 
                                SELECT * 
                                FROM  `cpc`.`hazard_status` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`months` 
                                SELECT * 
                                FROM  `cpc`.`months` ;");
                        $this->db->query("INSERT INTO  `".$clientdb."`.`report_type` 
                                SELECT * 
                                FROM  `cpc`.`report_type` ;");
                        
                        $this->db->query("ALTER TABLE  `".$clientdb."`.`buildings` ADD  `user_id` INT( 4 ) NOT NULL DEFAULT  '6'");
						$this->db->query("CREATE TABLE  `".$clientdb."`.`notifications` (
										`id` INT( 7 ) NOT NULL AUTO_INCREMENT ,
										 `timestamp` DATETIME NOT NULL ,
										 `user` VARCHAR( 25 ) NOT NULL ,
										 `action` VARCHAR( 25 ) NOT NULL ,
										 `name` VARCHAR( 255 ) NOT NULL ,
										 `type` VARCHAR( 25 ) NOT NULL ,
										PRIMARY KEY (  `id` )
										) ENGINE = MYISAM DEFAULT CHARSET = utf8;");
                        
			$message = "\nDear ".$data['client_name'];
                        $message .= "\n";
                        $message .= "\nWelcome to BIS!";
                        $message .= "\n";
                        $message .= "\nYou now have the opportunity to trial BIS on one real client with one building for 30 days.";
                        $message .= "\n";
                        $message .= "\nUsing your username ".$data['username']." and password ".$data['user_password']." you selected when registering, log in to BIS by following the link.";
                        $message .= "\n";
                        $message .= "\nhttp://bis.capitalplanning.co.nz";
                        $message .= "\n";
                        $message .= "\nGetting Started With BIS";
                        $message .= "\n1. Enter your client details";
                        $message .= "\n\tClick the client management tab";
                        $message .= "\n\tClick Add.";
                        $message .= "\n\tEnter your client details and Save";
                        $message .= "\n\t";
                        
                        $message .= "\n2. Add the building you wish to inspect"; 
                        $message .= "\n\tClick the building management tab";
                        $message .= "\n\tSelect the client in selection panel";
                        $message .= "\n\tClick add in site";
                        $message .= "\n\tOptions in the actions panel.";
                        $message .= "\n\tEnter the site details in add site and save";
                        $message .= "\n\t";
                        $message .= "\n\tYou are now ready to repeat the setting up process to add a building and enter the details for each levels and any areas on these levels.";
                        $message .= "\n\tOnce you have done so you are now ready to do a building inspection.";
                        $message .= "\n\t";
                        
                        $message .= "\n3. Trial an inspection";
                        $message .= "\n\tClick the Building Inspection Tab";
                        $message .= "\n\tSelect your client, the site and the building";
                        $message .= "\n\tDo an inspection.";
                        $message .= "\n\t";
                        
                        $message .= "\n4. Instantly produce a report while on location";
                        $message .= "\n";
                        $message .= "\n5. Check out the activities function for future events.";
                        $message .= "\n\tClick the view reports tab";
                        $message .= "\n\tSelect client, site, yout building and repot type.";
                        
                        $message .= "\n";
                        $message .= "\n* Click help for instruction assistance.";
                        $message .= "\n\tThe complete user guilde explains all the functions and how to operate BIS. Click the ? icon on the top right.";
                        
                        $message .= "\n";
                        $message .= "\nRemember to keep your username and password safe.";
                        $message .= "\n";
                        $message .= "\nPrint this email for reference.";
                        $message .= "\n";
                        $message .= "\nTell us what you think: Contact us if you have any questions about BIS We're here to help and we love feedback!";
                        $message .= "\n";
                        $message .= "\nKind regards,";
                        $message .= "\n";
                        $message .= "\nThe Team at Capital Planning";
                        
                        $this->load->library('email');  
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to($data['email']);  
                        $this->email->subject('BIS Registration');  
                        $this->email->message($message);  
                        $this->email->send();
                        
                        $admin_message = "\nA new user for BIS has been registered:";
                        $admin_message .= "\n";
                        $admin_message .= "\nName:     ".$data['client_name'];
                        $admin_message .= "\nUsername: ".$data['username'];
                        $admin_message .= "\nEmail:    ".$data['email'];
                        $admin_message .= "\nCompany:  ".$data['company'];
                        $admin_message .= "\nPhone     ".$data['phone_number'];
                        $admin_message .= "\n";
                        $admin_message .= "\nCapital Planning Team";
                        
                        $this->email->clear();
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to('bjoern@capitalplanning.co.nz');  
                        $this->email->subject('New User for BIS Registration');  
                        $this->email->message($admin_message);  
                        $this->email->send();
                       return "Registration Successfull";                
		}
		else {
			return $error;
		}
	}
        function target_reg($data){
            $current_date = date("Y-m-d H:i:s");
				
		$error = "";
		
		$this->db->where('meta_key',$data['company']);
		$query = $this->db->get('wp_usermeta');
		if($query->num_rows > 0) {
			$error .= "Company Name has already been registered<br />";
		}
		if(strlen($data['company']) < 3) {
                        $error .= "Company Name should have more than 2 or more characters<br />";
                }
                if(strlen($data['client_name']) < 2) {
                        $error .= "Name should have more than 1 or more characters<br />";
                }
                if(!preg_match("/^[0-9+ ]+$/", $data['phone_number'])) { 
                        $error .= "Phone Number should be numeric<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['client_name'])) { 
                        $error .= "Name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['username'])) { 
                        $error .= "Username should be alphabetic<br />";
                }
                 if(strlen($data['username']) < 4) {
                        $error .= "Username should have more than 3 or more characters<br />";
                }
                if(strlen($data['user_password']) < 8) {
                        $error .= "Password should have more than 7 or more characters<br />";
                }
                if($data['user_password'] != $data['user_password1']) {
                        $error .= "Password does not match<br />";
                }
               if($data['license'] == "0") {
                        $error .= "Please agree to the terms and conditions<br />";
                }
		if (!$error)
		{
                        $new_data = array('user_email'=>$data['email'],
                                           'display_name'=>$data['client_name'],
                                           'user_login'=>$data['username'],
                                           'user_pass'=>md5($data['user_password']),
                                           'user_registered'=>$current_date);
                        $this->db->insert('wp_users',$new_data);
                        $id = $this->db->insert_id();
                                                $second_data = array(
								'meta_key' =>'company', 
								'meta_value' =>$data['company'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'phone_number', 
								'meta_value' =>$data['phone_number'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'wp_capabilities', 
								'meta_value' =>'a:1:{s:6:"policy";s:1:"1";}',
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'target_license', 
								'meta_value' =>date("Y-m-d",strtotime("+30 days")),
								'user_id' =>$id,
						);
                                                $inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'nickname', 
								'meta_value' =>$data['client_name'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                
                                                $target_db = preg_replace('/\s+/', '',$data['client_name']);
                                                $second_data = array(
								'meta_key' =>'target_db', 
								'meta_value' =>$target_db,
								'user_id' =>$id,
						);
                                                $inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                
                                                $this->load->dbforge();
                                                if ($this->dbforge->create_database($target_db))
                                                {}
                                                
                                                $this->db->query("create table ".$target_db.".wp_clients like wp_storecrm.wp_clients");
                                                $this->db->query("insert ".$target_db.".wp_clients select * from wp_storecrm.wp_clients");
                                                
                                                $this->db->query("create table ".$target_db.".wp_policies like wp_storecrm.wp_policies");
                                                $this->db->query("insert ".$target_db.".wp_policies select * from wp_storecrm.wp_policies");
                                                
                                                $this->db->query("create table ".$target_db.".wp_target_notes like wp_storecrm.wp_target_notes");
                                                $this->db->query("insert ".$target_db.".wp_target_notes select * from wp_storecrm.wp_target_notes");
                                                
                        $message = "Dear ".$data['client_name'];
                        $message .= "\n";
                        $message .= "\nWelcome to Target Marketing Insure";
                        $message .= "\n";
                        $message .= "\nYou now have the opportunity to trial Target Marketing on our demo list and real clients for 30 days.";
                        $message .= "\n";
                        $message .= "\nUsing your username ".$data['username']." and password ".$data['user_password']." you selected when registering, log in to Target Marketing by following the link.";
                        $message .= "\n";
                        $message .= "\nhttp://capitalplanning.co.nz/wp-login.php";
                        $message .= "\n";
                        $message .= "\nGetting Started With Target Marketing";
                        $message .= "\n";
                        $message .= "\n1. Enter a client details";
                        $message .= "\n2. Add a Product you wish to that Client";
                        $message .= "\n3. Use the filtering and selection functions";
                        $message .= "\n4. Instantly produce a report while on location";
                        $message .= "\n";
                        $message .= "\n* Check out the activities function for future events.";
                        $message .= "\n";
                        $message .= "\n* Click help for instruction assistance.";
                        $message .= "\n";
                        $message .= "\nRemember to keep your username and password safe.";
                        $message .= "\n";
                        $message .= "\nTell us what you think: Contact us if you have any questions about Target Marketing - We're here to help and we love feedback!";
                        $message .= "\n";
                        $message .= "\nKind regards,";
                        $message .= "\n";
                        $message .= "\nThe Team at Capital Planning";                        
                                                
                        $this->load->library('email');  
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to($data['email']);  
                        $this->email->subject('Target Registration Insure');  
                        $this->email->message($message);  
                        $this->email->send();
                        
                        $admin_message = "\nA new user for Target Marketing Insure has been registered:";
                        $admin_message .= "\n";
                        $admin_message .= "\nName:     ".$data['client_name'];
                        $admin_message .= "\nUsername: ".$data['username'];
                        $admin_message .= "\nEmail:    ".$data['email'];
                        $admin_message .= "\nCompany:  ".$data['company'];
                        $admin_message .= "\nPhone     ".$data['phone_number'];
                        $admin_message .= "\n";
                        $admin_message .= "\nCapital Planning Team";
                        
                        $this->email->clear();
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to('selwyn@capitalplanning.co.nz');  
                        $this->email->subject('New User for Target Insure Registration');  
                        $this->email->message($admin_message);  
                        $this->email->send();
                    echo "Registration Successfull";
                } else {
                    echo $error;
                }
                
        }
        function target_reg_buss($data){
            $current_date = date("Y-m-d H:i:s");
				
		$error = "";
		
		$this->db->where('meta_key',$data['company']);
		$query = $this->db->get('wp_usermeta');
		if($query->num_rows > 0) {
			$error .= "Company Name has already been registered<br />";
		}
		if(strlen($data['company']) < 3) {
                        $error .= "Company Name should have more than 2 or more characters<br />";
                }
                if(strlen($data['client_name']) < 2) {
                        $error .= "Name should have more than 1 or more characters<br />";
                }
                if(!preg_match("/^[0-9+ ]+$/", $data['phone_number'])) { 
                        $error .= "Phone Number should be numeric<br />";
                }
                if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $data['email'])) { 
                        $error .= "Invalid Email Address<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['client_name'])) { 
                        $error .= "Name should be alphabetic<br />";
                }
                if(!preg_match("/^[A-Za-z0-9_ ]+$/", $data['username'])) { 
                        $error .= "Username should be alphabetic<br />";
                }
                 if(strlen($data['username']) < 4) {
                        $error .= "Username should have more than 3 or more characters<br />";
                }
                if(strlen($data['user_password']) < 8) {
                        $error .= "Password should have more than 7 or more characters<br />";
                }
                if($data['user_password'] != $data['user_password1']) {
                        $error .= "Password does not match<br />";
                }
               if($data['license'] == "0") {
                        $error .= "Please agree to the terms and conditions<br />";
                }
		if (!$error)
		{
                        $new_data = array('user_email'=>$data['email'],
                                           'display_name'=>$data['client_name'],
                                           'user_login'=>$data['username'],
                                           'user_pass'=>md5($data['user_password']),
                                           'user_registered'=>$current_date);
                        $this->db->insert('wp_users',$new_data);
                        $id = $this->db->insert_id();
                                                $second_data = array(
								'meta_key' =>'company', 
								'meta_value' =>$data['company'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'phone_number', 
								'meta_value' =>$data['phone_number'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'wp_capabilities', 
								'meta_value' =>'a:1:{s:8:"business";s:1:"1";}',
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
						$second_data = array(
								'meta_key' =>'target_license_buss', 
								'meta_value' =>date("Y-m-d",strtotime("+30 days")),
								'user_id' =>$id,
						);
                                                $inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                $second_data = array(
								'meta_key' =>'nickname', 
								'meta_value' =>$data['client_name'],
								'user_id' =>$id,
						);
						$inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                
                                                $target_db = preg_replace('/\s+/', '',$data['client_name']);
                                                $second_data = array(
								'meta_key' =>'target_db_buss', 
								'meta_value' =>$target_db,
								'user_id' =>$id,
						);
                                                $inser2 = $this->db->insert('wp_usermeta',$second_data);
                                                
                                                $this->load->dbforge();
                                                if ($this->dbforge->create_database($target_db))
                                                {}
                                                
                                                $this->db->query("create table ".$target_db.".wp_clients like wp_storecrm.wp_clients");
                                                $this->db->query("insert ".$target_db.".wp_clients select * from wp_storecrm.wp_clients");
                                                
                                                $this->db->query("create table ".$target_db.".wp_policies like wp_storecrm.wp_policies");
                                                $this->db->query("insert ".$target_db.".wp_policies select * from wp_storecrm.wp_policies");
                                                
                                                $this->db->query("create table ".$target_db.".wp_target_notes like wp_storecrm.wp_target_notes");
                                                $this->db->query("insert ".$target_db.".wp_target_notes select * from wp_storecrm.wp_target_notes");
                                                
                                                $this->db->query("create table ".$target_db.".wp_suppliers like wp_storecrm.wp_suppliers");
                                                $this->db->query("insert ".$target_db.".wp_suppliers select * from wp_storecrm.wp_suppliers");
                                                
                                                $this->db->query("update ".$target_db.".wp_policies set type = 1");
                                                
                        $message = "Dear ".$data['client_name'];
                        $message .= "\n";
                        $message .= "\nWelcome to Target Marketing Business";
                        $message .= "\n";
                        $message .= "\nYou now have the opportunity to trial Target Marketing on our demo list and real clients for 30 days.";
                        $message .= "\n";
                        $message .= "\nUsing your username ".$data['username']." and password ".$data['user_password']." you selected when registering, log in to Target Marketing by following the link.";
                        $message .= "\n";
                        $message .= "\nhttp://capitalplanning.co.nz/wp-login.php";
                        $message .= "\n";
                        $message .= "\nGetting Started With Target Marketing";
                        $message .= "\n";
                        $message .= "\n1. Enter a client details";
                        $message .= "\n2. Add a Product you wish to that Client";
                        $message .= "\n3. Use the filtering and selection functions";
                        $message .= "\n4. Instantly produce a report while on location";
                        $message .= "\n";
                        $message .= "\n* Check out the activities function for future events.";
                        $message .= "\n";
                        $message .= "\n* Click help for instruction assistance.";
                        $message .= "\n";
                        $message .= "\nRemember to keep your username and password safe.";
                        $message .= "\n";
                        $message .= "\nTell us what you think: Contact us if you have any questions about Target Marketing - We're here to help and we love feedback!";
                        $message .= "\n";
                        $message .= "\nKind regards,";
                        $message .= "\n";
                        $message .= "\nThe Team at Capital Planning";                        
                                                
                        $this->load->library('email');  
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to($data['email']);  
                        $this->email->subject('Target Business Registration');  
                        $this->email->message($message);  
                        $this->email->send();
                        
                        $admin_message = "\nA new user for Target Marketing Business has been registered:";
                        $admin_message .= "\n";
                        $admin_message .= "\nName:     ".$data['client_name'];
                        $admin_message .= "\nUsername: ".$data['username'];
                        $admin_message .= "\nEmail:    ".$data['email'];
                        $admin_message .= "\nCompany:  ".$data['company'];
                        $admin_message .= "\nPhone     ".$data['phone_number'];
                        $admin_message .= "\n";
                        $admin_message .= "\nCapital Planning Team";
                        
                        $this->email->clear();
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Capital Planning Team');  
                        $this->email->to('selwyn@capitalplanning.co.nz');  
                        $this->email->subject('New User for Target Business Registration');  
                        $this->email->message($admin_message);  
                        $this->email->send();
                    echo "Registration Successfull";
                } else {
                    echo $error;
                }
                
        }
}