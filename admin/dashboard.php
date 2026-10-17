<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();
require_once("../includes/admin_auth.php");
requireRole("admin");

require_once("../includes/crud.php");
$users = getAllUsers();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Admin dashboard | AuthSystem</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <?php include_once __DIR__ . "/../includes/header.php" ?>
    <main id="main-content" class="container">
        <div class="page-heading">
            <span class="eyebrow">Administration</span>
            <h1>User dashboard</h1>
            <p>Static preview of the user-management screen. Replace the sample rows with database results later.</p>
        </div>
        <section class="card">
            <div class="toolbar">
                <div>
                    <h2 style="margin:0">All users</h2>
                    <p class="small" style="margin:6px 0 0">Total sample records: <?= count($users) ?></p>
                </div>
                <div class="toolbar-actions">
                    <a class="button" href="create.php">+ Add user</a>
                </div>
            </div>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user["id"]) ?></td>
                                <td><?= htmlspecialchars($user["username"]) ?></td>
                                <td><?= htmlspecialchars($user["email"]) ?></td>
                                <td><?= htmlspecialchars($user["created_at"]) ?></td>
                                <td>
                                    <div class="table-actions">
                                        <a class="button button-secondary button-small" href="edit.php?id=<?= (int) $user['id'] ?>">Edit</a>
                                        <form action="delete.php" method="POST">
                                            <input type="hidden" name="id" value="<?= (int) $user["id"] ?>">
                                            <button class="button button-danger button-small" type="submit"
                                                data-confirm="Delete this user? This cannot be undone.">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <?php require_once("../includes/footer.php") ?>
</body>

</html>