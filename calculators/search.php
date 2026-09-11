<?php
$calculators = require __DIR__ . '/data.php';
$query = strtolower(trim((string) ($_GET['q'] ?? '')));
$category = strtolower(trim((string) ($_GET['category'] ?? 'all')));

$matches = array_values(array_filter($calculators, static function ($calculator) use ($query, $category) {
    if ($category !== 'all' && ($calculator['category'] ?? '') !== $category) {
        return false;
    }

    if ($query !== '') {
        $searchText = strtolower($calculator['title'] . ' ' . $calculator['description'] . ' ' . ($calculator['category'] ?? ''));

        return strpos($searchText, $query) !== false;
    }

    return true;
}));

header('Content-Type: application/json; charset=utf-8');
echo json_encode([
    'query' => $query,
    'category' => $category,
    'count' => count($matches),
    'results' => array_map(static function ($calculator) {
        return [
            'title' => $calculator['title'],
            'category' => $calculator['category'],
            'href' => $calculator['href'],
        ];
    }, $matches),
], JSON_UNESCAPED_SLASHES);
