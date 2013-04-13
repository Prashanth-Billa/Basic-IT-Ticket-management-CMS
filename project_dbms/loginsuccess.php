<html>
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
<body>
        <div id="viewp">
              <?php 
			  
              session_start();
if(isset($_SESSION['uuser']))
{
    include 'connect.php';

echo "Welcome <span>      </span><span>    </span>";
//echo $_COOKIE['nametodisplay1'];
echo "<span>   </span>";
//echo $_COOKIE['nametodisplay2'];
echo "<span>  </span>";
echo "<div align="; echo "left ><b><sub> ";  
echo "</sub></b> <sub><font color='green'>You are currently logged In as:";
echo "   ";
echo $_SESSION['uuser'];
echo "</font></sub></div>";

}
else
{
	header("location:index.php");
}
 
 
 
?>
            <span>    </span>
           
		
			<?php
			include ('connect.php');
			$em = $_SESSION['uuser'];
			$a = "SELECT department from registerdata where email ='$em'";
			$result = mysql_query($a);
			$rr = mysql_fetch_row($result);
			
			?>
			
			<h4><a href="profile.php?email=<?php echo $_SESSION['uuser'] ?>&department=<?php echo $rr[0] ?>" >Your Profile </a></h4>
			<h4><a href="users.php?auth=12345&email=<?php echo $_SESSION['uuser'] ?>&department=<?php echo $rr[0] ?>" >Manage users </a></h4>
			</div>
         <div id="header" width"20
		 
           <div id="indexpage" align="left" >
          <a HREF onClick="this.style.behavior='url(#default#indexpage)';this.setindexPage('http://www.google.com');" style="cursor:pointer"><img src="images/home.jpg" alt="make cluster fun your indexpage" title="make cluster fun your indexpage" width="30"/></a>
          <div id="container" align="right">
            <div id="topnav" class="topnav"><a href="logout.php" style="font-size:15px;text-decoration:none;cursor:hand"><font color="purple"><b>Logout</b></font> </a>|<span>      </span><a href="contact.php<?php if(isset($_SESSION['uuser'])) echo "?email=".$_SESSION['uuser']  ?>"" class="contactc" style="text-decoration:none"><span class="contactc"><b>Contact</b></span></a>|<span>       </span><a href="clusterfunmail.php<?php if(isset($_SESSION['uuser'])) echo "?email=".$_SESSION['uuser']  ?>&department=<?php echo $rr[0] ?>" style="text-decoration:none" class="contactc"><span class="contactc" ><b>Send mail</b></span></a>
     
    <div align="left" id="displate"  ><b>IT Ticket management system <span>    </span>
      </b></div>
   
    </div>   
                                
                                
      
  <fieldset id="signin_menu">
    <div id="close" align="right" style="cursor:hand"><img src="images/c.jpg" id="close" width="15" style="cursor:pointer;border:none" ></div>
    <form method="post" name="loginform" id="signin"  action="login.php">
      <label for="username"> email</label>
      <input id="usernamelogin" name="usernamelogin" value="" title="username" tabindex="4" type="text" style="color:#254117">
        <span id="user11" style="display:none">please enter your username</span>
      
     
        <label for="password">Password</label>
        <input id="passwordlogin" name="passwordlogin" value="" title="password" tabindex="5" type="password">
             <span id="passwr1" style="display:none">please enter your password</span>
             <span id="passwr2" style="display:none">your password is not valid</span>
     
      <p class="remember">
        <input id="signin_submit" style="border:none" value="Sign in" tabindex="6" type="submit">
        <input id="remember" name="setcookie" value="1" tabindex="7" type="checkbox">
        <label for="remember">Remember me</label>
      </p>
      <p class="forgot"> <a href="forgotpassword.php" id="resend_password_link">Forgot your password?</a> </p>
      Dont have an Id? <p class="register"><a href="register2.php"><font color="red">Register</font></a></p>
    </form>
  </fieldset>
                            
