<section>
    <div class="wrap-header">
        <div class="card-title">
            <h1>
                kết quả tìm kiếm với từ khóa: 
                <?php
                    if(isset($listsearch) && ($listsearch!='')){
                        echo $_POST['keyword'];
                    }
                ?>
            </h1>
        </div>
        <div class="wrap-nav">
        <?php
            
        ?>
        </div>
    </div>
    <div class="row-book">
        <?php
        if($listsearch){
            foreach ($listsearch as $product) {
                $name=$product['name'];
                $price=$product['price'];
                $img=$path_img.$product['image'];
                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
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
                    <button><a href="">Thêm <i class="fas fa-cart-plus"></i></a></button>
                </div>';
            }
        }else{
            echo 'Not Found Data';
        }
        ?>
    </div>
</section>