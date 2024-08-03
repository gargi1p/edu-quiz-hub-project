<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scores</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
   <div class="wrapper"> 
   <?php include 'sidebar.php'; ?> 
      <div class="main">
           <h1 style="color: #656d4a; margin-bottom:40px" >Quiz Scores</h1>
             <?php
              $user_id = $_SESSION['user_id'];
              $course_id = $_GET['course_id'];

               $sql = "select * from scores where user_id = $user_id and course_id=$course_id order by id desc";
               $query = mysqli_query($conn, $sql);

                if(mysqli_num_rows($query)>0):
    
    
                 $result = mysqli_fetch_assoc($query);

    
              ?>

            <h2 style="text-align: center;"> Your Score is:</h2><br> 
            <h2 style="text-align: center;">  <?php echo $result['score']; ?>  </h2>
            <div class="summary">
               <h2>Summary -</h2>
               <h3>Total Attempted Questions: <?php echo $result['correct_ans'] + $result['wrong_ans']; ?></h3>
               <h3>Correct Answers: <?php echo $result['correct_ans']; ?></h3>
               <h3>Wrong Answers: <?php echo $result['wrong_ans']; ?></h3>
            </div>
            <div class="suggestion">
                <?php if($result['score']<4): ?>
                   <h2>Keep practicing, you'll improve!</h2>
                <?php elseif($result['score']>=4 && $result['score']<8): ?>
                   <h2>Well done, keep up the good work!</h2>
                <?php elseif($result['score']>8): ?>
                   <h2>Congratulations, outstanding performance!</h2>
                <?php else: ?>
                   <h2>No Scores Available.</h2>
                <?php endif; ?>
            </div>

        <?php else:?>
           <h2 style="margin:140px 40px ; text-align:center">You have not attempted this course yet.</h2>
        <?php endif; ?>
      
        </div>
    </div>  
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</body>
</html>