</div>
          </div>
        
            
                 
              <div align="right">
               
              
            </div>
            
        
            
          
         
        
             
            
        
   
        
         
    <script src="js/register.js"   type="text/javascript"></script>
        <script src="js/customsearch.js" type="text/javascript"></script>
        <script src="js/login.js" type="text/javascript"></script> 
        <script src="js/upload.js" type="text/javascript"></script> 
         <script src="js/home.js" type="text/javascript"></script> 
       
    
       
            
             <script src="js/hmenu.js" type="text/javascript"></script>              
        
        <div align="center" id="viewp" style="background:#C9C299">
		<table width="100%" border="0" cellspacing="0" cellpadding="15" id="mtable">
		<tr>
		<td>
			<table width="100%">
				<tr>
					<td width="50px" valign="top">
						<a class="op" href="createticket.php?email=<?php echo $_SESSION['uuser']?>&auth=101918171615141312&department=<?php echo $rr[0]  ?>" title="New Ticket"><img id="oppp1" src="./images/createticket.png" class="op" border="0" alt="New Ticket" width="100"></a>
					</td>
					<td valign="top">
						<div style="height:17px"><a class="opp" id="opp1" href="createticket.php?email=<?php echo $_SESSION['uuser']?>&auth=101918171615141312&department=<?php echo $rr[0]  ?>">
							<b>Create new Ticket</b></a>
						</div>
						<div style="padding-top:8px"><a href="createticket.php?email=<?php echo $_SESSION['uuser']?>&auth=101918171615141312&department=<?php echo $rr[0]  ?>">Ask question by creating a new ticket.</a> </div>

					</td>
				</tr>
			</table>
		</td>
				<td>
			<table width="100%">
				<tr>
					<td width="50px" valign="top">
						<a class="op" href="ticketview.php?email=<?php echo $_SESSION['uuser']?>&dept=<?php echo $rr[0]  ?>" title="View Ticket"><img src="./images/viewticket.png" id="oppp2" alt="View Ticket" width="130" height="150" border="0" class="op"></a>

					</td>
					<td valign="top">
						<div style="height:17px"><a id="opp2" class="opp" href="ticketview.php?email=<?php echo $_SESSION['uuser']?>&dept=<?php echo $rr[0]  ?>">
							<b>View Ticket</b></a>
						</div>
						<div style="padding-top:8px"><a href="ticketview.php?email=<?php echo $_SESSION['uuser']?>&dept=<?php echo $rr[0]  ?>">Browse and view your tickets here.</a></div>
					</td>
				</tr>

			</table>
		</td>
	</tr>

	<tr>
		<td><table width="100%">
		  <tr>
		    <td width="50px" valign="top"><a class="op" href="rssfeed.php" title="Announcement"><img id="oppp3" src="./images/forum.png" width="100" border="0" class="op" alt="Announcement"></a></td>
		    <td valign="top"><div style="height:17px"><a class="opp" id="opp3" href="rssfeed.php"> <b>Forum and Discussion</b></a> </div>
		      <div style="padding-top:8px"><a href="rssfeed.php">Browse and view our latest information.</a></div></td>
		    </tr>
		  </table>
		
		</td>
		<td>
			<table width="100%">
				<tr>

					<td width="50px" valign="top">
						<a class="opp" href="database.php" title="Knowledgebase"><img id="oppp4" src="./images/database.png" width="100" border="0" alt="Knowledgebase" class="op"></a>
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

		
		<td>&nbsp;</td>
	</tr>
	</table>
	</div>
		
		
		</div>
     <hr>
        <img src="images/upload.jpg" width="87"><a href="uploads.php?email=<?php echo $_SESSION['uuser'] ?>&auth=101918171615141312&department=<?php echo $rr[0] ?>"  title="Upload a file " class="upz"><b>Upload a file</b></a> | <img src="images/download.jpg" width="87"><a href="downloadnow.php?email=<?php echo $_SESSION['uuser'] ?>&auth=101918171615141312&department=<?php echo $rr[0] ?>" title="view the uploaded files and download them " id="downfil" class="upz"><b>Download a file</b></a> | <img src="images/feedback.jpg" width="87"><a href="feedback.php<?php if(isset($_SESSION['uuser']))echo "?email=".$_SESSION['uuser']?>" id="feedback" class="upz"><b>Feedback</b></a>
        
        
        
 </body>
 </html>