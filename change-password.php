<?php 
session_start();
 
 $user= ($_SESSION['username']);
$valid = true;
$error = [];
$form_data = [];
 
if(!empty($_POST['old_password']))
{
    $old_password = $_POST['old_password'];
    $old_password_data = array("old_password" => $old_password);
    $form_data = array_merge($form_data, $old_password_data);
    $old_password_error = array("old_password_error" => "");
    $error = array_merge($error, $old_password_error);
}
else
{
    $valid = false;
    $old_password = "";
    $old_password_data = array("old_password" => $old_password);
    $form_data = array_merge($form_data, $old_password_data);
    $old_password_error = array("old_password_error" => "* Old password is required.");
    $error = array_merge($error, $old_password_error);
}
 
if(!empty($_POST['new_password']))
{
    $new_password = $_POST['new_password'];
    $new_password_data = array("new_password" => $new_password);
    $form_data = array_merge($form_data, $new_password_data);
    $new_password_error = array("new_password_error" => "");
    $error = array_merge($error, $new_password_error);
}
else
{
    $valid = false;
    $new_password = "";
    $new_password_data = array("new_password" => $new_password);
    $form_data = array_merge($form_data, $new_password_data);
    $new_password_error = array("new_password_error" => "* New password is required.");
    $error = array_merge($error, $new_password_error);
}
 
if(!empty($_POST['confirm_password']))
{
    $confirm_password = $_POST['confirm_password'];
    $confirm_password_data = array("confirm_password" => $confirm_password);
    $form_data = array_merge($form_data, $confirm_password_data);
    $confirm_password_error = array("confirm_password_error" => "");
    $error = array_merge($error, $confirm_password_error);
}
else
{
    $valid = false;
    $confirm_password = "";
    $confirm_password_data = array("confirm_password" => $confirm_password);
    $form_data = array_merge($form_data, $confirm_password_data);
    $confirm_password_error = array("confirm_password_error" => "* Confirm password is required.");
    $error = array_merge($error, $confirm_password_error);
}
 
if($new_password != '' && $confirm_password != '')
{
    if($new_password != $confirm_password)
    {
        $valid = false;
        $confirm_password_error = array("confirm_password_error" => "* Confirm password is same as new password.");
        $error = array_merge($error, $confirm_password_error);
    }
 
    if($new_password == $confirm_password)
    {
        $confirm_password_error = array("confirm_password_error" => "");
        $error = array_merge($error, $confirm_password_error);
    }
}
 
if($valid==true)
{  
    include '../login/config.php';
   
    
    $check_data = "SELECT * FROM users WHERE username = '$user' ";


    $check_query = mysqli_query($link, $check_data);
    $numRows = mysqli_num_rows($check_query);
    $user_data = mysqli_fetch_assoc($check_query);
 
    if($numRows == 1)
    {
        $check_old_password = password_verify($old_password,$user_data['password']);
        if($check_old_password)
        {
            $new_password_encrypt = password_hash($new_password,PASSWORD_DEFAULT);
            
            $sql = "UPDATE users SET password = '$new_password_encrypt' WHERE username ='$user' ";
            $query = mysqli_query($link, $sql);
            $row = mysqli_affected_rows($link);
            if($row == 1)
            {
               header('Location:../loggedin.php');
                die;
            }
        }
        else
        {
            echo "Opps, We can not find your data. Please try again.";
            die;
        }
    }
    else
    {
        echo "No database record matched with your data.";
        die;
    }
}
else
{
    $_SESSION['error'] = $error;
    $_SESSION['form_data'] = $form_data;
    header('Location:../index.php');
}
?>