<?php
include "db.php";
if(isset($_POST['submit']))  {
	$shop_enq_name = $_POST['shop_enq_name'];
	$shop_enq_email = $_POST['shop_enq_email'];
	$shop_enq_mobile = $_POST['shop_enq_mobile'];
	$shop_enq_add = $_POST['shop_enq_add']; 

$sql = "INSERT INTO `shop_enquiry_details`(`shop_enq_name`, `shop_enq_email`, `shop_enq_mobile`, `shop_enq_add`) 
VALUES ('$shop_enq_name','$shop_enq_email','$shop_enq_mobile','$shop_enq_add')";

if(mysqli_query($con,$sql)){
	echo "register_success";
	echo "<script> location.href='supplier_list.php'; </script>";
	exit();
}
}
?>
