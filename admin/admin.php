
<?php
// Initialize the session


session_start();

include '../login/config.php';



$user= ($_SESSION['username']);
if($user!='admin'){
  header("location: ../login/login.php");
  exit;
}

$result = mysqli_query($link,"SELECT count(*) as count FROM users ");
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numusers= $row['count'];
    }
} 

$result = mysqli_query($link,"SELECT count(*) as count FROM vegetable ");
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numvegetables= $row['count'];
    }
} 

$result = mysqli_query($link,"select count(*) as count from (SELECT count(s.dealerid) FROM stock as s inner join users as u on s.dealerid=u.username where u.role='retailer' group by s.dealerid) t") ;

if (mysqli_num_rows($result) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numretailers= $row['count'];
    }
} 

$result = mysqli_query($link,"select count(*) as count from (SELECT count(s.dealerid) FROM stock as s inner join users as u on s.dealerid=u.username where u.role='wholeseller' group by s.dealerid) t") ;

if (mysqli_num_rows($result) ) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $numwholesellers= $row['count'];
    }
} 

 ?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
  
    <title>GB Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="sumit kumar">
      <title>Green Basket</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="./css/style.css" rel="stylesheet" type="text/css">
      <script src="https://use.fontawesome.com/07b0ce5d10.js"></script>
      >
    


    <!-- Bootstrap css      -->
    <link rel="stylesheet" href="./admin.css">
    

    <link rel="stylesheet" href="../css/footer.css">
    

  
  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.php">GreenBasket</a></li>
            <li><a href="users.php">Users</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="vegetables.php">Vegetables</a></li>
             <li><a href="payment.php">Revenue</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="../index.php">Welcome, ADMIN</a></li>
            <li><a href="../login/logout.php">Logout</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> GreenBasket <small>Manage Your Site</small></h1>
          </div>
        </div>
      </div>
    </header>
<br>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>


<section id="main">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <div class="list-group">
      <a href="../index.php" class="list-group-item active main-color-bg"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
        Dashboard <span class="badge"></span>
      </a>
      <a href="users.php" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Users<span class="badge"> <?php echo $numusers; ?></span></a>
      <a href="vegetables.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Vegetables<span class="badge"> <?php echo $numvegetables; ?></span></a>
      <a href="retailers.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Retailers <span class="badge"> <?php echo $numretailers; ?></span></a>

      <a href="wholesellers.php" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> WholeSellers <span class="badge"> <?php echo $numwholesellers; ?></span></a>
    </div>

      
      </div>
      <div class="col-md-9">
          <div class="panel panel-default">
  <div class="panel-heading" style="background-color:  #095f59;">
    <h3 class="panel-title">Website Overview</h3>
  </div>
  <div class="panel-body">
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $numusers; ?></h2>
       <h4>Total Users</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2>  <?php echo $numvegetables; ?></h2>
       <h4>Vegetables</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><?php echo $numretailers; ?></h2>
       <h4>Retailers</h4>
     </div>
   </div>
   <div class="col-md-3">
     <div class="well dash-box">
       <h2><?php echo $numwholesellers; ?></h2>
       <h4>WholeSellers</h4>
     </div>
   </div>
  </div>
</div>
<!--Latest User-->
<div class="panel panel-default">
  <div class="panel-heading"style="background-color:  #095f59;">
    <h3 class="panel-title">  Latest Users </h3>
  </div>
  <div class="panel-body">
    <table class="table table-striped table-hover">
       <tr>
        <th>Username</th>
        <th>Name</th>
        <th>Email</th>

        <th>Joined Date</th>
      </tr>
      <?php
        $result = mysqli_query($link,"SELECT  *  FROM users order by createdat LIMIT 5");
        if (mysqli_num_rows($result)) {

            // output data of each row
            while($row = mysqli_fetch_assoc($result) ) {
                echo '
                 <tr>
                  <td>'.$row['username'].'</td>
                  <td>'.$row['name'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['createdat'].'</td>
                </tr>
                ';         
                   }
        }
      ?>
   
    </table>

  </div>
</div>

      </div>
    </div>
  </div>
</section>
<!-- footer -->
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
                  </div> <!-- End Col -->
                  <div class="col-sm-6  ">
                      <div class="copyright-text pull-right">
                        <p> <a href="#">Home</a> | <a href="#">Privacy</a> |<a href="#">Terms & Conditions</a> | <a href="#">Refund Policy</a> </p>
                     </div>               
                                       
                  </div> <!-- End Col -->
               </div>
            </div>
    </div>
   </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
