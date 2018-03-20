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
    
    <style type="text/css">
        .form_control>label{
            line-height: 3rem;
        }
    </style>
    <form class="form_group" method="POST" action="">
        <div class="form_control">
            <label>客户姓名:</label>
            <div class="form_control_div">
                <input type="text" name="raise[cus_name]">
            </div>
        </div>
        <div class="form_control">
            <label>客户手机:</label>
            <div class="form_control_div">
                <input type="text" name="raise[cus_phone]">
            </div>
        </div>

        <div class="form_control">
            <label>凭证图片:</label>
            <div class="form_control_div">
                <div class="button" onclick="picSelect()">上传图片</div>
                <input type="hidden" name="raise[voucher_thumb][]" id="uploadPic">
            </div>
        </div>
        <div id="showPic" class="hide show_img">
        </div>
        <div class="form_control">
            <label>凭证编码:</label>
            <div class="form_control_div">
                <input type="text" name="raise[voucher_number][]">
            </div>
        </div>
        <div class="form_control">
            <label>顾问手机:</label>
            <div class="form_control_div">
                <input type="text" name="raise[user_phone]" value="<?php echo ($user["phone"]); ?>">
            </div>
        </div>
        <div class="form_control">
            <label>顾问姓名:</label>
            <div class="form_control_div">
                <input type="text"  name="raise[user_name]" value="<?php echo ($user["nick_name"]); ?>">
            </div>
        </div>
        <center>
            <input type="submit" style="width: 40%;margin: 0px 5%;display: block;"  name="" class="button btn_submit" value="提交">
        </center>
    </form>
    <form id="formPic" enctype="multipart/form-data" style="width:auto;">
        <input type="file" name="picToUpload[]" id="picUpload" onChange="pic2Upload();" multiple style="display:none;" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" capture="camera">
    </form>

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

    <script type="text/javascript">
    /**
     * 触发图片选择框架
     */
    function picSelect() {
        $('#picUpload').click();
    }

    /**
     * 当图片选择框选择文件时自动上传。
     */
    var upload = $('#upload');
    function pic2Upload() {
        var formData = new FormData($('#formPic')[0]); //获取表单
        //formData.append('brand_name',$('option[value="'+$('select').val()+'"]').html());
        //FormData的参数只能是 HTMLFormElement,而JQ拿到的是一个对象，但是下标0的属性就是 HTMLFormElement
        $.ajax({
            url: ThinkPHP.APP + '/Home/UploadPic/uploadPicture',
            type: 'POST',
            data: formData, // Form数据
            cache: false,
            contentType: false, // 告诉jQuery不要去设置Content-Type请求头，然后在表单里面设置Content-Type为enctype="multipart/form-data"
            processData: false, // 告诉jQuery不要去处理发送的数据
            beforeSend: function() {
                upload.remove();
                var html = '<div class="div_img" id="loading">' +
                    '<img class="up_pic"  src="' + ThinkPHP.ROOT + '/Public/Mobile/images/icon/load.gif">' +
                    '</div>';
                $('#showPic').append(html);
            },
            success: function(msg) {
                $('#showPic').removeClass('hide');
                $('#loading').remove();
                if (msg.status == 1) {
                    $(msg.info).each(function(i, msg) {
                        var html = '<div class="div_img"  data-id="' + msg.id + '">' +
                            '<div class="close_red right" onclick="delImg(' + msg.id + ')">X</div>' +
                            '<img class="up_pic" src=".' + msg.path + '">' +
                            '</div>';
                        $('#showPic').append(html);
                    });
                    var idA = new Array();
                    $('#showPic>div').each(function(i, item) {
                        idA[i] = $(item).data('id');
                    });
                    var ids = idA.join(',');
                    $('#uploadPic').val(ids);

                } else {
                    alert(msg.info);
                }
            },
            error: function() {
                alert('上传失败');
            },
            complete: function() {
                $('#showPic').append(upload);
            }
        });
    }
    /**
     * 删除图片
     * @param  {[type]} pic_path [description]
     * @return {[type]}          [description]
     */
    function delImg(pid) {
        $.ajax({
            type: 'POST',
            data: 'id=' + pid,
            url: ThinkPHP.APP + '/Home/UploadPic/del_Img',
            success: function(msg) {
                $('div[data-id="' + pid + '"]').remove(); //清除图片

                var idA = new Array();
                $('#showPic>div').each(function(i, item) {
                    idA[i] = $(item).data('id');
                });
                var ids = idA.join(',');
                $('#uploadPic').val(ids);
                if (ids == '') {
                    $('#showPic').addClass('hide');
                }
            }
        });
    }
    </script>



	<!-- /底部 -->
</body>
</html>