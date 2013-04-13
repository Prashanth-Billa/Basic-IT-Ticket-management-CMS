<html>
<head>
 <LINK REL="StyleSheet" HREF="css/style.css" TYPE="text/css" MEDIA="screen"/>
</head>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<br><br><br><br>

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
$ticket_no = $_GET['ticket_no'];
$email = $_GET['email'];
$department = $_GET['department'];
$q = "SELECT time,ticket_no, name, problem, description, priority, approved FROM ticket WHERE ticket_no = '$ticket_no'";
$checkm = "SELECT moderator from registerdata where email = '$email'";
$checkmm = mysql_query($checkm);

$moderator = mysql_fetch_array($checkmm);
$checksolved = "SELECT solved from ticket where ticket_no='$ticket_no'";
$re = mysql_query($checksolved);
$ree = mysql_fetch_array($re);
$r = mysql_query($q);
echo "<div id='viewp' align='center'>";
while($use = mysql_fetch_array($r))
{
	
	echo "<table id='box-table-a' summary='Ticket info' ";
	echo "<br><th><b>TICKET ID</b> : ".$use['ticket_no']." </th>  <br>";
	echo "<br><th><b>Created by </b>: ".$use['name']."</th><br>";
	echo "<br><tr><b>DATE and Time of creation</b> : ".$use['time']." </tr>  <br>";
	echo "<b><tr>Problem statement</b> : ".$use['problem']."</tr><br>";
	$priority = $use['priority'];
	echo "<br> <b>Description </b>  ".$use['description']."<br>";
	echo "<br><b> Solved Status: ".$ree['solved'];
	echo "<br><b> Priority </b>: ".$use['priority'];
	echo "<br> <b>Approved </b>: ";
	if($use['approved']=="no")
	{
		echo "<font color='red'><b>NOT APPROVED</b></font>";
	}
	if($use['approved']=="yes")
	{
		echo "<font color='green'> <b>APPROVED </b></font>";
	}
	
	if($moderator['moderator'] == 'yes' && $use['approved']=='no')
	{
	
	echo "<br>";
		echo "<font color='green'><b>You are the moderator </b></font>";
		echo "<form action='' method = 'post' >";
		echo "<b>Accept or delete </b><select name='delacc' >";
		echo "<option value='accept' selected>Accept</option>";
		echo "<option value='reject'> Reject</option>";
		echo "</select>";
		echo "<br> Set priority : <br> ";
		echo "<select name='priority'>";
		echo "<option value = 'low'> Low </option>";
		echo "<option value = 'medium' > Medium </option>";
		echo "<option value = 'high' > High </option>";
		echo "</select>";
		echo "<br><br>";
		echo "<input type = 'submit' value='Take action'>";
		echo "</form>";
 
	}
	if($moderator['moderator'] == 'yes' && $use['approved']=='yes' )
	{
	
		echo "<br>";
		echo "<a href='editticket.php?department=$department&auth=111&ticket_no=$ticket_no&priority=$priority&email=$email'> Edit the ticket </a>";
		echo "<br><a href='deleteticket.php?department=$department&email=$email&auth=111115&ticket_no=$ticket_no'> Delete this ticket </a>";
		if($ree['solved']=='no')
		{
		echo "<br><form action='' method='post'>";
		echo "<input type='hidden' value='yes' name='solveds'/>";
		echo "<input type='submit' value='Mark the ticket as solved'>";
		echo "</form>";
		}
	}
	echo "</table>";
	echo "</div>";
}
if(isset($_POST['solveds']))
{
	$sq = "UPDATE ticket SET solved='yes' where ticket_no = '$ticket_no'";
	$sqp = mysql_query($sq) or die(mysql_error());
	if($sqp)
	{
		echo "<div align='center' id='viewp'><font color='green'> TICKET SOLVED </font></div>";
		header("refresh:1");
	}
	
}
else
{
$acceptreject = $_POST['delacc'];
$pr = $_POST['priority'];
if($acceptreject=="accept")
{
	$up = "UPDATE ticket SET approved = 'yes', priority ='$pr' where ticket_no = '$ticket_no'";
	
	$ok = mysql_query($up);
	if($ok)
	{
		echo "<font color='green'><b>Ticket approved</b></font>";
		echo "<script type='text/javascript'> alert('Ticket approved');window.location.href='profilem.php?email=".$email."&department=".$department."'</script>";

		
	}
	
	
	
}
else if($acceptreject=="reject")
{
	header("location:deleteticket.php?department=$department&email=$email&auth=111115&ticket_no=$ticket_no");
}
}
?>
</body>
</html>