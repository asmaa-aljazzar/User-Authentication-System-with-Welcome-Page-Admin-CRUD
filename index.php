<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#101522">
    <title>AuthSystem | User accounts</title>
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
            <a href="login.php">Log in</a>
            <a href="register.php">Create account</a>
        </nav>
    </div>
</header>
<main id="main-content" class="container">
    <section class="auth-layout">
        <div class="card">
            <span class="eyebrow">User account project</span>
            <h1>Welcome to AuthSystem</h1>
            <p>Explore the front-end pages for user registration, login, account details, and user management.</p>
            <div class="toolbar-actions">
                <a class="button" href="register.php">Create account</a>
                <a class="button button-secondary" href="login.php">Log in</a>
            </div>
            <p class="small">This is a frontend template. Authentication and database features are not connected yet.</p>
        </div>
    </section>
</main>
<footer class="site-footer">
    <div class="container footer-inner">
        <p>&copy; 2026 AuthSystem. Learning project.</p>
        <p>Frontend template.</p>
    </div>
</footer>
</body>
</html>
