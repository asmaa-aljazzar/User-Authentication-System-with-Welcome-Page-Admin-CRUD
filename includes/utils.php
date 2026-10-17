<?php
require("config/dbconnect.php");

$pass = $_POST["pass"];
$email = $_POST["email"];



function prepare($sql)
{
    global $db;
    return $db->prepare($sql);
}

function closeCursor($stmt)
{
    $stmt->closeCursor();
}

function isExist($field, $value)
{
    $sql = "SELECT * FROM user WHERE $field = ?";

    $stmt = prepare($sql);

    $stmt->execute ([$value]);

    $exists = (bool) $stmt->fetchColumn();
    
    closeCursor($stmt);
    
    return $exists;
}

// Registration
function isValidPassword($pass)
{

}

// Login
function isVerifiedPassword($pass)
{
    global $email;
    if (empty($pass))
        return false;
    
    $sql = "SELECT * FROM users WHERE email = ?";
    
    $stmt = prepare($sql);
    $stmt -> execute([$email]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    closeCursor($stmt);

    return password_verify($pass, $user["password"]);
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

function isVerifiedEmail($email)
{
    if (!isValidEmail($email)) {
        return false;
    }

    $stmt = prepare("SELECT 1 FROM users WHERE email = ? LIMIT 1");
    $stmt->execute([$email]);

    $exists = (bool) $stmt->fetchColumn();
    $stmt->closeCursor();

    return $exists;
}

?>