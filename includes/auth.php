<?php
require_once __DIR__."/../config/dbconnect.php";

$password = $_POST["password"] ?? "";
$email = trim($_POST["email"] ?? "");
$userName = trim($_POST["username"] ?? "");

// Registration
function isValidUsername($username)
{
    if (empty ($username))
        return false;
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

function displayPasswordErrors($pass)
{
    $errors = isValidPassword($pass);

    if (empty($errors)) {
        echo "Password is valid";
    } else {
        foreach ($errors as $error) {
            echo "$error <br>";
        }
    }
}

// Login
function isVerifiedPassword($pass)
{
    global $email;

    if (empty($pass)) {
        return false;
    }

    $sql = "SELECT password FROM users WHERE email = ? LIMIT 1";

    $stmt = prepare($sql);
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    closeCursor($stmt);

    if (!$user) {
        return false;
    }

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

function login ()
{
    global $email, $password;

    if (isVerifiedEmail($email) && isVerifiedPassword($password)){
        // Get the user info
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = prepare($sql);
        $stmt->execute([$email]);
    
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user)
            return false;

        closeCursor($stmt);

        // Generate new session id and replace it with the old one
        session_regenerate_id (true);

        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["role"] = $user["role"];

        return true;
    
    }
    return false;
}
?>