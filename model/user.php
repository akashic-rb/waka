<?php
    class User {
        private $id = null;
        private $username;
        private $name;
        private $password;
        private $phone;
        private $image;
        private $email;
        private $date;
        private $address;
        private $role;  // 0 = user; 1 = admin; default = 0;
        private $gender;
        
        function __construct() {
            if(func_num_args() === 9) {
                $this->username = func_get_arg(0);
                $this->name = func_get_arg(1);
                $this->password = func_get_arg(2);
                $this->phone = func_get_arg(3);
                $this->image = func_get_arg(4);
                $this->email = func_get_arg(5);
                $this->date = func_get_arg(6);
                $this->address = func_get_arg(7);
                $this->gender = func_get_arg(8);
            }
        }

        private function checkUser($username) {
            $db = new Connect();
            $sql = "SELECT username FROM user WHERE username = '$username'";
            $result = $db->getInstance($sql);
            if(empty($result))
                return true;
            else 
                return false;
        }

        public function login($username, $password) {
            try {
                $db = new Connect();
                $sql = "SELECT * FROM user WHERE username = '$username'";
                $user = $db->getInstance($sql);
                $pass_hash = $user['password'] ?? '';
                if(password_verify($password, $pass_hash))
                    return $user;
                else
                    return false;
            }
            catch(PDOException $e) {
                echo "<script>alert('Đã có lỗi xảy ra vui lòng thử lại')</script>";
            }
        }

        function getUsers() {
            try {
                $db = new Connect();
                $sql = "SELECT id, name, username, dob as date, role, phone, email FROM user";
                return $db->getList($sql);
            }
            catch(PDOException $e) {
                echo "Đã có lỗi xảy ra vui lòng thử lại";
            }
        }

        private function generateId() {
            return base_convert(date(), 10, 11);
        }

        function getUser($id) {
            $db = new Connect();
            $sql = "SELECT * FROM user WHERE id = $id";
            return $db->getInstance($sql);
        }

        function register($name, $username, $password, $email) {
            try {    
                if($this->checkUser($username)) {
                    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                    $id = 'DEFAULT';
                    $sql = "INSERT INTO user(id, username, name, password, email) VALUES($id, '$username', '$name', '$pass_hash', '$email')";
                    $db = new Connect();
                    $result = $db->exec($sql);
                    return $result;
                }
                else
                    return false;
            }
            catch(PDOException $e) {
                echo $e;
            }
        }

        public function update($id, $name, $email, $phone, $address, $dob = null, $gender = 0) {
            try {
                $db = new Connect();
                $sql = "UPDATE user SET name = '$name', email = '$email', phone = '$phone', address = '$address',";
                if(!empty($dob))
                    $sql .= " dob = '$dob',";
                else
                    $sql .= " dob = DEFAULT,";
                $sql .= " gender = $gender WHERE id = $id";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                // echo '<script>alert(`Đã xảy ra lỗi thử lại sau`)</script>';
                echo $e;
            }
        }

        public function updateRole($id, $role) {
            try {
                $db = new Connect();
                $sql = "UPDATE user SET role = $role WHERE id = $id";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                echo '';
            }
        }

        public function verifyPass($id, $password) {
            try {
                $user = $this->getUser($id);
                $hash_pass = $user['password'];
                if(password_verify($password, $hash_pass))
                    return true;
                return false;
            }
            catch(PDOException $e) {
                echo '';
            }
        }

        public function updatePassword($id, $new_pass) {
            try{
                $hash_pass = password_hash($new_pass, PASSWORD_BCRYPT);
                $db = new Connect();
                $sql = "UPDATE user SET password = '$hash_pass' WHERE id = $id";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                echo $e;
            }
        }

        function delete($id) {
            try {
                $db = new Connect();
                $sql = "DELETE FROM user WHERE id = $id";
                return $db->exec($sql);
            }
            catch(PDOException $e) {
                echo $e;
            }
        }
    }
?>