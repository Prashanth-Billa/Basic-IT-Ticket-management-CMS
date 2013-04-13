<?php

session_start();
 

if (isset($_SESSION['loggedin'])) {
     header("Location:loginsuccess.php");
     die();   
     }
	 function getipaddress()
	 {
	 if ( isset($_SERVER["REMOTE_ADDR"]) )    { 
			$r = $_SERVER["REMOTE_ADDR"] . ' '; 
		} else if ( isset($_SERVER["HTTP_X_FORWARDED_FOR"]) )    { 
			$r = $_SERVER["HTTP_X_FORWARDED_FOR"] . ' '; 
		} else if ( isset($_SERVER["HTTP_CLIENT_IP"]) )    { 
			$r = $_SERVER["HTTP_CLIENT_IP"] . ' '; 
		} 
		return $r;
	 }

function checkConnection()
{
	
	$c = @fsockopen("www.google.com", 80, $errno, $errstr, 30);
	if ($c)
	{
		$status = "You are connected to Internet. IP: ";
		$status .= getipaddress();
		fclose($c);
		echo "<font color='green'>".$status."</font>";
	}
	else
	{
		$status = "You are not connected to the Internet<br/>\n";
		$f = 0;
		echo "<font color='red'>".$status."</font>";
	}
	
}
	checkConnection();
?>
                                
      <?php
	   if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
		echo "<a href='fblogout.php'><b>Logout</b></a>";
	   }
	  
	  ?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="keywords" content="    "/>
        
        <meta http-equiv="content-language" content="en"/>
      
       
        <LINK REL="StyleSheet" HREF="css/index.css" TYPE="text/css" MEDIA="screen"/>
        <LINK REL="StyleSheet" HREF="css/hmenu.css" TYPE="text/css" MEDIA="screen"/> 
        <LINK REL="StyleSheet" HREF="css/login.css" TYPE="text/css" MEDIA="screen"/>
       
 <link href="css/style.css" rel="stylesheet" type="text/css"/>
     
       


 <link href="css/jquery.css" rel="stylesheet" type="text/css"/>
 <link href="css/jcss.css" rel="stylesheet" type="text/css"/>
 <link href="css/jcss1.css" rel="stylesheet" type="text/css"/>
  <link href="css/style.css" rel="stylesheet" type="text/css"/>
    	<script src="js/jquerylatest.js" type="text/javascript"></script>
        <script src="/js/modernizr-newest.min.js"></script> 
  <script src="js/disearch.js" type="text/javascript"></script>
  <script src="js/index.js" type="text/javascript"></script>
        <script src="js/jquery-1.6.2.js" type="text/javascript"></script>
        <script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquerylatest.js" type="text/javascript"></script>
         
    <script src="js/register.js"   type="text/javascript"></script>
        <script src="js/customsearch.js" type="text/javascript"></script>
        <script src="js/login.js" type="text/javascript"></script> 
        <script src="js/upload.js" type="text/javascript"></script> 
         <script src="js/home.js" type="text/javascript"></script> 
       
    
       
            
             <script src="js/hmenu.js" type="text/javascript"></script>  
    

 
        <title>IT Service help desk</title>
    </head>
    
    <body onload="dat();logik();">
 
          <div id="header" width"20">
           <div id="indexpage" align="left">
          <a HREF onClick="this.style.behavior='url(#default#indexpage)';this.setindexPage('http://www.google.com');" style="cursor:pointer"><img src="images/home.jpg" alt="make cluster fun your indexpage" title="make cluster fun your indexpage" width="30"/></a>
              
           <input type="text" id="dattym" size="20" readonly="readonly"  title="today's time & day" align="right" />
                               <div id="container" align="right">
  <div id="topnav" class="topnav"><b>
  <?php
  if(isset($_COOKIE['registercookie']))
  {
  $value = $_COOKIE['registercookie'];
  echo "<font color='green'> you can log in now as $value </font>";
  }
  ?></b>  <a href="login" id="keyh" class="signin"><span id="signi"><b>Sign In</b></span></a> <a href="register1.php" style="text-decoration:none" class="contactc" id="regk"><span id="regg" ><b>Register</b></span> </a>|
  <span>      </span><a href="contact.php" class="contactc" style="text-decoration:none"><span class="contactc"><b>Contact</b></span></a>|<span>       </span><a href="clusterfunmail.php" style="text-decoration:none" class="contactc"><span class="contactc" ><b>Send mail</b></span></a>
    
    <div align="left" id="displate"  ><b><h1><font color="green">IT Ticket management system </font></h1><span>    </span>
      </b></div>
   
    </div>   
      
      

      <div align="center">
        <img id="image"/>
        <div id="name"></div>
      </div>
  <fieldset id="signin_menu">
    <div id="close" align="right" style="cursor:hand"><img src="images/c.jpg" id="close" width="15" style="cursor:pointer;border:none" ></div>
    <form method="post" name="loginform" id="signin"  action="login.php">
      <label for="username"> email</label>
      <input id="usernamelogin" name="usernamelogin" value="<?php if(isset($_COOKIE['registercookie'])) { echo $_COOKIE['registercookie'];}else echo ""  ?>" title="username" placeholder="your email" tabindex="4" type="text" style="color:#254117">
        <span id="user11" style="display:none">please enter your username</span>
      
     
        <label for="password">Password</label>
        <input id="passwordlogin" name="passwordlogin" value="" placeholder="your password" title="password" tabindex="5" type="password">
             <span id="passwr1" style="display:none">please enter your password</span>
             <span id="passwr2" style="display:none">your password is not valid</span>
     
      <p class="remember">
        <input id="signin_submit" style="border:none" value="Sign in" tabindex="6" type="submit">
        <!--<input id="remember" name="setcookie" value="1" tabindex="7" type="checkbox">-->
        <!--<label for="remember">Remember me</label>-->
      </p>
      <p class="forgot"> <a href="forgotpassword.php" id="resend_password_link">Forgot your password?</a> </p>
      Dont have an Id? <p class="register"><a href="register1.php"><font color="red">Register</font></a></p>
    </form>
  </fieldset>
                            
