<html>
<head>

<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
</html>
<?php



$depart = $_GET['department'];
$email = $_GET['email'];
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
	if ($_POST['step'] == 1) 
	{
		
if(!isset($_GET['email']) || !isset($_GET['auth']) || $_GET['email']=="")
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.01;url=index.php");
}
		if(empty($_POST['emailinput']) || empty($_POST['ticket_id']))
		{
		echo "<h3><font color='red'>Invalid entry. Try again. Redirecting...</font></h3>";
		header("refresh:2;url=ticketview.php?email=$email&dept=$depart");
		
		}
		else{
		if(isset($_POST['emailinput'])){
		$emailadd = $_POST['emailinput'];}
		if(isset($_POST['ticket_id'])){
		$ticket_no= $_POST['ticket_id'];}
		header("location:viewpticket.php?ticket_no=$ticket_no&emailaddress=$emailadd&email=$email");
		}
	}
	if ($_POST['step'] == 2) 
	{
		if(($_GET['email']=="") || ($_GET['department']==""))
		{
			echo "<script type='text/javascript'> alert('Please login');</script>";
			header("refresh:0.01;url=index.php");	
		}
		if(isset($_GET['department']))
		{
			$d = $_GET['department'];
			$query = "SELECT * FROM ticket where department = '$d'";
			
			$r = mysql_query($query) or die(mysql_error());
			if(mysql_num_rows($r) == 0)
			{
				echo "<script type='text/javascript'> alert('Sorry. No tickets are available');history.go(-1);</script>";

			}
		
	while($g = mysql_fetch_array($r))
	{
		echo "<div align='center' id='viewp' style='opacity:0.5' background='violet'>";
		echo "<br>Ticket ID :    <a href='viewpticket.php?department=".$_GET['department']."&ticket_no=".$g['ticket_no']."&email=".$email."'>".$g['ticket_no']."</a><br><br>";
		echo "Created by     :    <b>".$g['name']."</b><br><br> Problem Statement<b>    ".$g['problem']."</b><br>";
		echo "</div>";
		echo "<hr>";
		
	}
	}
	}
	

?>