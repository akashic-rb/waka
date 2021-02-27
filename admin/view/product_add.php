<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Thêm sản phẩm mới</h2>
                <hr/>
            </div>
        </div>
        <div class="row  pad-top">
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
</div>