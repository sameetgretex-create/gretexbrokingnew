<?php
require_once __DIR__ . '/helpers/urlfetcher.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= e(url()) ?>">
    <title>Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/index.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body>
    <?php include __DIR__ . '/templates/navbar.php'; ?>

    <main id="main-content" class="page-main">
        <section class="hero-section hero-section-modern" aria-labelledby="hero-title">
            <div class="hero-inner">
                <div class="hero-content">
                    <p class="hero-eyebrow">Gretex Share Broking Limited</p>
                    <h1 id="hero-title">Markets move fast.<br>Move with confidence.</h1>
                    <p class="hero-intro">Trade, invest and monitor opportunities through a platform built for decisive
                        market participation, transparent execution and dependable account support.</p>

                    <div class="hero-actions">
                        <a class="hero-primary-link" href="signin.php">Start trading <span
                                aria-hidden="true">-&gt;</span></a>
                        <a class="hero-secondary-link" href="about/">Learn more <span
                                aria-hidden="true">-&gt;</span></a>
                    </div>

                    <ul class="hero-feature-list">
                        <li class="hero-feature">
                            <span class="hero-feature-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" focusable="false">
                                    <path
                                        d="M4 9.5h16v9.25a1.75 1.75 0 0 1-1.75 1.75H5.75A1.75 1.75 0 0 1 4 18.75V9.5Zm4-6h8v3H8v-3Zm-4.25 3h16.5A1.75 1.75 0 0 1 22 8.25V11H2V8.25A1.75 1.75 0 0 1 3.75 6.5Z" />
                                </svg>
                            </span>
                            <span>
                                <strong>Market access</strong>
                                <small>Equity, derivatives, IPOs and mutual funds.</small>
                            </span>
                        </li>
                        <li class="hero-feature">
                            <span class="hero-feature-icon" aria-hidden="true">
                                <svg viewBox="0 0 24 24" focusable="false">
                                    <path
                                        d="M12 3 3.5 7.25v1.5L12 13l8.5-4.25v-1.5L12 3Zm-6.5 8.28v5.48L12 20l6.5-3.24v-5.48L12 14.5l-6.5-3.22Z" />
                                </svg>
                            </span>
                            <span>
                                <strong>Depository services</strong>
                                <small>Structured demat support and account servicing.</small>
                            </span>
                        </li>
                    </ul>
                </div>

                <div class="hero-collage">
                    <div class="hero-collage-grid">
                        <figure class="hero-collage-frame hero-collage-frame-top-left" aria-hidden="true">
                            <img src="<?= e(assetUrl('assets/images/main-hero-banner.png')) ?>" alt="">
                            <span class="hero-signal-badge">
                                <svg viewBox="0 0 24 24" focusable="false">
                                    <path
                                        d="M7.2 5.2c2.1 4.5 2.1 9.1 0 13.6M12 4c2.4 5.3 2.4 10.7 0 16M16.8 2.8c2.8 6.1 2.8 12.3 0 18.4" />
                                </svg>
                            </span>
                            <span class="hero-floating-card hero-floating-card-top">
                                <span class="hero-floating-icon">EQ</span>
                                <span>
                                    <small>Received</small>
                                    <strong><span class="hero-odometer" data-hero-odometer data-prefix="&#8377;"
                                            data-value="1.5" data-suffix="L">&#8377;1.5L</span> credit</strong>
                                </span>
                            </span>
                        </figure>
                        <figure class="hero-collage-frame hero-collage-frame-top-right" aria-hidden="true">
                            <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&amp;fit=crop&amp;w=900&amp;q=80"
                                alt="">
                            <span class="hero-floating-card hero-floating-card-mid">
                                <span class="hero-floating-avatar">G</span>
                                <span>
                                    <strong>Portfolio tools</strong>
                                    <small>Live insights</small>
                                </span>
                                <em>+12.50</em>
                            </span>
                        </figure>
                        <figure class="hero-collage-frame hero-collage-frame-bottom-left" aria-hidden="true">
                            <img src="<?= e(assetUrl('assets/images/phone-showcase-cta.jpg')) ?>" alt="">
                        </figure>
                        <a class="hero-service-tile" href="signin.php">
                            <span>Digital investing</span>
                            <strong>WE PROVIDE BEST SERVICES</strong>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--
        <section class="hero-section hero-section-legacy" aria-labelledby="hero-title">
            <div class="hero-visual" aria-hidden="true">
                <img src="<?= e(assetUrl('assets/images/main-hero-banner.png')) ?>" alt="main-banner">
            </div>

            <div class="hero-inner">
                <div class="hero-content">
                    <h1 id="hero-title">Markets move fast.<br>Move with confidence.</h1>
                    <div class="hero-copy-row">
                        <p>Trade, invest and monitor opportunities through a platform built for decisive market
                            participation.</p>
                        <a class="hero-primary-link" href="signin.php">Start trading <span
                                aria-hidden="true">-&gt;</span></a>
                    </div>
                </div>
            </div>
        </section>
        -->

        <section class="accreditation-strip" aria-label="Accreditations and partners">
            <div class="accreditation-inner">
                <p>Accredited with trusted market institutions</p>
                <div class="accreditation-carousel" aria-hidden="true">
                    <div class="accreditation-track">
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-bse">
                            <img src="<?= e(assetUrl('assets/images/BSE-India-Logo.png')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-nse">
                            <img src="<?= e(assetUrl('assets/images/NSE-Logo.jpg')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-nsdl">
                            <img src="<?= e(assetUrl('assets/images/nsdl-logo.png')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-sebi">
                            <img src="<?= e(assetUrl('assets/images/sebi-logo.png')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-bse">
                            <img src="<?= e(assetUrl('assets/images/BSE-India-Logo.png')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-nse">
                            <img src="<?= e(assetUrl('assets/images/NSE-Logo.jpg')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-nsdl">
                            <img src="<?= e(assetUrl('assets/images/nsdl-logo.png')) ?>" alt="">
                        </span>
                        <span class="accreditation-logo accreditation-logo-image accreditation-logo-sebi">
                            <img src="<?= e(assetUrl('assets/images/sebi-logo.png')) ?>" alt="">
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <div class="disclaimer-popup is-hidden" role="dialog" aria-modal="false"
            aria-labelledby="disclaimer-popup-title" data-disclaimer-popup>
            <div class="disclaimer-popup-panel">
                <button class="disclaimer-popup-close" type="button" aria-label="Close disclaimer"
                    data-disclaimer-close>&times;</button>
                <p class="disclaimer-popup-label">Important disclaimer</p>
                <h2 id="disclaimer-popup-title">Investor information</h2>
                <div class="disclaimer-popup-copy">Attention Investors "KYC is one time exercise while dealing in
                    securities
                    markets - once KYC is done through a SEBI registered intermediary (broker, DP, Mutual Fund
                    etc.), you need not
                    undergo the same process again when you approach another intermediary."If you are not updated
                    your latest
                    income details in demat &amp; trading a/c than update it as soon as possible. If you are not
                    registered your
                    KYC ( as per SEBI guideline), than send us immediately KYC form along with proof of address
                    &amp; photo ID.
                    For the benefit of the investors SEBI has directed Depositories to send Consolidated Account
                    Statement (CAS)
                    for securities held in demat form with the Depositories. However, if you do not wish to receive
                    the CAS, you
                    may write to your DP separately. As per SEBI Circular on Delivery Instruction slip(DIS), old DIS
                    will not
                    valid (issued before October,2014) from 07 Jan., 2016, Kindly contact to the DP for New DIS. DP
                    will not
                    responsible for any financial losses due to old DIS.Prevent Unauthorized Transactions in your
                    demat account
                    --&gt; Update your Mobile Number with your Depository Participant. Receive alerts on your
                    Registered Mobile
                    for all debit and other important transactions in your demat account directly from CDSL on the
                    same day issued
                    in the interest of investors.

                    Do not keep funds idle with the Stock Broker. Please note that your Stock Broker has to return
                    the credit
                    balance lying with them, within three working days in case you have not done any transaction
                    within last 30
                    calendar days. Please note that in case of default of a Member, claim for funds and
                    securities/commodities,
                    without any transaction on the Exchange will not be accepted by the relevant Committee of the
                    Exchange as per
                    the approved norms. Check the frequency of accounts settlement opted for. If you have opted for
                    running
                    account, please ensure that your Stock Broker settles your account and, in any case, not later
                    than once in 90
                    days or 30 days if you have opted for 30 days settlement Stock Brokers are not permitted to
                    accept transfer
                    of securities as margin. Securities offered as margin / collateral MUST remain in the account of
                    the client
                    and can be pledged to the broker only by way of margin pledge, created in the Depository system.
                    Clients
                    are not permitted to place any securities with the Broker or associate of the Broker or
                    authorized person of
                    the Broker for any reason. Broker can take securities belonging to clients only for settlement
                    of securities
                    sold by the client. Always keep your contact details, viz. mobile number / email ID updated with
                    the Broker.
                    Email and mobile number is mandatory and you must provide the same to your Broker for updation
                    in Exchange
                    records. You must immediately take up the matter with Broker / Exchange if you are not receiving
                    the messages
                    from Exchange / Depositories regularly. Don't ignore any emails / SMSs received from the
                    Exchange for
                    trades done by you. Verify the same with the contract notes / statement of accounts received
                    from your Stock
                    Broker and report discrepancy, if any, to your Broker in writing immediately and if the Broker
                    does not
                    respond, please take this up with the Exchange / Depositories forthwith. Check messages sent by
                    Exchanges on
                    a weekly basis regarding funds and securities balances reported by the Stock Broker, compare it
                    with the
                    weekly statement of account sent by Stock Broker and immediately raise a concern to the Exchange
                    if you notice
                    any discrepancy. Please do not transfer funds, for the purposes of trading to anyone, including
                    an
                    authorized person or an associate of the Stock Broker, other than a SEBI registered Stock
                    Broker. Do not
                    deal with unregistered intermediaries (who are not registered with SEBI/Exchanges). Advisory
                    Investors:
                    Ensure that pay-out of funds/securities is received in your account within 1 working day from
                    the date of
                    pay-out. Be careful while executing the PoA (Power of Attorney) - specify all the rights that
                    the stock
                    broker can exercise and timeframe for which PoA is valid. It may be noted that PoA is not a
                    mandatory
                    requirement as per SEBI / Exchanges. Register for online applications viz Speed-e and Easiest
                    provided by
                    Depositories for online delivery of securities as an alternative to PoA. Ensure that you receive
                    Contract
                    Notes within 24 hours of your trades and Statement of Account at least once in a quarter from
                    your Stock
                    Broker. Please note that securities provided by you towards margin are not permitted to be
                    pledged by your
                    Stock Broker for raising funds. If you have opted for running account, please ensure that the
                    stock broker
                    settles your account regularly and in any case not later than 90 days (or 30 days if you have
                    opted for 30
                    days settlement). Do not keep funds and securities idle with the Stock Broker. Regularly login
                    into your
                    account to verify balances and verify the demat statement received from depositories for
                    correctness. Check
                    messages sent by Exchanges on a monthly basis regarding funds and securities balances reported
                    by the trading
                    member and immediately raise a concern if you notice a discrepancy. Always keep your contact
                    details viz
                    Mobile number / Email ID updated with the stock broker. You may take up the matter with Stock
                    Broker /
                    Exchange if you are not receiving the messages from Exchange / Depositories regularly. If you
                    observe any
                    discrepancies in your account or settlements, immediately take up the same with your stock
                    broker and if the
                    Stock Broker does not respond, with the Exchange/Depositories</div>
            </div>
        </div>

        <div class="intro-section reference-intro-section">
            <div class="intro-section-inner">
                <div class="intro-section-header">
                    <span class="intro-section-label">About us</span>
                    <div class="intro-section-divider"></div>
                </div>
                <div class="intro-section-heading">
                    <h2>Structured access to trading, investing and depository services</h2>
                </div>
                <div class="intro-section-content">
                    <div class="intro-section-image">
                        <div class="intro-image-reveal">
                            <img src="<?= e(assetUrl('assets/images/app-showcase-image.png')) ?>"
                                alt="Capital market advisory documents and financial planning notes">
                        </div>
                        <div class="intro-metric-card intro-metric-pnl intro-section-pnl-card">
                            <span>Today's P&amp;L</span>
                            <strong>&#8377; 8,45,957.00 <em>(6.35%)</em></strong>
                            <small>on 4 Positions</small>
                        </div>
                        <div class="intro-metric-card intro-metric-margin intro-section-mtf-card">
                            <span>Margin Funding</span>
                            <div class="intro-margin-grid">
                                <span><small>LTP</small><strong>575.15</strong></span>
                                <span><small>With MTF</small><strong>143.79</strong></span>
                                <span><small>Leverage</small><strong>4.00X</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="intro-section-text-container">
                        <div class="intro-section-text">
                            <p>Gretex Share Broking Limited is a SEBI-registered stockbroker and depository participant
                                providing structured access to India's capital markets through digital platforms and
                                assisted service channels. The company supports clients across equity, derivatives,
                                IPOs, mutual funds, margin trading, and demat-related services, with an emphasis on
                                disciplined execution, transparent processes, and dependable account support.</p>
                            <p>Our operating framework is built around market access, regulatory compliance, and
                                practical client servicing. From account opening and trading support to depository
                                services, research access, and transaction-related assistance, each interaction is
                                managed through defined processes designed to maintain accuracy, clarity, and alignment
                                with applicable market requirements.</p>
                            <p>As financial markets and investor expectations continue to evolve, Gretex remains focused
                                on strengthening the systems, platforms, and service standards that support informed
                                market participation. Our role extends beyond order execution &mdash; we work to provide
                                clients with a connected environment for trading, investing, account management, and
                                ongoing support, while maintaining appropriate operational controls and regulatory
                                discipline.</p>
                        </div>
                        <a class="intro-section-button" href="about/">About us <span aria-hidden="true">-&gt;</span></a>
                    </div>
                </div>
            </div>
        </div>

        <section class="services-section" aria-labelledby="services-title">
            <div class="services-container">
                <div class="services-header">
                    <div class="services-heading">
                        <p class="services-eyebrow">PRODUCTS &amp; SERVICES</p>
                        <h2 id="services-title">Market access for the way you trade and invest</h2>
                        <p>Access trading, investment and depository services through Gretex&rsquo;s digital platforms
                            and assisted service channels.</p>
                    </div>
                    <a class="services-header-cta" href="signin.php">Open an Account <span
                            aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="services-grid">
                    <a class="service-card service-card-equity" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Equity Trading</h3>
                            <p>Trade listed equities with live market access, order tools and portfolio visibility.</p>
                            <span class="service-card-link">Explore Equity <span aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration" src="<?= e(assetUrl('assets/images/equity-tradings.png')) ?>" alt=""
                                loading="lazy" decoding="async">
                        </span>
                    </a>

                    <a class="service-card service-card-derivatives" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Futures &amp; Options</h3>
                            <p>Access exchange-traded derivatives for eligible hedging and trading strategies.</p>
                            <span class="service-card-link">Explore F&amp;O <span
                                    aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration"
                                src="<?= e(assetUrl('assets/images/rupee-recurring-returns-illustration.png')) ?>" alt="" loading="lazy"
                                decoding="async">
                        </span>
                    </a>

                    <a class="service-card service-card-ipo" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Initial Public Offerings</h3>
                            <p>Apply for eligible public issues and track application status through digital channels.
                            </p>
                            <span class="service-card-link">Explore IPOs <span aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration" src="<?= e(assetUrl('assets/images/initial-public-offerings.png')) ?>" alt=""
                                loading="lazy" decoding="async">
                        </span>
                    </a>

                    <a class="service-card service-card-mutual" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Mutual Funds &amp; SIPs</h3>
                            <p>Invest through lump-sum and systematic plans aligned to your investment horizon.</p>
                            <span class="service-card-link">Explore Funds <span aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration" src="<?= e(assetUrl('assets/images/interest-savings-illustration.png')) ?>"
                                alt="" loading="lazy" decoding="async">
                        </span>
                    </a>

                    <a class="service-card service-card-margin" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Margin Trading Facility</h3>
                            <p>Use approved funding limits for eligible securities, subject to risk requirements.</p>
                            <span class="service-card-link">Explore MTF <span aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration" src="<?= e(assetUrl('assets/images/margin.png')) ?>" alt="" loading="lazy"
                                decoding="async">
                        </span>
                    </a>

                    <a class="service-card service-card-demat" href="signin.php">
                        <div class="service-card-copy">
                            <h3>Depository Services</h3>
                            <p>Manage holdings, statements and securities-related account services in one place.</p>
                            <span class="service-card-link">Explore Demat <span aria-hidden="true">&rarr;</span></span>
                        </div>
                        <span class="service-card-visual" aria-hidden="true">
                            <img class="service-illustration" src="<?= e(assetUrl('assets/images/financial-analysis-monochrome-blue.png')) ?>"
                                alt="" loading="lazy" decoding="async">
                        </span>
                    </a>
                </div>
            </div>
        </section>

        <section class="charges-section" aria-labelledby="charges-title">
            <div class="charges-container">
                <h2 id="charges-title">Plans built around how you trade</h2>

                <div class="charges-grid" role="group" aria-label="Brokerage pricing plans">
                    <article class="charge-card charge-card-basic">
                        <div class="charge-card-header">
                            <span class="charge-plan-label">Basic Plan</span>
                            <h3>Basic</h3>
                            <p>First-time investors. Zero cost entry. Market-rate trading &mdash; no surprises.</p>
                            <p class="charge-plan-price"><strong>Free</strong><span>&mdash; no subscription ever</span>
                            </p>
                        </div>

                        <div class="charge-group">
                            <h4>Account &amp; Demat</h4>
                            <dl>
                                <div>
                                    <dt>Account opening</dt>
                                    <dd>&#8377;500 <span>Waived as brokerage credit</span></dd>
                                </div>
                                <div>
                                    <dt>Demat AMC &mdash; Year 1</dt>
                                    <dd>&#8377;0 waived</dd>
                                </div>
                                <div>
                                    <dt>Demat AMC &mdash; Year 2+</dt>
                                    <dd>&#8377;199 / year</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Equity</h4>
                            <dl>
                                <div>
                                    <dt>Delivery (CNC) &mdash; per side</dt>
                                    <dd>0.50% (min &#8377;30)</dd>
                                </div>
                                <div>
                                    <dt>Intraday (MIS) &mdash; per order</dt>
                                    <dd>0.50% (min &#8377;30)</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Derivatives</h4>
                            <dl>
                                <div>
                                    <dt>Equity options &mdash; per executed order</dt>
                                    <dd>&#8377;30 flat</dd>
                                </div>
                                <div>
                                    <dt>Equity futures &mdash; per executed order</dt>
                                    <dd>&#8377;30 flat</dd>
                                </div>
                                <div>
                                    <dt>Currency F&amp;O &mdash; per order</dt>
                                    <dd>&#8377;30 flat</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Other Charges</h4>
                            <dl>
                                <div>
                                    <dt>Mutual funds / IPO</dt>
                                    <dd>&#8377;0</dd>
                                </div>
                                <div>
                                    <dt>DP charge (per ISIN sell)</dt>
                                    <dd>&#8377;35 + GST</dd>
                                </div>
                                <div>
                                    <dt>Call &amp; trade</dt>
                                    <dd>+ &#8377;30 / order</dd>
                                </div>
                                <div>
                                    <dt>MTF access</dt>
                                    <dd><em>Not available</em></dd>
                                </div>
                                <div>
                                    <dt>Research calls / month</dt>
                                    <dd>3 calls</dd>
                                </div>
                                <div>
                                    <dt>Dedicated RM</dt>
                                    <dd><em>No</em></dd>
                                </div>
                            </dl>
                        </div>

                        <p class="charge-plan-note"><strong>Upgrade trigger:</strong> At &#8377;1L delivery, Basic
                            charges &#8377;300 vs Pro &#8377;150 &mdash; &#8377;150 saved per side. At 5 delivery
                            sides/month that is &#8377;750/month = &#8377;9,000/year saved by upgrading to Pro. Pro
                            subscription costs &#8377;499/year. Break-even in under 1 month.</p>
                    </article>

                    <article class="charge-card charge-card-pro">
                        <div class="charge-card-header">
                            <div class="charge-label-row">
                                <span class="charge-plan-label">Pro Plan</span>
                                <span class="charge-popular-label">Most Popular</span>
                            </div>
                            <h3>Pro</h3>
                            <p>Active traders. &#8377;1L&ndash;&#8377;10L portfolio. Delivery cheaper than Motilal Oswal
                                &amp; Kotak.</p>
                            <p class="charge-plan-price"><strong>&#8377;499</strong><span>/ year</span></p>
                        </div>

                        <div class="charge-group">
                            <h4>Account &amp; Demat</h4>
                            <dl>
                                <div>
                                    <dt>Account opening</dt>
                                    <dd>&#8377;500 <span>Waived as brokerage credit</span></dd>
                                </div>
                                <div>
                                    <dt>Demat AMC &mdash; always</dt>
                                    <dd>&#8377;0 (included forever)</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Equity</h4>
                            <dl>
                                <div>
                                    <dt>Delivery (CNC) &mdash; per side</dt>
                                    <dd>0.15% (min &#8377;20)</dd>
                                </div>
                                <div>
                                    <dt>Intraday (MIS) &mdash; per order</dt>
                                    <dd>&#8377;20 flat</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Derivatives</h4>
                            <dl>
                                <div>
                                    <dt>Equity options &mdash; per executed order</dt>
                                    <dd>&#8377;20 flat</dd>
                                </div>
                                <div>
                                    <dt>Equity futures &mdash; per executed order</dt>
                                    <dd>&#8377;20 flat</dd>
                                </div>
                                <div>
                                    <dt>Currency F&amp;O &mdash; per order</dt>
                                    <dd>&#8377;20 flat</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Other Charges</h4>
                            <dl>
                                <div>
                                    <dt>Mutual funds / IPO</dt>
                                    <dd>&#8377;0</dd>
                                </div>
                                <div>
                                    <dt>DP charge (per ISIN sell)</dt>
                                    <dd>&#8377;30 + GST</dd>
                                </div>
                                <div>
                                    <dt>Call &amp; trade</dt>
                                    <dd>+ &#8377;25 / order</dd>
                                </div>
                                <div>
                                    <dt>MTF interest rate</dt>
                                    <dd>18% p.a. (up to &#8377;5L)</dd>
                                </div>
                                <div>
                                    <dt>Research calls / month</dt>
                                    <dd>10 premium calls</dd>
                                </div>
                                <div>
                                    <dt>Dedicated RM</dt>
                                    <dd><em>No (support desk)</em></dd>
                                </div>
                            </dl>
                        </div>

                        <p class="charge-plan-note"><strong>The Pro edge:</strong> &#8377;20 flat on every segment
                            &mdash; simple, predictable, and &#8377;10 cheaper than Basic on every order. 20
                            orders/month saves &#8377;200/month vs Basic = &#8377;2,400/year. Pro subscription pays back
                            in under 3 months. Lower DP (&#8377;25 vs &#8377;30) and call &amp; trade (&#8377;25 vs
                            &#8377;30) add further savings.</p>
                    </article>

                    <article class="charge-card charge-card-hni">
                        <div class="charge-card-header">
                            <span class="charge-plan-label">HNI Wealth Plan</span>
                            <h3>HNI Wealth</h3>
                            <p>Serious traders. Portfolio &#8377;10L+. Cheapest delivery of any full-service broker + RM
                                + research.</p>
                            <p class="charge-plan-price"><strong>&#8377;4,999</strong><span>/ year</span></p>
                        </div>

                        <div class="charge-group">
                            <h4>Account &amp; Demat</h4>
                            <dl>
                                <div>
                                    <dt>Account opening</dt>
                                    <dd>&#8377;500 <span>Waived as brokerage credit</span></dd>
                                </div>
                                <div>
                                    <dt>Demat AMC &mdash; always</dt>
                                    <dd>&#8377;0 forever</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Equity</h4>
                            <dl>
                                <div>
                                    <dt>Delivery (CNC) &mdash; per side</dt>
                                    <dd>0.10% (min &#8377;10)</dd>
                                </div>
                                <div>
                                    <dt>Intraday (MIS) &mdash; per order</dt>
                                    <dd>&#8377;15 flat</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Derivatives</h4>
                            <dl>
                                <div>
                                    <dt>Equity options &mdash; per executed order</dt>
                                    <dd>&#8377;15 flat</dd>
                                </div>
                                <div>
                                    <dt>Equity futures &mdash; per executed order</dt>
                                    <dd>&#8377;15 flat</dd>
                                </div>
                                <div>
                                    <dt>Currency F&amp;O &mdash; per order</dt>
                                    <dd>&#8377;15 flat</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="charge-group">
                            <h4>Other Charges</h4>
                            <dl>
                                <div>
                                    <dt>Mutual funds / IPO</dt>
                                    <dd>&#8377;0</dd>
                                </div>
                                <div>
                                    <dt>DP charge (per ISIN sell)</dt>
                                    <dd>&#8377;25 + GST</dd>
                                </div>
                                <div>
                                    <dt>Call &amp; trade</dt>
                                    <dd>&#8377;0 &mdash; free for Wealth</dd>
                                </div>
                                <div>
                                    <dt>MTF interest rate</dt>
                                    <dd>15% p.a. (up to &#8377;50L)</dd>
                                </div>
                                <div>
                                    <dt>Research calls</dt>
                                    <dd>Unlimited + priority</dd>
                                </div>
                                <div>
                                    <dt>Dedicated RM</dt>
                                    <dd>Yes &mdash; direct mobile</dd>
                                </div>
                            </dl>
                        </div>

                        <p class="charge-plan-note"><strong>Renewal math (&#8377;1L delivery orders):</strong> Delivery
                            saving 10 sides &times; &#8377;50 &times; 12 = &#8377;6,000/yr (HNI 0.10%=&#8377;100 vs Pro
                            0.15%=&#8377;150). F&amp;O saving 70 &times; &#8377;5 &times; 12 = &#8377;4,200/yr. DP
                            saving 10 &times; &#8377;5 &times; 12 = &#8377;600/yr. Total &#8377;10,800/yr saved vs Pro.
                            HNI costs &#8377;4,500 extra. Client nets +&#8377;6,300/year &mdash; renewal is very
                            strongly justified.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="calculator-section" aria-labelledby="calculator-title">
            <div class="calculator-container">
                <div class="calculator-header">
                    <h2 id="calculator-title">Leave the calculations to us</h2>
                    <p>Estimate brokerage, margin, returns and charges with tools designed to make market decisions
                        easier to review.</p>
                </div>

                <div class="calculator-card-track" role="group" aria-label="Market calculators">
                    <article class="calculator-card">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&amp;fit=crop&amp;w=700&amp;q=80"
                            alt="" loading="lazy" decoding="async">
                        <div class="calculator-card-copy">
                            <h3>Brokerage Calculator</h3>
                            <p>Estimate trading costs across supported market segments.</p>
                            <a href="calculators/brokerage-calculator.php" aria-label="Open brokerage calculator"><span
                                    aria-hidden="true">&rsaquo;</span></a>
                        </div>
                    </article>

                    <article class="calculator-card">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=700&amp;q=80"
                            alt="" loading="lazy" decoding="async">
                        <div class="calculator-card-copy">
                            <h3>Margin Calculator</h3>
                            <p>Review indicative margin needs before placing trades.</p>
                            <a href="calculators/margin-calculator.php" aria-label="Open margin calculator"><span
                                    aria-hidden="true">&rsaquo;</span></a>
                        </div>
                    </article>

                    <article class="calculator-card">
                        <img src="https://images.unsplash.com/photo-1625225233840-695456021cde?auto=format&amp;fit=crop&amp;w=700&amp;q=80"
                            alt="" loading="lazy" decoding="async">
                        <div class="calculator-card-copy">
                            <h3>SIP Calculator</h3>
                            <p>Project systematic investment values over time.</p>
                            <a href="calculators/sip-calculator.php" aria-label="Open SIP calculator"><span
                                    aria-hidden="true">&rsaquo;</span></a>
                        </div>
                    </article>

                    <article class="calculator-card">
                        <img src="https://images.unsplash.com/photo-1639322537504-6427a16b0a28?auto=format&amp;fit=crop&amp;w=700&amp;q=80"
                            alt="" loading="lazy" decoding="async">
                        <div class="calculator-card-copy">
                            <h3>Charges Calculator</h3>
                            <p>Understand statutory charges and transaction costs.</p>
                            <a href="calculators/brokerage-calculator.php" aria-label="Open charges calculator"><span
                                    aria-hidden="true">&rsaquo;</span></a>
                        </div>
                    </article>
                </div>

                <div class="calculator-progress" aria-hidden="true">
                    <span class="is-active"></span>
                    <span></span>
                </div>
            </div>
        </section>

        <section class="app-showcase-section" aria-labelledby="app-showcase-title" data-app-showcase>
            <div class="app-showcase-container">
                <div class="app-showcase-heading">
                    <p class="app-showcase-eyebrow">Platform overview</p>
                    <h2 id="app-showcase-title">Choose the workspace that fits your market routine</h2>
                </div>

                <div class="app-showcase-tabs" role="tablist" aria-label="Gretex platform showcase">
                    <button class="is-active" type="button" id="showcase-tab-tradexx-mobile" role="tab"
                        aria-selected="true" aria-controls="showcase-tradexx-mobile" data-app-tab>TradeXX mobile
                        app</button>
                    <button type="button" id="showcase-tab-tradexx-web" role="tab" aria-selected="false"
                        aria-controls="showcase-tradexx-web" tabindex="-1" data-app-tab>TradeXX web app</button>
                    <button type="button" id="showcase-tab-mutual-funds-mobile" role="tab" aria-selected="false"
                        aria-controls="showcase-mutual-funds-mobile" tabindex="-1" data-app-tab>Gretex Mutual Funds
                        mobile app</button>
                    <button type="button" id="showcase-tab-mutual-funds-web" role="tab" aria-selected="false"
                        aria-controls="showcase-mutual-funds-web" tabindex="-1" data-app-tab>Gretex Mutual Funds web
                        app</button>
                </div>

                <div class="app-showcase-stage">
                    <article class="app-showcase-panel app-showcase-panel-feature is-active"
                        id="showcase-tradexx-mobile" role="tabpanel" aria-labelledby="showcase-tab-tradexx-mobile"
                        data-app-panel>
                        <div class="showcase-feature-band">
                            <div class="showcase-feature-copy">
                                <h3>Market access in your pocket. Track prices, positions and holdings from one mobile
                                    workspace.</h3>
                                <a class="showcase-feature-link" href="signin.php">Explore TradeXX mobile <span
                                        aria-hidden="true">-&gt;</span></a>
                            </div>
                            <div class="showcase-phone-stack" role="group" aria-label="TradeXX mobile app screenshots">
                                <figure class="showcase-phone showcase-phone-primary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Mobile%20App/IMG_0118.png')) ?>"
                                        alt="Tradexx mobile marketwatch screen">
                                </figure>
                                <figure class="showcase-phone showcase-phone-secondary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Mobile%20App/IMG_0117.png')) ?>"
                                        alt="Tradexx mobile home dashboard screen">
                                </figure>
                            </div>
                        </div>

                        <div class="showcase-feature-grid" role="group" aria-label="Tradexx mobile app highlights">
                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Watchlists that stay current.</h4>
                                    <p>Review market movement, bid and ask prices, and scrip-level changes from a
                                        focused mobile watchlist.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Mobile%20App/IMG_0118.png')) ?>"
                                        alt="Tradexx mobile watchlist with market prices">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Portfolio details without switching context.</h4>
                                    <p>Check invested value, current value, P&amp;L and individual holdings in a clean
                                        mobile view.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Mobile%20App/IMG_0119.png')) ?>"
                                        alt="Tradexx mobile portfolio holdings screen">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Orders, bids and account actions together.</h4>
                                    <p>Move from account overview to orders and IPO bidding without leaving the mobile
                                        workspace.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Mobile%20App/IMG_0117.png')) ?>"
                                        alt="Tradexx mobile dashboard with positions and order details">
                                </figure>
                            </article>
                        </div>
                    </article>

                    <article class="app-showcase-panel app-showcase-panel-feature" id="showcase-tradexx-web"
                        role="tabpanel" aria-labelledby="showcase-tab-tradexx-web" data-app-panel hidden>
                        <div class="showcase-feature-band">
                            <div class="showcase-feature-copy">
                                <h3>A wider trading desk for watchlists, orders, positions and account monitoring.</h3>
                                <a class="showcase-feature-link" href="signin.php">Explore Tradexx web <span
                                        aria-hidden="true">-&gt;</span></a>
                            </div>
                            <div class="showcase-browser-stack" role="group" aria-label="Tradexx web app screenshots">
                                <figure class="showcase-browser showcase-browser-primary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Web/Screenshot%202026-07-14%20112920.png')) ?>"
                                        alt="Tradexx web dashboard with watchlist and account panels">
                                </figure>
                                <figure class="showcase-browser showcase-browser-secondary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Web/Screenshot%202026-07-14%20113134.png')) ?>"
                                        alt="Tradexx web order and trading workspace">
                                </figure>
                            </div>
                        </div>

                        <div class="showcase-feature-grid showcase-feature-grid-web" role="group"
                            aria-label="Tradexx web app highlights">
                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Marketwatch and indices in one frame.</h4>
                                    <p>Follow selected scrips, market indices and key account values from a desktop
                                        trading workspace.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Web/Screenshot%202026-07-14%20112920.png')) ?>"
                                        alt="Tradexx web dashboard with marketwatch">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Orders and positions with room to scan.</h4>
                                    <p>Use the larger browser view to monitor open orders, trades, positions and
                                        holdings without compressing your workflow.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Web/Screenshot%202026-07-14%20112944.png')) ?>"
                                        alt="Tradexx web order monitoring screen">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Desktop tools for active sessions.</h4>
                                    <p>Review account details, trading panels and market information on a screen built
                                        for longer desktop sessions.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Tradexx/Web/Screenshot%202026-07-14%20113134.png')) ?>"
                                        alt="Tradexx web trading tools screen">
                                </figure>
                            </article>
                        </div>
                    </article>

                    <article class="app-showcase-panel app-showcase-panel-feature" id="showcase-mutual-funds-mobile"
                        role="tabpanel" aria-labelledby="showcase-tab-mutual-funds-mobile" data-app-panel hidden>
                        <div class="showcase-feature-band">
                            <div class="showcase-feature-copy">
                                <h3>Mutual fund portfolios, investment actions and reports designed for mobile review.
                                </h3>
                                <a class="showcase-feature-link" href="signin.php">Explore Mutual Funds mobile <span
                                        aria-hidden="true">-&gt;</span></a>
                            </div>
                            <div class="showcase-phone-stack" role="group" aria-label="Gretex Mutual Funds mobile app screenshots">
                                <figure class="showcase-phone showcase-phone-primary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Mobile%20App/IMG_0125.png')) ?>"
                                        alt="Gretex Mutual Funds mobile portfolio screen">
                                </figure>
                                <figure class="showcase-phone showcase-phone-secondary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Mobile%20App/IMG_0128.png')) ?>"
                                        alt="Gretex Mutual Funds mobile investment screen">
                                </figure>
                            </div>
                        </div>

                        <div class="showcase-feature-grid" role="group" aria-label="Gretex Mutual Funds mobile app highlights">
                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Portfolio summaries made portable.</h4>
                                    <p>Review holding cost, current value, gain and loss, and top fund holdings from the
                                        mobile dashboard.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Mobile%20App/IMG_0125.png')) ?>"
                                        alt="Gretex Mutual Funds mobile portfolio summary">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Discover and compare funds.</h4>
                                    <p>Move from portfolio review to investment discovery with fund cards, categories
                                        and
                                        performance views.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Mobile%20App/IMG_0128.png')) ?>"
                                        alt="Gretex Mutual Funds mobile fund discovery">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Reports and actions stay close.</h4>
                                    <p>Access reports, portfolio sections and investment actions without leaving the
                                        mobile mutual fund workspace.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Mobile%20App/IMG_0131.png')) ?>"
                                        alt="Gretex Mutual Funds mobile reports screen">
                                </figure>
                            </article>
                        </div>
                    </article>

                    <article class="app-showcase-panel app-showcase-panel-feature" id="showcase-mutual-funds-web"
                        role="tabpanel" aria-labelledby="showcase-tab-mutual-funds-web" data-app-panel hidden>
                        <div class="showcase-feature-band">
                            <div class="showcase-feature-copy">
                                <h3>A browser workspace for portfolio summaries, goals, transactions and fund actions.
                                </h3>
                                <a class="showcase-feature-link" href="signin.php">Explore Mutual Funds web <span
                                        aria-hidden="true">-&gt;</span></a>
                            </div>
                            <div class="showcase-browser-stack" role="group" aria-label="Gretex Mutual Funds web app screenshots">
                                <figure class="showcase-browser showcase-browser-primary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Web%20App/img_001.jpeg')) ?>"
                                        alt="Gretex Mutual Funds web dashboard">
                                </figure>
                                <figure class="showcase-browser showcase-browser-secondary">
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Web%20App/img_004.jpeg')) ?>"
                                        alt="Gretex Mutual Funds web transaction workspace">
                                </figure>
                            </div>
                        </div>

                        <div class="showcase-feature-grid showcase-feature-grid-web" role="group"
                            aria-label="Gretex Mutual Funds web app highlights">
                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Portfolio summary on a wider canvas.</h4>
                                    <p>Track portfolio summary, goals and investor details in a clean desktop mutual
                                        fund
                                        dashboard.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Web%20App/img_001.jpeg')) ?>"
                                        alt="Gretex Mutual Funds web portfolio dashboard">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Investment workflows with context.</h4>
                                    <p>Review fund information, transactions and account actions while keeping the main
                                        navigation visible.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Web%20App/img_004.jpeg')) ?>"
                                        alt="Gretex Mutual Funds web investment workflow">
                                </figure>
                            </article>

                            <article class="showcase-feature-card">
                                <div class="showcase-feature-card-copy">
                                    <h4>Reports and servicing in one place.</h4>
                                    <p>Use the web interface to review reports, pending requests and servicing details
                                        from a larger workspace.</p>
                                </div>
                                <figure>
                                    <img src="<?= e(assetUrl('assets/images/Application%20Screenshots/Mutual%20Fund/Web%20App/img_006.jpeg')) ?>"
                                        alt="Gretex Mutual Funds web reports screen">
                                </figure>
                            </article>
                        </div>
                    </article>
                </div>
            </div>
        </section>



        <section class="news-section" aria-labelledby="news-title">
            <div class="news-container">
                <div class="news-header">
                    <h2 id="news-title">Market insights</h2>
                    <p>Stay updated with the latest stock market news and articles.</p>
                    <a class="news-view-all" href="<?= e(url('blogs/')) ?>">View all blogs <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="news-list" role="group" aria-label="Latest blog posts">
                    <a class="news-item news-item-featured" href="<?= e(url('blogs/blog-template')) ?>">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-1642790106117-e829e14a795f?auto=format&amp;fit=crop&amp;w=1100&amp;q=85"
                                alt="Market chart and financial data dashboard">
                        </div>
                        <div class="news-copy">
                            <p class="news-meta">August 05, 2026</p>
                            <h3>FII DII Data - Live Data</h3>
                            <p class="news-excerpt">Get updated FII and DII data for today's NSE and BSE. Track the net
                                buying/selling activity daily. Know what FII and DII data, key insights &amp; more.</p>
                        </div>
                    </a>

                    <a class="news-item" href="<?= e(url('blogs/blog-template')) ?>">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&amp;fit=crop&amp;w=900&amp;q=85"
                                alt="Stock market charts on a trading screen">
                        </div>
                        <div class="news-copy">
                            <p class="news-meta">August 05, 2026</p>
                            <h3>Share Market Prediction For Tomorrow</h3>
                            <p class="news-excerpt">Get market prediction for tomorrow for Nifty 50, Bank Nifty, Sensex
                                &amp; Bank Nifty by experts. Check out tomorrow share market prediction with support
                                &amp; resistance levels.</p>
                        </div>
                    </a>

                    <a class="news-item" href="<?= e(url('blogs/blog-template')) ?>">
                        <div class="news-image">
                            <img src="https://images.unsplash.com/photo-1639322537228-f710d846310a?auto=format&amp;fit=crop&amp;w=900&amp;q=85"
                                alt="Financial market chart and analytics display">
                        </div>
                        <div class="news-copy">
                            <p class="news-meta">August 05, 2026</p>
                            <h3>Market Prediction Today (6th August 2026)</h3>
                            <p class="news-excerpt">Stay updated with today market prediction on Nifty 50, Bank Nifty
                                sensex predictions today, including key support, resistance, and market trends.</p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="faq-section" aria-labelledby="faq-title">
            <div class="faq-container">
                <div class="faq-intro">
                    <h2 id="faq-title">Frequently Asked Questions</h2>
                </div>

                <div class="faq-layout">
                    <nav class="faq-categories" aria-label="FAQ categories">
                        <p class="faq-categories-title">Contents</p>
                        <a href="#faq-group-account">Account opening</a>
                        <a href="#faq-group-platforms">Platforms &amp; markets</a>
                        <a href="#faq-group-funds">Funds &amp; security</a>
                        <a href="#faq-group-support">Support &amp; disclosures</a>
                    </nav>

                    <div class="faq-group-list">
                        <section class="faq-group" aria-labelledby="faq-group-account">
                            <div class="faq-group-heading">
                                <p id="faq-group-account">Account opening</p>
                            </div>
                            <div class="faq-list">
                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-1" aria-expanded="false"
                                        aria-controls="faq-answer-1" data-faq-trigger>
                                        <span>What documents are required to open an account?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-1" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>You will generally need your PAN, Aadhaar, bank account details, address
                                                information and a recent photograph. Additional documents may be
                                                required
                                                for specific market segments or verification purposes.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-2" aria-expanded="false"
                                        aria-controls="faq-answer-2" data-faq-trigger>
                                        <span>How can I begin the account-opening process?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-2" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Select Open an Account, enter your contact details and complete the
                                                guided
                                                application process. You will be asked to provide KYC, bank and other
                                                required information.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-3" aria-expanded="false"
                                        aria-controls="faq-answer-3" data-faq-trigger>
                                        <span>Is the account-opening process completely digital?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-3" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>The application can be completed through a digital onboarding process,
                                                including identity verification, document submission and electronic
                                                signing, subject to applicable requirements.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-4" aria-expanded="false"
                                        aria-controls="faq-answer-4" data-faq-trigger>
                                        <span>How can I check the status of my application?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-4" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Application updates may be shared through your registered mobile number
                                                or
                                                email address. You may also contact the onboarding or support team for
                                                assistance.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-5" aria-expanded="false"
                                        aria-controls="faq-answer-5" data-faq-trigger>
                                        <span>Why is my application still pending?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-5" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>An application may remain pending if verification is incomplete,
                                                submitted
                                                information does not match official records or additional documents are
                                                required.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-6" aria-expanded="false"
                                        aria-controls="faq-answer-6" data-faq-trigger>
                                        <span>When will my account be activated?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-6" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Activation takes place after successful verification and approval of the
                                                submitted information. The processing time may vary depending on
                                                document
                                                completeness and regulatory checks.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>

                        <section class="faq-group" aria-labelledby="faq-group-platforms">
                            <div class="faq-group-heading">
                                <p id="faq-group-platforms">Platforms &amp; markets</p>
                            </div>
                            <div class="faq-list">
                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-7" aria-expanded="false"
                                        aria-controls="faq-answer-7" data-faq-trigger>
                                        <span>Which markets and products can I access?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-7" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Subject to account and segment activation, clients may access services
                                                relating to equity, derivatives, IPOs, mutual funds, margin trading and
                                                depository accounts.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-8" aria-expanded="false"
                                        aria-controls="faq-answer-8" data-faq-trigger>
                                        <span>How can I access the trading platform?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-8" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Supported trading services may be available through mobile, web or
                                                desktop
                                                platforms. Login details and access instructions are provided after
                                                account activation.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-9" aria-expanded="false"
                                        aria-controls="faq-answer-9" data-faq-trigger>
                                        <span>What should I do if I cannot log in?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-9" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Check that your login credentials are correct and use the password-reset
                                                option where available. Contact support if your account remains
                                                inaccessible or has been locked.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-10"
                                        aria-expanded="false" aria-controls="faq-answer-10" data-faq-trigger>
                                        <span>Can I place both market and limit orders?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-10" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Supported order types may include market, limit and other
                                                exchange-permitted orders, depending on the market segment and trading
                                                platform being used.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-11"
                                        aria-expanded="false" aria-controls="faq-answer-11" data-faq-trigger>
                                        <span>Where can I view my orders, positions and holdings?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-11" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Orders and open positions are generally available within the trading
                                                platform, while long-term securities holdings may be viewed through the
                                                holdings or demat section.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-12"
                                        aria-expanded="false" aria-controls="faq-answer-12" data-faq-trigger>
                                        <span>Why was my order rejected?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-12" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Orders may be rejected due to insufficient funds or margin, invalid price
                                                limits, market restrictions, unavailable securities, risk-management
                                                controls or incomplete segment activation.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>

                        <section class="faq-group" aria-labelledby="faq-group-funds">
                            <div class="faq-group-heading">
                                <p id="faq-group-funds">Funds &amp; security</p>
                            </div>
                            <div class="faq-list">
                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-13"
                                        aria-expanded="false" aria-controls="faq-answer-13" data-faq-trigger>
                                        <span>How can I add funds to my trading account?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-13" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Funds should be transferred only through payment methods and bank
                                                accounts
                                                officially approved by Gretex. Use the authorised payment links or
                                                account details available through the platform.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-14"
                                        aria-expanded="false" aria-controls="faq-answer-14" data-faq-trigger>
                                        <span>How can I request a withdrawal?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-14" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Submit a withdrawal request through the available platform or authorised
                                                service channel. Processing is subject to available balance, settlement
                                                obligations and applicable cut-off timings.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-15"
                                        aria-expanded="false" aria-controls="faq-answer-15" data-faq-trigger>
                                        <span>Why has my fund transfer not reflected?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-15" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>A transfer may be delayed because of banking processing time, incorrect
                                                account details, reconciliation checks or payment being made from an
                                                unregistered bank account.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-16"
                                        aria-expanded="false" aria-controls="faq-answer-16" data-faq-trigger>
                                        <span>Does Gretex ask for passwords, PINs or OTPs?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-16" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>You should never share passwords, PINs, OTPs or other confidential
                                                credentials with any person. Gretex representatives should not request
                                                such information for routine account servicing.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-17"
                                        aria-expanded="false" aria-controls="faq-answer-17" data-faq-trigger>
                                        <span>How can I verify whether a communication is genuine?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-17" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Check that emails come from an authorised Gretex domain and that payment
                                                instructions match officially published details. Avoid acting on
                                                messages
                                                received through unverified social-media or messaging accounts.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-18"
                                        aria-expanded="false" aria-controls="faq-answer-18" data-faq-trigger>
                                        <span>What should I do if I notice suspicious account activity?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-18" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Immediately change your login credentials, contact Gretex support and
                                                report any unauthorised transaction. You may also need to inform your
                                                bank, depository or the appropriate cybercrime authority.</p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>

                        <section class="faq-group" aria-labelledby="faq-group-support">
                            <div class="faq-group-heading">
                                <p id="faq-group-support">Support &amp; disclosures</p>
                            </div>
                            <div class="faq-list">
                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-19"
                                        aria-expanded="false" aria-controls="faq-answer-19" data-faq-trigger>
                                        <span>How can I contact customer support?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-19" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>You can contact Gretex through its official support number, email address
                                                or website contact form for account, platform and service-related
                                                assistance.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-20"
                                        aria-expanded="false" aria-controls="faq-answer-20" data-faq-trigger>
                                        <span>How can I raise a formal grievance?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-20" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Submit the complaint through the designated investor-grievance channel
                                                and
                                                include your client details, a clear description of the issue and
                                                relevant supporting records.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-21"
                                        aria-expanded="false" aria-controls="faq-answer-21" data-faq-trigger>
                                        <span>Where can I view brokerage and account charges?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-21" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>The applicable brokerage, maintenance fees, statutory charges and service
                                                costs should be reviewed in the latest tariff sheet or charges section
                                                of
                                                the website.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-22"
                                        aria-expanded="false" aria-controls="faq-answer-22" data-faq-trigger>
                                        <span>Where can I access policies and regulatory documents?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-22" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Policies, disclosures, investor charters, risk documents and other
                                                mandatory information are available through the Policies, Downloads or
                                                Investor Relations sections.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-23"
                                        aria-expanded="false" aria-controls="faq-answer-23" data-faq-trigger>
                                        <span>What should I do if my complaint is not resolved?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-23" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Follow the published escalation process. Where applicable, unresolved
                                                complaints may be escalated through recognised regulatory or exchange
                                                grievance mechanisms.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="faq-item" data-faq-item>
                                    <button class="faq-question" type="button" id="faq-question-24"
                                        aria-expanded="false" aria-controls="faq-answer-24" data-faq-trigger>
                                        <span>Are introductory offers subject to conditions?</span>
                                        <span class="faq-icon" aria-hidden="true"></span>
                                    </button>
                                    <div class="faq-answer" id="faq-answer-24" data-faq-panel>
                                        <div class="faq-answer-inner">
                                            <p>Yes. Account-opening, maintenance and brokerage offers may be subject to
                                                eligibility, duration, exclusions, taxes, statutory charges and other
                                                applicable terms. Review the complete offer conditions before
                                                proceeding.
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </section>

        <section class="end-cta" aria-labelledby="end-cta-title">
            <div class="end-cta-panel">
                <div class="end-cta-inner">
                    <div class="end-cta-content">
                        <h2 id="end-cta-title">Access the markets through one connected platform</h2>
                        <p>Open a Gretex trading and demat account to access supported market segments, digital trading
                            platforms and account-related services through a structured onboarding process.</p>
                        <a class="end-cta-button" href="signin.php">Start Now <span
                                aria-hidden="true">&nearr;</span></a>
                    </div>

                    <div class="end-cta-visual" aria-hidden="true">
                        <img src="<?= e(assetUrl('assets/images/end-cta-image.png')) ?>" alt="" loading="lazy">
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/templates/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="<?= e(assetUrl('js/scroll-reveal.js')) ?>"></script>
    <script src="<?= e(assetUrl('js/hero-odometer.js')) ?>"></script>
    <script src="<?= e(assetUrl('js/app-showcase.js')) ?>"></script>
    <script src="<?= e(assetUrl('js/faq.js')) ?>"></script>
    <!-- <script src="<?= e(assetUrl('js/disclaimer-popup.js')) ?>"></script> -->
</body>

</html>
