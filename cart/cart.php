
<?php
// Initialize the session
 include '../login/config.php';
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: ../login/login.php");
  exit;
}

if(isset($_GET['empty'])){
    echo('<script>alert("Cart is Empty")</script>');
}

$username= ($_SESSION['username']);

if (isset($_POST['clearCart'])){
          
           $param_username= $_SESSION['username'];
            $stmt = mysqli_prepare($link,"delete from cart where username='$param_username' and paymentstatus='no'");
             if(mysqli_stmt_execute($stmt)){
                echo('<script>alert("Cart Cleared")</script>');

            } else{
               echo('<script>alert("Something went wrong. Please try again later.")</script>');
               }
            




            }


 

?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Green basket|Cart page</title>
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
      <link href="../css/footer.css" rel="stylesheet"/>
      <script src="./js/footer.js"></script>
      <!-- Bootstrap css      -->
      <link rel="stylesheet" href="../css/mid/bootstrap.css">
      <!-- Main css   -->
      <link rel="stylesheet" href="../css/mid/style(1).css">
      <link rel="stylesheet" href="../css/mid/responsive.css">
      <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
               <li>
                  <h3>An e-Vegetable Market</h3>
               </li>
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
                        <a href="#">ASDAS</a>
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
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="false"> <i class="fa fa-user mr-5"></i><span class="hidden-xs">Hello,<?php echo $username?><i class="fa fa-angle-down ml-5"></i></span> </a>
                  <ul class="dropdown-menu w-150" role="menu">

                    <li><a href="../profile/profile.php"><?php echo $user ?> </a>

                     </li>
                    <li><a href="cart.php">My Orders</a>
                     </li>
                     <li><a href="../login/logout.php">Logout</a>
                     </li>
                     <li class="divider"></li>
                     <li><a href="wishlist.html">Wishlist</a>
                     </li>
                     <li><a href="./cart.php">My Cart</a>
                     </li>
                     <li><a href="../checkout.php">Checkout</a>
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
                     <li><a href="../checkout.php">Check Out</a>
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
                        <li><a href="./login/register.php">Register</a></li>
                        <li><a href="./login/login.php">Login</a></li>
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
      <!-- START OF NATURES BASKET -->
      <!-- PAGE-TITLE-AREA:END -->
      <!-- BREADCRUMBS -->
      <!-- BREADCRUMBS:END -->
      <!-- SHOPING-CART-AREA   -->
      <div class="shoping-cart section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="headline">
                     <h2>Shopping cart</h2>
                  </div>
                  <div class="table-responsive">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th class="cart-product item">Product</th>
                              <th class="cart-product-name item">Vegetable Name</th>
                              <th class="cart-qty item">Quantity</th>
                              <th class="cart-unit item">Unit price</th>
                              <th class="cart-delivery item">Delivery info</th>
                              <th class="cart-sub-total last-item">Sub total</th>
                              <th class="cart-romove item">Remove</th>
                           </tr>
                        </thead>
                        <!-- /thead -->
                        <tfoot>
                           <tr>
                              <td colspan="7">
                                 <div class="shopping-cart-btn">
                                   
                                    <a href="../loggedin.php" type="button" class="btn btn-default left-cart">Continue Shopping</a>

                                     <form action="" id="form1" method="post">
                                       <input name="clearCart" type="submit" class="btn btn-default right-cart"  value ="Clear shopping cart"   
                                       onclick="return confirm('Are you sure want to clear cart?')"
                                       />
                                    </form>
                                    <a href="./cart.php" type="button" class="btn btn-default right-cart">Update shopping cart</a>
                                 </div>
                                 <!-- /.shopping-cart-btn -->
                              </td>
                           </tr>
                        </tfoot>
                        <tbody>
                          <?php
                              include '../login/config.php';
                                       session_start();
                                       $totalprice=0;
                                       
                            $param_username= $_SESSION['username'];

                            $result1 = mysqli_query($link,"select v.*, i.image from vegetable i join (select c.*,s.price from cart c join (select  dealerid,vegname,region,price from stock) s on c.dealerid=s.dealerid and c.vegname=s.vegname and c.region=s.region where c.username='$param_username' and paymentstatus='no' ) as v  on v.vegname=i.vegname;");

                              if (mysqli_num_rows($result1)) {
                              // output data of each row
                                while($row = mysqli_fetch_assoc($result1)) {
                                      $vegname= $row["vegname"];
                                      $region= $row["region"];
                                      $dealerid= $row["dealerid"];
                                      $quantity=$row["quantity"];
                                      $price=$row["price"];
                                      $totalprice= $totalprice+ $quantity*$price;
                                       $image=$row["image"];




                                      echo ' 

                                            <tr>
                                                    <td class="cart-image">
                                                       <a href="../singlepro.php?vegname='.$vegname.'&image='.$image.'" class="entry-thumbnail">
                                                       <img src="../img/vegetables/'.$image.'" width="600px" alt="">
                                                       </a>
                                                    </td>
                                                    <td class="cart-product-name-info">
                                                       <div class="cc-tr-inner">
                                                          <h4 class="cart-product-description"><a href="../singlepro.php?vegname='.$vegname.'&image='.$image.'">'.$vegname.'</a></h4>
                                                          <div class="cart-product-info">
                                                             <span class="product-color">DEALER : <p>'.$dealerid.'</p> </span>

                                                             <span class="product-color">REGION : <p>'.$region.'</p></span>
                                                          </div>
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-quantity">
                                                       <div class="quant-input">
                                                         '.$quantity.'
                                                       </div>
                                                    </td>
                                                    <td class="cart-product-price">
                                                       <div class="cc-pr">₹'.$price.'</div>
                                                    </td>
                                                    <td class="cart-product-delivery">
                                                       <div class="cc-pr">Free shipping</div>
                                                    </td>
                                                    <td class="cart-product-sub-total">
                                                       <div class="cc-pr"> ₹ '.$quantity*$price.'</div>
                                                    </td>
                                                    <td class="romove-item">
                                                       <a href="#"><img src="./cart/remove.png" alt="Remove">
                                                       </a>
                                                    </td>
                                          </tr>

                                            ';                                                  

                                      }
                                }



                          ?>

                           
                        </tbody>
                        <!-- /tbody -->
                     </table>
                     <!-- /table -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- SHOPING-CART-AREA:END   -->
      <!-- SHOPING-CART-BOTTOM-AREA   -->
      <div class="shoping-cart-bottom-area">
         <div class="container">
            <div class="row" >
               <div >
                  <div class="checkout">
                     <p>Subtotal<span>₹<?php  echo $totalprice ?></span>
                     </p>
                     <h4>Grandtotal<span>₹<?php  echo $totalprice ?></span></h4>
                     <a href="../checkout.php" type="button" class="btn btn-default right-cart">Proceed to checkout</a>

                     <h5>Checkout  with multiple addresses</h5>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Entire FOOTER:END -->
      <!-- jQuery latest -->
      <script type="text/javascript" src="./cart/jQuery.2.1.4.js.download"></script>
      <!-- js Modernizr -->
      <script src="./cart/modernizr-2.6.2.min.js.download"></script>
      <!-- Bootsrap js -->
      <script src="./cart/bootstrap.min.js.download"></script>
      <!-- Plugins js -->
      <script src="./cart/plugins.js.download"></script>
      <!-- Custom js -->
      <script src="./cart/main.js.download"></script>
      <!-- END OF NATURES BASKET -->
      <!--start of footer -->
      <div class="footer-section">
         <div class="footer">
            <div class="container">
               <div class="col-md-4 footer-one">
                  <div class="foot-logo">
                     <img src="../img/logo.png">
                  </div>
                  <p>Providing Life Changing Experiences Through Education. Class That Fit Your Busy Life. Closer to Home
                  </p>
                  <div class="social-icons"> 
                     <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
                     <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
                     <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
                     <a href="mailto:bootsnipp@gmail.com"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
                  </div>
               </div>
               <div class="col-md-2 footer-two">
                  <h5>Quick Links</h5>
                  <ul>
                     <li><a href="#"> About Us</a> </li>
                     <li><a href="#"> Our News</a> </li>
                     <li><a href="#"> Our Services</a> </li>
                     <li><a href="#"> Contact Us</a> </li>
                  </ul>
               </div>
               <div class="col-md-2 footer-three">
                  <h5>Services</h5>
                  <ul>
                     <li><a href="#"> About Us</a> </li>
                     <li><a href="#"> Our News</a> </li>
                     <li><a href="#"> Our Services</a> </li>
                     <li><a href="#"> Contact Us</a> </li>
                  </ul>
               </div>
               <div class="col-md-4 footer-four">
                  <h5>Contact Us</h5>
                  <ul>
                     <li><i class="fa fa-map-marker"></i>350 Avenue, India, Delhi 110001 </li>
                     <li><i class="fa fa-envelope-o"></i>info@mailme.com </li>
                     <li><i class="fa fa-phone"></i>+91-xxx-xxx-2040 </li>
                  </ul>
               </div>
               <div class="clearfix"></div>
            </div>
         </div>
      </div>
      <div class="footer-bottom">
         <div class="container">
            <div class="row">
               <div class="col-sm-6 ">
                  <div class="copyright-text">
                     <p>CopyRight © 2017 Digital All Rights Reserved</p>
                  </div>
               </div>
               <!-- End Col -->
               <div class="col-sm-6  ">
                  <div class="copyright-text pull-right">
                     <p> <a href="#">Home</a> | <a href="#">Privacy</a> |<a href="#">Terms & Conditions</a> | <a href="#">Refund Policy</a> </p>
                  </div>
               </div>
               <!-- End Col -->
            </div>
         </div>
      </div>
      </div>
      <!-- end of footer -->
      <script src="js/jquery-3.1.1.js"></script>
      <script src="js/bootstrap.js"></script>
      <script src="./js/hover.js"></script>
   </body>
</html>