<?php require_once __DIR__ . '/../helpers/urlfetcher.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP Calculator - Gretex Financial</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/calculator-page.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/chatbot.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <script src="<?= e(assetUrl('js/gretex-financial.js')) ?>"></script>
    <script src="<?= e(assetUrl('js/calculator-functions.js')) ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.44.0/dist/apexcharts.min.js"></script>
</head>

<body class="calculator-shell-page sip-calculator-page">
    <?php
    $siteBase = '../';
    include __DIR__ . '/../templates/navbar.php';
    ?>




    <!-- Navigation -->

    <!-- Calculator Page Content -->
    <main class="calculator-page investment-modern-calc-page">
        <div class="calculator-hero">
            <div class="container">
                <div class="calculator-hero-content">
                    <nav class="calculator-breadcrumb" aria-label="Breadcrumb">
                        <a href="../">Home</a>
                        <span aria-hidden="true">&rsaquo;</span>
                        <a href="index.php">Calculators</a>
                        <span aria-hidden="true">&rsaquo;</span>
                        <span>SIP Calculator</span>
                    </nav>

                    <h1 class="calculator-page-title">SIP Calculator</h1>
                    <p class="calculator-page-description">Estimate the potential future value of monthly investments
                        using an adjustable assumed annual return and investment period.</p>
                </div>
            </div>
        </div>

        <div class="calculator-main-section">
            <div class="container">
                <section class="investment-modern-calc" aria-label="Investment calculator">
                    <div class="investment-modern-calc-grid">
                        <div class="investment-controls" role="group" aria-label="Inputs">
                            <div class="investment-tabs" role="group" aria-label="Investment type">
                                <button type="button" class="investment-tab is-active" data-mode="sip"
                                    aria-pressed="true">SIP</button>
                                <button type="button" class="investment-tab" data-mode="lumpsum"
                                    aria-pressed="false">Lump Sum</button>
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="amountLabel"
                                        for="investmentAmountRange">Monthly contribution</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="amountErrorIcon"
                                            aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <span class="pill-unit">₹</span>
                                            <input type="text" class="pill-input" id="investmentAmountInput"
                                                value="5000" inputmode="numeric"
                                                aria-label="Monthly investment amount">
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="investmentAmountRange" min="100"
                                    max="10000000" step="100" value="5000" aria-labelledby="amountLabel">
                                <div class="investment-range-meta" aria-hidden="true">
                                    <span>&#8377;500</span>
                                    <span>&#8377;1L</span>
                                </div>
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="rateLabel" for="investmentRateRange">Assumed annual
                                        return</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="rateErrorIcon"
                                            aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="investmentRateInput" min="1"
                                                max="30" step="0.1" value="12" inputmode="decimal"
                                                aria-label="Assumed annual return value">
                                            <span class="pill-unit">%</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="investmentRateRange" min="1" max="30"
                                    step="0.1" value="12" aria-labelledby="rateLabel">
                                <div class="investment-range-meta" aria-hidden="true">
                                    <span>1%</span>
                                    <span>30%</span>
                                </div>
                            </div>

                            <div class="investment-slider-field">
                                <div class="investment-slider-header">
                                    <label class="investment-slider-label" id="yearsLabel" for="investmentYearsRange">Investment
                                        period</label>
                                    <div class="investment-input-wrap">
                                        <span class="investment-error-icon" id="yearsErrorIcon"
                                            aria-hidden="true">i</span>
                                        <div class="investment-value-pill">
                                            <input type="number" class="pill-input" id="investmentYearsInput" min="1"
                                                max="40" step="1" value="10" inputmode="numeric"
                                                aria-label="Investment period in years">
                                            <span class="pill-unit">Yr</span>
                                        </div>
                                    </div>
                                </div>
                                <input type="range" class="investment-range" id="investmentYearsRange" min="1" max="40"
                                    step="1" value="10" aria-labelledby="yearsLabel">
                                <div class="investment-range-meta" aria-hidden="true">
                                    <span>1 Yr</span>
                                    <span>40 Yrs</span>
                                </div>
                            </div>
                            <button type="button" class="investment-reset-button" id="resetProjectionBtn">
                                <i data-lucide="rotate-ccw"></i>
                                <span>Reset</span>
                            </button>
                        </div>

                        <div class="investment-visual" role="group" aria-label="Projection summary">
                            <div class="investment-donut-card">
                                <p class="investment-summary-heading">Projection Summary</p>
                                <div class="investment-projection-layout">
                                    <div class="investment-donut-wrap">
                                        <div id="investmentDonutChart"></div>
                                        <div class="investment-donut-center">
                                            <div class="investment-donut-center-label">Projected Value</div>
                                            <div class="investment-donut-center-value" id="donutCenterValue">&#8377;0
                                            </div>
                                        </div>
                                    </div>

                                    <div class="investment-graph-quickbar" aria-hidden="false">
                                        <div class="quickbar-item">
                                            <div class="quickbar-line">
                                                <span class="legend-dot legend-invested"></span>
                                                <span class="quickbar-label">Total contributions</span>
                                            </div>
                                            <div class="quickbar-value" id="summaryInvested">&#8377;0</div>
                                        </div>

                                        <div class="quickbar-item">
                                            <div class="quickbar-line">
                                                <span class="legend-dot legend-returns"></span>
                                                <span class="quickbar-label">Projected gains</span>
                                            </div>
                                            <div class="quickbar-value quickbar-returns-value" id="summaryReturns">
                                                &#8377;0</div>
                                        </div>

                                        <div class="quickbar-total">
                                            <div class="quickbar-total-label">Projected value</div>
                                            <div class="quickbar-total-value" id="summaryTotal">&#8377;0</div>
                                        </div>
                                    </div>
                                </div>

                                <a class="investment-breakdown-link" href="#sip-information">View annual breakdown <span
                                        aria-hidden="true">&rarr;</span></a>
                                <p class="investment-output-note">Assumes contributions are made at the beginning of
                                    each month and the selected annual return compounds at its equivalent monthly rate.
                                </p>
                            </div>
                        </div>
                    </div>

                </section>

                <div class="calculator-wrapper" id="sip-information">
                    <!-- Left Section: Calculator Information -->
                    <div class="calculator-info-section">
                        <div class="calculator-info-card">
                            <h2 class="calculator-info-title">About SIP Calculator</h2>
                            <div class="calculator-info-content">
                                <p>A Systematic Investment Plan (SIP) is an investment strategy where you invest a fixed
                                    amount regularly in mutual funds. This calculator helps you understand how your SIP
                                    investments can grow over time.</p>

                                <h3>How SIP Works</h3>
                                <ul>
                                    <li><strong>Regular Investment:</strong> You invest a fixed amount every month</li>
                                    <li><strong>Power of Compounding:</strong> Your returns generate more returns over
                                        time</li>
                                    <li><strong>Rupee Cost Averaging:</strong> You buy more units when prices are low
                                        and fewer when prices are high</li>
                                    <li><strong>Disciplined Saving:</strong> Helps build a habit of regular investing
                                    </li>
                                </ul>

                                <h3>Benefits of SIP</h3>
                                <ul>
                                    <li>Start with as little as &#8377;500 per month</li>
                                    <li>No need to time the market</li>
                                    <li>Reduces the impact of market volatility</li>
                                    <li>Flexible - increase, decrease, or pause anytime</li>
                                    <li>Long-term wealth creation through compounding</li>
                                </ul>

                                <h3>Algorithm &amp; Formula</h3>
                                <div class="formula-box">
                                    <math class="sip-equation" xmlns="http://www.w3.org/1998/Math/MathML">
                                        <mrow>
                                            <mi>FV</mi>
                                            <mo>=</mo>
                                            <mi>P</mi>
                                            <mo>&times;</mo>
                                            <mfrac>
                                                <mrow>
                                                    <msup>
                                                        <mrow>
                                                            <mo>(</mo>
                                                            <mn>1</mn>
                                                            <mo>+</mo>
                                                            <mi>r</mi>
                                                            <mo>)</mo>
                                                        </mrow>
                                                        <mi>n</mi>
                                                    </msup>
                                                    <mo>-</mo>
                                                    <mn>1</mn>
                                                </mrow>
                                                <mi>r</mi>
                                            </mfrac>
                                            <mo>&times;</mo>
                                            <mrow>
                                                <mo>(</mo>
                                                <mn>1</mn>
                                                <mo>+</mo>
                                                <mi>r</mi>
                                                <mo>)</mo>
                                            </mrow>
                                        </mrow>
                                    </math>
                                    <div class="formula-definition">
                                        <p><strong>Where:</strong></p>
                                        <ul>
                                            <li><strong>P</strong> = monthly contribution</li>
                                            <li><strong>R</strong> = assumed effective annual return</li>
                                            <li>
                                                <math class="sip-inline-equation"
                                                    xmlns="http://www.w3.org/1998/Math/MathML">
                                                    <mrow>
                                                        <mi>r</mi>
                                                        <mo>=</mo>
                                                        <msup>
                                                            <mrow>
                                                                <mo>(</mo>
                                                                <mn>1</mn>
                                                                <mo>+</mo>
                                                                <mi>R</mi>
                                                                <mo>)</mo>
                                                            </mrow>
                                                            <mfrac>
                                                                <mn>1</mn>
                                                                <mn>12</mn>
                                                            </mfrac>
                                                        </msup>
                                                        <mo>-</mo>
                                                        <mn>1</mn>
                                                    </mrow>
                                                </math>
                                            </li>
                                            <li><strong>n</strong> = 12 &times; investment years</li>
                                            <li>The final <strong>(1+r)</strong> assumes beginning-of-month
                                                contributions</li>
                                        </ul>
                                    </div>
                                </div>

                                <h3>Who Should Use?</h3>
                                <p>Long-term investors, salaried individuals, and first-time mutual fund investors
                                    seeking disciplined wealth creation through regular investments.</p>

                                <h3>Key Factors</h3>
                                <p><strong>Monthly SIP Amount:</strong> The fixed amount you invest every month
                                    (&#8377;500 - &#8377;1,00,000)</p>
                                <p><strong>Expected Return:</strong> The annualized return you expect</p>
                                <p><strong>Investment Period:</strong> Duration for which you plan to invest (1-40
                                    years)</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <script>
        // Initialize Lucide icons
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }

        /* =========================
           Modern Investment UI
           (real-time SIP/Lumpsum + donut)
        ========================= */
        (function initModernInvestmentUI() {
            const root = document.querySelector('.investment-modern-calc');
            if (!root) return;

            const tabs = root.querySelectorAll('.investment-tab[data-mode]');

            const amountLabel = document.getElementById('amountLabel');
            const amountRange = document.getElementById('investmentAmountRange');
            const amountInput = document.getElementById('investmentAmountInput');
            const amountField = amountRange ? amountRange.closest('.investment-slider-field') : null;

            const rateRange = document.getElementById('investmentRateRange');
            const rateInput = document.getElementById('investmentRateInput');
            const rateField = rateRange ? rateRange.closest('.investment-slider-field') : null;

            const yearsRange = document.getElementById('investmentYearsRange');
            const yearsInput = document.getElementById('investmentYearsInput');
            const yearsField = yearsRange ? yearsRange.closest('.investment-slider-field') : null;
            const resetProjectionBtn = document.getElementById('resetProjectionBtn');

            const summaryInvested = document.getElementById('summaryInvested');
            const summaryReturns = document.getElementById('summaryReturns');
            const summaryTotal = document.getElementById('summaryTotal');
            const donutCenterValue = document.getElementById('donutCenterValue');

            const MIN_AMOUNT = 100;
            const MAX_AMOUNT = 10000000;
            const MIN_RATE = 1;
            const MAX_RATE = 30;
            const MIN_YEARS = 1;
            const MAX_YEARS = 40;

            let activeMode = 'sip';
            let donutChart = null;

            function clamp(n, min, max) {
                if (!isFinite(n)) return min;
                return Math.min(max, Math.max(min, n));
            }

            function formatINR0(num) {
                const n = Number(num);
                if (!isFinite(n)) return '₹0';
                return '₹' + Math.round(n).toLocaleString('en-IN');
            }

            function formatINRDigits(n) {
                const x = Number(n);
                if (!isFinite(x)) return '0';
                return Math.round(x).toLocaleString('en-IN');
            }

            function parseDigitsOnly(input) {
                if (typeof input !== 'string') return Number(input) || 0;
                // Keep only digits for numeric parsing (commas may exist).
                const digits = input.replace(/[^\d]/g, '');
                const n = Number(digits);
                return isFinite(n) ? n : 0;
            }

            function setAmountError(hasError) {
                if (!amountField) return;
                amountField.classList.toggle('is-error', !!hasError);
            }

            function setRateError(hasError) {
                if (!rateField) return;
                rateField.classList.toggle('is-error', !!hasError);
            }

            function setYearsError(hasError) {
                if (!yearsField) return;
                yearsField.classList.toggle('is-error', !!hasError);
            }

            function setRangeFill(rangeEl, value) {
                const min = Number(rangeEl.min);
                const max = Number(rangeEl.max);
                const percent = ((value - min) / (max - min)) * 100;
                rangeEl.style.setProperty('--fill', clamp(percent, 0, 100).toFixed(3));
            }

            function computeLumpsum(amount, rate, years) {
                const r = rate / 100;
                const totalValue = amount * Math.pow(1 + r, years);
                const invested = amount;
                const returns = totalValue - invested;
                return { invested, returns, totalValue };
            }

            function computeSIP(monthlyAmount, rate, years) {
                // Keep preview math aligned with the main SIP calculator
                const monthlyRate = Math.pow(1 + (rate / 100), 1 / 12) - 1;
                const totalMonths = years * 12;
                // Future value of SIP (end-of-month payments):
                // FV (annuity due) = P * [((1+m)^n - 1) / m] * (1+m)
                const totalValue = monthlyRate === 0
                    ? monthlyAmount * totalMonths
                    : monthlyAmount * ((Math.pow(1 + monthlyRate, totalMonths) - 1) / monthlyRate) * (1 + monthlyRate);
                const invested = monthlyAmount * totalMonths;
                const returns = totalValue - invested;
                return { invested, returns, totalValue };
            }

            function computeActive() {
                const amount = Number(amountRange.value);
                const rate = Number(rateRange.value);
                const years = Number(yearsRange.value);

                if (activeMode === 'sip') {
                    return computeSIP(amount, rate, years);
                }
                return computeLumpsum(amount, rate, years);
            }

            function ensureDonutChart() {
                if (donutChart) return;
                if (typeof ApexCharts === 'undefined') return;

                const donutEl = document.getElementById('investmentDonutChart');
                if (!donutEl) return;

                const data = computeActive();

                donutChart = new ApexCharts(donutEl, {
                    series: [
                        Math.max(0, data.invested),
                        Math.max(0, data.returns)
                    ],
                    chart: {
                        type: 'donut',
                        height: 285,
                        animations: {
                            enabled: true,
                            easing: 'easeinout',
                            speed: 450
                        }
                    },
                    labels: ['Invested amount', 'Est. returns'],
                    // Order matches series: [invested, returns]
                    colors: ['#475569', '#2563eb'],
                    dataLabels: { enabled: false },
                    legend: { show: false },
                    stroke: { show: false },
                    tooltip: {
                        y: {
                            formatter: function (val) {
                                return formatINR0(val);
                            }
                        }
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '84%',
                                labels: { show: false }
                            }
                        }
                    }
                });

                donutChart.render();
            }

            function updateDonutChart(invested, returns, animate) {
                if (typeof ApexCharts === 'undefined') return;
                if (!donutChart) ensureDonutChart();
                if (!donutChart) return;
                donutChart.updateSeries([Math.max(0, invested), Math.max(0, returns)], !!animate);
            }

            function updateSummaryUI(animate = true) {
                const data = computeActive();
                const invested = data.invested;
                const returns = data.returns;
                const totalValue = data.totalValue;

                if (summaryInvested) summaryInvested.textContent = formatINR0(invested);
                if (summaryReturns) summaryReturns.textContent = formatINR0(returns);
                if (summaryTotal) summaryTotal.textContent = formatINR0(totalValue);
                if (donutCenterValue) donutCenterValue.textContent = formatINR0(totalValue);

                updateDonutChart(invested, returns, animate);
            }

            function setMode(mode) {
                activeMode = mode === 'sip' ? 'sip' : 'lumpsum';
                const isSip = activeMode === 'sip';

                if (amountLabel) {
                    amountLabel.textContent = isSip ? 'Monthly contribution' : 'Lump sum investment';
                }

                tabs.forEach(btn => {
                    const isActive = btn.dataset.mode === activeMode;
                    btn.classList.toggle('is-active', isActive);
                    btn.setAttribute('aria-pressed', isActive ? 'true' : 'false');
                });

                updateSummaryUI(true);
            }

            // Slider -> input
            amountRange.addEventListener('input', function () {
                const v = Math.round(Number(amountRange.value));
                const clamped = clamp(v, MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateSummaryUI(false);
            });
            amountRange.addEventListener('change', function () {
                setAmountError(false);
                updateSummaryUI(true);
            });

            rateRange.addEventListener('input', function () {
                const v = Number(rateRange.value);
                const clamped = clamp(v, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                rateInput.value = rounded;
                setRateError(false);
                setRangeFill(rateRange, rounded);
                updateSummaryUI(false);
            });
            rateRange.addEventListener('change', function () {
                setRateError(false);
                updateSummaryUI(true);
            });

            yearsRange.addEventListener('input', function () {
                const v = Math.round(Number(yearsRange.value));
                const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                yearsInput.value = clamped;
                setYearsError(false);
                setRangeFill(yearsRange, clamped);
                updateSummaryUI(false);
            });
            yearsRange.addEventListener('change', function () {
                setYearsError(false);
                updateSummaryUI(true);
            });

            // Input -> slider
            amountInput.addEventListener('input', function () {
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                if (!digits) {
                    // Allow clear; but if user typed non-numeric characters only, still show error.
                    if (raw.trim() === '') {
                        setAmountError(false);
                    } else {
                        amountInput.value = '';
                        setAmountError(true);
                    }
                    return;
                }

                const v = Number(digits);
                const invalid = v < MIN_AMOUNT || v > MAX_AMOUNT;
                setAmountError(invalid);

                const clamped = clamp(Math.round(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                setRangeFill(amountRange, clamped);

                // Keep comma formatting in the input.
                amountInput.value = formatINRDigits(v);

                // Don't update summary while invalid.
                if (!invalid) updateSummaryUI(false);
            });
            amountInput.addEventListener('change', function () {
                // Normalize formatting on blur/change
                const raw = String(amountInput.value || '');
                const digits = raw.replace(/[^\d]/g, '');
                const v = digits ? Number(digits) : MIN_AMOUNT;
                const clamped = clamp(Math.round(v), MIN_AMOUNT, MAX_AMOUNT);
                amountRange.value = clamped;
                amountInput.value = formatINRDigits(clamped);
                setAmountError(false);
                setRangeFill(amountRange, clamped);
                updateSummaryUI(true);
            });

            rateInput.addEventListener('input', function () {
                const raw = String(rateInput.value || '');
                if (raw.trim() === '') {
                    setRateError(true);
                    return;
                }
                const v = Number(rateInput.value);
                if (!isFinite(v)) {
                    setRateError(true);
                    return;
                }
                const invalid = v < MIN_RATE || v > MAX_RATE;
                setRateError(invalid);
                const clamped = clamp(v, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                setRangeFill(rateRange, rounded);
                if (!invalid) {
                    updateSummaryUI(false);
                }
            });
            rateInput.addEventListener('change', function () {
                const raw = String(rateInput.value || '');
                const v = raw.trim() === '' ? MIN_RATE : Number(raw);
                const safe = isFinite(v) ? v : MIN_RATE;
                const clamped = clamp(safe, MIN_RATE, MAX_RATE);
                const rounded = Math.round(clamped * 10) / 10;
                rateRange.value = rounded;
                rateInput.value = rounded;
                setRateError(false);
                setRangeFill(rateRange, rounded);
                updateSummaryUI(true);
            });

            yearsInput.addEventListener('input', function () {
                const raw = String(yearsInput.value || '');
                if (raw.trim() === '') {
                    setYearsError(true);
                    return;
                }
                const v = Math.round(Number(yearsInput.value));
                if (!isFinite(v)) {
                    setYearsError(true);
                    return;
                }
                const invalid = v < MIN_YEARS || v > MAX_YEARS;
                setYearsError(invalid);
                const clamped = clamp(v, MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                setRangeFill(yearsRange, clamped);
                if (!invalid) {
                    updateSummaryUI(false);
                }
            });
            yearsInput.addEventListener('change', function () {
                const raw = String(yearsInput.value || '');
                const v = raw.trim() === '' ? MIN_YEARS : Math.round(Number(raw));
                const safe = isFinite(v) ? v : MIN_YEARS;
                const clamped = clamp(safe, MIN_YEARS, MAX_YEARS);
                yearsRange.value = clamped;
                yearsInput.value = clamped;
                setYearsError(false);
                setRangeFill(yearsRange, clamped);
                updateSummaryUI(true);
            });

            // Tabs
            tabs.forEach(btn => {
                btn.addEventListener('click', function () {
                    setMode(btn.dataset.mode);
                });
            });


            if (resetProjectionBtn) {
                resetProjectionBtn.addEventListener('click', function () {
                    amountRange.value = 5000;
                    amountInput.value = formatINRDigits(5000);
                    rateRange.value = 12;
                    rateInput.value = 12;
                    yearsRange.value = 10;
                    yearsInput.value = 10;
                    setAmountError(false);
                    setRateError(false);
                    setYearsError(false);
                    setRangeFill(amountRange, 5000);
                    setRangeFill(rateRange, 12);
                    setRangeFill(yearsRange, 10);
                    setMode('sip');
                    updateSummaryUI(true);
                });
            }
            // Initial fill + render
            setRangeFill(amountRange, Number(amountRange.value));
            amountInput.value = formatINRDigits(Number(amountRange.value));
            setRangeFill(rateRange, Number(rateRange.value));
            setRangeFill(yearsRange, Number(yearsRange.value));

            // Wait for ApexCharts if needed (donut chart init)
            (function waitForApex() {
                updateSummaryUI(false);
                if (typeof ApexCharts === 'undefined') {
                    setTimeout(waitForApex, 60);
                    return;
                }
                ensureDonutChart();
            })();


            setMode('sip');
        })();
    </script>
    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>
