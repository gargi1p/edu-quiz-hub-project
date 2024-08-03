<?php

require_once("config.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
<?php include 'header.php'; ?>
    <div class="sec">
      <img src="img/e-learning.svg" alt="e-learning">
        <div class="box">
          <h1>Why Choose Us ?</h1>
          <p>we're committed to providing top-notch education that fits seamlessly into your busy lifestyle. Whether you're looking to enhance your professional skills, explore a new hobby, or pursue personal development, we've got you covered. Say goodbye to boring lectures and hello to interactive learning experiences! Our courses are packed with engaging multimedia content, interactive quizzes, ensuring that you stay motivated and actively involved in your learning journey.</p>
          <a href="courses.php">Our Courses</a>
        </div>  
    </div>
    <div class="sec2">
      <h2>Student's Reviews</h2>
      <div class="subsec2">
      <?php 
        
        require_once("config.php");

              $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
              
              
              $sql="SELECT * FROM `rating_reviews`";

              $query=mysqli_query($conn , $sql);

              
              while ($result = mysqli_fetch_array($query)) 

              {
      ?>
        <div class="box">
          <p><?php echo $result['review'] ?></p>
          <div class="student">
            <img src="img/profile.png" width="60px" alt="profile">
            <div class="details">
              <h3><?php echo $result['user_name'] ?></h3>
              <div class="rating">
                <ul class="list">
                <?php 
                             
                             $start=1;
                             while ($start <= 5) 
                             {
                             	if ($result['rating'] < $start) 
                                {
                                  ?>
                                 <li class="list_item">  <img src="img/blank_star.png" width="20px" height="18px"></li> 
                                 <?php  
                             	}else{
                             	 ?>
                                 <li class="list_item">  <img src="img/filled_star.webp" width="20px" height="20px"> </li>
                             	 <?php
                             	}

                             	$start++;
                             }
                            ?>  
                 </ul> 
              </div> 
          </div>
        </div>
      </div>
      <?php
                }
      ?>
    </div>
  </div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>
</html>