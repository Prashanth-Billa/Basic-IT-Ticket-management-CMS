<?php
//create_cat.php
include 'connect.php';
include 'header.php';
include 'functions.php';
session_start();

			
$defImg = '';


$sql = "SELECT
			topic_id,
			topic_subject
		FROM
			topics
		WHERE
			topics.topic_id = " . mysql_real_escape_string($_GET['id']);
			
$result = mysql_query($sql);

if(!$result)
{
	echo 'The topic could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This topic doesn&prime;t exist.';
	}
	else
	{
		echo '
			<div id="ajax-response"></div> 
<ol id="thread" class="list:post">
';
					
					
		while($row = mysql_fetch_assoc($result))
		{
			//display post data
			echo '
			<h2 class="topictitle">' . $row['topic_subject'] . '</h2> 
			<br /><br /><br />';
		
			//fetch the posts from the database
			$posts_sql = "SELECT
						posts.post_topic,
						posts.post_id,
						posts.post_content,
						posts.post_date,
						posts.post_by,
						users.user_id,
						users.user_name,
						users.user_email
					FROM
						posts
					LEFT JOIN
						users
					ON
						posts.post_by = users.user_id
					WHERE
						posts.post_topic = " . mysql_real_escape_string($_GET['id']);
						
			$posts_result = mysql_query($posts_sql);
		
			if(!$posts_result)
			{
				echo '<tr><td>The posts could not be displayed, please try again later.</tr></td></table>';
			}
			else
			{
			
				while($posts_row = mysql_fetch_assoc($posts_result))
				{	$eMail = $posts_row['user_email'];
				$avatar = new Gravatar($eMail, $defImg);
$avatar->setSize(50);
$avatar->setRating('G');
$avatar->setExtra('alt="my gravatar"');
					echo '
					
						<li id="post-5"> 
		<div id="position-1"> 
			<div class="threadauthor"> 
';echo $avatar->toHTML();
	echo '
			<p> 
					
					<strong><a href="profile.php?userid='.$posts_row['user_name'].'">'. $posts_row['user_name'] .'</a></strong> 
				</p> 
			</div> 
			<div class="threadpost"> 
						<div class="post">' . stripslashes($posts_row['post_content']) . '
 

</div> 
				<div class="poststuff">' . date('d-m-Y H:i', strtotime($posts_row['post_date'])) . '';
?>
  <?php if(isadmin()== 1){ ?>

  <?php deletedisp($posts_row['post_id'],0,0); ?>
  
  <?php }
echo'				</div> 
			</div> 
		</div>	</li> 
		<br />
		
	              ';
				}
				echo '</ol>';
			}
			
			if(!$_SESSION['loggedin'])
			{
				echo '<tr><td colspan=2>You must be <a href="signin.php">signed in</a> to reply. You can also <a href="signup.php">sign up</a> for an account.';
			}
			else
			{
				//show reply box
				echo '<table width="100%">
				<h2>Reply:</h2><br />
					<form method="post" action="reply.php?id=' . $row['topic_id'] . '">
						<textarea name="reply-content"></textarea><br /><br />
						<input type="submit" value="Submit reply" />
					</form>';
			}
			
			//finish the table
			echo '</table>';
		}
	}
}

include 'footer.php';
?>