<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>Welcome | AuthSystem</title>
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
        <nav class="nav-links" id="primary-navigation" data-nav-links aria-label="Main navigation">
            <a href="welcome.php" aria-current="page">Welcome</a>
            <a href="admin/dashboard.php">Admin dashboard</a>
            <a href="logout.php">Log out</a>
        </nav>
    </div>
</header>
<main id="main-content" class="container">
    <div class="page-heading">
        <span class="eyebrow">Your account</span>
        <h1>Welcome, User!</h1>
        <p>This is a static page template. Connect it to your account data when you add your PHP logic.</p>
    </div>
    <div class="welcome-grid">
        <section class="card">
            <h2>Account information</h2>
            <div class="profile-list">
                <div class="profile-item">
                    <span>Username</span>
                    <span>Example user</span>
                </div>
                <div class="profile-item">
                    <span>Email address</span>
                    <span>user@example.com</span>
                </div>
                <div class="profile-item">
                    <span>Registration date</span>
                    <span>Not connected</span>
                </div>
            </div>
            <a class="button button-secondary" href="logout.php">Log out</a>
        </section>
        <aside class="card">
            <span class="eyebrow">Account status</span>
            <h2>Frontend preview</h2>
            <p>Use this page as the layout for your future authenticated user area.</p>
            <a class="button" href="admin/dashboard.php">Open admin dashboard</a>
        </aside>
    </div>
</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <p>&copy; 2026 AuthSystem. Learning project.</p>
        <p>Built with PHP, PDO and MySQL.</p>
    </div>
</footer>
</body>
</html>
