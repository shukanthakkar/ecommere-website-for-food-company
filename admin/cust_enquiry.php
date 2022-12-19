<?php
session_start();
include("../db.php");
if(isset($_GET['action']) && $_GET['action']!="" && $_GET['action']=='delete')
{
$firm_id=$_GET['firm_id'];

/*this is delet quer*/
mysqli_query($con,"delete from contactus_enquiry where user_id='$cust_id'")or die("query is incorrect...");
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
                <h4 class="card-title">Enquiry of customers</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>customer name</th>
                <th>customer email</th>
                <th>customer message</th>
                <th>time</th>
                    </tr></thead>
                    <tbody>
                      <?php 
                        $result=mysqli_query($con,"select cust_id, cust_name, cust_email, cust_message, created_at from contactus_enquiry")or die ("query 2 incorrect.......");

                        while(list($cust_id,$cust_name,$cust_email,$cust_message,$created_at)=
                        mysqli_fetch_array($result))
                        {
                        echo "<tr><td>$cust_name</td><td>$cust_email</td><td>$cust_message</td><td>$created_at</td></tr>";
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