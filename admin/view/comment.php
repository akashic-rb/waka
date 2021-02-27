        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Bình luận</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                    </div>
                </div>
                <!-- /. ROW -->
                <div class="row text-center pad-top">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <table id="myTable" class="table table-bordered table-dark">
                                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID</th>
                                    <th scope="col" style="text-align: center;">User Id</th>
                                    <th scope="col" style="text-align: center;">User Name</th>
                                    <th scope="col" style="text-align: center;">Product Name</th>
                                    <th scope="col" style="text-align: center;">Content</th>
                                    <th scope="col" style="text-align: center;">Date</th>
                                    <th scope="col" style="text-align: center;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    foreach ($comments as $comment) {
                                        echo '
                                        <tr>
                                        <td>'.$comment['id'].'</td>
                                        <td>'.$comment['id_user'].'</td>
                                        <td>'.$comment['username'].'</td>
                                        <td>'.$comment['name'].'</td>
                                        <td>'.$comment['content'].'</td>
                                        <td>'.$comment['date'].'</td>
                                        <td><a href="?act=comment_del&id='.$comment['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a></td>
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