<?php
$dbhost = 'localhost'; 
$dbuser = 'root'; 
$dbpass = 'root'; 
$dbname = 'dbms_project'; 


 mysql_connect("$dbhost", "$dbuser", "$dbpass")   or die ("Could not connect to server :" . mysql_error()); 



$db = mysql_select_db("$dbname")   or die ("Could not select db :" . mysql_error()); 

session_start();


?>
