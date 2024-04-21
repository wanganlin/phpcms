<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{:token()}">
    <title>{$page_title|default=''}</title>
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="{:asset('assets/layui@2.9.6/css/layui.css')}">
    <link rel="stylesheet" href="{:theme('css/app.css')}">
    <script type="text/javascript" src="{:asset('assets/layui@2.9.6/layui.js')}"></script>
    <script type="text/javascript" src="{:asset('assets/vue@2.7.16/vue.min.js')}"></script>
    <script type="text/javascript" src="{:theme('js/app.js')}"></script>
</head>
<body>

<div>
    <a href="{:url('/')}">首页</a> |
    {if condition="session('?auth_user')"}
    <a href="{:url('/home')}">会员中心</a> |
    <a href="{:url('/passport/logout')}" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">注销</a>
    <form id="logout-form" action="{:url('/logout')}" method="POST">
        {:token_field()}
    </form>
    {else}
    <a href="{:url('/passport/signup')}">免费注册</a> |
    <a href="{:url('/passport/login')}">登录</a>
    {/if}
</div>

{__CONTENT__}
</body>
</html>
