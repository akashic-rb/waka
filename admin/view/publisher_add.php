        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
                    </li>

                    <li>
                        <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
                    </li>

                    <li>
                        <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
                    </li>

                    <li>
                        <a href="index.php?act=product"><i class="fa fa-file"></i>Sản phẩm</a>
                    </li>

                    <li>
                        <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
                    </li>

                    <li class="active-link">
                        <a href="index.php?act=publisher"><i class="fa fa-building"></i>NXB</a>
                    </li>

                    <li>
                        <a href="index.php?act=order"><i class="fa fa-th-list"></i>Đơn hàng</a>
                    </li>

                    <li>
                        <a href="index.php?act=comment"><i class="fa fa-align-justify"></i>Comment</a>
                    </li>

                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Nhà xuất bản mới</h2>
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
                                    <th scope="col" style="text-align: center;">Name</th>            
                                  </tr>
                                </thead>
                                <tbody>
                               
                                  <?php
                                      echo '
                                      <form action="" method="post">
                                      <tr>
                                      <td><input type="text" name="name" id="" value=""></td>
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