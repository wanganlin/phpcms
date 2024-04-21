<?php

declare(strict_types=1);

namespace App\Bundles\System\Services;

class RuleBundleService
{
    /**
     * 获取管理资源链接
     *
     * @param  int  $menu  是否仅显示菜单
     * @param  int  $status  显示状态
     */
    public function getRule(int $menu = 1, int $status = 1): array
    {
        $collection = AuthRule::where('status', $status)
            ->where('is_menu', $menu)
            ->orderBy('sort', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $data = collect($collection)->toArray();

        $menu = [];
        foreach ($data as $item) {
            if ($item['parent_id'] == 0) {
                $filtered = $collection->filter(function ($v) use ($item) {
                    return $v['parent_id'] == $item['id'];
                });

                $sub = [];
                foreach ($filtered->all() as $v) {
                    $sub[] = [
                        'name' => $v['name'],
                        'url' => url('/'.GlobalConst::CONSOLE_MODULE.'/'.$v['rule']),
                        'icon' => $v['icon'],
                    ];
                }

                $menu[] = [
                    'name' => $item['name'],
                    'url' => 'javascript:void(0);',
                    'icon' => $item['icon'],
                    'sub' => $sub,
                ];
            }
        }

        return $menu;
    }
}
