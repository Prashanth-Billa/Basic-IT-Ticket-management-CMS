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
	header("location:index.php");
}
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         <LINK REL="StyleSheet" HREF="css/home.css" TYPE="text/css" MEDIA="screen"/>
           
       <script src="js/jquerylatest.js" type="text/javascript"></script>
    <script src="js/register.js" type="text/javascript"></script>
        <title>Mail</title>
    </head>
    <body bgcolor="	#EBDDE2">
        <div align="center">
            <br/>
            <h2><font color="#150517">Email service</font></h2>
            <br/>
            <br/>
           </div>
        <div align="center" style="color:white;background:#302226" >
            You are sending the email from address : <?php  echo $_GET['email']  ?> 
        </div>
        <br/>
        <br/>
        <div align="center">
            <form action="" method="post">
         <fieldset style="width:450px;margin:0 auto;"><legend align="center">to</legend><input type="email" name="toemail" size="50" class="pos"/><br/></fieldset>
            <br/>
          <fieldset style="width:450px;margin:0 auto;"><legend align="center">Subject</legend> <input type="text" size="50" name="tosubject" class="pos"/>
            <br/></fieldset><br/>
            
          
           <fieldset  style="width:450px;margin:0 auto;"><legend align="center">message</legend><br/><br/>
            <textarea name="tomessage" rows="15" class="pos" cols="35">
                
            </textarea>
            <br/>
            <br/>
            <input type="submit" size="10"  style="color:white;border:none;background:#150517;cursor:pointer;" value="Send" />
            <br/><br/>
            </fieldset>
                </form>
            
            
            
            
            
            
            
        </div>
    </body>
</html>
<?php

$to=$_POST['toemail'];  


$subject=$_POST['tosubject'];


$header="From: ".$_GET['email'];


$messages= $_POST['tomessage'];


$sentmail = mail($to,$subject,$messages,$header); 
if(!empty($to) && !empty($subject))

{
if($sentmail)
{
echo "<script type='text/javascript'> alert('Mail Sent successfully');</script>";
	header("refresh:0.01;url=index.php");
}
else
{
echo "<script type='text/javascript'> alert('Failed. Please try again later');</script>";
	header("refresh:0.01;url=index.php");
}
}
?>
