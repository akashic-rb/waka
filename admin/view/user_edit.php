<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cập nhật thông tin người dùng</h2>
                <hr>
            </div>
        </div>
        <div class="row pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                        <tr>
                            <input type="hidden" name="id" id="" value="<?= $user['id'] ?>">
                            <th>User</th>
                            <td><input type="text" value="<?= $user['username'] ?>" disabled></td>
                            <th>Điện thoại</th>
                            <td><input type="text" value="<?php echo $user['phone'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><input type="text" value="<?= $user['name'] ?>" disabled></td>
                            <th>Địa chỉ</th>
                            <td><input type="text" value="<?php echo $user['address'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Date Of Birth</th>
                            <td><input type="text" value="<?= $user['dob'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><input type="text" value="<?php echo $user['email'] ?>" disabled></td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>
                                <input type="hidden" id="role" value="<?= $user['role'] ?>">
                                <select name="role" id="role-slct">
                                    <option value="0">Người dùng</option>
                                    <option value="1">Admin</option>
                                </select>
                            </td>
                            <script>
                                let role = document.getElementById('role').value;
                                let select = document.getElementById('role-slct');
                                for(node of select.childNodes) {
                                    if(node.value == role) {
                                        node.setAttribute("selected", "selected");
                                    }
                                }
                            </script>
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