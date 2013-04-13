<?php
//category.php
include 'connect.php';
include 'header.php';
include 'functions.php';
session_start();

//first select the category based on $_GET['cat_id']
$sql = "SELECT
			cat_id,
			cat_name,
			cat_description
		FROM
			categories
		WHERE
			cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
	echo 'The category could not be displayed, please try again later.' . mysql_error();
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'This category does not exist.';
	}
	else
	{
		//display category data
		while($row = mysql_fetch_assoc($result))
		{
			echo '<h2>Topics in &prime;' . $row['cat_name'] . '&prime; category</h2><br />';
		}
	
		//do a query for the topics
		$sql = "SELECT	
					topic_id,
					topic_subject,
					topic_date,
					topic_cat,
					topic_by,
					user_name
				FROM
					topics
						LEFT JOIN
						users
					ON
						topics.topic_by = users.user_id
				
				WHERE
					topic_cat = " . mysql_real_escape_string($_GET['id']);
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'The topics could not be displayed, please try again later.';
		}
		else
		{
			if(mysql_num_rows($result) == 0)
			{
				echo 'There are no topics in this category yet.';
			}
			else
			{
				//prepare the table
				echo '<table id="forumlist" role="main"> 
<tr> 
	<th>Topic &#8212; <a href="create_topic.php" class="new-topic">Add New &raquo;</a> 
</th> 
<th>author</th> 
	<th>created</th> 
</tr>';	
					$count=1;
				while($row = mysql_fetch_assoc($result))
			{			$count++;
		if($count%2==0)
			echo '<tr >';
			else 
			echo
			 '<tr class="alt">';
						echo '<td >';
							echo '<a href="topic.php?id=' . $row['topic_id'] . '">' . $row['topic_subject'] . '</a><br />';
								?><?php if(isadmin()== 1){ ?>
  
    <?php deletedisp(0,$row['topic_id'],0); ?>
  
  <?php }
  
  
						echo '</td>';
						
						echo '<td >';
							echo '<a href="profile.php?userid=' . $row['user_name'] . '">' . $row['user_name'] . '</a><br />';
						echo '</td>';
						
						
						echo '<td class="num">';
							echo date('d-m-Y', strtotime($row['topic_date']));
						echo '</td>';
					echo '</tr>';
				}
			}
			
			echo'
					  </table> 
			  </div> 
 
 
	
			  
			  ';
			  
			  
			  
		}
	}
}

include 'footer.php';
?>
