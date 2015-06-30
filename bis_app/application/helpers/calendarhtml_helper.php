<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generateCalendarHTML($calendar_events, $month = "", $year = "")
{

	//print_r($calendar_events);

	//echo "Month: " .$month . "<br />Year: " . $year . "<br />";
	$calendarHTML = "";
	
	if ($year == "")
	{
		$year = date("Y");
	}
	if ($month == "")
	{
		$month = date("m");

		$prevmonth = $month - 1;
		$nextmonth = $month + 1;
	}
	else
	{
		$prevmonth = $month - 1;
		$nextmonth = $month + 1;
	}
	
	if ($prevmonth == 0)
	{
		$prevmonth = 12;
	}
	if ($nextmonth == 13)
	{
		$nextmonth = 1;
	}
	//echo "Month: " .$month . "<br />Year: " . $year . "<br />";
	//echo "PrevMonth: " .$prevmonth . "<br />NextMonth: " . $nextmonth . "<br />";
	
	

	$days_in_this_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	if($month != 12 || $month != 1)
	{
		$days_in_last_month = cal_days_in_month(CAL_GREGORIAN, $prevmonth, $year);
		$days_in_next_month = cal_days_in_month(CAL_GREGORIAN, $nextmonth, $year);
		$year_for_next_month = $year;
		$year_for_last_month = $year;
	}
	elseif($nextmonth == 1)
	{
		$days_in_last_month = cal_days_in_month(CAL_GREGORIAN, 11, $year);
		$days_in_next_month = cal_days_in_month(CAL_GREGORIAN, 1, $year+1);
		$year_for_next_month = $year + 1;
		$year_for_last_month = $year;
	}
	elseif($lastmonth == 11)
	{
		$days_in_last_month = cal_days_in_month(CAL_GREGORIAN, 12, $year-1);
		$days_in_next_month = cal_days_in_month(CAL_GREGORIAN, 2, $year);
		$year_for_next_month = $year;
		$year_for_last_month = $year - 1;
	}
	

	$jd = cal_to_jd(CAL_GREGORIAN, $month, "1", $year);	
	$day_of_the_week_for_the_first_of_the_month = jddayofweek($jd,0);
	
	$jd = cal_to_jd(CAL_GREGORIAN, $month, $days_in_this_month, $year);	
	$day_of_the_week_for_the_last_of_the_month = jddayofweek($jd,0);
	

	switch ($day_of_the_week_for_the_first_of_the_month) 
	{
		case 0: 
		$number_of_filler_days_at_start = 6;
		break;
		case 1:
		$number_of_filler_days_at_start = 0;
		break;
		case 2:
		$number_of_filler_days_at_start = 1;
		break;
		case 3:
		$number_of_filler_days_at_start = 2;
		break;
		case 4:
		$number_of_filler_days_at_start = 3;
		break;
		case 5:
		$number_of_filler_days_at_start = 4;
		break;
		case 6:
		$number_of_filler_days_at_start = 5;
		break;
	}
	
	switch ($day_of_the_week_for_the_last_of_the_month) 
	{
		case 0: 
		$number_of_filler_days_at_end = 6;
		break;
		case 1:
		$number_of_filler_days_at_end = 0;
		break;
		case 2:
		$number_of_filler_days_at_end = 1;
		break;
		case 3:
		$number_of_filler_days_at_end = 2;
		break;
		case 4:
		$number_of_filler_days_at_end = 3;
		break;
		case 5:
		$number_of_filler_days_at_end = 4;
		break;
		case 6:
		$number_of_filler_days_at_end = 5;
		break;
	}
	
	$calendarHTML .= "<table class=\"calendar\" >";
	$calendarHTML .=  "";
	$calendarHTML .=  "<thead>";
	$calendarHTML .=  "	<tr>";
	$calendarHTML .=  "<th class=\"tc month first last\" colspan=\"7\">";
	$calendarHTML .=  "<a href=\"#\" id=\"prevmonth\" data-month=\""
						.$prevmonth.
						"\"  data-year=\""
						.date("Y",strtotime("-1 month", strtotime($year."/".$month."/"."01"))).
						"\" title=\"Go to "
						.date("F Y",strtotime("-1 month", strtotime($year."/".$month."/"."01"))).
						"\"><img src=\"".base_url()."images/cal-left.png\" alt=\"Go to "
						.date("F Y",strtotime("-1 month", strtotime($year."/".$month."/"."01"))).
						"\"/></a>";
	
	
	$calendarHTML .=  date("F Y", strtotime($year."/".$month."/"."01"));

	
	
	$calendarHTML .=  "<a href=\"#\" id=\"nextmonth\" data-month=\""
						.$nextmonth.
						"\"  data-year=\""
						.date("Y",strtotime("+1 month", strtotime($year."/".$month."/"."01"))).
						"\"  title=\"Go to "
						.date("F Y",strtotime("+1 month", strtotime($year."/".$month."/"."01"))).
						"\"><img src=\"".base_url()."images/cal-right.png\" alt=\"Go to "
						.date("F Y",strtotime("+1 month", strtotime($year."/".$month."/"."01"))).
						"\"/></a>";
	$calendarHTML .=  "<a href=\"#\" id=\"thismonth\" data-month=\""
						.date("m").
						"\"  data-year=\""
						.date("Y").
						"\"  title=\"Go to "
						.date("F Y").
						"\">Today</a>";					
	$calendarHTML .=  "</th>";
	$calendarHTML .=  "</tr>";
	$calendarHTML .=  "<tr>";
	$calendarHTML .=  "<th class=\"tc first\">Monday</th>";
	$calendarHTML .=  "<th class=\"tc\">Tuesday</th>";
	$calendarHTML .=  "<th class=\"tc\">Wednesday</th>";
	$calendarHTML .=  "<th class=\"tc\">Thursday</th>";
	$calendarHTML .=  "<th class=\"tc\">Friday</th>";
	$calendarHTML .=  "<th class=\"tc\">Saturday</th>";
	$calendarHTML .=  "<th class=\"tc last\">Sunday</th>";
	$calendarHTML .=  "</tr>";
	$calendarHTML .=  "</thead>";
	$calendarHTML .=  "<tbody>";
	$calendarHTML .=  "<tr class=\"first\">";
	
	$square = 0;
	
	// Filler days at start
	
	$result = "";	
	for ($i = 0; $i < $number_of_filler_days_at_start; $i++)
	{
		$calendarHTML .=  "<td class =\"inactive ";
		if ($square == 0)
		{
			$calendarHTML .=  "first";
		}
		$calendarHTML .=  "\"><strong>";
		$date_for_this_square = $days_in_last_month - $number_of_filler_days_at_start + $square + 1;
		$calendarHTML .=  $date_for_this_square;
		$calendarHTML .=  "</strong><div class=\"items\">";
		
		if($calendar_events != NULL)
		{
			for ($j = 0; $j < count($calendar_events); $j++)
			{
				if(strtotime($calendar_events[$j]['date']) == strtotime($year_for_last_month."-".$prevmonth."-".$date_for_this_square))
				{
					if(strtotime($calendar_events[$j]['date']) <= time()) 
					{
						$result .= '<a href="/buildinginspection/show/'.$calendar_events[$j]["id"].'" title="'.$calendar_events[$j]["description"].'"><img src="'.base_url().'images/cal-due.png" alt="'.$calendar_events[$j]["description"].'"></a>';
					   }
				   if(strtotime($calendar_events[$j]['date']) > time()) {
				   	$result .= '<a href="/buildinginspection/show/'.$calendar_events[$j]["id"].'" title="'.$calendar_events[$j]["description"].'"><img src="'.base_url().'images/cal-item.png" alt="'.$calendar_events[$j]["description"].'"></a>';
				      }			
				
				}
			}
		}
		//$calendarHTML .= check_date_for_events($calendar_events, $year_for_last_month."-".$prevmonth."-".$date_for_this_square);
		$calendarHTML .= $result;
		$calendarHTML .= "</div>";
		$calendarHTML .= "</td>";
		$square++;
	}
	
	$daynum = 1;
	
	// First row of days in this month
	$result = "";
			
	for ($i = 0; $i < 7 - $square; $i++)
	{
		$calendarHTML .=  "<td><strong>".$daynum."</strong><div class=\"items\">";
		
		if($calendar_events != NULL)
		{
			for ($j = 0; $j < count($calendar_events); $j++)
			{
				if(strtotime($calendar_events[$j]['date']) == strtotime($year."-".$month."-".$daynum))
				//if(strtotime($calendar_events[$j]['date']) == strtotime("2011"."-"."02"."-".$daynum))
					{
						if(strtotime($calendar_events[$j]['date']) <= time() ) 
						{
							$result .='<a href="/buildinginspection/show/'.$calendar_events[$j]["id"].'" title="'.$calendar_events[$j]["description"].'"><img src="'.base_url().'images/cal-due.png" alt="'.$calendar_events[$j]["description"].'"></a>';
						   }
					   	if(strtotime($calendar_events[$j]['date']) > time() ) 
					   	{
					   		$result .= '<a href="/buildinginspection/show/'.$calendar_events[$j]["id"].'" title="'.$calendar_events[$j]["description"].'"><img src="'.base_url().'images/cal-item.png" alt="'.$calendar_events[$j]["description"].'"></a>';
					    }			
					}
			}
		} 
	
		
		//$calendarHTML .= check_date_for_events($calendar_events, $year_for_last_month."-".$prevmonth."-".$date_for_this_square);*/
		$calendarHTML .= $result;
		$result = "";
		$calendarHTML .= "</div>";
		$calendarHTML .= "</td>";
		$daynum++;
	}
	
	$calendarHTML .=  "</tr>";
	
	$totalsquares = $number_of_filler_days_at_start + $days_in_this_month + $number_of_filler_days_at_end;
	$totalrows = ($totalsquares / 7) - 1;
	
	$newmonth = "1";
	
	for ($i = 0; $i < $totalrows; $i++ )
	{
		$calendarHTML .=  "<tr class = \"";
		if ($i % 2 == 0)
		{
			$calendarHTML .=  "even";
		}
		else
		{
			$calendarHTML .=  "";
		}
		$calendarHTML .=  "\" >";

		for ($j = 0; $j < 7; $j++)
		{
			if ($daynum <= $days_in_this_month)
			{
				$calendarHTML .=  "<td><strong>".$daynum."<strong></td>";
				$daynum++;
			}
			else
			{
					
			$daynum++;
			$calendarHTML .=  "<td  class =\"inactive\" ><strong>".$newmonth."<strong>";
				
				$result = "";
				if($calendar_events != NULL)
				{
					for ($i = 0; $i < count($calendar_events); $i++)
					{
						if(strtotime($calendar_events[$i]['date']) == strtotime($year_for_next_month."-".$nextmonth."-".$newmonth))
						{
							if(strtotime($calendar_events[$i]['date']) <= time()) {
								$result ='<div class="items"><a href="/buildinginspection/show/'.$calendar_events[$i]["id"].'" title="'.$calendar_events[$i]["description"].'"><img src="'.base_url().'images/cal-due.png" alt="'.$calendar_events[$i]["description"].'"></a></div>';
							   }
						   if(strtotime($calendar_events[$i]['date']) > time()) {
						   	$result = '<div class="items"><a href="/buildinginspection/show/'.$calendar_events[$i]["id"].'" title="'.$calendar_events[$i]["description"].'"><img src="'.base_url().'images/cal-item.png" alt="'.$calendar_events[$i]["description"].'"></a></div>';
						      }			
						
						}
					}
				}
				
				//$calendarHTML .= check_date_for_events($calendar_events, $year_for_last_month."-".$prevmonth."-".$date_for_this_square);
				$calendarHTML .= $result;
				
				$calendarHTML .= "</td>";	
				$newmonth++;			
			}
		}
		$calendarHTML .=  "</tr>";
		
		
	}
	
	$calendarHTML .=  "</table>";
	
	$calendarHTML .= "<div id='inspectionslist'><h2>Inspections</h2>";
	
	$result = "<ul class='inspections'>";
 	
 	if($calendar_events != NULL)
 	{
	 	for ($i = 0; $i < count($calendar_events); $i++)
	 	{
				if(strtotime($calendar_events[$i]['date']) <= time()) 
				{
	 				$result .='<li><a href="/buildinginspection/show/'.$calendar_events[$i]["id"].'" title="'.$calendar_events[$i]["description"].'"><img src="'.base_url().'images/cal-due.png" alt="'.$calendar_events[$i]["description"].'"><strong>Overdue</strong> '.$calendar_events[$i]["description"].' Due on: '.$calendar_events[$i]['date'].' </a></li>';
	 			   }
	 		   if(strtotime($calendar_events[$i]['date']) > time()) 
	 		   {
	 		   	$result .= '<li><a href="/buildinginspection/show/'.$calendar_events[$i]["id"].'" title="'.$calendar_events[$i]["description"].'"><img src="'.base_url().'images/cal-item.png" alt="'.$calendar_events[$i]["description"].'">'.$calendar_events[$i]["description"].' Due on: '.$calendar_events[$i]['date'].' </a></li>';
	 		      }			
	 		
	 	}
 	}
 	else {
 		$calendarHTML .= "<li><i>No inspections to display</i></li>";
 	}
 	
	$calendarHTML .= $result . "</ul></div>";
 
	return $calendarHTML;
}

