
    <?php
session_start();
include("../db.php");


include "sidenav.php";
include "topheader.php";
?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          <div class="col-md-14">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Sales Report</h4>
                <th>Enter Date : </th>
                <form action="" method="post"><input type="date" id="date" name="date"><th>
	<button type="submit">Show</button></form></th>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table table-hover tablesorter " id="">
                    <thead class=" text-primary">
                      <tr><th>Customer Name</th><th>Products</th><th>Amount</th><th>Count</th>
                    </tr></thead>
                    <tbody>







                    <?php
                    $date = $_POST["date"];
                      $query = "SELECT * FROM orders_info WHERE created_at like '%$date%'";
                      $run = mysqli_query($con,$query);
                      
                      if(mysqli_num_rows($run) > 0){

                       while($row = mysqli_fetch_array($run)){
                         $order_id = $row['order_id'];
                         $f_name = $row['f_name'];
                         $total_amount = $row['total_amt'];
                         $user_id = $row['user_id'];
                         $qty = $row['prod_count'];
                         $date = $row['created_at']
                                               ?>
                          <tr>
                            <td><?php 
                               echo $f_name;

                             ?></td>
                           <td> <?php
                            $query1 = "SELECT * FROM order_products where order_id = $order_id";
                            $run1 = mysqli_query($con,$query1); 
                              while($row1 = mysqli_fetch_array($run1)){
                               $product_id = $row1['product_id'];
                               $product_qty = $row1['qty'];

                               $query2 = "SELECT * FROM products where product_id = $product_id";
                               $run2 = mysqli_query($con,$query2);

                               while($row2 = mysqli_fetch_array($run2)){
                               $product_title = $row2['product_title'];
                           ?>
                              <?php echo $product_title , ($product_qty) ?><br>
                            <?php }}?></td>
                           
                            <td><?php echo $total_amount ?></td>
                            <td><?php echo $qty ?></td>
                            <td></td>
                         </tr>
                         <?php } ?>
                        
                     <?php
                   }else {
                     echo "<center><h2>No users Available</h2><br><hr></center>";
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