<?php
require_once("config.php");

$user_id = $_SESSION['user_id'];

$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

  $sql = "select * from users where id='$user_id'"; 

  $query = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($query);
}else{
echo mysqli_connect_error();
die();
}

?>

<div class="sidebar">
    <div class="upper">
        <img src="img/profile.png" width="60px" alt="profile">
        <h2> <?php echo $result['name']; ?></h2>
        <?php echo $result['email']; ?>
    </div>
       
    <ul>
        <li><a href="home.php"><i class="fas fa-home"></i>Home</a></li>
        <li><a href="scoreboard.php"><i class="fas fa-tasks"></i>Your Scores</a></li>
        <li><a href="rating.php"><i class="fas fa-star"></i>Rate Us</a></li>
        <li><a href="edit_profile.php"><i class="fas fa-user-edit"></i>Edit Profile</a></li>
        <li><a href="logout.php"><i class='fas fa-sign-out-alt'></i>Sign Out</a></li>
    </ul>    
</div>


   


