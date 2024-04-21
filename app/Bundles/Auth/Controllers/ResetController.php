<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Controllers;

class ResetController extends BaseController
{
    public function index(Request $request): View
    {
        $token = $request->get('token');

        // todo check

        return view('index');
    }

    public function mobile(Request $request): Json
    {
        try {
            $formData = $request->post();

            $v = new ResetRequest();
            if (! $v->check($formData)) {
                throw new CustomException($v->getError());
            }

            return $this->success('data');
        } catch (Throwable $e) {
            Log::error($e);

            if ($e instanceof CustomException || $e instanceof ValidateException) {
                return $this->error($e->getMessage());
            }

            return $this->error('请求错误，请稍后再试。');
        }
    }
}
