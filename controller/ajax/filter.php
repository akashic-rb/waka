<?php 
    include "../../model/product.php";
    include "../../model/connect.php";
    $filterArray = json_decode($_POST['filter'], true);
    $sql = 'SELECT p.id, p.name, p.image, p.price, p.view, p.id_author, p.id_publisher, p.rating FROM product p ';
    $authors = $filterArray['author'];
    $publishers = $filterArray['publisher']; 
    $price = $filterArray['price'];
    $rating = $filterArray['rating'];
    $status = $filterArray['status'];
    // check điều kiện tác giả
    if(!empty($authors)) {
        $sql .= "WHERE p.id_author = $authors[0] ";
        if(count($authors) > 1) {
            for ($i = 1; $i < count($authors); $i++) {
                $sql .= "OR p.id_author = $authors[$i] ";
            }
        }
    }
    else {
        $sql .= "WHERE p.id_author ";
    }
    // check điều kiện NXB
    if(!empty($publishers)) {
        $sql .= "AND p.id_publisher = $publishers[0] ";
        if(count($publishers) > 1) {
            for ($i = 1; $i < count($publishers); $i++) {
                $sql .= "OR p.id_publisher = $publishers[$i] ";
            }
        }
    }
    // check điều kiện filter price
    if(!empty($price)) {
        $sql .= "AND p.price >= $price[0] ";
        if(count($price) > 1) {
            $sql .= "AND p.price <= $price[1] ";
        }
    }
    // check điều kiện trạng thái
    if(!empty($status)) {
        foreach($status as $stt) {
            $sql .= "AND p.$stt = 1 ";
        }
    }
    // check điều kiện đánh giá
    if(!empty($rating)) {
        $rate = $rating[0] - 0.5;
        $sql .= "AND p.rating >= $rate ";
        if(count($rating) > 1) {
            for ($i = 1; $i < count($rating); $i++) {
                $rate = $rating[0] - 0.5;
                $sql .= "OR p.rating >= $rate ";
            }
        }
    }
    // 
    $sql .= "ORDER BY p.id desc";
    // echo $sql;
    $product = new Product();
    $products = $product->filter($sql);
    print_r(json_encode($products));
?>