<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Controllers;

class LoginController extends BaseController
{
    #[OA\Get(path: '/login', summary: '登录', tags: ['默认'])]
    public function index(Request $request): Response
    {
        $callback = $request->get('callback', '/');

        return view('index', ['callback' => urldecode($callback)]);
    }

    public function mobile(Request $request): Response
    {
        try {
            $formData = $request->post();

            $v = new LoginRequest();
            if (! $v->check($formData)) {
                throw new CustomException($v->getError());
            }

            $loginInput = new LoginInput();
            $loginInput->setUsername($formData['username']);
            $loginInput->setPassword($formData['password']);
            $loginInput->setRememberMe($formData['remember'] === 'on');

            $loginBundleService = new LoginBundleService();
            if ($loginBundleService->login($loginInput)) {
                return $this->success('ok');
            }

            throw new CustomException('登录失败');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }
}
