<?php 
    class Order{
        private $id = 'DEFAULT';
        var $user_id;
        var $name;
        var $phone;
        var $email;
        var $address;
        // 0 received, 1 confirmed, 2 delivering, 3 delivered
        var $status = 'DEFAULT';
        var $total;
        var $date = 'DEFAULT';
        var $quantity;
        // position: 0 active, 1 canceled
        var $position = 'DEFAULT';
        var $payment;

        function __construct() {
            if(func_num_args() == 8) {
                $this->user_id = func_get_arg(0);
                $this->name = func_get_arg(1);
                $this->phone = func_get_arg(2);
                $this->email = func_get_arg(3);
                $this->address = func_get_arg(4);
                $this->total = func_get_arg(5);
                $this->quantity = func_get_arg(6);
                $this->payment = func_get_arg(7);
            }
        }

        public function getAll() {
            try{
                $db = new Connect();
                $sql = "SELECT * FROM `order` WHERE position = 1 ORDER BY date DESC";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getList($user_id) {
            try{
                $db = new Connect();
                $sql = "SELECT id, date, quantity, total, status FROM `order` WHERE id_user = $user_id AND position = 1 ORDER BY date DESC";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getInstance($order_id) {
            try{
                $db = new Connect();
                $sql = "SELECT * FROM `order` WHERE id = $order_id";
                return $db->getInstance($sql);
            }
            catch(PDOExeption $e){
                echo $e->getMessage();
            }
        }
    
        public function add(){
            try{
                $db = new Connect();
                $sql = "INSERT INTO `order`(id_user, name, phone, email, address, total, quantity, payment) 
                    VALUES ($this->user_id, '$this->name', '$this->phone', '$this->email', '$this->address', $this->total, $this->quantity, $this->payment)";
                $db->exec($sql);
                return $db->lastId();
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function cancel($id) {
            try{
                $db = new Connect();
                $sql = "UPDATE `order` SET position = 2 WHERE id = $id";
                return $db->exec($sql);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        }

        public function getCancelOrders() {
            try{
                $db = new Connect();
                $sql = "SELECT * FROM `order` WHERE position = 2";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function updateStatus($order_id, $status) {
            try{
                $db = new Connect();
                $sql = "UPDATE `order` SET status = $status WHERE id = $order_id";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getMonthIncome() {
            try{
                $db = new Connect();
                $sql = "SELECT SUM(total) as total,
                            MONTH(date) as month,
                            COUNT(*) as 'order'
                        FROM `order`
                        WHERE position = 1 AND YEAR(date) = YEAR(CURRENT_TIMESTAMP())
                        GROUP BY MONTH(date) DESC
                        LIMIT 10";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function getYearIncome() {
            try{
                $db = new Connect();
                $sql = "SELECT SUM(total) as total,
                            YEAR(date) as year,
                            COUNT(*) as 'order'
                        FROM `order`
                        WHERE position = 1
                        GROUP BY YEAR(date) DESC
                        LIMIT 10";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>