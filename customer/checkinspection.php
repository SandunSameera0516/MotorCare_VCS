<?php
include('../functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}


if(isset($_POST['id'])){
	$id=$_POST['id'];
	$queryinch="SELECT * FROM inspection where id=".$id;
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






if(isset($_POST['updateandcheck'])){
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
    $ch="checked";
    
    $queryconfirm = "INSERT INTO bill(id,instime,insdate,pckagename,ins_custname,ins_nic,ins_mobile,ins_veh_regno,eng_status,
    eng_brand,eng_quantity,eng_price,eng_amount,oil_status,oil_brand,oil_quantity,oil_price,oil_amount,fuel_status,fuel_brand,
    fuel_quan,fuel_price,fuel_amount,air_status,air_brand,air_quan,air_price,air_amount,ac_status,ac_brand,ac_qun,ac_price,
    ac_amount,cool_status,cool_brand,cool_qun,cool_price,cool_amount,brake_status,brk_brand,brk_quntity,brk_price,brk_amount,total,mechnmame,jobid,status) 
    VAlUES('$insid','$instimeslot','$insdate','$inspkg_name','$insname','$insnic','$insmobile','$insvehicle_reg_no','$eng_status','$eng_brand',
    '$eng_quan','$eng_price','$eng_amount','$oil_status','$oil_brand','$oil_quan','$oil_price','$oil_amount','$fuel_status','$fuel_brand',
    '$fuel_quan','$fuel_price','$fuel_amount','$air_status','$air_brand','$air_quan','$air_price','$air_amount','$ac_status','$ac_brand',
    '$ac_quan','$ac_price','$ac_amount','$cool_status','$cool_brand','$cool_quan','$cool_price','$cool_amount','$brke_status','$brke_brand','$brke_quan','$brke_price','$brke_amount','$tsum','$mechnn','$jjid','$ch')";
    mysqli_query($db,$queryconfirm);

    $qcuscheck="UPDATE inspection SET status='checked' where jobins_id='$jjid'";
    mysqli_query($db,$qcuscheck);

// $queryconfirm="UPDATE inspection SET mobile='$umobile',id='$insid',instime='$instimeslot',insdate='$insdate',pckagename='$inspkg_name',ins_custname='$insname',ins_nic='$insnic',ins_mobile='$insmobile',ins_veh_regno='$insvehicle_reg_no',eng_status='$eng_status',
//      eng_brand='$eng_brand',eng_quantity='$eng_quan',eng_price='$eng_price',eng_amount='$eng_amount',oil_status='$oil_status',oil_brand='$oil_brand',oil_quantity='$oil_quan',oil_price='$oil_price',oil_amount='$oil_amount',fuel_status'=$fuel_status',fuel_brand='$fuel_brand',
//      fuel_quan='$fuel_quan',fuel_price='$fuel_price',fuel_amount='$fuel_amount',air_status='$air_status',air_brand='$air_brand',air_quan='$air_quan',air_price='$air_price',air_amount='$air_amount',ac_status='$ac_status',ac_brand='$ac_brand',ac_qun='$ac_quan',ac_price='$ac_price',
//      ac_amount='$ac_amount',cool_status='$cool_status',cool_brand='$cool_brand',cool_qun='$cool_quan',cool_price='$cool_price',cool_amount='$cool_amount',brake_status='$brke_status',brk_brand='$brke_brand',brk_quntity='$brke_quan',brk_price='$brke_price',brk_amount='$brke_amount',total='$tsum' where jobid='$jjid'";
//    mysqli_query($db,$queryconfirm); 

//  $deletequeryconfirm ="DELETE FROM inspection WHERE id='$insid'";
//  mysqli_query($db,$deletequeryconfirm);

    header('location:customerinspectio.php');
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

<body onmousemove="doMath();">
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



            <section>
                <div class="container">
                <div class="container pt-5">

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="customerdash.php"><b>Customer Dashboard</b></a></li>
<li class="breadcrumb-item active" aria-current="page"><b>Check Inspection Report</b></li>
</ol>
</nav>
                    <div class="row">
                        <div class="col-md-12 pt-5">



              <?php $resultins=mysqli_query($db,$queryinch);?>
                <?php while ($row =mysqli_fetch_array($resultins)){?>
                            <form action="" method="post">

                                <h5 class="text-center">Job ID - <?php echo $row['jobins_id']; ?></h5>
                                <h5 class="text-center">Mechanic Name-<?php echo $row['mech_name']; ?></h5>

                                <input type="hidden" name="mechcheckname" value="<?php echo $row['mech_name']; ?>">
                       
                                <input required type="hidden" readonly name="idins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['id']; ?>">

                                <div class="form-group">
                                    <label for="">Job ID</label>
                                    <input class="form-control" type="text" name="jobsid" readonly value="<?php echo $row['jobins_id']; ?>">
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
                                <select class="form-control" id="nndd" name="eng_stat">
                                
                                <?php echo "<option>" . $row['eng_status'] . "</option>"; ?> 

                                
                                <?php
                                if($row['eng_status']=="no need engine oil"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['eng_status']=="need to replaced"){
                                    echo "<option>no need engine oil</option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control actionins" type="text" name="nnd" id="brandin">
                                    
                    

                                    <?php 
                                    if($row['eng_brand']!=""){
                                        echo "<option>" . $row['eng_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option value='0'>--Select Brand--</option>";
                                    }
                                    ?>
                                    
                                
                                    <?php echo $brand;?> 
                                      
                                               
                                    </select>
                                </div>
                            </div>

                            


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput" oninput="myFunction()" name="eng_qun">
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
                                <select class="form-control actionins" type="text" name="price" id="priceins">
                                <?php echo "<option>" . $row['eng_price'] . "</option>"; ?>
                                              <option value="0">--Engine oil price--</option>
                                                <?php echo $price;?>
                                               </select>
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2" >
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
                                <select class="form-control" id="nnd1" name="oil_stat">
                                <?php echo "<option>" . $row['oil_status'] . "</option>"; ?> 
                                 
                                <?php
                                if($row['oil_status']=="no need oil filter"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['oil_status']=="need to replaced"){
                                    echo "<option>no need oil filter</option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control actionoil" type="text" name="oilbrand" id="oilbrandin">
                                 


                                    
                                    <?php 
                                    if($row['oil_brand']!=""){
                                        echo "<option>" . $row['oil_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>

                                                <?php echo $oilbrand;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput1" oninput="myFunction1()" name="oil_input">
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
                                <select class="form-control actionoil" type="text" name="oilprice" id="oilpricein">
                                <?php echo "<option>" . $row['oil_price'] . "</option>"; ?>              
                                <option value="0">--Oil Filter price--</option>
                                                <?php echo $oilprice;?>
                                               
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
                                <select class="form-control" id="nnd2" name="fuel_stat">
                                <?php echo "<option>" . $row['fuel_status'] . "</option>"; ?>
                                        
                                <?php
                                if($row['fuel_status']=="no need fuel filter"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['fuel_status']=="need to replaced"){
                                    echo "<option>no need fuel filter</option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control actionfuel" type="text" name="fuelbrand" id="fuelbrandin">
                        


                                    <?php 
                                    if($row['fuel_brand']!=""){
                                        echo "<option>" . $row['fuel_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>
                               
                                                <?php echo $fuelbrand;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput2" oninput="myFunction2()" name="fuel_input">
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
                                     <select class="form-control actionfuel" type="text" name="fuelprice" id="fuelpricein">
                                     <?php echo "<option>" . $row['fuel_price'] . "</option>"; ?>          
                                     <option value="0">--fuel Filter price--</option>
                                                <?php echo $fuelprice;?>
                                               
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
                                <select class="form-control" id="nnd3" name="air_stat">
                                <?php echo "<option>" . $row['air_status'] . "</option>"; ?>
                                <?php
                                if($row['air_status']=="no need air filter"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['air_status']=="need to replaced"){
                                    echo "<option>no need air filter </option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control actionair" type="text" name="airbrand" id="airbrandin">
                                
                                
                                    
                                    <?php 
                                    if($row['air_brand']!=""){
                                        echo "<option>" . $row['air_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>
                                
                                                <?php echo $airbrand;?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput3" oninput="myFunction3()" name="air_input">
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
                                     <select class="form-control actionair" type="text" name="airprice" id="airpricein">
                                     <?php echo "<option>" . $row['air_price'] . "</option>"; ?>         
                                     <option value="0">--air Filter price--</option>
                                                <?php echo $airprice;?>
                                               
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
                                <select class="form-control" id="nnd4" name="ac_stat">
                                <?php echo "<option>" . $row['ac_status'] . "</option>"; ?>        
                                <?php
                                if($row['ac_status']=="no need ac filter"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['ac_status']=="need to replaced"){
                                    echo "<option>no need ac filter</option>";
                                }
                                ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control actionac" type="text" name="acbrand" id="acbrandin">
                                
                                
                                    
                                    <?php 
                                    if($row['ac_brand']!=""){
                                        echo "<option>" . $row['ac_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>
                                    
                                                <?php echo $acbrand;?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput4" oninput="myFunction4();" name="ac_input">
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
                                    <select class="form-control actionac" type="text" name="acprice" id="acpricein">
                                    <?php echo "<option>" . $row['ac_price'] . "</option>"; ?>          
                                    <option value="0">--AC Filter price--</option>
                                                <?php echo $acprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output4" id="output4" value="<?php echo $row['ac_price'];?>" onchange="doMath();">
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
                                <?php echo "<option>" . $row['cool_status'] . "</option>"; ?>           
                                <?php
                                if($row['cool_status']=="no coolant needed"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['cool_status']=="need to replaced"){
                                    echo "<option>no coolant needed</option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control actioncool" type="text" name="coolantbrand" id="coolantbrandin">
                               
                                
                                    <?php 
                                    if($row['cool_brand']!=""){
                                        echo "<option>" . $row['cool_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>
                               
                                                <?php echo $coolantbrand;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput5" oninput="myFunction5()" name="cool_input">
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
                                <select class="form-control actioncool" type="text" name="coolantprice" id="coolantpricein">
                                <?php echo "<option>" . $row['cool_price'] . "</option>"; ?>              
                                <option value="0">--coolant price--</option>
                                                <?php echo $coolantprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output5" id="output5" value="<?php echo $row['cool_amount'];?>" onchange="doMath();">
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
                                    <?php echo "<option>" . $row['brake_status'] . "</option>"; ?>    
                                    <?php
                                if($row['brake_status']=="no need brake oil"){
                                    echo "<option> need to replace</option>";
                                }
                                if($row['brake_status']=="need to replaced"){
                                    echo "<option>no need brake oil</option>";
                                }
                                ?>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                <select class="form-control actionbrk" type="text" name="brakebrand" id="brakebrandin">
                               


                                <?php 
                                    if($row['brk_brand']!=""){
                                        echo "<option>" . $row['brk_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?> 

                                                <?php echo $brakebrand;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control" id="myInput6" oninput="myFunction6()" name="brake_input">
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
                                <select class="form-control actionbrk" type="text" name="brakeprice" id="brakepricein">
                                <?php echo "<option>" . $row['brk_price'] . "</option>"; ?>          
                                <option value="0">--Brake oil price--</option>
                                                <?php echo $brakeprice;?>
                                               
                                     </select>

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                <input class="form-control" readonly type="text" name="output6" id="output6" value="<?php echo $row['brk_amount'];?>" onchange="doMath();">
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




                        <div class="form-group pull-right pt-4 pb-5">
                            <button class="btn btn-primary" type="submit" name="updateandcheck">Checked and Confirm</button>
                        </div>




                            </form>









                                <?php } ?> 



                        </div>

                    </div>
                </div>
            </section>
    
        <!-- END PAGE CONTENT  -->

    </div>

  






    <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>


    <script type="text/javascript">

                document.getElementById("nndd").onchange = changeListener;
                function changeListener(){
                var value = this.value
                    
                    if (value == "no need engine oil"){
                        $("#myInput").val(0);
                        $("#priceins").val(0);
                        $("#brandin")[0].selectedIndex = 0;
                        $('#output').val(0);
                        document.getElementById('myInput').disabled=true;
                        document.getElementById('priceins').disabled=true;
                        document.getElementById('brandin').disabled=true;
                    }else{
                        document.getElementById('myInput').disabled=false;
                        document.getElementById('priceins').disabled=false;
                        document.getElementById('brandin').disabled=false;
                    }
                    
                }


                document.getElementById("nnd1").onchange = changeListener1;
                function changeListener1(){
                var value1 = this.value
                    
                    if (value1 == "no need oil filter"){
                        $("#myInput1").val(0);
                        $("#oilpricein").val(0);
                        $("#oilbrandin")[0].selectedIndex = 0;
                        $('#output1').val(0);
                        document.getElementById('myInput1').disabled=true;
                        document.getElementById('oilpricein').disabled=true;
                        document.getElementById('oilbrandin').disabled=true;
                    }else{
                        document.getElementById('myInput1').disabled=false;
                        document.getElementById('oilpricein').disabled=false;
                        document.getElementById('oilbrandin').disabled=false; 
                    }
                    
                }

                document.getElementById("nnd2").onchange = changeListener2;
                function changeListener2(){
                var value2 = this.value
                    
                    if (value2 == "no need fuel filter"){
                        $("#myInput2").val(0);
                        $("#fuelpricein").val(0);
                        $("#fuelbrandin")[0].selectedIndex = 0;
                        $('#output2').val(0);
                        document.getElementById('myInput2').disabled=true;
                        document.getElementById('fuelpricein').disabled=true;
                        document.getElementById('fuelbrandin').disabled=true;
                    }else{
                        document.getElementById('myInput2').disabled=false;
                        document.getElementById('fuelpricein').disabled=false;
                        document.getElementById('fuelbrandin').disabled=false;
                    }

                    
                }

                document.getElementById("nnd3").onchange = changeListener3;
                function changeListener3(){
                var value3 = this.value
                    
                    if (value3 == "no need air filter"){
                        $("#myInput3").val(0);
                        $("#airpricein").val(0);
                        $("#airbrandin")[0].selectedIndex = 0;
                        $('#output3').val(0);
                        document.getElementById('myInput3').disabled=true;
                        document.getElementById('airpricein').disabled=true;
                        document.getElementById('airbrandin').disabled=true;
                    }else{
                        document.getElementById('myInput3').disabled=false;
                        document.getElementById('airpricein').disabled=false;
                        document.getElementById('airbrandin').disabled=false;
                    }
                    
                }


                document.getElementById("nnd4").onchange = changeListener4;
                function changeListener4(){
                var value4 = this.value
                    
                    if (value4 == "no need ac filter"){
                        $("#myInput4").val(0);
                        $("#acpricein").val(0);
                        $("#acbrandin")[0].selectedIndex = 0;
                        $('#output4').val(0);
                        document.getElementById('myInput4').disabled=true;
                        document.getElementById('acpricein').disabled=true;
                        document.getElementById('acbrandin').disabled=true;
                    }else{
                        document.getElementById('myInput4').disabled=false;
                        document.getElementById('acpricein').disabled=false;
                        document.getElementById('acbrandin').disabled=false;
                    }
                    
                }


                document.getElementById("nnd5").onchange = changeListener5;
                function changeListener5(){
                var value5 = this.value
                    
                    if (value5 == "no coolant needed"){
                        $("#myInput5").val(0);
                        $("#coolantpricein").val(0);
                        $("#coolantbrandin")[0].selectedIndex = 0;
                        $('#output5').val(0);
                        document.getElementById('myInput5').disabled=true;
                        document.getElementById('coolantpricein').disabled=true;
                        document.getElementById('coolantbrandin').disabled=true;
                    }else{
                        document.getElementById('myInput5').disabled=false;
                        document.getElementById('coolantpricein').disabled=false;
                        document.getElementById('coolantbrandin').disabled=false;
                    }
                    
                }


                document.getElementById("nnd6").onchange = changeListener6;
                function changeListener6(){
                var value6 = this.value
                    
                    if (value6 == "no need brake oil"){
                        $("#myInput6").val(0);
                        $("#brakepricein").val(0);
                        $("#brakebrandin")[0].selectedIndex = 0;
                        $('#output6').val(0);
                        document.getElementById('myInput6').disabled=true;
                        document.getElementById('brakepricein').disabled=true;
                        document.getElementById('brakebrandin').disabled=true;
                    }else{
                        document.getElementById('myInput6').disabled=false;
                        document.getElementById('brakepricein').disabled=false;
                        document.getElementById('brakebrandin').disabled=false;
                    }
                    
                }



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
                var textValue2 = document.getElementById('priceins').value;
                document.getElementById("output").value = x*textValue2;
                } 

                function myFunction1() {
                var inp1 = document.getElementById("myInput1").value;
                var oilp = document.getElementById('oilpricein').value;
                document.getElementById("output1").value = inp1*oilp;
                } 

                function myFunction2() {
                var inp2 = document.getElementById("myInput2").value;
                var fuel = document.getElementById('fuelpricein').value;
                document.getElementById("output2").value = inp2*fuel;
                } 

                function myFunction3() {
                var inp3 = document.getElementById("myInput3").value;
                var air = document.getElementById('airpricein').value;
                document.getElementById("output3").value = inp3*air;
                } 

                function myFunction4() {
                var inp4 = document.getElementById("myInput4").value;
                var ac = document.getElementById('acpricein').value;
                document.getElementById("output4").value = inp4*ac;
                } 

                function myFunction5() {
                var inp5 = document.getElementById("myInput5").value;
                var coo = document.getElementById('coolantpricein').value;
                document.getElementById("output5").value = inp5*coo;
                } 

                function myFunction6() {
                var inp6 = document.getElementById("myInput6").value;
                var brk = document.getElementById('brakepricein').value;
                document.getElementById("output6").value = inp6*brk;
                } 

    </script>











   <script type="text/javascript">
        $(document).ready(function(){
        $('.actionins').change(function(){
        if($(this).val() != '')
        {
        var actionins = $(this).attr("id");
        var queryin = $(this).val();
        var resultin = '';
        if(actionins == "brandin")
        {
            resultin = 'priceins';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionins:actionins,queryin:queryin},
            success:function(data){
            $('#'+resultin).html(data);
            }
        })
        }
        });
        });


        $(document).ready(function(){
        $('.actionoil').change(function(){
        if($(this).val() != '')
        {
        var actionoil = $(this).attr("id");
        var queryoil = $(this).val();
        var resultoil = '';
        if(actionoil == "oilbrandin")
        {
            resultoil = 'oilpricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionoil:actionoil,queryoil:queryoil},
            success:function(data){
            $('#'+resultoil).html(data);
            }
        })
        }
        });
        });

        $(document).ready(function(){
        $('.actionfuel').change(function(){
        if($(this).val() != '')
        {
        var actionfuel = $(this).attr("id");
        var queryfuel = $(this).val();
        var resultfuel = '';
        if(actionfuel == "fuelbrandin")
        {
            resultfuel = 'fuelpricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionfuel:actionfuel,queryfuel:queryfuel},
            success:function(data){
            $('#'+resultfuel).html(data);
            }
        })
        }
        });
        });



        $(document).ready(function(){
        $('.actionair').change(function(){
        if($(this).val() != '')
        {
        var actionair = $(this).attr("id");
        var queryair = $(this).val();
        var resultair = '';
        if(actionair == "airbrandin")
        {
            resultair = 'airpricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionair:actionair,queryair:queryair},
            success:function(data){
            $('#'+resultair).html(data);
            }
        })
        }
        });
        });


        $(document).ready(function(){
        $('.actionac').change(function(){
        if($(this).val() != '')
        {
        var actionac = $(this).attr("id");
        var queryac = $(this).val();
        var resultac = '';
        if(actionac == "acbrandin")
        {
            resultac = 'acpricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionac:actionac,queryac:queryac},
            success:function(data){
            $('#'+resultac).html(data);
            }
        })
        }
        });
        });


        $(document).ready(function(){
        $('.actioncool').change(function(){
        if($(this).val() != '')
        {
        var actioncool = $(this).attr("id");
        var querycool = $(this).val();
        var resultcool = '';
        if(actioncool == "coolantbrandin")
        {
            resultcool = 'coolantpricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actioncool:actioncool,querycool:querycool},
            success:function(data){
            $('#'+resultcool).html(data);
            }
        })
        }
        });
        });



        $(document).ready(function(){
        $('.actionbrk').change(function(){
        if($(this).val() != '')
        {
        var actionbrk = $(this).attr("id");
        var querybrk = $(this).val();
        var resultbrk = '';
        if(actionbrk == "brakebrandin")
        {
            resultbrk = 'brakepricein';
        }
        $.ajax({
            url:"fetch4.php",
            method:"POST",
            data:{actionbrk:actionbrk,querybrk:querybrk},
            success:function(data){
            $('#'+resultbrk).html(data);
            }
        })
        }
        });
        });
   </script>

</body>

</html>