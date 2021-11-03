<?php
include('../functions.php');
if (!isMechanic()) {
    $_SESSION['msg'] = "You must log in first";
    header('location:login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location:login.php");
}

$mech = $_SESSION['user']['name'];
$resultsmech = mysqli_query($db, "SELECT * FROM jobcard WHERE mechanic_name='$mech'");

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $queryins = "SELECT * FROM jobcard where id=" . $id;
}

$brand="";
$price="";
$engquery = "SELECT brand FROM engine_oil";
$resulteo = mysqli_query($db, $engquery);
while($row = mysqli_fetch_array($resulteo))
{
 $brand .= '<option value="'.$row["brand"].'">'.$row["brand"].'</option>';
}


$oilbrand="";
$oilprice="";
$oilquery = "SELECT oilfilter_brand FROM oil_filter";
$resultof = mysqli_query($db, $oilquery);
while($row = mysqli_fetch_array($resultof))
{
 $oilbrand .= '<option value="'.$row["oilfilter_brand"].'">'.$row["oilfilter_brand"].'</option>';
}


$fuelbrand="";
$fuelprice="";
$fuelquery = "SELECT fuel_brand FROM fuel_filter";
$resultfueloil = mysqli_query($db, $fuelquery);
while($rowf = mysqli_fetch_array($resultfueloil))
{
 $fuelbrand .= '<option value="'.$rowf["fuel_brand"].'">'.$rowf["fuel_brand"].'</option>';
}


$airbrand="";
$airprice="";
$airquery = "SELECT airf_brand FROM air_filter";
$resultair = mysqli_query($db, $airquery);
while($rowai = mysqli_fetch_array($resultair))
{
 $airbrand .= '<option value="'.$rowai["airf_brand"].'">'.$rowai["airf_brand"].'</option>';
}


$acbrand="";
$acprice="";
$acquery = "SELECT acf_brand FROM ac_filter";
$resultac = mysqli_query($db, $acquery);
while($rowac = mysqli_fetch_array($resultac))
{
 $acbrand .= '<option value="'.$rowac["acf_brand"].'">'.$rowac["acf_brand"].'</option>';
}



$coolantbrand="";
$coolantprice="";
$coolantquery = "SELECT cooland_brand FROM coolant";
$resultcool = mysqli_query($db, $coolantquery);
while($rowcoo = mysqli_fetch_array($resultcool))
{
 $coolantbrand .= '<option value="'.$rowcoo["cooland_brand"].'">'.$rowcoo["cooland_brand"].'</option>';
}






$brakebrand="";
$brakeprice="";
$brakequery = "SELECT brkoil_brand FROM brake_oil";
$resultbreak = mysqli_query($db, $brakequery);
while($rowbo = mysqli_fetch_array($resultbreak))
{
 $brakebrand .= '<option value="'.$rowbo["brkoil_brand"].'">'.$rowbo["brkoil_brand"].'</option>';
}




