<?php

declare(strict_types=1);

use App\Controllers\AuthController;
use App\Controllers\IndexController;
use App\Controllers\UserController;
use Matrix\Middleware\JwtAuthMiddleware;
use Symfony\Component\HttpFoundation\Response;

$jwtSecret = $_ENV['JWT_SECRET'] ?? 'matrix-secret-key';
$jwt = new JwtAuthMiddleware($jwtSecret);

// 首页
$router->get('/', [IndexController::class, 'index']);

// 模拟登录
$router->post('/login', [AuthController::class, 'login']);

// 受保护的 API
$router->middleware($jwt)
       ->get('/api/users', [UserController::class, 'index']);

// 调试路由
$router->get('/debug', function () {
    dump(['name' => 'Matrix', 'version' => '1.0']);
    return new Response('<p>Dump above, page continues</p>');
});

$router->get('/oops', function () {
    throw new RuntimeException('Ignition is working!');
});
