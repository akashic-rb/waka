<?php 
    class Publisher {
        var $id;
        var $name;
        function __construct() {
            if(func_num_args() === 2) {
                $this->id = func_get_arg(0);
                $this->name = func_get_arg(1);
            }
        }
        
        function getList() {
            $db = new Connect();
            $sql = "SELECT * FROM publisher";
            return $db->getList($sql);
        }

        function getInstance($id) {
            $db = new Connect();
            $sql = "SELECT * FROM publisher WHERE id = $id";
            return $db->getInstance($sql);
        }
    }
?>