<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * @var array
     */
    protected $rule = [
        'passport' => 'require',
        'password' => 'require',
        'captcha|验证码' => 'require|captcha',
    ];

    /**
     * @var array
     */
    protected $message = [
        'passport.require' => '登录用户名必须',
        'password.require' => '登录密码必须',
        'captcha.require' => '图片验证码必须',
    ];
}
