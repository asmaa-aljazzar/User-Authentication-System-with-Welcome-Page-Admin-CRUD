<?php

/**
 * Prepares an SQL statement.
 *
 * @param string $sql SQL query to prepare.
 * @return PDOStatement
 */
function prepare($sql)
{
    global $db;
    return $db->prepare($sql);
}

/**
 * Closes a statement's cursor.
 *
 * @param PDOStatement $stmt Statement to close.
 * @return void
 */
function closeCursor($stmt)
{
    $stmt->closeCursor();
}

/**
 * Checks whether a field value exists in the database.
 *
 * @param string $field Database field to check.
 * @param string $value Value to search for.
 * @return bool
 */
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

/**
 * Hashes a password after validating it.
 *
 * @param string $pass Password to hash.
 * @return string|false
 */
function hashPassword($pass)
{
    if (!empty(isValidPassword($pass)))
        return false;

    return password_hash($pass, PASSWORD_DEFAULT);
}

/**
 * Validates registration data and creates a user account.
 *
 * @param string $username Username for the new account.
 * @param string $email Email address for the new account.
 * @param string $pass Password for the new account.
 * @return bool|array True on success, or validation errors.
 */
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
