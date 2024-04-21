<?php

declare(strict_types=1);

namespace App\Bundles\Auth\Services;

use App\Bundles\Auth\Services\Input\LoginInput;
use App\Exceptions\CustomException;

class LoginBundleService
{
    /**
     * 根据用户名和密码登录
     *
     * @throws CustomException
     */
    public function login(LoginInput $loginInput): bool
    {
        $userModel = $this->getUser($loginInput->getUsername());
        if (is_null($userModel)) {
            throw new CustomException('用户信息不存在');
        }

        $userManager = new CustomerBundleService();
        if (! $userManager->passwordVerify($loginInput->getPassword(), $userModel->password)) {
            throw new CustomException('用户登录密码不正确');
        }

        // 校验状态

        // 记录日志

        // 记住登录
        if ($loginInput->isRememberMe()) {
            cookie('remember', $userModel->getId(), 30 * 24 * 3600);
        }

        // 保存session
        session(GlobalConst::AuthName, $userModel->getId());

        return true;
    }

    /**
     * 获取登录用户
     */
    private function getUser(string $username): ?UserModel
    {
        $userBundleService = new CustomerBundleService();
        if (is_email($username)) {
            return $userBundleService->getUserByEmail($username);
        } elseif (is_mobile($username)) {
            return $userBundleService->getUserByMobile($username);
        }

        return $userBundleService->getUserByUsername($username);
    }
}
