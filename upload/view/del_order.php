<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?= $_SESSION['user'] ?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
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
                <li><a href="?act=viewed">sản phẩm đã xem</a></li>
            </ul>
        </div>
        <div class="right-siderbar">            
            <div class="od" style="clear: both; padding-top: 20px;">
                <p style="font-size: 20px;">Đơn hàng đã hủy</p>
                <h6 style="color: red">* Đơn hàng sẽ tự động xóa bỏ sau 30 ngày hoặc có trên 20 đơn hàng đã hủy</h6>
                <table style="width:100%;text-align: left;">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                    </tr>
                <?php 
                    echo '';
                    if(count($orders) > 0) {
                        foreach($orders as $order) {
                            echo '<tr>
                            <td>'.$order['id'].'</td>
                            <td>'.$order['quantity'].'</td>
                            <td>'.number_format($order['total']).' vnđ</td>
                            <td>'.$order['date'].'</td>
                        </tr>';
                        }
                    }
                    else {
                        echo '<td style=""><h3>Bạn không có đơn hàng đã hủy nào</h3></td>';
                    }
                    ?>
                </table>;
            </div>
        </div>
    </div>
</section>