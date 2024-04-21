<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Controllers;

class ConnectController extends BaseController
{
    public function index(): Response
    {
        return redirect('/');
    }

    public function callback(): Response
    {
        return redirect('/');
    }

    public function bind(Request $request): Response
    {
        try {
            if ($request->isAjax()) {
                return $this->success('data');
            }

            return view('bind');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }
}
