<?php

include './login/config.php';  



session_start();

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
  header("location: ./login/login.php");
  exit;
}
$username= ($_SESSION['username']);


if($_SERVER["REQUEST_METHOD"] == "POST"){

$param_dealerid = trim($_POST["dealerid"]);
$param_region = trim($_POST["region"]);
$param_vegname= trim($_GET['vegname']);
$param_quantity= (isset($_POST["quantity"]) ? $_POST['quantity'] :0);     // BEACUSE IT WAS GIVING NULL ERROR

$param_username=trim($_SESSION['username']);


$stmt = mysqli_prepare($link, "INSERT into cart (username,vegname,dealerid,region,quantity) values (?,?,?,?,?)");
mysqli_stmt_bind_param($stmt, "sssss",$param_username,$param_vegname,$param_dealerid,$param_region,$param_quantity);
// Attempt to execute the prepared statement
//echo $stmt;
if(mysqli_stmt_execute($stmt)){

            // Redirect to login page

            header("location: ./loggedin.php");

        } else{
          printf("Error: %s.\n", mysqli_stmt_error($stmt));
          //  echo "Something went wrong. Please try again later.";

        }

        mysqli_stmt_close($stmt);




 mysqli_close($link);



}



?> 