<?php 
session_start();
require_once("config.php");

$msg = '';


if($_SERVER['REQUEST_METHOD'] == 'POST'){



    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['name'];



	if(isset($_POST['submit'])){


		$rating = $_POST['rating'];
        $feedback = $_POST['feedback'];

		
		if($conn){
		
		$sql = "insert into rating_reviews (rating, review, user_id, user_name) VALUES ('$rating', '$feedback', '$user_id', '$user_name')";
		
		$query = mysqli_query($conn, $sql);

		if($query) {
             $msg= " Thankyou for rating.";
         }

		}else{
			echo mysqli_connect_error();
			die();
		}
	}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Us</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
    <div class="wrapper">
    <?php include 'sidebar.php'; ?>  
        <div class="main">
        <p style="color:green; margin:5px; text-align:center;"><?php echo $msg; ?></p>
        <form action="" method="post">
            <h1>Rate Us</h1>
            <div class="star">
            <input type="radio" id="star5" name="rating" value="5">
            <label for="star5"><img src="img/blank_star.png" width="40px" height="40px"></label>
            <input type="radio" id="star4" name="rating" value="4">
            <label for="star4"><img src="img/blank_star.png" width="40px" height="40px"></label>
            <input type="radio" id="star3" name="rating" value="3">
            <label for="star3"><img src="img/blank_star.png" width="40px" height="40px"></label>
            <input type="radio" id="star2" name="rating" value="2">
            <label for="star2"><img src="img/blank_star.png" width="40px" height="40px"></label>
            <input type="radio" id="star1" name="rating" value="1">
            <label for="star1"><img src="img/blank_star.png" width="40px" height="40px"></label>
            </div>
            <textarea name="feedback" rows="7" cols="50" placeholder="Write Your Message Here" required=""></textarea>
            <button name="submit">Submit</button>
        </form>
        </div>
    </div>  
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>        
</body>
</html>