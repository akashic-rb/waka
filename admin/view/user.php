        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Danh sách người dùng</h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="pad">
                    <a class="btn btn-success" id="add-btn" href="?act=add_user"><i class="fa fa-plus" style="color:white"></i> Người dùng mới</a>
                    <div id="dialog-form" style="display: none">
                        <h3>Thêm người dùng</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div style="width:100%; padding-left:20px">
                                <table id="tab">
                                    <tr>
                                        <th>Tên đăng nhập</th>
                                        <td><input type="text" name="username" value="<?= $_POST['username'] ?? '' ?>" required></td>
                                        <th>Điện thoại</th>
                                        <td><input type="text" name ="phone" value="<?= $_POST['phone'] ?? '' ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Mật khẩu</th>
                                        <td><input type="password" name="password" required></td>
                                        <th>Địa chỉ</th>
                                        <td><input type="text" name="address" value="<?= $_POST['address'] ?? '' ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td><input type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" required></td>
                                        <th>Date Of Birth</th>
                                        <td><input type="date" name="dob" value="<?= $_POST['dob'] ?? '' ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan=2>
                                        <?php 
                                            if(isset($err_log)) {
                                                echo $err_log;
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><button type="submit" name="submit" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button></td>
                                    </tr>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row text-center pad-top">
                        <div class="card-header"></div>
                        <div class="card-body">
                        <table id="myTable" class="table table-bordered table-dark">
                                <thead style="backgrousernd-color: rgba(0, 0, 0, 0.3);">
                                  <tr>
                                    <th scope="col" style="text-align: center;">ID</th>  
                                    <th scope="col" style="text-align: center;">Tên Đăng Nhập</th>               
                                    <th scope="col" style="text-align: center;">Họ Tên</th>            
                                    <th scope="col" style="text-align: center;">Số điện thoại</th>
                                    <th scope="col" style="text-align: center;">Email</th>   
                                    <th scope="col" style="text-align: center;">Role</th>
                                    <th scope="col" style="text-align: center; width:90px;">Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?= $user['id'] ?></td>
                                            <td><?= $user['username'] ?></td>
                                            <td><?= $user['name'] ?></td>
                                            <td><?= $user['phone'] ?></td>
                                            <td><?= $user['email'] ?></td>
                                            <td><?= $user['role'] == 0 ? 'User': 'Admin' ?></td>
                                            <td style="width:90px;"><a href="index.php?act=user_del&id=<?= $user['id'] ?>"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=user_edit&id=<?= $user['id'] ?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                      </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>