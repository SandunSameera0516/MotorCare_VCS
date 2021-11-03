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



$sqlengoil = "SELECT * FROM engine_oil";
$sqlacfil = "SELECT * FROM ac_filter";
$sqlairfil = "SELECT * FROM air_filter";
$sqlbrkeoil = "SELECT * FROM brake_oil";
$sqlcool = "SELECT * FROM coolant";
$sqloil = "SELECT * FROM oil_filter";
$sqlfuel = "SELECT * FROM fuel_filter";



if (isset($_GET["del"])) {
    $id = $_GET["del"];
    $sqlmbo = mysqli_query($db, "DELETE FROM engine_oil WHERE enoil_id=$id");

    header('location: manageitems.php');
}

if (isset($_GET["delac"])) {
    $idac = $_GET["delac"];
    $sqlac = mysqli_query($db, "DELETE FROM ac_filter WHERE acf_id=$idac");

    header('location: manageitems.php');
}



if (isset($_GET["delair"])) {
    $idair = $_GET["delair"];
    $sqlair = mysqli_query($db, "DELETE FROM air_filter WHERE airf_id=$idair");

    header('location: manageitems.php');
}



if (isset($_GET["delfuel"])) {
    $idfuel = $_GET["delfuel"];
    $sqlfuel = mysqli_query($db, "DELETE FROM fuel_filter WHERE fuelf_id=$idfuel");

    header('location: manageitems.php');
}



if (isset($_GET["deloil"])) {
    $idoil = $_GET["deloil"];
    $sqloil = mysqli_query($db, "DELETE FROM oil_filter WHERE oilfilter_id=$idoil");

    header('location: manageitems.php');
}



if (isset($_GET["delcool"])) {
    $idcool = $_GET["delcool"];
    $sqlcool = mysqli_query($db, "DELETE FROM coolant WHERE cooland_id=$idcool");

    header('location: manageitems.php');
}





if (isset($_GET["delbrk"])) {
    $idbrk = $_GET["delbrk"];
    $sqlbrk = mysqli_query($db, "DELETE FROM brake_oil WHERE brkoil_id=$idbrk");

    header('location: manageitems.php');
}



