<?php
require_once __DIR__ . "/../config/dbconnect.php";
require_once __DIR__ . "/utils.php";

function addUser($username, $email, $password, $role)
{
    global $db;

    $password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $result = $stmt->execute([$username, $email, $password, $role]);
    closeCursor($stmt);

    return $result;
}
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

function editUser($id, $username, $email, $role)
{
    global $db;

    $stmt = prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $result = $stmt->execute([$username, $email, $role, $id]);
    closeCursor($stmt);

    return $result;
}
