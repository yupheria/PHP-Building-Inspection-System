<?php
require("class.phpmailer.php");

$con = mysql_connect("localhost","storecrm","foxriver");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db("wp_storecrm", $con);
$sql = "select date(wp_users.user_registered) as 'Date Register',wp_users.last_login,wp_users.login_times,wp_users.ID,wp_usermeta.meta_key,wp_usermeta.meta_value as 'BIS License',datediff(wp_usermeta.meta_value,date(now())) as 'Days Left',datediff(wp_users.last_login,date(now())) as 'Not Log Days',datediff(date(now()),wp_users.user_registered) as 'Days Register',wp_users.user_email,wp_users.user_login,wp_users.email_sent from wp_usermeta join wp_users on wp_usermeta.user_id = wp_users.ID where wp_usermeta.meta_key = 'bis_c_license' order by wp_users.ID";
$result = mysql_query($sql);

foreach($result as $row):
$mail = new PHPMailer();

$mail->IsSMTP();       
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.googlemail.com';
$mail->Port = 465;
$mail->Mailer = "smtp";

$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "bjoern@capitalplanning.co.nz";  // SMTP username
$mail->Password = "today1234"; // SMTP password

$mail->From = "bjoern@capitalplanning.co.nz";
$mail->FromName = "Capital Planning Team";
$mail->AddAddress($row['user_email']);                  // name is optional
$mail->AddReplyTo("bjoern@capitalplanning.co.nz", "Capital Planning Team");

$mail->WordWrap = 50;  
$mail->IsHTML(true);                                  // set email format to HTML

$message = "<br />Dear BIS Client";
                        $message .= "<br />";
                        $message .= "<br />Welcome to BIS!";
                        $message .= "<br />";
                        
                        $message .= "<br />http://bis.capitalplanning.co.nz";
                        $message .= "<br />";
                        $message .= "<br /><strong>Getting Started With BIS</strong>";
                        $message .= "<br />1. Enter your client details";
                        $message .= "<br />Click the client management tab";
                        $message .= "<br />Click Add.";
                        $message .= "<br />Enter your client details and Save";
                        $message .= "<br />";
                        
                        $message .= "<br /><strong>2. Add the building you wish to inspect</strong>"; 
                        $message .= "<br />Click the building management tab";
                        $message .= "<br />Select the client in selection panel";
                        $message .= "<br />Click add in site";
                        $message .= "<br />Options in the actions panel.";
                        $message .= "<br />Enter the site details in add site and save";
                        $message .= "<br />";
                        $message .= "<br />You are now ready to repeat the setting up process to add a building and enter the details for each levels and any areas on these levels.";
                        $message .= "<br />Once you have done so you are now ready to do a building inspection.";
                        $message .= "<br />";
                        
                        $message .= "<br /><strong>3. Trial an inspection</strong>";
                        $message .= "<br />Click the Building Inspection Tab";
                        $message .= "<br />Select your client, the site and the building";
                        $message .= "<br />Do an inspection.";
                        $message .= "<br />";
                        
                        $message .= "<br /><strong>4. Instantly produce a report while on location</strong>";
                        $message .= "<br />Click the view report tab";
                        $message .= "<br />Select client, site, your building and report type.";
                        
                        $message .= "<br />";
                        $message .= "<br /><strong>5. Check out the activities function for future events.</strong>";
                        $message .= "<br />";
                        $message .= "<br />* Click help for instruction assistance.";
                        $message .= "<br />The complete user guilde explains all the functions and how to operate BIS. Click the ? icon on the top right.";
                        
                        $message .= "<br />";
                        $message .= "<br />Remember to keep your username and password safe.";
                        $message .= "<br />";
                        $message .= "<br />Print this email for reference.";
                        $message .= "<br />";
                        $message .= "<br />Tell us what you think: Contact us if you have any questions about BIS We're here to help and we love feedback!";
                        $message .= "<br />";
                        $message .= "<br />Kind regards,";
                        $message .= "<br />";
                        $message .= "<br />The Team at Capital Planning";

$mail->Subject = "BIS News";
$mail->Body    = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
endforeach;
?>