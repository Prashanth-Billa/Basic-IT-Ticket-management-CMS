<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
         <script src="js/jquerylatest.js" type="text/javascript"></script>
         <script src="js/register.js" type="text/javascript"></script>
        <title>Forgot your password? No problem we can fix it in 2 minutes..!</title>
    </head>
    <body style="color:black"  onload="document.getElementById('emailnow').focus();">
        <div align="center">
        <h3><font color="white">Forgot your password?</font></h3><br/>
          No problem ! We can fix it!
            <br/>
            <br/>
            </div><br/>
        <br/>
        <a href="index.php" style="color:black;text-decoration:none;"><h3>Home</h3></a>
        <div align="center">
            <form name="forgotpass" action="forgotps.php" method="post">
                <br>
           please enter your e-mail address :  <input type="email" name="emailtosend" id="emailnow" size="40" placeholder="your email" /><br/><br/>
                <input type="submit" value="Send me my password"/>
                <br/>
                
            
          </form>  
            
        </div>
    </body>
</html>
