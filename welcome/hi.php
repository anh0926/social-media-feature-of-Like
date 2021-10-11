<?php
// Initialize the session
session_start();
echo '<br> <a href="en.php">English</a>';
 
// Check if the user is logged in, if not then redirect him to login page


$welcome_ini_array = parse_ini_file('../config.ini',true);

//include  server.php file
include('../server.php');
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike feature</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../main.css">
  
	
</head>
<body>
    <div class="page-header">
    <h1> <?php echo $welcome_ini_array['hi']['Hi']?> <b><?php echo $_SESSION["user"]; ?></b>.<?php echo $welcome_ini_array['hi']['welcome']?></h1>
    </div>	
  <div class="posts-wrapper">
   <?php foreach ($posts as $post): ?>
   	<div class="post">
      <?php echo $post['text']; ?>
      <div class="post-info">
	    <!-- if user likes post, style button differently -->
      	<i <?php if (userLiked($post['post_id'])): ?>
      		  class="fa fa-thumbs-up like-btn"
		  <?php else: ?>
      		  class="fa fa-thumbs-o-up like-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['id'] ?>"></i>
      	<span class="likes"><?php echo getLikes($post['post_id']); ?></span>
      	
      	&nbsp;&nbsp;&nbsp;&nbsp;

	    <!-- if user dislikes post, style button differently -->
      	<i 
      	  <?php if (userDisliked($post['post_id'])): ?>
      		  class="fa fa-thumbs-down dislike-btn"
			<?php else: ?>
      		  class="fa fa-thumbs-o-down dislike-btn"
      	  <?php endif ?>
      	  data-id="<?php echo $post['post_id'] ?>"></i>
      	<span class="dislikes"><?php echo getDislikes($post['post_id']); ?></span>
      </div>
   	</div>
   <?php endforeach ?>
  </div>
  <script src="scripts.js"></script>
</body>
</html>