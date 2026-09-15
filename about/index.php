<?php require_once __DIR__ . '/../helpers/urlfetcher.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Gretex Share Broking Limited</title>
    <script>
        (function () {
            if ("scrollRestoration" in window.history) {
                window.history.scrollRestoration = "manual";
            }

            if (window.location.hash && window.location.hash.indexOf("#about-") === 0) {
                window.history.replaceState(null, "", window.location.pathname + window.location.search);
            }

            window.addEventListener("pageshow", function () {
                window.scrollTo(0, 0);
            });
        })();
    </script>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/about.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="about-page">
    <?php
    $siteBase = '../';
    include __DIR__ . '/../templates/navbar.php';
    ?>

    <main id="main-content" class="page-main">
        <section class="about-hero" aria-labelledby="about-hero-title">
            <div class="about-hero-inner">
                <div class="about-hero-content">
                    <p class="about-hero-eyebrow">About Gretex Share Broking</p>
                    <h1 id="about-hero-title">Built around access, structure and long-term participation in the markets.
                    </h1>
                    <p>Gretex Share Broking Limited is a stockbroking and depository-services company providing access
                        to capital-market products through digital platforms, research support and assisted service
                        channels.</p>
                    <a class="about-hero-link" href="#about-overview">Explore our story <span
                            aria-hidden="true">&rarr;</span></a>
                </div>

                <figure class="about-hero-visual">
                    <img src="https://images.unsplash.com/photo-1758518729711-1cbacd55efdb?auto=format&amp;fit=crop&amp;w=2400&amp;q=80"
                        alt="Business professionals discussing financial strategy in a modern meeting room">
                </figure>
            </div>
        </section>

        <div class="about-tabs-bar">
            <div class="about-shell">
                <nav class="about-tabs" aria-label="About sections">
                    <a class="is-active" href="#about-overview">About Gretex</a>
                    <a href="#about-history">Timeline</a>
                    <a href="#about-locations">Locations</a>
                    <a href="#about-management">Management</a>
                </nav>
            </div>
        </div>

        <section class="about-intro" id="about-overview" aria-label="About Gretex overview">
            <div class="about-shell about-overview-grid">
                <div></div>
                <div class="about-overview-copy">
                    <p class="about-lede">Founded in 2010, Gretex Share Broking Ltd. (GSBL) was built on a simple idea:
                        investing shouldn't mean choosing between low cost and real support. That's why we go beyond
                        just a trading platform, offering access to a dedicated Relationship Manager, live charts, and
                        daily research reports to help guide your decisions</p>
                    <p>Today, GSBL offers a full suite of services across web, mobile, and our Windows trading terminal
                        from IPO allotments and mutual funds to AIF and wealth management. Whether you're taking your
                        first step into the markets or managing a growing portfolio, we combine guided expertise with
                        the convenience of modern trading tools. And with â‚¹0 Account Opening and â‚¹0 Maintenance,
                        that
                        support comes without unnecessary barriers to entry.</p>
                </div>
            </div>
        </section>

        <section class="about-usps" aria-labelledby="about-usps-title">
            <div class="about-shell">
                <div class="about-usps-heading">
                    <h2 id="about-usps-title">Why choose Gretex Share Broking Limited</h2>
                    <p>Gretex Share Broking combines digital access with assisted support so investors can engage with
                        eligible market products through structured service channels.</p>
                </div>

                <div class="about-usps-carousel">
                    <div class="about-usps-viewport">
                        <button class="about-usps-arrow about-usps-arrow-prev" type="button"
                            aria-label="Previous USP card" data-usps-direction="-1">
                            <span aria-hidden="true">&lsaquo;</span>
                        </button>

                        <div class="about-usps-track" tabindex="0">
                            <article class="about-usp-card">
                                <span class="about-usp-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false">
                                        <path d="M4 19V5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v14l-3-2-3 2-3-2-3 2-4-2Z" />
                                        <path d="M8 8h8" />
                                        <path d="M8 12h5" />
                                    </svg>
                                </span>
                                <h3>Research and Market Insights</h3>
                                <p>Access research reports and market information through approved channels.</p>
                            </article>

                            <article class="about-usp-card">
                                <span class="about-usp-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false">
                                        <path d="M6 19h12" />
                                        <path d="M8 17V7a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v10" />
                                        <path d="M10 9h4" />
                                        <path d="M10 13h4" />
                                        <path d="M4 17h16" />
                                    </svg>
                                </span>
                                <h3>Simplified Investment Access</h3>
                                <p>Explore eligible investment products through an integrated service experience.</p>
                            </article>

                            <article class="about-usp-card">
                                <span class="about-usp-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false">
                                        <path
                                            d="M7 4h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2Z" />
                                        <path d="M9 8h6" />
                                        <path d="M9 12h3" />
                                        <path d="M15 16h.01" />
                                    </svg>
                                </span>
                                <h3>Digital and Assisted <br> Services</h3>
                                <p>Use digital platforms alongside dedicated service and support channels.</p>
                            </article>

                            <article class="about-usp-card">
                                <span class="about-usp-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false">
                                        <path d="M12 3v18" />
                                        <path d="M3 12h18" />
                                        <path d="M5 5h5v5H5Z" />
                                        <path d="M14 5h5v5h-5Z" />
                                        <path d="M5 14h5v5H5Z" />
                                        <path d="M14 14h5v5h-5Z" />
                                    </svg>
                                </span>
                                <h3>Access Across Asset Classes</h3>
                                <p>Participate in eligible market products based on your investment requirements.</p>
                            </article>

                            <article class="about-usp-card">
                                <span class="about-usp-icon" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" focusable="false">
                                        <path d="M4 18V6" />
                                        <path d="M20 18V6" />
                                        <path d="M7 16h10" />
                                        <path d="M8 12h2" />
                                        <path d="M12 12h4" />
                                        <path d="M9 8h6" />
                                        <path d="m15 8 2 2-2 2" />
                                    </svg>
                                </span>
                                <h3>Technology-Enabled <br> Trading</h3>
                                <p>Access trading tools designed for efficient order placement and account visibility.
                                </p>
                            </article>
                        </div>

                        <button class="about-usps-arrow about-usps-arrow-next" type="button" aria-label="Next USP card"
                            data-usps-direction="1">
                            <span aria-hidden="true">&rsaquo;</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <script>
            (function () {
                var carousel = document.querySelector(".about-usps-carousel");
                if (!carousel) return;

                var track = carousel.querySelector(".about-usps-track");
                var cards = Array.prototype.slice.call(carousel.querySelectorAll(".about-usp-card"));
                var buttons = carousel.querySelectorAll("[data-usps-direction]");
                if (!track || !cards.length || !buttons.length) return;

                var prevButton = carousel.querySelector('[data-usps-direction="-1"]');
                var nextButton = carousel.querySelector('[data-usps-direction="1"]');
                var activeIndex = 0;
                var targetIndex = 0;
                var scrollFrame = null;
                var tolerance = 3;

                function clamp(value, min, max) {
                    return Math.min(max, Math.max(min, value));
                }

                function getMaxScroll() {
                    return Math.max(0, track.scrollWidth - track.clientWidth);
                }

                function getTargetLeft(index) {
                    return Math.min(cards[index].offsetLeft, getMaxScroll());
                }

                function getMaxIndex() {
                    var maxScroll = getMaxScroll();

                    if (maxScroll <= tolerance) {
                        return 0;
                    }

                    for (var index = 0; index < cards.length; index += 1) {
                        if (getTargetLeft(index) >= maxScroll - tolerance) {
                            return index;
                        }
                    }

                    return cards.length - 1;
                }

                function getNearestIndex() {
                    var current = track.scrollLeft;
                    var maxIndex = getMaxIndex();
                    var nearestIndex = 0;
                    var nearestDistance = Infinity;

                    for (var index = 0; index <= maxIndex; index += 1) {
                        var distance = Math.abs(getTargetLeft(index) - current);
                        if (distance < nearestDistance) {
                            nearestDistance = distance;
                            nearestIndex = index;
                        }
                    }

                    return nearestIndex;
                }

                function renderArrows() {
                    var maxIndex = getMaxIndex();
                    if (prevButton) {
                        prevButton.hidden = targetIndex <= 0;
                    }

                    if (nextButton) {
                        nextButton.hidden = targetIndex >= maxIndex;
                    }
                }

                function updateArrows() {
                    activeIndex = clamp(getNearestIndex(), 0, getMaxIndex());
                    if (Math.abs(track.scrollLeft - getTargetLeft(targetIndex)) <= tolerance) {
                        targetIndex = activeIndex;
                    }
                    renderArrows();
                }

                function scrollToIndex(index) {
                    var maxIndex = getMaxIndex();
                    targetIndex = clamp(index, 0, maxIndex);
                    activeIndex = targetIndex;
                    track.scrollTo({
                        left: getTargetLeft(targetIndex),
                        behavior: "smooth"
                    });
                    renderArrows();
                }

                buttons.forEach(function (button) {
                    button.addEventListener("click", function () {
                        var direction = Number(button.getAttribute("data-usps-direction")) || 1;
                        scrollToIndex(targetIndex + direction);
                    });
                });

                track.addEventListener("scroll", function () {
                    if (scrollFrame) return;
                    scrollFrame = window.requestAnimationFrame(function () {
                        scrollFrame = null;
                        updateArrows();
                    });
                }, { passive: true });

                window.addEventListener("resize", function () {
                    scrollToIndex(activeIndex);
                });
                window.addEventListener("load", updateArrows);
                updateArrows();
            })();
        </script>

        <?php
        $companyTimelineItems = [
            ['year' => '2010', 'title' => 'Founded in Kolkata', 'copy' => 'The company was incorporated on 29 April 2010 as Sherwood Securities Private Limited and registered with SEBI as a stock broker from inception. Every year of the firm’s operating history has been inside the regulated securities market.'],
            // ['year' => '2011', 'title' => 'Early operations', 'copy' => 'Dummy milestone for 2011 highlighting operational discipline, onboarding support, and relationship-led service.'],
            ['year' => '2012', 'title' => 'Market maker on BSE', 'copy' => 'Registered as a market maker with BSE. Market makers provide continuous two-way quotes on newly listed SME companies, which is demanding, capital-intensive work and a good measure of a broker’s balance sheet discipline.'],
            // ['year' => '2013', 'title' => 'Service depth', 'copy' => 'Dummy milestone for 2013 showing a wider service desk and clearer processes for assisted participation.'],
            // ['year' => '2014', 'title' => 'Access improvement', 'copy' => 'Dummy milestone for 2014 showing better access to trading touchpoints and investor assistance.'],
            // ['year' => '2015', 'title' => 'Platform maturity', 'copy' => 'Dummy milestone for 2015 showing a more mature operating platform for everyday market participation.'],
            // ['year' => '2016', 'title' => 'Digital expansion', 'copy' => 'Dummy milestone for 2016 showing digital touchpoints becoming a larger part of client trading routines.'],
            ['year' => '2017', 'title' => 'Base moves to Mumbai', 'copy' => 'The registered office shifted from Kolkata to Mumbai with effect from 6 January 2017, placing the firm at the centre of India’s financial market infrastructure while retaining its Kolkata presence.'],
            ['year' => '2017', 'title' => 'The Gretex name', 'copy' => 'On 1 September 2017 the company was renamed Gretex Share Broking, formally joining the Gretex Group of companies and aligning the broking business with the group’s wider capital markets practice.'],
            // ['year' => '2018', 'title' => 'Workflow refinement', 'copy' => 'Dummy milestone for 2018 showing cleaner workflows for research, trading support, and account servicing.'],
            // ['year' => '2019', 'title' => 'Market readiness', 'copy' => 'Dummy milestone for 2019 showing readiness for faster digital service and broader market participation.'],
            // ['year' => '2020', 'title' => 'Remote support', 'copy' => 'Dummy milestone for 2020 showing continuity of trading access, support, and client communication.'],
            ['year' => '2021', 'title' => '20+ companies supported', 'copy' => 'By 29 September 2021 the firm had acted as market maker for more than 20 listed companies — a role that requires standing in the market on both sides of the trade, every trading day, for years at a stretch.'],
            ['year' => '2022', 'title' => 'Depository participant with NSDL', 'copy' => 'Registered as a depository participant with NSDL (IN-DP-699-2022). Clients can now hold their demat account and their trading account under one roof, with one point of contact for both.'],
            ['year' => '2023', 'title' => 'Market maker on NSE', 'copy' => 'Added market maker registration with NSE, extending the firm’s market-making reach across both principal exchanges and both SME platforms.'],
            ['year' => 'Dec 2023 ', 'title' => 'Draft IPO papers filed', 'copy' => 'Filed a Draft Red Herring Prospectus with SEBI on 22 December 2023. The filing disclosed that the firm had by then acted as market maker for 31 companies listed on the SME platforms of the exchanges.'],
            // ['year' => '2024', 'title' => 'Research focus', 'copy' => 'Dummy milestone for 2024 showing research, live charting, and guided participation becoming more visible.'],
            ['year' => '2025', 'title' => 'Public listing proposed', 'copy' => 'On 20 November 2025 the parent company informed the exchanges that Gretex Share Broking, its material subsidiary, proposes to undertake an initial public offering, subject to regulatory approvals.'],
            // ['year' => '2026', 'title' => 'Future-ready support', 'copy' => 'Dummy milestone for 2026 showing continued focus on service quality, information clarity, and digital convenience.'],
        ];

        if (!function_exists('renderCompanyTimelineCard')) {
            function renderCompanyTimelineCard($item, $index)
            {
                $timelineImages = [
                    'https://images.unsplash.com/photo-1758519289074-9de36003622b?auto=format&fit=crop&fm=jpg&q=75&w=900',
                    'https://images.unsplash.com/photo-1758873271772-6bbc792c1514?auto=format&fit=crop&fm=jpg&q=75&w=900',
                    'https://images.unsplash.com/photo-1758518729829-162d6bf27b5e?auto=format&fit=crop&fm=jpg&q=75&w=900',
                    'https://images.unsplash.com/photo-1591696205602-2f950c417cb9?auto=format&fit=crop&fm=jpg&q=75&w=900',
                    'https://images.unsplash.com/photo-1770681381576-f1fdceb2ea01?auto=format&fit=crop&fm=jpg&q=75&w=900',
                    'https://images.unsplash.com/photo-1635236198091-33d5aa8466cc?auto=format&fit=crop&fm=jpg&q=75&w=900',
                ];
                $timelineImage = $timelineImages[$index % count($timelineImages)];
                ?>
                <div class="colum_card_main company-timeline-card">
                    <div class="timeline_colum_card">
                        <div class="timeline_num">
                            <div class="ts-14px mono"><?= e($item['year']) ?></div>
                        </div>
                        <div global-target="" class="ts-14px color-white mono"><?= e($item['title']) ?></div>
                        <div class="gray_cube"></div>
                    </div>
                    <div class="timeline_card_anim">
                        <div class="rivesize company-timeline-photo-frame">
                            <img class="company-timeline-photo" src="<?= e($timelineImage) ?>"
                                alt="<?= e($item['title'] . ' timeline photo') ?>" loading="lazy" decoding="async">
                        </div>
                    </div>
                    <div class="timeline_colum_card bottom">
                        <div class="timeline_num">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.35em" viewBox="0 0 24 24" fill="none"
                                aria-hidden="true">
                                <path d="M4 18V6" stroke="currentColor" stroke-width="1.8" />
                                <path d="M20 18V6" stroke="currentColor" stroke-width="1.8" />
                                <path d="M6 18h12" stroke="currentColor" stroke-width="1.8" />
                                <path d="M8 14l3-3 2 2 3-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="company-timeline-copy">
                            <p><?= e($item['copy']) ?></p>
                        </div>
                        <div class="gray_cube bottom"></div>
                    </div>
                    <?php if ($index < 16): ?>
                        <div class="timeline_connector">
                            <div class="connector_line_top"></div>
                            <div class="connector_line_bottom"></div>
                        </div>
                    <?php endif; ?>
                </div>
                <?php
            }
        }
        ?>

        <section class="company-timeline-section" id="about-history" aria-labelledby="about-history-title">
            <div class="company-timeline-body">
                <div class="rebounce-effect">
                    <div class="page-wrapper">
                        <div class="main-wrapper">
                            <div>
                                <div inner-addon="" class="padding-large">
                                    <div class="container-1400">
                                        <div class="timeline_wrapper">
                                            <div class="timeline_heading">
                                                <h2 class="h2-90px color-white text-align-center"
                                                    id="about-history-title">Company timeline</h2>
                                            </div>
                                            <div class="timeline_main">
                                                <div class="timeline_colum_left mobile_optimized">
                                                    <?php foreach ($companyTimelineItems as $index => $item): ?>
                                                        <?php if ($index % 2 === 1)
                                                            renderCompanyTimelineCard($item, $index); ?>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="mobile_optimized">
                                                    <div class="timeline_progress_main">
                                                        <div class="timeline_current">
                                                            <div class="tl_current_top"></div>
                                                            <div class="white_cube"></div>
                                                            <div class="tl_current_bottom"></div>
                                                        </div>
                                                        <div class="timeline_progress">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%"
                                                                viewBox="0 0 2 100" fill="none" height="100%"
                                                                preserveAspectRatio="none">
                                                                <path d="M1 0L1 100" stroke="currentColor"
                                                                    stroke-width="2" stroke-dasharray="2 10"
                                                                    vector-effect="non-scaling-stroke">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                        <div class="w-embed"></div>
                                                    </div>
                                                </div>
                                                <div class="timeline_colum_left right">
                                                    <?php foreach ($companyTimelineItems as $index => $item): ?>
                                                        <?php if ($index % 2 === 0)
                                                            renderCompanyTimelineCard($item, $index); ?>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                            <div class="timeline_main mobile">
                                                <div>
                                                    <div class="timeline_colum_left right">
                                                        <?php foreach ($companyTimelineItems as $index => $item): ?>
                                                            <?php renderCompanyTimelineCard($item, $index); ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="about-locations" id="about-locations" aria-labelledby="about-locations-title">
            <div class="about-shell">
                <h2 class="locations-title" id="about-locations-title">Locations</h2>

                <div class="locations-grid">
                    <article class="location-card">
                        <img src="https://images.unsplash.com/photo-1595658658481-d53d3f999875?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                            alt="Nariman Point business district in Mumbai">
                        <span class="location-meta">Gretex Share Broking &bull; Mumbai</span>
                        <h3>Registered Office</h3>
                        <address>Naman Midtown, A wing Unit 401, FP No. 616, Tulsi Pipe Road, Dr. Ambedkar Nagar
                            Senapati
                            Bapat Marg, Behind Kamgar Kala Kendra, Dadar West, Mumbai:400013.</address>
                        <span class="location-tag">Dadar West</span>
                    </article>

                    <article class="location-card">
                        <img src="https://images.unsplash.com/photo-1567157577867-05ccb1388e66?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                            alt="Fort Mumbai heritage business street">
                        <span class="location-meta">Gretex Share Broking &bull; Mumbai</span>
                        <h3>Branch Office</h3>
                        <address>401-402, SPG Empress, Mithakhali Circle, Navrangpura, Ahmedabad -380009.</address>
                        <span class="location-tag">Mithakhali Circle</span>
                    </article>
                </div>
            </div>
        </section>

        <section class="about-management" id="about-management" aria-labelledby="about-management-title">
            <div class="about-shell">
                <div class="about-section-heading about-section-heading--centered">
                    <span class="about-section-badge">About Gretex Share Broking &bull; Corporate Governance</span>
                    <h2 id="about-management-title">Leadership &amp; Key Management</h2>
                    <p class="about-section-subtitle">At the helm of change, governance, and sustained excellence in
                        the dynamic landscape of financial markets.</p>
                </div>

                <div class="director-grid">
                    <article class="director-card">
                        <div class="director-card-top">
                            <div class="director-avatar">
                                <img src="<?= e(assetUrl('assets/images/alok-harlalkar.jpg')) ?>"
                                    alt="Alok Harlalka">
                                <span>Board of Directors</span>
                            </div>
                            <div class="director-info">
                                <span class="director-experience">25 Yrs+ Experience</span>
                                <h3>Alok Harlalka</h3>
                                <p class="director-role">Chairman &amp; Joint Managing Director</p>
                                <p class="director-company">Gretex Share Broking Limited</p>
                            </div>
                        </div>
                        <p class="director-description">He is the driving force behind the company, having more
                            than 25 years of experience in Capital Market and securities market services and also
                            director of Association of Investment Bankers of India (AIBI). His dynamic leadership
                            and passion for business has accelerated the growth of the company manifold. Under him,
                            Gretex has taken a massive leap to emerge as one of the greats among its players.</p>
                    </article>
                    <article class="director-card">
                        <div class="director-card-top">
                            <div class="director-avatar">
                                <img src="<?= e(assetUrl('assets/images/arvind-harlalka.jpg')) ?>"
                                    alt="Arvind Harlalka">
                                <span>Board of Directors</span>
                            </div>
                            <div class="director-info">
                                <span class="director-experience">30 Yrs+ Experience</span>
                                <h3>Arvind Harlalka</h3>
                                <p class="director-role">Managing Director &amp; Chief Financial Officer</p>
                                <p class="director-company">Gretex Share Broking Limited</p>
                            </div>
                        </div>
                        <p class="director-description">He has 30 years of experience in the field of accounts,
                            finance, marketing and manufacturing. He has played a key role in setting up several
                            businesses and functions for the Group. He continues to play a key role in several
                            strategic initiatives for the Group, including driving its Human Resources, Strategy
                            and Business development.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="about-leadership-team" id="about-leadership-team" aria-labelledby="about-leadership-team-title">
            <div class="about-shell">
                <div class="about-section-heading about-section-heading--centered">
                    <h2 id="about-leadership-team-title">Leadership Team</h2>
                    <p class="about-section-subtitle about-section-subtitle--accent">At the helm of change and
                        excellence</p>
                </div>

                <div class="team-grid">
                    <article class="team-card">
                        <div class="team-avatar">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 20c0-4.418 3.582-8 8-8s8 3.582 8 8"></path>
                            </svg>
                        </div>
                        <span class="team-experience">18 Yrs+ Experience</span>
                        <h3>Jignesh Lathigra</h3>
                        <p class="team-role">Head &ndash; Risk Management Services</p>
                        <p class="team-company">Gretex Share Broking Limited</p>
                        <p class="team-expertise-label">Area of Expertise:</p>
                        <ul class="team-expertise-list">
                            <li>In-depth Understanding of the Financial Market</li>
                            <li>Risk Identification and Assessment</li>
                            <li>Regulatory Compliance</li>
                        </ul>
                    </article>
                    <article class="team-card">
                        <div class="team-avatar">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 20c0-4.418 3.582-8 8-8s8 3.582 8 8"></path>
                            </svg>
                        </div>
                        <span class="team-experience">30 Yrs+ Experience</span>
                        <h3>Rajeev Kanotra</h3>
                        <p class="team-role">Director</p>
                        <p class="team-company">Gretex Share Broking Limited</p>
                        <p class="team-expertise-label">Area of Expertise:</p>
                        <ul class="team-expertise-list">
                            <li>Equity &amp; Hedging Expertise</li>
                            <li>Consistent Market Outperformance</li>
                            <li>Strong Sector &ndash; Micro Insights</li>
                            <li>M&amp;A, Fund &ndash; Raising &amp; HNI</li>
                        </ul>
                    </article>
                    <article class="team-card">
                        <div class="team-avatar">
                            <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                                <circle cx="12" cy="8" r="4"></circle>
                                <path d="M4 20c0-4.418 3.582-8 8-8s8 3.582 8 8"></path>
                            </svg>
                        </div>
                        <span class="team-experience">4 Yrs+ Experience</span>
                        <h3>Tanishq Harlalka</h3>
                        <p class="team-role">HOD of Marketing &amp; Strategy</p>
                        <p class="team-company">Gretex Share Broking Limited</p>
                        <p class="team-expertise-label">Area of Expertise:</p>
                        <ul class="team-expertise-list">
                            <li>Equity &amp; Hedging Expertise</li>
                            <li>Consistent Market Outperformance</li>
                            <li>Strong Sector &ndash; Micro Insights</li>
                            <li>M&amp;A, Fund &ndash; Raising &amp; HNI Portfolio Management</li>
                        </ul>
                    </article>
                    <article class="team-card">
                        <div class="team-avatar">
                            <img src="<?= e(assetUrl('assets/images/ganesh.png')) ?>" alt="Ganesh Kedare">
                        </div>
                        <span class="team-experience">15 Yrs+ Experience</span>
                        <h3>Ganesh Kedare</h3>
                        <p class="team-role">Compliance Officer</p>
                        <p class="team-company">Gretex Share Broking Limited</p>
                        <p class="team-expertise-label">Area of Expertise:</p>
                        <ul class="team-expertise-list">
                            <li>Equity &amp; Hedging Expertise</li>
                            <li>CDSL &amp; NSDL Audit &amp; DP Compliance</li>
                            <li>Risk-Based Supervision &amp; Inspection</li>
                            <li>Internal, Concurrent &amp; System Audits</li>
                        </ul>
                    </article>
                    <article class="team-card">
                        <div class="team-avatar">
                            <img src="<?= e(assetUrl('assets/images/rashmi-vyas.png')) ?>" alt="Rashmi Vyas">
                        </div>
                        <span class="team-experience">Company Secretary</span>
                        <h3>Rashmi Vyas</h3>
                        <p class="team-role">Company Secretary &amp; Compliance Officer</p>
                        <p class="team-company">Gretex Share Broking Limited</p>
                        <p class="team-expertise-label">Area of Expertise:</p>
                        <ul class="team-expertise-list">
                            <li>Corporate Secretarial Practices &amp; Governance</li>
                            <li>Companies Act, 2013 &amp; SEBI Regulations (LODR &amp; ICDR)</li>
                            <li>Board &amp; General Meeting Coordination</li>
                            <li>Regulatory Filings &amp; Disclosures</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/about-tabs.js')) ?>" defer></script>
    <script src="<?= e(assetUrl('js/account-process.js')) ?>" defer></script>

</body>

</html>