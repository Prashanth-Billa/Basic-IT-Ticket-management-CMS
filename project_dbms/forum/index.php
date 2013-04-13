<?php
//create_cat.php
include 'connect.php';
include 'header.php';
include 'functions.php';
session_start();
if(!isset($_SESSION['uuser']))
{

	echo "<script type='text/javascript'> alert ('Please login') </script>";
	header("refresh:0.01;url=/project_dbms/index.php");
}
$sql = "SELECT
			categories.cat_id,
			categories.cat_name,
			categories.cat_description,
			COUNT(topics.topic_id) AS topics
		FROM
			categories
		LEFT JOIN
			topics
		ON
			topics.topic_id = categories.cat_id
		GROUP BY
			categories.cat_name, categories.cat_description, categories.cat_id";

$result = mysql_query($sql);
echo '<h2>Forums</h2><br /><br /> ';
if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result) == 0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		//prepare the table
		echo '
		
		
		<table id="forumlist"> 
		<tr> 
	<th>category &#8212; <a href="create_cat.php" class="new-topic">Add New &raquo;</a></th> 
	
	<th>Topics</th> 
	
</tr>

		
	
			  
			  ';	
			$count=1;
			while($row = mysql_fetch_assoc($result))
		{			$count++;
		if($count%2==0)
			echo '<tr ">';
			else 
			echo
			 '<tr class="alt">';
				echo '<td >';
					echo '<a href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h3>' .'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'. $row['cat_description'];
				?>
				<?php if(isadmin()== 1){ ?>
  
  
  <?php deletedisp(0,0,$row['cat_id']); ?>
  <?php } 
				echo '</td>';
				echo '<td class="num">';
				
				//fetch last topic for each cat
					$topicsql = "SELECT
									topic_id,
									topic_subject,
									topic_date,
									topic_cat
								FROM
									topics
								WHERE
									topic_cat = " . $row['cat_id'] . "
								ORDER BY
									topic_date
								DESC
								LIMIT
									1";
								
					$topicsresult = mysql_query($topicsql);
				
					if(!$topicsresult)
					{
						echo 'Last topic could not be displayed.';
					}
					else
					{
						if(mysql_num_rows($topicsresult) == 0)
						{
							echo 'no topics';
						}
						else
						{
							while($topicrow = mysql_fetch_assoc($topicsresult))
							echo '<a href="topic.php?id=' . $topicrow['topic_id'] . '">' . $topicrow['topic_subject'] . '</a> at ' . date('d-m-Y', strtotime($topicrow['topic_date']));
						}
					}
				echo '</td>';
			echo '</tr>';
			
		}

			  
			 include ('about.php');
	}
}


include 'footer.php';
?>
