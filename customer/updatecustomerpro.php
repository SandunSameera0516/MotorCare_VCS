<?php
include('../functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

$updateprofile="";
$updateprofile = $_SESSION['user']['id'];
$updateprores = mysqli_query($db, "SELECT * FROM login WHERE id='$updateprofile'");


$uname = "";
$unic = "";
$uaddress = "";
$umobile = "";
$uemail = "";
$errorsup   = array();



if(isset($_POST['updatename'])){
    global $uname;
    $uname = $_POST['upname'];
    $_SESSION['user']['name']=$uname;
    $sql_euname = "SELECT * FROM login WHERE name='$uname'";
    $res_euname = mysqli_query($db, $sql_euname);
    if (mysqli_num_rows($res_euname) > 0) {
        array_push($errorsup, "Sorry... name already exists");
    }


    if (count($errorsup) == 0) {

    $qupdatename = "UPDATE login SET name ='$uname' where id='$updateprofile'";
    mysqli_query($db, $qupdatename);
    header("location:updatecustomerpro.php");
    }
}




if(isset($_POST['updatenic'])){
    global $unic;
    $unic = $_POST['upnic'];
    $_SESSION['user']['nic']=$unic;
    if ((strlen($unic) != 10)) {
        array_push($errorsup, "Sorry...Your nic not valid");
    }

    $sql_nu = "SELECT * FROM login WHERE nic='$unic'";
    $res_nu = mysqli_query($db, $sql_nu);
    if (mysqli_num_rows($res_nu) > 0) {
        array_push($errorsup, "Sorry... nic already exists");
    }

    if (count($errorsup) == 0) {
    $qupdatenic = "UPDATE login SET nic ='$unic' where id='$updateprofile'";
    mysqli_query($db, $qupdatenic);
    header("location:updatecustomerpro.php");
    }
}




if(isset($_POST['updateemail'])){
    global $uemail;
    $uemail = $_POST['upemail'];

    $_SESSION['user']['email']=$uemail;

    $sql_eu = "SELECT * FROM login WHERE email='$uemail'";
    $res_eu = mysqli_query($db, $sql_eu);
    if (mysqli_num_rows($res_eu) > 0) {
        array_push($errorsup, "Sorry... email already taken");
    }

    if (count($errorsup) == 0) {
    $qupdateemail = "UPDATE login SET email ='$uemail' where id='$updateprofile'";
    mysqli_query($db,$qupdateemail);
    header("location:../index.php?logout='1'");
    }
}





if(isset($_POST['updateaddress'])){
    global $uaddress;
    $uaddress = $_POST['upaddress'];

    $_SESSION['user']['address']=$uaddress;

    $sql_adu = "SELECT * FROM login WHERE address='$uaddress'";
    $res_adu = mysqli_query($db, $sql_adu);
    if (mysqli_num_rows($res_adu) > 0) {
        array_push($errorsup, "Sorry... Address is already taken");
    }

    if (count($errorsup) == 0) {
    $qupdateadd = "UPDATE login SET address ='$uaddress' where id='$updateprofile'";
    mysqli_query($db,$qupdateadd);
    header("location:updatecustomerpro.php");
    }
}




if(isset($_POST['updatemobile'])){
    global $umobile;
    $umobile = $_POST['upmobile'];

    $_SESSION['user']['mobile']=$umobile;

    $sql_mobi = "SELECT * FROM login WHERE mobile='$umobile'";
    $res_mobi = mysqli_query($db, $sql_mobi);
    if (mysqli_num_rows($res_mobi) > 0) {
        array_push($errorsup, "Sorry... Mobile number is already taken");
    }

    if ((strlen($umobile) != 10)) {
        array_push($errorsup, "Please enter valid mobile number");
    }

    if (count($errorsup) == 0) {
    $qupdatemobi = "UPDATE login SET mobile ='$umobile' where id='$updateprofile'";
    mysqli_query($db,$qupdatemobi);
    header("location:updatecustomerpro.php");
    }
}








function display_errorup()
{
    global $errorsup;

    if (count($errorsup) > 0) {
        echo '<div class="error">';
        foreach ($errorsup as $errorsup) {
            echo $errorsup . '<br>';
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

<body style="font-weight: bolder;">

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

                                        <li class="has-sub">
                                                <a href="resetpass.php">Reset Password</a>
                                            </li>
                                            <li class="has-sub active">
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

                        <?php while ($row = mysqli_fetch_array($updateprores)) { ?>
                            <form action="updatecustomerpro.php" method="post">
                            <?php echo display_errorup(); ?>
                                <div class="form-group">
                                
                                    <label for="">Name</label>
                                   
                                    <div class="input-group mb-3">
                                        <input required type="text" name="upname" id="'.$row['id'].'" class="form-control" value="<?php echo $row['name']; ?>"  aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="updatename">update</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>



                                <div class="form-group">
                                
                                    <label for="">NIC</label>
                                    
                                    <div class="input-group mb-3">
                                        <input required type="text" name="upnic" id="'.$row['id'].'" class="form-control" value="<?php echo $row['nic']; ?>"  aria-describedby="basic-addon3">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="updatenic">update</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>



                                <div class="form-group">
                                
                                    <label for="">Email</label>
                                    
                                    <div class="input-group mb-3">
                                        <input required type="text" name="upemail" id="'.$row['id'].'" class="form-control" value="<?php echo $row['email']; ?>"  aria-describedby="basic-addon4">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="updateemail">update</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>



                                <div class="form-group">
                                
                                    <label for="">Address</label>
                                    
                                    <div class="input-group mb-3">
                                        <input required type="text" name="upaddress" id="'.$row['id'].'" class="form-control" value="<?php echo $row['address']; ?>"  aria-describedby="basic-addon5">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="updateaddress">update</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>



                                <div class="form-group">
                                
                                    <label for="">Mobile</label>
                                    
                                    <div class="input-group mb-3">
                                        <input required type="text" name="upmobile" id="'.$row['id'].'" class="form-control" value="<?php echo $row['mobile']; ?>"  aria-describedby="basic-addon6">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" name="updatemobile">update</button>
                                        </div>
                                        
                                    </div>
                                    
                                </div>






                            </form>

                            

                            <!-- </form> -->

                        <?php } ?>


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

</body>

</html>