<?php
require_once __DIR__ . '/helpers/urlfetcher.php';
$siteBase = '';
?>
<!DOCTYPE html>
<html class="policy-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms and Conditions | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/policy.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="policy-page">
    <?php include __DIR__ . '/templates/navbar.php'; ?>

    <div class="policy-alert">
        <span>Do you have a complaint?</span>
        <a href="contact/">Submit a complaint</a>
    </div>

    <main>
        <section class="policy-main" aria-labelledby="terms-title">
            <div class="policy-hero">
                <p class="policy-breadcrumb">
                    <span>Home</span>
                    <span>&rsaquo;</span>
                    <strong>Terms and Conditions</strong>
                </p>
                <h1 id="terms-title">Terms and Conditions</h1>
                <p>Dummy terms and conditions content for Gretex Share Broking Limited. Replace this draft with reviewed legal copy before production use.</p>
            </div>

            <div class="policy-layout">
                <aside class="policy-toc" aria-labelledby="terms-contents-title">
                    <h2 id="terms-contents-title">Contents</h2>
                    <nav aria-label="Terms and conditions contents">
                        <a href="#acceptance" aria-current="true">Acceptance of Terms</a>
                        <a href="#eligibility">Eligibility and Access</a>
                        <a href="#account">Account and Platform Use</a>
                        <a href="#services">Services and Information</a>
                        <a href="#client-responsibilities">Client Responsibilities</a>
                        <a href="#risk-disclosure">Risk Disclosure</a>
                        <a href="#payments">Charges and Payments</a>
                        <a href="#intellectual-property">Intellectual Property</a>
                        <a href="#third-party-links">Third-Party Links</a>
                        <a href="#limitations">Limitation of Liability</a>
                        <a href="#suspension">Suspension or Termination</a>
                        <a href="#privacy">Privacy and Data</a>
                        <a href="#changes">Changes to Terms</a>
                        <a href="#governing-law">Governing Law</a>
                        <a href="#contact">Contact</a>
                    </nav>
                </aside>

                <div class="policy-content">
                    <section id="acceptance" aria-labelledby="acceptance-title">
                        <h2 id="acceptance-title">1. Acceptance of Terms</h2>
                        <p>These terms and conditions govern your access to and use of the Gretex Share Broking Limited website, digital interfaces, content, forms, and related online services.</p>
                        <p>By accessing this website or using any linked service, you agree to comply with these placeholder terms. Final language should be reviewed by the appropriate legal, compliance, and business teams.</p>
                    </section>

                    <section id="eligibility" aria-labelledby="eligibility-title">
                        <h2 id="eligibility-title">2. Eligibility and Access</h2>
                        <p>You may use this website only if you are legally capable of entering into binding obligations and are permitted to access broking, investment, or market-related services under applicable law.</p>
                        <ul class="policy-list-grid">
                            <li>You must provide accurate information</li>
                            <li>You must comply with applicable laws</li>
                            <li>You must not misuse platform access</li>
                            <li>You must keep credentials secure</li>
                            <li>You must follow account opening requirements</li>
                            <li>You must meet regulatory eligibility checks</li>
                        </ul>
                    </section>

                    <section id="account" aria-labelledby="account-title">
                        <h2 id="account-title">3. Account and Platform Use</h2>
                        <p>Access to certain features may require account creation, authentication, KYC completion, or approval by Gretex Share Broking Limited or its authorized service partners.</p>
                        <p>You are responsible for maintaining the confidentiality of your account credentials and for all activity conducted through your account.</p>
                    </section>

                    <section id="services" aria-labelledby="services-title">
                        <h2 id="services-title">4. Services and Information</h2>
                        <p>Website content is provided for general information and service access. It should not be treated as investment advice, tax advice, legal advice, or a recommendation unless expressly stated in an authorized document.</p>
                        <h3>Website Information May Include</h3>
                        <ul class="policy-list-grid">
                            <li>Service descriptions</li>
                            <li>Client forms</li>
                            <li>Market education material</li>
                            <li>Regulatory disclosures</li>
                            <li>Contact information</li>
                            <li>Platform access links</li>
                        </ul>
                    </section>

                    <section id="client-responsibilities" aria-labelledby="responsibilities-title">
                        <h2 id="responsibilities-title">5. Client Responsibilities</h2>
                        <p>Users and clients are responsible for reviewing all applicable documents, understanding risks, providing accurate information, and complying with laws, exchange rules, depository rules, and Gretex policies.</p>
                        <ul class="policy-list-grid">
                            <li>Review account documents carefully</li>
                            <li>Maintain updated contact details</li>
                            <li>Use official payment channels only</li>
                            <li>Report unauthorized access promptly</li>
                            <li>Understand order and product risks</li>
                            <li>Follow applicable margin requirements</li>
                        </ul>
                    </section>

                    <section id="risk-disclosure" aria-labelledby="risk-title">
                        <h2 id="risk-title">6. Risk Disclosure</h2>
                        <p>Trading and investing in securities, derivatives, commodities, and market-linked products involves risk, including possible loss of capital. Past performance is not indicative of future returns.</p>
                        <p>Users should read all risk disclosure documents, rights and obligations, policies, tariff sheets, and product-specific disclosures before using any service.</p>
                    </section>

                    <section id="payments" aria-labelledby="payments-title">
                        <h2 id="payments-title">7. Charges and Payments</h2>
                        <p>Charges, fees, taxes, penalties, and other amounts may apply as per active tariff sheets, exchange rules, depository rules, regulatory requirements, and client agreements.</p>
                        <p>Payments should be made only through authorized channels. Users should not transfer funds to unofficial accounts or act on unverified payment instructions.</p>
                    </section>

                    <section id="intellectual-property" aria-labelledby="ip-title">
                        <h2 id="ip-title">8. Intellectual Property</h2>
                        <p>All website content, layout, trademarks, logos, documents, graphics, text, and other materials are owned by or licensed to Gretex Share Broking Limited unless otherwise stated.</p>
                        <p>You may not copy, reproduce, modify, distribute, or exploit website content without prior written permission except where permitted by law.</p>
                    </section>

                    <section id="third-party-links" aria-labelledby="third-party-title">
                        <h2 id="third-party-title">9. Third-Party Links</h2>
                        <p>This website may include links to third-party websites, services, exchanges, regulators, depositories, or tools. These links are provided for convenience and may be governed by separate terms.</p>
                    </section>

                    <section id="limitations" aria-labelledby="limitations-title">
                        <h2 id="limitations-title">10. Limitation of Liability</h2>
                        <p>To the extent permitted by applicable law, Gretex Share Broking Limited will not be liable for indirect, incidental, consequential, or special losses arising from website access, service interruptions, third-party links, or reliance on general website content.</p>
                    </section>

                    <section id="suspension" aria-labelledby="suspension-title">
                        <h2 id="suspension-title">11. Suspension or Termination</h2>
                        <p>Access to website features, accounts, or services may be restricted, suspended, or terminated for security, compliance, operational, legal, regulatory, or misuse-related reasons.</p>
                    </section>

                    <section id="privacy" aria-labelledby="privacy-title">
                        <h2 id="privacy-title">12. Privacy and Data</h2>
                        <p>Use of this website may involve collection and processing of personal information. Please refer to the privacy policy for details on data handling practices.</p>
                    </section>

                    <section id="changes" aria-labelledby="changes-title">
                        <h2 id="changes-title">13. Changes to Terms</h2>
                        <p>These terms may be updated periodically. Continued use of the website after updates indicates acceptance of the revised terms, subject to applicable law.</p>
                    </section>

                    <section id="governing-law" aria-labelledby="law-title">
                        <h2 id="law-title">14. Governing Law</h2>
                        <p>These terms are intended to be governed by the laws of India, subject to applicable regulatory, exchange, depository, and dispute resolution requirements.</p>
                    </section>

                    <section id="contact" aria-labelledby="contact-title">
                        <h2 id="contact-title">15. Contact</h2>
                        <p>For questions about these terms, please contact Gretex Share Broking Limited through the official contact details published on this website.</p>
                    </section>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/privacy-policy.js')) ?>"></script>
</body>

</html>
