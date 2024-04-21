<?php

declare(strict_types=1);

namespace App\API\Common\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OpenApi\Attributes as OA;

class IndexController extends BaseController
{
    #[OA\Get(path: '/', summary: 'API接口', tags: ['默认'])]
    #[OA\Response(response: 200, description: 'OK')]
    public function index(Request $request): Renderable
    {
        $pathInfo = $request->path();
        if (empty($pathInfo)) {
            return view('/index');
        }

        // DB SELECT
        $data = DB::table('posts')->where('segment', $pathInfo)->first();

        if (empty($data)) {
            return view('/error');
        }

        return view('/'.$data->template);
    }
}
