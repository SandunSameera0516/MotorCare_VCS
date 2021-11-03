<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'motorcare');

// variable declaration
$name = "";
$nic ="";
$email = "";
$mobile="";
$address="";
$errors   = array(); 




// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $name, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$name    =  e($_POST['name']);
	$nic    =  e($_POST['nic']);
	$address    =  e($_POST['address']);
	$mobile    =  e($_POST['mobile']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);


	

	if ((strlen($mobile) != 10)) { 
		array_push($errors, "Please enter valid mobile number"); 
	}

	if ((strlen($nic) != 10)) { 
		array_push($errors, "Sorry...Your nic not valid"); 
	}
	

	if ((strlen($password_1) < 6)) { 
		array_push($errors, "Password lenghth should be greatr than 6"); 
	}



	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	$sql_u = "SELECT * FROM login WHERE name='$name'";
  	$sql_e = "SELECT * FROM login WHERE email='$email'";
	  $sql_n = "SELECT * FROM login WHERE nic='$nic'";
	  $sql_ad = "SELECT * FROM login WHERE address='$address'";
  	$res_u = mysqli_query($db, $sql_u);
  	$res_e = mysqli_query($db, $sql_e);
	  $res_n = mysqli_query($db, $sql_n);
	  $res_ad = mysqli_query($db, $sql_ad);

	  if (mysqli_num_rows($res_ad) > 2) {
		array_push($errors, "Sorry... Address is already taken"); 	
	   }

  	if (mysqli_num_rows($res_u) > 0) {
  	 array_push($errors, "Sorry... Name is already taken"); 	
  	}

  	 if(mysqli_num_rows($res_e) > 0){
  	  array_push($errors, "Sorry... email already taken"); 
  	}

  	 if(mysqli_num_rows($res_n) > 0){
  	  array_push($errors, "Sorry... nic already exists"); 
  	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);

			if($user_type=="cashier"){
				$querycas = "INSERT INTO cashier (cas_name,cas_nic,cas_address,cas_mobile,cas_email) 
					  VALUES('$name','$nic','$address','$mobile', '$email')";
						mysqli_query($db, $querycas);
			}

			if($user_type=="mechanic"){
				$querymech = "INSERT INTO mechanic (mech_name,mech_nic,mech_address,mech_mobile,mech_email) 
					  VALUES('$name','$nic','$address','$mobile', '$email')";
						mysqli_query($db, $querymech);
			}

			if($user_type=="receptionist"){
				$queryreci = "INSERT INTO receptionist (reci_name,reci_nic,reci_address,reci_mobile,reci_email) 
					  VALUES('$name','$nic','$address','$mobile', '$email')";
						mysqli_query($db, $queryreci);
			}
			$query = "INSERT INTO login (name, nic, address, mobile, email, user_type, password) 
					  VALUES('$name','$nic','$address','$mobile', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);

			
            //  $subject = "your username and password";
             
            //  $msg = "<html>
            //       <head>
            //       	<title>New message from website contact form</title>
            //       </head>
            //       <body>
                  
            //       	<h3>Your Username is -" . $email . "</h3>
            //       	<h3>Your password is -".$password_1."</h3>
            //       </body>
            //       </html>";
                            
            //  $headers = "From: achiraisuru@gmail.com";
            //  $headers = "MIME-Version: 1.0" . "\r\n";
            //  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			//  mail($email, $subject, $msg, $headers);
			
         $subject = "<h2>Welcome to MotorCare</h2>";
         
         $message = "<h4>This is your username - $email</h4>";
         $message .= "<h4>This is your password - $password_1 </h4>";
         
         $header = "From:achiraisuru@gmail.com \r\n";
       
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($email,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
		 }
		 

			$_SESSION['success']  = "<div class='alert alert-success'>New $user_type successfully Created</div>";
			header('location:admindasboard.php');
		}else{
			$query = "INSERT INTO login (name, nic, address, mobile, email, user_type, password) 
					  VALUES('$name','$nic','$address','$mobile', '$email', 'user', '$password')";
			mysqli_query($db, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($db);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "<div class='alert alert-success'>You are successfully registered <br> Please Login</div>";

			header('location: login.php');				
		}
	}
}










if (isset($_POST['add_veh'])) {
	

	$nic1    =  e($_POST['nic1']);
	$veh_reg_no    =  e($_POST['veh_reg_no']);
	$veh_type    =  e($_POST['veh_type']);


	$query = "INSERT INTO regvehicles (nic,vehicle_reg_no,vehicle_type) 
			  VALUES('$nic1','$veh_reg_no','$veh_type')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New vehicle added successfully created!!";
			header('location: customerdash.php');
	

}





// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM login WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $name,$email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM login WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location:admin/admindasboard.php');	

			
		}else if($logged_in_user['user_type'] == 'mechanic') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: mechanic/mechanicdashboard.php');	
			  
			}else if($logged_in_user['user_type'] == 'receptionist') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: receptionist/recidashboard.php');	
			  
			}

			else if($logged_in_user['user_type'] == 'cashier') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: cashier/cashierdashboard.php');	
			  
			}
			else if($logged_in_user['user_type'] == 'storekeeper') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: storekeeper.php');	
			  
			}


			else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: customer/customerdash.php');
			}
		}else {
			array_push($errors, "Wrong name/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isMechanic()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'mechanic' ) {
		return true;
	}else{
		return false;
	}
}

function isReceptionist()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'receptionist' ) {
		return true;
	}else{
		return false;
	}
}

function isCashier()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'cashier' ) {
		return true;
	}else{
		return false;
	}
}

function isStorekeeper()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'storekeeper' ) {
		return true;
	}else{
		return false;
	}
}