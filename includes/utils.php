<?php
    require ("config/dbconnect.php");

    $pass = $_POST["pass"];

    function isExist ($feild, $value){

    }

    // Registration
    
    function isValidPassword ($pass) {
    
    }
    
    // Login
    function isVerifiedPassword ($pass){
        if (empty($pass))
            return false;

        // check if empty
        // check the password (length, one upper, one lower, one digit, one special)
    }
    
    function isMatchingDB ($EMAIL = "", $hashedPass){

    }
?>