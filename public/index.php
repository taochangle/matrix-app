<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Matrix\Application;
use Matrix\Http\Request;

$app = new Application();

// 注册全局中间件
$app->addGlobalMiddleware([
    new App\Middlewares\GlobalLogger(),
]);

// 加载路由
$app->loadRoutes(__DIR__ . '/../routes/web.php');

// 创建请求并处理
$request = new Request();
$app->handle($request);
