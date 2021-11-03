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

if(isset($_POST['id'])){
    $id=$_POST['id'];
    $mechcon = $_SESSION['user']['name'];
	$resultsmechcon="SELECT * FROM bill where id='$id' and mechnmame='$mechcon'";
}



if(isset($_POST['send_cas'])){



    $mechnn = $_POST['mechcheckname'];
    $insid = $_POST['idins'];
	$insname = $_POST['cusnameins'];
    $insnic = $_POST['nicins'];
    $insmobile = $_POST['mobileins'];
    $inspkg_name = $_POST['packagenameins'];
    $instimeslot=$_POST['timeslotins'];
    $insdate=$_POST['dateins'];
    $insvehicle_reg_no= $_POST['veh_reg_noins'];

    $eng_status= $_POST['eng_stat'];
    $eng_brand=$_POST['nnd'];
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
    $jjid=$_POST['jobsid'];
    $casstatus="senttocasier";
    // $queryconfirm = "INSERT INTO bill(id,instime,insdate,pckagename,ins_custname,ins_nic,ins_mobile,ins_veh_regno,eng_status,
    // eng_brand,eng_quantity,eng_price,eng_amount,oil_status,oil_brand,oil_quantity,oil_price,oil_amount,fuel_status,fuel_brand,
    // fuel_quan,fuel_price,fuel_amount,air_status,air_brand,air_quan,air_price,air_amount,ac_status,ac_brand,ac_qun,ac_price,
    // ac_amount,cool_status,cool_brand,cool_qun,cool_price,cool_amount,brake_status,brk_brand,brk_quntity,brk_price,brk_amount,total,mechnmame,jobid,status) 
    // VAlUES('$insid','$instimeslot','$insdate','$inspkg_name','$insname','$insnic','$insmobile','$insvehicle_reg_no','$eng_status','$eng_brand',
    // '$eng_quan','$eng_price','$eng_amount','$oil_status','$oil_brand','$oil_quan','$oil_price','$oil_amount','$fuel_status','$fuel_brand',
    // '$fuel_quan','$fuel_price','$fuel_amount','$air_status','$air_brand','$air_quan','$air_price','$air_amount','$ac_status','$ac_brand',
    // '$ac_quan','$ac_price','$ac_amount','$cool_status','$cool_brand','$cool_quan','$cool_price','$cool_amount','$brke_status','$brke_brand','$brke_quan','$brke_price','$brke_amount','$tsum','$mechnn','$jjid','$casstatus')";
    // mysqli_query($db,$queryconfirm);

    $sendcasins="UPDATE bill SET status ='$casstatus' where jobid='$jjid'";
    mysqli_query($db,$sendcasins);
    
    header("location:confirmedinspections.php");
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

<body onmousemove="doMath();" style="font-weight:bolder;">

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
        <div class="row">
            <div class="col-md-12 pt-5">

                             
            <?php $resultconfirmed=mysqli_query($db,$resultsmechcon);?>
                <?php while ($row =mysqli_fetch_array($resultconfirmed)){?>
                <form action="viewconfirmedreport.php" method="post">
                    <h2 class="text-center">Confirmed Inspection Report</h2>
                
    
            
                <input type="hidden" name="mechcheckname" value="<?php echo $row['mechnmame'];?>">
                <h4 class="text-center">Job Id -<?php echo $row['jobid']; ?></h4>
                <h3 class="text-center"><?php echo $row['ins_veh_regno']; ?></h3>
                <h4 class="text-center"><?php echo $row['insdate']; ?></h4>
                <input required type="hidden" readonly name="idins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['id']; ?>">

                    <div class="form-group pt-4">
                        <label for="">job ID</label>
                        <input type="text" class="form-control" readonly name="jobsid" value="<?php echo $row['jobid'];?>">
                       
                    </div>

                    <div class="form-group">
                        <label for="">Time</label>
                        <input required type="text" readonly name="timeslotins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['instime']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Date</label>
                        <input required type="text" readonly name="dateins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['insdate']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="">Package Name</label>
                        <input required type="text" readonly name="packagenameins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['pckagename']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Customer Name</label>
                        <input required type="text" readonly name="cusnameins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['ins_custname']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">NIC</label>
                        <input required type="text" readonly name="nicins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['ins_nic']; ?>">
                    </div>


                    <div class="form-group">
                        <label for="">Mobile</label>
                        <input required type="text" readonly name="mobileins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['ins_mobile']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Vehicle Registration Number</label>
                        <input required type="text" readonly name="veh_reg_noins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['ins_veh_regno']; ?>">
                    </div>








                    <div class="row pt-5">
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
                                <select class="form-control" id="nndd" name="eng_stat" disabled>

                                    <?php echo "<option>" . $row['eng_status'] . "</option>"; ?>
                                    <?php
                                    if ($row['eng_status'] == "no need engine oil") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['eng_status'] == "need to replaced") {
                                        echo "<option>no need engine oil</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionins" type="text" name="nnd" id="brandin" disabled>



                                    <?php
                                    if ($row['eng_brand'] != "0") {
                                        echo "<option>" . $row['eng_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>


                                    <?php echo $brand; ?>


                                </select>
                            </div>
                        </div>




                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput" oninput="myFunction()" name="eng_qun" disabled>
                                    <?php echo "<option>" . $row['eng_quantity'] . "</option>"; ?>
                                    <option value="0">--select quantity--</option>
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
                                <select class="form-control actionins" type="text" name="price" id="priceins" disabled>
                                    <?php echo "<option>" . $row['eng_price'] . "</option>"; ?>
                                    <option value="0">--Engine oil price--</option>
                                    <?php echo $price; ?>
                                </select>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input required type="text" readonly name="output" id="output" class="form-control" value="<?php echo $row['eng_amount']; ?>" onmousemove="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- engine oil finish -->



                    <!-- oil filter  -->

                    <div class="row">
                        <div class="col-md-2">Oil filter</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd1" name="oil_stat" disabled>
                                    <?php echo "<option>" . $row['oil_status'] . "</option>"; ?>

                                    <?php
                                    if ($row['oil_status'] == "no need oil filter") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['oil_status'] == "need to replaced") {
                                        echo "<option>no need oil filter</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionoil" type="text" name="oilbrand" id="oilbrandin" disabled>




                                    <?php
                                    if ($row['oil_brand'] != "0") {
                                        echo "<option>" . $row['oil_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $oilbrand; ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput1" oninput="myFunction1()" name="oil_input" disabled>
                                    <?php echo "<option>" . $row['oil_quantity'] . "</option>"; ?>
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
                                <select class="form-control actionoil" type="text" name="oilprice" id="oilpricein" disabled>
                                    <?php echo "<option>" . $row['oil_price'] . "</option>"; ?>
                                    <option value="0">--Oil Filter price--</option>
                                    <?php echo $oilprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output1" id="output1" value="<?php echo $row['oil_amount']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- oil filter finish -->


                    <!-- fuel filter  -->

                    <div class="row">
                        <div class="col-md-2">Fuel filter</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd2" name="fuel_stat" disabled>
                                    <?php echo "<option>" . $row['fuel_status'] . "</option>"; ?>

                                    <?php
                                    if ($row['fuel_status'] == "no need fuel filter") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['fuel_status'] == "need to replaced") {
                                        echo "<option>no need fuel filter</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionfuel" type="text" name="fuelbrand" id="fuelbrandin" disabled>



                                    <?php
                                    if ($row['fuel_brand'] != "0") {
                                        echo "<option>" . $row['fuel_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $fuelbrand; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput2" oninput="myFunction2()" name="fuel_input" disabled>
                                    <?php echo "<option>" . $row['fuel_quan'] . "</option>"; ?>
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
                                <select class="form-control actionfuel" type="text" name="fuelprice" id="fuelpricein" disabled>
                                    <?php echo "<option>" . $row['fuel_price'] . "</option>"; ?>
                                    <option value="0">--fuel Filter price--</option>
                                    <?php echo $fuelprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output2" id="output2" value="<?php echo $row['fuel_amount']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- fuel filter finish -->



                    <!-- air filter  -->

                    <div class="row">
                        <div class="col-md-2">Air filter</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd3" name="air_stat" disabled>
                                    <?php echo "<option>" . $row['air_status'] . "</option>"; ?>
                                    <?php
                                    if ($row['air_status'] == "no need air filter") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['air_status'] == "need to replaced") {
                                        echo "<option>no need air filter </option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionair" type="text" name="airbrand" id="airbrandin" disabled>



                                    <?php
                                    if ($row['air_brand'] != "0") {
                                        echo "<option>" . $row['air_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $airbrand; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput3" oninput="myFunction3()" name="air_input" disabled>
                                    <?php echo "<option>" . $row['air_quan'] . "</option>"; ?>
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
                                <select class="form-control actionair" type="text" name="airprice" id="airpricein" disabled>
                                    <?php echo "<option>" . $row['air_price'] . "</option>"; ?>
                                    <option value="0">--air Filter price--</option>
                                    <?php echo $airprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output3" id="output3" value="<?php echo $row['air_amount']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- air filter finish -->



                    <!-- AC filter  -->

                    <div class="row">
                        <div class="col-md-2">AC filter</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd4" name="ac_stat" disabled>
                                    <?php echo "<option>" . $row['ac_status'] . "</option>"; ?>
                                    <?php
                                    if ($row['ac_status'] == "no need ac filter") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['ac_status'] == "need to replaced") {
                                        echo "<option>no need ac filter</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionac" type="text" name="acbrand" id="acbrandin" disabled>



                                    <?php
                                    if ($row['ac_brand'] != "0") {
                                        echo "<option>" . $row['ac_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $acbrand; ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput4" oninput="myFunction4();" name="ac_input" disabled>
                                    <?php echo "<option>" . $row['ac_qun'] . "</option>"; ?>
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
                                <select class="form-control actionac" type="text" name="acprice" id="acpricein" disabled>
                                    <?php echo "<option>" . $row['ac_price'] . "</option>"; ?>
                                    <option value="0">--AC Filter price--</option>
                                    <?php echo $acprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output4" id="output4" value="<?php echo $row['ac_price']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- AC filter finish -->


                    <!-- coolant  -->

                    <div class="row">
                        <div class="col-md-2">Coolant</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd5" name="cool_stat" disabled>
                                    <?php echo "<option>" . $row['cool_status'] . "</option>"; ?>
                                    <?php
                                    if ($row['cool_status'] == "no coolant needed") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['cool_status'] == "need to replaced") {
                                        echo "<option>no coolant needed</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>


                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actioncool" type="text" name="coolantbrand" id="coolantbrandin" disabled>


                                    <?php
                                    if ($row['cool_brand'] != "0") {
                                        echo "<option>" . $row['cool_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $coolantbrand; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput5" oninput="myFunction5()" name="cool_input" disabled>
                                    <?php echo "<option>" . $row['cool_qun'] . "</option>"; ?>
                                    <option value="0">-Select letres-</option>
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
                                <select class="form-control actioncool" type="text" name="coolantprice" id="coolantpricein" disabled>
                                    <?php echo "<option>" . $row['cool_price'] . "</option>"; ?>
                                    <option value="0">--coolant price--</option>
                                    <?php echo $coolantprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output5" id="output5" value="<?php echo $row['cool_amount']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!--coolant finish -->



                    <!-- brake oil  -->

                    <div class="row">
                        <div class="col-md-2">Brake oil</div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="nnd6" name="brake_stat" disabled>
                                    <?php echo "<option>" . $row['brake_status'] . "</option>"; ?>
                                    <?php
                                    if ($row['brake_status'] == "no need brake oil") {
                                        echo "<option> need to replace</option>";
                                    }
                                    if ($row['brake_status'] == "need to replaced") {
                                        echo "<option>no need brake oil</option>";
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control actionbrk" type="text" name="brakebrand" id="brakebrandin" disabled>



                                    <?php
                                    if ($row['brk_brand'] != "0") {
                                        echo "<option>" . $row['brk_brand'] . "</option>";
                                    } else {
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                    <?php echo $brakebrand; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select class="form-control" id="myInput6" oninput="myFunction6()" name="brake_input" disabled>
                                    <?php echo "<option>" . $row['brk_quntity'] . "</option>"; ?>
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
                                <select class="form-control actionbrk" type="text" name="brakeprice" id="brakepricein" disabled>
                                    <?php echo "<option>" . $row['brk_price'] . "</option>"; ?>
                                    <option value="0">--Brake oil price--</option>
                                    <?php echo $brakeprice; ?>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input class="form-control" readonly type="text" name="output6" id="output6" value="<?php echo $row['brk_amount']; ?>" onchange="doMath();">
                            </div>
                        </div>
                    </div>

                    <!-- Brake oil finish -->





                    <div class="row">
                        <div class="offset-md-8 col-md-2">
                            <div style="color:green;font-size:20px;"><b>Total Amount (Rs.)</b></div>
                        </div>

                        <div class="col-md-2">
                            <input class="form-control" readonly type="text" name="sum" id="sum" value="<?php echo $row['total']; ?>">
                        </div>
                    </div>

    

                                    <div class="row">
                                        <div class="offset-md-10 col-md-2">
                                            <?php
                                            if($row['total']!='needtocheck'){
                                                echo '<button type="submit" name="send_cas" class="btn btn-primary my-4 mb-5">Send to Cachier</button>';
                                            }else{
                                              
                                                echo '<button type="submit" name="send_cas" class="btn btn-primary my-4 mb-5" disabled>Pending Confirmation</button>';
                                            }
                                            ?>
                             
                                    </div>
                                    </div>
                    

                </form>


                <?php } ?> 














            </div>
        </div>










        <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
        <script src="../vendor/bootstrap/js/popper.min.js"></script>
        <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>





</body>

</html>