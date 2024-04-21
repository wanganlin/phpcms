<?php

declare(strict_types=1);

namespace App\Bundles\System\Middleware;

use App\Constants\GlobalConst;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Authenticate
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! session('?'.GlobalConst::AuthName)) {
            if ($request->ajax()) {
                return response()->json([
                    'code' => 40001,
                    'message' => 'Unauthorized',
                    'data' => null,
                ]);
            } else {
                $callback = urlencode($request->url(true));

                return redirect('/passport/login?callback='.$callback);
            }
        }

        return $next($request);
    }
}
