<?php
include "header.php";
?>

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
					
						<div class="newsletter">
							<p>Search for <strong>nearest Distributor </strong></p>
							<form action="" method="post">
								<input class="input" name="supplier_pincode" placeholder="Enter Your Pincode">
								<button class="newsletter-btn" name="search_btn" type="submit"><i class="fa fa-search"></i> Search</button>
							</form>
							<div class="" id="offer_msg">
                                <!--Alert from signup form-->
                            </div>
							
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div  class="section">
			<?php
include "db.php";
if(isset($_POST["search_btn"])){
	$search = $_POST['supplier_pincode'];
	$sql = "SELECT * FROM supplier WHERE supplier_pincode LIKE '%$search%' ";
	$run_query = mysqli_query($con, $sql);
	while($row=mysqli_fetch_array($run_query)){
			$supplier_firm_name = $row['supplier_firm_name'];
			$supplier_name = $row['supplier_name'];
			$supplier_mobile = $row['supplier_mobile'];
			$supplier_add = $row['supplier_add'];
			$supplier_pincode = $row['supplier_pincode'];
			echo "
			<center>
			<b><p class='product-name header-cart-item-name'>Firm Name :  $supplier_firm_name</p>
			<p class='product-name header-cart-item-name'>Contact person :  $supplier_name</p>
			<p class='product-name header-cart-item-name'>Mobile No :  $supplier_mobile</p>
			<p class='product-name header-cart-item-name'>Address :  $supplier_add</p>
			<p class='product-name header-cart-item-name'>Pincode :  $supplier_pincode</p></b>
			<br></center>
			";
	}
}

?>
</div>
			<!-- /container -->
		</div>
        <?php
        include "footer.php"
        ?>