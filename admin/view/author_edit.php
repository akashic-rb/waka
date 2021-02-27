        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Cập nhật tác giả</h2>
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
                            <table class="table table-bordered table-dark" style="width: 80%; margin: 0 auto;">
                                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID</th>
                                    <th scope="col" style="text-align: center;">Name</th>            
                                  </tr>
                                </thead>
                                <tbody>
                               
                                  <?php
                                      echo '
                                      <form action="" method="post">
                                      <tr>
                                      <td><input type="hidden" name="id" id="" value="'.$a['id'].'">
                                      <input type="text" name="" id="" value="'.$a['id'].'" disabled></td>
                                      <td><input type="text" name="name" id="" value="'.$a['name'].'"></td>
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