<html>
<head>

        <LINK REL="StyleSheet" HREF="css/index.css" TYPE="text/css" MEDIA="screen"/>
        <LINK REL="StyleSheet" HREF="css/hmenu.css" TYPE="text/css" MEDIA="screen"/> 
        <LINK REL="StyleSheet" HREF="css/login.css" TYPE="text/css" MEDIA="screen"/>
       

      <style type="text/css">
 
 .ulclass {
	border: 2px solid green
 }
 </style>
       


 <link href="css/jquery.css" rel="stylesheet" type="text/css"/>
 <link href="css/jcss.css" rel="stylesheet" type="text/css"/>
 <link href="css/style.css" rel="stylesheet" type="text/css"/>
 <link href="css/jcss1.css" rel="stylesheet" type="text/css"/>
  <link href="css/bjqs.css" rel="stylesheet" type="text/css"/>
    
		<script src="js/jquerylatest.js" type="text/javascript"></script>
		<script src="js/bjqs-1.3.js" type="text/javascript"></script>
	
   
    <script type="text/javascript">
	$(document).ready(function() {
    alert("hi");
	}
	</script>

 
</head>
<body>

<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<span align="center">

<h1>
<?php
include ('connect.php');
if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
if(!isset($_GET['email']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("location:index.php");
}
$email = $_GET['email'];
$department = $_GET['department'];
$checkmoderator = "SELECT moderator from registerdata where email = '$email'";
$e = mysql_query($checkmoderator);
$ee = mysql_fetch_row($e);
?>
Your tickets  </h1>
</span>
<div align="right">
<a href='profilem.php?email=<?php echo $email ?>&department=<?php echo $department?>'> <h2><?php if($ee[0]=='yes') echo "Accept or reject new tickets" ?></h2></a>
</div>
<br><br>
<div id="viewp" class="ulclass">
<?php

$q = "SELECT * FROM TICKET where email = '$email'";

$r = mysql_query($q) or die(mysql_error());
$cou = mysql_num_rows($r);
if($cou > 0)
{
while($w = mysql_fetch_array($r))
{
	echo "<br>  <b>Ticket ID </b> : "."<a href='viewpticket.php?department=".$w['department']."&ticket_no=".$w['ticket_no']."&email=".$_GET['email']."'>".$w['ticket_no']."     </a>";
	echo "     <b>Created by  </b>  ".$w['email'];
	echo "<br>";
	echo "<b>Problem  </b>: ".$w['problem'];
	if($w['solved']=='yes')
	{
	echo " <br><b>Solved status:</b>    ".$w['solved'];
	echo "<img src='images/tick.png'/ width='30'>";
	}
	if($w['solved']=='no')
	{
	echo " <br><b>Solved status:</b>    ".$w['solved'];
	echo "<img src='images/wrong.png'/ width='30'>";
	}
	echo "<hr>";
}
}
else
{
	echo "<div align='center'> None <br>";
	
	echo "<a href='createticket.php?email=$email&auth=101918171615141312&department=$department'><b>Create new Ticket</b></a>";
	echo "</div>";
	}


?>
</div>
</body>

</html>