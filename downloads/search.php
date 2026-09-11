<?php
declare(strict_types=1);

require_once __DIR__ . '/../helpers/urlfetcher.php';

header('Content-Type: application/json; charset=utf-8');

$query = trim((string)($_GET['q'] ?? ''));
$documentsRoot = realpath(__DIR__ . '/../assets/documents');

if ($documentsRoot === false) {
    http_response_code(500);
    echo json_encode(['results' => [], 'error' => 'Document directory not found']);
    exit;
}

$categoryLabels = [
    'account-opening-forms' => 'Account Opening Form',
    'other-forms' => 'Other Form',
    'information-for-customers' => 'Information for Customers',
];

$titleOverrides = [
    'client-request-for-mtf.pdf' => 'Client Request for MTF',
    'individual-kyc-15.10.2024_compressed.pdf' => 'GSBL KYC Form - Individual',
    'individual-kra-form.pdf' => 'Individual KRA Form',
    'non-individual-kra-form.pdf' => 'Non Individual KRA Form',
    'declaration-for-common-email-id-&-mobile-number.pdf' => 'Declaration for Common Email Id & Mobile Number',
    'dp-tariff-sheet-15.10.2024.pdf' => 'DP Tariff Sheet',
    'running-account-authorisation-form.pdf' => 'Running-Account-Authorisation-Form',
    'segment-activation.pdf' => 'Segment Activation',
    'signature-verification-by-the-banker.pdf' => 'Signature Verification by the Banker',
    'modification-form.pdf' => 'Modification Form',
    'name-correction-form.pdf' => 'Name Correction Form',
    'account-closer-form.pdf' => 'Account Closer Form',
    'policies-and-procedures-for-client-dealings.pdf' => 'Policies and Procedures for Client Dealings',
    'most-important-terms-&-conditions-mitc.pdf' => 'Most Important Terms & Conditions (MITC)',
    'internet-&-wireless-technology.pdf' => 'Internet & Wireless Technology',
    "guidance-note-do's-and-don'ts.pdf" => "Guidance Note Do's and Don'ts",
    'risk-disclosure-document-for-capital-market-and-derivatives-segments.pdf' => 'Risk Disclosure Document for Capital Market and Derivatives Segments',
    'rights-and-obligations-trading.pdf' => 'Rights and Obligations - Trading',
    'rights-and-obligations-dp.pdf' => 'Rights and Obligations - DP',
    'rights-&-obligation-of-stock-brokers-&-clients-for-mtf-on-letter-head.pdf' => 'Rights & Obligation of Stock Brokers & Clients for MTF on Letter Head',
    'procedure-for-validating-kra-status.pdf' => 'Procedure for Validating KRA Status',
];

function formatTitle(string $filename, array $overrides): string
{
    if (isset($overrides[$filename])) {
        return $overrides[$filename];
    }

    $name = preg_replace('/\.pdf$/i', '', $filename);
    $name = str_replace(['-', '_'], ' ', (string)$name);
    $name = preg_replace('/\s+/', ' ', $name);

    return ucwords(trim((string)$name));
}

function formatSize(int $bytes): string
{
    $mb = $bytes / 1048576;

    return $mb < 0.1 ? '0.1 MB PDF' : number_format($mb, 1) . ' MB PDF';
}

function publicUrl(string $absolutePath, string $documentsRoot): string
{
    $relative = ltrim(str_replace('\\', '/', substr($absolutePath, strlen($documentsRoot))), '/');

    return assetUrl('assets/documents/' . $relative);
}

$results = [];
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($documentsRoot, FilesystemIterator::SKIP_DOTS)
);

foreach ($iterator as $file) {
    if (!$file instanceof SplFileInfo || !$file->isFile() || strtolower($file->getExtension()) !== 'pdf') {
        continue;
    }

    $filename = $file->getFilename();
    $categoryKey = basename(dirname($file->getPathname()));
    $category = $categoryLabels[$categoryKey] ?? 'Document';
    $title = formatTitle($filename, $titleOverrides);
    $haystack = strtolower($title . ' ' . $filename . ' ' . $category . ' ' . $categoryKey);

    if ($query !== '' && strpos($haystack, strtolower($query)) === false) {
        continue;
    }

    $results[] = [
        'title' => $title,
        'category' => $category,
        'reference' => strtoupper(str_replace('-', ' ', $categoryKey)),
        'date' => date('M d, Y', $file->getMTime()),
        'size' => formatSize($file->getSize()),
        'url' => publicUrl($file->getPathname(), $documentsRoot),
    ];
}

usort($results, static function (array $a, array $b): int {
    return strcasecmp($a['title'], $b['title']);
});

echo json_encode(['results' => array_values($results)], JSON_UNESCAPED_SLASHES);
