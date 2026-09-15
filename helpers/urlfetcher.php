<?php

if (!function_exists('e')) {
    function e($value)
    {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
}

function getAllowedBaseHosts()
{
    return [
        'localhost',
        '127.0.0.1',
        'gretexbroking.com',
        'www.gretexbroking.com',
        'staging.gretexbroking.com',
        'yellow-hawk-490806.hostingersite.com'
    ];
}

function getValidatedHostData()
{
    $rawHost = (string) ($_SERVER['HTTP_HOST'] ?? 'localhost');
    $hostParts = explode(':', $rawHost, 2);

    $hostname = strtolower(trim($hostParts[0]));
    $port = $hostParts[1] ?? '';

    if ($hostname === '' || filter_var($hostname, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) === false) {
        $hostname = 'localhost';
        $port = '';
    }

    if (!in_array($hostname, getAllowedBaseHosts(), true)) {
        return [
            'hostname' => 'www.gretexbroking.com',
            'port' => '',
            'is_local' => false,
        ];
    }

    if ($port !== '' && !ctype_digit($port)) {
        $port = '';
    }

    return [
        'hostname' => $hostname,
        'port' => $port,
        'is_local' => ($hostname === 'localhost' || $hostname === '127.0.0.1'),
    ];
}

function getProjectBasePath()
{
    $configuredBasePath = trim((string) getenv('SITE_BASE_PATH'));

    if ($configuredBasePath !== '') {
        $configuredBasePath = '/' . trim(str_replace('\\', '/', $configuredBasePath), '/') . '/';
        return preg_replace('#/+#', '/', $configuredBasePath);
    }

    $scriptDir = dirname((string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    $parts = explode('/', trim($scriptDir, '/'));
    $projectFolder = basename(dirname(__DIR__));

    if (!empty($parts[0]) && $parts[0] === $projectFolder) {
        return '/' . $parts[0] . '/';
    }

    return '/';
}

function getBaseUrl()
{
    $isHttps = (
        (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
        ((string) ($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') ||
        (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443)
    );

    $protocol = $isHttps ? 'https://' : 'http://';
    $hostData = getValidatedHostData();
    $hostForUrl = $hostData['hostname'];

    if ($hostData['is_local'] && $hostData['port'] !== '') {
        $hostForUrl .= ':' . $hostData['port'];
    }

    return $protocol . $hostForUrl . getProjectBasePath();
}

function normalizeRelativePath($path)
{
    $path = trim((string) $path);

    if ($path === '') {
        return '';
    }

    $path = str_replace('\\', '/', $path);
    $path = preg_replace('#/+#', '/', $path);
    $path = ltrim($path, '/');

    if ($path === '' || preg_match('#(^|/)\.\.?(?:/|$)#', $path)) {
        return '';
    }

    return $path;
}

function url($path = '')
{
    $normalizedPath = normalizeRelativePath($path);
    $prefix = getDocumentRelativeRootPrefix();

    if ($normalizedPath === '') {
        return $prefix === '' ? './' : $prefix;
    }

    return $prefix . $normalizedPath;
}

function assetUrl($path)
{
    $normalizedPath = normalizeRelativePath($path);

    if ($normalizedPath === '') {
        return url();
    }

    $absolutePath = dirname(__DIR__) . '/' . $normalizedPath;
    $version = is_file($absolutePath) ? ('?v=' . filemtime($absolutePath)) : '';

    return url($normalizedPath) . $version;
}

function getDocumentRelativeRootPrefix()
{
    $scriptPath = str_replace('\\', '/', (string) ($_SERVER['SCRIPT_NAME'] ?? ''));
    $scriptDirectory = trim(dirname($scriptPath), '/');

    if ($scriptDirectory === '' || $scriptDirectory === '.') {
        return '';
    }

    $knownRootDirectories = [
        'about',
        'blogs',
        'calculators',
        'contact',
        'downloads',
        'investor-relations',
        'services',
    ];

    $parts = explode('/', $scriptDirectory);
    $lastDirectory = end($parts);

    if (in_array($lastDirectory, $knownRootDirectories, true)) {
        return '../';
    }

    return '';
}
