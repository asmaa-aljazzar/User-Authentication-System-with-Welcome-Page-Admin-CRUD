<?php
define ("USER", "root");
define ("PASSWORD", "");

// work on localhost on authentication database with utf8.
$dsn = "mysql:host=localhost;dbname=authentication;charset=utf8mb4";

try {
    $pdo = new PDO ($dsn, USER, PASSWORD);

    $pdo->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e -> getMessage();
}