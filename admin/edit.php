<?php
    if (session_status() == PHP_SESSION_NONE) 
        session_start();
    require_once("../includes/admin_auth.php");
    require_once __DIR__ . "/../includes/crud.php";

    requireRole("admin");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        editUser($_POST['id'], $_POST['username'], $_POST['email'], $_POST['role']);
        header("Location: dashboard.php");
        exit;
    }

    $id = $_GET['id'] ?? '';
    $stmt = $db->prepare("SELECT id, username, email, role FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: dashboard.php");
        exit;
    }
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
    <title>Edit user | AuthSystem</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
</head>

<body>
<<<<<<< HEAD
<a class="skip-link" href="#main-content">Skip to main content</a>
<?php include_once __DIR__ . "/../includes/header.php" ?>
<main id="main-content" class="container">
    <section class="auth-layout">
        <div class="card">
            <div class="auth-intro">
                <span class="eyebrow">Administration</span>
                <h1>Edit user</h1>
                <p>Update the account details below.</p>
            </div>
            <form action="edit.php" method="post" data-validate>
                <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" type="text"
                           autocomplete="username" value="<?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>" minlength="3" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" name="email" type="email"
                           autocomplete="email" value="<?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>" maxlength="254" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="role" required>
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                    </select>
                </div>
                <button class="button" type="submit">Save changes</button>
                <a class="button button-secondary" href="dashboard.php">Cancel</a>
            </form>
        </div>
    </section>
</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <p>&copy; 2026 AuthSystem. Learning project.</p>
        <p>Frontend template.</p>
    </div>
</footer>
=======
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <?php include_once __DIR__ . "/../includes/header.php" ?>
    <main id="main-content" class="container">
        <section class="auth-layout">
            <div class="card">
                <div class="auth-intro">
                    <span class="eyebrow">Administration</span>
                    <h1>Edit user</h1>
                    <p>Update the sample account details below.</p>
                </div>
                <form action="edit.php" method="post" data-validate>
                    <input type="hidden" name="id" value="1">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" autocomplete="username"
                            value="demo_user" minlength="3" maxlength="50" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" autocomplete="email"
                            value="user@example.com" maxlength="254" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="user" selected>User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button class="button" type="submit">Save changes</button>
                    <a class="button button-secondary" href="dashboard.php">Cancel</a>
                </form>
            </div>
        </section>
    </main>
    <?php require_once("../includes/footer.php") ?>
>>>>>>> 03df3c9809c3b285c8a49bde164e588808f723f8
</body>

</html>