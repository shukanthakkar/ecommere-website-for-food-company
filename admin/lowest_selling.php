<?php
session_start();
include("../db.php");


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
         <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Lowest Selling Product Report</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter table-hover" id="">
                    <thead class=" text-primary">
                      <tr><th>ID</th>
                <th>Product  name</th>
                <th>Quentity</th>
               
                    </tr></thead>
                    <tbody>
                    <?php 
                        $result=mysqli_query($con,"SELECT a.product_id, b.product_title, sum(a.qty) as qty FROM `order_products` a inner join `products` b on a.product_id=b.product_id group by product_id ORDER BY qty ASC")or die ("query 1 incorrect.....");
                        while(list($product_id,$product_title,$qty)=mysqli_fetch_array($result))
                        {	
                           
                        echo "<tr><td>$product_id</td><td>$product_title</td><td>$qty</td>

                        </tr>";
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