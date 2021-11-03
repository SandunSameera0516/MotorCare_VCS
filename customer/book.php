<?php 
    include('../functions.php');
    if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

$ni=$_SESSION['user']['nic'];
$sqlq="SELECT * FROM regvehicles WHERE nic='$ni'";

?> 


<?php
$mysqli = new mysqli('localhost', 'root', '', 'motorcare');
if(isset($_GET['date'])){
    $date = $_GET['date'];
     $stmt = $mysqli->prepare("select * from booking where date= ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }
            
            $stmt->close();
        }
    }
}


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $nicc = $_POST['nicc'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $pkg_name = $_POST['pkg_name'];
    $timeslot=$_POST['timeslot'];
    $vehicle_reg_no= $_POST['vehicle_reg_no'];
    $cus_booked="booked";
    $jobid=uniqid();

       $stmt = $mysqli->prepare("select * from booking where date= ? AND timeslot =?");
    $stmt->bind_param('ss', $date,$timeslot);
    $sql_check_same_veh = "SELECT * FROM booking WHERE date='$date' AND veh_regisration_no='$vehicle_reg_no'";
    $res_csm = mysqli_query($db, $sql_check_same_veh);

    if (mysqli_num_rows($res_csm) > 0) {
        array_push($errors, "<div class='alert alert-danger'>you already booked Service Request to $vehicle_reg_no</div>"); 	
       }else{
    
    
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
          $msg = "<div class='alert alert-danger'>already booked </div>";
        }else{
             $stmt = $mysqli->prepare("INSERT INTO booking (name,nic, timeslot,veh_regisration_no,mobile_no, address,package_name, date,status,jobid) VALUES (?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param('ssssssssss', $name, $nicc, $timeslot, $vehicle_reg_no, $mobile,$address,$pkg_name,$date,$cus_booked,$jobid);

    
    $stmt->execute();
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $bookings[]=$timeslot;
    $stmt->close();
    $mysqli->close();
        }
    }
}
   
}








$duration=30;
$cleanup=0;
$start="09:00";
$end="17:00";

function timeslots($duration,$cleanup,$start,$end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval=new DateInterval("PT".$duration."M");
    $cleanupInterval=new DateInterval("PT".$cleanup."M");

   

    $slots=array();



    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);

        if($endPeriod>$end){
            break;
        }

        $slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
     
      
       
    }
    return $slots;



}

?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title></title>

     <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

     <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">
      <link rel="stylesheet" type="text/css" href="../css/styles.css">
  </head>

  <body>
      
    <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="customerdash.php">
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



       
    <div class="container pt-5">

    <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="customerdash.php"><b>Customer Dashboard</b></a></li>
    <li class="breadcrumb-item active" aria-current="page"><b>Book Now</b></li>
  </ol>
</nav>
        <h1 class="text-center pt-3">Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
            <?php echo display_error(); ?>
                <?php echo isset($msg)?$msg:""; ?>
            </div>


            <?php $timeslots = timeslots($duration,$cleanup,$start,$end);
                foreach ($timeslots as $ts) {
                  
            ?>
            <div class="col-md-2">
                <div class="form-group">
                    <?php if(in_array($ts, $bookings)){ ?>
                             <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Booked"><?php echo $ts; ?></button>
                    <?php }else{ ?>
                         <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"> <?php echo $ts; ?></button>

                    <?php } ?>
               
            </div>
        </div>
                <?php } ?>
        </div>
    </div>






<div class="pt-5">
 <?php   
 include('packages.php') ;
 ?>
</div>

















    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-md-12">
                   <form action="" method="post">
                        <div class="form-group">
                            <label for="">Timeslot</label>
                            <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                        </div> 

                         <div class="form-group">
                            <label for="">Name</label>
                            <input required type="text"  readonly name="name" class="form-control" value="<?php echo $_SESSION['user']['name']; ?>">
                        </div> 

                        <div class="form-group">
                            <label for="">NIC</label>
                            <input required type="text" readonly name="nicc" class="form-control" value="<?php echo $_SESSION['user']['nic']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Address</label>
                            <input required type="text" readonly name="address" class="form-control" value="<?php echo $_SESSION['user']['address']; ?>">
                        </div>  

                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input required type="text" readonly name="mobile" class="form-control" value="<?php echo $_SESSION['user']['mobile']; ?>">
                        </div>  


                         <div class="form-group">
                                    <label for="">Select a Package</label>
                                    <select class="form-control" id="pkg_name" name="pkg_name">
                                      <option>Auto Service plus</option>
                                      <option>Green Drive</option>
                                      <option>Grand one Experience</option>
                                    </select>
                                  </div>

                         <div class="form-group">
                            <label for="exampleFormControlSelect1">Vehicle Registration Number</label>
                            <select class="form-control" name="vehicle_reg_no" id="veh_reg">
                                <?php if($result = mysqli_query($db,$sqlq)) :?>
                                    <?php while($row =mysqli_fetch_array($result)) :?>
                            

                                 <?php echo "<option>" . $row['vehicle_reg_no'] . "</option>"; ?> 
                                 <?php endwhile ?>
                                    
                                      <?php mysqli_free_result($result); ?>
                                    <?php endif?>
                                    <?php mysqli_close($db); ?>
                            </select>
                        </div>


                       

                        <div class="form-group pull-right">
                            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                        </div>


                   </form>
           </div> 
        </div>
      </div>
     
    </div>

  </div>
</div>









   
<script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
<script src="../vendor/bootstrap/js/popper.min.js"></script>
<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");

        })
    </script>
  </body>



</html>
