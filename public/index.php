<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Matrix\Application;
use Symfony\Component\HttpFoundation\Request;

$app = new Application([
    'base_path'   => dirname(__DIR__),
    'database'    => require __DIR__ . '/../config/database.php',
    'debug'       => true,
    'log_path'    => dirname(__DIR__) . '/storage/logs/matrix.log',
    'views_path'  => dirname(__DIR__) . '/views',
]);

require __DIR__ . '/../config/bootstrap.php';

$app->loadRoutes(__DIR__ . '/../routes/web.php');

$request = Request::createFromGlobals();
$response = $app->handle($request);
$response->send();
