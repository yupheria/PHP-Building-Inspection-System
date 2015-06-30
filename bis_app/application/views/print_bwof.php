<div id="container">
	<div class="box box-100 altbox">
		<div class="boxin">
			
               <div class="content">
                 <?php foreach($buildingdetails as $detail) :?>
                 <table width="1713" height="472" border="0">
                   <tr>
                     <td colspan="6" align="center"><h2><strong><?php echo $detail->buildingname;?> BWoF</strong></h2></td>
                   </tr>
                   <tr>
                     <td colspan="4" align="center"><h3><strong>Building Details:</strong></h3></td>
                     <td colspan="2" align="center"><h3><strong>Company/Owner Details:</strong></h3></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Company Name:</strong></td>
                     <td width="203"><?php echo $detail->company;?></td>
                     <td width="634"><strong>Company/Owner Name:</strong></td>
                     <td width="280"><?php echo $detail->company?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Site Name:</strong></td>
                     <td><?php echo $detail->sitename;?></td>
                     <td><strong>Company Type:</strong></td>
                     <td><?php 
                     foreach($company_types as $type) {
                         if($type->id == $detail->company_type) {
                             echo $type->company_type;
                         }
                     }
                     ?>
                     </td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Building Name:</strong></td>
                     <td><?php echo $detail->buildingname;?></td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Address Line 1:</strong></td>
                     <td><?php echo $detail->address_line_1;?></td>
                     <td><strong>Address Line 1:</strong></td>
                     <td><?php echo $detail->address_line_1?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Address Line 2:</strong></td>
                     <td><?php echo $detail->address_line_2;?></td>
                     <td><strong>Address Line 2:</strong></td>
                     <td><?php echo $detail->address_line_2?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Suburb:</strong></td>
                     <td><?php echo $detail->suburb;?></td>
                     <td><strong>Suburb:</strong></td>
                     <td><?php echo $detail->suburb?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>City</strong></td>
                     <td><?php echo $detail->city;?></td>
                     <td><strong>City</strong></td>
                     <td><?php echo $detail->city?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Country:</strong></td>
                     <td><?php 
                     foreach($countries as $country) {
                         if($country->id == $detail->country) {
                             echo $country->name;
                         }
                     }
                     ?></td>
                     <td><strong>Country:</strong></td>
                     <td><?php 
                     foreach($countries as $country) {
                         if($country->id == $detail->country) {
                             echo $country->name;
                         }
                     }
                     ?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Levels Above Ground Level:</strong></td>
                     <td><?php echo $detail->levels_above;?></td>
                     <td><strong>Phone:</strong></td>
                     <td><?php echo $detail->phone?></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Levels Below Ground Level:</strong></td>
                     <td><?php echo $detail->levels_below;?></td>
                     <td></td>
                     <td></td>
                   </tr>
                   <tr>
                     <td colspan="3"><strong>Month and Year Constructed:</strong></td>
                     <td><?php echo date( 'F', mktime(0, 0, 0, $detail->month_contructed) )." ".$detail->year_constructed;?></td>
                     <td><strong>Email:</strong></td>
                     <td><?php echo $detail->email?></td>
                   </tr>
                   <tr>
                     <td colspan="6" align="center"><h3><strong>Inspection Details</strong></h3></td>
                   </tr>
                   <tr>
                     <td colspan="4"><strong>Date Inspected:</strong></td>
                     <td colspan="2"><?php echo $detail->date?></td>
                   </tr>
                   <tr>
                     <td colspan="6" align="center"><h3><strong>Hazard Details</strong></h3></td>
                   </tr>
                   <tr>
                     <td width="167"><strong>Level</strong></td>
                     <td width="134"><strong>Area</strong></td>
                     <td width="269"><strong>Hazard Name</strong></td>
                     <td><strong>Hazard Level</strong></td>
                     <td><strong>Hazard Description</strong></td>
                     <td><strong>Hazard Solution</strong></td>
                   </tr>
                   <?php if($buildinghazards != null):?>
                   <?php foreach($buildinghazards as $hazards) :?>
                   <tr>
                     <td><?php 
                                if($hazards->above == 1) {
                                    if($hazards->area_level == 0) {
                                      echo "G";   
                                    } else {
                                      echo $hazards->area_level;  
                                    }
                                } else {
                                echo "-".$hazards->area_level;    
                                }
                     ?></td>
                     <td><?php echo $hazards->area_name?></td>
                     <td><?php echo $hazards->name?></td>
                     <td><?php 
                      foreach($hazard_levels as $level) {
                          if($hazards->level == $level->id){
                              echo $level->levels;
                          }
                      }
                     ?></td>
                     <td><?php echo $hazards->description?></td>
                     <td><?php echo $hazards->solution?></td>
                   </tr>
                   <?php endforeach;?>
                   <?php endif;?>
                 </table>
                <?php endforeach;?>	
                </div>
		</div>
	</div>
</div>