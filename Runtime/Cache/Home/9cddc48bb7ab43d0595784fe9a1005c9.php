<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <title>ZFT智慧案场系统登录</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8">
    <link href="/marke/Public/Mobile/css/login.css" type="text/css" rel="stylesheet">
    <style type="text/css">
        body{ margin:0; padding:0;}
        input[type="checkbox"] {
            margin: 0 ;
            height: 1rem;
            width: 1.2rem;
            padding-top: 0;
            vertical-align: middle;
            margin-right: 3px;
            font-family: inherit;
            font-size: inherit;
            font-weight: inherit;
        }
    </style>
</head>

<body>
    <div class="main">
        <div>
            <li class="login_logo"></li>
            <center><strong>ZFT智慧案场系统</strong></center>
        </div>
        <div class="center">
            <input class="phone" type="number" name="phone" id="phone" onblur="selectHouses()" placeholder="请输入手机号码">
            <input class="password" type="password" name="password" id="password" placeholder="请输入密码">
            <select name="houses" id="houses">
                <option value="">选择楼盘名称</option>
            </select>
        </div>
        <div  class="center" style="display: -webkit-box;padding-bottom: 10px;margin: 0 auto;">
            <div style="width: 50%;text-align: center;color: #f5b02C;">
                <span><input type="checkbox" id="remember" name="remember" value="1"></span>
                <span>记住密码</span>
            </div>
            <!-- <div  style="width: 50%;text-align: center;color: #f5b02d; ">忘记密码</div> -->
        </div>
        <div class="center">
            <button class="btn login_btn" onClick="login();">登录</button>
            <center style="margin-top: 10px;font-size: 0.8rem;" onclick="redirect('<?php echo U('register');?>');">超级会员注册</center>
        </div>
        <li class="load_icon_3"></li>
        <div class="tip"></div>
    </div>
    <div id="foot" class="foot">
        <center>☏ 技术支持:<strong>0898-66500367</strong></center>
    </div>
    <script src='/marke/Public/static/js/jquery-2.0.3.min.js'></script>
    <script type="text/javascript">
    $('.phone').focus(function() {
        $('.tip').hide();
        $(this).select();
    });
    $('.password').focus(function() {
        $('.tip').hide();
        $(this).select();
    });

    /**
     * 提示框提示
     */
    function tip(msg) {
        $('.tip').show();
        $('.tip').html(msg);
        setTimeout("$('.tip').hide()",3000);
    }
    function redirect($url) {
        window.location.href = $url;
    }

    /* 用户填写完号码之后，去搜索楼盘 */
    function selectHouses(){
        var phone = $('#phone').val();
        if(phone == ''){
            return;
        }
        $.ajax({
            url:'/marke/index.php?s=/Home/Login/getHouse',
            type:'POST',
            data:{'phone':phone},
            error:function(){
                getError();
            },
            success:function(msg){
                if(msg.status != 1){
                    getError();
                }else{
                    if(msg.info == '' || msg.info == null){
                        getError();
                    }else{
                        var html = '<option value="">选择楼盘名称</option>';
                        $.each(msg.info,function(i,item){
                            html +='<option value="'+item.db_name+'">'+item.title+'</option>';
                        })
                        $('#houses').html(html);
                    }
                }

            }
        })
    }

    function getError() {
        $('#houses').html('<option value="">该手机没有注册项目</option>');
    }

    /**
     * AJAX 提及登录信息
     * @return {[type]} [description]
     */
    function login() {
        var phone = $('#phone').val();
        var password = $('#password').val();
        var houses = $('#houses').val();
        if (phone == '' || password == '') {
            tip('请填写账户和密码');
            return;
        }
        if (houses == '' ) {
            tip('没有选择楼盘');
            return;
        }
        var remember = $('#remember').prop('checked') ? 1:0;
        $.ajax({
            type: "POST",
            url: "/marke/index.php?s=/Home/Login/login",
            data: { 'type': 'login', 'phone': phone, 'password': password ,'remember':remember,'houses':houses},
            beforeSend: function() {
                $('.load_icon_3').show();
            },
            complete: function() {
                $('.load_icon_3').hide();
            },
            success: function(msg) {
                if (msg.error == 0) {
                    tip('登录成功！');
                    window.location.href = '/marke/index.php?s=/Home/Index/index';
                } else {
                    if(msg.msg != undefined){
                        tip(msg.msg);
                    }else{
                        tip('登录失败');
                    }
                }
            }
        });
    };
    </script>
</body>

</html>