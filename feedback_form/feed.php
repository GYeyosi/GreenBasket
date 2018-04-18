<?php


include '../login/config.php';
// Initialize the session
session_start();

$name=$email =$rating=$feedback="";

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}

$user= ($_SESSION['username']);


if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$param_name = trim($user);
 $param_email = trim($_POST["email"]);
 $param_rating = trim($_POST["rating"]);
 $param_feedback = trim($_POST["feedback"]);

 
$stmt = mysqli_prepare($link, "insert into  feedback (username,email,rating,feedback) values  (?,?,?,?)");
mysqli_stmt_bind_param($stmt, "ssss",$param_name,$param_email,$param_rating,$param_feedback);
//mysqli_stmt_execute($stmt);







 


// Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt)){

            // Redirect to login page
  # code...
         echo '<script>alert("Feedback has been recorded.");</script>';


            header("location: ../loggedin.php");

        } else{

            echo "Something went wrong. Please try again later.";

        }

        mysqli_stmt_close($stmt);




 mysqli_close($link);
}



?>


