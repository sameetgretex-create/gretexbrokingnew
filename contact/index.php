<?php
require_once __DIR__ . '/../backend/bootstrap.php';
require_once __DIR__ . '/../helpers/urlfetcher.php';

$formIssuedAt = time();
$captchaSiteKey = \Gretex\Backend\Config\Config::string('GOOGLE_RECAPTCHA_SITE_KEY', \Gretex\Backend\Config\Config::string('CAPTCHA_KEY'));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Gretex Share Broking Limited</title>
    <link rel="stylesheet" href="<?= e(assetUrl('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/navbar.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/contact.css')) ?>">
    <link rel="stylesheet" href="<?= e(assetUrl('css/footer.css')) ?>">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="contact-page">
    <?php
    $siteBase = '../';
    include __DIR__ . '/../templates/navbar.php';
    ?>

    <main id="main-content" class="contact-main">
        <section class="contact-section" aria-labelledby="contact-title">
            <div class="contact-hero">
                <p class="contact-breadcrumb">
                    <span>Home</span>
                    <span>&rsaquo;</span>
                    <strong>Contact</strong>
                </p>
                <h1 id="contact-title">Customer Support - Queries &amp; Assistance</h1>
                <p>Connect with us for account support, service requests, grievances, and office location details.</p>
                <div class="contact-hero-actions">
                    <a class="contact-hero-phone" href="tel:02269308500">(022)&nbsp;69308500&nbsp;/501</a>
                    <a class="contact-hero-email" href="mailto:support@gretexbroking.com">support@gretexbroking.com</a>
                </div>
            </div>

            <div class="contact-support-panel">
                <div class="contact-details-card">
                    <h2>Basic Details</h2>
                    <p class="contact-details-note">For account support, service queries, and grievance assistance.</p>

                    <ul class="contact-details-list">
                        <li>
                            <span class="contact-details-icon" aria-hidden="true">T</span>
                            <div>
                                <h3>Phone</h3>
                                <a href="tel:02269308500">(022)&nbsp;69308500&nbsp;/501</a>
                            </div>
                        </li>
                        <li>
                            <span class="contact-details-icon" aria-hidden="true">H</span>
                            <div>
                                <h3>Open</h3>
                                <p>10:00 AM to 06:00 PM, Monday to Friday</p>
                            </div>
                        </li>
                        <li>
                            <span class="contact-details-icon" aria-hidden="true">E</span>
                            <div>
                                <h3>Email</h3>
                                <a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a>
                                <a
                                    href="mailto:investor.grievances@gretexbroking.com">investor.grievances@gretexbroking.com</a>
                            </div>
                        </li>
                        <li>
                            <span class="contact-details-icon" aria-hidden="true">A</span>
                            <div>
                                <h3>Office</h3>
                                <address>
                                    Naman Midtown, A wing Unit 401, FP No. 616 Tulsi Pipe Road, Dr. Ambedkar Nagar,
                                    Senapati Bapat Marg, behind Kamgar Kala Kendra, Prabhadevi, Mumbai, Maharashtra
                                    400013.
                                </address>
                            </div>
                        </li>
                    </ul>

                    <button class="contact-authorized-link" type="button" data-authorized-open>
                        Authorized person details <span aria-hidden="true">-&gt;</span>
                    </button>
                </div>

                <form class="contact-form" id="contact-form" action="../backend/public/contact-submit.php" method="post"
                    data-contact-form novalidate>
                    <div class="contact-form-intro">
                        <h2>Get in Touch</h2>
                        <p>Share your query and our team will connect with you.</p>
                    </div>
                    <div class="contact-form-status" data-form-status role="status" aria-live="polite" hidden></div>
                    <div class="contact-form-errors" data-form-errors role="alert" tabindex="-1" hidden></div>
                    <input type="hidden" name="csrf_token"
                        value="<?= htmlspecialchars(\Gretex\Backend\Security\Token::csrf(), ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="form_issued_at" value="<?= $formIssuedAt ?>">
                    <input type="hidden" name="form_token"
                        value="<?= htmlspecialchars(\Gretex\Backend\Security\Token::formToken($formIssuedAt), ENT_QUOTES, 'UTF-8') ?>">
                    <label class="contact-honeypot" aria-hidden="true">
                        <span>Website</span>
                        <input name="website" type="text" tabindex="-1" autocomplete="off">
                    </label>
                    <div class="contact-form-grid">
                        <label>
                            <span>Full Name</span>
                            <input name="name" type="text" autocomplete="name" placeholder="Enter your full name"
                                required data-field="name" aria-describedby="contact-error-name">
                            <span class="contact-field-error" id="contact-error-name" data-field-error="name"></span>
                        </label>

                        <label>
                            <span>Phone Number</span>
                            <input name="phone" type="tel" inputmode="numeric" autocomplete="tel"
                                placeholder="Enter your phone number" required data-field="phone"
                                aria-describedby="contact-error-phone">
                            <span class="contact-field-error" id="contact-error-phone" data-field-error="phone"></span>
                        </label>
                    </div>

                    <label>
                        <span>Email Address</span>
                        <input name="email" type="email" autocomplete="email" placeholder="Enter your email address"
                            required data-field="email" aria-describedby="contact-error-email">
                        <span class="contact-field-error" id="contact-error-email" data-field-error="email"></span>
                    </label>

                    <label>
                        <span>Your Question</span>
                        <textarea name="message" rows="6" placeholder="Enter your query here..." required
                            data-field="message" aria-describedby="contact-error-message"></textarea>
                        <span class="contact-field-error" id="contact-error-message" data-field-error="message"></span>
                    </label>

                    <?php if ($captchaSiteKey !== ''): ?>
                        <div class="contact-captcha g-recaptcha"
                            data-sitekey="<?= htmlspecialchars($captchaSiteKey, ENT_QUOTES, 'UTF-8') ?>"></div>
                    <?php endif; ?>
                    <button type="submit">Send Your Question</button>
                </form>
            </div>

            <dialog class="contact-authorized-modal" data-authorized-dialog aria-labelledby="authorized-person-title">
                <div class="contact-authorized-modal-panel">
                    <div class="contact-authorized-modal-header">
                        <h2 id="authorized-person-title">Authorized Person Details</h2>
                        <button type="button" class="contact-authorized-close" data-authorized-close aria-label="Close authorized person details">&times;</button>
                    </div>

                    <div class="contact-authorized-table-wrap">
                        <table class="contact-authorized-table">
                            <caption>Authorized person registration and contact details</caption>
                            <thead>
                                <tr>
                                    <th scope="col">A.P Name</th>
                                    <th scope="col">Registered in</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact name</th>
                                    <th scope="col">Contact no</th>
                                    <th scope="col">Contact email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Citizen Teamworks Private Limited</td>
                                    <td>BSE &amp; NSE</td>
                                    <td>Office No.F-19, 1st Floor, Shah Arcade (S.R.A) CHSL, Rani Sati Marg, Malad (East), Mumbai - 400 097</td>
                                    <td>Mr. Vivek Vishnu Bait</td>
                                    <td><a href="tel:9702646326">97026&nbsp;46326</a></td>
                                    <td><a href="mailto:citizenteamworks23@gmail.com">citizenteamworks23@gmail.com</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </dialog>

            <section class="contact-escalation" aria-labelledby="contact-escalation-title">
                <div>
                    <span class="contact-escalation-label">Escalation Matrix</span>
                    <h2 id="contact-escalation-title">Need to escalate a grievance?</h2>
                    <p>View the escalation matrix for grievance redressal contacts, levels of escalation, and the
                        appropriate channels for investor support.</p>
                </div>

                <div class="contact-escalation-grid">
                    <article class="contact-escalation-card">
                        <h3>Level 1: Customer care &amp; Billing</h3>
                        <ul>
                            <li><span class="contact-escalation-icon" aria-hidden="true">P</span>Mr. Murlee Choudhary
                            </li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">A</span>A-401, Floor 4th, Plot
                                FP-616, Naman Midtown, Senapati Bapat Marg, Dadar (W), Mumbai - 400013</li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">T</span><a
                                    href="tel:02269308518">022&#8209;69308518</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">E</span><a
                                    href="mailto:support@gretexbroking.com">support@gretexbroking.com</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">H</span>10:00 AM to 06:00 PM,
                                Monday to Friday</li>
                        </ul>
                    </article>

                    <article class="contact-escalation-card">
                        <h3>Level 2: DP</h3>
                        <ul>
                            <li><span class="contact-escalation-icon" aria-hidden="true">P</span>Mr. Balasaheb G Patil
                            </li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">A</span>A-401, Floor 4th, Plot
                                FP-616, Naman Midtown, Senapati Bapat Marg, Dadar (W), Mumbai - 400013</li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">T</span><a
                                    href="tel:02269308516">022&#8209;69308516</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">E</span><a
                                    href="mailto:dp@gretexbroking.com">dp@gretexbroking.com</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">H</span>10:00 AM to 06:00 PM,
                                Monday to Friday</li>
                        </ul>
                    </article>

                    <article class="contact-escalation-card">
                        <h3>Level 3: RMS / Dealing</h3>
                        <ul>
                            <li><span class="contact-escalation-icon" aria-hidden="true">P</span>Mr. Jignesh Lathigara
                            </li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">A</span>A-401, Floor 4th, Plot
                                FP-616, Naman Midtown, Senapati Bapat Marg, Dadar (W), Mumbai - 400013</li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">T</span><a
                                    href="tel:02269308502">022&#8209;69308502/03</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">E</span><a
                                    href="mailto:rms@gretexbroking.com">rms@gretexbroking.com</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">H</span>10:00 AM to 06:00 PM,
                                Monday to Friday</li>
                        </ul>
                    </article>

                    <article class="contact-escalation-card">
                        <h3>Level 4: Compliance Officer</h3>
                        <ul>
                            <li><span class="contact-escalation-icon" aria-hidden="true">P</span>Mr. Premkumar
                                HariKrishnan</li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">A</span>A-401, Floor 4th, Plot
                                FP-616, Naman Midtown, Senapati Bapat Marg, Dadar (W), Mumbai - 400013</li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">T</span><a
                                    href="tel:02269308513">022&#8209;69308513</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">E</span><a
                                    href="mailto:compliance@gretexbroking.com">compliance@gretexbroking.com</a></li>
                            <li><span class="contact-escalation-icon" aria-hidden="true">H</span>10:00 AM to 06:00 PM,
                                Monday to Friday</li>
                        </ul>
                    </article>
                </div>

                <div class="contact-escalation-note">
                    <p><strong>Note:</strong> Monday to Friday Timing 10:00 AM to 06:00 PM.</p>
                    <p>In absence of response/complaint not addressed to your satisfaction, you may lodge a complaint
                        with SEBI at <a href="https://scores.gov.in/scores/Welcome.html" target="_blank"
                            rel="noopener">https://scores.gov.in/scores/Welcome.html</a> or Exchange at
                        <a href="https://investorhelpline.nseindia.com/NICEPLUS/" target="_blank"
                            rel="noopener">https://investorhelpline.nseindia.com/NICEPLUS/</a>.
                    </p>
                    <p>Please quote your Service Ticket/Complaint Ref No. while raising your complaint at SEBI
                        SCORES/Exchange portal.</p>
                </div>
            </section>

            <section class="contact-kmp" aria-labelledby="contact-kmp-title">
                <h2 id="contact-kmp-title">Key Managerial Personnel</h2>

                <div class="contact-kmp-table-wrap">
                    <table class="contact-kmp-table">
                        <thead>
                            <tr>
                                <th scope="col">Sn No.</th>
                                <th scope="col">Name of the Individual</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Landline Number</th>
                                <th scope="col">Email ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Mr. Shripal Shah</td>
                                <td>Managing Director &amp; CEO</td>
                                <td><a href="tel:+912242858301">+91&#8209;22&#8209;42858301</a></td>
                                <td><a href="mailto:ceo@kotakneo.com">ceo@kotakneo.com</a></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Mr. Sandeep Chordia</td>
                                <td>Chief Operating Officer</td>
                                <td><a href="tel:+912262664001">+91&#8209;22&#8209;62664001</a></td>
                                <td><a href="mailto:coo@kotakneo.com">coo@kotakneo.com</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Mr. Pratik Gupta</td>
                                <td>Whole-time Director</td>
                                <td><a href="tel:+912262664005">+91&#8209;22&#8209;62664005</a></td>
                                <td><a href="mailto:wtd.kie@kotak.com">wtd.kie@kotak.com</a></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Mr. Sanjeev Prasad</td>
                                <td>Co-Head KIE</td>
                                <td><a href="tel:+912262664006">+91&#8209;22&#8209;62664006</a></td>
                                <td><a href="mailto:kmp.kie@kotak.com">kmp.kie@kotak.com</a></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Mr. Girish Dixit</td>
                                <td>Chief Information Security Officer</td>
                                <td><a href="tel:+912262664004">+91&#8209;22&#8209;62664004</a></td>
                                <td><a href="mailto:ciso@kotakneo.com">ciso@kotakneo.com</a></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Mr. Nishit Sheth</td>
                                <td>Company Secretary</td>
                                <td><a href="tel:+912242858290">+91&#8209;22&#8209;42858290</a></td>
                                <td><a href="mailto:ksl.cs@kotak.com">ksl.cs@kotak.com</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="contact-kmp-note">Note: Above contacts will be available from 9 a.m. to 6 p.m. on all trading
                    days.</p>
            </section>

            <section class="contact-locations" aria-labelledby="contact-locations-title">
                <h2 id="contact-locations-title">Locations</h2>

                <div class="contact-location-grid">
                    <article class="contact-location-card">
                        <img class="contact-location-media"
                            src="https://images.unsplash.com/photo-1595658658481-d53d3f999875?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                            alt="Mumbai business district near the registered office">
                        <p>Gretex Share Broking - Mumbai</p>
                        <h3>Registered Office</h3>
                        <address>Naman Midtown, A wing Unit 401, FP No. 616, Tulsi Pipe Road, Dr. Ambedkar Nagar
                            Senapati Bapat Marg, behind Kamgar Kala Kendra, Dadar West, Mumbai:400013.</address>
                        <span>Dadar West</span>
                    </article>

                    <article class="contact-location-card">
                        <img class="contact-location-media"
                            src="https://images.unsplash.com/photo-1567157577867-05ccb1388e66?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                            alt="Mumbai heritage business street near the corporate office">
                        <p>Gretex Share Broking - Mumbai</p>
                        <h3>Corporate Office</h3>
                        <address>Office No. 1220, 12th Floor, B wing, One BKC, Plot No C-66, G Block, Bandra Kurla
                            Complex, Bandra East - Mumbai 400051</address>
                        <span>One BKC</span>
                    </article>

                    <article class="contact-location-card">
                        <img class="contact-location-media"
                            src="https://images.unsplash.com/photo-1558431382-27e303142255?auto=format&amp;fit=crop&amp;w=1200&amp;q=80"
                            alt="Kolkata city business district near the corporate office">
                        <p>Gretex Share Broking - Kolkata</p>
                        <h3>Kolkata Corporate Office</h3>
                        <address>90, Phears Lane, 5th Floor, Kolkata-700012</address>
                        <span>Phears Lane</span>
                    </article>
                </div>
            </section>
        </section>
    </main>

    <?php include __DIR__ . '/../templates/footer.php'; ?>
    <script src="<?= e(assetUrl('js/contact-form.js')) ?>"></script>
</body>

</html>
