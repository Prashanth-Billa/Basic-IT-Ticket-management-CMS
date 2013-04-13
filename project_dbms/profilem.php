<html>
<head>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<?php
include ('connect.php');
if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
if(!isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("location:index.php");
}
$email = $_GET['email'];
$department = $_GET['department'];
$checkmoderator = "SELECT moderator from registerdata where email = '$email'";
$e = mysql_query($checkmoderator);
$ee = mysql_fetch_row($e);
$y = 'yes';
if($ee[0] == 'yes')
{
	echo "<div id='viewp'>";
	echo "<font color='green'><h2><b>You are the moderator </b></h2></font>";
	echo "<br><b><font color='green'>Tickets to approve in your department:</font></b> ";
	$notapprovedtickets = "SELECT ticket_no, email, problem FROM ticket where approved = 'no'  and department = '$department'";
	$e = mysql_query($notapprovedtickets);
	while($w = mysql_fetch_array($e))
	{
		echo "<br> <b> Ticket ID </b> : "."<a href='viewpticket.php?department=".$department."&ticket_no=".$w['ticket_no']."&email=".$_GET['email']."'>".$w['ticket_no']." </a>";
		echo "<b>Created by </b>: ".$w['email'];
		echo "<br><b> Problem </b>: ".$w['problem'];
		echo "<hr>";
	}
	echo "</div>";
}
?>
</body>