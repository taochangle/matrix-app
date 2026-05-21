<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\UserController;
use DebugBar\StandardDebugBar;
use Matrix\Middleware\JwtAuthMiddleware;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$jwtSecret = $_ENV['JWT_SECRET'] ?? 'matrix-secret-key';
$jwt = new JwtAuthMiddleware($jwtSecret);

// 首页 — 普通 HTML 页面，DebugBar 直接渲染在底部
$router->get('/', function () use ($app) {
    return new Response('<!DOCTYPE html>
<html lang="zh">
<head><meta charset="UTF-8"><title>Matrix Framework</title></head>
<body>
    <h1>Welcome to Matrix Framework</h1>
</body>
</html>');
});

// DebugBar 静态资源代理
$router->get('/_debugbar/assets/{path:.+}', function (Request $request) {
    $path = $request->attributes->get('path');
    $file = __DIR__ . '/../vendor/maximebf/debugbar/src/DebugBar/Resources/' . $path;

    if (!is_file($file)) {
        return new Response('Not Found', 404);
    }

    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $types = [
        'css' => 'text/css', 'js' => 'application/javascript',
        'woff' => 'font/woff', 'woff2' => 'font/woff2',
        'ttf' => 'font/ttf', 'svg' => 'image/svg+xml',
        'png' => 'image/png', 'gif' => 'image/gif',
    ];

    return new Response(file_get_contents($file), 200, [
        'Content-Type' => $types[$ext] ?? 'application/octet-stream',
    ]);
});

// 模拟登录
$router->post('/login', [AuthController::class, 'login']);

// 受保护的 API — JSON 响应，DebugBar 数据通过 Header 传递
$router->middleware($jwt)
       ->get('/api/users', [UserController::class, 'index']);

// 调试路由
$router->get('/debug', function () {
    $data = ['name' => 'Matrix', 'version' => '1.0'];
    dump($data);  // 输出变量但不终止
    return new Response('<p>Dump above, page continues</p>');
});

$router->get('/oops', function () {
    throw new RuntimeException('Ignition is working!');
});
