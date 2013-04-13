<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
         <script src="js/jquerylatest.js" type="text/javascript"></script>
        <script src="js/register.js" type="text/javascript"></script>
        <script src="js/feedback.js" type="text/javascript"></script>
        <script src="js/rss.js" type="text/javascript"></script>
        <title>feedback - cluster fun</title>
		<script type='text/javascript'>
			
			function dotext()
			{
			var a = document.getElementById("textarea");
			a.value="";
			}
			function dotext1(){
				var a = document.getElementById("textarea");
			a.value="none";
			}
			
		</script>
    </head>
    <body bgcolor="#C9C299">
        
        <div align="center">
        <h2><b><font color="#2B1B17">Feedback</font></b></h2>
        </div>
        <br/>
        <br/>
        <br/>
        <div align="left">
            <a href="index.php" style="text-decoration:none"><b><font color="#2B1B17">HOME</font></b></a>
        </div>
            <br/>
            <br/><br/>
                <hr width="600px"/><br/>
        <p align="center"> <font face="" color="#250517"><b> We will be extremely pleased if you could kindly submit your feedback. We will definitely give it a serious consideration.
             Your identity  will be kept confidential.  Furthermore, your email id will not be disclosed.
             Thank you,
             
             </b></font></p>
             <br/><br/>
                <hr width="600px"/><br/>
            <div id="conta" align="center">
                <form name="feedbackform" action="" onsubmit="return checkfeed();" method="post">
            Rate our navigation system :<br/>
					<select name='navrate'>
					<option value="Excellent">Excellent</option>
					<option value="Good" selected>Good</option>
					<option value="Average">Average</option>
					</select>
                    <br><br>
            Rate our website performance : <br/>
                    <select name='perrate'>
					<option value="Excellent">Excellent</option>
					<option value="Good" selected>Good</option>
					<option value="Average">Average</option>
					</select>
                    
                    <br><br>
            Report problem <font color="red">*</font><br><textarea onblur="dotext1()" onclick="dotext()" rows="10" cols="30" style="background-color:#FFF8C6" name="message" id="textarea">none</textarea><br/><br/>
                 <div align="center" style="margin:auto">   Name<font color="red">*</font>:  <input type="text" name="namek" size="30"/>
              Your Email address <?php  echo "<b>".$_GET['email']."</b>" ?><br/>
                </div>
             <br/>
               
            
            <input type="submit" value="SUBMIT FEEDBACK" /> <input type="reset" value="clear" /></div>
            </form>
            </div>
    </body>
</html>

<?php 
include("connect.php");
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

$name = mysql_real_escape_string($_POST['namek']);
$email = mysql_real_escape_string($_GET['email']);
$message = mysql_real_escape_string($_POST['message']);
$navrate=mysql_real_escape_string($_POST['navrate']);
$perrate=mysql_real_escape_string($_POST['perrate']);



if(!empty($_GET['email']) && !empty($message))
{
mysql_query("INSERT into feedback (name, email, comment, navigation, performance) VALUES ('$name', '$email', '$message','$navrate','$perrate')") or die(mysql_error());
echo "<script type='text/javascript'> alert('Thank you for your feedback ')</script>";
header("refresh:0.5;url=index.php");
}




?>