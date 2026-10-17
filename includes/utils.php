<?php
    require ("config/dbconnect.php");

    $pass = $_POST["pass"];

    function prepare($sql){
    global $pdo;
    return $pdo->prepare($sql);
}

    function excute($stmt){
        $stmt->execute();
    }

    function closeCursor($stmt){
        $stmt->closeCursor();
    }
    
    function isValidPassword ($pass){
        
    }

    function isValidEmail($email){
    if(empty($email)){
        return false;
    } 

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }

    return false;
}
?>