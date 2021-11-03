<?php 
    include('../functions.php');
    include('rerivebookings.php');
if (!isReceptionist()) {
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
    <title>Receptionist Dashboard</title>

    <!-- Fontfaces CSS-->
  
  
    <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

       <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">

</head>

<body style="font-weight: bolder;">
    <div class="page-wrapper">
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="recidashboard.php">
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
                        </div> -->
                       
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
                                            <a href="recidashboard.php">
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
                                            <a href="recidashboard.php">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>
                                     
                                      
                                         <li>
                                            <a href="recicalender.php">
                                            <i class="fas fa-calendar-alt"></i>Calender</a>
                                        </li>


                                         <li class="active has-sub">
                                            <a href="createdjobcardhistory.php">
                                            <i class="fas fa-history"></i>Created job cards</a>
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
                        <div class="col-xl-9 py-5">
<?php
                            if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
  unset($_SESSION['message']);

  
}?>

 <div class="table-responsive">
    <table class="table table-hover table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">Customer id</th>
      <th scope="col">Job id</th>
      <th scope="col">date</th>
      <th scope="col">Time</th>
        <th scope="col">Customer Name</th>
      <th scope="col">NIC</th>
     <th scope="col">Address</th>
        <th scope="col">Mobile</th>
      <th scope="col">Package Name</th>
      <th scope="col">Vehicle Registration Number</th>
       <th scope="col">Job Card Sent to</th>
   
   

    </tr>
  </thead>


  <tbody>
    <?php while ($rowjch =mysqli_fetch_array($jobcrdcreatedhistory)){?>
    <tr>
        <td><?php echo $rowjch['id']; ?></td>
        <td><?php echo $rowjch['job_id']; ?></td>
        <td><?php echo $rowjch['cdate']; ?></td>
         <td><?php echo $rowjch['timeslot']; ?></td>
              <td><?php echo $rowjch['cus_name']; ?></td>
              <td><?php echo $rowjch['cus_nic']; ?></td>
             <td><?php echo $rowjch['cus_address']; ?></td>
         <td><?php echo $rowjch['cus_mobile']; ?></td>
          <td><?php echo $rowjch['cus_selected_pkg']; ?></td>
         <td><?php echo $rowjch['cus_veh_reg_no']; ?></td>
            <td class="bg-info"><?php echo $rowjch['mechanic_name']; ?></td>
       
       
        


       
        
    </tr>


    <?php } ?>


  </tbody>
</table>
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
