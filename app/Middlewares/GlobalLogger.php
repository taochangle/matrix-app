<?php

declare(strict_types=1);

namespace App\Middlewares;

use Closure;
use Matrix\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalLogger
{
    public function __invoke(Request $request, Closure $next): Response
    {
        $method = $request->getMethod();
        $path   = $request->getPathInfo();
        $start  = microtime(true);

        error_log(sprintf('[%s] --> %s %s', Application::NAME, $method, $path));

        /** @var Response $response */
        $response = $next($request);

        $elapsed = round((microtime(true) - $start) * 1000, 2);
        $response->headers->set('X-Request-Time', sprintf('%sms', $elapsed));
        $response->headers->set('X-Powered-By', Application::NAME . ' v' . Application::VERSION);

        error_log(sprintf('[%s] <-- %s %s %d %sms', Application::NAME, $method, $path, $response->getStatusCode(), $elapsed));

        return $response;
    }
}
