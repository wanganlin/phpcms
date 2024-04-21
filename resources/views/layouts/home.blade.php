<!DOCTYPE html>
<html lang="zh-Hans">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="csrf-token" content="{:token()}">
    <title>管理平台</title>
    <link rel="stylesheet" href="{:asset('assets/layui@2.9.6/css/layui.css')}">
    <link rel="stylesheet" href="{:asset('assets/passport@1.0.0/css/app.css')}">
    <script type="text/javascript" src="{:asset('assets/layui@2.9.6/layui.js')}"></script>
    <script type="text/javascript" src="{:asset('assets/vue@2.7.16/vue.min.js')}"></script>
    <script type="text/javascript" src="{:asset('assets/passport@1.0.0/js/app.js')}"></script>
</head>
<body>
<div class="header">
    <a href="{:url('/')}">Home</a>
</div>

<div class="home">
    <div class="menu">
        会员菜单
    </div>
    <div class="main">
        <div>home title.</div>
        {__CONTENT__}
    </div>
</div>

</body>
</html>
