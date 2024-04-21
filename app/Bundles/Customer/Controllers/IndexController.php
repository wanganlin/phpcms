<?php

declare(strict_types=1);

namespace App\Bundles\Customer\Controllers;

class IndexController extends BaseController
{
    public function index(): View
    {
        return view('index');
    }
}
