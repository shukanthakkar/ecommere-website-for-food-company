<?php
session_start();
include("../db.php");
error_reporting(0);
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$supplier_id=$_GET['supplier_id'];

/*this is delet query*/
mysqli_query($con,"delete from supplier where supplier_id='$supplier_id'")or die("query is incorrect...");
}

include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
        
        
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title"> Supplier List</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " >
                    <thead class=" text-primary">
                      <tr><th>Supplier Name</th><th>Contact Person</th><th>Mobile No.</th><th>Supplier Address</th><th>Supplier Pincode</th><th>
	<a class=" btn btn-primary" href="addsupplierdetails.php">Add New</a></th></tr></thead>
                    <tbody>
                      <?php 

                        $result=mysqli_query($con,"select supplier_id, supplier_firm_name, supplier_name, supplier_mobile, supplier_add ,supplier_pincode from supplier ")or die ("query 1 incorrect.....");

                        while(list($supplier_id,$supplier_firm_name,$supplier_name,$supplier_mobile,$supplier_add,$supplier_pincode)=mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$supplier_firm_name</td>
                        <td>$supplier_name</td><td>$supplier_mobile</td><td>$supplier_add</td><td>$supplier_pincode</td>
                        <td>

                        <a class=' btn btn-success' href='supplierlist.php?supplier_id=$supplier_id&action=delete'>Delete</a>
                        </td></tr>";
                        }

                        ?>
                    </tbody>
                  </table>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
              </div>
            </div>
           
            
           

          </div>
          
          
        </div>
      </div>
      <?php
include "footer.php";
?>