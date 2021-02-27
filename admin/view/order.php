<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Đơn hàng</h2>
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
                <table id="myTable" class="table table-bordered table-dark">
                    <thead style="background-color: rgba(0, 0, 0, 0.3);">
                        <tr>
                            <th scope="col" style="text-align: center;">Order ID</th>
                            <th scope="col" style="text-align: center;">Người Nhận</th>
                            <th scope="col" style="text-align: center;">Điện thoại</th>
                            <th scope="col" style="text-align: center;">Số lượng</th>
                            <th scope="col" style="text-align: center;">Tổng tiền</th>
                            <th scope="col" style="text-align: center;">Status</th>
                            <th scope="col" style="text-align: center;">Ngày đặt</th>
                            <th scope="col" style="text-align: center;">Thanh toán</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach($orders as $order) {    
                            if ($order['payment'] == 1) {
                                $payment = "Tiền mặt";
                            } else {
                                $payment = "Thanh toán online";
                            }
                    ?>
                            <tr>
                                <td><a href="index.php?act=order_detail&order_id=<?= $order['id']; ?>"> <?= $order['id']; ?></a></td>
                                <td> <?= $order['name']; ?></td>
                                <td><?= $order['phone']; ?></td>
                                <td><?= $order['quantity']; ?></td>
                                <td><?= number_format($order['total']) ?></td>
                                <td><?php switch($order['status']) {
                                case 1:
                                    echo 'Chờ xử lý';
                                break;
                                case 2:
                                    echo 'Đã xác nhận đơn hàng';
                                break;
                                case 3:
                                    echo 'Đã bàn giao vận chuyển';
                                break;
                                case 4:
                                    echo 'Đang vận chuyển';
                                break;
                                case 5:
                                    echo 'Đã giao';
                                break;
                            } ?></td>
                                <td><?= $order['date']; ?></td>
                                <td><?= $payment; ?></td>
                                <td><a href="index.php?act=order_del&order_id=<?= $order['id']; ?>"><i class="fa fa-eraser" style="font-size:24px"></i></a>|<a href="index.php?act=order_edit&order_id=<?= $order['id']; ?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                            </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>