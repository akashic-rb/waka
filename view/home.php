<section>
    <div class="slideshow-container">

    <div class="mySlides fade">
        <img src="../view/img/bn7.jpg" style="width:100%">
        
    </div>  

    <div class="mySlides fade">
        <img src="../view/img/bn5.jpg" style="width:100%">
        
    </div>

    <div class="mySlides fade">
        <img src="../view/img/bn6.jpg" style="width:100%">
        
    </div>
    <div class="mySlides fade">
        <img src="../view/img/bn.jpg" style="width:100%">
        
    </div>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>

    <div class="content">
        <div class="left-siderbar">
            <p class="h2">DANH MỤC</p>
            <?php
                $category = new Category();
                $categories = $category->getList();
                foreach ($categories as $category) {
                    $link='index.php?act=product&idcategory='.$category['id'];
                    $num = 0;
                    foreach ($listProductById as $key => $value) {
                        if ($category['id'] == $value['id_category']) {
                            $num = $value['quantity'];
                        }
                    }
                    echo '<li><a href="'.$link.'">'.$category['name'].'</a><span style="float:right; color: grey">'.$num.'</span></li>';
                }
            ?>
        </div>
        <div class="right-siderbar" id="tabs">
            <div class="content-header">
                <a class="title" href="">Miễn phí hot</a>
                <ul class="content-header-nav">
                    <?php
                        foreach($menu_cate as $category){
                            echo '<li><a href="#tabs-'.$category['id'].'">'.$category['name'].'</a></li>';
                        }
                    ?>
                </ul>
            </div>
            <?php
                foreach($menu_cate as $category):
                echo '<div class="wrap-book" id="tabs-'.$category['id'].'">';
                    $prohots = $product->getByCategory($category['id']);
                    foreach ($prohots as $prod) {
                        $id = $prod['id'];
                        $price = $prod['price'];
                        $name = $prod['name'];
                        $img = $path_img.$prod['image'];
                        $rating = $prod['rating'];
                        $idauthor = $prod['id_author'];
                        $auth = $author->getAuthor($idauthor);
                        if(!is_file($img)){
                            $img = $filedefault;
                        }
                        $view=$prod['view'];
                        if($view>0){
                            $view.=" lượt xem";
                        }else{
                            $view="mới cập nhật";
                        }
                        $link="index.php?act=detailProduct&id=".$prod['id'];
                        echo '<div class="box-transparent">
                        <div class="book">
                            <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                            <div class="title">
                                <p><a href="'.$link.'">'.$name.'</a></p>
                                <div class="author">
                                    <p>'.$auth['name'].'</p>
                                    <p>'.$rating.' sao</p>
                                    <p>tóm tắt tuyển tập</p>
                                </div>
                            </div>
                            <div class="views">
                                '.$view.'
                            </div>
                            <form>
                                <input type="hidden" name="idpro" value="'.$id.'">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="price" value="'.$price.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <input type="button" name="submit" value="Thêm" class="add_cart" onclick="addtocart(this)">
                            </form> 
                        </div>
                    </div>';
                    }
            echo '</div>';
            endforeach;
        ?>
        </div>
        <script>
            $('#tabs').tabs();
        </script>
    </div>
</section>
<!-----------------calendar---------------->
<div class="wrap">
    <div class="left-wrap">
        <p class="txt">lịch phát hành</p>
        <p class="year"> 2020</p>
        <p class="month">tháng 6</p>
    </div>
    <div class="right-wrap">
        <div class="scrollbar" id="style">
            <div class="trans">
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
                <div class="box-calendar">
                    <div class="calendar">
                        <p class="week-day">thứ 2</p>
                        <p class="date">01/06</p>
                    </div>
                    <div class="txt-calendar">
                        <p class="name"><a href="">hành tẩu âm dương</a>
                        </p>
                        <p class="episode">tập 11</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-----------------calendar---------------->

<!-------------mới nhất trong tuần---------->
<section class="new-week">
    <div class="product">
        <p>Xem Nhiều Nhất</p>
    </div>
    <div class="row">   
        <?php
            foreach ($high_view_product as $product) {
                $name = $product['name'];
                $img = $path_img.$product['image'];

                $author_id = $product['id_author'];
                $auth = $author->getAuthor($author_id);

                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view=" mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                        <div class="card-book">
                            <div>
                                <a href="#"><img src="'.$img.'" alt=""></a>
                                <div class="txt">
                                    <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                    <p class="author"><a href="">'.$auth['name'].'</a></p>
                                    <p class="view">'.$view.'</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        ?>  
    </div>
</section>
<!-------------mới nhất trong tuần---------->

<!-----------------mới nhất---------------->
<section class="new-week">
    <div class="product">
        <p>sách mới nhất</p>
    </div>

    <div class="row">
        <?php
            foreach ($newest as $product) {
                $name=$product['name'];
                $img=$path_img.$product['image'];

                $author_id =$product['id_author'];
                $auth = $author->getAuthor($author_id);

                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view=" mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                        <div class="card-book">
                            <div>
                                <a href="#"><img src="'.$img.'" alt=""></a>
                                <div class="txt">
                                    <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                    <p class="author"><a href="">'.$auth['name'].'</a></p>
                                    <p class="view">'.$view.'</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        ?>
    </div>
</section>
<!-----------------mới nhất--------------->

<!-------------sách bán chạy nhất---------->
<section class="new-week">
    <div class="product">
        <p>sách được đánh giá cao nhất</p>
    </div>

    <div class="row">
        <?php
            foreach ($high_rating as $product) {
                $name = $product['name'];
                $img = $path_img.$product['image'];

                $author_id = $product['id_author'];
                $auth = $author->getAuthor($author_id);

                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view=" mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                        <div class="card-book">
                            <div>
                                <a href="#"><img src="'.$img.'" alt=""></a>
                                <div class="txt">
                                    <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                    <p class="author"><a href="">'.$auth['name'].'</a></p>
                                    <p class="view">'.$view.'</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        ?>
    </div>
</section>
<!-------------sách bán chạy nhất---------->