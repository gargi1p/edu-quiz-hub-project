<?php
session_start();
require_once("config.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playlists</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
    <?php include 'sidebar.php'; ?>  
        <div class="main-">
            <div class="header">
                <h2>E-learning</h2>
            </div>
        <div class="info">
            <h1>Playlist Videos</h1>
            <div class="box-container">

            <?php
              $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
              if($conn){
              
                $course_id = $_GET['course_id'];
                $sql = "select * from videos where course_id=$course_id"; 
              
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($query)){

            ?>

            <a class="box" href="video.php?link=<?php echo $row['youtube_link'] ?>">
                <img src="img/<?php echo $row['thumbnail'] ?>">
                <h3><?php echo $row['name'] ?></h3>
            </a>

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
        <h2>"Ready to Test Yourself? Start Your Quiz Now!"</h2>
        <a href="quiz.php?course_id=<?=$course_id?>">Start Your Quiz</a>
    </div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</body>
</html>