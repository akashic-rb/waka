        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Cập nhật chi tiết đơn hàng</h2>
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
                            <table class="table table-bordered table-dark">
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
                                      echo '
                                      <form action="" method="post">
                                      <tr>
                                      <td><input type="number" name="product_id" id="" value="'.$product_id.'"></td>
                                      <td>'.$product['name'].'</td>
                                      <td><img src="../../upload/'.$product['image'].'" alt="" style="height: 50px;"></td>
                                      <td>'.$product['price'].'</td>
                                      <td><input type="number" name="quantity" id="" value="'.$q['quantity'].'"></td>
                                      </tr>
                                      <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button>
                                      </form>';
                                  ?>
                                </tbody>
                              </table>
                      </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>