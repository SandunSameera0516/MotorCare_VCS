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
if(isset($_POST['id'])){
	$id=$_POST['id'];
	$queryjc="SELECT * FROM booking where id=".$id;
}

$sqlfm="SELECT * FROM login where user_type='mechanic'";


if(isset($_POST['send_mech'])){
    
    $cid = $_POST['idjc'];
	$cname = $_POST['name'];
    $cnic = $_POST['nicc'];
    $cmobile = $_POST['mobile'];
    $caddress = $_POST['address'];
    $cpkg_name = $_POST['pkg_name'];
    $ctimeslot=$_POST['timeslot'];
    $cvehicle_reg_no= $_POST['veh_reg_no'];
    $maname = $_POST['mech_name'];
    $cdate = e($_POST['datec']);
    $jobcrd_created="jobcreated";
    
    $jobrecicrdid=$_POST['jobcardid'];
 

    $querytomech = "INSERT INTO jobcard (id,mechanic_name,cus_name,cus_nic,cus_address,cus_mobile,cus_selected_pkg,cus_veh_reg_no,cdate,timeslot,job_id,status) 
			VALUES('$cid','$maname','$cname','$cnic','$caddress', '$cmobile', '$cpkg_name','$cvehicle_reg_no','$cdate','$ctimeslot','$jobrecicrdid','$jobcrd_created')";
            mysqli_query($db,$querytomech);
            
    $querycreatedjobcard="UPDATE booking SET status='$jobcrd_created' where jobid='$jobrecicrdid'";
    mysqli_query($db,$querycreatedjobcard);

	$_SESSION['message'] = "<div class='alert alert-success'>Job card sent to the Machanic</div>";
   	header('location:recidashboard.php');

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

<body style="font-weight: bolder">
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
                                    <img src="../css/assets/images/reci.png" alt="John Doe" />
                                </div>
                                <div class="content">
                                   <?php  if (isset($_SESSION['user'])) : ?>
                    <strong><?php echo $_SESSION['user']['name']; ?></strong>
                    <small>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</small> <i class="fas fa-sort-down"></i>
                <?php endif ?>
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

       

<div class="container">
<div class="container pt-5">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="recidashboard.php"><b>Receptionist Dashboard</b></a></li>
<li class="breadcrumb-item active" aria-current="page"><b>Create Job Card</b></li>
</ol>
</nav>
     <div class="row">
           <div class="col-md-12 pt-5">

           <?php
           $resultjc=mysqli_query($db,$queryjc);
            
            ?>


       <?php while ($row =mysqli_fetch_array($resultjc)){?>

                   <form action="createjobcard.php" method="post">

                        <h1 class="text-center">Job Card</h1>
                        <h3 class="text-center"><?php echo $row['veh_regisration_no']; ?></h3>
                        <h5 class="text-center">Customer Name-<?php echo $row['name']; ?></h5>
                        <h6 class="text-center"><?php echo $row['date']; ?></h6>
                        <h6 class="text-center"><?php echo $row['jobid']; ?></h6>

                        <input type="hidden" name="jobcardid" class="form-control" value="<?php echo $row['jobid'];?>">

                   
                        <input required type="hidden"  readonly name="idjc" id="'.$row['id'].'" class="form-control" value="<?php echo $row['id']; ?>">


                        <div class="form-group">
                            <label for="">Job ID</label>
                            <input type="text" readonly name="jobcardid" class="form-control" value="<?php echo $row['jobid'];?>">
                        </div>
                   
                        <div class="form-group">
                            <label for="">Time</label>
                            <input required type="text" readonly name="timeslot" id="'.$row['id'].'" class="form-control" value="<?php echo $row['timeslot']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Date</label>
                            <input required type="text" readonly name="datec" id="'.$row['id'].'" class="form-control" value="<?php echo $row['date']; ?>">
                        </div>  

                        

                         <div class="form-group">
                            <label for="">Name</label>
                            <input required type="text"  readonly name="name" id="'.$row['id'].'" class="form-control" value="<?php echo $row['name']; ?>">
                        </div> 

                        <div class="form-group">
                            <label for="">NIC</label>
                            <input required type="text" readonly name="nicc" id="'.$row['id'].'" class="form-control" value="<?php echo $row['nic']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input required type="text" readonly name="address" id="'.$row['id'].'" class="form-control" value="<?php echo $row['address']; ?>">
                        </div>  

                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input required type="text" readonly name="mobile" id="'.$row['id'].'" class="form-control" value="<?php echo $row['mobile_no']; ?>">
                        </div>  


                        <div class="form-group">
                            <label for="">Package Name</label>
                            <input required type="text" readonly name="pkg_name" id="'.$row['id'].'" class="form-control" value="<?php echo $row['package_name']; ?>">
                        </div> 

                          <div class="form-group">
                            <label for="">Vehicle Registration Number</label>
                            <input required type="text" readonly name="veh_reg_no" id="'.$row['id'].'" class="form-control" value="<?php echo $row['veh_regisration_no']; ?>">
                        </div> 


                      	 <div class="form-group">
                            <label for="exampleFormControlSelect1">Mechanic Name</label>
                            <select class="form-control" type="text" name="mech_name" id="">
                                <?php if($resultfm = mysqli_query($db,$sqlfm)) :?>
                                    <?php while($rowfm =mysqli_fetch_array($resultfm)) :?>
                            

                                 <?php echo "<option>" . $rowfm['name'] . "</option>"; ?> 
                                 <?php endwhile ?>
                                    
                                      <?php mysqli_free_result($resultfm); ?>
                                    <?php endif?>
                                    <?php mysqli_close($db); ?>
                            </select>
                        </div>

                       


                         <div class="form-group pull-right pt-4 pb-5">
                            <button class="btn btn-primary" type="submit" name="send_mech">Send to Mechanic</button>
                        </div>

                    </form>

  <?php } ?>      
   





<script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../vendor/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

</body>

</html>
