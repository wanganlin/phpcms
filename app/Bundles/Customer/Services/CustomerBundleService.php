<?php

declare(strict_types=1);

namespace App\Bundles\Customer\Services;

class CustomerBundleService
{
    /**
     * 根据条件查询用户
     */
    public function getUser(array $condition): ?UserModel
    {
        $user = UserModel::where($condition)->findOrEmpty();
        if ($user->isEmpty()) {
            return null;
        }

        $userModel = new UserModel();
        $userModel->setId($user->id);
        $userModel->setUsername($user->username);

        return $userModel;
    }

    /**
     * 根据用户ID查询用户
     */
    public function getUserById(int $id): ?UserModel
    {
        return $this->getUser(['id' => $id]);
    }

    /**
     * 根据用户名查询用户
     */
    public function getUserByUsername(string $username): ?UserModel
    {
        return $this->getUser(['username' => $username]);
    }

    /**
     * 根据用户邮箱查询用户
     */
    public function getUserByEmail(string $email): ?UserModel
    {
        return $this->getUser(['email' => $email]);
    }

    /**
     * 根据用户手机号查询用户
     */
    public function getUserByMobile(string $mobile): ?UserModel
    {
        return $this->getUser(['mobile' => $mobile]);
    }

    /**
     * 密码加密
     */
    public function passwordHash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * 密码校验
     */
    public function passwordVerify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}
