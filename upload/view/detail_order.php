<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?=$_SESSION['user']?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
            <span style="font-size: 16px">Quản lý tài khoản</span>
            <ul>
                <li><a href="index.php?act=user">thông tin cá nhân</a></li>
                <li><a href="">tùy chọn thanh toán</a></li>
                <li><a href="index.php?act=sale">mã giảm giá</a></li>
            </ul>
            <span style="font-size: 16px">Đơn hàng của tôi</span>
            <ul>
                <li><a href="index.php?act=my_order">đơn hàng của tôi</a></li>
                <li><a href="">đơn hàng hủy</a></li>
                <li><a href="">sản phẩm đã xem</a></li>
            </ul>
        </div>
        <div class="right-siderbar">
            <div class="od" style="clear: both; padding-top: 20px;">
                <p style="font-size: 20px;">Thông tin khách hàng</p>
                <div style="display: flex; flex-direction: row; justify-content: space-between">
                    <div class="order-info">
                        <p>
                            <strong><?= $order['name'] ?></strong>
                        </p>
                        <p>
                            <strong>Địa chỉ: </strong>
                            <?= $order['address'] ?>
                        </p>
                        <p>
                            <strong>Điện thoại: </strong>
                            <?= $order['phone'] ?>
                        </p>
                    </div>
                    <div class="order-info">
                        <p><strong>Ngày đặt hàng: </strong></p>
                        <?php 
                            $date = date_create($order['date']);
                            echo date_format($date, "d/m/Y H:i");
                        ?>
                    </div>
                    <div class="order-info">
                        <p>
                            <p><strong>Hình thức thanh toán: </strong></p>
                            <?php 
                                if ($order['payment'] == 1) {
                                    echo "Thanh toán tiền mặt khi nhận hàng";
                                } else {
                                    echo "Chuyển khoản ngân hàng";
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <p style="font-size: 20px;">Thông tin sản phẩm</p>
                <table style="width:100%;text-align: left;">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>                  
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php foreach($products as $product): ?>
                        <?php $_SESSION['total'] = $product['total'];
                            $_SESSION['status'] = $product['status'];
                        ?>
                        <tr>
                            <td><a href="?act=detailProduct&id=<?=$product['id']?>"><?= ucfirst($product['name']) ?></a></td>
                            <td><img style="width: 50px; height:80px; object-fit: cover;" src="../upload/<?= $product['image'] ?>"></td>
                            <td><?= number_format($product['price']) ?> vnđ</td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= number_format($product['price'] * $product['quantity']) ?> vnđ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan=3></td>
                        <td>Tổng tiền thanh toán</td>
                        <td><?= number_format($_SESSION['total'] ?? '') ?> vnđ</td>
                    </tr>
                </table>
                    <?php if($_SESSION['status'] == 1): ?>
                        <div style="width: 100%; text-align: center"><input type=button value="Hủy đơn hàng" id="cancel"></div>
                    <?php endif; ?>
                <script>
                    $('#cancel').click(function() {
                        let confirm = window.confirm("Xác nhận hủy đơn hàng");
                        if(confirm) {
                            window.location.href = "?act=del_order&id=<?= $_GET['id'] ?>";
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</section>