<?php
include('../functions.php');
if (!isCashier()) {
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
	$querybillcreate="SELECT * FROM bill where id=".$id;
}

if(isset($_POST['netsub'])){
    $subtotal=$_POST['subtotal'];
    $nettotal=$_POST['nettotal'];
    $jobid=$_POST['jobiid'];
$finished="finished";
    $finalbillq="UPDATE bill SET sub_total='$subtotal',net_total='$nettotal',status='$finished' where jobid='$jobid'";
mysqli_query($db,$finalbillq);
  
header('location:cashierdashboard.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Title Page-->
    <title>Cashier Dashboard</title>

    <!-- Fontfaces CSS-->


    <link href="../vendor/fontawsome/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="all">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <!-- Main CSS-->
    <link href="../css/dashboard.css" rel="stylesheet" media="all">

</head>

<body onmousemove="calbill();" style="font-weight: bolder">
    
        <!-- HEADER DESKTOP-->
        <header class="header-desktop4">
            <div class="container">
                <div class="header4-wrap">
                    <div class="header__logo">
                        <a href="">
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
                                            <a href="cashierdashboard.php">
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
       

            <section>
                <div class="container">
                    <div class="row">
                        
                        <div class="col-md-12 py-5">
                            

                                        
              <?php $resultbill=mysqli_query($db,$querybillcreate);?>
                <?php while ($row =mysqli_fetch_array($resultbill)){?>
                            <form action="createfinalbill.php" method="post">

                                <input type="hidden" name="jobiid" value="<?php echo $row['jobid']; ?>">
                                <h2 class="text-center">Final Service Bill</h2>
                            <h3 class="text-center"><?php echo $row['insdate']; ?></h3>
                            <h2 class="text-center"><?php echo $row['ins_veh_regno']; ?></h2>
                            <h5 class="text-center">Checked by -<?php echo $row['mechnmame']; ?></h5>
                            <h6 class="text-center">job id - <?php echo $row['jobid']; ?></h6>
                            <input required type="hidden" readonly name="idins" id="'.$row['id'].'" class="form-control" value="<?php echo $row['id']; ?>">

                                <div class="form-group">
                                    <label for="">Job ID</label>
                                    <input type="text" readonly class="form-control" name="jobiid" value="<?php echo $row['jobid']; ?>">
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
                                    <select class="form-control actionins" type="text" name="nnd" id="brandin" disabled>
                                    
                    

                                    <?php 
                                    if($row['eng_brand']!="0"){
                                        echo "<option>" . $row['eng_brand'] . "</option>"; 
                                        
                                    }else{
                                        echo "<option>--Select Brand--</option>";
                                    }
                                    ?>
                                    
                                
                                    <?php echo $brand;?> 
                                      
                                               
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
                                <select class="form-control" id="nnd1" name="oil_stat" disabled>
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
                                    <select class="form-control actionoil" type="text" name="oilbrand" id="oilbrandin" disabled>
                                 


                                    
                                    <?php 
                                    if($row['oil_brand']!="0"){
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
                                <select class="form-control" id="nnd2" name="fuel_stat" disabled>
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
                                <select class="form-control actionfuel" type="text" name="fuelbrand" id="fuelbrandin" disabled>
                        


                                    <?php 
                                    if($row['fuel_brand']!="0"){
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
                                <select class="form-control" id="nnd3" name="air_stat" disabled>
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
                                <select class="form-control actionair" type="text" name="airbrand" id="airbrandin" disabled>
                                
                                
                                    
                                    <?php 
                                    if($row['air_brand']!="0"){
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
                                <select class="form-control" id="nnd4" name="ac_stat" disabled>
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
                                <select class="form-control actionac" type="text" name="acbrand" id="acbrandin" disabled>
                                
                                
                                    
                                    <?php 
                                    if($row['ac_brand']!="0"){
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
                                <select class="form-control" id="nnd5" name="cool_stat" disabled>
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
                                <select class="form-control actioncool" type="text" name="coolantbrand" id="coolantbrandin" disabled>
                               
                                
                                    <?php 
                                    if($row['cool_brand']!="0"){
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
                                    <select class="form-control" id="nnd6" name="brake_stat" disabled>
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
                                <select class="form-control actionbrk" type="text" name="brakebrand" id="brakebrandin" disabled>
                               


                                <?php 
                                    if($row['brk_brand']!="0"){
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



<!-- 
                        <div class="form-group pull-right pt-4">
                            <button class="btn btn-primary" type="submit" name="updateandcheck">Check and Confirm</button>
                        </div> -->



                        
                        <div class="row pt-5">
                            <div class="offset-md-6 col-md-2">
                                Material Sub Total (Rs.)
                            </div>
                            <div class="col-md-4 pt-2">
                                <input class="form-control" type="text" name="" value="<?php echo $row['total']; ?>" id="mst"> 
                            </div>
                        </div>
                        <div class="row pt-2">
                            <div class="offset-md-6 col-md-2">
                                Service Sub Total (Rs.)
                            </div>
                            <div class="col-md-4">
                                <?php
                                $nettotal="";
                                $pkg=""; 
                                $pkg=$row["pckagename"];
                                    $pkgquery = "SELECT * FROM our_packages where package_name='$pkg'";
                                    $resultpkg = mysqli_query($db,$pkgquery);
                                    while($rowpkg = mysqli_fetch_array($resultpkg))

                                    {?>
                                     
                                      <input class="form-control" type="text" name="subtotal" value="<?php echo $rowpkg["pck_price"];?>" id="sst">
                                      <?php  $nettotal=$rowpkg["pck_price"] + $row['total']; ?>
                                    <?php } ?>
                                   
                                


                               
                            </div>
                        </div>

                        <div class="row pt-2">
                            <div class="offset-md-6 col-md-2">
                                Net Total (Rs.)
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="nettotal" value="<?php echo $nettotal ?>">
                            </div>

                        </div>




                        <div class="row pt-3">
                            <div class="offset-md-8 col-md-2">
                            <button type="button" class="btn btn-secondary btn-block" onclick="myprint()">Print</button>
                            </div>

                            <div class="col-md-2">
                                <?php
                                $ccus=$row["ins_custname"];
                                $cc="";
                                $cc="finished";
                                if($row['status']!="$cc"){
                                    echo '<button class="btn btn-primary" type="submit" name="netsub">SEND to' .$ccus.'</button>';
                                }else{
                                  
                                   echo  '<button class="btn btn-danger" type="submit" name="" disabled>SENT to ' .$ccus.'</button>';
                                }
                                ?>
                           
                            
                            </div>
                        </div>

                            </form>










                            

                                <?php } ?> 











                       













                        </div>
                    </div>
                </div>
            </section>
        
        <!-- END PAGE CONTENT  -->

    














    <script type="text/javascript" src="../vendor/jquery/jquery-3.4.1.min.js"></script>
    <script src="../vendor/bootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script type="text/javascript">
                
        function myprint() {
        window.print();
        }
        </script>
        
  

</body>

</html>