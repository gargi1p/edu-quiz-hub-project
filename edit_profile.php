<?php
session_start();
require_once("config.php");
$msg = '';

      if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if(isset($_POST['profile'])){
       
        $name = $_POST['name'];
        $email = $_POST['email'];

        $user_id = $_SESSION['user_id'];

        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if($conn){

        $sql = "update users set name='$name', email='$email' where id=$user_id";
        $query = mysqli_query($conn, $sql);
        if($query){
          $msg = "profile updated";
        }else{
          $msg = mysqli_error($conn);
        }
      }
    }
      
      if(isset($_POST['password'])){
     
       
        $old_pd = $_POST['old_pd'];
        $new_pd = $_POST['new_pd'];


        
        $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
        if($conn){

          $user_id = $_SESSION['user_id'];

          $sql = "select password from users where id=$user_id";
          $query = mysqli_query($conn, $sql);
          $user = mysqli_fetch_assoc($query);


          if($user['password']==$old_pd){
            $sql = "update users set password='$new_pd' where id='$user_id'";
            $query = mysqli_query($conn, $sql);
            if($query){
              $msg = "password changed";
            }else{
              $msg = mysqli_error($conn);
            }
          }else{
            $msg = "Invalid old password";
          }

        

      }
    }


        

    
  
    }
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
  <div class="wrapper">
  <?php include 'sidebar.php'; ?> 
    <div class="main">
      <h1><U>Edit Your Profile</U></h1>
      <div class="detail">
        <h3>Name:  <?php echo $result['name']; ?> </h3>
        <h3>Email:  <?php echo $result['email']; ?> </h3>
      </div>
      <p style="color:red"><?=$msg?></p>
      <details>
      <summary>Change Profile <i class="fa fa-caret-down"></i> </summary>
      <form action="" method="POST">
      <div class="dropdown-options">
        <input type="text" name="name" value="<?php echo $result['name']; ?>" placeholder="Enter Your Name" autocomplete="off" required="">
        <input type="email" name="email" value="<?php echo $result['email']; ?>" placeholder="Enter New Email" autocomplete="off" required="">
        <button name="profile">Save Changes</button>
      </div>
      </form>
      </details>
      <details>
      <summary>Reset Password <i class="fa fa-caret-down"></i> </summary>
      <form action="" method="POST">
      <div class="dropdown-options">
        <input type="password" name="old_pd" placeholder="Enter Old Password" autocomplete="off" required="">
        <input type="password" name="new_pd" placeholder="Enter New Password" autocomplete="off" required="">
        <button name="password">Save Changes</button>
      </div>
      </form>
      </details>
    </div>
  </div> 
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>         
</body>
</html>