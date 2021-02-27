<?php 
    class Comment {
        var $id = 'DEFAULT';
        var $content;
        var $productId;
        var $userId;
        var $date = 'DEFAULT';

        function __construct() {
            if(func_num_args() === 3) {
                $this->content = func_get_arg(0);
                $this->productId = func_get_arg(1);
                $this->userId = func_get_arg(2);
            }
        }

        function setComment() {
            $db = new Connect();
            $sql = "INSERT INTO comment VALUES($this->id, '$this->content', $this->productId, $this->userId, $this->date)";
            $db->exec($sql);
            return $db->lastId();
        }
    
        function getCommentByProductId($product_id) {
            $db = new Connect();
            $sql = "SELECT cmt.id, c.id as 'user_id', c.name, cmt.content, cmt.date
            FROM comment cmt 
            JOIN user c 
                ON cmt.id_user = c.id
            WHERE cmt.id_product = $product_id 
            ORDER BY cmt.date DESC";
            return $db->getList($sql);
        }
    
        function getCommentById($id) {
            $db = new Connect();
            $sql = "SELECT cmt.id, c.name, cmt.content, cmt.date
                FROM comment cmt 
                JOIN user c 
                ON cmt.id_user = c.id
                WHERE cmt.id = $id";
            return $db->getInstance($sql);
        }
    
        function delComment($cmt_id) {
            $db = new Connect();
            $sql = "DELETE FROM comment WHERE id = $cmt_id";
            return $db->exec($sql);
        }        

        public function getComments() {
            $db = new Connect();
            $sql = "SELECT c.id, c.id_user, u.name as username, p.name, c.content, c.date
                    FROM comment c
                    JOIN user u ON u.id = c.id_user
                    JOIN product p ON p.id = c.id_product 
                    ORDER BY c.date DESC";
            return $db->getList($sql);
        }
    }

?>