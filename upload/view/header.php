
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waka</title>
    <link rel="stylesheet" href="../view/css/style.css">
    <script src="../view/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" href="../view/img/lg.ico" type="image/x-icon">
    <script>
        $(function() {
            $("#boxuser").hide();
            $("#btnuser").click(function(e) {
                // e.preventDefault();
                $("#boxuser").show();
            });
            $("#boxuser").mouseover(function() {
                $("#boxuser").show();
            });

            $("#boxuser").mouseout(function() {
                $("#boxuser").hide();
            });
        });
    </script>
</head>
<body>
    <header>
        <div class="top-menu" id="myheader">
            <div class="logo" id="mylogo">
                <a href="index.php"><img src="../view/img/logo.png" alt=""></a>
            </div>
            <form action="index.php?act=search" method="post">
                <input class="search" type="text" name="keyword" placeholder="Nhập tên sách, tuyên tập, tác giả...">
                <input type="submit" class="btn" name="" value="tìm kiếm">
            </form>
            <div class="wrap-login">
                <?php
                    if(isset($_SESSION['id'])){
                        echo '
                        <div class="user" id="btnuser">
                            <i class="fas fa-user-cog"></i>
                            <span>'.$_SESSION['user'].'</span>
                            <div class="profile" id="boxuser">
                                <div class="pro">
                                    <div class="user-img">
                                        <img src="../view/img/img1.jpg" alt="">
                                    </div>
                                    <div class="user-name">
                                        <p>'.$_SESSION['user'].'</p>
                                        <a href="index.php?act=user">Xem trang cá nhân</a>
                                    </div>
                                </div>
                                <div class="order">
                                    <li><a href="index.php?act=my_order">Đơn hàng đã đặt</a></li>
                                    <li><a href="?act=del_order">Đơn hàng đã hủy</a></li>
                                    <li><a href="?act=viewed">Sản phẩm đã xem</a></li>
                                </div>
                                <div class="feedback">
                                    <a href="">Đóng góp ý kiến</a>
                                    <p>Góp phần cải thiện website</p>
                                </div>
                                <button class="logout"><i class="fas fa-sign-out-alt"></i><a href="index.php?act=logout"> Đăng xuất</a></button>
                            </div>
                        </div>
                            <button class="cart" id="cart"><i class="fas fa-cart-plus"></i><a href="index.php?act=viewcart"> Giỏ Hàng <span id="countcart"></span></a></button>
                        ';                        
                    }else{
                ?>
                <button class="login"><a href="index.php?act=login">đăng nhập</a></button>
                <button class="register"><a href="index.php?act=register">đăng ký</a></button>
                    <?php }
                
                ?>
            </div>
        </div>
        <div class="bot-menu">
            <li><a href="index.php">trang chủ</a></li>
            <li><a href="index.php?act=product">sản phẩm</a></li>
            <li><a href="index.php?act=about">giới thiệu</a></li>
            <li><a href="index.php?act=contact">liên hệ</a></li>
            <li><a href="index.php?act=news">tin tức</a></li>
        </div>
    </header>
   