<?php

include("connect.php");





$uploaddir = 'uploads/';
$uploadfile = $uploaddir . basename($_FILES['file']['name']);

$filename=$_FILES['file']['name'];
$filesize=$_FILES['file']['size'];
$filetype=$_FILES['file']['type'];
$tmp_name = $_FILES['file']['tmp_name'];







echo "<p>";

if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
$uploaddata = fopen($uploadfile, "rb");
$dept = $_GET['department'];
 $uploadins=mysql_query("INSERT INTO uploads (type,size,name,data,department)VALUES ('$filetype','$filesize','$filename','$uploaddata','$dept')");
 if($uploadins)
 {
 echo "File was successfully uploaded.\n";
  echo "</p>";
echo '<pre>';
echo 'Thanks for uploading . Keep uploading in future . ';
echo '<br>';
echo 'Below is the information regarding the Uploaded file';
echo '<br>';
echo '<br>';


print_r($_FILES);
header('Refresh: 3;url=index.php');
print "</pre>";
} else {
   echo "Upload failed. Sorry for the inconvenience.   . ";
  header('Refresh: 1;url=uploads.php');
}


}


?> 