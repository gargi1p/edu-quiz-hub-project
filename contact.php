<?php 
session_start();
require_once("config.php");

$msg = '';



if($_SERVER['REQUEST_METHOD'] == 'POST'){


	if(isset($_POST['submit'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$number = $_POST['number'];
        $query = $_POST['query'];

		$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
		if($conn){
		
		$sql = "insert into contacts (name, email, number, query) values ('$name', '$email', '$number', '$query')"; 
		
		$query = mysqli_query($conn, $sql);

		if($query) {
             $msg= "Successfully sent.";
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
    <title>Contact</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>
<?php include 'header.php'; ?>
    <div class="sec">
        <img src="img/e-learning.svg" alt="e-learning">
        <div class="subsection">
            <h2>Drop Us A Issue</h2>
            <p style="color:green; text-align:center;"><?php echo $msg; ?></p>
            <form action="" method="post">
                <input type="text" name="name" placeholder="Enter Your Name" autocomplete="off" required="">
                <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" required="">
                <input type="number" name="number" placeholder="Enter Mobile no." required="">
                <textarea name="query" rows="5" cols="40" placeholder="Write Your Message Here" required=""></textarea>
                <button name="submit">Submit</button>
            </form>
        </div>
    </div>
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>         
</body>
</html>