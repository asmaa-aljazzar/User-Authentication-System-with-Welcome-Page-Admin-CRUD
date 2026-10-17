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
    global $email;
    if (empty($pass))
        return false;
    
    $sql = "SELECT * FROM users WHERE email = ?";
    
    $stmt = prepare($sql);
    $stmt -> execute([$email]);
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
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