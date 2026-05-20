<?php

declare(strict_types=1);

namespace App\Middlewares;

use Closure;
use Matrix\Http\Request;
use Matrix\Http\Response;

class GlobalLogger
{
    /**
     * 洋葱模型中间件：记录请求日志并修改响应。
     */
    public function __invoke(Request $request, Closure $next): Response
    {
        $method = $request->getMethod();
        $path   = $request->getPath();
        $start  = microtime(true);

        // 请求前 —— 记录请求日志
        error_log(sprintf('[Matrix] --> %s %s', $method, $path));

        // 调用下一层
        /** @var Response $response */
        $response = $next($request);

        // 请求后 —— 追加处理耗时头
        $elapsed = round((microtime(true) - $start) * 1000, 2);
        $response->setHeader('X-Request-Time', sprintf('%sms', $elapsed));
        $response->setHeader('X-Powered-By', 'Matrix Framework');

        error_log(sprintf('[Matrix] <-- %s %s %d %sms', $method, $path, $response->getStatusCode(), $elapsed));

        return $response;
    }
}
