<?php
session_start();
include 'db.php';
if(isset($_POST['submit']))
{	 
	 $cust_name = $_POST['cust_name'];
	 $cust_email = $_POST['cust_email'];
	 $cust_message = $_POST['cust_message'];
	 $sql = "INSERT INTO `contactus_enquiry` (`cust_name`,`cust_email`,`cust_message`)


	 VALUES ('$cust_name','$cust_email','$cust_message')";
	 if (mysqli_query($con,$sql)) {
		$to_email = "$cust_email";
		$subject = "Thanks for contacting Rimm foods";
		$body = "This automatic reply is just to let you know that we received your message and we’ll get back to you with a response as quickly as possible. During [business_hours] we do our best to reply as quick as we can, usually within a couple of hours. Evenings and weekends may take us a little bit longer.
		
		If you have any additional information that you think will help us to assist you, please feel free to reply to this email.
		
		We look forward to chatting soon!
		
		Thanks, $cust_name";
		$headers = "From:thakkarshukan175@gmail.com";
		mail($to_email, $subject, $body, $headers);
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
}
?>