<?php
session_start();
$pass = $_POST["pass"];
$email = trim($_POST["email"]);
$userName = trim($_POST["username"]);

// Registration

function isValidUsername($username)
{
    return strlen($username) >= 3 && strlen($username) <= 50;
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

function isValidPassword($pass)
{
    $errors = [];

    if (strlen($pass) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if (!preg_match('/[a-z]/', $pass)) {
        $errors[] = "Password must contain a lowercase letter.";
    }

    if (!preg_match('/[A-Z]/', $pass)) {
        $errors[] = "Password must contain an uppercase letter.";
    }

    if (!preg_match('/\d/', $pass)) {
        $errors[] = "Password must contain a digit.";
    }

    if (!preg_match('/[!@*#$%^&]/', $pass)) {
        $errors[] = "Password must contain a special character.";
    }

    return $errors;
}

// Login
function isVerifiedPassword($pass)
{
    global $email;
    if (empty($pass))
        return false;

    $sql = "SELECT * FROM users WHERE email = ?";

    $stmt = prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    closeCursor($stmt);

    return password_verify($pass, $user["password"]);
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