<?php 
    include('../functions.php');
    if (!isAdmin()) {
        $_SESSION['msg'] = "You must log in first";
        header('location:login.php');
    }
    
    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['user']);
        header("location:login.php");
    }
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    

    <!-- Title Page-->
    <title>Admin Dashboard</title>

    <!-- Fontfaces CSS-->
  
  
    <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">

</head>

<body style="font-weight: bolder;">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="#">
                            <img src="../css/assets/images/logo.png" width="60" alt="motorcare" /><span class="logo_title"> MotorCare</span>
                        </a>
                    </div>
                    <div class="header__tool">
                       
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 js-item-menu">
                                <div class="image">
                                    <img src="../css/assets/images/reci.png"/>
                                </div>
                                <div class="content">
                                                    <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['name']; ?></strong>
                    <small>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</small> <i class="fas fa-sort-down"></i>
                <?php endif ?></a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="admindasboard.php">
                                            <i class="fas fa-user"></i>Account</a>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href=../index.php?logout='1'"">
                                        <i class="fas fa-sign-out-alt"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- END HEADER DESKTOP -->

       
        <!-- PAGE CONTENT-->
        <div class="page-container3">
           
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 pt-5">
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar3 js-spe-sidebar">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li class="has-sub">
                                            <a href="admindasboard.php">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>

                                        <li>
                                            <a href="admincalview.php">
                                            <i class="fas fa-comments"></i>Calender</a>
                                        </li>
                                     
                                       
                                        <li class="has-sub active">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-car"></i>Users and Employees
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                                <li>
                                                    <a href="regusers.php">Registered Users</a>
                                                </li>
                                                <li class="has-sub active">
                                                    <a href="addnewemployee.php">Add New Employee</a>
                                                </li>

                                                <li>
                                                    <a href="regreciptionists.php">Receptionists</a>
                                                </li>
                                                <li>
                                                    <a href="regmechanics.php">Mechanics</a>
                                                </li>
                                                <li>
                                                    <a href="regcashiers.php">Cashiers</a>
                                                </li>
                                                
                                            </ul>
                                        </li>

                                        <li>
                                            <a href="totalregvehicles.php">
                                            <i class="fas fa-comments"></i>Registered Vehicles</a>
                                        </li>

                                        <li class="has-sub">
                                            <a class="js-arrow">
                                            <i class="fas fa-user"></i>My Account
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                
                                                <li>
                                                    <a href="forget-pass.html">Reset Password</a>
                                                </li>
                                                 <li>
                                                    <a href="forget-pass.html">Update profile data</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="has-sub">
                                            <a class="js-arrow" href="#">
                                            <i class="fas fa-user"></i>Stores
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                
                                                 <li>
                                                    <a href="manageitems.php">Manage Items</a>
                                                </li>
                                            </ul>
                                        </li>

                                         <li>
                                            <a href="">
                                            <i class="fas fa-comments"></i>Customer Feedbacks</a>
                                        </li>
                                        
                                         <li>
                                            <a href=../index.php?logout='1'"">
                                            <i class="fas fa-sign-out-alt"></i>Logout</a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-9 pt-5">
                                           
                        <div class="header">
		<h2>Admin - create Employee</h2>
	</div>
	
	<form method="post" action="addnewemployee.php">
    <div class="error">
		<?php echo display_error(); ?>
      </div>
	

		<div class="form-group">
		    <label for="exampleInputEmail1"><b>Name</b></label>
		    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="Enter name" name="name" value="<?php echo $name; ?>" required>
		    
		  </div>


		  	 <div class="form-group">
			    <label for="exampleInputEmail1"><b>NIC</b></label>
			    <input type="text" class="form-control" aria-describedby="textlHelp"  placeholder="ex:970181571v" name="nic" value="<?php echo $nic; ?>" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1"><b>Address</b></label>
			    <input type="text" class="form-control"  aria-describedby="textlHelp" placeholder="address" name="address" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1"><b>Mobile No</b></label>
			    <input type="text" class="form-control" aria-describedby="textlHelp" placeholder="mobile" name="mobile" required>
			    
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1"><b>Email</b></label>
			    <input type="email" class="form-control" aria-describedby="emaillHelp" placeholder="email" name="email" value="<?php echo $email; ?>" required>
			    
			  </div>



			  <div class="form-group">
    <label for="exampleFormControlSelect1"><b>User type</b></label>
			<select class="form-control" name="user_type" id="user_type">
			  <option value="admin">Admin</option>
				<option value="cashier">cashier</option>
				<option value="receptionist">Receptionist</option>
				<option value="mechanic">Mechanic</option>
				<!-- <option value="storekeeper">StoreKeeper</option>
				<option value="user">User</option> -->
			</select>
			</div>



		<div class="form-group">
			    <label><b>Password</b></label>
			    <input type="password" class="form-control demoInputBox" name="password_1" id="password" onKeyUp="checkPasswordStrength();" required>
			    <div id="password-strength-status"></div>
			  </div> 

			  <div class="form-group">
			    <label for="exampleInputPassword1"><b>Confirm Password</b></label>
			    <input type="password" class="form-control" name="password_2" required>
			  </div>
											  



	
		<div class="input-group">
			
			 <button type="submit" class="btn btn-primary btn-lg ml-1" name="register_btn">Create Employee</button>
		</div>
	</form>
                    


                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>








<script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../vendor/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>

</html>

