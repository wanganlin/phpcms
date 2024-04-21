<?php

declare(strict_types=1);

namespace App\Bundles\System\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Privilege
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Authorization

        return $next($request);
    }
}
