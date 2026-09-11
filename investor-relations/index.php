<?php
require_once __DIR__ . '/../helpers/urlfetcher.php';
$siteBase = '../';
?>
<!DOCTYPE html>
<html class="policy-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investor Relations | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/policy.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="policy-page">
    <?php include __DIR__ . '/../templates/navbar.php'; ?>

    <main>
        <section class="policy-main" aria-labelledby="investor-relations-title">
            <div class="policy-hero">
                <p class="policy-breadcrumb">
                    <span>Home</span>
                    <span>&rsaquo;</span>
                    <strong>Investor Relations</strong>
                </p>
                <h1 id="investor-relations-title">Investor Relations</h1>
                <p>Access company information, regulatory disclosures, and investor communication channels for Gretex Share Broking Limited.</p>
            </div>

            <div class="policy-layout">
                <aside class="policy-toc" aria-labelledby="investor-relations-contents-title">
                    <h2 id="investor-relations-contents-title">Contents</h2>
                    <nav aria-label="Investor relations contents">
                        <a href="#overview" aria-current="true">Overview</a>
                        <a href="#disclosures">Disclosures</a>
                        <a href="#contact">Investor Contact</a>
                    </nav>
                </aside>

                <div class="policy-content">
                    <section id="overview" aria-labelledby="overview-title">
                        <h2 id="overview-title">Overview</h2>
                        <p>Gretex Share Broking Limited provides this section as a central route for investor-facing information and company updates.</p>
                    </section>

                    <section id="disclosures" aria-labelledby="disclosures-title">
                        <h2 id="disclosures-title">Disclosures</h2>
                        <p>Regulatory filings, shareholder communications, and other investor documents should be reviewed through the official channels published by the company.</p>
                    </section>

                    <section id="contact" aria-labelledby="investor-contact-title">
                        <h2 id="investor-contact-title">Investor Contact</h2>
                        <p>For investor-related queries, contact Gretex Share Broking Limited through the official support and compliance email addresses listed on this website.</p>
                    </section>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>
