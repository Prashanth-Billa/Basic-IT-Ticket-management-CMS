<html>

<head>
 <LINK REL="StyleSheet" HREF="css/style.css" TYPE="text/css" MEDIA="screen"/>
 <style type="text/css">
 
 .ulclass {
	border: 2px solid green
 }
 </style>
</head>

<body>
<a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<?php
session_start();
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
$department = $_GET['department'];
$emailauth = $_GET['email'];
if(!isset($_GET['email']) || !isset($_GET['auth']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.01;url=index.php");
}
include ('connect.php');
$hhh = mysql_query("SELECT moderator from registerdata where email = '$emailauth'");
$hhh_fetch = mysql_fetch_array($hhh);
$q = "SELECT * from registerdata where department='$department'";
$e = mysql_query($q);
while($ee = mysql_fetch_array($e))
{
	if($ee['email'] != $_COOKIE['emailcookie'])
	{
	echo "<br>";
	echo "<div class='ulclass' id='viewp'>";
	echo "Name : ".$ee['fname'];
	echo "<br> Email : ".$ee['email'];
	echo "<br> Moderator :".$ee['moderator'];
	if($hhh_fetch['moderator'] == 'yes')
	{
	echo "<br><a href='modifyuser.php?valid=111&emailauth=".$emailauth."&email=".$ee['email']."'>Delete this user</a>";
	if($ee['moderator']!='yes'){echo "<br><a href='modifyuser.php?noremove=111&valid=111&moderator=111&emailauth=".$emailauth."&email=".$ee['email']."'>Grant MODERATOR</a>";}
	if($ee['moderator']=='yes'){echo "<br><a href='modifyuser.php?remove=111&valid=111&moderator=111&emailauth=".$emailauth."&email=".$ee['email']."'>Revoke MODERATOR</a>";}
	}
	echo "</div>";
	echo "<hr>";
	}
}

?>
</body>
</html>