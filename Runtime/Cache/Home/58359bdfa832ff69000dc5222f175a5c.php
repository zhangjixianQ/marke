<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
<title><?php echo C('WEB_SITE_TITLE');?></title>
<!-- <link href="/marke/Public/static/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/docs.css" rel="stylesheet">
<link href="/marke/Public/static/bootstrap/css/onethink.css" rel="stylesheet"> -->
<link type="image/x-icon" rel="shortcut icon" href="/marke/Public/Home/images/favicon.ico">
<link rel="stylesheet" type="text/css" href="/marke/Public/Mobile/css/mobile.css" >
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
<script type="text/javascript" src="/marke/Public/Mobile/js/mobile.js"></script>
<!-- <script type="text/javascript" src="/marke/Public/Mobile/js/smoke.min.js"></script> -->
<!--<![endif]-->
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->

</head>
<body>
	<!-- 头部 -->
	
    <div class="header_fixed" style="background-color: <?php echo ($bg_color); ?>">
        <div class="header_left">
            <li class="back" ></li>
        </div>
        <div class="title">
            <?php echo ($_title); ?>
        </div>
        <div class="header_right">
            <li class="more" onclick="redirect('<?php echo ($_right_url); ?>');" style="<?php echo ($_right_type); ?>"></li>
        </div>
    </div>
    <div style="height: 3.2rem;"></div>
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
    
   <div class="group_scroll" style="overflow-x: hidden;">
    <?php if(is_auth(3)): ?><div class="group" style="width: 20%;" id="lock">我的锁定</div>
        <div class="group" style="width: 20%;" id="submit">我的成交</div>
        <div class="group" style="width: 20%; font-size: 0.8rem;" id="myLCheck">我的锁定审核</div>
        <div class="group" style="width: 20%; font-size: 0.8rem;" id="mySCheck">我的成交审核</div>
        <div class="group" style="width: 20%;" id="tocheck">等待审核</div>
    <?php else: ?>
    	<div class="group" style="width: 50%;" id="lock">我的锁定</div>
        <div class="group" style="width: 50%;" id="submit">我的成交</div><?php endif; ?>
</div>
<script type="text/javascript">
	$(function(){
		var on = '<?php echo ($on); ?>';
		$('#'+on+'').addClass('group_on');
		$('#'+on+'').removeClass('group');
		$('.group').each(function(i,item){
			$(item).on('click',function(){
				redirect('/marke/index.php?s=/Home/Business/'+$(item).attr('id'));
			});
		});
	})
</script>
   <div id="content">
        <?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item_s" onclick="toRoom('<?php echo ($vo["id"]); ?>');">
            <div class="item_info" style="width: 100%;">
                <div class="item_title_ss"><?php echo ($vo["b_name"]); ?>-<?php echo ($vo["u_name"]); ?>-<?php echo ($vo["room_number"]); ?></div>
                <div style="position: absolute;bottom: 0.1rem;left: 2rem;">锁定人:<?php echo ($vo["nick_name"]); ?></div>
                <div style="position: absolute;bottom: 0.1rem;right: 1rem;"><?php echo (date("Y年m月d号 H:i:s",$vo["op_time"])); ?></div>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div id="navigation" align="center">
        <!-- 页面导航-->
            <a href="<?php echo U('Business/check');?>&page=2"></a>
            <!-- 此处可以是url，可以是action，要注意不是每种html都可以加，是跟当前网页有相同布局的才可以。另外一个重要的地方是page参数，这个一定要加在这里，它的作用是指出当前页面页码，每加载一次数据，page自动+1,我们可以从服务器用request拿到他然后进行后面的分页处理。-->
        </div>
   </div>
   <center>没有更多数据了！</center>

