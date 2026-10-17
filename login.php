<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

require_once "includes/utils.php";
require_once "includes/auth.php";
require_once "includes/admin_auth.php";



// Redirect if already logged in
checkRole();

$error = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    if (login())
    {
        if ($_SESSION['role'] === 'admin')
            header('Location: admin/dashboard.php');
        else
            header('Location: welcome.php');
        exit ;
    }
    $error = 'Invalid email or password';
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Log in | AuthSystem</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
</head>

<body>
    <a class="skip-link" href="#main-content">Skip to main content</a>
    <header class="site-header">
        <div class="container navbar">
            <a class="brand" href="index.php" aria-label="User Auth System home">
                <span class="brand-mark" aria-hidden="true">U</span>
                <span>Auth<span style="color: var(--primary)">System</span></span>
            </a>
            <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false"
                aria-controls="primary-navigation" aria-label="Open navigation">Menu</button>
            <nav class="nav-links" id="primary-navigation" data-nav-links aria-label="Main navigation">
                <a href="login.php" aria-current="page">Log in</a>
                <a href="register.php">Create account</a>
            </nav>
        </div>
    </header>
    <main id="main-content" class="container">
        <section class="auth-layout">
            <div class="card">
                <div class="auth-intro">
                    <span class="eyebrow">Welcome back</span>
                    <h1>Log in</h1>
                    <p>Enter your account details to continue.</p>
                </div>
                <form action="login.php" method="POST" data-validate>
                    <div class="form-group">

                        <?php if (!empty($error)): ?>
                            <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
                        <?php endif; ?>

                        <label for="email">Email address</label>
                        <input class="form-control" id="email" name="email" type="email" autocomplete="email"
                            placeholder="you@example.com" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrap">
                            <input class="form-control" id="password" name="password" type="password"
                                autocomplete="current-password" placeholder="Enter your password" required>
                            <button class="password-toggle" type="button" data-password-toggle="password"
                                aria-pressed="false">Show</button>
                        </div>
                    </div>
                    <button class="button button-block" name="btn" type="submit">Log in</button>
                </form>
                <div class="auth-footer">
                    <p>Don't have an account? <a href="register.php">Create one</a></p>
                </div>
            </div>
        </section>
    </main>

    <?php
    include "includes/footer.php";
    ?>
</body>

</html>