<?php
include ('connect.php');
$em = $_GET['email'];
$email = $_GET['emailauth'];

if(!isset($_GET['emailauth']) || !isset($_GET['email']) || !isset($_GET['valid']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Access violation');</script>";
	header("refresh:0.01;url=index.php");
}
if($_GET['moderator']=="111" && $_GET['noremove']=="111")
{
	$q = "UPDATE registerdata SET moderator='yes' where email='$em'";
	$qq = mysql_query($q) or die(mysql_error());
	if($qq)
	{
		echo "<script type='text/javascript'> alert('User made as the Moderator');</script>";
		header("refresh:0.01;url=index.php");
	}
	else
	{
			echo "<script type='text/javascript'> alert('Unable to do the operation');</script>";
			header("refresh:0.01;url=index.php");
	}
	
}
else if($_GET['remove']=="111")
{
$q = "UPDATE registerdata SET moderator='no' where email='$em'";
	$qq = mysql_query($q) or die(mysql_error());
	if($qq)
	{
		echo "<script type='text/javascript'> alert('User removed as the Moderator');</script>";
		header("refresh:0.01;url=index.php");
	}
	else
	{
			echo "<script type='text/javascript'> alert('Unable to do the operation');</script>";
			header("refresh:0.01;url=index.php");
	}

}
else
{
	header("location:deleteticket.php?udelete=111&auth=111&edelete=$em&email=$email");
}
?>