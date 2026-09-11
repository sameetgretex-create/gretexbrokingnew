<?php
require_once __DIR__ . '/../helpers/urlfetcher.php';

$siteBase = '../';
$calculators = require __DIR__ . '/data.php';
$categories = [
    'all' => 'All Calculators',
    'investment' => 'Investing',
    'retirement' => 'Savings & Retirement',
    'tax' => 'Tax',
    'trading' => 'Trading & Charges',
    'interest' => 'Deposits & Interest',
];
$categoryCounts = array_fill_keys(array_keys($categories), 0);
$categoryCounts['all'] = count($calculators);

foreach ($calculators as $calculator) {
    if (isset($categoryCounts[$calculator['category']])) {
        $categoryCounts[$calculator['category']]++;
    }
}

foreach ($calculators as &$calculator) {
    if (isset($calculator['image'])) {
        $calculator['image'] = preg_replace('#^\.\./#', '', (string) $calculator['image']);
    }
}
unset($calculator);
?>
<!DOCTYPE html>
<html class="calculators-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculators | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/calculators.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="calculators-index-page">
    <?php include __DIR__ . '/../templates/navbar.php'; ?>

    <main>
        <section class="calculators-hero" aria-labelledby="calculators-title">
            <div class="calculators-hero-inner">
                <div class="calculators-hero-copy">
                    <span class="calculators-hero-label">Financial calculators</span>
                    <h1 id="calculators-title">Financial calculators for planning and comparison.</h1>
                    <form class="calculators-search" role="search" action="index.php" method="get" data-calculator-search-form>
                        <label class="visually-hidden" for="calculatorSearch">Search calculators</label>
                        <input id="calculatorSearch" type="search" name="q" placeholder="Search SIP, FD, brokerage, tax..." autocomplete="off" data-calculator-search>
                        <button class="calculators-search-clear" type="button" hidden data-calculator-clear>Clear</button>
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
        </section>

        <section class="calculators-directory" aria-labelledby="calculator-list-title">
            <div class="calculators-directory-inner">
                <aside class="calculators-category-panel" aria-label="Calculator categories">
                    <?php foreach ($categories as $categoryKey => $categoryLabel): ?>
                        <button class="calculator-category-button<?= $categoryKey === 'all' ? ' is-active' : '' ?>" type="button" data-category-filter="<?= e($categoryKey) ?>" data-category-label="<?= e($categoryLabel) ?>" aria-pressed="<?= $categoryKey === 'all' ? 'true' : 'false' ?>">
                            <span><?= e($categoryLabel) ?></span>
                            <small><?= e((string) $categoryCounts[$categoryKey]) ?></small>
                        </button>
                    <?php endforeach; ?>
                </aside>

                <div class="calculators-list-panel">
                    <header class="calculators-directory-header">
                        <h2 id="calculator-list-title">Choose a calculator</h2>
                        <p class="calculators-result-status" data-calculator-status>
                            <strong>All Calculators</strong>
                            <span><?= e((string) $categoryCounts['all']) ?> calculators</span>
                        </p>
                        <p class="visually-hidden" aria-live="polite" aria-atomic="true" data-calculator-announcement>
                            All Calculators, <?= e((string) $categoryCounts['all']) ?> calculators
                        </p>
                    </header>

                    <div class="calculators-card-grid" role="group" aria-label="Financial calculators">
                        <?php foreach ($calculators as $calculator): ?>
                            <a class="calculator-directory-card" href="<?= e($calculator['href']) ?>" data-calculator-card data-category="<?= e($calculator['category']) ?>" data-search="<?= e(strtolower($calculator['title'] . ' ' . $calculator['description'] . ' ' . $calculator['category'])) ?>">
                                <span class="calculator-directory-copy">
                                    <strong><?= e($calculator['title']) ?></strong>
                                    <span><?= e($calculator['description']) ?></span>
                                    <span class="calculator-directory-cta">Open calculator <span aria-hidden="true">&rarr;</span></span>
                                </span>
                                <span class="calculator-directory-visual" aria-hidden="true">
                                    <img src="<?= e(assetUrl($calculator['image'])) ?>" alt="" loading="eager" decoding="sync">
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="calculators-no-results" hidden data-calculator-empty>
                        <p>No calculators found. Try another search term.</p>
                        <div class="calculators-suggestions" role="group" aria-label="Suggested alternatives">
                            <button type="button" data-search-suggestion="SIP">SIP</button>
                            <button type="button" data-search-suggestion="Fixed Deposit">Fixed Deposit</button>
                            <button type="button" data-search-suggestion="Brokerage">Brokerage</button>
                            <button type="button" data-search-suggestion="ELSS">ELSS</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/calculators.js')) ?>" defer></script>
</body>

</html>
