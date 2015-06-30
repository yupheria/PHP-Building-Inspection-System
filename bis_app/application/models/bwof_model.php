<?php
class bwof_model extends CI_Model {
    function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
    function getAllInspections($cid,$sid,$bid) {
                $data = null;
                $query = 'select * from inspections where companyid = '.$cid.' and siteid = '.$sid.' and buildingid = '.$bid;
                if($this->session->userdata('access_level') == '1') {
                    $query = $query.' and inspections.userid='.$this->session->userdata('user_id');
                }
                //if($this->session->userdata('access_level') == '2') {
                //    $query = $query.' and inspections.userid in (select users.id from users where report_to ='.$this->session->userdata('user_id').')';
                //}
                $query = $query." GROUP BY inspections.id ORDER BY inspections.date DESC";
		$query = $this->db->query($query);
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
	}
    function issueBWof($data) {
                $error = "";  
                $data['issue_date'] = date("Y-m-d");
                $data['expiry_date'] = date("Y-m-d", strtotime(date("Y-m-d", strtotime($data['issue_date'])) . " + 1 year"));
                if ($error == "")
		{
			$new_user_insert_data = array(
					'user_id' => $data['user_id'],
                                        'issue_date' => $data['issue_date'],
                                        'expiry_date' => $data['expiry_date'],
					'company_id' => $data['company_id'],
                                        'site_id' => $data['site_id'],
                                        'building_id' => $data['building_id']
			);		
			
			$this->db->insert('bwof', $new_user_insert_data);
                        $lastid = $this->db->insert_id();
                        $update = array('wof_given' => 1);
                        $this->db->where('id', $data['iid']);
			$this->db->update('inspections', $update);
			return $lastid;
                        //return print_r($new_user_insert_data);
                        
		}
		else {
			return $error;
                    
		}
    }
    function getAllBWofs($cid,$sid,$bid) {
                $data = null;
                $query = 'select * from bwof where company_id ='.$cid.' and site_id = '.$sid.' and building_id ='.$bid;
                $query = $query." ORDER BY bwof.issue_date DESC";
                $query = $this->db->query($query);
                $data = null;
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
}
?>
