<?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$firm_id=$_GET['firm_id'];

/*this is delet quer*/
mysqli_query($con,"delete from enquiry_details where user_id='$firm_id'")or die("query is incorrect...");
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
                <h4 class="card-title">Enquiry for Distributorship</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>firm name</th>
                <th>address1</th>
                <th>address2</th>
                <th>mobile no</th>
                <th>email</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select firm_id, firm_name, address1, address2, mobile, email from enquiry_details")or die ("query 2 incorrect.......");

                        while(list($firm_id,$firm_name,$address1,$address2,$mobile,$email)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$firm_name</td><td>$address1</td><td>$address2</td><td>$mobile</td><td>$email</td></tr>";
                        }
                        mysqli_close($con);
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