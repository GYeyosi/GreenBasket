<?php

include './login/config.php';  



session_start();

 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
  header("location: ./login/login.php");
  exit;
}
$username= ($_SESSION['username']);
$total=0;
$name=$email =$city=$zip=$phone=$street=$flat=$role="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	/*
$param_name = trim($_POST["name"]);
 $param_email = trim($_POST["email"]);
 $param_city = trim($_POST["city"]);
 $param_zip = trim($_POST["zip"]);
 $param_phone = trim($_POST["phone"]);
 $param_street = trim($_POST["street"]);
 $param_flat = trim($_POST["flat"]);
*/
$param_username=trim($_SESSION['username']);
$result= mysqli_query($link,"SELECT c.username,count(c.username) as noofitems,sum(c.quantity*s.price) as total,c.paymentstatus,c.paymentat from cart c  join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region  where paymentstatus='no' and username='$param_username' group by c.username,paymentstatus,paymentat ");

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    	$total=$row["total"];
    }
}




$stmt = mysqli_prepare($link, "UPDATE cart set paymentstatus='yes' ,paymentat= CURRENT_TIMESTAMP where username='$param_username' and paymentstatus='no'");


if(!mysqli_stmt_execute($stmt)){
			echo "Error in Updating Cart";
	printf("Error: %s.\n", mysqli_stmt_error($stmt));
		}
  mysqli_stmt_close($stmt);
// Attempt to execute the prepared statement
//echo $stmt;


$stmt1 = mysqli_prepare($link,"INSERT into payment (username,paymentat,price) values('$param_username',CURRENT_TIMESTAMP,$total)" );
if(mysqli_stmt_execute($stmt1)){

            // Redirect to login page

            header("location: ./loggedin.php?payment=1");

        } else{
          printf("Error: %s.\n", mysqli_stmt_error($stmt1));
          //  echo "Something went wrong. Please try again later.";

        }

        mysqli_stmt_close($stmt1);




 mysqli_close($link);



}



?> 