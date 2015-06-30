<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index($message = "", $message_type = "")
	{
                
		$data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'login_form';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Log in";
		$data['body_class'] = "login_page";
		$this->load->view('template', $data);
	}
	
	function password_reset($message = "", $message_type = "")
	{
		$data['load_header'] = false;
		$data['load_footer'] = false;
		$data['main_content'] = 'password_reset';
		$data['message'] = $message;
		$data['message_type'] = $message_type;
		$data['page_title'] = "Password reset in";
		$data['body_class'] = "login_page";
		
		if($this->uri->segment(3) != "")
		{
			$data['hash'] = $this->uri->segment(3);
		}
		else
		{
			$data['main_content'] = 'password_reset_manual';
		}
		
		$this->load->view('template', $data);
	}
	
	function validate_credentials()
	{
		$this->load->model('users_model');
		$query = $this->users_model->validate();
		//echo print_r($query);
		if($query) {
		$user_name = $this->users_model->select_user_name_from_email($query['id']);
		//$userCount = $this->users_model->getUserCount($user_name->client_db);
        //echo print_r($user_name);        
                $today = strtotime(date("Y-m-d"));
                $expiration_date = strtotime($user_name['client_license']);
		}
		if($query != false && $expiration_date > $today) // if the user's credentials validated...
		{
			
			
			$data = array(
				'email' => $this->input->post('email'),
				'is_logged_in' => true,
				'user_login' => $query['user_login'],
				'user_id' => $query['id'],
				'access_level' => $user_name['access_level'],
                                'report_to' => $user_name['report_to'],
                                'client_db' => $user_name['client_db'],
                                'client_name' => $user_name['client_name'],
                                'client_license' => $user_name['client_license'],
                                'userscount' => $user_name['usercount'],
                                'max_users' => $user_name['max_users'],
                                'max_buildings' => $user_name['max_buildings']
			);
			$this->session->set_userdata($data);
			
			//$date = date("Y-m-d H:i:s");
			
			//$this->users_model->update_login_time($user_name->id, $date);
			
                        
			//echo "correct";
                        //$config['database'] = $user_name->client_db;
                        //$this->load->database($config);
                        $this->db = $this->load->database($user_name['client_db'], true);
                        //$this->config->item('active_group') = $user_name->client_db;
                        
			echo $user_name['access_level'];  
                        //echo $this->db->active_group;
		}
		else // incorrect username or password
		{
			if($query == false) {
                        echo "Invalid Username or Password";
						return "Invalid Username or Password";
                        } else {
                        echo "Your License has expired, please renew your license";
                        return "Your License has expired, please renew your license";
                        }
		}
	}
	
	function retrieve_password()
	{		
		
		$email_address = $this->input->post('email');
		$this->load->model('users_model');
		if($this->users_model->checkEmail($email_address)) 																		// it's also not in the database
		{
                        $newpassword = $this->users_model->updatePassword($email_address);
                        $this->load->library('email');  
                        $this->email->from('Bjoern@capitalplanning.co.nz', 'Bjorn');  
                        $this->email->to($email_address);  
                        $this->email->subject('BIS Password Reset');  
                        $this->email->message("Your new password is: \r\n".$newpassword);  
                        $this->email->send();   
                        echo "Email Sent!";
		} else {
                        echo "Email address not in database";                   
                }
                 
	}
        
	function not_logged_in()
	{
		//$data['load_header'] = false;
		//$data['load_footer'] = false;
		//$data['main_content'] = 'login_form';
		//$data['message'] = 'You must be logged in to access this page.';
		//$data['message_type'] = 'error';
		//$data['page_title'] = "Log in";
		//$data['body_class'] = "login_page";
		//$this->load->view('template', $data);
                //$this->index("Please log in", "error");
                redirect(base_url().'index.php/login', 'refresh');             
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->index("Successfully logged out", "success");
	}
        function register() {
                $data['client_name'] = $this->input->post('client_name');
		$data['email'] = $this->input->post('email');
                $data['company'] = $this->input->post('company');
                $data['phone_number'] = $this->input->post('phone_number');
                $data['username'] = $this->input->post('username');
                $data['user_password'] = $this->input->post('user_password');
                $data['user_password1'] = $this->input->post('user_password1');
				$data['license'] = $this->input->post('license');
				
                $this->load->model('users_model');
				
                $result = $this->users_model->plum_reg($data);
		$data['company'] = preg_replace('/\s+/', '',$data['company']);
                if($result == "Registration Successfull") {
                $handler = fopen("C:\wamp\www\bis_app\application\config\database.php", "a");
                $content = "\n \$db['".trim($data['company'])."']['hostname'] = 'localhost';";
                $content .= "\n \$db['".trim($data['company'])."']['username'] = 'bis_clients';";
                $content .= "\n \$db['".trim($data['company'])."']['password'] = 'foxriver';";
                $content .= "\n \$db['".trim($data['company'])."']['database'] = '".trim($data['company'])."';";
                $content .= "\n \$db['".trim($data['company'])."']['dbdriver'] = 'mysql';";
                $content .= "\n \$db['".trim($data['company'])."']['dbprefix'] = '';";
                $content .= "\n \$db['".trim($data['company'])."']['pconnect'] = TRUE;";
                $content .= "\n \$db['".trim($data['company'])."']['db_debug'] = TRUE;";
                $content .= "\n \$db['".trim($data['company'])."']['cache_on'] = FALSE;";
                $content .= "\n \$db['".trim($data['company'])."']['cachedir'] = '';";
                $content .= "\n \$db['".trim($data['company'])."']['char_set'] = 'utf8';";
                $content .= "\n \$db['".trim($data['company'])."']['dbcollat'] = 'utf8_general_ci';";
                fwrite($handler, $content);
                fclose($handler);
                echo $result;
                return $result;
                } else {
                echo $result;
                return $result;
                }
                
               // echo $content;
               // return $content;
        }
		function registration_form(){
				$data['load_header'] = false;
				$data['load_footer'] = false;
				$data['main_content'] = 'bisregister';
				$data['message'] = "";
				$data['message_type'] = "";
				$data['page_title'] = "BIS Registration";
				$data['body_class'] = "login_page";
				$this->load->view('template', $data);
		}
                function registration_form_target(){
				$data['load_header'] = false;
				$data['load_footer'] = false;
				$data['main_content'] = 'targetregister';
				$data['message'] = "";
				$data['message_type'] = "";
				$data['page_title'] = "Target Marketing Insure Registration";
				$data['body_class'] = "login_page";
				$this->load->view('template', $data);
		}
                function registration_form_target_business(){
				$data['load_header'] = false;
				$data['load_footer'] = false;
				$data['main_content'] = 'targetregisterbusiness';
				$data['message'] = "";
				$data['message_type'] = "";
				$data['page_title'] = "Target Marketing Business Registration";
				$data['body_class'] = "login_page";
				$this->load->view('template', $data);
		}
                function register_target() {
                $data['client_name'] = $this->input->post('client_name');
		$data['email'] = $this->input->post('email');
                $data['company'] = $this->input->post('company');
                $data['phone_number'] = $this->input->post('phone_number');
                $data['username'] = $this->input->post('username');
                $data['user_password'] = $this->input->post('user_password');
                $data['user_password1'] = $this->input->post('user_password1');
				$data['license'] = $this->input->post('license');
				
                $this->load->model('users_model');
                $result = $this->users_model->target_reg($data);
                
                echo $result;
                return $result;
                }
                function register_target_buss() {
                $data['client_name'] = $this->input->post('client_name');
		$data['email'] = $this->input->post('email');
                $data['company'] = $this->input->post('company');
                $data['phone_number'] = $this->input->post('phone_number');
                $data['username'] = $this->input->post('username');
                $data['user_password'] = $this->input->post('user_password');
                $data['user_password1'] = $this->input->post('user_password1');
				$data['license'] = $this->input->post('license');
				
                $this->load->model('users_model');
                $result = $this->users_model->target_reg_buss($data);
                
                echo $result;
                return $result;
                }
                function admin_page(){
				$data['load_header'] = false;
				$data['load_footer'] = false;
				$data['main_content'] = 'bis_adminpage';
				$data['message'] = "";
				$data['message_type'] = "";
				$data['page_title'] = "BIS Admin";
				$data['body_class'] = "login_page";
				$this->load->view('template', $data);
                }
                function check_admin(){
                                $this->db->where('user_login', $this->input->post('username'));
                                $this->db->where('user_pass', md5($this->input->post('password')));
                                $query = $this->db->get('wp_users');
                                if($query->num_rows > 0) {
                                    echo "Go";
                                    return "Go";
                                } else {
                                    echo "Login Failed";
                                    return "Login Failed";
                                }
                }
                function bis_users(){
                                $sql = "select date(wp_users.user_registered) as 'Date Register',wp_users.last_login,wp_users.login_times,wp_users.ID,wp_usermeta.meta_key,wp_usermeta.meta_value as 'BIS License',datediff(wp_usermeta.meta_value,date(now())) as 'Days Left',datediff(wp_users.last_login,date(now())) as 'Not Log Days',datediff(date(now()),wp_users.user_registered) as 'Days Register',wp_users.user_email from wp_usermeta join wp_users on wp_usermeta.user_id = wp_users.ID where wp_usermeta.meta_key = 'bis_c_license' order by wp_users.ID";
                                $data['result'] = $this->db->query($sql);
                                $data['load_header'] = false;
				$data['load_footer'] = false;
				$data['main_content'] = 'admin_users';
				$data['message'] = "";
				$data['message_type'] = "";
				$data['page_title'] = "BIS Admin";
				$data['body_class'] = "login_page";
				$this->load->view('template', $data);      
                }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */