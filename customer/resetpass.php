<?php
include('../functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

$rpass="";
$updaterpass = $_SESSION['user']['id'];
$updatepassres = mysqli_query($db, "SELECT * FROM login WHERE id='$updaterpass'");

$errorpass   = array();

if (isset($_POST['re_password']))
	{
	$old_pass = md5($_POST['old_pass']);
	$new_pass = $_POST['new_pass'];
    $re_pass = $_POST['re_pass'];
    
    if ((strlen($new_pass) < 6)) { 
        array_push($errorpass, "Password lenghth should be greatr than 6"); 
    }

    if ($new_pass != $re_pass) {
		array_push($errorpass, "The two passwords do not match");
	}

	$password_query = mysqli_query($db,"select * from login where id='$updaterpass'");
	$password_row = mysqli_fetch_array($password_query);
    $database_password = $password_row['password'];
    
    if ($database_password != $old_pass) {
		array_push($errorpass, "Your current password is wrong");
	}


    if (count($errorpass) == 0) {

            $newpass=md5($new_pass);
			$update_pwd = mysqli_query($db,"update login set password='$newpass' where id='$updaterpass'");
            echo "<script>alert('Update Sucessfully');</script>";
            header("location:../index.php?logout='1'");
            
        }
		
    
}
    



    

function display_errorpass()
{
    global $errorpass;

    if (count($errorpass) > 0) {
        echo '<div class="error">';
        foreach ($errorpass as $errorpass) {
            echo $errorpass . '<br>';
        }
        echo '</div>';
    }
}
 
?>













<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Customer Dashboard</title>

    <!-- Fontfaces CSS-->


    <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">

</head>

<body style="font-weight:bolder;">

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
                                <img src="../css/assets/images/avatar-01.png" />
                            </div>
                            <div class="content">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <strong><?php echo $_SESSION['user']['name']; ?></strong> <i class="fas fa-sort-down"></i>

                                <?php endif ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="customerdash.php">
                                            <i class="fas fa-user"></i>Account</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href=../index.php?logout='1'""> <i class="fas fa-sign-out-alt"></i>Logout</a>
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
                                        <a href="customerdash.php">
                                            <i class="fas fa-tachometer-alt"></i>Dashboard
                                        </a>
                                    </li>


                                    <li class="has-sub">
                                        <a class="js-arrow" href="#">
                                            <i class="fas fa-car"></i>Servise Request
                                            <span class="arrow">
                                                <i class="fas fa-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                                            <li>
                                                <a href="cusbook.php">Book</a>
                                            </li>
                                            <li>
                                                <a href="mybookings.php">My Bookings</a>
                                            </li>
                                            <li>
                                                <a href="servisehistory.php">service History</a>
                                            </li>
                                            <li>
                                                <a href="customerinspectio.php">Inspection report</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="has-sub active">
                                        <a class="js-arrow" href="#">
                                            <i class="fas fa-user"></i>My Account
                                            <span class="arrow">
                                                <i class="fas fa-angle-down"></i>
                                            </span>
                                        </a>
                                        <ul class="list-unstyled navbar__sub-list js-sub-list">

                                            <li class="has-sub active">
                                                <a href="resetpass.php">Reset Password</a>
                                            </li>
                                            <li class="has-sub">
                                                <a href="updatecustomerpro.php">Update profile data</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-sub">
                                        <a href="cusfeedback.php">
                                            <i class="fas fa-comments"></i>Feedback</a>
                                    </li>

                                    <li>
                                        <a href=../index.php?logout='1'""> <i class="fas fa-sign-out-alt"></i>Logout</a>
                                    </li>
                                </ul>
                            </nav>
                        </aside>
                        <!-- END MENU SIDEBAR-->
                    </div>
                    <div class="col-xl-9 pt-5">

                        <form method="post" action="resetpass.php">
                        <?php echo display_errorpass(); ?>
                            <div class="form-group">
                                <label>Current Password</label>
                                <input type="password" class="form-control" id="" name="old_pass">
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" id="password" onKeyUp="checkPasswordStrength();" name="new_pass">
                                <div id="password-strength-status" style="font-weight:bolder;"></div>
                            </div>

                            <div class="form-group">
                                <label>Retype new Password</label>
                                <input type="password" class="form-control" id="" name="re_pass">
                            </div>

                            <button type="submit" class="btn btn-primary" name="re_password">Update</button>
                        </form>


                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- END PAGE CONTENT  -->










    <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>