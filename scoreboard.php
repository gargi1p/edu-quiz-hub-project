<?php
session_start();
require_once("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
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
                <h1><u>All Courses</u></h1>
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
                        <h3 class="title"><?php echo $row['name'] ?> Quiz</h3>
                        <a href="scores.php?course_id=<?php echo $row['id']; ?>" class="inline-btn">view scores</a>
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