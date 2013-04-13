<?php
session_start();
if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
$d = $_GET['dept'];
$email = $_GET['email'];
$ql = "SELECT logged from registerdata where email=$email";
$qll = mysql_query($ql);
$qlll = mysql_fetch_row($qll);
if((empty($email) && $_GET['auth']=="no") || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('please login'); </script>";
	header("refresh:0.1;url=index.php");
}


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
#shiftb {
align:right;
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
 <script src="js/register.js" type="text/javascript"></script>
</head>
<body>
<div align="center">
<h1><font color="green"> View ticket </font></h1>
</div>


<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
            <div id="container" id="viewp">
<div align="center" id="stylized" class="myform">	
<form class="wufoo" name="viewticket" action="ticketviewhandler.php?auth=123&email=<?php echo $email?>&department=<?php echo $d ?>" onsubmit="return valid(this);" method="post">
<ul>
<li>
	   <label class="desc">Email:</label>
    <div>   
    <input class="field text medium" type="email" autocomplete="off" name="emailinput" size="30" value="" />              
	<p id="ea" style="display:none"><font color="red">please enter your email </font></p> </div>
</li>

<li>
	   <label class="desc">Ticket ID#:</label>
    <div>
    <input class="field text medium" type="text" autocomplete="off" name="ticket_id" size="30" value="" /></div>
</li>
<li>
<input type='hidden' name='step' value='1' />
<div class="buttons" align="center">
    <input type="submit" class="submitbutton" value ="View ticket" />
</div>


</li>
 
</form>

<form name='depttickets' method="post" action="ticketviewhandler.php?email=<?php echo $email ?>&department=<?php echo $d   ?>">
<?php
if(isset($d))
{
	echo "<br><b> --- Browse tickets in your department :   ".$d;
	echo "<input id='shiftb' type='submit' class='submitbutton' value ='View tickets in your department' class='positive'/>";
 echo "<input type='hidden' name='step' value='2' />";
}

 

?>
</form>

</div>
</body>

</html>
