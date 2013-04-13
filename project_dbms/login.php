<?php

session_start();


include("connect.php");




$myusername=mysql_real_escape_string($_POST['usernamelogin']); 
$mypassword=mysql_real_escape_string($_POST['passwordlogin']);
$time = time(); 
$salt = "aB1cD2eF3G";
$myepassword=sha1(md5($salt.$mypassword.$salt).$salt);




$sqly="SELECT * FROM registerdata WHERE email='$myusername' and password='$myepassword'";
$result=mysql_query($sqly);

$count=mysql_num_rows($result);


if($count>0){
$_SESSION['loggedin'] = 1; 
$loggedinvalue=1;
$il = "UPDATE registerdata SET logged = '$myusername' where email = '$myusername' ";
$ill = mysql_query($il) or die(mysql_error());
$_SESSION['uuser'] = $myusername;

$sql = "SELECT 
            user_id,user_name,user_level FROM
            users
          WHERE
            user_name = '$myusername'
          AND
            user_pass = '$myepassword'";
            
      $result = mysql_query($sql);
      if(!$result)
      {
        
        echo 'Something went wrong while signing in. Please try again later.';
      
      }
      else

    {
    
        if(mysql_num_rows($result) == 0)
        {
          echo 'You have supplied a wrong user/password combination. Please try again.';
        }
        else
        {
          //set the $_SESSION['signed_in'] variable to TRUE
          $_SESSION['loggedin'] = true;
          
        
          while($row = mysql_fetch_assoc($result))
          {
           $_SESSION['uid']  = $row['user_id'];
            $_SESSION['user_name']  = $row['user_name'];
            $_SESSION['user_level'] = $row['user_level'];
          }
    
          //echo 'Welcome, ' . $_SESSION['user_name'] . '. <br /><a href="index.php">Proceed to the forum overview</a>.';
        }
      }
    



setcookie('emailcookie',$myusername,time()+(3600*10));

echo "<b><font color='green'>Login successful. Please wait a moment</font></b><br><br><img src='images/loader.gif'/>";
header("refresh:1;url=loginsuccess.php");

header("location:loginsuccess.php");
}
else {


            echo "<div align='right' id='errorlogininfo'>";
            echo "    <div align='right'><img src='images/c.jpg' id='closeloginerror' style='border:none;padding:10px;margin:10px;cursor:pointer;'></img></div>";
        echo "<br></br><div align='center'>";
          
                        echo "<font color='red'><b>Your email or password is incorrect. Please try again. </b><br><a href='forgotpassword.php' style='text-decoration:none'><font color='#4E387E'>forgot password?</font></a>";
						
                echo "<br>";
                  echo "  Haven't registered? No problem. Registeration is quick and easy. It just takes a minute..!!<br>";
                  echo "  <a href='register2.php' style='color:#6A287E'><b>Register here</b></a>";
                       echo " </font><br><br>";
                      echo " <sub> Redirecting in 5 seconds</sub> ";    
                           
           echo " </div><br>";
              echo "  </div>";
			  header('Refresh: 4;url=index.php'); 
                    


}


?>