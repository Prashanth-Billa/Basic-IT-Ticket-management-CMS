

    
<?php

include ('connect.php');




$insertFormfname = mysql_real_escape_string($_POST['fname']); 
$insertFormdepartment = mysql_real_escape_string($_POST['department']); 
$insertFormemail = mysql_real_escape_string($_POST['email']); 
$insertFormpassword = mysql_real_escape_string($_POST['password']);
$insertFormpasswordc = mysql_real_escape_string($_POST['cpassword']);
$insertFormcountry = mysql_real_escape_string($_POST['country']);
$insertFormgender= mysql_real_escape_string($_POST['gender']);


$insertfname=trim($insertFormfname);
$insertemail=trim($insertFormemail);
$insertdepartment=trim($insertFormdepartment);

$ch = "SELECT * FROM registerdata where email='$insertemail'";
$ew = mysql_query($ch);
$cou = mysql_num_rows($ew);
if($cou>0)
{
	echo "<script type='text/javascript'> alert('Email already in use'); history.go(-1); </script>";
}
else if ($cou<=0)
{

$insertpassword=trim($insertFormpassword);
$insertpasswordc=trim($insertFormpasswordc);



$insertcountry=trim($insertFormcountry);

$insertgender=trim($insertFormgender);
$salt = "aB1cD2eF3G";
$insertepassword = sha1(md5($salt.$insertpassword.$salt).$salt);
$no = "no";
if($insertpasswordc == $insertpassword)
{
$sql=mysql_query("INSERT INTO registerdata (fname, email, department, password, gender, country, moderator) VALUES ('$insertfname', '$insertemail', '$insertdepartment','$insertepassword','$insertgender','$insertcountry','$no')");
 if($sql)
 {
 echo "<h2><font color='green'>Registration complete. A notification email has been sent to you. Redirecting</font></h2><img src='images/loader.gif'>";
setcookie('registercookie',$insertemail,time()+(3600/60));
 header('refresh:2;url=index.php');
 $emailtosend=mysql_query("SELECT email FROM registerdata");
 $to=$emailtosend;
 $subject = "WELCOME to Help desk!!";
 $message = "Hello!   Now get ready to enjoy the unlimited benefits for 100% free ";
 $from = "dbms_project@yahoo.com";
 $headers = "From:" . $from;
 mail($to,$subject,$message,$headers);
 
 $sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('$insertemail',
					   '$insertepassword',
					   '$insertdepartment',
						NOW(),
						0)";
						
		$result = mysql_query($sql);
		if(!$result)
		{
			
			echo 'Something went wrong while registering. Please try again later.';
			
		}
		else
		{
			echo 'Succesfully registered. You can now sign in and start posting! :-)';
		}
 
 }
 else
 {
	
	echo "<h2><font color='red'>Registration could not complete. Sorry for the inconvenience.</font> </h2>";
	header('refresh:2;url=register1.php');
 }
}
}

?>

