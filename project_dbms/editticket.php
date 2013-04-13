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
 if(!isset($_GET['auth']))
{
echo "<div align="; echo "center><b><font color=";echo "red>You must first login to create ticket . thank you. Redirecting...</b></font><img src='images/loader.gif'></img></div> ";

header("refresh:2;url=index.php");

}
$em = $_GET['email'];
$ticket_no = $_GET['ticket_no'];
$department = $_GET['department'];
?>
<html>
<head>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<link rel="stylesheet" href="css/button.css" type="text/css" />
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="js/cticket.js" type="text/javascript"></script>
</head>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<div align="center">
<h1><font color="green"> Edit ticket </font></h1>
</div>
<div align="center" id="viewp">
<form name="createticket" onsubmit="" action="" method="post">

             
			  <br>

			  Your Email address is : <?php echo "<b>".$_GET['email']."</b>" ?>
			  <br><br><br>
			  Department : <?php  
			  $priority = $_GET['priority'];
			  echo "<b>".$_GET['department']."</b>"; 
			  ?>
			  
			   <br><br><br>
			  Problem statement : <font color="red">*</font><input type="text" id="t1" name="problem" class="t" size="30" autocomplete="off" onfocus="this.style.background='#EBDDE2'" onblur=" this.style.background='white' "/>   
			    <br><br><br>
			  Problem Description <font color="red">*</font><br><textarea rows="10" cols="100" style="background-color:#FFF8C6" name="description" id="description"></textarea><br/>
			  
			  Edit Priority : <br>
			  <select name='selp'>
			  <option value='low' <?php if($priority=='low') echo 'selected' ?>>Low</option>
			  <option value='medium' <?php if($priority=='medium') echo 'selected'; ?>>Medium</option>
			  <option value='high' <?php if($priority=='high')  echo 'selected'; ?>>High</option>
			  </select>
			  <br>
			 
			
<span>
  
    </span>
<br>
	<input type="submit"  id="submitbutton" value="Submit Ticket" />
</form>
</div>
</body>

</html>
<?php

$prob = $_POST['problem'];
$desc = $_POST['description'];
$prior = $_POST['selp'];

if(!empty($_POST['problem']) && !empty($_POST['description']))
{
$q = "UPDATE ticket SET problem='$prob', description='$desc', priority ='$prior'  WHERE ticket_no='$ticket_no'";
$exe = mysql_query($q) or die(mysql_error());
if($q)
{
	
		echo "<script type='text/javascript'> alert('Ticket edited');window.location.href='profilem.php?email=".$em."&department=".$department."'</script>";
}
else
{
	echo "<font color='red'><b>Sorry. Could not complete the request</b></font>";
	header("refresh:2;url=profilem.php?email=$email&department=$department");
}
}

?>