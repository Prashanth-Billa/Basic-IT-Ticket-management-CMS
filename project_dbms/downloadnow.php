 <?php
 session_start();
 if($_SESSION['uuser']!=$_GET['email'])
{
	echo "<script type='text/javascript'> alert('Invalid access');</script>";
	header("refresh:0.0001;url=index.php");
}
 if(!isset($_GET['auth']))
{
echo "<div align="; echo "center><b><font color=";echo "red>You must first login to download . thank you. Redirecting...</b></font><img src='images/loader.gif'></img></div> ";

header("refresh:0.1;url=index.php");

if(!isset($_GET['email']) || !isset($_GET['auth']) || !isset($_SESSION['uuser']))
{
	echo "<script type='text/javascript'> alert('Please login');</script>";
	header("refresh:0.01;url=index.php");
}

}
?>
<!DOCTYPE html>

<html lang="en">
    <head>
<style type="text/css">
.cs{
border-spacing:10px;
cell-padding:10px;

margin:10px;
padding:10px;
background:thistle;
color:black;
border-color:lavender;
opacity:0.7;


}
.cs:hover{
opacity:1;
}
td{
opacity:0.7;
background:lavender;

}
td:hover{
opacity:1;
}
table{
border:none;
moz-border-radius:20px;
webkit-border-radius:20px;
border-radius:20px;
}


</style>
        <meta charset="utf-8" />
            <script src="js/jquerylatest.js" type="text/javascript"></script>
    <script src="js/register.js" type="text/javascript"></script>
        
        <title>Download page</title>
    </head>
    <body>
	<div align="left"><a href="index.php" style="color:	#C38EC7;text-decoration:none;"><b>Home</b></a>
        <div align="center">
            <h1><font color="green">Downloads for <?php echo "<b><font color='grey'>".$_GET['department']."</font></b>  "  ?>Department </font></h1>
            
       
        <br/>
        <br/>
        <br/>
        </div>
        <div align="center"><h2><font color="#25383C">HELP FILES</font></h2></div>
        <div align="left">
              
           <table  style="width:100%">
           <tr>
            <th width="5%" class="cs">No</th>
            <th width="50" class="cs">File</th>
             <th width="20" class="cs">Size(in MB)</th>
            <th width="30" class="cs">type</th>
           </tr
		   
             <?php

include ('connect.php');
$dept = $_GET['department'];
$q = "SELECT no, name, type, size, data FROM uploads where department = '$dept'";
$result = mysql_query($q);
while($row=mysql_fetch_array($result)){
$rf = $row['no'];
echo "</td><td>";
echo "<b>".$rf."</b>";
echo "</td><td>";

$data = $row['name'];
echo "<a href='uploads/".$data."'>".$data."</a>";
echo "</td><td>";
echo $row['size']/1048576;
echo "</td><td>";
echo $row['type'];
echo "</td><tr>";

}
echo "</table>";    
            
   ?>         
        </div>
        
    </body>
</html>