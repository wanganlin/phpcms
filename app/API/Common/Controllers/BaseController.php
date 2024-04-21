<?php

declare(strict_types=1);

namespace App\API\Common\Controllers;

use App\Http\Controllers\Controller;
use OpenApi\Attributes as OA;
use OpenApi\Attributes\Contact;

#[OA\Info(version: '1.0', description: '微官网平台接口文档', title: 'API文档', contact: new Contact('API Develop Team'))]
#[OA\Server(url: '/', description: '开发环境')]
abstract class BaseController extends Controller
{
    protected function initialize(): void
    {
        $default = config('app.default_theme', 'default');

        Config::set([
            'view_dir_name' => 'public/themes/'.$default.'/html',
        ], 'view');
    }
}
