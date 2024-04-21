<?php

class CreateUserTable
{
    public function up(): void
    {
        $table = $this->table('user');
        $table->addColumn(Column::string('username')->setUnique()->setComment('登录用户名'))
            ->addColumn(Column::string('password')->setComment('登录用户密码'))
            ->addColumn(Column::string('password_salt')->setComment('用户密码盐值'))
            ->addColumn(Column::string('reset_token')->setComment('密码重置hash'))
            ->addColumn(Column::string('name')->setComment('昵称'))
            ->addColumn(Column::string('avatar')->setComment('头像'))
            ->addColumn(Column::date('birthday')->setComment('生日'))
            ->addColumn(Column::string('motto')->setComment('座右铭'))
            ->addColumn(Column::string('email')->setUnique()->setComment('电子邮箱'))
            ->addColumn(Column::dateTime('email_verified_time')->setNullable()->setComment('电子邮箱验证时间'))
            ->addColumn(Column::string('mobile')->setUnique()->setComment('手机号码'))
            ->addColumn(Column::dateTime('mobile_verified_time')->setNullable()->setComment('手机号码验证时间'))
            ->addColumn(Column::string('remember_token')->setComment('Remember Token'))
            ->addColumn(Column::string('last_login_ip')->setComment('最后登录IP'))
            ->addColumn(Column::dateTime('last_login_time')->setComment('最后登录时间'))
            ->addColumn(Column::tinyInteger('status')->setUnsigned()->setComment('状态：1正常，2禁用'))
            ->addTimestamps()
            ->addSoftDelete()
            ->save();
    }
}
