{layout name="layout/auth" /}

<form class="layui-form" action="javascript:void(0);">
    <div class="layui-form-item">
        <img class="logo" src="{:asset('static/admin/images/logo.png')}"/>
        <div class="title">Admin</div>
        <div class="desc">
            企业级门户网站管理系统
        </div>
    </div>
    <div class="layui-form-item">
        <input type="text" name="username" placeholder="请输入登录用户名" lay-verify="required" class="layui-input"/>
    </div>
    <div class="layui-form-item">
        <input type="password" name="password" placeholder="请输入登录密码" lay-verify="required" class="layui-input"/>
    </div>
    <div class="layui-form-item">
        <input type="text" name="captcha" placeholder="请输入图片验证码" lay-verify="required"
               class="code layui-input layui-input-inline"/>
        <img src="{:url('/captcha')}" class="codeImage" width="124"/>
    </div>
    <div class="layui-form-item">
        <a href="{:url('/console/passport/forgot')}" style="float: right; margin-top: 10px;">忘记密码</a>
        <input type="checkbox" name="remember" title="记住密码" lay-skin="primary" checked>
    </div>
    <div class="layui-form-item">
        <button type="button" class="pear-btn pear-btn-success login" lay-submit lay-filter="login">
            登 录
        </button>
    </div>
</form>
<script type="text/javascript">
    layui.use(['encrypt', 'form', 'popup'], function () {
        var $ = layui.jquery,
            encrypt = layui.encrypt,
            form = layui.form,
            popup = layui.popup;

        $('.codeImage').on('click', function () {
            var captcha = $(this).attr('src').split('?');
            $('.codeImage').attr('src', captcha[0] + '?r=' + Math.random());
        })

        form.on('submit(login)', function (data) {
            data.field.password = encrypt.md5(data.field.password)
            $.post("{:url('/login')}", data.field, function (res) {
                if (res.code !== 0) {
                    popup.failure(res.message);
                    return false;
                }
                popup.success("登录成功", function () {
                    location.href = "{$callback}"
                });
            }, 'json')
        });
    })
</script>
