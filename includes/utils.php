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


function hashPassword($pass)
{
    if (!empty(isValidPassword($pass)))
        return false;
    return password_hash($pass, PASSWORD_DEFAULT);
}


?>