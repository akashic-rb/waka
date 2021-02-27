<?php 
    include '../../model/connect.php';
    include '../../model/comment.php';
    $cmt_arr = json_decode($_POST['data'], true);
    $user = $cmt_arr['userId'];
    $product = $cmt_arr['productId'];
    $content = $cmt_arr['content'];
    $comment = new Comment($content, $product, $user);
    $cmt_id = $comment->setComment();
    $cmt_info = $comment->getCommentById($cmt_id);
    $date = date_create($cmt_info['date']);
    $cmt_info['date'] = date_format($date, 'd/m/Y H:i');
    if(true)
        echo json_encode($cmt_info);
?>