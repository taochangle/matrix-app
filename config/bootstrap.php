<?php

declare(strict_types=1);

// 加载环境变量
$envFile = dirname(__DIR__) . '/.env';
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

// 框架 vendor autoload（本地开发时加载框架自身的依赖）
$frameworkAutoload = dirname(__DIR__, 2) . '/matrix-framework/vendor/autoload.php';
if (file_exists($frameworkAutoload)) {
    require_once $frameworkAutoload;
}

// 全局中间件
$app->addGlobalMiddleware([
    new App\Middlewares\GlobalLogger(),
]);

// JWT 配置
$app->getContainer()->set('jwtSecret', $_ENV['JWT_SECRET'] ?? 'matrix-secret-key');
$app->getContainer()->set('jwtAlgorithm', 'HS256');

return $app;
