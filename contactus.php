<?php
$retval="";

if (isset($_POST['contact_us'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $msg = $_POST['message'];
  $subject = "MotorCare";
         
  $message = "<h4>$msg</h4>";
  
  
  $header = "From:achiraisuru@gmail.com \r\n";

  $header .= "MIME-Version: 1.0\r\n";
  $header .= "Content-type: text/html\r\n";
  
  $retval = mail ($email,$subject,$message,$header);
  

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MotorCare</title>
<?php $cont = "contactus" ?>

  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">


    <!-- external css files -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/contactstyle.css">

    <!-- fontawesome icons -->
    <link href="vendor/fontawsome/css/all.css"  rel="stylesheet">

 	<!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">


</head>
<body>



<?php include('header.php') ?>


<section class="contact_img">
          
          <div class="container">
            <div class="row">

              <div class="col-md-12 text-center text-lg-left">
                <div class=" pt-5 contact_bread_heading">Contact Us</div>
                <ol class="breadcrumb contact_breadcrum pt-3">
                  <li class="breadcrumb-item">
                    <a href="index.php">Home</a>
                  </li>
                  <li class="breadcrumb-item active">
                    Contact Us
                  </li>
                </ol>
              </div>

            </div>
          </div>
        </section>





<div class="contact_frm_map">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="cntact_frm_head py-4">Contact Us Now</div>

     <?php   if( $retval == true ) {
     echo "<div class='alert alert-success'>Message sent</div>";
     }?>
        <form action="contactus.php" method="post" role="form" class="contactForm">

                <label for="exampleFormControlInput1">Name</label>
                <div class="form-group">
                  <input type="text" class="form-control form-control-md br" name="name" id="name" placeholder="Name" data-rule="minlen:4" data-msg="Please enter name" />
                  <div class="validation"></div>
                </div>

                <label for="exampleFormControlInput1">Email</label>
                <div class="form-group">
                  <input type="text" class="form-control form-control-md br" name="email" id="email" placeholder="Enter valid Email" data-rule="minlen:4" data-msg="Please enter at lvalid email" />
                  <div class="validation"></div>
                </div>

                 <label for="exampleFormControlInput1">Message</label>
                <div class="form-group">
                  <textarea class="form-control form-control-md br" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <button type="submit" class="btn btn-danger btn-md my-3 px-3" name="contact_us">Sumbit</button>
              </form>
      </div>
      <div class="col-lg-6 map">
        <iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJN-yfGoph5DoRS2UpInAA2R0&key=AIzaSyDOoyyTPdKWXJUaZfXVd17z-vNneI7XBMw" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>









<!-- start footer section -->

<?php include('footer.php') ?>

<!-- close footer section -->






<script type="text/javascript" src="vendor/jquery/jquery-3.4.1.min.js"></script>

<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>