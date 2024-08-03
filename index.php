<?php 
session_start();
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include("header.php");?> 
  <div class="wrapper">
    <div class="main_content">
      <div class="info">
        <h4>Start Your Learning Adventure Today!</h4>
        <p>Ready to embark on a journey of discovery and growth?<br> Sign up now and take the first step towards transforming your life through education.<br> With unlimited possibilities at your fingertips, the only limit is your imagination.<br> Let's learn, grow, and succeed together!</p>
        <h1>Our Courses</h1>
        <div class="box-container">

          <?php
              $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
              if($conn){
              
                $sql = "select * from courses"; 
              
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($query)){

          ?>

          <div class="box">
            <img src="img/<?php echo $row['image'] ?>">
            <h3 class="title">Complete <?php echo $row['name'] ?> Tutorial</h3>
            <a href="login.php" class="inline-btn">View Playlist</a>
          </div>

            <?php
                  
                }
               
              }else{
                  echo mysqli_connect_error();
                  die();
              }
            ?>

        </div>
      </div>
    </div>
  </div>
  <div class="box">
    <a href="login.php">View more courses</a>
  </div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>
</html>