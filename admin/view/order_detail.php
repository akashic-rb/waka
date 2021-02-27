        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Chi tiết đơn hàng <?php echo $id;?></h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row text-center pad-top">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-dark">
                                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID Product</th>
                                    <th scope="col" style="text-align: center;">Name</th>
                                    <th scope="col" style="text-align: center;">Image</th>
                                    <th scope="col" style="text-align: center;">Price</th>
                                    <th scope="col" style="text-align: center;">Quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($list_product as $product){
                                ?>
                                    <tr>
                                        <td><?php echo $product['id'];?></td>
                                        <td><?php echo $product['name'];?></td>
                                        <td><img src="../../upload/<?php echo $product['image'];?>" alt="" style="height: 50px;"></td>
                                        <td><?php echo $product['price'];?></td>
                                        <td><?php echo $product['quantity'];?></td>
                                    </tr>
                                <?php }?>
                                </tbody>
                              </table>
                      
                        
                      </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>