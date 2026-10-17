<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
require_once("../includes/admin_auth.php");
    require_once __DIR__ . "/../includes/crud.php";

requireRole("admin");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        addUser($_POST['username'], $_POST['email'], $_POST['password'], $_POST['role']);
        header("Location: dashboard.php");
        exit;
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Add user | AuthSystem</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <?php include_once __DIR__ . "/../includes/header.php" ?>
    <main id="main-content" class="container">
        <section class="auth-layout">
            <div class="card">
                <div class="auth-intro">
                    <span class="eyebrow">Administration</span>
                    <h1>Add user</h1>
                    <p>Enter the new account details.</p>
                </div>
                <form action="create.php" method="post" data-validate>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" autocomplete="username"
                            minlength="3" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" autocomplete="email"
                            maxlength="254" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Temporary password</label>
                        <input class="form-control" id="password" name="password" type="password"
                            autocomplete="new-password" minlength="8" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button class="button" type="submit">Add user</button>
                    <a class="button button-secondary" href="dashboard.php">Cancel</a>
                </form>
            </div>
        </section>
    </main>
    <?php require_once("../includes/footer.php") ?>
</body>

</html>