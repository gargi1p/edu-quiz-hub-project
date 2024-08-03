<?php 
session_start();
require_once("config.php");

$msg = '';


if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    header("location:$baseURL/home.php");
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){


	if(isset($_POST['signup'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
		if($conn){
		
		$sql = "insert into users (name, email, password) values ('$name', '$email', '$password')"; 
		
		$query = mysqli_query($conn, $sql);

		if($query){
			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = mysqli_insert_id($conn);
			$_SESSION['name'] = $name;
			$_SESSION['email'] = $email;

			header("location:$baseURL/home.php");
		}else{
			$msg = "Can't signup right now. Try again later.";
		}
		
		}else{
			echo mysqli_connect_error();
			die();
		}
	}

    
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];

		$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
		if($conn){
		
		$sql = "select * from users where email='$email' and password='$password'"; 
		
		$query = mysqli_query($conn, $sql);

		if(mysqli_num_rows($query)> 0 ){

			$user = mysqli_fetch_assoc($query);

			$_SESSION['logged_in'] = true;
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['email'] = $user['email'];

			header("location:$baseURL/home.php");
		}else{
			$msg= "Invalid email or password.";
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
    <title>Login/SignUp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="centre_div">  
		<p style="color:red; margin:5px; text-align:center;"><?php echo $msg; ?></p>
		<div class="signup">
			<form action="" method="post">
				<h1>Sign up</h1>
				<input type="text" name="name" placeholder="User name" autocomplete="off" required="">
				<input type="email" name="email" placeholder="Email" autocomplete="off" required="">
				<input type="password" name="password" placeholder="Password" autocomplete="off" required="">
				<button type="submit" name="signup">Sign up</button><br>
			</form>
		</div>
        <div class="login">
			<form action="" method="post">
				<h1>Login</h1>
				<input type="email" name="email" placeholder="Email" autocomplete="off" required="">
				<input type="password" name="password" placeholder="Password" autocomplete="off" required="">
				<button type="submit" name="login">Login</button>
			</form>
		</div>
	</div>
</body>
</html>