<?php
include('../functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}


$servicehis = $_SESSION['user']['nic'];
$resservisehis = mysqli_query($db, "SELECT * FROM bill WHERE ins_nic='$servicehis' and status='finished'");
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
                                    <img src="../css/assets/images/avatar-01.png" />
                                </div>
                                <div class="content">
                                   <?php  if (isset($_SESSION['user'])) : ?>
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
                                            <a href="customerdash.php">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>


                                        <li class="active has-sub">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-trophy"></i>Servise Request
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
                                                <li class="active has-sub">
                                                    <a href="servisehistory.php">service History</a>
                                                </li>
                                                <li>
                                                    <a href="customerinspectio.php">Inspection report</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li class="has-sub">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-copy"></i>My Account
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                            <li class="has-sub">
                                                <a href="resetpass.php">Reset Password</a>
                                            </li>
                                            <li class="has-sub">
                                                <a href="updatecustomerpro.php">Update profile data</a>
                                            </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="cusfeedback.php">
                                                <i class="fas fa-shopping-basket"></i>Feedback</a>
                                        </li>

                                        <li>
                                            <a href=../index.php?logout='1'""> <i class="fas fa-shopping-basket"></i>Logout</a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-9 pt-5">
                            <table class="table table-bordered table-dark ">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Date of Booking</th>
                                        <th scope="col">Vehicle registration Number</th>
                                        <th scope="col">Package Name</th>
                                        <th scope="col">View</th>



                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($resservisehis)) { ?>
                                        <tr>
                                            <td><?php echo $row['ins_custname']; ?></td>
                                            <td><?php echo $row['insdate']; ?></td>
                                            <td><?php echo $row['ins_veh_regno']; ?></td>
                                            <td><?php echo $row['pckagename']; ?></td>
                                            <form action="viewservicereport.php" method="post">
                                            <input type="hidden" name="id" value=<?php echo $row['id']; ?>>

                                            <td><button type="submit" name="" class="btn btn-success">View</button></td>
                                            
                                        </form>



                                        </tr>


                                    <?php } ?>


                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->

    </div>














    <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>