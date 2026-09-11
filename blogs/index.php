<?php
require_once __DIR__ . '/../helpers/urlfetcher.php';
$siteBase = '../';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/blogs.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
</head>

<body class="blogs-page">
    <?php include __DIR__ . '/../templates/navbar.php'; ?>

    <div class="blogs-alert">
        <span>Do you have a complaint?</span>
        <a href="../contact/">Submit a complaint</a>
    </div>

    <main id="main-content" class="blogs-main">
        <div class="blogs-shell">
            <div class="blogs-topline">
                <div>
                    <h1>Market notes for sharper investing decisions</h1>
                </div>
                <p>Read practical perspectives on trading discipline, risk, IPO participation, and long-term wealth routines from the Gretex desk.</p>
            </div>

            <section class="blogs-feature-grid" aria-labelledby="featured-post-title">
                <a class="blog-feature-card" href="blog-template" aria-labelledby="featured-post-title">
                    <img src="https://images.unsplash.com/photo-1642790106117-e829e14a795f?auto=format&amp;fit=crop&amp;w=1500&amp;q=80" alt="Sunlit trading desk with market data on multiple screens">
                    <div class="blog-feature-content">
                        <span class="blog-category">Market Strategy</span>
                        <h2 id="featured-post-title">Building a calmer trading routine in fast-moving markets</h2>
                        <p class="blog-meta">
                            <span>Jul 23</span>
                            <span class="blog-dot" aria-hidden="true"></span>
                            <span>8 min read</span>
                        </p>
                    </div>
                </a>

                <aside class="latest-panel" aria-labelledby="latest-posts-title">
                    <div class="latest-heading-row">
                        <h2 id="latest-posts-title">Latest posts</h2>
                        <a class="latest-view-all" href="#all-blogs">View all</a>
                    </div>

                    <div class="latest-posts">
                        <a class="latest-post-link" href="blog-template">
                            <span class="latest-thumb">
                                <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&amp;fit=crop&amp;w=360&amp;q=80" alt="Stock market chart on a monitor">
                            </span>
                            <div>
                                <h3>How to use watchlists without overtrading every market move</h3>
                                <span class="blog-meta">
                                    <span>Jul 22</span>
                                    <span class="blog-dot" aria-hidden="true"></span>
                                    <span>6 min read</span>
                                </span>
                            </div>
                        </a>

                        <a class="latest-post-link" href="blog-template">
                            <span class="latest-thumb">
                                <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&amp;fit=crop&amp;w=360&amp;q=80" alt="Investor reviewing financial documents">
                            </span>
                            <div>
                                <h3>What first-time IPO investors should check before applying</h3>
                                <span class="blog-meta">
                                    <span>Jul 20</span>
                                    <span class="blog-dot" aria-hidden="true"></span>
                                    <span>7 min read</span>
                                </span>
                            </div>
                        </a>

                        <a class="latest-post-link" href="blog-template">
                            <span class="latest-thumb">
                                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=360&amp;q=80" alt="Analytics dashboard with financial metrics">
                            </span>
                            <div>
                                <h3>Risk rules that help active traders stay consistent</h3>
                                <span class="blog-meta">
                                    <span>Jul 18</span>
                                    <span class="blog-dot" aria-hidden="true"></span>
                                    <span>5 min read</span>
                                </span>
                            </div>
                        </a>

                        <a class="latest-post-link" href="blog-template">
                            <span class="latest-thumb">
                                <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&amp;fit=crop&amp;w=360&amp;q=80" alt="Financial charts and notes on a desk">
                            </span>
                            <div>
                                <h3>Reading market trends without ignoring your investment horizon</h3>
                                <span class="blog-meta">
                                    <span>Jul 16</span>
                                    <span class="blog-dot" aria-hidden="true"></span>
                                    <span>8 min read</span>
                                </span>
                            </div>
                        </a>
                    </div>
                </aside>
            </section>

            <section id="all-blogs" aria-labelledby="all-blogs-title">
                <div class="blog-section-header">
                    <div>
                        <p class="blogs-kicker">Explore the archive</p>
                        <h2 class="blog-section-title" id="all-blogs-title">All blogs</h2>
                    </div>
                    <p class="blog-section-summary">Practical reading across market strategy, risk, investing basics and client education.</p>
                </div>

                <div class="blog-card-grid">
                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Stock market chart on a monitor">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">Market Strategy</span>
                            <h3>How to use watchlists without overtrading every market move</h3>
                            <p>Use focused lists and planned levels to make market monitoring more deliberate.</p>
                            <span class="blog-meta">
                                <span>Jul 22</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>6 min read</span>
                            </span>
                        </div>
                    </a>

                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Investor reviewing financial documents">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">IPO</span>
                            <h3>What first-time IPO investors should check before applying</h3>
                            <p>Review the offer, risk factors and allocation expectations before submitting an application.</p>
                            <span class="blog-meta">
                                <span>Jul 20</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>7 min read</span>
                            </span>
                        </div>
                    </a>

                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Analytics dashboard with financial metrics">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">Risk Management</span>
                            <h3>Risk rules that help active traders stay consistent</h3>
                            <p>Define risk early so every order has a clear purpose, position size and exit.</p>
                            <span class="blog-meta">
                                <span>Jul 18</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>5 min read</span>
                            </span>
                        </div>
                    </a>

                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1543286386-713bdd548da4?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Financial charts and notes on a desk">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">Investing Basics</span>
                            <h3>Reading market trends without ignoring your investment horizon</h3>
                            <p>Put short-term market moves in context before changing a long-term investment plan.</p>
                            <span class="blog-meta">
                                <span>Jul 16</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>8 min read</span>
                            </span>
                        </div>
                    </a>

                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Team reviewing a trading dashboard together">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">Client Focus</span>
                            <h3>How a clear support process improves the investing experience</h3>
                            <p>Understand where digital tools end and assisted service can help investors move forward.</p>
                            <span class="blog-meta">
                                <span>Jul 15</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>6 min read</span>
                            </span>
                        </div>
                    </a>

                    <a class="blog-card" href="blog-template">
                        <span class="blog-card-image">
                            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&amp;fit=crop&amp;w=800&amp;q=80" alt="Business planning session with notes and charts">
                        </span>
                        <div class="blog-card-body">
                            <span class="blog-category">Process</span>
                            <h3>Why a repeatable process matters before choosing a product</h3>
                            <p>Build dependable checks around goals, risk and time horizon before comparing products.</p>
                            <span class="blog-meta">
                                <span>Jul 12</span>
                                <span class="blog-dot" aria-hidden="true"></span>
                                <span>7 min read</span>
                            </span>
                        </div>
                    </a>
                </div>
            </section>
        </div>
    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
</body>

</html>
