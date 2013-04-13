<!DOCTYPE html>
<html lang="en">
    <?php
	include ('connect.php');
	$_SESSION['loggedin'] = 0; 
	$emailv = $_COOKIE['emailcookie'];
	$il = "UPDATE registerdata SET logged = 'no' where email = '$emailv' ";
$ill = mysql_query($il) or die(mysql_error());
session_start();
session_unset(); 
session_destroy(); 
setcookie('emailcookie','',time()-3600);
echo "<b><font color='blue'>You are being logged out. Please wait a moment</font></b><br><br><img src='images/loader.gif'/>";
header('Refresh:1;url=index.php');
?>
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
      
    </body>
</html>
