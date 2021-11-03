<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>MotorCare</title>


  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">


    <!-- external css files -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- fontawesome icons -->
    <link href="vendor/fontawsome/css/all.css"  rel="stylesheet" >


    <!-- owl carousel -->
    <link rel="stylesheet" href="vendor/owl/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/owl/owl.theme.default.min.css">


 	<!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">










</head>
<body>






<?php include('header.php') ?>









<div class="container">
  <div class="row py-5">
    <div class="col-12 offset-md-2 col-md-8">
<div class="card">
  <div class="card-header py-4 lgintxt">
    Login
  </div>
  <div class="card-body">
      <?php if (isset($_SESSION['success'])) : ?>
      <!-- <div class="error success" >
        <h3> -->
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
        <!-- </h3>
      </div> -->
    <?php endif ?>
                            <form class="login_register_frm" method="post" action="login.php">
                              <?php echo display_error(); ?>
                                    <div class="form-group pt-4 logintxtstyle">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" class="form-control form-control-md" aria-describedby="textlHelp" placeholder="Enter email" name="email" required>
                          
                        </div>
                        <div class="form-group pt-3 logintxtstyle">
                          <label for="exampleInputPassword1">Password</label>
                          <input type="password" class="form-control form-control-md" placeholder="Password" name="password" required>
                        </div>
                        
                        
                                    <div class="form-row pt-4">
                                       
                                        <button type="submit" class="btn btn-danger btn-md ml-1 signin" name="login_btn" id="loginbutton">Log in</button>        
                                    </div>
                                    <p class="pt-2">
                      Not yet a  Member? <span><a  href="register.php">Sign up</a></span>
                    </p>
                                </form>

   
  </div>
</div>
</div>
</div>
</div>









<?php include('footer.php') ?>







<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>