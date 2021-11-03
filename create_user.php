<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL - Create user</title>
	


  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">


    <!-- external css files -->
    <link rel="stylesheet" type="text/css" href="styles.css">

    <!-- fontawesome icons -->
    <link href="fontawsome/css/all.css"  rel="stylesheet" >


    <!-- owl carousel -->
    <link rel="stylesheet" href="owl/owl.carousel.min.css">
	<link rel="stylesheet" href="owl/owl.theme.default.min.css">


 	<!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	
</head>
<body>
	<div class="header">
		<h2>Admin - create Employee</h2>
	</div>
	
	<form method="post" action="create_user.php">

		<?php echo display_error(); ?>

	

		<div class="form-group">
		    <label for="exampleInputEmail1">Name</label>
		    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="Enter name" name="name" value="<?php echo $name; ?>" required>
		    
		  </div>


		  	 <div class="form-group">
			    <label for="exampleInputEmail1">NIC</label>
			    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="Enter NIC" name="nic" value="<?php echo $nic; ?>" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Address</label>
			    <input type="text" class="form-control"  aria-describedby="textlHelp" placeholder="address" name="address" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Mobile No</label>
			    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="mobile" name="mobile" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="email" class="form-control" aria-describedby="emaillHelp" placeholder="email" name="email" value="<?php echo $email; ?>" required>
			    
			  </div>



			  <div class="form-group">
    <label for="exampleFormControlSelect1">User type</label>
			<select class="form-control" name="user_type" id="user_type">
			  <option value="admin">Admin</option>
				<option value="cashier">cashier</option>
				<option value="receptionist">Receptionist</option>
				<option value="mechanic">Mechanic</option>
				<option value="storekeeper">StoreKeeper</option>
				<option value="user">User</option>
			</select>
			</div>



		<div class="form-group">
			    <label>Password</label>
			    <input type="password" class="form-control demoInputBox" name="password_1" id="password" onKeyUp="checkPasswordStrength();" required>
			    <div id="password-strength-status"></div>
			  </div> 

			  <div class="form-group">
			    <label for="exampleInputPassword1">Confirm Password</label>
			    <input type="password" class="form-control" name="password_2" required>
			  </div>
											  



	
		<div class="input-group">
			
			 <button type="submit" class="btn btn-danger btn-lg ml-1" name="register_btn">CREATE</button>
		</div>
	</form>
</body>
</html>