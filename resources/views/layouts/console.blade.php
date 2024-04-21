<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{:token()}">
    <title>管理平台</title>
    <link rel="stylesheet" href="{:asset('assets/layui@2.9.6/css/layui.css')}">
    <link rel="stylesheet" href="{:asset('assets/console@1.0.0/css/app.css')}">
    <script type="text/javascript" src="{:asset('assets/layui@2.9.6/layui.js')}"></script>
    <script type="text/javascript" src="{:asset('assets/vue@2.7.16/vue.min.js')}"></script>
    <script type="text/javascript" src="{:asset('assets/console@1.0.0/js/app.js')}"></script>
</head>

<body>
<div class="layui-layout layui-layout-admin">
    <div class="layui-header layui-bg-cyan">
        <div class="layui-logo layui-bg-cyan">xx印务管理系统</div>
        <ul class="layui-nav layui-bg-cyan layui-layout-right">
            <li class="layui-nav-item layui-show-sm-inline-block">
                <a href="javascript:;">
                    <img src="//unpkg.com/outeres@0.0.10/img/layui/icon-v2.png" class="layui-nav-img">
                    tester
                </a>
                <dl class="layui-nav-child">
                    <dd><a href="javascript:;">个人资料</a></dd>
                    <dd><a href="javascript:;">安全设置</a></dd>
                    <dd><a href="javascript:;">退出</a></dd>
                </dl>
            </li>
        </ul>
    </div>
    <div class="layui-side layui-bg-gray">
        <div class="layui-side-scroll">
            <ul class="layui-nav layui-bg-gray layui-nav-tree">
                <li class="layui-nav-item"><a href="javascript:;">click menu item</a></li>
                <li class="layui-nav-item"><a href="javascript:;">the links</a></li>
            </ul>
        </div>
    </div>
    <div class="layui-body">
        {__CONTENT__}
    </div>
    <div class="layui-footer">
        Copyright &copy; {:date('Y')}
    </div>
</div>

<script type="text/javascript">
    layui.use(['element', 'layer', 'util'], function () {
        var element = layui.element;
        var layer = layui.layer;
        var util = layui.util;
        var $ = layui.$;

    });
</script>
</body>
</html>
