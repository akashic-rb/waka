<?php
    function showcatalog($home){
        $sql = "select * from catalog order by name";
        return getlist($sql);
    }    
?>