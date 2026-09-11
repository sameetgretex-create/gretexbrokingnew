<?php
require_once __DIR__ . '/../helpers/urlfetcher.php';
$siteBase = '../';
?>
<!DOCTYPE html>
<html class="downloads-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Downloads | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/downloads.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="downloads-page">
    <?php include __DIR__ . '/../templates/navbar.php'; ?>

    <aside class="downloads-alert" aria-label="Complaint support">
        <span>Do you have a complaint?</span>
        <a href="../contact/">Submit a complaint</a>
    </aside>

    <main>
        <section class="downloads-main" aria-labelledby="downloads-title">
            <div class="downloads-hero">
                <p class="downloads-breadcrumb">
                    <span>Home</span>
                    <span>&rsaquo;</span>
                    <strong>Downloads</strong>
                </p>
                <h1 id="downloads-title">Resource Centre</h1>
                <p>Centralized access to client forms, exchange circulars, policy documents, and official resources for India&apos;s investing and broking ecosystem.</p>
            </div>

            <div class="downloads-layout">
                <aside class="downloads-sidebar" aria-label="Download categories">
                    <h2>Categories</h2>
                    <ul class="downloads-categories">
                        <li><button class="is-active" type="button" aria-pressed="true" data-download-tab="account">Account Opening Forms <span aria-hidden="true">&rsaquo;</span></button></li>
                        <li><button type="button" aria-pressed="false" data-download-tab="other">Other Forms</button></li>
                        <li><button type="button" aria-pressed="false" data-download-tab="customer">Information for Customers</button></li>
                    </ul>

                    <div class="downloads-verification">
                        <div class="downloads-verification-card">
                            <span>Verification</span>
                            <strong>Client Registry</strong>
                            <a href="../signin.php">Access Registry</a>
                        </div>
                    </div>
                </aside>

                <div class="downloads-content">
                    <div class="downloads-toolbar">
                        <label class="downloads-search">
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="m21 21-4.35-4.35"></path>
                                <circle cx="11" cy="11" r="7"></circle>
                            </svg>
                            <span class="sr-only">Search downloads</span>
                            <input type="search" placeholder="Search account opening forms..." data-download-search data-download-search-endpoint="search.php">
                        </label>

                        <div class="downloads-filters" role="group" aria-label="Quick filters">
                            <span>Quick filters:</span>
                            <button class="downloads-filter" type="button">Year: All</button>
                            <button class="downloads-filter" type="button">Type: All Documents</button>
                            <button class="downloads-filter-active" type="button">Recent</button>
                            <button class="downloads-filter" type="button">Most Viewed</button>
                        </div>
                    </div>

                    <nav class="downloads-pagination" aria-label="Downloads count">
                        <span data-download-count>Showing 8 account-opening forms</span>
                    </nav>

                    <div class="downloads-list" data-download-list>
                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/001</span>
                                </div>
                                <h2>Client Request for MTF</h2>
                                <p>Request form for clients opting into Margin Trading Facility access, subject to applicable terms and eligibility.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.02 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/client-request-for-mtf.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/client-request-for-mtf.pdf')) ?>" download aria-label="Download Client Request for MTF">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/002</span>
                                </div>
                                <h2>GSBL KYC Form - Individual</h2>
                                <p>KYC form for individual clients completing account opening and identity verification requirements.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>51.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/individual-kyc-15.10.2024_compressed.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/individual-kyc-15.10.2024_compressed.pdf')) ?>" download aria-label="Download GSBL KYC Form - Individual">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/003</span>
                                </div>
                                <h2>Individual KRA Form</h2>
                                <p>KRA documentation for individual applicants completing account opening and regulatory onboarding.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>2.5 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/individual-kra-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/individual-kra-form.pdf')) ?>" download aria-label="Download Individual KRA Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/004</span>
                                </div>
                                <h2>Non Individual KRA Form</h2>
                                <p>KRA form for non-individual applicants, entities, and other eligible account structures.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.8 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/non-individual-kra-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/non-individual-kra-form.pdf')) ?>" download aria-label="Download Non Individual KRA Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/005</span>
                                </div>
                                <h2>Declaration for Common Email Id &amp; Mobile Number</h2>
                                <p>Declaration form for clients using a common email address or mobile number across account relationships.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/declaration-for-common-email-id-&-mobile-number.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/declaration-for-common-email-id-&-mobile-number.pdf')) ?>" download aria-label="Download Declaration for Common Email Id and Mobile Number">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/006</span>
                                </div>
                                <h2>DP Tariff Sheet</h2>
                                <p>Depository participant tariff sheet covering account-related charges and applicable service fees.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>3.0 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/dp-tariff-sheet-15.10.2024.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/dp-tariff-sheet-15.10.2024.pdf')) ?>" download aria-label="Download DP Tariff Sheet">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/007</span>
                                </div>
                                <h2>Running-Account-Authorisation-Form</h2>
                                <p>Authorisation form for clients opting for running account settlement preferences and related instructions.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/running-account-authorisation-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/running-account-authorisation-form.pdf')) ?>" download aria-label="Download Running Account Authorisation Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="account">
                            <div>
                                <div class="download-kicker">
                                    <span>Account Opening Form</span>
                                    <span>REF: GSBL/AOF/008</span>
                                </div>
                                <h2>Segment Activation</h2>
                                <p>Form for activating additional eligible trading segments under an existing or new client account.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.6 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/account-opening-forms/segment-activation.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/account-opening-forms/segment-activation.pdf')) ?>" download aria-label="Download Segment Activation">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="other">
                            <div>
                                <div class="download-kicker">
                                    <span>Other Form</span>
                                    <span>REF: GSBL/OTH/001</span>
                                </div>
                                <h2>Signature Verification by the Banker</h2>
                                <p>Banker verification form for confirming client signature details where required for account servicing requests.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/other-forms/signature-verification-by-the-banker.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/other-forms/signature-verification-by-the-banker.pdf')) ?>" download aria-label="Download Signature Verification by the Banker">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/001</span>
                                </div>
                                <h2>Policies and Procedures for Client Dealings</h2>
                                <p>Client-facing policy document covering procedures and practices for account and trading-related dealings.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/policies-and-procedures-for-client-dealings.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/policies-and-procedures-for-client-dealings.pdf')) ?>" download aria-label="Download Policies and Procedures for Client Dealings">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/002</span>
                                </div>
                                <h2>Most Important Terms &amp; Conditions (MITC)</h2>
                                <p>Summary of key terms and conditions customers should review before using broking and related services.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/most-important-terms-&-conditions-mitc.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/most-important-terms-&-conditions-mitc.pdf')) ?>" download aria-label="Download Most Important Terms and Conditions MITC">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/003</span>
                                </div>
                                <h2>Internet &amp; Wireless Technology</h2>
                                <p>Customer information document covering internet and wireless trading technology usage and related awareness points.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/internet-&-wireless-technology.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/internet-&-wireless-technology.pdf')) ?>" download aria-label="Download Internet and Wireless Technology">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/004</span>
                                </div>
                                <h2>Guidance Note Do&apos;s and Don&apos;ts</h2>
                                <p>Guidance note outlining important do&apos;s and don&apos;ts for customers participating in market activities.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/guidance-note-do\'s-and-don\'ts.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/guidance-note-do\'s-and-don\'ts.pdf')) ?>" download aria-label="Download Guidance Note Do's and Don'ts">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/005</span>
                                </div>
                                <h2>Risk Disclosure Document for Capital Market and Derivatives Segments</h2>
                                <p>Risk disclosure document for customers trading or investing in capital market and derivatives segments.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/risk-disclosure-document-for-capital-market-and-derivatives-segments.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/risk-disclosure-document-for-capital-market-and-derivatives-segments.pdf')) ?>" download aria-label="Download Risk Disclosure Document for Capital Market and Derivatives Segments">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/006</span>
                                </div>
                                <h2>Rights and Obligations - Trading</h2>
                                <p>Customer rights and obligations document for trading account relationships and market participation.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-and-obligations-trading.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-and-obligations-trading.pdf')) ?>" download aria-label="Download Rights and Obligations Trading">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/007</span>
                                </div>
                                <h2>Rights and Obligations - DP</h2>
                                <p>Customer rights and obligations document for depository participant and demat account relationships.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>1.4 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-and-obligations-dp.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-and-obligations-dp.pdf')) ?>" download aria-label="Download Rights and Obligations DP">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/008</span>
                                </div>
                                <h2>Rights &amp; Obligation of Stock Brokers &amp; Clients for MTF on Letter Head</h2>
                                <p>Rights and obligations document for stock brokers and clients using Margin Trading Facility.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.2 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-&-obligation-of-stock-brokers-&-clients-for-mtf-on-letter-head.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/rights-&-obligation-of-stock-brokers-&-clients-for-mtf-on-letter-head.pdf')) ?>" download aria-label="Download Rights and Obligation of Stock Brokers and Clients for MTF on Letter Head">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="customer">
                            <div>
                                <div class="download-kicker">
                                    <span>Information for Customers</span>
                                    <span>REF: GSBL/IFC/009</span>
                                </div>
                                <h2>Procedure for Validating KRA Status</h2>
                                <p>Procedure document for customers validating KRA status during account opening or account servicing workflows.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/information-for-customers/procedure-for-validating-kra-status.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/information-for-customers/procedure-for-validating-kra-status.pdf')) ?>" download aria-label="Download Procedure for Validating KRA Status">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="other">
                            <div>
                                <div class="download-kicker">
                                    <span>Other Form</span>
                                    <span>REF: GSBL/OTH/002</span>
                                </div>
                                <h2>Modification Form</h2>
                                <p>Form for submitting client account modification requests and updating registered account information.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/other-forms/modification-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/other-forms/modification-form.pdf')) ?>" download aria-label="Download Modification Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="other">
                            <div>
                                <div class="download-kicker">
                                    <span>Other Form</span>
                                    <span>REF: GSBL/OTH/003</span>
                                </div>
                                <h2>Name Correction Form</h2>
                                <p>Form for submitting name correction requests along with the supporting documentation required for records updates.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/other-forms/name-correction-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/other-forms/name-correction-form.pdf')) ?>" download aria-label="Download Name Correction Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>

                        <article class="download-card" data-download-card data-download-category="other">
                            <div>
                                <div class="download-kicker">
                                    <span>Other Form</span>
                                    <span>REF: GSBL/OTH/004</span>
                                </div>
                                <h2>Account Closer Form</h2>
                                <p>Form for requesting account closure after completing applicable checks, balances, and account-servicing requirements.</p>
                                <div class="download-meta">
                                    <span>Jul 21, 2026</span>
                                    <span>0.1 MB PDF</span>
                                </div>
                            </div>
                            <div class="download-actions">
                                <a class="download-view" href="<?= e(assetUrl('assets/documents/other-forms/account-closer-form.pdf')) ?>" target="_blank" rel="noopener noreferrer">View Online</a>
                                <a class="download-file" href="<?= e(assetUrl('assets/documents/other-forms/account-closer-form.pdf')) ?>" download aria-label="Download Account Closure Form">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 3v12"></path>
                                        <path d="m7 10 5 5 5-5"></path>
                                        <path d="M5 21h14"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>

                    <div class="downloads-empty" data-download-empty hidden>
                        <h2>No documents available</h2>
                        <p>This category is ready for documents once files are uploaded.</p>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/downloads.js')) ?>"></script>
</body>

</html>
