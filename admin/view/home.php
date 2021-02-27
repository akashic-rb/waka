        <div id="page-wrapper">
            <div id="page-inner">
            <div class="row">
                <div class="col-lg-12 bg-secondary">
                    <h2>Dashboard</h2>
                    <hr>
                </div>
            </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>Đơn hàng mới</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Tỷ lệ thoát</p>
                            </div>
                        <div class="icon">
                            <i class="fas fa-signal"></i>
                        </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>Tài khoản mới</p>
                            </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>65</h3>

                                <p>Số lương truy cập</p>
                            </div>
                        <div class="icon">
                        <i class="fas fa-chart-pie"></i>
                        </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div> 
                <div class="row" style="display: flex; flex-direction: row; justify-content: center; margin-top: 20px">
                    <div class="flex-table">
                        <h4 class="title"><strong>Doanh thu theo tháng của <?= date('Y') ?></strong></h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tháng</th>
                                <th>Doanh thu</th>
                                <th>Đơn hàng</th>
                            </tr>
                            <?php foreach($month_incomes as $income): ?>
                            <tr>
                                <td><?= $income['month'] ?></td>
                                <td><?= number_format($income['total']) ?></td>
                                <td><?= $income['order'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="flex-table">
                        <h4 class="title"><strong>Doanh thu các năm</strong></h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Tháng</th>
                                <th>Tổng</th>
                                <th>Đơn hàng</th>
                            </tr>
                            <?php foreach($year_incomes as $income): ?>
                            <tr>
                                <td><?= $income['year'] ?></td>
                                <td><?= number_format($income['total']) ?></td>
                                <td><?= $income['order'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
                <div class="row" style="display: flex; flex-direction: row; justify-content: center; margin-top: 20px">
                    <div class="flex-table">
                        <h4 class="title"><strong>Sản phẩm bán chạy</strong></h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Sản phẩm</th>
                                <th>Số lượng đã bán</th>
                            </tr>
                            <?php foreach($bestsellers as $bestseller): ?>
                            <tr>
                                <td><?= $bestseller['id'] ?></td>
                                <td><?= $bestseller['name'] ?></td>
                                <td><?= $bestseller['sold'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <div class="flex-table">
                        <h4 class="title"><strong>Hàng tồn kho</strong></h4>
                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                            </tr>
                            <?php foreach($products as $product): ?>
                            <tr>
                                <td><?= $product['id'] ?></td>
                                <td><a href="?act=product_edit&pid=<?= $product['id'] ?>"><?= $product['name'] ?></a></td>
                                <td><?= $product['quantity'] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>