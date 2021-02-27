<section>
<div class="content pa">
        <div class="left-siderbar ht900" style="height: 1100px">
            <div class="check" id="author">
                <p>Tác giả</p>
                <?php foreach($authors as $author): ?>
                <label class="container"><?= ucwords($author['name']); ?>
                    <input type="checkbox" value="<?= $author['id']; ?>">
                    <span class="checkmark"></span>
                </label>
                <?php endforeach; ?>
            </div>
            <div class="check" id="publisher">
                <p>Nhà xuất bản</p>
                <?php foreach($publishers as $publisher): ?>
                <label class="container"><?= ucwords($publisher['name']); ?>
                    <input type="checkbox" value="<?= $publisher['id']; ?>">
                    <span class="checkmark"></span>
                </label>
                <?php endforeach; ?>
            </div>
            <div class="pri">
                <p>Giá</p>
                <form action="javascript:void(0);">
                    <input type="number" placeholder="Tối thiểu" id="min-price">
                    <input type="number" placeholder="Tối đa" id="max-price">
                    <input type="submit" value="Chọn" id="price">
                </form>
            </div>
            <div class="check" id="status">
                <p>Trạng thái</p>
                <label class="container">Hot nhất
                    <input type="checkbox" value="hot">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Mới nhất
                    <input type="checkbox" value="new">
                    <span class="checkmark"></span>
                </label>
                <label class="container">Bán chạy
                    <input type="checkbox" value="bestseller">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="check" id="rating">
                <p>Đánh giá</p>
                <label class="container">5 sao
                    <input type="checkbox" value="5">
                    <span class="checkmark"></span>
                </label>
                <label class="container">4 sao
                    <input type="checkbox" value="4">
                    <span class="checkmark"></span>
                </label>
                <label class="container">3 sao
                    <input type="checkbox" value="3">
                    <span class="checkmark"></span>
                </label>
                <label class="container">2 sao
                    <input type="checkbox" value="2">
                    <span class="checkmark"></span>
                </label>
                <label class="container">1 sao
                    <input type="checkbox" value="1">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="right-siderbar">
            <div class="wrap-header">
                <div class="card-title">
                    <h1>
                        <?php
                            if($category > 0){
                                echo $category['name'];
                            }
                            else{
                                echo "Sản Phẩm";
                            }
                        ?>
                    </h1>
                </div>
                <div class="filter">
                    Sắp xếp theo:
                    <select name="" id="price-sort">
                        <option value="0" selected disabled>Mua nhiều nhất</option>
                        <option value="1">Giá thấp nhất</option>
                        <option value="2">Giá cao nhất</option>
                    </select>
                </div>
            </div>
            <div class="row-book " id="books">
            <?php
            foreach ($products as $product) {
                $id = $product['id'];
                $name = $product['name'];
                $price = $product['price'];
                $img = $path_img.$product['image'];
                if(!is_file($img)){
                    $img = $filedefault;
                }
                $view = $product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view="mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                    <div class="book">
                        <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                        <a href="'.$link.'"><p class="name">'.$name.'</p></a>
                        <span class="view">'.$view.'</span>
                        <span class="price">'.number_format($price, 0,',','.') .' vnđ</span>
                        <form>
                            <input type="hidden" name="idpro" value="'.$id.'">
                            <input type="hidden" name="name" value="'.$name.'">
                            <input type="hidden" name="price" id="pri" value="'.$price.'">
                            <input type="hidden" name="img" value="'.$img.'">
                            <input type="button" name="submit" value="Thêm" class="addcart" onclick="addtocart(this)">
                        </form>   
                    </div>';
            }
            ?>
            </div>
            <script>
                // select on change value (1. giá thấp, 2. giá cao)
                function showSorted(books) {
                    $('#books').empty();
                    for(let book of books) {
                        $('#books').append(book);
                    }
                }
                $('#price-sort').change(function() {
                    let books = $('.book');
                    if(this.value == 1) {
                        for(let i = 1; i < books.length; i++) {
                            let current = books[i];
                            let j = i - 1;
                            while(j >= 0 && parseInt($(books[j]).find('#pri').val()) > parseInt($(current).find('#pri').val())) {
                                books[j + 1] = books[j];
                                j--;
                            }
                            books[j + 1] = current;
                        }
                        showSorted(books);
                    }
                    else if(this.value == 2) {
                        for(let i = 1; i < books.length; i++) {
                            let current = books[i];
                            let j = i - 1;
                            while(j >= 0 && parseInt($(books[j]).find('#pri').val()) < parseInt($(current).find('#pri').val())) {
                                books[j + 1] = books[j];
                                j--;
                            }
                            books[j + 1] = current;
                        }
                        showSorted(books);
                    }
                    else {
                        showSorted(original);
                    }
                });
            </script>
            <!-- AJAX request -->
            <script src="../view/js/filter.js"></script>
        </div>
    </div>
</section>