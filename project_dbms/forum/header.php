<?php
//signin.php
include 'connect.php';
include 'config.php';
session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "$title"; ?></title>
<link rel="stylesheet" type="text/css" href="main.css" />
			</head>
<body > 
<div>

</div>
	<div id="upper"> 

		<div id="header" > <br><br>
		<a href="/project_dbms/index.php"> Home </a>
			<h1><a href=""> <?php echo $title; ?></a></h1> 
			
 
<?php 

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
	echo '<p class="login"> 
	Welcome, <b>'
	 .htmlentities($_SESSION['uuser']) . '</b>	
	</p> ';
}

else
{echo '
<form class="login" method="post" action="signin.php"> 
	
	<div> 
		<label> 
			Username<br /> 
			<input  type="text" name="user_name" size="13" maxlength="40" value="" tabindex="1" /> 
		</label> 
		<label> 
			Password<br /> 
			<input  type="password" name="user_pass" size="13" maxlength="40" tabindex="2" /> 
		</label> 

		<input type="submit" name="Submit" class="submit" value="Log in &raquo;" tabindex="4" /> 
	</div> 
	</form> '; 
	}
	?>
</form> 

		</div> 
	 <div id="wrapper">
<div id="faux"> 
<div id="leftcolumn" > 
 
 
 

<h2>Links</h2> 
<p><a href='index.php'  style='font-size:13pt;'>Forum Home</a> 
<?php
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['user_level']) && $_SESSION['user_level']== 1)
{echo '<p ><a href="admin.php"  style="font-size:8pt;">Administration</a>';
echo '<p ><a href="create_cat.php"  style="font-size:8pt;">New Category</a>';}
?>
<p><a href='create_topic.php'  style='font-size:13pt;'>New Topic</a> 


</div> 
 
<div id="rightcolumn"> 
 

 

