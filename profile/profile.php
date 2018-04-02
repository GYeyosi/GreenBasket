
<?php


include '../login/config.php';
// Initialize the session
session_start();

$name=$email ="";
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}

$user= ($_SESSION['username']);
$result = mysqli_query($link,"SELECT id,name,email FROM users where username= '$user'");

if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $name= $row["name"];
        $email= $row["email"];
    }
} else {
    echo "0 results";
}
$link->close();
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
   





      
   </head>
   <body>
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
                                  
                                      <div class="personal-form">
                                          <div class="userleft">
                                              <form>
                                                  Username
                                                  <br>
                                                  <input type="text" value='<?php echo $user; ?>' readonly>
                                                  <br> Name
                                                  <br>
                                                  <input value='<?php echo $name; ?>' type="text">
                                                  <br> Email
                                                  <br>
                                                  <input value='<?php echo $email; ?>' type="email">
                                                  <br> Address
                                                  <br>
                                                  <input placeholder="Street And House Number" type="text">
                                                  <br> State/Country
                                                  <br>
                                                  <input placeholder="Your Country" type="text">
                                              </form>
                                          </div>
                                          <div class="userright">
                                              <h5>Username cannot be changed</h5>
                                              <form>
                                                  <br> Phone
                                                  <br>
                                                  <input placeholder="+91 123 456 78" type="text">
                                                  <br> ZIP Code
                                                  <br>
                                                  <input placeholder="Your City Name" type="text">
                                                  <br> State/Country
                                                  <br>
                                                  <input placeholder="0123 Australia" type="text">
                                                  <br>
                                              </form>
                                              <button type="button" class="btn btn-default">Save changes</button>
                                          </div>
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
                                      <div class="change-form">
                                          <form>
                                              Old Password
                                              <br>
                                              <input type="text">
                                              <br> New Password
                                              <br>
                                              <input type="text">
                                              <br> Repeat New Password
                                              <br>
                                              <input type="text">
                                              <br>
                                          </form>
                                          <button type="button" class="btn btn-default">Save changes</button>
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

   </body>
</html>
