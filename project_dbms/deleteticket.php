<?php
session_start();
$ticket_no = $_GET['ticket_no'];
$department = $_GET['department'];
$email = $_GET['email'];
$edelete = $_GET['edelete'];
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
if(!isset($_GET['email']) || !isset($_GET['auth']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.01;url=index.php");
}
?>

<html>
<head>
 <LINK REL="StyleSheet" HREF="css/style.css" TYPE="text/css" MEDIA="screen"/>
</head>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<div align="center" id="viewp">
<form action="" method="post">
Are your sure? <input type='submit' name="submitdelete" value='Yes, Delete '/>

</form>
<?php
include ('connect.php');
if($_GET['udelete']=="111")
{
	if(isset($_POST['submitdelete']))
{
		$q = "DELETE FROM registerdata where email = '$edelete'";
	$qq = mysql_query($q) or die(mysql_error());
	if($qq)
	{
		echo "<script type='text/javascript'> alert('User deleted');</script>";
		header("refresh:0.01;url=index.php");
	}
	else
	{
		echo "<script type='text/javascript'> alert('Unable to delete');</script>";
		
	}
}
}
else
{
if(isset($_POST['submitdelete']))
{
	$a = "DELETE FROM ticket where ticket_no='$ticket_no'";
	$r = mysql_query($a) or die(mysql_error());
	if($r)
	{
	echo "<div><h3><font color='green'>Successfully deleted</font></h3></div>";
	header("refresh:1.5;url=index.php");
	
	}
}
}

?>
</div>
</body>
</html>