<?php 
    class Author {
        private $id;
        var $name;
        
        function __construct() {
            if(func_num_args() === 1) {
                $this->name = func_get_arg(1);
            }
        }
    
        function getList() {
            $db = new Connect();
            $sql = "SELECT * FROM author";
            return $db->getList($sql);
        }

        function getAuthor($id) {
            $db = new Connect();
            $sql = "SELECT name FROM author WHERE id = $id";
            return $db->getInstance($sql);
        }

        function editAuthor($id, $name){
            $db = new Connect();
            $sql = "UPDATE author SET name='$name' WHERE id='$id'";
            return $db->exec($sql);
        }
        
        function addAuthor($name){
            $db = new Connect();
            $sql = "INSERT INTO author (name) VALUES ('$name')";
            return $db->exec($sql);
        }

        function delAuthor($id){
            $db = new Connect();
            $sql = "DELETE FROM author WHERE id = '$id'";
            return $db->exec($sql);
        }
    }
?>