<section class="section2">
    <div class="form-transparent">
        <div class="form">
            <div class="sign-up">
                <h2>ĐĂNG NHẬP</h2>
            </div>
            <form action="index.php?act=login" method="post">

                <label for="">Tên Đăng Nhập</label>
                <input class="box" type="text" name="user" placeholder="Tên đăng nhập">

                <label for="">Mật Khẩu</label>
                <input class="box" type="password" name="pass" placeholder="Nhập mật khẩu">
                <br><br>
                <a class="" href="">Quên mật khẩu</a> 
                <br><br>
                <input class="submit" type="submit" name="login" value="Đăng Nhập">
            </form>
            <?php
                if(isset($err_log)) {
                    echo '<h4 style="color:red">'.$err_log.'</h4>';
                }
            ?>
        </div>
    </div>
</section>