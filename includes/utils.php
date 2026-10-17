
<?php
require("config/dbconnect.php");

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
    $allowedFields = ['username', 'email'];

    if (!in_array($field, $allowedFields, true)) {
        return false;
    }

    $sql = "SELECT 1 FROM users WHERE $field = ?";

    $stmt = prepare($sql);
    $stmt->execute([$value]);

    $exists = (bool) $stmt->fetchColumn();

    closeCursor($stmt);

    return $exists;
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

function hashPassword($pass)
{
    if (!empty(isValidPassword($pass)))
        return false;

    return password_hash($pass, PASSWORD_DEFAULT);
}

function register($username, $email, $pass)
{
    global $db;

    $errors = [];

    if (!isValidEmail($email)) {
        $errors[] = 'enter valid email';
    }

    if (!empty(isValidPassword($pass))) {
        $errors = array_merge($errors, isValidPassword($pass));
    }

    if (!isValidUsername($username)) {
        $errors[] = 'enter a valid username.';
    }

    if (isExist('username', $username)) {
        $errors[] = 'That username is already taken.';
    }

    if (isExist('email', $email)) {
        $errors[] = 'An account with that email already exists.';
    }

    if (!empty($errors)) {
        return $errors;
    }

    $passwordHash = password_hash($pass, PASSWORD_DEFAULT);

    if ($passwordHash === false) {
        return ['Password hashing failed.'];
    }

    try {
        $stmt = $db->prepare(
            "INSERT INTO users (username, email, password, role)
             VALUES (?, ?, ?, 'user')"
        );

        $stmt->execute([$username, $email, $passwordHash]);

        closeCursor($stmt);

        return true;

    } catch (PDOException $e) {
        return ['Registration failed. Please try again.'];
    }
}
?>
