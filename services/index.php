<?php
require_once __DIR__ . '/../helpers/urlfetcher.php';

$siteBase = '../';

$statHighlights = [
    ['label' => 'Nett Top AUM', 'value' => '₹ 4,500+ Cr'],
    ['label' => 'Active Clients', 'value' => '1,00,000+'],
    ['label' => 'Years of Experience', 'value' => '15+'],
];

$whyChoose = [
    [
        'eyebrow' => 'Research',
        'title' => 'Live Charts',
        'copy' => 'Real-time market data, interactive charts and advanced technical analysis tools.',
        'icon' => 'chart',
    ],
    [
        'eyebrow' => 'Institutional Services',
        'title' => 'Mutual Funds',
        'copy' => 'Access to top-performing mutual funds with expert research and portfolio suggestions.',
        'icon' => 'shield',
    ],
    [
        'eyebrow' => 'Trading Platforms',
        'title' => 'All Solutions',
        'copy' => 'Powerful trading platforms for web, mobile and desktop with advanced features and real-time insights.',
        'icon' => 'monitor',
    ],
    [
        'eyebrow' => 'Online Services',
        'title' => 'IPO &amp; Allotments',
        'copy' => 'Apply for IPOs, track allotments and manage your investments seamlessly.',
        'icon' => 'file',
    ],
    [
        'eyebrow' => 'Digital Access',
        'title' => 'Web &amp; App Access',
        'copy' => 'Trade, invest and manage your portfolio anytime, anywhere with our easy-to-use platforms.',
        'icon' => 'phone',
    ],
];

$featuredStats = [
    ['value' => '15+', 'label' => 'Years of Legacy'],
    ['value' => '100%', 'label' => 'Client Focus'],
    ['value' => '0', 'label' => 'Brokerage For First Trade'],
];

$coreOfferings = [
    [
        'eyebrow' => 'Investment Services',
        'title' => 'Live Charts &amp; Screeners',
        'copy' => 'High-frequency, real-time market insights and advanced charting tools to identify trading opportunities and build informed strategies.',
        'points' => ['Real-time charts &amp; technical indicators', 'Custom screeners &amp; watchlists', 'Scan market trends &amp; sectors'],
        'cta' => 'Explore Charts',
        'href' => 'signin',
        'icon' => 'chart',
    ],
    [
        'eyebrow' => 'Portfolio Management',
        'title' => 'Dedicated Relationship Manager',
        'copy' => 'Get personalized support from a dedicated relationship manager who understands your financial goals and provides tailored advice and priority service.',
        'points' => ['Personalized guidance &amp; portfolio reviews', 'Priority support &amp; exclusive research', 'Dedicated relationship manager'],
        'cta' => 'Get in Touch',
        'href' => 'contact/',
        'icon' => 'user',
    ],
    [
        'eyebrow' => 'Research &amp; Insights',
        'title' => 'Daily Research Reports',
        'copy' => 'Actionable market research and expert insights to help you make informed decisions and stay ahead of the market.',
        'points' => ['Daily market updates &amp; sector reports', 'Expert analysis &amp; investment ideas'],
        'cta' => 'View Reports',
        'href' => 'downloads/',
        'icon' => 'bookmark',
    ],
    [
        'eyebrow' => 'Fund Management',
        'title' => 'AIF (Alternative Investment Funds)',
        'copy' => 'Access to curated AIFs for high-net-worth investors, with professional management and diversified strategies.',
        'points' => ['Equity, debt and hybrid AIFs', 'Tax-efficient investment options', 'Professional fund management'],
        'cta' => 'Learn More',
        'href' => 'contact/',
        'icon' => 'briefcase',
    ],
    [
        'eyebrow' => 'Wealth Management',
        'title' => 'IPOs, Allotments &amp; Advisory',
        'copy' => 'Get expert support for IPO applications, allotment tracking and strategic advisory to make the most of market opportunities.',
        'points' => ['IPO application &amp; tracking', 'Allotment letters &amp; updates', 'Strategic investment advisory'],
        'cta' => 'View IPOs',
        'href' => 'signin',
        'icon' => 'grid',
    ],
    [
        'eyebrow' => 'Trading &amp; Execution',
        'title' => 'Web &amp; App Trading Access',
        'copy' => 'Trade seamlessly across web and mobile platforms with advanced tools, real-time data and secure execution.',
        'points' => ['Desktop &amp; mobile trading platforms', 'Real-time market data', 'Secure &amp; fast execution'],
        'cta' => 'Download App',
        'href' => 'signin',
        'icon' => 'phone',
    ],
    [
        'eyebrow' => 'Technology Platforms',
        'title' => 'Trading Terminal (Windows)',
        'copy' => 'Powerful desktop terminal with advanced charting, algorithmic tools and customization options for professional traders.',
        'points' => ['Advanced charting &amp; indicators', 'Algorithmic trading support', 'Customizable workspace'],
        'cta' => 'Get Started',
        'href' => 'signin',
        'icon' => 'monitor',
    ],
    [
        'eyebrow' => 'Investment Solutions',
        'title' => 'Mutual Funds &amp; SIPs',
        'copy' => 'Build long-term wealth with a wide range of mutual funds and systematic investment plans (SIPs).',
        'points' => ['Direct &amp; regular plans', 'Goal-based investing', 'SIP with flexible options'],
        'cta' => 'Start SIP',
        'href' => 'calculators/sip-calculator',
        'icon' => 'trend',
    ],
    [
        'eyebrow' => 'Support Services',
        'title' => 'DP (Depository) Services',
        'copy' => 'Secure and convenient demat services with fast account opening, holdings management and seamless transactions.',
        'points' => ['Demat account opening', 'Holdings &amp; transaction reports', 'Secure and reliable processes'],
        'cta' => 'Request DP',
        'href' => 'contact/',
        'icon' => 'lock',
    ],
];

