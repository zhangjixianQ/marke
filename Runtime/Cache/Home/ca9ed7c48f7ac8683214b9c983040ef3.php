<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>ZFT智慧案场系统注册</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link href="/marke/Public/Mobile/css/login.css" type="text/css" rel="stylesheet">
    <style type="text/css">
    body {
        margin: 0;
        padding: 0;
    }
    </style>
</head>

<body>
    <div class="main">
        <div>
            <li class="login_logo"></li>
            <center style="height: auto;"><strong>ZFT智慧案场系统</strong></center>
            <center>超级会员注册</center>
        </div>
        <div class="center">
            <input class="code" type="text" name="code" id="code" placeholder="序列号">
            <input class="phone" type="number" name="phone" id="phone" placeholder="手机号码">
            <input class="user" type="text" name="nick_name" id="nick_name" placeholder="姓名">
            <input class="password" type="password" name="password" id="password" placeholder="请输入密码">
            <input class="password" type="password" name="repassword" id="repassword" placeholder="请确认密码">
        </div>
        <div class="center">
            <button class="btn login_btn" onClick="register();">注册</button>
            <center style="margin-top: 10px;font-size: 0.8rem;" onclick="redirect('<?php echo U('login');?>');">返回登录</center>
        </div>
        <li class="load_icon_3"></li>
        <div class="tip"></div>
    </div>
    <div id="foot" class="foot">
        <center>☏ 技术支持:<strong>0898-66500367</strong></center>
    </div>
    <script src='/marke/Public/static/js/jquery-2.0.3.min.js'></script>
    <script type="text/javascript">

    function redirect($url) {
        window.location.href = $url;
    }

    $('.phone').focus(function() {
        $('.tip').hide();
        $(this).select();
    });
    $('.password').focus(function() {
        $('.tip').hide();
        $(this).select();
    });

    $('.code').focus(function() {
        $('.tip').hide();
        $(this).select();
    });
    $('.repassword').focus(function() {
        $('.tip').hide();
        $(this).select();
    });

    /**
     * 提示框提示
     */
    function tip(msg) {
        $('.tip').show();
        $('.tip').html(msg);
        setTimeout("$('.tip').hide()", 3000);
    }


    /**
     * AJAX 提及登录信息
     * @return {[type]} [description]
     */
    function register() {
        var code =  $('#code').val();
        var phone = $('#phone').val();
        var nick_name = $('#nick_name').val();
        var password = $('#password').val();
        var repassword = $('#repassword').val();
        if (code == '') {
            tip('请填写邀请码');
            return;
        }
        if (nick_name == '') {
            tip('请填写昵称');
            return;
        }
        if (phone == '' || password == '') {
            tip('请填写账户和密码');
            return;
        }
        if(password !=  repassword) {
            tip('两次密码不相同');
            return;
        }
        $.ajax({
            type: "POST",
            url: "/marke/index.php?s=/Home/Login/register",
            data: { 'type': 'register', 'code':code,'nick_name':nick_name, 'phone': phone, 'password': password },
            beforeSend: function() {
                $('.load_icon_3').show();
            },
            complete: function() {
                $('.load_icon_3').hide();
            },
            success: function(msg) {
                if (msg.status == 1) {
                    tip('注册成功！正在转至登录界面...');
                    setTimeout("window.location.href = '/marke/index.php?s=/Home/Login/login'",2000);
                } else {
                    if (msg.info != undefined) {
                        tip(msg.info);
                    } else {
                        tip('注册失败!');
                    }
                }
            }
        });
    };
    </script>
</body>

</html>