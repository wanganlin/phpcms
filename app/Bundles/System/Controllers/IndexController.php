<?php

declare(strict_types=1);

namespace App\Bundles\System\Controllers;

use Illuminate\Http\Response;
use OpenApi\Attributes as OA;

class IndexController extends BaseController
{
    #[OA\Get(path: '/admin', summary: '管理首页', tags: ['默认'])]
    public function index(): Response
    {
        return view('index');
    }

    public function dashboard(): Response
    {
        return $this->success('');
    }

    public function logout(): Response
    {

    }
}
