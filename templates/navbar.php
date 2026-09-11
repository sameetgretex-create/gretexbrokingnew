<?php
$siteBase = $siteBase ?? '';
require_once __DIR__ . '/../helpers/urlfetcher.php';
$currentPath = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH);
$isCalculators = strpos($currentPath, '/calculators') !== false;
?>
<header class="site-header">
    <div class="navbar-container" data-navbar>
        <a class="navbar-logo" href="<?= e(url()) ?>" aria-label="Gretex Share Broking home">
            <img src="<?= e(url('assets/images/Gretex.png')) ?>" alt="Gretex">
        </a>

        <button class="navbar-toggle" type="button" aria-controls="primary-navigation" aria-expanded="false" data-navbar-toggle>
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggle-line" aria-hidden="true"></span>
            <span class="navbar-toggle-line" aria-hidden="true"></span>
            <span class="navbar-toggle-line" aria-hidden="true"></span>
        </button>

        <nav class="navbar-menu" id="primary-navigation" aria-label="Primary navigation" data-navbar-menu>
            <ul>
                <li><a href="<?= e(url('about/')) ?>">About</a></li>
                <li><a href="<?= e(url('services')) ?>">Products &amp; Services</a></li>
                <li><a class="<?= $isCalculators ? 'is-active' : '' ?>" href="<?= e(url('calculators/')) ?>">Calculators</a></li>
                <li><a href="<?= e(url('downloads/')) ?>">Downloads</a></li>
                <li><a href="<?= e(url('investor-relations/')) ?>">Investor Relations</a></li>
                <li><a href="<?= e(url('contact/')) ?>">Support</a></li>
            </ul>
        </nav>

        <a class="navbar-client-login" href="<?= e(url('signin')) ?>">Client Login</a>
        <a class="navbar-signin" href="<?= e(url('signin')) ?>">Open an Account</a>
    </div>
</header>
<script src="<?= e(url('js/navbar.js')) ?>" defer></script>
