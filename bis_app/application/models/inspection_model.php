<?php

class Inspection_model extends CI_Model {
        function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}

	function getAll()
	{
		$query = $this->db->get('inspections');
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
	
	function get_user_inspections_for_calendar($userid)
	{
			$query = $this->db->get_where('inspections', array('userid' => $userid));
			foreach ($query->result_array() as $row)
			{
				$data[] = $row;
			}
			if($query->result_array() != NULL) {
				return $data;
			}
			else {
				return NULL;
			}
	}
        function addInspection($data) {
                $error = "";  
                $data['date'] = date("Y-m-d");;
                if ($error == "")
		{
			$new_user_insert_data = array(
					'userid' => $data['user_id'],
                                        'date' => $data['date'],
                                        'buildingid' => $data['buildingid'],
					'status' => $data['status'],
                                        'siteid' => $data['siteid'],
                                        'companyid' => $data['companyid']
			);		
			
			$this->db->insert('inspections', $new_user_insert_data);
                        $lastid = $this->db->insert_id();
			return $lastid;
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}
        }

}