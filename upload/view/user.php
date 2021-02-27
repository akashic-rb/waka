<section>
        <div class="content pa">
            <div class="left-siderbar ht660">
                <p style="color: #1ba085; font-size: 16px">Xin chào <?=$_SESSION['user'];?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
                <span style="font-size: 16px">Quản lý tài khoản</span>
                <ul>
                    <li><a href="index.php?act=user">thông tin cá nhân</a></li>
                    <li><a href="">tùy chọn thanh toán</a></li>
                    <li><a href="index.php?act=sale">mã giảm giá</a></li>
                </ul>
                <span style="font-size: 16px">Đơn hàng của tôi</span>
                <ul>
                    <li><a href="index.php?act=my_order">đơn hàng của tôi</a></li>
                    <li><a href="?act=del_order">đơn hàng hủy</a></li>
                    <li><a href="?act=viewed">sản phẩm đã xem</a></li>
                </ul>
            </div>

            <div class="right-siderbar">
                <div id="edprofi" class="box-profi-left city">
                    <p style="font-size: 20px;">Quản Lý tài khoản</p>
                    <div class="profi">
                        <span style="font-size:16px;">Thông tin cá nhân |</span> <a style="font-size: 12px;" href="index.php?act=edit_user">Chỉnh sửa</a>
                        <p><span class="txtt">Tên:</span> <?= $user['name']; ?></p>
                        <p><span class="txtt">Ngày sinh:</span> <?= $user['dob']; ?></p>
                        <p><span class="txtt">Giới tính:</span> <?php if($user['gender'] == 1) echo 'Nam'; elseif($user['gender'] == 2) echo 'Nữ'; else echo 'Không xác định'; ?></p>
                        <p><span class="txtt">Email:</span> <?= $user['email']; ?></p>
                    </div>
                </div>
                <div class="box-profi-right">
                    <p style="font-size: 20px;">Địa chỉ</p>
                    <div class="profi">
                        <span style="font-size:16px;">Thông tin nhận hàng |</span> <a style="font-size: 12px;" href="index.php?act=edit_user">Chỉnh sửa</a>
                        <p><span class="txtt">Số điện thoại:</span> <?= $user['phone']; ?></p>
                        <p><span class="txtt">Địa chỉ:</span> <?= $user['address']; ?></p>
                    </div>
                </div>
                <div class="od" style="clear: both; padding-top: 20px;">
                    <p style="font-size: 20px;">Đơn hàng gần đây</p>
                    <table style="width:100%;text-align: left;">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                            <th></th>
                        </tr>
                        <?php if(empty($orders)):
                            echo '<td><h3>Bạn chưa mua sản phẩm nào</h3></td>';
                        else:
                            foreach($orders as $order):
                        ?>
                        <tr>
                            <td><?= $order['id'] ?? 'NLCB09193'; ?></td>
                            <td><?= $order['date'] ?? '69/69/6969'; ?></td>
                            <td><?= $order['quantity'] ?? '69'; ?></td>
                            <td><?= number_format($order['total'] ?? '696900'); ?> vnđ</td>
                            <td><?= $order['status'] ?? 'Đã giao'; ?></td>
                            <td><a href="">chi tiết</a></td>
                        </tr>
                        <?php
                            endforeach;
                        endif; 
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </section>