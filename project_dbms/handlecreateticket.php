<html>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>

<?php
include ('connect.php');

if(empty($_POST['fname']))
{
	echo "<script type='text/javascript'> alert('Please fill in your name'); history.go(-1); </script>";
	
}
if(empty($_POST['problem']))
{
	echo "<script type='text/javascript'> alert('Please fill in your problem'); history.go(-1); </script>";
	
}
if(empty($_POST['description']))
{
	echo "<script type='text/javascript'> alert('Please fill in your description'); history.go(-1); </script>";
	
}
function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
	if(isset($_GET['department']))
	{
	$department = $_GET['department'];
	}
	if(isset($_POST['fname']))
	{
	$fname = $_POST['fname'];
	}
if(isset($_GET['email']))
{
	$email= $_GET['email'];
	}
if(isset($_POST['problem']))
{
	$problem= $_POST['problem'];
	}
	if(isset($_POST['description']))
	{

	$description = $_POST['description'];
	}

	
	
	$id = randString(8);

$dt = date('Y/m/d H:i:s');

$query = "INSERT INTO ticket (name, email, department, problem, description, ticket_no, time) VALUES ('$fname', '$email', '$department', '$problem', '$description', '$id', '$dt')";
if(mysql_query($query) or die(mysql_error()))
{
	echo "<div align='center'>";
	echo "<br><h3><font color='green'> Ticket successfully created </font></h3><img src='images/tick.png' width='100'/><br>";
	echo "<h2>Your ticket Id is : <b>".$id."</b></h2>";
	echo "<a href='viewpticket.php?email=$email&ticket_no=$id' ><b>View your ticket here :</b></a>"; 
	echo "</div>";
	
}
else
{
	echo "Could not create ticket";
}

?>
</body>
</html>