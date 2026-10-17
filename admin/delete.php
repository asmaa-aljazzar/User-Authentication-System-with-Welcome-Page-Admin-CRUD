<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
require_once("../includes/admin_auth.php");
requireRole("admin");

require_once("../includes/crud.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: dashboard.php");
    exit;
}

$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    header("Location: dashboard.php");
    exit;
}

deleteUser($id);
header("Location: dashboard.php");
exit;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Delete user | AuthSystem</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <?php include_once __DIR__ . "/../includes/header.php" ?>
    <main id="main-content" class="container">
        <section class="auth-layout">
            <div class="card">
                <span class="eyebrow">Administration</span>
                <h1>Delete user</h1>
                <p>This is a static page. Add server-side authorization and deletion logic before enabling this action.
                </p>
                <a class="button" href="dashboard.php">Back to dashboard</a>
            </div>
        </section>
    </main>
    <?php require_once("../includes/footer.php") ?>
</body>

</html>