<?php
 $db = mysqli_connect("localhost", "root", "", "motorcare");
//fetch.php
if(isset($_POST["action"]))
{

 $output = '';
 if($_POST["action"] == "brand")
 {
  $query = "SELECT price FROM engine_oil WHERE brand = '".$_POST["query"]."'";
  $result = mysqli_query($db, $query);
 
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["price"].'">'.$row["price"].'</option>';
  }
 }
 
 echo $output;

 
}

if(isset($_POST["action1"]))
{

 $output1 = '';
 if($_POST["action1"] == "oilbrand")
 {
  $query1 = "SELECT oil_brand_price FROM oil_filter WHERE oilfilter_brand = '".$_POST["query1"]."'";
  $result1 = mysqli_query($db, $query1);
 
  while($row1 = mysqli_fetch_array($result1))
  {
   $output1 .= '<option value="'.$row1["oil_brand_price"].'">'.$row1["oil_brand_price"].'</option>';
  }
 }
 
 echo $output1;

 
}


if(isset($_POST["action2"]))
{

 $output2 = '';
 if($_POST["action2"] == "fuelbrand")
 {
  $query2 = "SELECT fuel_price FROM fuel_filter WHERE fuel_brand = '".$_POST["query2"]."'";
  $result2 = mysqli_query($db, $query2);
 
  while($row2 = mysqli_fetch_array($result2))
  {
   $output2 .= '<option value="'.$row2["fuel_price"].'">'.$row2["fuel_price"].'</option>';
  }
 }
 
 echo $output2;

 
}



if(isset($_POST["action3"]))
{

 $output3 = '';
 if($_POST["action3"] == "airbrand")
 {
  $query3 = "SELECT airf_price FROM air_filter WHERE airf_brand = '".$_POST["query3"]."'";
  $result3 = mysqli_query($db, $query3);
 
  while($row3 = mysqli_fetch_array($result3))
  {
   $output3 .= '<option value="'.$row3["airf_price"].'">'.$row3["airf_price"].'</option>';
  }
 }
 
 echo $output3;

 
}




if(isset($_POST["action4"]))
{

 $output4 = '';
 if($_POST["action4"] == "acbrand")
 {
  $query4 = "SELECT acf_price FROM ac_filter WHERE acf_brand = '".$_POST["query4"]."'";
  $result4 = mysqli_query($db, $query4);
 
  while($row4 = mysqli_fetch_array($result4))
  {
   $output4 .= '<option value="'.$row4["acf_price"].'">'.$row4["acf_price"].'</option>';
  }
 }
 
 echo $output4;

 
}





if(isset($_POST["action5"]))
{

 $output5 = '';
 if($_POST["action5"] == "coolantbrand")
 {
  $query5 = "SELECT coolant_price FROM coolant WHERE cooland_brand = '".$_POST["query5"]."'";
  $result5 = mysqli_query($db, $query5);
 
  while($row5 = mysqli_fetch_array($result5))
  {
   $output5 .= '<option value="'.$row5["coolant_price"].'">'.$row5["coolant_price"].'</option>';
  }
 }
 
 echo $output5;

 
}








if(isset($_POST["action6"]))
{

 $output6 = '';
 if($_POST["action6"] == "brakebrand")
 {
  $query6 = "SELECT brkoil_price FROM brake_oil WHERE brkoil_brand = '".$_POST["query6"]."'";
  $result6 = mysqli_query($db, $query6);
 
  while($row6 = mysqli_fetch_array($result6))
  {
   $output6 .= '<option value="'.$row6["brkoil_price"].'">'.$row6["brkoil_price"].'</option>';
  }
 }
 
 echo $output6;

 
}







?>