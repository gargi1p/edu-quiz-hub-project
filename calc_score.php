<?php 
session_start();
require_once("config.php");
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($conn){

    $user_id = $_SESSION['user_id'];
    $course_id = $_GET['course_id'];

    $score = 0;
    $correct = 0;
    $wrong = 0;

    $sql = "select * from answers where course_id = $course_id and user_id=$user_id";
    $query = mysqli_query($conn, $sql);
   

    while($answer = mysqli_fetch_assoc($query)){
        $ques_id = $answer['question_id'];
        $ans = $answer['answer'];

        $sql1 = "select * from questions where course_id = $course_id and id=$ques_id";
        $query1 = mysqli_query($conn, $sql1);
        $result = mysqli_fetch_assoc($query1);

        if($result['correct_answer']== $ans){
            $correct++;
            $score++;
        }else{
            $wrong++;
        }
    }
    
    $_SESSION['score'] = $score;

    $sql = "insert into scores (user_id, course_id, score, correct_ans, wrong_ans) values ($user_id, $course_id, $score, $correct, $wrong)";
    $query = mysqli_query($conn, $sql);

    $sql = "delete from answers where course_id = $course_id and user_id=$user_id";
    $query = mysqli_query($conn, $sql);

    header("location:$baseURL/scores.php?course_id=$course_id");

}else{
    echo mysqli_connect_error();
    die();
}
?>