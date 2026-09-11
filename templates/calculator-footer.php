<?php
$siteBase = '../';
$pageContent = ob_get_clean();
$pageScripts = [];

if (preg_match_all('#<script\b[^>]*>.*?</script>#is', $pageContent, $matches)) {
    $pageScripts = $matches[0];
    $pageContent = preg_replace('#<script\b[^>]*>.*?</script>#is', '', $pageContent);
}

echo $pageContent;
include __DIR__ . '/footer.php';

foreach ($pageScripts as $script) {
    echo $script, "\n";
}
?>
    <script src="<?= e(url('js/gretex-financial.js')) ?>"></script>
    <script src="<?= e(url('js/calculator-functions.js')) ?>"></script>
    <script>
        if (typeof lucide !== 'undefined') {
            lucide.createIcons();
        }
    </script>
</body>

</html>
