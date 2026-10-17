<?php
    if (session_status() == PHP_SESSION_NONE) 
        session_start();
    require_once("../includes/admin_auth.php");

    requireRole("admin");
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
                    <p class="small" style="margin:6px 0 0">Total sample records: 2</p>
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
                            <th>Role</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>demo_user</td>
                            <td>user@example.com</td>
                            <td><span class="role-badge">User</span></td>
                            <td>2026-10-01</td>
                            <td>
                                <div class="table-actions">
                                    <a class="button button-secondary button-small" href="edit.php?id=1">Edit</a>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id" value="1">
                                        <button class="button button-danger button-small" type="submit"
                                            data-confirm="Delete this user? This cannot be undone.">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>demo_admin</td>
                            <td>admin@example.com</td>
                            <td><span class="role-badge admin">Admin</span></td>
                            <td>2026-09-20</td>
                            <td>
                                <div class="table-actions">
                                    <a class="button button-secondary button-small" href="edit.php?id=2">Edit</a>
                                    <form action="delete.php" method="post">
                                        <input type="hidden" name="id" value="2">
                                        <button class="button button-danger button-small" type="submit"
                                            data-confirm="Delete this user? This cannot be undone.">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
    <footer class="site-footer">
        <div class="container footer-inner">
            <p>&copy; 2026 AuthSystem. Learning project.</p>
            <p>Built with PHP, PDO and MySQL.</p>
        </div>
    </footer>
</body>

</html>