<?php 
    include '../../model/connect.php';
    include '../../model/comment.php';

    $cmt_id = $_GET['id'];
    $comment = new Comment();
    if($comment->delComment($cmt_id))
        echo json_encode(array('result'=>true, 'cmt_id'=>$cmt_id));    
    else
        echo json_encode(array('result'=>false));    
?>