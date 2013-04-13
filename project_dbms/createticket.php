 <?php
include ("connect.php");
if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
	
if(!isset($_GET['email']) || !isset($_GET['auth']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.0001;url=index.php");
}

 if(!isset($_GET['auth']))
{
echo "<div align="; echo "center><b><font color=";echo "red>You must first login to create ticket . thank you. Redirecting...</b></font><img src='images/loader.gif'></img></div> ";

header("refresh:0.01;url=index.php");

}

$em = $_GET['email'];

?>
<html>
<head>
<style type="text/css">
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:890px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 2px #b7ddf2;
background:#ebf4fb;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}

#stylized label{
display:block;
font-weight:bold;
width:140px;
float:left;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized input{
float:left;
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 20px 10px;
}


</style>
<link rel="stylesheet" href="css/form.css" type="text/css" />
<link rel="stylesheet" href="css/button.css" type="text/css" />
<link rel="stylesheet" href="css/structure.css" type="text/css" />
<link rel="stylesheet" href="css/style.css" type="text/css" />
<script src="js/cticket.js" type="text/javascript"></script>
	<script src="js/jquerylatest.js" type="text/javascript"></script>
<script src="js/home.js" type="text/javascript"></script>
</head>
<body>
<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
<div align="center">
<h1><font color="green"> Create ticket </font></h1>
</div>
<div align="center" id="stylized" class="myform" >
<form name="createticket" onsubmit="return valid(this);" action="handlecreateticket.php?email=<?php echo $em ?>&department=<?php echo $_GET['department'] ?>" method="post">

             
			  <label>Name :<font color="red">*</font></label> <input type="text" id="name" name="fname" class="t" size="30" autocomplete="off" onfocus="this.style.background='#EBDDE2'" onblur=" this.style.background='white' "/>   
			  <br><br><br>

			  <label>Your Email address is : </label>  <?php echo "<b><font color='green'>".$_GET['email']."</font></b>" ?>
			  <br><br><br>
			  <label>Department : </label>  <?php  
			  
			  echo "<b>".$_GET['department']."</b>"; 
			  ?>
			  
			   <br><br><br>
			   <label>Problem statement <font color="red">*</font> </label> <input type="text" id="t1" name="problem" class="t" size="30" autocomplete="off" onfocus="this.style.background='#EBDDE2'" onblur=" this.style.background='white' "/>   
			    <br><br><br>
			  <label>Problem Description <font color="red">*</font> </label><br><br><textarea rows="10" class="op" cols="100" style="background-color:#FFF8C6" name="description" id="description"></textarea><br/>
			 
			
<span>
  
    </span>
<br>
	<input type="submit"  id="submitbutton" value="Submit Ticket" />
</form>
</div>
</body>

</html>