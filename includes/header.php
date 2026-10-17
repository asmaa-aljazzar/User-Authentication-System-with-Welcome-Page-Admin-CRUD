<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

require_once __DIR__ . "/../config/paths.php";

?>
<a class="skip-link" href="#main-content">Skip to main content</a>
<header class="site-header">
    <div class="container navbar">
        <a class="brand" href="<?= BASE_URL ?>index.php" aria-label="User Auth System home">
            <span class="brand-mark" aria-hidden="true">U</span>
            <span>Auth<span style="color: var(--primary)">System</span></span>
        </a>
        <button class="nav-toggle" type="button" data-nav-toggle aria-expanded="false"
            aria-controls="primary-navigation" aria-label="Open navigation">Menu</button>
        <nav class="nav-links" id="primary-navigation" data-nav-links aria-label="Main navigation">

            <?php if (isset($_SESSION["role"])): ?>
                <a href="<?= BASE_URL ?>logout.php">Logout</a>
                <?php if ($_SESSION["role"] == "admin"): ?>
                    <a href="<?= BASE_URL ?>admin/dashboard.php">Dashboard</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="<?= BASE_URL ?>login.php">Log in</a>
                <a href="<?= BASE_URL ?>register.php">Create account</a>
            <?php endif; ?>

        </nav>
    </div>
</header>