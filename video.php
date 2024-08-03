<?php
session_start();
require_once("config.php");




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video</title>
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
            <h1>Play Video</h1>

            <?php
            $link = $_GET['link'];
            ?>


            <iframe src="https://www.youtube.com/embed/<?php echo $link; ?>" frameborder="0" width="100%" height="500px"></iframe>
               
        </div>
    </div>
</div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</body>
</html>