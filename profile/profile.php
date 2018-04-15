
<?php


include '../login/config.php';
// Initialize the session
session_start();

$name=$email =$city=$zip=$phone=$street=$flat=$role="";
if (isset($_GET['civ'])) {
  # code...
  echo '<script>alert("Change your role to Wholeseller/Retailer");</script>';
}
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}
if(isset($_GET['wrong']))
  echo('<script> alert("Oops, You Entered Wrong password. Enter The Correct Password.")</script>');

$user= ($_SESSION['username']);
$result = mysqli_query($link,"SELECT email,name,city,zip,phone,street,flat FROM users where username= '$user'");

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $name= $row["name"];
        $email= $row["email"];
        $city= $row["city"];
        $zip= $row["zip"];
        $phone= $row["phone"];
        $street= $row["street"];
        $flat= $row["flat"];
        $role= $row["role"];
       
    }
} else {
    echo "0 results";
}




if($_SERVER["REQUEST_METHOD"] == "POST"){
 $param_role= trim($_POST["role"]);
$param_name = trim($_POST["name"]);
 $param_email = trim($_POST["email"]);
 $param_city = trim($_POST["city"]);
 $param_zip = trim($_POST["zip"]);
 $param_phone = trim($_POST["phone"]);
 $param_street = trim($_POST["street"]);
 $param_flat = trim($_POST["flat"]);
 
$stmt = mysqli_prepare($link, "UPDATE  users set name=?,email=?,city=?,zip=?,phone=?,street=?,flat=?, role=? where username= '$user'");
mysqli_stmt_bind_param($stmt, "ssssssss",$param_name,$param_email,$param_city,$param_zip,$param_phone,$param_street,$param_flat,$param_role);
//mysqli_stmt_execute($stmt);







 


// Attempt to execute the prepared statement

        if(mysqli_stmt_execute($stmt)){

            // Redirect to login page

            header("location: ./profile.php");

        } else{

            echo "Something went wrong. Please try again later.";

        }

        mysqli_stmt_close($stmt);




 mysqli_close($link);
}


//change password code

$error = [
"old_password_error" => '',
"new_password_error" => '',
"confirm_password_error" => ''
];
 
$form_data = [
"old_password" => '',
"new_password" => '',
"confirm_password" => ''
];
 
if(!empty($_SESSION['error']))
{
    $error = $_SESSION['error'];
}
 
if(!empty($_SESSION['form_data']))
{
    $form_data = $_SESSION['form_data'];
}


