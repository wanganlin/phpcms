<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Controllers;

use App\Http\Controllers\Controller;

abstract class BaseController extends Controller
{
    protected array $middleware = [
        RedirectIfAuthenticated::class,
    ];
}
