    <section class="section2">
        <div class="form-transparent" style="height: 580px">
            <div class="form">
                <div class="sign-up">
                    <h2>ĐĂNG KÝ</h2>
                </div>
                <form action="index.php?act=register" method="post">
                    <label for="">Tên </label>
                    <input class="box" type="text" name="name" placeholder="Nhập họ tên" value="<?= $_POST['name'] ?? '' ?>" title="Tối thiểu 6 ký tự, không ký tự đặc biệt" autocomplete="off" required>
                    <label for="">Email</label>
                    <input class="box" type="email" name="email" placeholder="Nhập email" value="<?= $_POST['email'] ?? '' ?>" autocomplete="off" required>
                    <label for="">Tên Đăng Nhập</label>
                    <input class="box" type="text" name="username" placeholder="Tên đăng nhập" value="<?= $_POST['username'] ?? '' ?>" title="Tối thiểu 6 ký tự" autocomplete="off" required>
                    <label for="">Mật Khẩu</label>
                    <input class="box" type="password" name="password" id="password" placeholder="Nhập mật khẩu" title="Ít nhất 1 chữ hoa, 1 ký tự đặc biệt, tối thiểu 8 ký tự" autocomplete="off" required> 
                    <label for="">Xác Nhận Mật Khẩu</label>
                    <input class="box" type="password" name="confirm" placeholder="Xác nhận mật khẩu" autocomplete="off" required>
                    <input type="checkbox" name="agree" required> Tôi đồng ý với Điều khoản của Waka. <br><br>
                    <input class="submit" type="submit" name="submit" value="Đăng Ký" id="register-btn">
                    <h4 id="err_log" style='color: red'></h4>
                    <?php
                        if(isset($err_log)) {
                            echo "<h4 style='color: red'>$err_log</h4>";
                        }
                    ?>
                </form>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script>
    $(document).tooltip();
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