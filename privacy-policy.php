<?php
require_once __DIR__ . '/helpers/urlfetcher.php';
$siteBase = '';
?>
<!DOCTYPE html>
<html class="policy-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy | Gretex Share Broking Limited</title>
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
        <section class="policy-main" aria-labelledby="policy-title">
            <div class="policy-hero">
                <p class="policy-breadcrumb">
                    <span>Home</span>
                    <span>&rsaquo;</span>
                    <strong>Privacy Policy</strong>
                </p>
                <h1 id="policy-title">Privacy Policy</h1>
                <p>Dummy privacy policy content for Gretex Share Broking Limited. Replace this draft with reviewed legal copy before production use.</p>
            </div>

            <div class="policy-layout">
                <aside class="policy-toc" aria-labelledby="policy-contents-title">
                    <h2 id="policy-contents-title">Contents</h2>
                    <nav aria-label="Privacy policy contents">
                        <a href="#introduction" aria-current="true">Introduction</a>
                        <a href="#information-we-collect">Information We Collect</a>
                        <a href="#how-we-collect">How We Collect Information</a>
                        <a href="#processing-purpose">Purpose of Processing Personal Information</a>
                        <a href="#legal-basis">Legal Basis of Processing</a>
                        <a href="#disclosure">Disclosure of Information</a>
                        <a href="#international-transfers">International Transfers</a>
                        <a href="#data-security">Data Security</a>
                        <a href="#cookies">Cookies</a>
                        <a href="#data-retention">Data Retention</a>
                        <a href="#your-rights">Your Rights</a>
                        <a href="#third-party">Third-Party Websites</a>
                        <a href="#children">Children's Privacy</a>
                        <a href="#updates">Updates to this Privacy Policy</a>
                        <a href="#contact-us">Contact Us</a>
                        <a href="#regulatory">Regulatory Statement</a>
                    </nav>
                </aside>

                <div class="policy-content">
                    <section id="introduction" aria-labelledby="introduction-title">
                        <h2 id="introduction-title">1. Introduction</h2>
                        <p>Gretex Share Broking Limited is committed to protecting the privacy and confidentiality of personal information entrusted to us by clients, prospective clients, website visitors, business partners, and other stakeholders.</p>
                        <p>This privacy policy explains how we collect, use, process, store, disclose, and protect personal information when you visit our website or interact with us.</p>
                        <p>This policy has been prepared as placeholder content for layout purposes and should be replaced with final reviewed legal and compliance copy.</p>
                        <ul>
                            <li>Applicable data protection laws and regulatory guidance;</li>
                            <li>Information technology and reasonable security practice requirements;</li>
                            <li>Stock broking, depository, KYC, and AML obligations;</li>
                            <li>Other applicable laws, rules, circulars, and business requirements.</li>
                        </ul>
                    </section>

                    <section id="information-we-collect" aria-labelledby="information-title">
                        <h2 id="information-title">2. Information We Collect</h2>
                        <p>Depending on the nature of your interaction with us, we may collect information including:</p>

                        <h3>Personal Information</h3>
                        <ul class="policy-list-grid">
                            <li>Full name</li>
                            <li>Residential address</li>
                            <li>Email address</li>
                            <li>Telephone number</li>
                            <li>Date of birth</li>
                            <li>Nationality</li>
                            <li>PAN</li>
                            <li>Aadhaar, where legally permissible</li>
                            <li>Bank account details</li>
                            <li>Demat details</li>
                            <li>KYC information</li>
                            <li>Beneficial ownership information</li>
                        </ul>

                        <h3>Corporate Information</h3>
                        <p>Where clients are entities, we may collect:</p>
                        <ul class="policy-list-grid">
                            <li>Company information</li>
                            <li>Constitutional documents</li>
                            <li>UBO information</li>
                            <li>Board resolutions</li>
                            <li>Authorized signatories</li>
                            <li>Shareholding structure</li>
                        </ul>

                        <h3>Technical Information</h3>
                        <p>When using our website, we may automatically collect:</p>
                        <ul class="policy-list-grid">
                            <li>IP address</li>
                            <li>Browser type</li>
                            <li>Device information</li>
                            <li>Operating system</li>
                            <li>Pages visited</li>
                            <li>Website usage statistics</li>
                            <li>Cookie information</li>
                            <li>Session information</li>
                        </ul>
                    </section>

                    <section id="how-we-collect" aria-labelledby="collection-title">
                        <h2 id="collection-title">3. How We Collect Information</h2>
                        <p>We may collect information through:</p>
                        <ul class="policy-list-grid">
                            <li>Website contact forms</li>
                            <li>Investor onboarding documentation</li>
                            <li>KYC documentation</li>
                            <li>Subscription documents</li>
                            <li>Telephone conversations</li>
                            <li>Emails</li>
                            <li>Meetings</li>
                            <li>Regulatory filings</li>
                            <li>Service providers</li>
                            <li>Publicly available information where legally permissible</li>
                        </ul>
                    </section>

                    <section id="processing-purpose" aria-labelledby="purpose-title">
                        <h2 id="purpose-title">4. Purpose of Processing Personal Information</h2>
                        <p>We process personal information for legitimate business and regulatory purposes including:</p>
                        <ul class="policy-list-grid">
                            <li>Client onboarding</li>
                            <li>KYC verification</li>
                            <li>AML compliance</li>
                            <li>FATCA and CRS compliance</li>
                            <li>Due diligence</li>
                            <li>Investor servicing</li>
                            <li>Operational processing</li>
                            <li>Regulatory reporting</li>
                        </ul>
                    </section>

                    <section id="legal-basis" aria-labelledby="legal-title">
                        <h2 id="legal-title">5. Legal Basis of Processing</h2>
                        <p>We may process information where required by law, where necessary to perform a contract, where required for legitimate business interests, or where consent has been provided for a specific purpose.</p>
                    </section>

                    <section id="disclosure" aria-labelledby="disclosure-title">
                        <h2 id="disclosure-title">6. Disclosure of Information</h2>
                        <p>Information may be shared with regulators, exchanges, depositories, technology providers, auditors, legal advisors, payment providers, and other authorized parties where required for service delivery, compliance, security, or legal reasons.</p>
                    </section>

                    <section id="international-transfers" aria-labelledby="transfers-title">
                        <h2 id="transfers-title">7. International Transfers</h2>
                        <p>Where information is processed or stored outside India, we will take reasonable steps to ensure that appropriate safeguards are used according to applicable requirements.</p>
                    </section>

                    <section id="data-security" aria-labelledby="security-title">
                        <h2 id="security-title">8. Data Security</h2>
                        <p>We maintain reasonable technical, administrative, and organizational safeguards to protect personal information from unauthorized access, alteration, disclosure, misuse, or loss.</p>
                    </section>

                    <section id="cookies" aria-labelledby="cookies-title">
                        <h2 id="cookies-title">9. Cookies</h2>
                        <p>Our website may use cookies and similar technologies to support site functionality, analytics, security, user preferences, and performance monitoring.</p>
                    </section>

                    <section id="data-retention" aria-labelledby="retention-title">
                        <h2 id="retention-title">10. Data Retention</h2>
                        <p>We retain information for as long as necessary for service, business, regulatory, audit, legal, and dispute resolution purposes.</p>
                    </section>

                    <section id="your-rights" aria-labelledby="rights-title">
                        <h2 id="rights-title">11. Your Rights</h2>
                        <p>Subject to applicable law and regulatory retention requirements, users may request access, correction, updates, or other permitted actions regarding their personal information.</p>
                    </section>

                    <section id="third-party" aria-labelledby="third-party-title">
                        <h2 id="third-party-title">12. Third-Party Websites</h2>
                        <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those external websites.</p>
                    </section>

                    <section id="children" aria-labelledby="children-title">
                        <h2 id="children-title">13. Children's Privacy</h2>
                        <p>Our services are not intended for children. We do not knowingly collect personal information from children except where required by law or applicable account processes.</p>
                    </section>

                    <section id="updates" aria-labelledby="updates-title">
                        <h2 id="updates-title">14. Updates to this Privacy Policy</h2>
                        <p>This privacy policy may be updated from time to time. Updates will be posted on this page with the revised effective date where applicable.</p>
                    </section>

                    <section id="contact-us" aria-labelledby="contact-title">
                        <h2 id="contact-title">15. Contact Us</h2>
                        <p>For privacy-related questions, please contact the Gretex Share Broking support or compliance team through the official contact details published on this website.</p>
                    </section>

                    <section id="regulatory" aria-labelledby="regulatory-title">
                        <h2 id="regulatory-title">16. Regulatory Statement</h2>
                        <p>This placeholder policy should be read together with applicable exchange, depository, SEBI, KYC, AML, and information technology requirements.</p>
                    </section>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/privacy-policy.js')) ?>"></script>
</body>

</html>
