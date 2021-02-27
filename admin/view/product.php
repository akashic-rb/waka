<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Danh sách sản phẩm</h2>
                <hr />
            </div>
        </div>
        <div class="pad">
            <a id="add-btn" href=""><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> Sản phẩm mới</button></a>
            <div id="dialog-form" style="display: none">
                <h3>Thêm sản phẩm</h3>
                <form action="" method="post" enctype="multipart/form-data">
                    <div style="width:100%; padding-left:20px">
                        <table id="tab">
                            <tr>
                                <th>Tên Sản Phẩm</th>
                                <td><input type="text" name="name"></td>
                                <th>Danh mục</th>
                                <td>
                                    <select type="number" name="id_catalog" required>
                                        <option disabled selected>Chọn danh mục</option>
                                        <?php foreach($cates as $cate): ?>
                                        <option value="<?= $cate['id'] ?>"><?= $cate['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <th>Giá</th>
                                <td><input type="number" name="price" id="" value=""></td>
                            </tr>
                            <tr>
                                <th>Tác giả</th>
                                <td>
                                    <select type="number" name="id_author" required>
                                        <option disabled selected>Chọn Tác Giả</option>
                                        <?php foreach($authors as $auth): ?>
                                        <option value="<?= $auth['id'] ?>"><?= $auth['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <th>Lượt Xem</th>
                                <td><input type="number" name="view" value="0"></td>
                                <th>Nhà Xuất Bản</th>
                                <td>
                                    <select type="number" name="id_publisher" required>
                                        <option disabled selected>Chọn NXB</option>
                                        <?php foreach($publishers as $publisher): ?>
                                        <option value="<?= $publisher['id'] ?>"><?= $publisher['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Đánh giá</th>
                                <td> <input type="text" name="rating" value="0"></td>
                            </tr>
                            <tr>
                                <th>Ảnh sản phẩm</th>
                                <td colspan="4">
                                    <input type="file" name="new_image">
                                </td>
                            </tr>
                            <tr>
                                <th>Mô tả</th>
                                <td colspan="4"><textarea name="detail" id="" cols="60" rows="5"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button></td>
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
            <table id="tab_pro" class="table table-bordered table-dark">
                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                    <tr>
                        <th class="name">Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>View</th>
                        <th>Rating</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $p) {
                        echo '
                        <tr>              
                            <td class="name">'.$p['name'].'</td>                                  
                            <td><img src="../../upload/'.$p['image'].'" alt="" style="height: 80px; width=50px;"></td>
                            <td>'.number_format($p['price']).'</td>
                            <td>'.$p['view'].'</td>
                            <td>'.$p['rating'].'</td>
                            <td style="width:90px;"><a href="index.php?act=product_del&pid='.$p['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=product_edit&pid='.$p['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                        </tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <div id="zoom" style="border: 1px solid #bebebe; width: 300px; height: 500px; position: fixed; top: 100px; display: none; right: 500px">
        
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>