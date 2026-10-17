<?php
require_once __DIR__ . "/../config/dbconnect.php";
require_once __DIR__ . "/utils.php";

function getAllUsers()
{
    $sql = "SELECT * From users WHERE role = 'user'";

    $stmt = prepare($sql);

    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    closeCursor($stmt);

    return $users;
}

function deleteUser($id)
{
    $sql = "DELETE FROM users WHERE id = ?";

    $stmt = prepare($sql);

    $stmt->execute([$id]);
    
    return $stmt->rowCount() > 0;
}

?>