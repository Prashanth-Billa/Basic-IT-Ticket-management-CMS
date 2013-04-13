<?php

include 'connect.php';



$emailt=$_POST['emailtosend'];

$sendpass=mysql_query("SELECT password FROM registerdata WHERE email='$emailt'") or die(mysql_error());

$fcount=mysql_num_rows($sendpass);


if($fcount==1){

$rows=mysql_fetch_row($sendpass);


$your_password=$rows[0];


$to=$emailtosend; 


$subject="Your password here"; 


$header="From: Cluster fun ( cluster_fun_team@yahoo.com)"; 


$messages= "Your password for login to our website \r\n";
$messages.="Your password is  \t     ".$your_password." \r\n";
$messages.="Thank you";

$sentmail = mail($to,$subject,$messages,$header); 

}


else {
echo "Sorry. You haven't registered. ";
 header('Refresh: 1;url=register2.php');
}


if($sentmail){
echo "<font color='green'><b>Your Password Has Been Sent To Your Email Address :".$emailt." </b></font>";
 header('Refresh: 3;url=index.php');}
else {
echo "Cannot send password to your e-mail address";
 header('Refresh: 1;url=index.php');
}

?>
