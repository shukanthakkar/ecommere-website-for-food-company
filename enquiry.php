<?php
include "db.php";
if (isset($_POST["submit"])) {

	$firm_name = $_POST["firm_name"];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$pincode = $_POST['pincode'];
	$con_name = $_POST["con_name"];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$firm_gst = $_POST['firm_gst'];
	$firm_pan = $_POST['firm_pan'];
	$sales_area = $_POST['sales_area'];
	
	$name = "/^[a-zA-Z ]+$/";
	$emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
	$number = "/^[0-9]+$/";

if(empty($firm_name)  || empty($address1) || empty($address2) || empty($pincode) || empty($con_name) || empty($mobile) || empty($email) ||
	empty($firm_gst) || empty($firm_pan) || empty($sales_area)){
		
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>PLease Fill all fields..!</b>
			</div>
		";
		exit();
	} else {
		if(!preg_match($name,$firm_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $firm_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($name,$con_name)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $con_name is not valid..!</b>
			</div>
		";
		exit();
	}
	if(!preg_match($emailValidation,$email)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>this $email is not valid..!</b>
			</div>
		";
		exit();
	}
	
	if(!preg_match($number,$mobile)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number $mobile is not valid</b>
			</div>
		";
		exit();
	}
	if(!(strlen($mobile) == 10)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Mobile number must be 10 digit</b>
			</div>
		";
		exit();
	}
	if(!(strlen($firm_gst) == 15)){
		echo "
			<div class='alert alert-warning'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>GST number must be 15 character</b>
			</div>
		";
		exit();
	}
	//existing email address in our database
	$sql = "SELECT firm_id FROM enquiry_details WHERE email = '$email' LIMIT 1" ;
	$check_query = mysqli_query($con,$sql);
	$count_email = mysqli_num_rows($check_query);
	if($count_email > 0){
		echo "
			<div class='alert alert-danger'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Email Address is already available Try Another email address</b>
			</div>
		";
		exit();
	} else {
		
		$sql = "INSERT INTO `enquiry_details` 
		( `firm_name`, `address1`, `address2`, `pincode`, `con_name`, 
		`mobile`, `email`, `firm_gst`, `firm_pan`, `sales_area`) 
		VALUES ( '$firm_name', '$address1', '$address2', 
		'$pincode', '$con_name', '$mobile', '$email', '$firm_gst', '$firm_pan' ,'$sales_area')";
		$run_query = mysqli_query($con,$sql);

	
		
		if(mysqli_query($con,$sql)){
			echo "enquiry_submitted";
			echo "<script> location.href='store.php'; </script>";
            exit;
		}
	}
	}
	
}



?>
