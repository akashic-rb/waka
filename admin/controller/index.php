<?php
    session_start();
    // user folder files
    include "../../model/connect.php";
    include "../../model/product.php";
    include "../../model/category.php";
    include "../../model/publisher.php";
    include "../../model/author.php";
    include "../../model/user.php";
    include "../../model/order.php";
    include "../../model/order_detail.php";
    include "../../model/comment.php";
    //admin folder files inherits user and extends itself for CUD
    include "../view/global.php"; 
    include "../view/header.php";
    include "../view/menu.php";
    // 
    $product = new Product();
    $category = new Category();
    $publisher = new Publisher();
    $author = new Author();
    
    // if (!isset($_SESSION['admin'])) {
        //     header('location: ../../index.php');
        // } else {
            if(isset($_GET['act'])){
                $act = $_GET['act'];
            switch($act){
                case 'user':
                    $user = new User();
                    $users = $user->getUsers();
                    include "../view/user.php";
                    break;

                case 'add_user':
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $user = new User();
                        // result = false if username already existed
                        $result = $user->register($name, $username, $password, $email);
                        if($result)
                            header('Location: ?act=user');
                        else
                            $err_log = '<h5 style="color:red">Tài khoản đã tồn tại<h5>';
                    }
                    include "../view/user_add.php";
                    break;

                case 'user_del':
                    $user = new User();
                    $result = $user->delete($_GET['id']);
                    if($result)
                        header('location: index.php?act=user');
                    else
                        echo 'Người dùng không tồn tại';
                    break;

                case 'user_edit':
                    $userObj = new User();
                    $user = $userObj->getUser($_GET['id']);
                    if (isset($_POST['submit'])) {
                        $id = $_POST['id'];
                        $role = $_POST['role'];
                        echo $role;
                        $result = $userObj->updateRole($id, $role);
                        if ($result)
                            $err_log = '<h4 style="color: green">Đã cập nhật thông tin user</h4>';
                        else 
                            $err_log = '<h4 style="color: red">Đã có lỗi xảy, thử lại sau</h4>';
                    }
                    include "../view/user_edit.php";
                    break;

                case 'category':
                    $categories = $category->getList();
                    include "../view/category.php";
                    break;
                    
                case 'del_category':
                    $cid = $_GET['cid'];
                    $result = $category->delCategory($cid);
                    if($result)
                        echo '
                            <script type="text/javascript">
                            alert("Đã xóa danh mục");
                            window.location.href = "?act=category";
                            </script>
                        ';
                    break;
    
                case 'edit_category':
                    $id = $_GET['cid'];
                    $cat = $category->getInstance($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = $category->editInstance($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật danh mục");
                            window.location.href = "index.php?act=category";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Đã có lỗi xảy ra!");
                            window.location.href = "index.php?act=category";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_edit.php";
                    break;
                case 'add_category':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $category = new Category($name);
                        $result = $category->setInstance();
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã tạo danh mục mới!");
                            window.location.href = "index.php?act=category";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được danh mục mới!");
                            window.location.href = "index.php?act=category";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_add.php";
                    break;

                case 'product':
                    $products = $product->getList();
                    include "../view/product.php";
                    break;

                case 'product_del':
                    $id = $_GET['pid'];
                    $result = $product->delProduct($id);
                    if($result)
                        header('location: index.php?act=product');
                    break;
    
                case 'product_edit':
                    $id = $_GET['pid'];
                    $p = $product->getProductDetail($id);    
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $id_catalog = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                        $rating = $_POST['rating'];
                        $hot = $_POST['hot'];
                        $bestseller = $_POST['bestseller'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image = $p['image'];
                        $result = $product->editProduct($id, $id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $rating, $hot, $bestseller, $new);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật sản phẩm thành công!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    $cates = $category->getList();
                    $authors = $author->getList();
                    $publishers = $publisher->getList();
                    include "../view/product_edit.php";
                    break;
                case 'add_product':
                    if (isset($_POST['Save'])) {
                        $cate_id = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $author_id = $_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                        $publisher_id = $_POST['id_publisher'];
                        $rating = $_POST['rating'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image = NULL;
                        $product = new Product($name, $price, $cate_id, $new_image,  $author_id,  $detail, $view, $publisher_id, $rating);
                        $result = $product->addProduct();
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã tạo sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    $cates = $category->getList();
                    $authors = $author->getList();
                    $publishers = $publisher->getList();
                    include "../view/product_add.php";
                    break;
                case 'author':
                    $authors = $author->getList();
                    include "../view/author.php";
                    break;
                case 'del_author':
                    $id = $_GET['auid'];
                    delAuthor($id);
                    header('location: index.php?act=author');
                    break;
                case 'author_edit':
                    $id = $_GET['auid'];
                    $a = getAuthor($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = updateAuthor($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật thông tin tác giả thành công!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_edit.php";
                    break;
                case 'author_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $result = $author->add($name);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã thêm tác giả mới!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được tác giả mới!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_add.php";
                    break;
                case 'publisher':
                    $publisher = allPublishers();
                    include "../view/publisher.php";
                    break;
                case 'publisher_del':
                    $id = $_GET['pid'];
                    delPublisher($id);
                    header('location: index.php?act=publisher');
                    break;
                case 'publisher_edit':
                    $id = $_GET['pid'];
                    $p = getPublisher($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = updatePublisher($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật NXB thành công!");
                            window.location.href = "index.php?act=publisher";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=publisher";
                                </script>
                            ';
                        }
                    }
                    include "../view/publisher_edit.php";
                    break;
                case 'publisher_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $result = addPublisher($name);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã thêm NXB mới!");
                            window.location.href = "index.php?act=publisher";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được NXB mới!");
                            window.location.href = "index.php?act=publisher";
                                </script>
                            ';
                        }
                    }
                    include "../view/publisher_add.php";
                    break;
                
                case 'order':
                    $order = new Order();
                    $orders = $order->getAll();
                    include "../view/order.php";
                    break;

                case 'order_del':
                    $id = $_GET['order_id'];
                    delOrder($id);
                    header('location: index.php?act=order');
                    break;

                case 'order_edit':
                    $detail = new OrderDetail();
                    $orderObj = new Order();
                    $id = $_GET['order_id'];
                    $order = $orderObj->getInstance($id);
                    // $detail = $detail->getInstance($id);
                    if (isset($_POST['submit'])) {
                        $status = $_POST['status'];
                        $id = $_POST['id'];
                        $result = $orderObj->updateStatus($id, $status);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật đơn hàng thành công!");
                            window.location.href = "index.php?act=order";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=order";
                                </script>
                            ';
                        }
                    }
                    include "../view/order_edit.php";
                    break;
                
                case 'order_detail':
                    $id = $_GET['order_id'];
                    $list_order = getOrderDetail($id);
                    $list_product = orderDetailProduct($id);
                    include "../view/order_detail.php";
                    break;
                case 'comment':
                    $comment = new Comment();
                    $comments = $comment->getComments();
                    include '../view/comment.php';
                    break;
                case 'comment_del':
                    $comment = new Comment();
                    $cmt_id = $_GET['id'];
                    $result = $comment->delComment($cmt_id);
                    if($result) {
                        header('Location: ?act=comment');
                    }
                    else {
                        echo "<script>alert(`đã có lỗi xảy ra vui lòng thử lại`)</script>";
                    }
                    break;
                case 'logout':
                    if(isset($_SESSION['id'])) unset($_SESSION['id']);
                    if(isset($_SESSION['user'])) unset($_SESSION['user']);
                    if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
                    header('location: ../../index.php');
                    break;
            }
        }
        else {
            $product = new Product();
            $order = new Order();
            $order_detail = new OrderDetail();
            // Year Income, Month Income, Bestseller, and Inventory
            $products = $product->getInventory();
            $month_incomes = $order->getMonthIncome();
            $year_incomes = $order->getYearIncome();
            $bestsellers = $order_detail->getBestsell();
            include "../view/home.php";
        }
    // }
    include "../view/footer.php";
?>