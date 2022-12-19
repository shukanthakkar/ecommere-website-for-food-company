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
                <h4 class="card-title"> Reports</h4>
                
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " >
                    <thead class=" text-primary">
                      <tr><th>Report Name</th><th>
	
                    <tbody>
                    
                       <tr><td>Sales Report</td>
                      
                        <td>

                        <a class=' btn btn-success' href='sales_report.php?supplier_id=$supplier_id&action=delete'>Show</a>
                        </td></tr>

                        <tr><td>Category Report</td>
                      
                      <td>

                      <a class=' btn btn-success' href='category_report.php?supplier_id=$supplier_id&action=delete'>Show</a>
                      </td></tr>

                      <tr><td>product report</td>
                      
                      <td>

                      <a class=' btn btn-success' href='product_report.php?supplier_id=$supplier_id&action=delete'>Show</a>
                      </td></tr>

                      <tr><td>Highest selling Report</td>
                      
                      <td>

                      <a class=' btn btn-success' href='highest_selling.php?supplier_id=$supplier_id&action=delete'>Show</a>
                      </td></tr>

                      <tr><td>lowest selling Report</td>
                      
                      <td>

                      <a class=' btn btn-success' href='lowest_selling.php?supplier_id=$supplier_id&action=delete'>Show</a>
                      </td></tr>
                      
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