function servicesIcon($name)
{
    $icons = [
        'chart' => '<path d="M4 19V10"></path><path d="M10 19V5"></path><path d="M16 19v-7"></path><path d="M22 19V3"></path>',
        'shield' => '<path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3Z"></path>',
        'monitor' => '<rect x="3" y="4" width="18" height="12" rx="1.5"></rect><path d="M8 20h8"></path><path d="M12 16v4"></path>',
        'file' => '<path d="M7 3h7l5 5v13H7Z"></path><path d="M14 3v5h5"></path>',
        'phone' => '<rect x="7" y="2" width="10" height="20" rx="2"></rect><path d="M11 18h2"></path>',
        'user' => '<circle cx="12" cy="8" r="3.5"></circle><path d="M5 20c1.2-4 4-6 7-6s5.8 2 7 6"></path>',
        'bookmark' => '<path d="M7 3h10v18l-5-4-5 4Z"></path>',
        'briefcase' => '<rect x="3" y="8" width="18" height="12" rx="1.5"></rect><path d="M9 8V6a3 3 0 0 1 6 0v2"></path>',
        'grid' => '<rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect>',
        'trend' => '<path d="M3 17 10 10 14 14 21 7"></path><path d="M15 7h6v6"></path>',
        'lock' => '<rect x="4" y="10" width="16" height="11" rx="1.5"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path>',
    ];

    return $icons[$name] ?? $icons['chart'];
}
?>
<!DOCTYPE html>
<html class="services-document" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products &amp; Services | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/services.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="services-index-page">
    <?php include __DIR__ . '/../templates/navbar.php'; ?>

    <main>
        <section class="services-hero" aria-labelledby="services-hero-title">
            <div class="services-hero-inner">
                <span class="services-hero-label">Comprehensive Solution</span>
                <h1 id="services-hero-title">Everything You Need,<br><span>In One Place</span></h1>
                <p class="services-hero-copy">A comprehensive suite of institutional grade trading tools, data, research intelligence, alternative assets, and dedicated advisory services engineered for sustained capital growth.</p>

                <div class="services-hero-actions">
                    <a class="services-hero-cta-primary" href="<?= e(url('signin')) ?>">Explore All Solutions <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </section>

        <section class="services-why" aria-labelledby="services-why-title">
            <div class="services-why-inner">
                <div class="services-why-header">
                    <p class="services-why-eyebrow">WHY CHOOSE GRETEXN</p>
                    <p class="services-why-tagline">Your partner in wealth creation</p>

                    <div class="services-why-stats">
                        <?php foreach ($statHighlights as $stat): ?>
                            <span class="services-why-stat"><?= $stat['label'] ?>: <strong><?= $stat['value'] ?></strong></span>
                        <?php endforeach; ?>
                    </div>

                    <a class="services-why-link" href="#core-offerings-title">All Products &amp; Services <span aria-hidden="true">&rarr;</span></a>
                </div>

                <div class="services-why-grid">
                    <div class="services-why-column">
                        <?php foreach (array_slice($whyChoose, 0, 2) as $item): ?>
                            <article class="services-why-card">
                                <p class="services-why-card-eyebrow"><?= $item['eyebrow'] ?></p>
                                <div class="services-why-card-head">
                                    <h3><?= $item['title'] ?></h3>
                                    <span class="services-why-card-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?= servicesIcon($item['icon']) ?></svg>
                                    </span>
                                </div>
                                <p class="services-why-card-copy"><?= $item['copy'] ?></p>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="services-why-feature">
                        <figure class="services-why-feature-media">
                            <span class="services-why-feature-tag">Our Featured Offering</span>
                            <img src="<?= e(assetUrl('assets/images/main-hero-banner.png')) ?>" alt="" loading="lazy" decoding="async" onerror="this.closest('figure').classList.add('no-image')">
                        </figure>
                        <h3>Uncompromising Market Infrastructure</h3>
                        <p>Designed for performance, reliability and security with cutting-edge technology, low latency and seamless execution.</p>
                        <div class="services-why-feature-stats">
                            <?php foreach ($featuredStats as $stat): ?>
                                <div>
                                    <strong><?= $stat['value'] ?></strong>
                                    <span><?= $stat['label'] ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="services-why-column">
                        <?php foreach (array_slice($whyChoose, 2, 3) as $item): ?>
                            <article class="services-why-card">
                                <p class="services-why-card-eyebrow"><?= $item['eyebrow'] ?></p>
                                <div class="services-why-card-head">
                                    <h3><?= $item['title'] ?></h3>
                                    <span class="services-why-card-icon" aria-hidden="true">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?= servicesIcon($item['icon']) ?></svg>
                                    </span>
                                </div>
                                <p class="services-why-card-copy"><?= $item['copy'] ?></p>
                                <span class="services-why-card-link">Explore <span aria-hidden="true">&rarr;</span></span>
                            </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="services-core" id="core-offerings" aria-labelledby="core-offerings-title">
            <div class="services-core-inner">
                <div class="services-core-header">
                    <div class="services-core-heading">
                        <p class="services-core-eyebrow">OUR PRODUCTS &amp; SERVICES</p>
                        <h2 id="core-offerings-title">The Complete 10 Core Offerings</h2>
                    </div>
                    <p class="services-core-summary">Tailored to empower active derivatives, day traders, long-term wealth creators, and consolidated institutional clients with precision and efficiency.</p>
                </div>

                <div class="services-core-grid">
                    <?php foreach ($coreOfferings as $offering): ?>
                        <article class="services-core-card">
                            <div class="services-core-card-top">
                                <p class="services-core-card-eyebrow"><?= $offering['eyebrow'] ?></p>
                                <span class="services-core-card-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?= servicesIcon($offering['icon']) ?></svg>
                                </span>
                            </div>
                            <h3><?= $offering['title'] ?></h3>
                            <p class="services-core-card-copy"><?= $offering['copy'] ?></p>
                            <ul class="services-core-card-points">
                                <?php foreach ($offering['points'] as $point): ?>
                                    <li><span aria-hidden="true">&rsaquo;</span><?= $point ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <a class="services-core-card-link" href="<?= e(url($offering['href'])) ?>"><?= $offering['cta'] ?> <span aria-hidden="true">&rarr;</span></a>
                        </article>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>
