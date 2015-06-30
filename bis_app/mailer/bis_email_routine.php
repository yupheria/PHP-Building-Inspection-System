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
                        
                        $message14 = "<br />Dear BIS Client";
                        $message14 .= "<br />";
                        $message14 .= "<br />Thank you for signing up to trial BIS. Is everything working ok?"; 
                        $message14 .= "<br />";
                        $message14 .= "<br />Don’t miss out on experiencing for yourself all the features and how BIS could improve your work efficiency!";
                        $message14 .= "<br />";
                        $message14 .= "<br />Take a quick peek at how easy BIS is to use, by watching our video below.";
                        $message14 .= "<br />";
                        $message14 .= "<br />Once you are logged in the user guide can provide you with detailed instructions, and we are always here to help too!";
                        $message14 .= "<br />";
                        $message14 .= "<br />Check out the activities function and how easy it is to list future events. Inspection renewals are automatically listed here on their renewal date.";
                        $message14 .= "<br />If you have had trouble logging in here is a quick reference guide to assist";
                        $message14 .= "<br />";
                        $message14 .= "<br />http://bis.capitalplanning.co.nz";
                        $message14 .= "<br />";
                        $message14 .= "<br /><strong>Getting Started With BIS</strong>";
                        $message14 .= "<br />1. Enter your client details";
                        $message14 .= "<br />Click the client management tab";
                        $message14 .= "<br />Click Add.";
                        $message14 .= "<br />Enter your client details and Save";
                        $message14 .= "<br />";
                        
                        $message14 .= "<br /><strong>2. Add the building you wish to inspect</strong>"; 
                        $message14 .= "<br />Click the building management tab";
                        $message14 .= "<br />Select the client in selection panel";
                        $message14 .= "<br />Click add in site";
                        $message14 .= "<br />Options in the actions panel.";
                        $message14 .= "<br />Enter the site details in add site and save";
                        $message14 .= "<br />";
                        $message14 .= "<br />You are now ready to repeat the setting up process to add a building and enter the details for each levels and any areas on these levels.";
                        $message14 .= "<br />Once you have done so you are now ready to do a building inspection.";
                        $message14 .= "<br />";
                        
                        $message14 .= "<br /><strong>3. Trial an inspection</strong>";
                        $message14 .= "<br />Click the Building Inspection Tab";
                        $message14 .= "<br />Select your client, the site and the building";
                        $message14 .= "<br />Do an inspection.";
                        $message14 .= "<br />";
                        
                        $message14 .= "<br /><strong>4. Instantly produce a report while on location</strong>";
                        $message14 .= "<br />Click the view report tab";
                        $message14 .= "<br />Select client, site, your building and report type.";
                        
                        $message14 .= "<br />";
                        $message14 .= "<br /><strong>5. Check out the activities function for future events.</strong>";
                        $message14 .= "<br />";
                        $message14 .= "<br />* Click help for instruction assistance.";
                        $message14 .= "<br />The complete user guilde explains all the functions and how to operate BIS. Click the ? icon on the top right.";
                        
                        $message14 .= "<br />";
                        $message14 .= "<br />Remember to keep your username and password safe.";
                        $message14 .= "<br />";
                        $message14 .= "<br />Print this email for reference.";
                        $message14 .= "<br />";
                        $message14 .= "<br />Tell us what you think: Contact us if you have any questions about BIS We're here to help and we love feedback!";
                        
                        $message14 .= "<br />For any queries or assistance or to give us the feedback that we love, contact Capital Planning on 027 227 2583.";
                        $message14 .= "<br />";
                        $message14 .= "<br />We look forward to hearing from you.";
                        $message14 .= "<br />";
                        $message14 .= "<br />Kind regards,";
                        $message14 .= "<br />";
                        $message14 .= "<br />The Team at Capital Planning";

                        $message28 = "<br />Dear (Customers name)";
                        $message28 .= "<br />";
                        $message28 .= "<br />Thank you for trialing BIS; your 30 day free trial expires in 2 DAYS!"; 
                        $message28 .= "<br />We hope that you found BIS very beneficial during the trial inspection, and that it is worthy system for your business";
                        $message28 .= "<br />";
                        $message28 .= "<br />The next step is to do all your inspections with BIS!";
                        $message28 .= "<br />";
                        $message28 .= "<br />•	Improve work efficiency by completing inspections quickly and accurately.";
                        $message28 .= "<br />";
                        $message28 .= "<br />•	With all client information stored on the web, you can eliminate all that paper work and have real time access to all building and inspection information."; 
                        $message28 .= "<br />";
                        $message28 .= "<br />•	Automate the inspection process with the activity list feature";
                        $message28 .= "<br />";
                        $message28 .= "<br />•	Produce reports instantly with either the standard built in report or one customized to suit.";
                        $message28 .= "<br />";
                        $message28 .= "<br />And remember… as a web-based program, you can access BIS from any location!";
                        $message28 .= "<br />";
                        $message28 .= "<br />Visit www.capitalplanning.co.nz and purchase BIS today, and pay just a $10/ month basic hosting fee and $5/ month per building!";
                        $message28 .= "<br />";
                        $message28 .= "<br />If you have any questions contact us on 027 227 2583."; 
                        $message28 .= "<br />";
                        $message28 .= "<br />We are looking forward to hearing from you!";
                        $message28 .= "<br />";
                        $message28 .= "<br />Kind regards,";
                        $message28 .= "<br />";
                        $message28 .= "<br />The Team at Capital Planning";

foreach($result as $row):
    switch ($row['Days Register']) {
        case 14: do_email($row['user_email'],$row['user_login'],$message14,"Day 14 BIS");
            break;
        case 28: do_email($row['user_email'],$row['user_login'],$message28,"Day 28 BIS");
            break;
        default: break;
    }
endforeach;

function do_email($user_email,$user_login,$message,$subject){
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
$mail->AddAddress($user_email);                  // name is optional
$mail->AddReplyTo("bjoern@capitalplanning.co.nz", "Capital Planning Team");

$mail->WordWrap = 50;  
$mail->IsHTML(true);                                  // set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message."This is the message body ".$user_login;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
}
?>