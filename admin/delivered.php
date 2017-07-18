<?php include ('header.php');?>	
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Moosikay&nbsp;Melo's</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
              
                <li class="dropdown"> 
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                      						
					   Welcome : ADMIN
                    </a>
                  
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
       <?php include ('nav_sidebar.php');?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
			 <div class="row">
                    <div class="col-md-12">
						
						
						<div class="hero-unit-table">   
                           <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <div class="alert alert-info">
                                    <strong><i class="icon-user icon-large"></i>&nbsp;Order Table</strong>
                                </div>
								    <ul class="breadcrumb"> 
											<li>Orders<span class="divider">/</span></li>				
											<li><a href="orders.php">Pending Orders</a><span class="divider">/</span></li>
											<li class="active">Delivered<span class="divider">/</span></li>
								
									</ul>
                                <thead>
                                    <tr>
                                    
                                        <th>Product Name</th>
                                        <th>Customer Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
										<th>Status</th>
										<th>Mode of Payment</th>
										
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php include ('connect.php');
                                    $cart_table = mysqli_query($dbcon,"select  * from order_details where status='Delivered'") or die(mysqli_error());
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['orderid'];
                                        $product_id = $cart_row['productID'];
                                        $member_id = $cart_row['memberID'];
                                        $product_query = mysqli_query($dbcon,"select * from tb_products where productID='$product_id'") or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($product_query);
										$member_query = mysqli_query($dbcon,"select * from tb_member where memberID = '$member_id'")or die(mysqli_error());
										$member_row=mysqli_fetch_array($member_query);
                                        ?>

                                        <tr>
                                           
                                            <td><?php echo $product_row['name']; ?></td>
                                            <td><?php echo $member_row['Firstname']." ".$member_row['Lastname']; ?></td>
                                            <td><?php echo $cart_row['price']; ?></td>
                                            <td><?php echo $cart_row['qty']; ?></td>
                                            <td><?php echo $cart_row['total']; ?></td>
                                            <td><?php echo $cart_row['status']; ?></td>
										    <td><?php echo $cart_row['modeofpayment']; ?></td>
											
                                        </tr>
                                            
                                            
                                           
                                            <!-- product delete modal -->
                                  
                                    <!-- end delete modal -->

                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> 
                
				
				</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
   <?php include ('script.php');?>
</body>
</html>
