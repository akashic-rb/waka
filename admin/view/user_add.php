<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thêm người dùng</h2>
                <hr>
            </div>
        </div>
        <div class="row pad-top">
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
</div>