<?php
session_start();
require_once("config.php");


if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    //user is logged in
}else{
    header("location:$baseURL/login.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="wrapper">
  <?php include 'sidebar.php'; ?>
    <div class="main-">
      <div class="header"><h2>E-learning</h2></div>
      <?php

              $user_id = $_SESSION['user_id'];

              $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
              if($conn){
              
                $sql1 = "select * from users where id='$user_id'"; 
              
                $query1 = mysqli_query($conn, $sql1);
                $result = mysqli_fetch_assoc($query1);
              }else{
            echo mysqli_connect_error();
            die();
            }

          ?>
      <div class="info">
        <h1>Hello! <?php echo $result['name'] ?> </h1>
        <p>Choose your learning course</p>
        <h1>All Courses Available</h1>
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
          <a href="playlist.php?course_id=<?php echo $row['id'] ?>" class="inline-btn">View Playlist</a>
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
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</body>
</html>