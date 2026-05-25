<?php

declare(strict_types=1);

// DebugBar 静态资源直接返回
if (str_starts_with($_SERVER['REQUEST_URI'], '/_debugbar/assets/')) {
    $path = parse_url(substr($_SERVER['REQUEST_URI'], 20), PHP_URL_PATH);
    $base = __DIR__ . '/../vendor/php-debugbar/php-debugbar/resources/';
    $file = $base . $path;

    // v2 兼容
    if (!is_file($file)) {
        $file = __DIR__ . '/../vendor/maximebf/debugbar/src/DebugBar/Resources/' . $path;
    }

    if (is_file($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $types = ['css' => 'text/css', 'js' => 'application/javascript'];
        header('Content-Type: ' . ($types[$ext] ?? 'application/octet-stream'));
        readfile($file);
        return;
    }
}

require __DIR__ . '/index.php';
