<?php 
    class OrderDetail{
        private $order_id;
        private $product_id;
        private $quantity;

        public function __construct() {
            if(func_num_args() == 3) {
                $this->order_id = func_get_arg(0);
                $this->product_id = func_get_arg(1);
                $this->quantity = func_get_arg(2);
            }
        }

        public function getList($order_id ) {
            try{
                $db = new Connect();
                $sql = "SELECT p.id, p.name, o.status, o.total, p.image, od.quantity, p.price FROM order_detail od 
                JOIN `order` o 
                    ON o.id = od.id_order 
                JOIN product p 
                    ON p.id = od.id_product
                WHERE o.id = $order_id";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e;
            }
        }

        public function add(){
            try{
                $db = new Connect();
                $sql = "INSERT INTO order_detail(id_order, id_product, quantity) 
                    VALUES ($this->order_id, $this->product_id, $this->quantity)";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                echo '';
            }
        }


        public function getBestsell() {
            try {
                $db = new Connect();
                $sql = "SELECT p.name, p.id, SUM(od.quantity) as sold
                        FROM `order_detail` od
                        JOIN product p
                            ON od.id_product = p.id
                        GROUP BY od.id_product
                        ORDER BY sold DESC 
                        LIMIT 10";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    } 
?>