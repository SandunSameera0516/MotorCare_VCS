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

    function registreduserCount($db) 
        {
    $sqlrc = "SELECT COUNT(id) FROM login WHERE user_type='user'";
    $resultrc = mysqli_query($db,$sqlrc);
    $rowsrc = mysqli_fetch_row($resultrc);
    return $rowsrc[0];
        }

        function recicount($db) 
        {
    $sqlrec = "SELECT COUNT(id) FROM login WHERE user_type='receptionist'";
    $resultrec = mysqli_query($db,$sqlrec);
    $rowsrec = mysqli_fetch_row($resultrec);
    return $rowsrec[0];
        }

        function mechaniccount($db) 
        {
    $sqlmc = "SELECT COUNT(id) FROM login WHERE user_type='mechanic'";
    $resultmc = mysqli_query($db,$sqlmc);
    $rowsmc = mysqli_fetch_row($resultmc);
    return $rowsmc[0];
        }

        function cashiercount($db) 
        {
    $sqlcc = "SELECT COUNT(id) FROM login WHERE user_type='cashier'";
    $resultcc = mysqli_query($db,$sqlcc);
    $rowscc = mysqli_fetch_row($resultcc);
    return $rowscc[0];
        }

        function registredvehicles($db) 
        {
    $sqlrv = "SELECT COUNT(id) FROM regvehicles";
    $resultrv = mysqli_query($db,$sqlrv);
    $rowsrv = mysqli_fetch_row($resultrv);
    return $rowsrv[0];
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
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">

</head>

<body style="font-weight: bolder;">
    <div>
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
                        <!-- <div class="header-button-item has-noti js-item-menu">
                            <i class="zmdi zmdi-notifications"></i>
                            <div class="notifi-dropdown js-dropdown">
                                <div class="notifi__title">
                                    <p>You have 3 Notifications</p>
                                </div>
                                <div class="notifi__item">
                                    <div class="content">
                                        <p>You got a email notification</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                  
                                    <div class="content">
                                        <p>Your account has been blocked</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__item">
                                   
                                    <div class="content">
                                        <p>You got a new file</p>
                                        <span class="date">April 12, 2018 06:50</span>
                                    </div>
                                </div>
                                <div class="notifi__footer">
                                    <a href="#">All notifications</a>
                                </div>
                            </div>
                        </div>
                        -->
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
                                        <li class="active has-sub">
                                            <a href="admindasboard.php">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>

                                        <li>
                                            <a href="admincalview.php">
                                            <i class="fas fa-comments"></i>Calender</a>
                                        </li>
                                     
                                       
                                        <li class="has-sub">
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
                                                <li>
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
                                            <a class="js-arrow" href="#">
                                            <i class="fas fa-user"></i>My Account
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                
                                                <li>
                                                    <a href="adminresetpass.php">Reset Password</a>
                                                </li>
                                                 <li>
                                                    <a href="adminupdatepro.php">Update profile data</a>
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
                                            <a href="cusviewfeedback.php">
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
                        <?php if (isset($_SESSION['success'])) : ?>
          <?php 
            echo $_SESSION['success']; 
            unset($_SESSION['success']);
          ?>
    <?php endif ?>   
                        
                

                        <div class="row py-4">
                        <div class="col-md-6">
                     
                       <a class="btn btn-primary btn-lg btn-block py-4 px-4" href="regusers.php" role="button"><b>Total Registered Users</b><br><span style="font-size:30px;"><?php echo registreduserCount($db);  ?></span></a>
                        </div>
                        <div class="col-md-6">
                        <a class="btn btn-info btn-lg btn-block py-4 px-4" href="totalregvehicles.php" role="button"><b>Total Registered Vehicles</b><br><span style="font-size:30px;"><?php echo registredvehicles($db);  ?></span></a>
                        
                        </div>
                        </div>

                        <div class="row pb-4">
                            <div class="col-md-4">
                            
                            <a class="btn btn-warning btn-lg btn-block py-4 px-4" href="regmechanics.php" role="button"><b>Mechanics</b><br><span style="font-size:30px;"><?php echo mechaniccount($db);  ?></span></a>  
                        </div>
                            <div class="col-md-4">
                            <a class="btn btn-warning btn-lg btn-block py-4 px-4" href="regcashiers.php" role="button"><b>Cashiers</b><br><span style="font-size:30px;"><?php echo cashiercount($db); ?></span></a>
                           
                            </div>
                            <div class="col-md-4">
                            <a class="btn btn-warning btn-lg btn-block py-4 px-4" href="regreciptionists.php" role="button"><b>Reciptionists</b><br><span style="font-size:30px;"><?php echo recicount($db); ?></span></a>
                           
                            </div>
                        </div>



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

