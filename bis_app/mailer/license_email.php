<?php
$con = mysql_connect("localhost","storecrm","foxriver");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("wp_storecrm", $con);
$sql = "select date(wp_users.user_registered) as 'Date Register',wp_users.last_login,wp_users.login_times,wp_users.ID,wp_usermeta.meta_key,wp_usermeta.meta_value as 'BIS License',datediff(wp_usermeta.meta_value,date(now())) as 'Days Left',datediff(wp_users.last_login,date(now())) as 'Not Log Days',datediff(date(now()),wp_users.user_registered) as 'Days Register',wp_users.user_email from wp_usermeta join wp_users on wp_usermeta.user_id = wp_users.ID where wp_usermeta.meta_key = 'bis_c_license' order by wp_users.ID";
$result = mysql_query($sql);
echo "Register". "\t" . "ID". "\t" . "meta_key" . "\t" . "bis_license" . "\t" . "last_login" . "\t" . "login_times" . "\t" . "Days Left" . "\t". "Not Log Days". "\t". "Days Register" . "\t". "user_email";
echo "\n";
while($row = mysql_fetch_array($result))
  {
  echo $row['Date Register'] . "\t" .$row['ID'] . "\t" . $row['meta_key'] . "\t" . $row['BIS License'] . "\t" . $row['last_login'] . "\t" . $row['login_times'] . "\t\t" . $row['Days Left'] . "\t\t". $row['Not Log Days'] . "\t\t" . $row['Days Register'] . "\t\t" . $row['user_email'];
  echo "\n";
  }
mysql_close($con);
?>
