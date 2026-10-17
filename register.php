
<?php
include 'includes/auth.php';
include 'includes/utils.php';

$errors = [];
$registered = false;
$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $result = register($username, $email, $password);

    if ($result === true) {
        $registered = true;
    } else {
        $errors = $result;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Create account | AuthSystem</title>
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

        <button class="nav-toggle" type="button" data-nav-toggle
                aria-expanded="false" aria-controls="primary-navigation"
                aria-label="Open navigation">Menu</button>

        <nav class="nav-links" id="primary-navigation" data-nav-links
             aria-label="Main navigation">
            <a href="login.php">Log in</a>
            <a href="register.php" aria-current="page">Create account</a>
        </nav>
    </div>
</header>

<main id="main-content" class="container">
    <section class="auth-layout">
        <div class="card">
            <div class="auth-intro">
                <span class="eyebrow">Get started</span>
                <h1>Create an account</h1>
                <p>Fill in your details to register.</p>
            </div>

            <?php if ($registered): ?>
                <p>Account created successfully!</p>
                <a href="login.php">Log in</a>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <form action="register.php" method="post" data-validate>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username"
                           type="text" autocomplete="username"
                           minlength="3" maxlength="50"
                           placeholder="Choose a username" required>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" name="email"
                           type="email" autocomplete="email"
                           maxlength="254" placeholder="you@example.com" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-wrap">
                        <input class="form-control" id="password"
                               name="password" type="password"
                               autocomplete="new-password" minlength="8"
                               placeholder="At least 8 characters" required>
                        <button class="password-toggle" type="button"
                                data-password-toggle="password"
                                aria-pressed="false">Show</button>
                    </div>
                    <span class="form-hint">Use at least 8 characters.</span>
                </div>

                <button class="button button-block" type="submit">
                    Create account
                </button>
            </form>

            <div class="auth-footer">
                <p>Already registered? <a href="login.php">Log in</a></p>
            </div>
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
