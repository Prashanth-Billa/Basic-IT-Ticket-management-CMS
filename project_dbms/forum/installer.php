<?php
include "header.php";

/*$con = mysql_connect("localhost","root","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create database
if (mysql_query("CREATE DATABASE nanobb",$con))
  {
  echo "Database created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

// Create table
mysql_select_db("nanobb", $con);
$sql[1] = "CREATE TABLE users (
user_id 	INT(8) NOT NULL AUTO_INCREMENT,
user_name	VARCHAR(30) NOT NULL,
user_pass  	VARCHAR(255) NOT NULL,
user_email	VARCHAR(255) NOT NULL,
user_date	DATETIME NOT NULL,
user_level	INT(8) NOT NULL,
UNIQUE INDEX user_name_unique (user_name),
PRIMARY KEY (user_id)
)  
	";
	
	$sql[2] = "	CREATE TABLE categories (
cat_id 		 	INT(8) NOT NULL AUTO_INCREMENT,
cat_name	 	VARCHAR(255) NOT NULL,
cat_description 	VARCHAR(255) NOT NULL,
UNIQUE INDEX cat_name_unique (cat_name),
PRIMARY KEY (cat_id)
)
	 
	";
	
	$sql[3] = "CREATE TABLE topics (
topic_id		INT(8) NOT NULL AUTO_INCREMENT,
topic_subject  		VARCHAR(255) NOT NULL,
topic_date		DATETIME NOT NULL,
topic_cat		INT(8) NOT NULL,
topic_by		INT(8) NOT NULL,
PRIMARY KEY (topic_id)

)  
	";
	
	$sql[4] = "CREATE TABLE users (
user_id 	INT(8) NOT NULL AUTO_INCREMENT,
user_name	VARCHAR(30) NOT NULL,
user_pass  	VARCHAR(255) NOT NULL,
user_email	VARCHAR(255) NOT NULL,
user_date	DATETIME NOT NULL,
user_level	INT(8) NOT NULL,
UNIQUE INDEX user_name_unique (user_name),
PRIMARY KEY (user_id)
)  
	";
	
	$sql[5] = "CREATE TABLE posts (
post_id 		INT(8) NOT NULL AUTO_INCREMENT,
post_content		TEXT NOT NULL,
post_date 		DATETIME NOT NULL,
post_topic		INT(8) NOT NULL,
post_by		INT(8) NOT NULL,
PRIMARY KEY (post_id)
)  
	";
	
	$sql[6] = "ALTER TABLE topics ADD FOREIGN KEY(topic_cat) REFERENCES categories(cat_id) ON DELETE CASCADE ON UPDATE CASCADE";
	
	
		$sql[7] = "ALTER TABLE topics ADD FOREIGN KEY(topic_by) REFERENCES users(user_id) ON DELETE RESTRICT ON UPDATE CASCADE";
	
	
		$sql[8] = "ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE";
		
	$sql[9] = "ALTER TABLE posts ADD FOREIGN KEY(post_topic) REFERENCES topics(topic_id) ON DELETE CASCADE ON UPDATE CASCADE";

// Execute query
//for($i=1;$i<10;$i++)
mysql_query($sql[i],$con);
mysql_query($sql[2],$con);
mysql_query($sql[3],$con);
mysql_query($sql[4],$con);
mysql_query($sql[5],$con);
mysql_query($sql[6],$con);
mysql_query($sql[7],$con);
mysql_query($sql[8],$con);
mysql_query($sql[9],$con);


mysql_close($con);
*/
?>

 
<h2 id="register" role="main">Registration</h2> 
 <form action="#" class="cmxform"> 
<fieldset>
  <legend>Delivery Details</legend>
  <ol>
    <li>
      <label for="name">Name<em>*</em></label>
      <input id="name" />
    </li>
    <li>
      <label for="address1">Address<em>*</em></label>
      <input id="address1" />
    </li>
    <li>
      <label for="address2">Address 2</label>
      <input id="address2" />
    </li>
    <li>

    </li>
	
    <p><input type="submit" name="submit" value="Send Details" class="buttons"></p>

  </ol>
  
</fieldset>
</form>

</html> 
<?php include "footer.php";?>