
<?php
// Initialize the session
 include '../login/config.php';
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}

$username= ($_SESSION['username']);
echo $username;
if (isset($_POST['clearCart'])){
          
           $param_username= $_SESSION['username'];
            $stmt = mysqli_prepare($link,"delete from cart where username='$param_username' and paymentstatus='no'");
           
            if(mysqli_stmt_execute($stmt)){

            // Redirect to login page

                echo('<script>alert("Cart Cleared")</script>');

            } else{

               echo('<script>alert("Something went wrong. Please try again later.")</script>');

               }




            }


 

?>