</div>
<script type="text/javascript">
    // $(function(){
    //     $(window).resize(function(){
    //         $("#main-container").css("min-height", $(window).height() - 120);
    //     }).resize();
    // });
    (function (doc, win) {
        var docEl = doc.documentElement,
            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
            recalc = function () {
                var clientWidth = docEl.clientWidth;
                if (!clientWidth) return;
                if(clientWidth>=640){
                    docEl.style.fontSize = '18px';
                }else{
                    docEl.style.fontSize = 20 * (clientWidth / 640) + 'px';
                }
            };

        if (!doc.addEventListener) return;
        win.addEventListener(resizeEvt, recalc, false);
        doc.addEventListener('DOMContentLoaded', recalc, false);
    })(document, window);
	// 作者：_minooo_
	// 链接：http://www.jianshu.com/p/b00cd3506782
	// 來源：简书// 
</script>
	<!-- /主体 -->

	<!-- 底部 -->
	
	<div style="height:4.5rem;"></div>
	<footer class="footer_fixed">
		<div class="bottom_nav"  style="width: <?php echo ($_bottom_w); ?>" onclick="redirect('<?php echo U('Index/index');?>')">
	    	<li class="bottom_icon"  style="background: url('/marke/Public/Mobile/images/icon/home.png') no-repeat; -webkit-background-size: auto 4.6em;"></li>
	       	<div class="bottom_name">首页</div>
	    </div>
	    <?php if(is_array($_bottom)): $i = 0; $__LIST__ = $_bottom;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="bottom_nav"  style="width: <?php echo ($_bottom_w); ?>" onclick="redirect('<?php echo U($vo["path"]);?>')">
	    	<li class="bottom_icon"  style="background: url('/marke<?php echo ($vo['icon']); ?>') no-repeat; -webkit-background-size: auto 4.6em;"></li>
	       	<div class="bottom_name"><?php echo ($vo["title"]); ?></div>
	    </div><?php endforeach; endif; else: echo "" ;endif; ?>
	    <div class="bottom_nav"  style="width: <?php echo ($_bottom_w); ?>" onclick="redirect('<?php echo U('User/index');?>')">
	    	<li class="bottom_icon"  style="background: url('/marke/Public/Mobile/images/icon/my.png') no-repeat;-webkit-background-size: auto 4.6em;"></li>
	       	<div class="bottom_name">个人</div>
	    </div>
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
    <div id="dialog_empty" class="dialog newdialog" >
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

    <script type="text/javascript" src="/marke/Public/static/plugins/infinitescroll/jquery.infinitescroll.js" charset="UTF-8"></script>
    <script type="text/javascript">
        hightLine('Business/index');
        var totalpage = '<?php echo ($totalpage); ?>';
        $(document).ready(function() { //别忘了加这句，除非你没学Jquery

            $("#content").infinitescroll({
                loading: {
                    finished: undefined,
                    finishedMsg: "<em>很抱歉，内容已经浏览完了！</em>",
                    msgText: "<div id='msgText'  style='text-align: center;' ><img style='width:2rem;' src='/marke/Public/static/plugins/infinitescroll/images/loading.gif' /><?php if($totalpage == 1): ?>已没有更多数据<?php else: ?>请稍等.正在加载中...<?php endif; ?></div>",
                    selector: null,
                    speed: 'fast',
                    start: undefined
                },
                maxPage: totalpage,
                bufferPx: 1,
                navSelector: "#navigation", //导航的选择器，会被隐藏 
                nextSelector: "#navigation a", //包含下一页链接的选择器  
                itemSelector: "#content ", //你将要取回的选项(内容块)  
                animate: true, //当有新数据加载进来的时候，页面是否有动画效果，默认没有 
                extraScrollPx: 10, //滚动条距离底部多少像素的时候开始加载，默认150  
                errorCallback: function() {
                    $('div#msgText').html('');
                }, //当出错的时候，比如404页面的时候执行的函数  
            }, function(arrayOfNewElems) {
                //程序执行完的回调函数  
            });
        });

        function toRoom(id){
            var url = ThinkPHP.APP + '/Home/Room/room_info/id/' + id;
            window.location.href = url;
        }
    </script>



	<!-- /底部 -->
</body>
</html>