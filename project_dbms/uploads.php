<!DOCTYPE html>
 <?php
 session_start();
 if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
 if(!isset($_GET['auth']))
{
echo "<div align="; echo "center><b><font color=";echo "red>You must first login to upload . thank you. Redirecting...</b></font><img src='images/loader.gif'></img></div> ";

header("refresh:2;url=index.php");

if(!isset($_GET['email']) || !isset($_GET['auth']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.01;url=index.php");
}


}
 include ('connect.php');
 $q = "SELECT DISTINCT department from ticket ";
 $r = mysql_query($q);
 $department = $_GET['department'];
 ?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
         <LINK REL="StyleSheet" HREF="home.css" TYPE="text/css" MEDIA="screen"/>
            <script src="js/upload.js" type="text/javascript"></script> 
       <script src="js/jquerylatest.js" type="text/javascript"></script>
    <script src="js/register.js" type="text/javascript"></script>
        
        <title>file uploads</title>
        
    </head>
    <body onload="dfs();">
        <div id="uploadhead" align="center">
            <img src="images/uploadtitle.jpg" style="border:none"/><br/>
              <b>upload your file here   </b><span>   </span><font color="#C8BBBE"><b></b></font>
            <div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
        </div><br/>
        <br/>
        <br/>
        <div id="upload" align="center" >
            
            <br/><br/>
            <form name="upform" enctype="multipart/form-data" method="post" action="upload.php?department=<?php echo $department ?>" >
         <input type="hidden" name="MAX_FILE_SIZE" value="1000000000" />
 <br>
            <input type="file"  size="40"  name="file" id="file"/>
Department :      <span>
   <?php echo "<b><font color='green'>".$_GET['department']."</font> </b>"; ?>
    </span>
	<br><br><br>			<input type="submit" name="submit" value="Upload" style="color:#717D7D" class="qq"/> <input type="reset" style="color:#717D7D" value="cancel" class="qq"/>
                <br/>
                <br/>
            </form>
          
        </div>
      
    </body>
</html>
 

