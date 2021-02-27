<?php
    session_start();

    $id = $_POST['id'];

  //  array_splice($_SESSION['cart'], $i, 1 );
  
    for ($i=0; $i < count($_SESSION['cart']) ; $i++) { 
        if($_SESSION['cart'][$i][0]==$id){
            $j=$i;
            break;
        }
    }
    array_splice($_SESSION['cart'], $i, 1 );
  
    echo count($_SESSION['cart']);
?>