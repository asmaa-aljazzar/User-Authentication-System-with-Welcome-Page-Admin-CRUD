<?php
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    $dsn = "mysql:host=localhost;dbname=auth;";


    try {
        $db = new PDO($dsn, "DB_USER", "DB_PASSWORD");

    } catch (PDOException $e) {
        die("Database connection failed");
    }

?>