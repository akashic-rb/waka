<?php
    session_start();
    // cookies
    if(isset($_COOKIE['user'])) {
        setcookie('user', $_COOKIE['user'], time() + (86400 * 10), '/');
        setcookie('id', $_COOKIE['id'], time() + (86400 * 10), '/');
        $_SESSION['id'] = $_COOKIE['id'];
        $_SESSION['user'] = $_COOKIE['user'];
    };
    // set cookies
    if(isset($_SESSION['user'])) {
        setcookie('user', $_SESSION['user'], time() + (86400 * 10), '/');
        setcookie('id', $_SESSION['id'], time() + (86400 * 10), '/');
    }

    include "../model/connect.php";
    include "../model/category.php";
    include "../model/product.php";
    include "../model/user.php";
    include "../model/author.php";
    include "../model/publisher.php";
    include "../model/order.php";
    include "../model/order_detail.php";
    include "../model/comment.php";
    include "../view/global.php"; 
    include "../view/header.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch($act){
            case 'search':
                if(isset($_POST['keyword']) && ($_POST['keyword']!='')){
                    $listsearch = showsearch($_POST['keyword']);
                    include '../view/search.php';
                }
                break;

            case 'viewcart':
                if(empty($_SESSION['cart'])){
                    echo '<script>alert("Đơn hàng trống. Vui lòng thêm hàng vào giỏ!");
                    window.location.href = "?act=product"</script>';
                }
                $user = new User();
                $user = $user->getUser($_SESSION['id']);
                if (isset($_POST['submit'])) {
                    $user_id = $_SESSION['id'];
                    $name = $_POST['u_name'];
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $total = $_POST['total'];
                    $quantity = $_POST['quantity'];
                    $payment = $_POST['payment'];
                    $order = new Order($user_id, $name, $phone, $email, $address, $total, $quantity, $payment);
                    $order_id = $order->add();
                    $result = false;
                    foreach ($_SESSION['cart'] as $product) {
                        // product array 0 id, 1 name, 2 unit price, 3 image, 4 quantity
                        $product_id = $product[0];
                        $quantity = $product[4];
                        $product = new Product();
                        $product->subQuantity($product_id, $quantity);
                        $order_detail = new OrderDetail($order_id, $product_id, $quantity);
                        $result = $order_detail->add();
                    }
                    if($result) {
                        unset($_SESSION['cart']);
                        echo '<script type="text/javascript">
                        alert("Đã tạo đơn hàng");
                        window.location.href = "?act=my_order";
                        sessionStorage.clear();
                        </script>';
                    }
                }
                include '../view/viewcart.php';
                break;
                
            case 'product':
                if(isset($_GET['idcatalog']))
                    $cate_id = $_GET['idcatalog'];
                else
                    $cate_id = 0;
                $category = new Category();
                $author = new Author();
                $product = new Product();
                $publisher = new Publisher();

                $category = $category->getInstance($cate_id);
                $products = $product->getList();
                $authors = $author->getList();
                $publishers = $publisher->getList();
                include "../view/product.php";
                break;

            case 'about':
                include "../view/about.php";
                break;

            case 'login':
                if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
                    header('location: index.php');
                }
                if (isset($_POST['login'])) {
                    $username = $_POST['user'];
                    $password = $_POST['pass'];
                    if(!empty($username) && !empty($password)) {
                        $user = new User();
                        $result = $user->login($username, $password);
                        if(is_array($result)) {
                            $_SESSION['user'] = $result['name'];
                            $_SESSION['id'] = $result['id'];
                            header('location: index.php');
                        }
                        else
                            $err_log = 'Tên đăng nhập hoặc mật khẩu không chính xác';
                    }
                    else 
                        $err_log = "Vui lòng điền tên đăng nhập và mật khẩu";
                }
                include "../view/login.php";
                break;

            case 'user':
                $user = new User();
                $user = $user->getUser($_SESSION['id']);
                // $orders = get_limit_orders($_SESSION['id'], 5);
                include "../view/user.php";
                break;

            case 'edit_pass':
                if (isset($_POST['submit'])) {
                    $user_id = $_SESSION['id'];
                    $old_pass = $_POST['password'];
                    $new_pass = $_POST['newpass'];
                    $confirm = $_POST['confirm'];
                    $user = new User();
                    if(!$user->verifyPass($user_id, $old_pass))
                        $err_log = '<h4 style="margin: 0 20px; color:red">Mật khẩu cũ không đúng</h4>';
                    elseif($new_pass != $confirm)
                        $err_log = '<h4 style="margin: 0 20px; color:red">Xác nhận mật khẩu không trùng</h4>';
                    else {
                        $result = $user->updatePassword($user_id, $new_pass);
                        if($result)
                            $err_log = '<h4 style="margin: 0 20px; color:green">Đã đổi mật khẩu</h4>';
                        else
                            $err_log = '<h4 style="margin: 0 20px; color:red">Đã có lỗi xảy ra</h4>';
                    }
                }
                include "../view/edit_pass.php";
                break;

            case 'edit_user':
                // lấy thông tin user
                $userObj = new User();
                $user = $userObj->getUser($_SESSION['id']);
                if(isset($_POST['submit'])) {
                    // Đọc thông tin mới từ Form để update
                    $user_id = $_SESSION['id'];
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $dob = $_POST['date'];
                    $gender = $_POST['gender'] ?? 0;
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        if(preg_match(PHONE_REGEX, $phone)) {
                            $result = $userObj->update($user_id, $name, $email, $phone, $address, $dob, $gender);
                            if($result)
                                $err_log = '<h4 style="margin: 0 20px; color: green">Đã cập nhật thông tin</h4>';
                            else
                                echo '<script>alert("Đã có lỗi xảy ra, vui lòng thử lại sau")</script>';
                        }
                        else
                            $err_log = '<h4 style="margin: 0 20px; color: red">Điện thoại không hợp lệ</h4>';
                    }
                    else
                        $err_log = '<h4 style="margin: 0 20px; color: red">Email không hợp lệ</h4>';
                }
                include "../view/edit_user.php";
                break;

            case 'my_order':
                $order = new Order();
                $orders = $order->getList($_SESSION['id']);
                include "../view/my_order.php";
                break;

            case 'logout':
                if(isset($_SESSION['id'])) {
                    unset($_SESSION['id']);
                    unset($_SESSION['user']);
                    setcookie('user', '', time() - 1, '/');
                    setcookie('id', '', time() - 1, '/');
                }
                header('Location: index.php');
                break;

            case 'register':
                if(isset($_SESSION['id']) && !empty($_SESSION['id']))
                    header('location: index.php');
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    if($password === $_POST['confirm']) {
                        $user = new User();
                        // result = false if username already existed
                        $result = $user->register($name, $username, $password, $email);
                        if($result){
                            echo '<script>
                            alert(`Đã tạo tài khoản, vui lòng đăng nhập`);
                            window.location.href = "?act=login";
                            </script>';
                        }
                        else
                            $err_log = "Tài khoản đã tồn tại";
                    }
                    else
                        $err_log = "Xác nhận mật khẩu không trùng";
                }
                include_once "../view/register.php";
                break;
                
            case 'del_order':
                $order = new Order();
                if(isset($_GET['id']) & !empty($_GET['id'])) {
                    $order->cancel($_GET['id']);
                }
                $orders = $order->getCancelOrders($_SESSION['id']);
                include "../view/del_order.php";
                break;

            case 'detail_order':
                $order_detail = new OrderDetail();
                $order = new Order();
                if(isset($_GET['id'])) {
                    $order = $order->getInstance($_GET['id']);
                    $products = $order_detail->getList($_GET['id']);
                    include "../view/detail_order.php";
                }
                else {
                    echo '<h1>Đơn hàng không tồn tại</h1>';
                }
                break;

            case 'detailProduct':
                if(isset($_GET['id']) && (!empty($_GET['id']))){        
                    $id = $_GET['id'];
                    $product = new Product();
                    $authorObj = new Author();
                    $publisher = new Publisher();
                    $category = new Category();
                    $comment = new Comment();
                    $recommends = $product->getLimit(6);
                    $product = $product->getProductDetail($id);
                    $category3  = $category->getLimit(6);
                    $comments = $comment->getCommentByProductId($id);
                    include "../view/detailProduct.php";
                }
                else {
                    include "../view/home.php";
                } 
                break;
            default:
            // NOTE: 404 page
            $listProductById = $product->getQuantityByCategory();
            include "../view/home.php";
        }
    }
    else{
        $category = new Category();
        $product = new Product();
        $author = new Author();
        $menu_cate = $category->getLimit(6);
        $high_view_product = $product->getHighView(6);
        $newest = $product->getNewest(6);
        $high_rating = $product->getHighRate(6);
        $listProductById = $product->getQuantityByCategory();
        include "../view/home.php";
    }
    include "../view/footer.php";
?>