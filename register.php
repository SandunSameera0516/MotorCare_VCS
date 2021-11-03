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
    <div class="col-12 offset-md-1 col-md-10">
<div class="card">
  <div class="card-header py-4 lgintxt">
    Sign Up
  </div>
  <div class="card-body">
      
                           



                            <form class="login_register_frm" method="post" action="register.php">
                            		<?php echo display_error(); ?>
                            				<div class="form-group logintxtstyle">
											    <label for="exampleInputEmail1">Name</label>
											    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="Enter name" name="name" value="<?php echo $name; ?>" required>
											    
											  </div>

                                   			 <div class="form-group logintxtstyle">
											    <label for="exampleInputEmail1">NIC</label>
											    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="ex:970181571v" name="nic" required>
											    
											  </div>

											  <div class="form-group logintxtstyle">
											    <label for="exampleInputEmail1">Address</label>
											    <input type="text" class="form-control"  aria-describedby="textlHelp" placeholder="address" name="address" value="<?php echo $address; ?>" required>
											    
											  </div>

											  <div class="form-group logintxtstyle">
											    <label for="exampleInputEmail1">Mobile No</label>
											    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="mobile" name="mobile" value="<?php echo $mobile; ?>" required>
											    
											  </div>

											  <div class="form-group logintxtstyle">
											    <label for="exampleInputEmail1">Email</label>
											    <input type="email" class="form-control" aria-describedby="emaillHelp" placeholder="email" name="email" value="<?php echo $email; ?>" required>
											    
											  </div>




											  <div class="form-group logintxtstyle">
											    <label>Password</label>
											    <input type="password" class="form-control demoInputBox" name="password_1" id="password" onKeyUp="checkPasswordStrength();" required>
											    <div id="password-strength-status"></div>
											  </div> 

											  <div class="form-group logintxtstyle">
											    <label for="exampleInputPassword1">Confirm Password</label>
											    <input type="password" class="form-control" name="password_2" required>
											  </div>
											  
											  
                                    <div class="form-row pt-2">
                                     
                                        <button type="submit" class="btn btn-danger btn-md ml-1" name="register_btn">Register</button>        
                                    </div>

                                    	<p class="pt-2">
											Already a member? <span><a class="alreadymem" href="login.php">Sign in</a></span>
										</p>
                                </form>

   
  </div>
</div>
</div>
</div>
</div>

















<?php include('footer.php') ?>








<script type="text/javascript" src="vendor/jquery/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>