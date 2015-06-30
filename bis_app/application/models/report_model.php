<?php
class report_model extends CI_Model {
     function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database($this->session->userdata('client_db'), true);
	}
    function getAllTypes() {
                $query = $this->db->get('report_type');
		$this->db->order_by("id", "asc"); 
		foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getInspections($bid) {
                $data = null;
                $query = $this->db->query('select company.company, buildings.buildingname, sites.sitename, inspections.date, 
                                    inspections.status, inspections.wof_given, 
                                    company.id as cid, sites.id as sid, buildings.id as bid,
                                    inspections.id as iid
                                    from company, buildings, sites, inspections 
                                    where
                                    inspections.companyid = company.id and
                                    inspections.buildingid = buildings.id and
                                    inspections.siteid = sites.id and
                                    buildings.id = ?',$bid);
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getUpdatedInspections($bid) {
                $data = null;
                $query = $this->db->query('select company.company, buildings.buildingname, sites.sitename, inspections.date, 
                                    inspections.status, inspections.wof_given, 
                                    company.id as cid, sites.id as sid, buildings.id as bid,
                                    inspections.id as iid
                                    from company, buildings, sites, inspections 
                                    where
                                    inspections.companyid = company.id and
                                    inspections.buildingid = buildings.id and
                                    inspections.siteid = sites.id and
                                    buildings.id = ?
                                    order by inspections.id desc
                                    limit 1
                                    ',$bid);
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getBWoFs($bid) {
                $data = null;
                $query = $this->db->query('select bwof.id, bwof.issue_date, bwof.expiry_date, company.company, sites.sitename, buildings.buildingname
                                            from
                                            bwof, company, sites, buildings
                                            where
                                            bwof.company_id = company.id and
                                            bwof.site_id = sites.id and
                                            bwof.building_id = buildings.id and buildings.id = ?',$bid);
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getBuildingDetails($cid,$sid,$bid,$iid) {
                $data = null;
                $query = $this->db->query('select company.company, sites.sitename, buildings.buildingname, buildings.address_line_1,
                                            buildings.address_line_2, buildings.suburb, buildings.city, buildings.country, buildings.levels_above,
                                            buildings.levels_below, buildings.month_contructed, buildings.year_constructed,
                                            
                                            company.company, company.company_type, company.address_line_1, company.address_line_2,
                                            company.suburb ,company.city, company.country, company.phone, company.email,
                                            
                                            inspections.date, inspections.status

                                            from buildings, company, inspections, sites
                                            where company.id = ? and sites.id = ? and buildings.id = ? and inspections.id = ?',array($cid,$sid,$bid,$iid));
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
    function getBuildingHazards($bid) {
                $data = null;
                $query = $this->db->query('select building_areas.area_level, 
                building_areas.above, 
                building_areas.area_name, 
                hazards.name, 
                hazards.level,
                hazards.description,
                hazards.solution
                from building_areas,hazards,buildings where hazards.area = building_areas.id and building_areas.buildingid = buildings.id and buildings.id = ?',$bid);
                foreach ($query->result() as $row)
		{
			$data[] = $row;
		}
		return $data;
    }
}
?>
