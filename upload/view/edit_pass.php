<section>
    <div class="content pa">
        <div class="left-siderbar ht">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?=$_SESSION['user'];?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
            <span style="font-size: 16px">Quản lý tài khoản</span>
            <ul>
                <li><a href="index.php?act=user">thông tin cá nhân</a></li>
                <li><a href="">tùy chọn thanh toán</a></li>
                <li><a href="">mã giảm giá</a></li>
            </ul>
            <span style="font-size: 16px">Đơn hàng của tôi</span>
            <ul>
                <li><a href="index.php?act=my_order">đơn hàng của tôi</a></li>
                <li><a href="?act=del_order">đơn hàng hủy</a></li>
                <li><a href="?act=viewed">sản phẩm đã xem</a></li>
            </ul>
        </div>
        <div class="right-siderbar">
            <p style="font-size: 20px">Thông tin cá nhân</p>
            <div class="wrapuser">
                <!--------------------------->
                <form action="index.php?act=edit_pass" method="post">
                    <div class="row-show">
                        <div class="show-info" style="height: 280px">
                            <div class="boxx">
                                <span>Mật khẩu cũ:</span><br>
                                <input type="password" name="password" id="password" required>
                            </div>
                            <div class="boxx">
                                <span>Mật khẩu mới:</span><br>
                                <input type="password" name="newpass" id="newpass" value="" required>
                            </div>
                            <div class="boxx">
                                <span>Xác nhận mật khẩu:</span><br>
                                <input type="password" name="confirm" value="" required>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(isset($err_log)){
                            echo $err_log;
                        }
                    ?>
                    <input class="btn-edit" name="submit" type="submit" value="ĐỔI MẬT KHẨU">
                </form>
                <!--------------------------->
            </div>
        </div>
    </div>
</section>

<script>
    function checkPass(pass1, pass2){
        if (pass1 == pass2) {
            return true;
        } else return false;
    }

    $('#newpass').focusout(function() {
        let pass1 = $('#password').val();
        let pass2 = $('#newpass').val();
        if (checkPass(pass1, pass2)) {
            alert("Mat khau moi trung mat khau cu");
        }
    });
</script>