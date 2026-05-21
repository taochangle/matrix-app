<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

// 加载环境变量
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (str_starts_with(trim($line), '#')) continue;
        if (str_contains($line, '=')) {
            [$key, $value] = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}

/**
 * Matrix 环境变量读取（避免与 Illuminate helpers 冲突）。
 */
function matrix_env(string $key, mixed $default = null): mixed
{
    return $_ENV[$key] ?? $_SERVER[$key] ?? $default;
}

use Matrix\Application;
use Symfony\Component\HttpFoundation\Request;

// 数据库配置
$dbConfig = require __DIR__ . '/../config/database.php';

// 初始化应用（Ignition + Eloquent + DebugBar）
$app = new Application([
    'database' => $dbConfig,
    'debug'    => true,
]);

// 注入 JWT 配置
$app->getContainer()->set('jwtSecret', matrix_env('JWT_SECRET', 'matrix-secret-key'));
$app->getContainer()->set('jwtAlgorithm', 'HS256');

// 加载路由
$app->loadRoutes(__DIR__ . '/../routes/web.php');

// 处理请求
$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
