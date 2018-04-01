<?php

// Initialize the session

session_start();

 

// Unset all of the session variables

$_SESSION = array();

 

// Destroy the session.

session_destroy();
echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
header('Location:../index.php');  


 
?>

<p>Succesfully logged out </p>