<?php
//signin.php
include 'connect.php';
include_once  'header.php';
include_once  'functions.php';
session_start();

$username=$_SESSION['uuser'];
$result = mysql_query("SELECT * FROM users WHERE user_name = '$username' ");
$row = mysql_fetch_array($result);
//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && !isset($_POST['user_pass_old']))
{


	echo '<h2>Change Password</h2>';
	echo '<form method="post" action="" class="cmxform">
			
			<fieldset>
			 <ol>
    <li>
      <label for="pass1">Old Password</label>
     <input type="password" name="user_pass_old">
	 <label for="pass1">New Password</label>
     <input type="password" name="user_pass_new">
	 <label for="pass1">New Password again</label>
     <input type="password" name="user_pass_new_check">
    </li>

  </ol>
  </fieldset>
			<input type="submit" value="Sign in" />
			</fieldset>
		 </form>';
	}
else
{
    
	$errors = array(); 
	
	if(isset($_POST['user_pass_old']))
	{
		//the user name exists
		if(sha1($_POST['user_pass_old'])!=$row['user_pass'])
		{
			$errors[] = 'password doesnt match';
		}
	
	}
	else
	{
		$errors[] = ' field must not be empty.';
	}
	
	
	if(isset($_POST['user_pass_new']))
	{
		if($_POST['user_pass_new_check'] != $_POST['user_pass_new'])
		{
			$errors[] = 'The two passwords did not match.';
		}
	}
	else
	{
		$errors[] = 'The password field cannot be empty.';
	}
	
	if(!empty($errors)) 
	{
		echo 'Uh-oh.. a couple of fields are not filled in correctly..<br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value) 
		{
			echo '<li>' . $value . '</li>'; 
		}
		echo '</ul>';
	}
	else
	{
		$sql = "
						
						UPDATE users SET user_pass='" . sha1($_POST['user_pass_new']) . "' where user_name ='$username'
						";
						
		$result = mysql_query($sql);
		if(!$result)
		{
			
			echo 'Something went wrong. Please try again later.';
			
		}
		else
		{signout();
			echo 'Succesfully changed. You can now <a href="signin.php">sign in</a> again! :-)';
		}
	}
}


include 'footer.php';
?>