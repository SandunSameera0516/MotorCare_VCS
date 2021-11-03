<?php 
    include('../functions.php');
    if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

$n=$_SESSION['user']['nic'];
$sql="SELECT * FROM regvehicles WHERE nic='$n'";
if(isset($_GET["delv"])){
    $id = $_GET["delv"];
    $sqlmbo=mysqli_query($db,"DELETE FROM regvehicles WHERE id=$id");
  
         header('location: customerdash.php');

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
                        
                        <div class="account-wrap">
                            <div class="account-item account-item--style2 js-item-menu">
                                <div class="image">
                                    <img src="../css/assets/images/avatar-01.png" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <?php  if (isset($_SESSION['user'])) : ?>
                                        <!-- <a class="js-acc-btn" href="#"> -->
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
                        <div class="col-xl-3 pt-5" style="background-color: #d6d7d9;">
                            <!-- MENU SIDEBAR-->
                            <aside class="menu-sidebar3 js-spe-sidebar">
                                <nav class="navbar-sidebar2 navbar-sidebar3">
                                    <ul class="list-unstyled navbar__list">
                                        <li class="active has-sub">
                                            <a href="customerdash.php">
                                                <i class="fas fa-tachometer-alt"></i>Dashboard
                                            </a>
                                        </li>
                                     
                                       
                                        <li class="has-sub">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-car"></i>Service Request
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
                                                    <a href="servisehistory.php">Service History</a>
                                                </li>
                                                <li>
                                                    <a href="customerinspectio.php">Inspection report</a>
                                                </li>
                                                
                                            </ul>
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
                                                    <a href="resetpass.php">Reset Password</a>
                                                </li>
                                                 <li>
                                                    <a href="updatecustomerpro.php">Update profile data</a>
                                                </li>
                                            </ul>
                                        </li>
                                         <li>
                                            <a href="cusfeedback.php">
                                            <i class="fas fa-comments"></i>Feedback</a>
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
                                            <?php
                        if (isset($_SESSION['feedback'])) {
                                    echo $_SESSION['feedback'];
                                    unset($_SESSION['feedback']);
                                    }?>
                            
                              <h3>My Vehicles</h3>



                   <table class="table table-bordered table-dark ">
                              <thead>
                                <tr>
                                  <th scope="col">NIC</th>
                                  <th scope="col">Vehicle registration Number</th>
                                  <th scope="col">Vehicle Type</th>
                                  <th scope="col"></th>
                                  
                              

                                </tr>
                              </thead>

                    <?php if($result = mysqli_query($db,$sql)) :?>
                      <tbody>
                        <?php while($row =mysqli_fetch_array($result)) :?>
                        <?php echo "<tr>"; ?> 
                        <?php echo "<td>" . $row['nic'] . "</td>"; ?> 
                         <?php echo "<td>" . $row['vehicle_reg_no'] . "</td>"; ?> 
                         <?php echo "<td>" . $row['vehicle_type'] . "</td>"; ?>
                         <td><button type="button" class="btn btn-danger"><b><a href="customerdash.php?delv=<?php echo $row['id'];?>" class="text-white"><b>Remove Vehicle</a></b></button></td> 
                         <?php echo "</tr>"; ?> 
                     <?php endwhile ?>
                      </tbody>
                      <?php mysqli_free_result($result); ?>
                    <?php endif?>
                    <?php mysqli_close($db); ?>
                    </table>



                     <h3 class="pt-5">First Add Your Vehicles Here</h3>


                         <form action="customerdash.php" method="post">
                         <div class="form-group">
                            <label for="">NIC</label>
                            <input required type="text"  name="nic1" class="form-control" value="<?php echo $_SESSION['user']['nic'] ?>" readonly>
                        </div> 

                        <div class="form-group">
                            <label for="">Vehicle registrion Number</label>
                            <input required type="text"  name="veh_reg_no" class="form-control">
                        </div>  

                         <div class="form-group">
                            <label for="">Vehicle Type</label>
                            <select required type="text"  name="veh_type" class="form-control">

                            <option>Van</option>
                              <option>Car</option>
                              <option>Cab</option>
                              <option>SUV</option>
                          </select>

                        </div>  

                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit" name="add_veh">Add New Vehicle</button>
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
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>

</html>