if(isset($_POST['insbt'])){
    $inmech = $_POST['mech_name_ins'];
    $insid = $_POST['idjc'];
	$insname = $_POST['cusname'];
    $insnic = $_POST['nicc'];
    $insmobile = $_POST['mobile'];
    $inspkg_name = $_POST['packagename'];
    $instimeslot=$_POST['timeslot'];
    $insdate=$_POST['datec'];
    $insvehicle_reg_no= $_POST['veh_reg_no'];

    $eng_status= $_POST['eng_stat'];
    $eng_brand=$_POST['eng_brand_name'];
    $eng_quan=$_POST['eng_qun'];
    $eng_price=$_POST['price'];
    $eng_amount=$_POST['output'];

    $oil_status=$_POST['oil_stat'];
    $oil_brand=$_POST['oilbrand'];
    $oil_quan=$_POST['oil_input'];
    $oil_price=$_POST['oilprice'];
    $oil_amount=$_POST['output1'];
    
    $fuel_status=$_POST['fuel_stat'];
    $fuel_brand=$_POST['fuelbrand'];
    $fuel_quan=$_POST['fuel_input'];
    $fuel_price=$_POST['fuelprice'];
    $fuel_amount=$_POST['output2'];
    
    $air_status=$_POST['air_stat'];
    $air_brand=$_POST['airbrand'];
    $air_quan=$_POST['air_input'];
    $air_price=$_POST['airprice'];
    $air_amount=$_POST['output3'];
    
    $ac_status=$_POST['ac_stat'];
    $ac_brand=$_POST['acbrand'];
    $ac_quan=$_POST['ac_input'];
    $ac_price=$_POST['acprice'];
    $ac_amount=$_POST['output4'];
    
    $cool_status=$_POST['cool_stat'];
    $cool_brand=$_POST['coolantbrand'];
    $cool_quan=$_POST['cool_input'];
    $cool_price=$_POST['coolantprice'];
    $cool_amount=$_POST['output5'];
    
    $brke_status=$_POST['brake_stat'];
    $brke_brand=$_POST['brakebrand'];
    $brke_quan=$_POST['brake_input'];
    $brke_price=$_POST['brakeprice'];
    $brke_amount=$_POST['output6'];

    $tsum=$_POST['sum'];
    $jobidins=$_POST['jobidins'];
    $needtocheck="needtocheck";
  
    
    $queryins = "INSERT INTO inspection(id,instime,insdate,pckagename,ins_custname,ins_nic,ins_mobile,ins_veh_regno,eng_status,
    eng_brand,eng_quantity,eng_price,eng_amount,oil_status,oil_brand,oil_quantity,oil_price,oil_amount,fuel_status,fuel_brand,
    fuel_quan,fuel_price,fuel_amount,air_status,air_brand,air_quan,air_price,air_amount,ac_status,ac_brand,ac_qun,ac_price,
    ac_amount,cool_status,cool_brand,cool_qun,cool_price,cool_amount,brake_status,brk_brand,brk_quntity,brk_price,brk_amount,total,jobins_id,mech_name,status) 
    VAlUES('$insid','$instimeslot','$insdate','$inspkg_name','$insname','$insnic','$insmobile','$insvehicle_reg_no','$eng_status','$eng_brand',
    '$eng_quan','$eng_price','$eng_amount','$oil_status','$oil_brand','$oil_quan','$oil_price','$oil_amount','$fuel_status','$fuel_brand',
    '$fuel_quan','$fuel_price','$fuel_amount','$air_status','$air_brand','$air_quan','$air_price','$air_amount','$ac_status','$ac_brand',
    '$ac_quan','$ac_price','$ac_amount','$cool_status','$cool_brand','$cool_quan','$cool_price','$cool_amount','$brke_status','$brke_brand','$brke_quan','$brke_price','$brke_amount','$tsum','$jobidins','$inmech','$needtocheck')";
    mysqli_query($db,$queryins);

    $querysendinspectiontocus="UPDATE jobcard SET status='sendtocustomer' where job_id='$jobidins'";
    mysqli_query($db,$querysendinspectiontocus);


    header('location:mechanicdashboard.php');
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Mechanic Dashboard</title>

    <!-- Fontfaces CSS-->


    <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">

</head>

<body onmousemove="doMath();" style="font-weight: bolder;">

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
                  
                    <div class="account-wrap">
                        <div class="account-item account-item--style2 js-item-menu">
                            <div class="image">
                                <img src="../css/assets/images/reci.png" />
                            </div>
                            <div class="content">
                                <?php if (isset($_SESSION['user'])) : ?>
                                    <strong><?php echo $_SESSION['user']['name']; ?></strong>
                                    <small>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</small> <i class="fas fa-sort-down"></i>
                                <?php endif ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">

                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="mechanicdashboard.php">
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






    <div class="container">
    <div class="container pt-5">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="mechanicdashboard.php"><b>Mechanic Dashboard</b></a></li>
