select inspections.id, company.company, buildings.buildingname, sites.sitename, inspections.date, 
                                    inspections.status, inspections.wof_given, 
                                    company.id as cid, sites.id as sid, buildings.id as bid,
                                    inspections.id as iid
                                    from company, buildings, sites, inspections 
                                    where
                                    inspections.companyid = company.id and
                                    inspections.buildingid = buildings.id and
                                    inspections.siteid = sites.id and
                                    buildings.id = 2
                                    order by inspections.id desc
                                    limit 1
                                    