?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="sumit kumar">
      <title>Green Basket</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>

      

   


       <!--FAV ICON-->
       
         <link rel="apple-touch-icon" sizes="57x57" href="../img/apple-icon-57x57.png">
         <link rel="apple-touch-icon" sizes="60x60" href="../img/apple-icon-60x60.png">
         <link rel="apple-touch-icon" sizes="72x72" href="../img/apple-icon-72x72.png">
         <link rel="apple-touch-icon" sizes="76x76" href="../img/apple-icon-76x76.png">
         <link rel="apple-touch-icon" sizes="114x114" href="../img/apple-icon-114x114.png">
         <link rel="apple-touch-icon" sizes="120x120" href="../img/apple-icon-120x120.png">
         <link rel="apple-touch-icon" sizes="144x144" href="../img/apple-icon-144x144.png">
         <link rel="apple-touch-icon" sizes="152x152" href="../img/apple-icon-152x152.png">
         <link rel="apple-touch-icon" sizes="180x180" href="../img/apple-icon-180x180.png">
         <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
         <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon-32x32.png">
         <link rel="icon" type="image/png" sizes="96x96" href="../img/favicon-96x96.png">
         <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon-16x16.png">
         <link rel="manifest" href="../img/manifest.json">
         <meta name="msapplication-TileColor" content="#ffffff">
         <meta name="msapplication-TileImage" content="../img/ms-icon-144x144.png">
         <meta name="theme-color" content="#ffffff">



         <meta http-equiv="content-type" content="text/html; charset=UTF-8">
         <meta charset="utf-8">
         <meta http-equiv="x-ua-compatible" content="ie=edge">
         <meta name="description" content="">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>My Profile</title>
                  
         
         <!-- Bootstrap css      -->
         <link rel="stylesheet" href="bootstrap.css">
         
         
         <!-- Main css   -->
         <link rel="stylesheet" href="style_002.css">
         <link rel="stylesheet" href="responsive.css">
   


        <!-- change password-->
        <script type="text/javascript" src="../js/jquery-1.11.1.js"></script>


      
   </head>
   <body>
    <div id="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'bn,en,gu,hi,pa,ta,te', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <!--=========-TOP_BAR============-->
      <nav class="topBar">
         <div class="container">
            <ul class="list-inline pull-left hidden-sm hidden-xs">
               <li><span class="text-primary">Have a question? </span> Call +120 558 7885</li>
                 <li>           <h3>An e-Vegetable Market</h3></li>
            </ul>
            <ul class="topBarNav pull-right">
               <!-- <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-usd mr-5"></i>USD<i class="fa fa-angle-down ml-5"></i>
                  </a>
                  <ul class="dropdown-menu w-100" role="menu">
                    <li><a href="#"><i class="fa fa-eur mr-5"></i>EUR</a>
                    </li>
                    <li class=""><a href="#"><i class="fa fa-usd mr-5"></i>USD</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gbp mr-5"></i>GBP</a>
                    </li>
                  </ul>
                  </li> -->
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <span class="hidden-xs"> More <i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-100" role="menu">
                      <li>
                        <a href="#">Edit Profile</a>
                     </li>
                     <li>
                        <a href="#">Your Orders</a>
                     </li>
                     <li>
                        <a href="#">Sell on GreenBasket</a>
                     </li>
                     <li>
                        <a href="#">Contact Us</a>
                     </li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">My Account<i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
                    <li><a href=""> Hello <?php echo $user ?> </a>
                     </li>
                    <li><a href="cart.html">My Orders</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
                     </li>
                     <li class="divider"></li>
                     <li><a href="wishlist.html">Wishlist</a>
                     </li>
                     <li><a href="cart.html">My Cart</a>
                     </li>
                     <li><a href="checkout.html">Checkout</a>
                     </li>
                  </ul>
               </li>
               <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-shopping-basket mr-5"></i> <span class="hidden-xs">
                  Cart <i class="fa fa-angle-down ml-5"></i>
                  </span> </a>
                  <ul class="dropdown-menu w-150" role="menu">
                     <li><a href="viewcart.html">View Cart</a>
                     </li>
                     <li><a href="checkout.html">Check Out</a>
                     </li>
                  </ul>
               </li>
            </ul>
         </div>
      </nav>
      <!--=========-TOP_BAR============-->
      <!--=========MIDDEL-TOP_BAR============-->
      <div class="middleBar">
         <div class="container">
            <div class="row display-table">
               <div class="col-sm-3 vertical-align text-left hidden-xs">
                  <a href="../index.php"><img width="180px" src="../img/logo.png" alt="Green Basket"></a>
                 
               </div>
               <!-- end col -->
               <div class="col-sm-7 vertical-align text-center">
                  <form>
                     <div class="row grid-space-1">
                        <div class="col-sm-6">
                           <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                           <select class="form-control input-lg" name="category">
                              <option value="all">Categories</option>
                              <optgroup label="Vegetables">
                                 <option value="tomato">Tomato</option>
                                 <option value="potato">Potato</option>
                                 <option value="ladys-finger">Lady's Finger</option>
                                 <option value="brinjals">Brinjals</option>
                                 <option value="carrot">Carrot</option>
                                 <option value="cucumber">Cucumber</option>
                              </optgroup>
                              <optgroup label="Daily Vegetables">
                                 <option value="onion">Onioins</option>
                                 <option value="Garlic">Garlic</option>
                                 <option value="ginger">Ginger</option>
                                 </optgroup>
                              <optgroup></optgroup>
                           </select>
                        </div>
                        <!-- end col -->
                        <div class="col-sm-3">
                           <input type="submit" class="btn btn-default btn-block btn-lg" value="Search">
                        </div>
                        <!-- end col -->
                     </div>
                     <!-- end row -->
                  </form>
               </div>
               <!-- end col -->
               <!-- end col -->
            </div>
            <!-- end  row -->
         </div>
      </div>






      <nav class="navbar navbar-main navbar-default" role="navigation" style="opacity: 1;">
         <div class="container">
            <!-- Brand and toggle -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-1">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>             
            </div>
               
   
                      







            <!-- Collect the nav links,  -->
            <div class="collapse navbar-collapse navbar-1" style="margin-top: 0px;">
               <ul class="nav navbar-nav">
                  <li><a href="../index.php" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Home</a></li>
                  <li class="dropdown megaDropMenu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Shop <i class="fa fa-angle-down ml-5"></i></a>
                     <ul class="dropdown-menu row">
                        <li class="col-sm-3 col-xs-12">
                           <ul class="list-unstyled">
                              <li>Products Grid View</li>
                              <li><a href="#">Products</a></li>
                              <li><a href="#">Sidebar Left</a></li>
                              <li><a href="#">Products Left</a></li>
                           </ul>
                        </li>
                        <li class="col-sm-3 col-xs-12">
                           <ul class="list-unstyled">
                              <li>Products List View</li>
                              <li><a href="#"> Sidebar Left</a></li>
                              <li><a href="#">Products Left</a></li>
                              <li><a href="#">Products Sidebar</a></li>
                           </ul>
                        </li>
                        <li class="col-sm-3 col-xs-12">
                           <ul class="list-unstyled">
                              <li>Checkout</li>
                              <li><a href="#">Step 1</a></li>
                              <li><a href="#">Step 2</a></li>
                              <li><a href="#">Step 3</a></li>
                           </ul>
                        </li>
                        <!--
                        <li class="col-sm-3 col-xs-12">
                           <ul class="list-unstyled">
                              <li>Sumit Kumar</li>
                           </ul>
                           <img src="https://lh3.googleusercontent.com/-uwagl9sPHag/WM7WQa00ynI/AAAAAAAADtA/hio87ZnTpakcchDXNrKc_wlkHEcpH6vMwCJoC/w140-h148-p-rw/profile-pic.jpg" class="img-responsive" alt="menu-img">
                        </li>  -->
                     </ul>
                  </li>
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Page <i class="fa fa-angle-down ml-5"></i></a>
                     <ul class="dropdown-menu dropdown-menu-left">
                        <li><a href="../login/logout.php">Logout</a></li>
                        <li><a href="#">Password Recovery</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">About Us</a></li>
                     </ul>
                  </li>
                  <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">Help-Section</a></li>
                  <li><a href="../feedback_form/formpage.html" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false">FeedBack</a></li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
      </nav>

         <!-- PERSONAL-DETAIL-AREA -->
                      <section class="pessonal-detail section-padding">
                          <div class="container">
                              <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                 <div class="headline">
                                    <h2>Personal details</h2>
                                 </div>
                                  
                                      <div class="personal-form" >
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
                                                <div class="userleft">
                                                    
                                                        Username
                                                        <br>
                                                        <input type="text" value='<?php echo $user; ?>' readonly>
                                                        <br> Name
                                                        <br>
                                                        <input name="name" value='<?php echo $name; ?>' type="text">
                                                        <br> Email
                                                        <br>
                                                        <input name="email" value='<?php echo $email; ?>' type="email">
                                                        <br> Flat No.
                                                        <br>
                                                        <input name="flat" value='<?php echo $flat; ?>' placeholder="Flat Number" type="text">
                                                        <br> Street No.
                                                        <br>
                                                        <input name="street" value='<?php echo $street; ?>'  placeholder="Your street number" type="text">
                                                    
                                                </div>
                                                <div class="userright">
                                                    <h5>Username cannot be changed</h5>
                                                    
                                                        <br> Phone
                                                        <br>
                                                        <input name="phone" value='<?php echo $phone; ?>' placeholder="" type="text">
                                                        <br> ZIP Code
                                                        <br>
                                                        <input name="zip" value='<?php echo $zip; ?>'  placeholder="Fill Me" type="number">
                                                        <br> City
                                                        <br>
                                                        <input name="city" value='<?php echo $city; ?>'  placeholder="Fill Me" type="text">
                                                        <br>Role
                                                        <br>
                                                        <select name="role">
                                                          <option unselected hidden value="">Choose Your Role</option>
                                                          <option value="civilian">Civilian</option>
                                                          <option value="retailer">Retailer</option>
                                                          <option value="wholeseller">Whole-Seller</option>
                                                        </select>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-default">Save changes</button>
                                        </form>
                                              <!--for buttoon-->
                                               
                                        
                                          
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </section>
                      <!-- PERSONAL-DETAIL-AREA:END   -->
                     
                      <!-- CHANGE-PASSWORD-AREA   -->
                      <section class="password-change">
                          <div class="container">
                              <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                  <div class="headline">
                                      <h2>Change your password</h2>
                                  </div>
                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                      <div class="change-form" >
                                           <form action="change-password.php" method="post" onsubmit="return validate();" id="form_submission_ajax">
                                            <table >
                                                 
                                                <tr>
                                                    <td><label>Old password:</label></td>
                                                    <td><input type="password" name="old_password" id="old_password" value="<?php echo $form_data['old_password']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td id="old_password_error" class="error"><?php echo $error['old_password_error']; ?></td>
                                                </tr>
                                     
                                                <tr>
                                                    <td><label>New Password:</label></td>
                                                    <td><input type="password" name="new_password" id="new_password" value="<?php echo $form_data['new_password']; ?>"></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td id="new_password_error" class="error"><?php echo $error['new_password_error']; ?></td>
                                                </tr>
                                     
                                                <tr>
                                                    <td><label>Confirm Password:</label></td>
                                                    <td><input type="password" name="confirm_password" id="confirm_password" value="<?php echo $form_data['confirm_password']; ?>"></td>
                                                </tr>
                                     
                                                <tr>
                                                    <td></td>
                                                    <td id="confirm_password_error" class="error"><?php echo $error['confirm_password_error']; ?></td>
                                                </tr>
                                     
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <input type="hidden" name="user_id" id="user_id" value="1">
                                                        <input type="submit" name="submit" value="Submit" class="btn btn-default btn-warning">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>

                                          
                                      </div>
                                  </div>
                              </div>
                              </div>
                          </div>
                      </section>
                      <!-- CHANGE-PASSWORD-AREA:END -->




      <script src="../js/jquery-3.1.1.js"></script>
      <script src="../js/bootstrap.js"></script>
      <script src="../js/hover.js"></script>
      <script type="text/javascript">
function validate()
{
    var valid = true;
    var old_password = $('#old_password').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();
 
    if(old_password=='' || old_password==null)
    {
        valid=false;
        $('#old_password_error').html("* This field is required.");
    }
    else
    {
        $('#old_password_error').html("");  
    }
 
    if(new_password=='' || new_password==null)
    {
        valid=false;
        $('#new_password_error').html("* This field is required.");
    }
    else
    {
        $('#new_password_error').html("");
    }
 
    if(confirm_password=='' || confirm_password==null)
    {
        valid=false;
        $('#confirm_password_error').html("* This field is required.");
    }
    else
    {
        $('#confirm_password_error').html("");
    }
 
    if(new_password != '' && confirm_password != '')
    {
        if(new_password != confirm_password)
        {
            valid = false;
            $('#confirm_password_error').html("* Confirm password is same as new password.");
        }
 
        if(new_password == confirm_password)
        {
            $('#confirm_password_error').html("");          
        }
    }
 
    if(valid==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>

   </body>
</html>