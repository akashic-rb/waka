<section class="section2">
        <div class="form-transparent" style="height: 580px">
            <div class="form">
                <div class="sign-up">
                    <h2>ĐĂNG KÝ</h2>
                </div>
                <form action="index.php?act=register" method="post">
                    <label for="">Tên </label>
                    <input class="box" type="text" name="name" placeholder="Nhập họ tên" value="<?= $_POST['name'] ?? '' ?>" required>
                    <label for="">Email</label>
                    <input class="box" type="email" name="email" placeholder="Nhập email" value="<?= $_POST['email'] ?? '' ?>" required>
                    <label for="">Tên Đăng Nhập</label>
                    <input class="box" type="text" name="username" placeholder="Tên đăng nhập" value="<?= $_POST['username'] ?? '' ?>" required>
                    <label for="">Mật Khẩu</label>
                    <input class="box" type="password" name="password" id="password" placeholder="Nhập mật khẩu" required> 
                    <label for="">Xác Nhận Mật Khẩu</label>
                    <input class="box" type="password" name="confirm" placeholder="Xác nhận mật khẩu" required>
                    <input type="checkbox" name="agree" required> Tôi đồng ý với Điều khoản của Waka. <br><br>
                    <input class="submit" type="submit" name="submit" value="Đăng Ký">
                    <?php
                        if(isset($err_log)) {
                            echo "<h4 style='color: red'>$err_log</h4>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </section>

    <script>
    function checkPass(pass1, pass2){
        if (pass1 == pass2) {
            return true;
        } else return false;
    }

    $('#re-pass').focusout(function() {
        let pass1 = $('#password').val();
        let pass2 = $('#re-pass').val();
        if (!checkPass(pass1, pass2)) {
            alert("Sai xac nhan mat khau!");
        }
    });
</script>