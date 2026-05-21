<?php

declare(strict_types=1);

// DebugBar 静态资源 — 从 vendor 目录直接返回
if (str_starts_with($_SERVER['REQUEST_URI'], '/_debugbar/assets/')) {
    $path = substr($_SERVER['REQUEST_URI'], strlen('/_debugbar/assets/'));
    $path = parse_url($path, PHP_URL_PATH);
    $file = __DIR__ . '/../vendor/maximebf/debugbar/src/DebugBar/Resources/' . $path;

    if (is_file($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $types = [
            'css' => 'text/css', 'js' => 'application/javascript',
        ];
        header('Content-Type: ' . ($types[$ext] ?? 'application/octet-stream'));
        readfile($file);
        return;
    }
}

// 其余请求走框架
require __DIR__ . '/index.php';
