<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cập nhật thông tin sản phẩm</h2>
                <hr>
            </div>
        </div>
        <div class="row  pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                        <tr>
                            <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                            <th>Tên Sản Phẩm</th>
                            <td><input type="text" name="name" value="<?php echo $p['name'] ?>"></td>
                            <th>Giá</th>
                            <td><input type="number" name="price" value="<?php echo $p['price'] ?>"></td>
                            <th>Danh Mục</th>
                            <td>
                                <select type="number" name="id_catalog" required>
                                    <option disabled selected>Chọn danh mục</option>
                                    <?php 
                                        foreach($cates as $cate) {
                                            if($cate['id'] === $p['id_category']) 
                                                echo '<option value="'.$cate['id'].'" selected>'.$cate['name'].'</option>';
                                            else
                                                echo '<option value="'.$cate['id'].'">'.$cate['name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Tác giả</th>
                            <td>
                                <select type="number" name="id_author" required>
                                    <option disabled selected>Chọn Tác Giả</option>
                                    <?php 
                                        foreach($authors as $auth) {
                                            if($auth['id'] === $p['id_author']) 
                                                echo '<option value="'.$auth['id'].'" selected>'.$auth['name'].'</option>';
                                            else
                                                echo '<option value="'.$auth['id'].'">'.$auth['name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                            <th>Lượt xem</th>
                            <td><input type="number" name="view" id="" value="<?php echo $p['view'] ?>"></td>
                            <th>Nhà Xuất Bản</th>
                            <td>
                                <select type="number" name="id_publisher" required>
                                    <option disabled selected>Chọn NXB</option>
                                    <?php 
                                        foreach($publishers as $publisher) {
                                            if($publisher['id'] === $p['id_publisher']) 
                                                echo '<option value="'.$publisher['id'].'" selected>'.$publisher['name'].'</option>';
                                            else
                                                echo '<option value="'.$publisher['id'].'">'.$publisher['name'].'</option>';
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Đánh giá</th>
                            <td><input type="text" name="rating" value="<?php echo $p['rating'] ?>" required></td>
                        </tr>
                        <tr>
                            <th>Hình ảnh</th>
                            <td colspan="4">
                                <input type="file" name="new_image">
                            </td>
                        </tr>
                        <tr>
                            <th>Mô tả</th>
                            <td colspan="4"><textarea name="detail" id="" cols="60" rows="5"><?php echo $p['detail'] ?></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>