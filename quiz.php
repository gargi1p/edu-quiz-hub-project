<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

    if(isset($_GET['course_id'])){  
        $course_id = $_GET['course_id'];    
    }else{
        $course_id = 1;
    }
   

    if(isset($_GET['ques_no'])){
        $ques_no = $_GET['ques_no'];
    }else{
        $ques_no = 1;
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        $question_id = $_POST['question_id'];
        $answer = $_POST['answer'];

        $user_id = $_SESSION['user_id'];
       

        $sql = "insert into answers (user_id, course_id, question_id, answer) values ($user_id, $course_id, $question_id, '$answer')";
        $query = mysqli_query($conn, $sql);

        if($query){

            if($ques_no == 5){

                    header("location:$baseURL/calc_score.php?course_id=$course_id");
               
            }else{
                $ques_no = $ques_no + 1;
                header("location:$baseURL/quiz.php?course_id=$course_id&ques_no=$ques_no");
            }

        }else{
            echo mysqli_error($conn);
            die();
        }

    }else{
        $offset = $ques_no - 1;

        $sql = "select * from questions where course_id=$course_id limit 1 offset $offset"; 

        $query = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($query);
    }
 
}else{
    echo mysqli_connect_error();
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="centre_div">
    <h3>Question<?php  echo $ques_no; ?> of 5</h3> 
       <p id="question">  <?php echo $result['question']; ?>  </p> 
        <form id="options" method="POST">
            <input type="hidden" name="question_id" value="<?php echo $result['id']; ?>" required> 
            <label>
                <input type="radio" name="answer" value="1" required>  <?php echo $result['option1']; ?>  
            </label>
            <label>
                <input type="radio" name="answer" value="2" required>  <?php echo $result['option2']; ?> 
            </label>
            <label>
                <input type="radio" name="answer" value="3" required>  <?php echo $result['option3']; ?> 
            </label>
            <label>
                <input type="radio" name="answer" value="4" required>  <?php echo $result['option4']; ?> 
            </label>

            <button id="ans-submit" class="submit" type="submit">
                <?php 
                    if($ques_no == 5){
                        echo "SUBMIT";
                    }else{
                        echo "NEXT";
                    }
                ?>   
            </button>
        </form>
   </div> 
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script> 
</body>
</html>