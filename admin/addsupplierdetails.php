<?php
session_start();
include("../db.php");
include "sidenav.php";
include "topheader.php";
if(isset($_POST['btn_save']))
{
$supplier_firm_name=$_POST['supplier_firm_name'];
$supplier_name=$_POST['supplier_name'];
$supplier_mobile=$_POST['supplier_mobile'];
$supplier_add=$_POST['supplier_add'];
$supplier_pincode=$_POST['supplier_pincode'];
;

mysqli_query($con,"insert into supplier(supplier_firm_name, supplier_name, supplier_mobile, supplier_add, supplier_pincode) values ('$supplier_firm_name','$supplier_name','$supplier_mobile','$supplier_add','$supplier_pincode')") 
			or die ("Query 1 is inncorrect........");
mysqli_close($con);
}


?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add supplier details</h4>
                  <p class="card-category">Complete Supplier profile</p>
                </div>
                <div class="card-body">
                  <form action="" method="post" name="form" enctype="multipart/form-data">
                    <div class="row">
                      
                      <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">firm Name</label>
                          <input type="text" id="supplier_firm_name" name="supplier_firm_name" class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">supplier name</label>
                          <input type="text" name="supplier_name" id="supplier_name"  class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-md-12">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">mobile</label>
                          <input type="text" id="supplier_mobile" name="supplier_mobile" class="form-control" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Pincode</label>
                          <input type="text" name="supplier_pincode" id="supplier_pincode"  class="form-control" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Address</label>
                          <input type="text" name="supplier_add" id="supplier_add" class="form-control" required>
                        </div>
                      </div>
                      
                    </div>
                      
                   
                    <button type="submit" name="btn_save" id="btn_save" class="btn btn-primary pull-right">Add supplier</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <?php
include "footer.php";
?>