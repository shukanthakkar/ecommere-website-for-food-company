<?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$firm_id=$_GET['firm_id'];

/*this is delet quer*/
mysqli_query($con,"delete from shop_enquiry_details where user_id='$shop_enq_id'")or die("query is incorrect...");
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
                <h4 class="card-title">Enquiry form shop</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>Shop name</th>
                <th>Email</th>
                <th>Mobile no</th>
                <th>Address</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select shop_enq_id, shop_enq_name, shop_enq_email, shop_enq_mobile, shop_enq_add from shop_enquiry_details")or die ("query 2 incorrect.......");

                        while(list($shop_enq_id,$shop_enq_name,$shop_enq_email,$shop_enq_mobile,$shop_enq_add)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$shop_enq_name</td><td>$shop_enq_email</td><td>$shop_enq_mobile</td><td>$shop_enq_add</td></tr>";
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