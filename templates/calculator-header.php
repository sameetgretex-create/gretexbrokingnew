<?php
$siteBase = '../';
require_once __DIR__ . '/../helpers/urlfetcher.php';

$pageTitle = $pageTitle ?? 'Calculator | Gretex Share Broking Limited';
$additionalCSS = $additionalCSS ?? [];
$additionalScripts = $additionalScripts ?? [];

if (!function_exists('calculator_asset_url')) {
    function calculator_asset_url($assetPath) {
        $assetPath = trim((string) $assetPath);

        if ($assetPath === '') {
            return '';
        }

        if (preg_match('#^(?:https?:)?//#i', $assetPath)) {
            return $assetPath;
        }

        $assetPath = str_replace('\\', '/', $assetPath);

        while (strpos($assetPath, '../') === 0) {
            $assetPath = substr($assetPath, 3);
        }

        return url($assetPath);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <link rel="stylesheet" href="<?= e(url('css/global.css')) ?>">
    <link rel="stylesheet" href="<?= e(url('css/navbar.css')) ?>">
    <?php foreach ($additionalCSS as $stylesheet): ?>
        <?php $stylesheetUrl = calculator_asset_url($stylesheet); ?>
        <?php if ($stylesheetUrl !== ''): ?>
            <link rel="stylesheet" href="<?= e($stylesheetUrl) ?>">
        <?php endif; ?>
    <?php endforeach; ?>
    <link rel="stylesheet" href="<?= e(url('css/footer.css')) ?>">
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <?php foreach ($additionalScripts as $script): ?>
        <?php $scriptUrl = calculator_asset_url($script); ?>
        <?php if ($scriptUrl !== ''): ?>
            <script src="<?= e($scriptUrl) ?>"></script>
        <?php endif; ?>
    <?php endforeach; ?>
</head>

<body class="calculator-shell-page">
    <?php include __DIR__ . '/navbar.php'; ?>
    <?php ob_start(); ?>
