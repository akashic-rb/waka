<?php
    class Product {
        private $id = 'DEFAULT';
        var $name;
        var $price;
        var $cate_id;
        var $image;
        var $date = 'DEFAULT';
        var $author_id;
        var $detail = 'DEFAULT';
        var $view = 'DEFAULT';
        var $publisher_id;
        var $rating = 'DEFAULT';

        function __construct() {
            if(func_num_args() == 9) {
                $this->name = func_get_arg(0);
                $this->price = func_get_arg(1);
                $this->cate_id = func_get_arg(2);
                $this->image = func_get_arg(3);
                $this->author_id = func_get_arg(4);
                $this->detail = func_get_arg(5);
                $this->view = func_get_arg(6);
                $this->publisher_id = func_get_arg(7);
                $this->rating = func_get_arg(8);
            }
        }

        function getList() {
            $db = new Connect();
            $sql = "SELECT * FROM product ORDER BY id DESC";
            return $db->getList($sql);
        }

        function getProductDetail($id){
            $db = new Connect();
            $sql = "SELECT * FROM product WHERE id = $id";
            return $db->getInstance($sql);
        }

        function getLimit($limit) {
            $db = new Connect();
            $sql = "SELECT * FROM product LIMIT $limit";
            return $db->getList($sql);
        }

        function getHighView($limit) {
            $db = new Connect();
            $sql = "SELECT * FROM product ORDER BY view desc LIMIT $limit";
            return $db->getList($sql);
        }

        function getNewest($limit) {
            $db = new Connect();
            $sql = "SELECT * FROM product ORDER BY date desc LIMIT $limit";
            return $db->getList($sql);
        }

        function getHighRate($limit) {
            $db = new Connect();
            $sql = "SELECT * FROM product ORDER BY rating LIMIT $limit";
            return $db->getList($sql);
        }

        function getQuantityByCategory() {
            $db = new Connect();
            $sql = "SELECT COUNT(id) as quantity, id_category FROM product GROUP BY id_category";
            return $db->getList($sql);
        }

        function delProduct($id){
            $db = new Connect();
            $sql = "DELETE FROM product WHERE id = $id";
            return $db->exec($sql);
        }
    
        function editProduct($id, $id_category, $name, $new_image, $price, $id_author,  $detail, $view, $rating){
            $db = new Connect();
            $sql = "UPDATE product SET id_category = '$id_category', name = '$name', image = '$new_image', price='$price', id_author='$id_author', detail='$detail', view = $view, rating = $rating WHERE id='$id'";
            return $db->exec($sql);
        }
    
        function addProduct() {
            $db = new Connect();
            $sql = "INSERT INTO product VALUES ($this->id, '$this->name', $this->price, $this->cate_id, '$this->image', '$this->date', $this->author_id, '$this->detail', $this->view, $this->publisher_id, $this->rating)";
            return $db->exec($sql);
        }

        public function getCateProduct($cate_id, $limit = 0) {
            $db = new Connect();
            $sql = "SELECT * FROM product WHERE id_category = $cate_id";
            if($limit > 0)
                $sql .= " LIMIT $limit";
            return $db->getList($sql);
        }

        public function getInventory(){
            $db = new Connect();
            $sql = "SELECT id, name, quantity FROM product ORDER BY quantity DESC LIMIT 10";
            return $db->getList($sql);
        }

        public function subQuantity($id, $quantity) {
            $db = new Connect();
            $sql = "UPDATE product SET quantity = quantity - $quantity WHERE id = $id";
            return $db->exec($sql);
        }

        public function filter($sql) {
            $db = new Connect();
            return $db->getList($sql);
        }

        public function getByCategory($id) {
            $db = new Connect();
            $sql = "SELECT * FROM product WHERE id_category = $id LIMIT 6";
            return $db->getList($sql);
        }
    }    
?>