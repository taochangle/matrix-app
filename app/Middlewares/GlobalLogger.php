<?php

declare(strict_types=1);

namespace App\Middlewares;

use Closure;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GlobalLogger
{
    public function __invoke(Request $request, Closure $next): Response
    {
        $method = $request->getMethod();
        $path   = $request->getPathInfo();
        $start  = microtime(true);

        error_log(sprintf('[Matrix] --> %s %s', $method, $path));

        /** @var Response $response */
        $response = $next($request);

        $elapsed = round((microtime(true) - $start) * 1000, 2);
        $response->headers->set('X-Request-Time', sprintf('%sms', $elapsed));
        $response->headers->set('X-Powered-By', 'Matrix Framework');

        error_log(sprintf('[Matrix] <-- %s %s %d %sms', $method, $path, $response->getStatusCode(), $elapsed));

        return $response;
    }
}
