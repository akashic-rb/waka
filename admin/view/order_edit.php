        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Cập nhật đơn hàng #<?= $order['id'] ?></h2>
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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div style="width:100%; padding-left:20px">
                            <table id="tab">
                                <tr>
                                    <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                    <th>Người nhận</th>
                                    <td><input type="text" value="<?= $order['name'] ?>" disabled></td>
                                    <th>Ngày đặt hàng</th>
                                    <td><input type="text" value="<?= $order['date'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <th>Điện thoại</th>
                                    <td><input type="text" value="<?= $order['phone'] ?>" disabled></td>
                                    <th>Hình thức thanh toán</th>
                                    <td><input type="text" value="<?php 
                                            if ($order['payment'] == 1) {
                                                echo "Thanh toán tiền mặt khi nhận hàng";
                                            } else {
                                                echo "Chuyển khoản ngân hàng";
                                            }
                                        ?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><input type="text" value="<?= $order['email'] ?>" disabled></td>
                                </tr>
                                <tr>
                                    <th>Địa chỉ</th>
                                    <td><textarea disabled><?= $order['address'] ?></textarea></td>
                                </tr>
                                <tr>
                                    <th>Trạng thái</th>
                                    <td>
                                        <input type="hidden" id="status" value="<?= $order['role'] ?>">
                                        <select name="status" id="status-slct">
                                            <option value="1">Chờ xử lý</option>
                                            <option value="2">Đã xác nhận đơn hàng</option>
                                            <option value="3">Đã bàn giao vận chuyển</option>
                                            <option value="4">Đang vận chuyển</option>
                                            <option value="5">Đã giao</option>
                                        </select>
                                    </td>
                                    <script>
                                        let role = document.getElementById('status').value;
                                        let select = document.getElementById('status-slct');
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
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>