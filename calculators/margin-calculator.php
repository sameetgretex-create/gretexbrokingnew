<?php require_once __DIR__ . '/../helpers/urlfetcher.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Margin Calculator - Gretex Financial</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/calculator-page.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/chatbot.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="<?= e(assetUrl('js/gretex-financial.js')) ?>"></script>
    <script src="<?= e(assetUrl('js/calculator-functions.js')) ?>"></script>
</head>

<body class="calculator-shell-page">
    <?php
    $siteBase = '../';
    include __DIR__ . '/../templates/navbar.php';
    ?>




    <main class="calculator-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <a href="index.php" class="back-link"><i data-lucide="arrow-left"></i><span>Back to Calculators</span></a>
                    <h1 class="calculator-page-title">Margin Calculator</h1>
                    <p class="calculator-page-description">Determine margin requirements for equity and derivative trading</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <?php require_once __DIR__ . '/../templates/calculator-modern-ui.php'; ?>

                <div class="calculator-wrapper">
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Margin Calculator</h2>
                            <div class="calculator-info-content">
                                <p>The <strong>Margin Calculator</strong> determines exact margin requirements for leveraged positions in equity, futures, and options. You don't need full capital ï¿½ margin allows leverage ï¿½ but understanding SPAN, exposure margin, and requirements is crucial.</p>
                                <p>This tool will integrate real-time exchange data for accurate SPAN margin, exposure margin, and total requirements based on volatility and exchange guidelines ï¿½ helping optimize capital, avoid margin calls, and plan position sizing.</p>
                                <h3>How Margin Works</h3>
                                <ul>
                                    <li><strong>SPAN:</strong> Risk-based margin from exchange; worst-case scenario; varies with volatility and time to expiry.</li>
                                    <li><strong>Exposure:</strong> 3ï¿½5% buffer beyond SPAN for extreme price moves.</li>
                                    <li><strong>By segment:</strong> Delivery 20ï¿½100%; Intraday (MIS) 10ï¿½20% (5ï¿½10x leverage); Futures 10ï¿½30%; Options sell SPAN+Exposure; Options buy = full premium.</li>
                                    <li><strong>Leverage example:</strong> &#8377;1L margin: Delivery &#8377;1L shares; Intraday 5x &#8377;5L positions; Futures 5x &#8377;5L notional.</li>
                                </ul>
                                <h3>Who Should Use</h3>
                                <p>F&amp;O traders, intraday traders, swing traders, portfolio margin users, risk managers. Critical for understanding capital requirements and avoiding forced liquidations.</p>
                                <h3>Margin Risks &amp; Safety</h3>
                                <p>Leverage amplifies profits AND losses. Margin calls can force liquidation at unfavorable prices. Volatility spikes increase requirements. Never use 100% margin; keep 30ï¿½40% buffer. Understand peak margin rules.</p>
                                <div class="callout-box">
                                    <strong>Coming Soon:</strong> This calculator requires real-time integration with NSE SPAN Margin API, BSE Margin Calculator, and live volatility data. We're working on secure API integration for accurate calculations. Meanwhile, check your broker's margin calculator.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Margin Calculator</h2>
                            <div class="results-primary-card margin-coming-soon-card">
                                <span class="coming-soon-icon"><i data-lucide="wrench"></i></span>
                                <h3>Coming Soon</h3>
                                <p>We're building real-time margin calculations. Check back soon or use our <a href="brokerage-calculator.php">Brokerage Calculator</a> for trading cost estimates.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>lucide.createIcons();</script>
    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>
