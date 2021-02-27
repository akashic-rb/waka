<?php
    class Category {
        protected $id = 'DEFAULT';
        var $name;

        function __construct() {
            if(func_num_args() == 1) {
                $this->name = func_get_arg(0);
            }
        }

        function getList() {
            $sql = "SELECT * FROM category";
            $db = new Connect();
            return $db->getList($sql);
        }

        function getInstance($id) {
            $db = new Connect();
            $sql = "SELECT * FROM category WHERE id = $id";
            return $db->getInstance($sql);
        }

        function getLimit($limit) {
            $db = new Connect();
            $sql = "SELECT * FROM category LIMIT $limit";
            return $db->getList($sql);
        }

        function setInstance(){
            $db = new Connect();
            $sql = "INSERT INTO category VALUES ($this->id , '$this->name')";
            return $db->exec($sql);
        }

        function editInstance($id, $name){
            $db = new Connect();
            $sql = "UPDATE category SET name = '$name' WHERE id = $id";
            return $db->exec($sql);
        }

        function delCategory($id){
            $db = new Connect();
            $sql = "DELETE FROM category WHERE id = $id";
            return $db->exec($sql);
        }  
    }
?>