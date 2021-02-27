        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Nhà xuất bản</h2>
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
                        <a href="index.php?act=publisher_add"><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> NXB mới</button></a>
                            <table id="myTable" class="table table-bordered table-dark">
                                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID</th>
                                    <th scope="col" style="text-align: center;">Name</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  foreach ($publisher as $p) {
                                      echo '
                                      <tr>
                                      <td>'.$p['id'].'</td>
                                      <td>'.$p['name'].'</td>
                                      <td><a href="index.php?act=publisher_del&pid='.$p['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=publisher_edit&pid='.$p['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                      </tr>
                                      ';
                                  }
                                  ?>
                                </tbody>
                              </table>
                      
                        
                      </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>