<?php require_once __DIR__ . '/../helpers/urlfetcher.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Office RD Calculator - Gretex Financial</title>
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
                    <h1 class="calculator-page-title">Post Office RD Calculator</h1>
                    <p class="calculator-page-description">5-year recurring deposit at 6.7% p.a. (Govt. rate)</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <?php require_once __DIR__ . '/../templates/calculator-modern-ui.php'; ?>

                <div class="calculator-wrapper">
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About Post Office RD</h2>
                            <div class="calculator-info-content">
                                <p>5-year tenure, 6.7% p.a. Min &#8377;100/month. Government scheme.</p>
                            </div>
                        </div>
                    </div>
                    <div class="calculator-form-section">
                        <div class="calculator-card">
                            <h2 class="calculator-section-title">Calculate Post Office RD</h2>
                            <form class="calculator-form" id="calculatorForm" onsubmit="calcPORDResult(event)">
                                <div class="calculator-field">
                                    <label for="pord-deposit">Monthly Deposit (&#8377;)</label>
                                    <input type="number" id="pord-deposit" required min="100" value="5000">
                                    <small class="field-hint">5-year tenure, 6.7% fixed</small>
                                </div>
                                <div class="calculator-actions">
                                    <button type="submit" class="calculator-btn-calculate"><i data-lucide="calculator"></i> Calculate</button>
                                    <button type="button" class="calculator-btn-reset" onclick="document.getElementById('calculatorForm').reset();var w=document.getElementById('pordInlineWrap');if(w){w.classList.add('is-hidden');}var c=document.getElementById('pordResultsContent');if(c)c.innerHTML='';"><i data-lucide="refresh-cw"></i> Reset</button>
                                </div>
                            </form>
                            <div id="pordInlineWrap" class="calculator-inline-results is-hidden" aria-live="polite">
                                <div id="pordResultsContent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<script>
        lucide.createIcons();
        function calcPORDResult(e){e.preventDefault();
            // Reset previous reading first - clear results before calculating
            const pordResultsContent = document.getElementById('pordResultsContent');
            if (pordResultsContent) pordResultsContent.innerHTML = '';
            
            const dep=parseFloat(document.getElementById('pord-deposit').value);
            const r=calcPORD(dep);
            document.getElementById('pordResultsContent').innerHTML=`<div class="results-primary-card">
                <div class="results-main">
                    <div class="result-item"><span class="result-label">Total Investment (60 months):</span><span class="result-value">${formatCurrency(r.totalInvestment)}</span></div>
                    <div class="result-item"><span class="result-label">Interest Earned:</span><span class="result-value">${formatCurrency(r.interestEarned)}</span></div>
                    <div class="result-item highlight"><span class="result-label">Maturity Value:</span><span class="result-value">${formatCurrency(r.maturityValue)}</span></div>
                </div>
            </div>`;
            document.getElementById('pordInlineWrap').classList.remove('is-hidden');
        }
    </script>
    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>