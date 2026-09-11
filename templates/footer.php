<?php
$siteBase = $siteBase ?? '';
require_once __DIR__ . '/../helpers/urlfetcher.php';
?>
<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-top">
            <section class="footer-company" aria-labelledby="footer-company-title">
                <h2 class="sr-only" id="footer-company-title">Gretex Share Broking Limited</h2>
                <img class="footer-logo" src="<?= e(url('assets/images/Gretex.png')) ?>" alt="Gretex">
                <p class="footer-brand-text">Gretex Share Broking Limited</p>

                <div class="footer-contact">
                    <p class="footer-label">Phone:</p>
                    <a href="tel:02269308500">02269308500&nbsp;/&nbsp;501</a>
                </div>

                <div class="footer-contact">
                    <p class="footer-label">Email Address:</p>
                    <a href="mailto:support@gretexbroking.com">support@gretexbroking.com</a>
                    <p>For Grievances/complaints: <a href="mailto:investor.grievances@gretexbroking.com">investor.grievances@gretexbroking.com</a></p>
                    <a href="mailto:compliance@gretexbroking.com">compliance@gretexbroking.com</a>
                </div>

                <nav class="footer-social" aria-label="Social links">
                    <a href="#"><span aria-hidden="true">F</span><span class="sr-only">Facebook</span></a>
                    <a href="#"><span aria-hidden="true">IG</span><span class="sr-only">Instagram</span></a>
                    <a href="#"><span aria-hidden="true">X</span><span class="sr-only">X</span></a>
                    <a href="#"><span aria-hidden="true">IN</span><span class="sr-only">LinkedIn</span></a>
                </nav>
            </section>

            <nav class="footer-links" aria-labelledby="footer-pages-title">
                <h2 id="footer-pages-title">Company</h2>
                <ul>
                    <li><a href="<?= e(url('#intro-title')) ?>">About us</a></li>
                    <li><a href="<?= e(url('#services-title')) ?>">Our Services</a></li>
                    <li><a href="<?= e(url('downloads/')) ?>">Download</a></li>
                    <li><a href="<?= e(url('contact/')) ?>">Contact us</a></li>
                    <li><a href="<?= e(url('sitemap.xml')) ?>">Sitemap</a></li>
                </ul>
            </nav>

            <nav class="footer-links" aria-labelledby="footer-legal-title">
                <h2 id="footer-legal-title">Legal &amp; Regulatory</h2>
                <ul>
                    <li><a href="<?= e(url('privacy-policy')) ?>">Privacy Policy</a></li>
                    <li><a href="<?= e(url('terms-and-conditions')) ?>">Terms &amp; Conditions</a></li>
                    <li><a href="<?= e(url('downloads/')) ?>">Legal &amp; Regulatory</a></li>
                    <li><a href="<?= e(url('contact/')) ?>">Grievance Redressal Policy</a></li>
                    <li><a href="#footer-fraud-awareness">Fraud Awareness</a></li>
                </ul>
            </nav>

            <nav class="footer-links" aria-labelledby="footer-important-title">
                <h2 id="footer-important-title">Important Links</h2>
                <ul>
                    <li><a href="https://www.sebi.gov.in/" target="_blank" rel="noopener noreferrer">SEBI</a></li>
                    <li><a href="https://www.bseindia.com/" target="_blank" rel="noopener noreferrer">BSE</a></li>
                    <li><a href="https://www.nseindia.com/" target="_blank" rel="noopener noreferrer">NSE</a></li>
                    <li><a href="https://www.mcxindia.com/" target="_blank" rel="noopener noreferrer">MCX</a></li>
                    <li><a href="https://www.msei.in/" target="_blank" rel="noopener noreferrer">MSEI</a></li>
                    <li><a href="https://nsdl.co.in/" target="_blank" rel="noopener noreferrer">NSDL</a></li>
                    <li><a href="https://www.evoting.nsdl.com/" target="_blank" rel="noopener noreferrer">NSDL eVoting</a></li>
                    <li><a href="https://scores.sebi.gov.in/" target="_blank" rel="noopener noreferrer">SCORES</a></li>
                </ul>
            </nav>

            <section class="footer-find" aria-labelledby="footer-find-title">
                <h2 id="footer-find-title">Find Us</h2>

                <address class="footer-location">
                    <svg class="footer-location-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12Z"></path>
                        <circle cx="12" cy="9" r="2.5"></circle>
                    </svg>
                    <span><strong>Registered Office:</strong> Naman Midtown, A wing Unit 401, FP No. 616, Tulsi Pipe Road, Dr. Ambedkar Nagar Senapati Bapat Marg, Behind Kamgar Kala Kendra, Dadar West, Mumbai:400013.</span>
                </address>

                <address class="footer-location">
                    <svg class="footer-location-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12Z"></path>
                        <circle cx="12" cy="9" r="2.5"></circle>
                    </svg>
                    <span><strong>Corporate Office:</strong> Office No. 1220, 12th Floor, B wing, One BKC, Plot No C-66, G Block, Bandra Kurla Complex, Bandra East - Mumbai 400051</span>
                </address>

                <address class="footer-location">
                    <svg class="footer-location-icon" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M12 21s7-6.1 7-12a7 7 0 1 0-14 0c0 5.9 7 12 7 12Z"></path>
                        <circle cx="12" cy="9" r="2.5"></circle>
                    </svg>
                    <span><strong>Kolkata Corporate Office:</strong> 90, Phears Lane, 5th Floor, Kolkata-700012</span>
                </address>

                <p class="footer-regulatory">SEBI Registered Name: Gretex Share Broking Limited</p>
                <p class="footer-regulatory">SEBI Registration No.: INZ000166934 &amp; IN&#8209;DP&#8209;699&#8209;2022</p>
            </section>
        </div>

        <div class="footer-notices">
            <section id="footer-fraud-awareness">
                <h2>Attention Fraudulent investment scheme and Mis-representation alert</h2>
                <p>We have been made aware of scams where unauthorized and unrelated persons purporting to be employees of different trading member (Stock broker) are approaching members of the public via calls, emails, instant messaging, or social media channels to pitch for a fraudulent investment scheme, to obtain personal information, or to provide unauthorized payment confirmation. Gretex Share Broking Ltd (GSBL) would like to remind our clients and members of the public that our emails always come from addresses in the form of &quot;@gretexbroking.com&quot; only. We typically do not conduct business via text or instant messaging (such as WhatsApp) or social media platforms. If you are unable to verify the authenticity of such messages, platforms, or personal identities and confirm their connection with GSBL, please do not provide your personal/corporate data or respond to any fund transfer request. Please do not open hyperlinks, attachments and QR codes from any unfamiliar sources.</p>
                <p>What to do if you have become a victim of fraud? If you suspect you are a victim of fraud, please file a report with your local police or register your complaint online at <a href="https://cybercrime.gov.in/" target="_blank" rel="noopener noreferrer">https://cybercrime.gov.in/</a>. Tips to protect yourself against becoming a victim of fraud: Please read the guide in cybercrime website of the government of India. <a href="https://cybercrime.gov.in/UploadMedia/CyberSafetyEng.pdf" target="_blank" rel="noopener noreferrer">https://cybercrime.gov.in/UploadMedia/CyberSafetyEng.pdf</a> Issued in public interest</p>
            </section>

            <section>
                <h2>Attention Fraudulent investment scheme and Mis-representation alert</h2>
                <p>We have been made aware of scams where unauthorized and unrelated persons purporting to be employees of different trading member (Stock broker) are approaching members of the public via calls, emails, instant messaging, or social media channels to pitch for a fraudulent investment scheme, to obtain personal information, or to provide unauthorized payment confirmation. Gretex Share Broking Ltd (GSBL) would like to remind our clients and members of the public that our emails always come from addresses in the form of &quot;@gretexbroking.com&quot; only. We typically do not conduct business via text or instant messaging (such as WhatsApp) or social media platforms. If you are unable to verify the authenticity of such messages, platforms, or personal identities and confirm their connection with GSBL, please do not provide your personal/corporate data or respond to any fund transfer request. Please do not open hyperlinks, attachments and QR codes from any unfamiliar sources.</p>
                <p>What to do if you have become a victim of fraud? If you suspect you are a victim of fraud, please file a report with your local police or register your complaint online at <a href="https://cybercrime.gov.in/" target="_blank" rel="noopener noreferrer">https://cybercrime.gov.in/</a>. Tips to protect yourself against becoming a victim of fraud: Please read the guide in cybercrime website of the government of India. <a href="https://cybercrime.gov.in/UploadMedia/CyberSafetyEng.pdf" target="_blank" rel="noopener noreferrer">https://cybercrime.gov.in/UploadMedia/CyberSafetyEng.pdf</a> Issued in public interest</p>
            </section>

            <section>
                <h2>Prop Trading</h2>
                <p>Pursuant to the Rules and Byelaws of the BSE Ltd. and the NSE of India Ltd. and the circulars and directions issued by SEBI, we inform that Gretex Share Broking Ltd. is commencing proprietary desk for trading in Index options on the exchanges from 29/07/2010.</p>
            </section>

            <section class="footer-tradingview">
                <h2>TradingView</h2>
                <p>We use TradingView charting platform in our web, mobile and desktop applications. TradingView is a leading charting platform used by investors and traders worldwide to analyze and spot market opportunities.</p>
                <p>Track upcoming events in the <a href="https://www.tradingview.com/economic-calendar/" target="_blank" rel="noopener noreferrer">Economic Calendar</a> or browse stocks in the <a href="https://www.tradingview.com/screener/" target="_blank" rel="noopener noreferrer">Screener</a> to find opportunities.</p>
                <p>Charts powered by <a href="https://www.tradingview.com/" target="_blank" rel="noopener noreferrer">TradingView</a></p>
            </section>
        </div>

        <p class="footer-copyright">&copy; 2023 Gretex Broking | All Rights Reserved.</p>
    </div>
</footer>
