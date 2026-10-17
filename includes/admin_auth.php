<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

require __DIR__ . "/../config/paths.php";

/**
 * Redirects authenticated users based on their role.
 *
 * @return void
 */
function checkRole(): void
{
    if (isset($_SESSION["user_id"])) {
        if ($_SESSION["role"] === "admin") {
            header("Location: " . BASE_URL . "admin/dashboard.php");
        } else {
            header("Location: " . BASE_URL . "welcome.php");
        }
        exit;
    }
}

/**
 * Restricts access to users with the required role.
 *
 * @param string $role Required user role.
 * @return void
 */
function requireRole(string $role): void
{
    if (!isset($_SESSION["user_id"])) {
        header("Location:" . BASE_URL . "login.php");
        exit;
    }
    if ($_SESSION["role"] != $role) {
        if ($_SESSION["role"] == "admin") 
            header("Location:". BASE_URL . "admin/dashboard.php");
        else if ($_SESSION["role"] == "user")
            header("Location:". BASE_URL . "welcome.php");
    }
}
?>