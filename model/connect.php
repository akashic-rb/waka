<?php
    class Connect {
        var $db = NULL;
        
        function connect(){
            $servername = "sql313.byethost4.com";
            $username = "b4_26981561";
            $password = "mkla2110";
            $this->db = new PDO("mysql:host=$servername;dbname=b4_26981561_waka", $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function getList($sql){
            $result = $this->db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetchAll();
        }
        
        function getInstance($sql){
            $stmt = $this->db->query($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetch();
        }
    
        function exec($sql){
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        }

        function lastId() {
            return $this->db->lastInsertId();
        }
    }
?>