<?php

declare(strict_types=1);

namespace App\Bundles\Content;

use Illuminate\Support\ServiceProvider;

class ContentServiceProvider extends ServiceProvider
{
    /**
     * 服务注册
     */
    public function register()
    {

    }

    /**
     * 服务启动
     */
    public function boot(): void
    {
        $migration = __DIR__.'/Migrations';
        if (is_dir($migration)) {
            $this->loadMigrationsFrom($migration);
        }

        $route = __DIR__.'Routes/web.php';
        if (is_file($route)) {
            $this->loadRoutesFrom($route);
        }
    }
}
