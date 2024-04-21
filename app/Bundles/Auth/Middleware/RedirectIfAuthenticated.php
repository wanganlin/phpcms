<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Middleware;

use App\Constants\GlobalConst;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * 处理请求
     */
    public function handle(Request $request, Closure $next): JsonResponse
    {
        if (session('?'.GlobalConst::AuthName)) {
            if ($request->ajax()) {
                return response()->json([
                    'code' => 40001,
                    'message' => 'Forbidden',
                    'data' => null,
                ]);
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