if (isset($_POST['addstoreitem'])) {

    $itmtype = $_POST['itemtype'];
    $brndname = $_POST['brandnme'];
    $brandprice = $_POST['brandprice'];

    if ($itmtype == "Engineoil") {
        $queryeb = "INSERT INTO engine_oil (brand,price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $queryeb);
    } else if ($itmtype == "acfilter") {
        $queryac = "INSERT INTO ac_filter (acf_brand,acf_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $queryac);
    } else if ($itmtype == "airfilter") {
        $queryair = "INSERT INTO air_filter (airf_brand,airf_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $queryair);
    } else if ($itmtype == "fuelfilter") {
        $queryfuel = "INSERT INTO fuel_filter (fuel_brand,fuel_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $queryfuel);
    } else if ($itmtype == "oilfilter") {
        $queryoil = "INSERT INTO oil_filter (oilfilter_brand,oil_brand_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $queryoil);
    } else if ($itmtype == "coolant") {
        $querycool = "INSERT INTO coolant (cooland_brand,coolant_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $querycool);
    }else if ($itmtype == "brkeoil") {
        $querybrk = "INSERT INTO brake_oil (brkoil_brand,brkoil_price) 
        VALUES('$brndname','$brandprice')";
        mysqli_query($db, $querybrk);}
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
                                            <a href="admindasboard.php">
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
                                        <li class="has-sub active">
                                            <a class="js-arrow" href="#">
                                                <i class="fas fa-user"></i>Stores
                                                <span class="arrow">
                                                    <i class="fas fa-angle-down"></i>
                                                </span>
                                            </a>
                                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                                <li class="has-sub active">
                                                    <a href="manageitems.php">Manage Items</a>
                                                </li>
                                            </ul>
                                        </li>



                                        <li>
                                            <a href="cusviewfeedback.php">
                                                <i class="fas fa-comments"></i>Customer Feedbacks</a>
                                        </li>

                                        <li>
                                            <a href=../index.php?logout='1'""> <i class="fas fa-sign-out-alt"></i>Logout</a>
                                        </li>
                                    </ul>
                                </nav>
                            </aside>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-9 pt-5">



                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Store items</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Add new Item</a>

                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">



                                    <?PHP
                                    if (isset($_SESSION['dd'])) {
                                        echo $_SESSION['dd'];
                                        unset($_SESSION['dd']);
                                    }
                                    ?>


                                    <h3 class="pt-5">Engine Oil</h3>


                                    <table class="table table-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Engine oil Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultmb = mysqli_query($db, $sqlengoil)) : ?>
                                            <tbody>
                                                <?php while ($row = mysqli_fetch_array($resultmb)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $row['brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $row['price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?del=<?php echo $row['enoil_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultmb); ?>
                                        <?php endif ?>

                                    </table>




                                    <h3>AC Filter</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Engine oil Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultac = mysqli_query($db, $sqlacfil)) : ?>
                                            <tbody>
                                                <?php while ($rowac = mysqli_fetch_array($resultac)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowac['acf_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowac['acf_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?delac=<?php echo $rowac['acf_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultac); ?>
                                        <?php endif ?>

                                    </table>






                                    <h3>Air Filter</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Air Filter Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultair = mysqli_query($db, $sqlairfil)) : ?>
                                            <tbody>
                                                <?php while ($rowair = mysqli_fetch_array($resultair)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowair['airf_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowair['airf_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?delair=<?php echo $rowair['airf_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultair); ?>
                                        <?php endif ?>

                                    </table>



                                    <h3>Fuel Filter</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Fuel Filter Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultfuel = mysqli_query($db, $sqlfuel)) : ?>
                                            <tbody>
                                                <?php while ($rowfuel = mysqli_fetch_array($resultfuel)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowfuel['fuel_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowfuel['fuel_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?delfuel=<?php echo $rowfuel['fuelf_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultfuel); ?>
                                        <?php endif ?>

                                    </table>




                                    <h3>Oil Filter</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Oil Filter Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultoil = mysqli_query($db, $sqloil)) : ?>
                                            <tbody>
                                                <?php while ($rowoil = mysqli_fetch_array($resultoil)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowoil['oilfilter_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowoil['oil_brand_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?deloil=<?php echo $rowoil['oilfilter_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultoil); ?>
                                        <?php endif ?>

                                    </table>



                                    <h3>Coolant</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Coolant Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resultcool = mysqli_query($db, $sqlcool)) : ?>
                                            <tbody>
                                                <?php while ($rowcool = mysqli_fetch_array($resultcool)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowcool['cooland_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowcool['coolant_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?delcool=<?php echo $rowcool['cooland_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resultcool); ?>
                                        <?php endif ?>

                                    </table>






                                    <h3>Brake Oil</h3>


                                    <table class="table table-bordered table-dark ">
                                        <thead>
                                            <tr>
                                                <th scope="col">Brake oil Brand</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Delete</th>
                                            </tr>
                                        </thead>

                                        <?php if ($resulbrake = mysqli_query($db, $sqlbrkeoil)) : ?>
                                            <tbody>
                                                <?php while ($rowbrk = mysqli_fetch_array($resulbrake)) : ?>
                                                    <?php echo "<tr>"; ?>
                                                    <?php echo "<td>" . $rowbrk['brkoil_brand'] . "</td>"; ?>
                                                    <?php echo "<td>" . $rowbrk['brkoil_price'] . "</td>"; ?>


                                                    <td><button type="button" class="btn btn-danger"><b><a onclick='javascript:confirmationDelete($(this));return false;' href="manageitems.php?delbrk=<?php echo $rowbrk['brkoil_id']; ?>" class="text-white"><b>Remove Brand</a></b></button></td>
                                                    <?php echo "</tr>"; ?>


                                                <?php endwhile ?>
                                            </tbody>
                                            <?php mysqli_free_result($resulbrake); ?>
                                        <?php endif ?>

                                    </table>













                                </div>


                                <div class="tab-pane fade pt-5" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form action="manageitems.php" method="post">

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Select Item type</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="itemtype">
                                                <option>--Select Type--</option>
                                                <option value="Engineoil">Engine Oil</option>
                                                <option value="acfilter">AC filter</option>
                                                <option value="airfilter">Air Filter</option>
                                                <option value="oilfilter">Oil Filter</option>
                                                <option value="fuelfilter">Fuel Filter</option>
                                                <option value="coolant">Coolant</option>
                                                <option value="brkeoil">Brake Oil</option>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="exampleInputBrand"><b>Brand Name</b></label>
                                            <input type="text" class="form-control" aria-describedby="textlHelp" name="brandnme" required>
                                        </div>


                                        <div class="form-group">
                                            <label>Brand Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon3">Rs.</span>
                                                </div>
                                                <input type="text" class="form-control" aria-describedby="textlHelp" name="brandprice" required>
                                            </div>
                                        </div>






                                        <button type="submit" class="btn btn-primary" name="addstoreitem">Add</button>

                                    </form>
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
    <script>
        function confirmationDelete(anchor) {
            var conf = confirm('Are you sure want to delete this brand?');
            if (conf)
                window.location = anchor.attr("href");
        }
    </script>

</body>

</html>