</div>
          </div>
        
            
                 
              <div align="right">
               
              
            </div>
            
        
            
          
         
        
             
            
        
   
        
               
        
        <div align="center" id="viewp" style="background:#C9C299">
		<table width="100%" border="0" cellspacing="0" cellpadding="15">
		<tr>
		<td>
			<table width="100%" class="onec">
				<tr>
					<td width="50px" valign="top">
						<a href="createticket.php?department=<?php echo $rr[0]  ?>" title="New Ticket"><img src="./images/createticket.png" id="oppp1" class="op" border="0" alt="New Ticket" width="100"></a>
					</td>
					<td valign="top">
						<div style="height:17px"><a id="opp1" href="createticket.php">
							<b>Create new Ticket</b></a>
						</div>
						<div style="padding-top:8px"><a href="createticket.php">Ask question by creating a new ticket.</a> </div>

					</td>
				</tr>
			</table>
		</td>
				<td>
			<table width="100%" class="twoc">
				<tr>
					<td width="50px" valign="top">
						<a class="op" href="ticketview.php?auth=no" title="View Ticket"><img src="./images/viewticket.png" id="oppp2" alt="View Ticket" width="130" height="150" border="0" class="op"></a>

					</td>
					<td valign="top">
						<div style="height:17px"><a class="opp" id="opp2" href="ticketview.php?auth=no">
							<b>View Ticket</b></a>
						</div>
						<div style="padding-top:8px"><a  href="ticketview.php?auth=no">Browse and view your tickets here.</a></div>
					</td>
				</tr>

			</table>
		</td>
	</tr>

	<tr>
		<td><table width="100%" class="threec">
		  <tr>
		    <td width="50px" valign="top"><a class="opp" href="rssfeed.php" title="Announcement"><img class="op" id="opp3" src="./images/forum.png" width="100" border="0" alt="Announcement"></a></td>
		    <td valign="top"><div style="height:17px"><a class="opp" id="opp3"href="rssfeed.php"> <b>Forum and Discussion</b></a> </div>
		      <div style="padding-top:8px"><a href="rssfeed.php">Browse and view our latest information.</a></div></td>
		    </tr>
		  </table>
		
		</td>
		<td>
			<table width="100%" class="fourc">
				<tr>

					<td width="50px" valign="top">
						<a href="database.php" title="Knowledgebase" class="opp"><img class="op" id="oppp4" src="./images/database.png" width="100" border="0" alt="Knowledgebase"></a>
					</td>
					<td valign="top">
						<div style="height:17px"><a class="opp" id="opp4" href="database.php">
							<b>Database</b></a>
						</div>
						<div style="padding-top:8px"><a href="database.php">You can find your questions and answers here.</a></div>

					</td>
				</tr>
			</table>
		</td>
	</tr>

	<tr>

		
		<td></td>
	</tr>
	</table>
	</div>
		
		
		</div>
     <hr>
        <img src="images/upload.jpg" width="87"><a href="uploads.php"  title="Upload a file " class="upz"><b>Upload a file</b></a> | <img src="images/download.jpg" width="87"><a href="downloadnow.php" title="view the uploaded files and download them " id="downfil" class="upz"><b>Download a file</b></a> | <img src="images/feedback.jpg" width="87"><a href="feedback.php" id="feedback" class="upz"><b>Feedback</b></a>
        
        
        
 </body>
 </html>
 