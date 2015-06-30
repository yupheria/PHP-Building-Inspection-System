<?php

$this->load->view('navigation');

?>

<div id="container">
<div class="box box-50">
					<div class="boxin">
						<div class="header">
							<h3>Upcoming events</h3>
						</div>
						<div class="content">
<?php
	echo $calendar;
		
	?>
	
					</div>
				</div>
</div>

<div class="box box-50">
	<div class="boxin">
		<div class="header">
			<h3>Upcoming events</h3>
		</div>
		<div class="content">
			<table class="calendar" cellspacing="0">
				<thead>
					<tr>
						<th class="tc month first last" colspan="7">
							<a href="#" title="Go to October 2010"><img src="<?php echo base_url(); ?>images/cal-left.png" alt="Go to October 2009"></a>
							November 2010
							<a href="#" title="Go to December 2010"><img src="<?php echo base_url(); ?>images/cal-right.png" alt="Go to December 2010"></a>
						</th>
					</tr>
					<tr>
						<th class="tc first">Monday</th>
						<th class="tc">Tuesday</th>
						<th class="tc">Wednesday</th>
						<th class="tc">Thursday</th>
						<th class="tc">Friday</th>
						<th class="tc">Saturday</th>
						<th class="tc last">Sunday</th>
					</tr>
				</thead>
				<tbody>
					<tr class="first"><!-- .first for first row of the table (only if there is thead) -->
						<td class="inactive first"><strong>28</strong></td><!-- inactive days (month past or month after) -->
						<td class="inactive"><strong>29</strong></td>
						<td class="inactive">
							<strong>30</strong>
							<div class="items"><!-- spots indicating due items or something like that -->
								<a href="#" title="Your due item"><img src="<?php echo base_url(); ?>images/cal-due.png" alt="Your due item"></a>
								<a href="#" title="Your due item"><img src="<?php echo base_url(); ?>images/cal-due.png" alt="Your due item"></a>
								<a href="#" title="Your due item"><img src="<?php echo base_url(); ?>images/cal-due.png" alt="Your due item"></a>
							</div>
						</td>
						<td><strong>1</strong></td>
						<td>
							<strong>2</strong>
							<div class="items"><!-- spots indicating items to do or something -->
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
							</div>
						</td>
						<td><strong>3</strong></td>
						<td class="last">
							<strong>4</strong>
							<div class="items">
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
							</div>
						</td>
					</tr>
					<tr class="even">
						<td class="first"><strong>5</strong></td>
						<td>
							<strong>6</strong>
							<div class="items">
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
								<a href="#" title="Your item"><img src="<?php echo base_url(); ?>images/cal-item.png" alt="Your item"></a>
							</div>
						</td>
						<td><strong>7</strong></td>
						<td><strong>8</strong></td>
						<td><strong>9</strong></td>
						<td><strong>10</strong></td>
						<td class="last"><strong>11</strong></td>
					</tr>
					<tr>
						<td class="first"><strong>12</strong></td>
						<td><strong>13</strong></td>
						<td><strong>14</strong></td>
						<td><strong>15</strong></td>
						<td><strong>16</strong></td>
						<td><strong>17</strong></td>
						<td class="last"><strong>18</strong></td>
					</tr>
					<tr class="even">
						<td class="first"><strong>19</strong></td>
						<td><strong>20</strong></td>
						<td><strong>21</strong></td>
						<td><strong>22</strong></td>
						<td><strong>23</strong></td>
						<td><strong>24</strong></td>
						<td class="last"><strong>25</strong></td>
					</tr>
					<tr>
						<td class="first"><strong>26</strong></td>
						<td><strong>27</strong></td>
						<td><strong>28</strong></td>
						<td><strong>29</strong></td>
						<td><strong>30</strong></td>
						<td><strong>31</strong></td>
						<td class="inactive last"><strong>1</strong></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>