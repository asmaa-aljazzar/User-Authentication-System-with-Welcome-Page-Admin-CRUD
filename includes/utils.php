<?php
require("config/dbconnect.php");

$pass = $_POST["pass"];
$email = $_POST["email"];

function isExist($feild, $value)
{

}


function prepare($sql)
{
    global $pdo;
    return $pdo->prepare($sql);
}

function excute($stmt)
{
    $stmt->execute();
}

function closeCursor($stmt)
{
    $stmt->closeCursor();
}

// Registration
function isValidPassword($pass)
{

}

// Login
function isVerifiedPassword($pass)
{
    if (empty($pass))
        return false;

    // check if empty
    // check the password (length, one upper, one lower, one digit, one special)
}

function isMatchingDB($hashedPass)
{

}

function isValidEmail($email)
{
    if (empty($email)) {
        return false;
    }

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }

    return false;
}
?>