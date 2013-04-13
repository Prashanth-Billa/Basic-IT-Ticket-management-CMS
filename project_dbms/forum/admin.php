<?php
//signin.php
include_once 'connect.php';
include_once 'header.php';
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['user_level']== 1)
{
	echo '<p> 
	Welcome Administrator, '
	 .htmlentities($_SESSION['uuser']) . '	| 
	<a href="signout.php">Log Out</a></p> ';
	
	echo'
					  <p>You can delete posts and create new categories by visiting the respective pages</p>';


if (isset($_GET['delete']))
{ 
         echo '<h3><img src="icons/delete.gif" /> Deleting cat</h3>';
       
         if ($_GET['con'] == 0)
		 {?>
         <span style="font-size:14px;">Please confirm you'd like to delete the cat.<br /></span> - <a href="?delete&thread=<?php echo $_GET['id']; ?>&con=1">Confirm</a> | <a href="index.php">Cancel</a>
         <?php 
         } 
		 elseif ($_GET['con'] == 1) 
		 { 


		mysql_query("DELETE FROM categories WHERE cat_id='$_GET[thread]'") or die(mysql_error());
		
		echo "<span style='color:green; font-weight:bold;'>Reply deleted</a>";
		}
	}
	
	
	if (isset($_GET['deletetopic']))
{ 
         echo '<h3><img src="icons/delete.gif" /> Deleting Reply</h3>';
       
         if ($_GET['con'] == 0)
		 {?>
         <span style="font-size:14px;">Please confirm you'd like to delete the topic.<br /></span> - <a href="?deletetopic&thread=<?php echo $_GET['id']; ?>&con=1">Confirm</a> | <a href="index.php">Cancel</a>
         <?php 
         } 
		 elseif ($_GET['con'] == 1) 
		 { 


		mysql_query("DELETE FROM topics WHERE topic_id='$_GET[thread]'") or die(mysql_error());
		
		echo "<span style='color:green; font-weight:bold;'>Reply deleted</a>";
		}
	}
	
	if (isset($_GET['deletepost']))
{ 
         echo '<h3><img src="icons/delete.gif" /> Deleting Reply</h3>';
       
         if ($_GET['con'] == 0)
		 {?>
         <span style="font-size:14px;">Please confirm you'd like to delete the post.<br /></span> - <a href="?deletepost&thread=<?php echo $_GET['id']; ?>&con=1">Confirm</a> | <a href="index.php">Cancel</a>
         <?php 
         } 
		 elseif ($_GET['con'] == 1) 
		 { 


		mysql_query("DELETE FROM posts WHERE post_id='$_GET[thread]'") or die(mysql_error());
		
		echo "<span style='color:green; font-weight:bold;'>Reply deleted</a>";
		}
	}
	//display forum stats:
	
	echo '
		
		<h1>Forum Stats<h1>
		<table id="forumlist"> 
		<tr> 
	<th>category &#8212; <a href="create_cat.php" class="new-topic">Add New &raquo;</a></th> 
	
	<th>Num</th> 
	
</tr>
      
			  ';	
			  echo '<tr>';
			  echo '<td>';
								echo 'No. of users';
				echo '</td>';
				
				  echo '<td>';
				  $mysql1=mysql_query( "SELECT *
								FROM
									users
								");
								
								$num1=mysql_num_rows($mysql1);
								echo $num1;
				echo '</td>';
				
			echo '</tr>';
			
			
			
			
			  echo '<tr>';
			  echo '<td>';
								echo 'No. of categories';
				echo '</td>';
				
				  echo '<td>';
											  $mysql2=mysql_query( "SELECT *
								FROM
									categories
								");
								
								$num2=mysql_num_rows($mysql2);
								echo $num2;
				echo '</td>';
				
			echo '</tr>';
			
			
			
			
			
			  echo '<tr>';
			  echo '<td>';
								echo 'No. of topics';
				echo '</td>';
				
				  echo '<td>';
										  $mysql3=mysql_query( "SELECT *
								FROM
									topics
								");
								
								$num3=mysql_num_rows($mysql3);
								echo $num3;
				echo '</td>';
				
			echo '</tr>';
			
			
			
				  echo '<tr>';
			  echo '<td>';
								echo 'No. of posts';
				echo '</td>';
				
				  echo '<td>';
											  $mysql4=mysql_query( "SELECT *
								FROM
									posts
								");
								
								$num4=mysql_num_rows($mysql4);
								echo $num4;
				echo '</td>';
				
			echo '</tr>';
			
			
			
			
			
		
		echo'
					  </table> ';
	
	
		

}
include 'footer.php';
?>