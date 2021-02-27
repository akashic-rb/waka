<?php
    session_start();
    //lay du lieu
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $img = $_POST['img'];
    $sl = 1;

    //lam viec voi gio hang session
    $pos = 0;
    if(isset($_SESSION['cart'])){
        for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
            if($_SESSION['cart'][$i][0]==$id){
                $pos = $i + 1;
                $pos_sl = $_SESSION['cart'][$i][4];
                break;
            }
        }
    }
    
    if($pos > 0){
        $new_sl = $pos_sl + $sl;
        $_SESSION['cart'][$pos-1][4] = $new_sl;
    }else{
        $item = [$id,$name,$img,$price,$sl];
        $_SESSION['cart'][]=$item;
    }
    $quantity = 0;
    foreach($_SESSION['cart'] as $item) {
        $quantity += $item[4];
    }
    //gia tri tra ve

    echo $quantity;

?>