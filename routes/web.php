<?php

declare(strict_types=1);

use Matrix\Http\Request;
use Matrix\Http\Response;
use App\Controllers\UserController;

// 首页 - 欢迎信息
$router->get('/', function (Request $request): Response {
    $response = new Response();
    $response->setHeader('Content-Type', 'text/html; charset=utf-8');
    $response->setContent('<h1>Welcome to Matrix Framework!</h1>');
    return $response;
});

// 用户 API 路由
$router->get('/api/user', [UserController::class, 'index']);

// 带参数的用户路由
$router->get('/api/user/{id}', [UserController::class, 'show']);