<li class="breadcrumb-item active" aria-current="page"><b>Create Inspection Report Now</b></li>
</ol>
</nav>
        <div class="row">
            <div class="col-md-12 pt-5">

                <?php
                $resultins = mysqli_query($db, $queryins);

                ?>


                <?php while ($rowins = mysqli_fetch_array($resultins)) { ?>

                    <form action="inspectionreport.php" method="post">

                        <h1 class="text-center">Inspection Report for <?php echo $rowins['cus_veh_reg_no']; ?></h1>
                        <h3 class="text-center pb-2">Customer Name - <?php echo $rowins['cus_name']; ?></h3>
                        <h6 class="text-center pb-2">Mechanic Name-<?php echo $rowins['mechanic_name']; ?></h6>
                        <h2 class="text-center pb-2"><?php echo $rowins['cdate']; ?></h2>
                       
                        <h5 class="text-center pb-4">Job ID - <?php echo $rowins['job_id']; ?></h5>

                        <input type="hidden" readonly name="mech_name_ins" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['mechanic_name']; ?>">
                        <input required type="hidden" readonly name="idjc" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['id']; ?>">
                        <div class="form-group">
                            <label for="">Job ID</label>
                            <input type="text" readonly name="jobidins" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['job_id']; ?>">

                        </div>

                        <div class="form-group">
                            <label for="">Time Slot</label>
                            <input required type="text" readonly name="timeslot" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['timeslot']; ?>">
                        </div>

                
                           
        

                        <div class="form-group">
                            <label for="">Date</label>
                            <input required type="text" readonly name="datec" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cdate']; ?>">
                        </div>


                        <div class="form-group">
                            <label for="">Package Name</label>
                            <input required type="text" readonly name="packagename" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cus_selected_pkg']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Customer Name</label>
                            <input required type="text" readonly name="cusname" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cus_name']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">NIC</label>
                            <input required type="text" readonly name="nicc" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cus_nic']; ?>">
                        </div>


                        <div class="form-group">
                            <label for="">Mobile</label>
                            <input required type="text" readonly name="mobile" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cus_mobile']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Vehicle Registration Number</label>
                            <input required type="text" readonly name="veh_reg_no" id="'.$rowins['id'].'" class="form-control" value="<?php echo $rowins['cus_veh_reg_no']; ?>">
                        </div>

                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-2">Status</div>
                            <div class="col-md-2">Brand</div>
                            <div class="col-md-2">Quantity</div>
                            <div class="col-md-2">price</div>
                            <div class="col-md-2">Amount</div>
                        </div>

                        <!-- engine oil-->

                        <div class="row">
                            <div class="col-md-2">Engine oil</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd" name="eng_stat">
                                        <option>need to replaced</option>
                                        <option value="no need engine oil">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control action" type="text" name="eng_brand_name" id="brand">
                                    <option value="0">--Select Brand--</option>
                                                <?php echo $brand;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput" oninput="myFunction()" name="eng_qun">
                                    <option value="0">--Select litres--</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action" type="text" name="price" id="price">
                                              <option value="0">--Engine oil price--</option>
                                                <?php echo $price;?>
                                               </select>
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2" >
                                <div class="form-group">
                                    <input required type="text" readonly name="output" id="output" class="form-control" value="0" onmousemove="doMath();">
                                </div>
                            </div>
                        </div>

                    <!-- engine oil finish -->



                        <!-- oil filter  -->

                        <div class="row">
                            <div class="col-md-2">Oil filter</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd1" name="oil_stat">
                                        <option>need to replaced</option>
                                        <option value="no need oil filter">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control action1" type="text" name="oilbrand" id="oilbrand">
                                    <option value="0">--Select oil Brand--</option>
                                                <?php echo $oilbrand;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput1" oninput="myFunction1()" name="oil_input">
                                        <option value="0">-Select quantity-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action1" type="text" name="oilprice" id="oilprice">
                                              <option value="0">--Oil Filter price--</option>
                                                <?php echo $oilprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output1" id="output1" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!-- oil filter finish -->


                        <!-- fuel filter  -->

                        <div class="row">
                            <div class="col-md-2">Fuel filter</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd2" name="fuel_stat">
                                        <option>need to replaced</option>
                                        <option value="no need fuel filter">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action2" type="text" name="fuelbrand" id="fuelbrand">
                                    <option value="0">--Select Fuel Brand--</option>
                                                <?php echo $fuelbrand;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput2" oninput="myFunction2()" name="fuel_input">
                                        <option value="0">-Select quantity-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                     <select class="form-control action2" type="text" name="fuelprice" id="fuelprice">
                                              <option value="0">--fuel Filter price--</option>
                                                <?php echo $fuelprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output2" id="output2" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!-- fuel filter finish -->



                        <!-- air filter  -->

                        <div class="row">
                            <div class="col-md-2">Air filter</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd3" name="air_stat">
                                        <option>need to replaced</option>
                                        <option value="no need air filter">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action3" type="text" name="airbrand" id="airbrand">
                                    <option value="0">--Select Air Brand--</option>
                                                <?php echo $airbrand;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput3" oninput="myFunction3()" name="air_input">
                                    <option value="0">-Select quantity-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                     <select class="form-control action3" type="text" name="airprice" id="airprice">
                                              <option value="0">--air Filter price--</option>
                                                <?php echo $airprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output3" id="output3" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!-- air filter finish -->



                        <!-- AC filter  -->

                        <div class="row">
                            <div class="col-md-2">AC filter</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd4" name="ac_stat">
                                        <option>need to replaced</option>
                                        <option value="no need ac filter">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action4" type="text" name="acbrand" id="acbrand">
                                    <option value="0">--Select AC Brand--</option>
                                                <?php echo $acbrand;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput4" oninput="myFunction4();" name="ac_input">
                                        <option value="0">-Select quantity-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control action4" type="text" name="acprice" id="acprice">
                                              <option value="0">--AC Filter price--</option>
                                                <?php echo $acprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output4" id="output4" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!-- AC filter finish -->


                        <!-- coolant  -->

                        <div class="row">
                            <div class="col-md-2">Coolant</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control" id="nnd5" name="cool_stat">
                                        <option>need to replaced</option>
                                        <option value="no coolant needed">no need</option>
                                        
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action5" type="text" name="coolantbrand" id="coolantbrand">
                                    <option value="0">--Select Coolant Brand--</option>
                                                <?php echo $coolantbrand;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput5" oninput="myFunction5()" name="cool_input">
                                        <option value="0">-Select litres-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action5" type="text" name="coolantprice" id="coolantprice">
                                              <option value="0">--coolant price--</option>
                                                <?php echo $coolantprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output5" id="output5" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!--coolant finish -->



                        <!-- brake oil  -->

                        <div class="row">
                            <div class="col-md-2">Brake oil</div>
                            
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="nnd6" name="brake_stat">
                                        <option>need to replaced</option>
                                        <option value="no need brake oil">no need</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action6" type="text" name="brakebrand" id="brakebrand">
                                    <option value="0">--Select brakeoil Brand--</option>
                                                <?php echo $brakebrand;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput6" oninput="myFunction6()" name="brake_input">
                                    <option value="0">-Select litres-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control action6" type="text" name="brakeprice" id="brakeprice">
                                              <option value="0">--Brake oil price--</option>
                                                <?php echo $brakeprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output6" id="output6" value="0" onchange="doMath();">
                                </div>
                            </div>
                        </div>

                        <!-- Brake oil finish -->



                        <div class="row">
                            <div class="offset-md-8 col-md-2">
                            <div style="color:green;font-size:20px;"><b>Total Amount (Rs.)</b></div>
                            </div>

                            <div class="col-md-2">
                            <input class="form-control" readonly type="text" name="sum" id="sum" value="0">
                            </div>
                        </div>









                        <div class="form-group pull-right pt-4">
                       
                            <button class="btn btn-primary" type="submit" name="insbt">Send to <?php echo $rowins['cus_name']; ?></button><span style="font-weight: bolder;"> <div class="pt-2 pb-5"><a href="tel:"<?php echo $rowins['cus_mobile']; ?>"><i class="fas fa-phone-volume"></i>0<?php echo $rowins['cus_mobile']; ?></a></div></span>
                            
                        </div>

                    </form>

                <?php } ?>
            </div>
        </div>



       






        <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
        <script src="../vendor/bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>

   

        <script type="text/javascript">
   
                function doMath(){
                    
                    var out = document.getElementById('output').value;
                    var out1 = document.getElementById('output1').value;
                    var out2 = document.getElementById('output2').value;
                    var out3 = document.getElementById('output3').value;
                    var out4 = document.getElementById('output4').value;
                    var out5 = document.getElementById('output5').value;
                    var out6 = document.getElementById('output6').value;
                    var total=parseFloat(out)+parseFloat(out1)+parseFloat(out2)+parseFloat(out3)+parseFloat(out4)+parseFloat(out5)+parseFloat(out6);
                    document.getElementById("sum").value = parseFloat(total);
                }

                function myFunction() {
                var x = document.getElementById("myInput").value;
                var textValue2 = document.getElementById('price').value;
                document.getElementById("output").value = x*textValue2;
                } 

    
                function myFunction1() {
                var inp1 = document.getElementById("myInput1").value;
                var oilp = document.getElementById('oilprice').value;
                document.getElementById("output1").value = inp1*oilp;
                } 

                function myFunction2() {
                var inp2 = document.getElementById("myInput2").value;
                var fuel = document.getElementById('fuelprice').value;
                document.getElementById("output2").value = inp2*fuel;
                } 

                function myFunction3() {
                var inp3 = document.getElementById("myInput3").value;
                var air = document.getElementById('airprice').value;
                document.getElementById("output3").value = inp3*air;
                } 

                function myFunction4() {
                var inp4 = document.getElementById("myInput4").value;
                var ac = document.getElementById('acprice').value;
                document.getElementById("output4").value = inp4*ac;
                } 

                function myFunction5() {
                var inp5 = document.getElementById("myInput5").value;
                var coo = document.getElementById('coolantprice').value;
                document.getElementById("output5").value = inp5*coo;
                } 

                function myFunction6() {
                var inp6 = document.getElementById("myInput6").value;
                var brk = document.getElementById('brakeprice').value;
                document.getElementById("output6").value = inp6*brk;
                } 






                document.getElementById("nnd").onchange = changeListener;
                function changeListener(){
                var value = this.value
                    
                    if (value == "no need engine oil"){
                        $("#myInput")[0].selectedIndex = 0;
                        $("#price").val(0);
                        $("#brand")[0].selectedIndex = 0;
                        $('#output').val(0);
                        document.getElementById('brand').disabled=true;
                        document.getElementById('myInput').disabled=true;
                        document.getElementById('price').disabled=true;
                    }else{
                        document.getElementById('myInput').disabled=false;
                        document.getElementById('brand').disabled=false;
                        document.getElementById('price').disabled=false;
                    }
                    
                }

                

                document.getElementById("nnd1").onchange = changeListener1;
                function changeListener1(){
                var value1 = this.value
                    
                    if (value1 == "no need oil filter"){
                        $("#myInput1")[0].selectedIndex = 0;
                        $("#oilprice").val(0);
                        $("#oilbrand")[0].selectedIndex = 0;
                        $('#output1').val(0);
                        document.getElementById('oilbrand').disabled=true;
                        document.getElementById('myInput1').disabled=true;
                        document.getElementById('oilprice').disabled=true;
                    }else{
                        document.getElementById('oilbrand').disabled=false;
                        document.getElementById('myInput1').disabled=false;
                        document.getElementById('oilprice').disabled=false;
                    }
                    
                }

                document.getElementById("nnd2").onchange = changeListener2;
                function changeListener2(){
                var value2 = this.value
                    
                    if (value2 == "no need fuel filter"){
                        $("#myInput2")[0].selectedIndex = 0;
                        $("#fuelprice").val(0);
                        $("#fuelbrand")[0].selectedIndex = 0;
                        $('#output2').val(0);
                        document.getElementById('fuelbrand').disabled=true;
                        document.getElementById('myInput2').disabled=true;
                        document.getElementById('fuelprice').disabled=true;
                    }else{
                        document.getElementById('fuelbrand').disabled=false;
                        document.getElementById('myInput2').disabled=false;
                        document.getElementById('fuelprice').disabled=false;
                    }
                    
                }

                document.getElementById("nnd3").onchange = changeListener3;
                function changeListener3(){
                var value3 = this.value
                    
                    if (value3 == "no need air filter"){
                        $("#myInput3")[0].selectedIndex = 0;
                        $("#airprice").val(0);
                        $("#airbrand")[0].selectedIndex = 0;
                        $('#output3').val(0);
                        document.getElementById('airbrand').disabled=true;
                        document.getElementById('myInput3').disabled=true;
                        document.getElementById('airprice').disabled=true;
                    }else{
                        document.getElementById('airbrand').disabled=false;
                        document.getElementById('myInput3').disabled=false;
                        document.getElementById('airprice').disabled=false;
                    }
                    
                }


                document.getElementById("nnd4").onchange = changeListener4;
                function changeListener4(){
                var value4 = this.value
                    
                    if (value4 == "no need ac filter"){
                        $("#myInput4")[0].selectedIndex = 0;
                        $("#acprice").val(0);
                        $("#acbrand")[0].selectedIndex = 0;
                        $('#output4').val(0);
                        document.getElementById('acbrand').disabled=true;
                        document.getElementById('myInput4').disabled=true;
                        document.getElementById('acprice').disabled=true;
                    }else{
                        document.getElementById('acbrand').disabled=false;
                        document.getElementById('myInput4').disabled=false;
                        document.getElementById('acprice').disabled=false;
                    }
                    
                }


                document.getElementById("nnd5").onchange = changeListener5;
                function changeListener5(){
                var value5 = this.value
                    
                    if (value5 == "no coolant needed"){
                        $("#myInput5")[0].selectedIndex = 0;
                        $("#coolantprice").val(0);
                        $("#coolantbrand")[0].selectedIndex = 0;
                        $('#output5').val(0);
                        document.getElementById('coolantbrand').disabled=true;
                        document.getElementById('myInput5').disabled=true;
                        document.getElementById('coolantprice').disabled=true;
                    }else{
                        document.getElementById('coolantbrand').disabled=false;
                        document.getElementById('myInput5').disabled=false;
                        document.getElementById('coolantprice').disabled=false;
                    }
                    
                }


                document.getElementById("nnd6").onchange = changeListener6;
                function changeListener6(){
                var value6 = this.value
                    
                    if (value6 == "no need brake oil"){
                        $("#myInput6")[0].selectedIndex = 0;
                        $("#brakeprice").val(0);
                        $("#brakebrand")[0].selectedIndex = 0;
                        $('#output6').val(0);
                        document.getElementById('brakebrand').disabled=true;
                        document.getElementById('myInput6').disabled=true;
                        document.getElementById('brakeprice').disabled=true;
                    }else{
                        document.getElementById('brakebrand').disabled=false;
                        document.getElementById('myInput6').disabled=false;
                        document.getElementById('brakeprice').disabled=false;
                    }
                    
                }


               
        </script>


        <script>
        $(document).ready(function(){
        $('.action').change(function(){
        if($(this).val() != '')
        {
        var action = $(this).attr("id");
        var query = $(this).val();
        var result = '';
        if(action == "brand")
        {
            result = 'price';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action:action, query:query},
            success:function(data){
            $('#'+result).html(data);
            }
        })
        }
        });
        });

        $(document).ready(function(){
        $('.action1').change(function(){
        if($(this).val() != '')
        {
        var action1 = $(this).attr("id");
        var query1 = $(this).val();
        var result1 = '';
        if(action1 == "oilbrand")
        {
            result1 = 'oilprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action1:action1, query1:query1},
            success:function(data){
            $('#'+result1).html(data);
            }
        })
        }
        });
        });


        $(document).ready(function(){
        $('.action2').change(function(){
        if($(this).val() != '')
        {
        var action2 = $(this).attr("id");
        var query2 = $(this).val();
        var result2 = '';
        if(action2 == "fuelbrand")
        {
            result2 = 'fuelprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action2:action2, query2:query2},
            success:function(data){
            $('#'+result2).html(data);
            }
        })
        }
        });
        });


        
        $(document).ready(function(){
        $('.action3').change(function(){
        if($(this).val() != '')
        {
        var action3 = $(this).attr("id");
        var query3= $(this).val();
        var result3 = '';
        if(action3 == "airbrand")
        {
            result3 = 'airprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action3:action3, query3:query3},
            success:function(data){
            $('#'+result3).html(data);
            }
        })
        }
        });
        });



        
        $(document).ready(function(){
        $('.action4').change(function(){
        if($(this).val() != '')
        {
        var action4 = $(this).attr("id");
        var query4= $(this).val();
        var result4 = '';
        if(action4 == "acbrand")
        {
            result4 = 'acprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action4:action4, query4:query4},
            success:function(data){
            $('#'+result4).html(data);
            }
        })
        }
        });
        });




        
        $(document).ready(function(){
        $('.action5').change(function(){
        if($(this).val() != '')
        {
        var action5 = $(this).attr("id");
        var query5= $(this).val();
        var result5 = '';
        if(action5 == "coolantbrand")
        {
            result5 = 'coolantprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action5:action5, query5:query5},
            success:function(data){
            $('#'+result5).html(data);
            }
        })
        }
        });
        });





        $(document).ready(function(){
        $('.action6').change(function(){
        if($(this).val() != '')
        {
        var action6 = $(this).attr("id");
        var query6= $(this).val();
        var result6 = '';
        if(action6 == "brakebrand")
        {
            result6 = 'brakeprice';
        }
        $.ajax({
            url:"fetch3.php",
            method:"POST",
            data:{action6:action6, query6:query6},
            success:function(data){
            $('#'+result6).html(data);
            }
        })
        }
        });
        });



        </script>
        



        <script>
            $(function () {
                $("#brand").bind("click", function () {
                    $("#myInput")[0].selectedIndex = 0;
                    $('#output').val(0);
                });
            });



            $(function () {
                $("#oilbrand").bind("click", function () {
                    $("#myInput1")[0].selectedIndex = 0;
                    $('#output1').val(0);
                });
            });


            $(function () {
                $("#fuelbrand").bind("click", function () {
                    $("#myInput2")[0].selectedIndex = 0;
                    $('#output2').val(0);
                });
            });

            $(function () {
                $("#airbrand").bind("click", function () {
                    $("#myInput3")[0].selectedIndex = 0;
                    $('#output3').val(0);
                });
            });


            $(function () {
                $("#acbrand").bind("click", function () {
                    $("#myInput4")[0].selectedIndex = 0;
                    $('#output4').val(0);
                });
            });

             $(function () {
                $("#coolantbrand").bind("click", function () {
                    $("#myInput5")[0].selectedIndex = 0;
                    $('#output5').val(0);
                });
            });

            $(function () {
                $("#brakebrand").bind("click", function () {
                    $("#myInput6")[0].selectedIndex = 0;
                    $('#output6').val(0);
                });
            });





           
        </script>

</body>

</html>