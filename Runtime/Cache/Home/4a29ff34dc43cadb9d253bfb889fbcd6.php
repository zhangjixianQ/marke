<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
<title><?php echo ($_title); ?></title>
<!-- <link href="/marke/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/docs.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/onethink.css" rel="stylesheet"> -->
<link type="image/x-icon" rel="shortcut icon" href="/marke/Public/Home/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="/marke/Public/Home/css/mobile.css" >
<!-- <link rel="stylesheet" type="text/css" href="/marke/Public/Mobile/css/smoke.css"> -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/marke/Public/static/bootstrap/js/html5shiv.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script type="text/javascript" src="/marke/Public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/marke/Public/static/jquery-2.0.3.min.js"></script>
<!-- <script type="text/javascript" src="/marke/Public/static/bootstrap/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="/marke/Public/Home/js/mobile.js"></script>
<!-- <script type="text/javascript" src="/marke/Public/Mobile/js/smoke.min.js"></script> -->
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->

</head>
<body>
	<!-- 头部 -->
	
    <div class="header_fixed"  >
        <div class="header_left">
            <li class="back" ></li>
        </div>
        <div class="title">
            <div style="display: -webkit-box;max-width: 1000px;margin: 0 auto;">
            <div class="bottom_nav" onclick="redirect('<?php echo U('Index/index');?>')">
                <div class="bottom_name">首页</div>
            </div>
            <?php if(is_array($_bottom)): $i = 0; $__LIST__ = $_bottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="bottom_nav" onclick="redirect('<?php echo U($vo["path"]);?>')">
                <div class="bottom_name"><?php echo ($vo["title"]); ?></div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="bottom_nav"  onclick="redirect('<?php echo U('User/index');?>')">
                <div class="bottom_name">个人</div>
            </div>
        </div>
        </div>
        <div class="header_right">
            <li class="more" onclick="redirect('<?php echo ($_right_url); ?>');" style="<?php echo ($_right_type); ?>"></li>
        </div>
    </div>
    <div style="height:  40px;"></div>
    <script type="text/javascript">
    $('.header_left').on('click', function(){
        window.history.go(-1);
    });
    function logout() {
        $.ajax({
            url: "<?php echo U('login/logout');?>",
            type: "POST",
            dataType: 'json',
            success: function(data) {
                if (data.status) {
                    alert('退出成功！');
                    setTimeout(function() {
                        window.location.href = data.url;
                    }, 1500);
                } else {
                    //self.find(".Validform_checktip").text(data.info);
                }
            },
            error: function(er) {}
        });
    }
    </script>



	<!-- /头部 -->

	<!-- 主体 -->
	<div id="main-container" class="container">
    
    <style type="text/css">
        .block{
            width: 100px;
            margin: 14px;
            height: 100px;
            float: left;
            border-radius: 4px;
            box-shadow: 1px 2px 3px 0 #ACACAC;
            background-color: rgba(255,250,205,0.8);
            font-weight: bold;
            font-size: 1.1rem;
        }
       /* .block>.icon{
            width: 5rem;
            height: 5rem;
            margin: 0.5rem auto;
            background: url('/marke/Public/Mobile/images/icon/icon_houses.png') no-repeat;
            background-size: 5rem;
        }*/
        .blick_title{
            height: 2rem;
            margin: 1rem 4px 0 4px;
        }
    </style>
    <!-- 在父标签加上overfl:hidden可以解决子标签使用float，父标签无法自适应的问题 -->
    <center style=" overflow: hidden">
        <?php if(is_auth(AUTH_CUSTOMER_ADD) || is_auth(AUTH_CUSTOMER_MANAGE)): ?><div class="block" onclick="redirect('<?php echo U('add');?>')">
            <div class="icon"></div>
            <div class="blick_title">客户信息添加</div>
        </div><?php endif; ?>
        <div class="block"  onclick="redirect('<?php echo U('all');?>')">
            <div class="icon"></div>
            <div class="blick_title">总客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('intention');?>')">
            <div class="icon"></div>
            <div class="blick_title">意向客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('intention_contrack');?>')">
            <div class="icon"></div>
            <div class="blick_title">已意向登记未转定客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('contract_over');?>')">
            <div class="icon"></div>
            <div class="blick_title">已完成合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('contract_unover');?>')">
            <div class="icon"></div>
            <div class="blick_title">未完成合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('get_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">已完成收款合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('unget_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">未完成收款合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('bank_mortgage_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">银行按揭客户合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('ot_payment_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">一次性付款客户合同计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('installment_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">分期付款客户合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('deposit_contract');?>')">
            <div class="icon"></div>
            <div class="blick_title">已交定金未签合同统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('in_province');?>')">
            <div class="icon"></div>
            <div class="blick_title">省内客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('out_province');?>')">
            <div class="icon"></div>
            <div class="blick_title">省外客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('sales');?>')">
            <div class="icon"></div>
            <div class="blick_title">置业顾问统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('distribution');?>')">
            <div class="icon"></div>
            <div class="blick_title">分销商统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('manager');?>')">
            <div class="icon"></div>
            <div class="blick_title">渠道经理统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('supervisor');?>')">
            <div class="icon"></div>
            <div class="blick_title">案场主管统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('deposit_return');?>')">
            <div class="icon"></div>
            <div class="blick_title">退定金客户统计表</div>
        </div>
        <div class="block"  onclick="redirect('<?php echo U('check_out');?>')">
            <div class="icon"></div>
            <div class="blick_title">退房客户统计表</div>
        </div>

        <?php if(is_auth(AUTH_CUSTOMER_MANAGE)): ?><div class="block"  onclick="redirect('<?php echo U('statistics');?>')">
            <div class="icon"></div>
            <div class="blick_title">合同管理汇总表</div>
        </div><?php endif; ?>
        <!-- 同解决子标签使用float而父标签无法自适应的问题 -->
       <!--  <div style="clear: both;"></div> -->
    </center>
    <?php if(is_auth(AUTH_CUSTOMER_ADD) || is_auth(AUTH_CUSTOMER_MANAGE)): ?><div class="fixed_add" style="background-color: <?php echo ($bg_color); ?>; padding: 6px;" onclick="redirect('<?php echo U('add');?>')">
            <img src="/marke/Public/Mobile/images/icon/add_big.png">
        </div><?php endif; ?>

</div>
<script type="text/javascript">
    // $(function(){
    //     $(window).resize(function(){
    //         $("#main-container").css("min-height", $(window).height() - 120);
    //     }).resize();
    // });
    // (function (doc, win) {
    //     var docEl = doc.documentElement,
    //         resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
    //         recalc = function () {
    //             var clientWidth = docEl.clientWidth;
    //             if (!clientWidth) return;
    //             if(clientWidth>=640){
    //                 docEl.style.fontSize = '18px';
    //             }else{
    //                 docEl.style.fontSize = 20 * (clientWidth / 640) + 'px';
    //             }
    //         };

    //     if (!doc.addEventListener) return;
    //     win.addEventListener(resizeEvt, recalc, false);
    //     doc.addEventListener('DOMContentLoaded', recalc, false);
    // })(document, window);
	// 作者：_minooo_
	// 链接：http://www.jianshu.com/p/b00cd3506782
	// 來源：简书// 
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	
	<footer class="footer_fixed">
	</footer>
	<div id="dialog" class="dialog" name="dialog">
        <div class="dialog_shadow" onclick="hidedialog()"></div>
        <div class="dialog_window">
            <li class="dialog_close">X</li>
            <div class="dialog_content">
                <label class="c_title">这是标题</label>
                <div class="c_main">这话四内提供 阿斯蒂芬姐啊算咯姐姐啊弗朗基安静啊咧啊垃圾</div>
            </div>
        </div>
    </div>

    <div id="dialog_load" class="dialog" >
        <div class="dialog_shadow" onclick="hidedialog()"></div>
		<div style="position: fixed;z-index: 1002;top:45%;width: 100%;">
    		<img src="/marke/Public/Mobile/images/icon/load_3.gif" style="width: 50px;margin: 0 auto;display: block;">
		</div>
    </div>
    <div id="dialog_empty" class="dialog newdialog"  >
    	<div class="close_red" onclick="hidedialog()" style="position: fixed;z-index: 1005;top:2%;right: 1%;width: 3rem;height: 3rem;line-height: 2.8rem;font-size: 3rem;">x</div>
		<div style="z-index: 1002;width: 100%;margin-top: 10px;" id="empty_content">
		</div>
    </div>

<script type="text/javascript">
//(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/marke", //当前网站地址
		"APP"    : "/marke/index.php?s=", //当前项目地址
		"PUBLIC" : "/marke/Public", //项目公共目录地址
		"DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
		"VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
	}
//})();
</script>

    <script type="text/javascript">
    </script>



	<!-- /底部 -->
</body>
</html>