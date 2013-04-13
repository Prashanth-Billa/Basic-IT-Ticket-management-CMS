
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
	header("refresh:0.01;url=index.php");
}
$email = $_GET['email'];
$department = $_GET['department'];
if($_GET['email']=="" || $_GET['department']=="")
{
echo "<div align="; echo "center><b><font color=";echo "red>You must first login to experience email service . thank you. Redirecting...</b></font><img src='images/loader.gif'></img></div> ";

header("refresh:2;url=index.php");

}
else
{
echo "<div align='center'><h2>welcome</h2><img src='images/loader.gif'/></div> Redirecting to the mail page..";
header("refresh:0.5;url=cfmail.php?email=$email&department=$department");
}

?>
