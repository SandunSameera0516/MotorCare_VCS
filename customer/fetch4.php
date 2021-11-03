<?php
 $db = mysqli_connect("localhost", "root", "", "motorcare");
//fetch.php
if(isset($_POST["actionins"]))
{

 $output = '';
 if($_POST["actionins"] == "brandin")
 {
  $queryin = "SELECT price FROM engine_oil WHERE brand = '".$_POST["queryin"]."'";
  $result = mysqli_query($db, $queryin);
 
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["price"].'">'.$row["price"].'</option>';
  }
 }
 
 echo $output;

 
}





if(isset($_POST["actionoil"]))
{

 $output1 = '';
 if($_POST["actionoil"] == "oilbrandin")
 {
  $queryoil = "SELECT oil_brand_price FROM oil_filter WHERE oilfilter_brand = '".$_POST["queryoil"]."'";
  $resultoil = mysqli_query($db, $queryoil);
 
  while($row1 = mysqli_fetch_array($resultoil))
  {
   $output1 .= '<option value="'.$row1["oil_brand_price"].'">'.$row1["oil_brand_price"].'</option>';
  }
 }
 
 echo $output1;

 
}




if(isset($_POST["actionfuel"]))
{

 $output2 = '';
 if($_POST["actionfuel"] == "fuelbrandin")
 {
  $queryfuel = "SELECT fuel_price FROM fuel_filter WHERE fuel_brand = '".$_POST["queryfuel"]."'";
  $resultfuel = mysqli_query($db, $queryfuel);
 
  while($row2 = mysqli_fetch_array($resultfuel))
  {
   $output2 .= '<option value="'.$row2["fuel_price"].'">'.$row2["fuel_price"].'</option>';
  }
 }
 
 echo $output2;

 
}



if(isset($_POST["actionair"]))
{

 $output3 = '';
 if($_POST["actionair"] == "airbrandin")
 {
  $queryair = "SELECT airf_price FROM air_filter WHERE airf_brand = '".$_POST["queryair"]."'";
  $resultair = mysqli_query($db, $queryair);
 
  while($row3 = mysqli_fetch_array($resultair))
  {
   $output3 .= '<option value="'.$row3["airf_price"].'">'.$row3["airf_price"].'</option>';
  }
 }
 
 echo $output3;

 
}





if(isset($_POST["actionac"]))
{

 $output4 = '';
 if($_POST["actionac"] == "acbrandin")
 {
  $queryac = "SELECT acf_price FROM ac_filter WHERE acf_brand = '".$_POST["queryac"]."'";
  $resultac = mysqli_query($db,$queryac);
 
  while($row4 = mysqli_fetch_array($resultac))
  {
   $output4 .= '<option value="'.$row4["acf_price"].'">'.$row4["acf_price"].'</option>';
  }
 }
 
 echo $output4;

 
}




if(isset($_POST["actioncool"]))
{

 $output5 = '';
 if($_POST["actioncool"] == "coolantbrandin")
 {
  $querycool = "SELECT coolant_price FROM coolant WHERE cooland_brand = '".$_POST["querycool"]."'";
  $resultcool = mysqli_query($db, $querycool);
 
  while($row5 = mysqli_fetch_array($resultcool))
  {
   $output5 .= '<option value="'.$row5["coolant_price"].'">'.$row5["coolant_price"].'</option>';
  }
 }
 
 echo $output5;

 
}






if(isset($_POST["actionbrk"]))
{

 $output6 = '';
 if($_POST["actionbrk"] == "brakebrandin")
 {
  $querybrk = "SELECT brkoil_price FROM brake_oil WHERE brkoil_brand = '".$_POST["querybrk"]."'";
  $resultbrk = mysqli_query($db, $querybrk);
 
  while($row6 = mysqli_fetch_array($resultbrk))
  {
   $output6 .= '<option value="'.$row6["brkoil_price"].'">'.$row6["brkoil_price"].'</option>';
  }
 }
 
 echo $output6;

 
}

?>