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
    
    <div class="hide">
        <img class="swiper_img" src="/marke/Public/Mobile/images/banner_1.png" style="width: 100%;">
    </div>
    <div style="height: 30px;width: 100%;border: #ccc solid;border-width: 0 0 2px 0;background-color: #fff;">
        <div class="left" style="height:100%;width: 49%; font-size: 1.5rem;line-height: 30px;text-align: center;color: #f00;border: #f00 solid;border-width: 0 0 2px 0;">楼栋管理</div>
        <span style="padding-left: 1px;background-color: #EBEBEB;padding-bottom: 17px;"></span>
        <div class="right" style="height:100%;width: 49%;font-size: 1.5rem;line-height: 30px;text-align: center;" onclick="redirect('<?php echo U('Room/building_list');?>')">单元管理</div>
    </div>
    <form action="" method="POST">
        <div style="width: 100%;padding-top: 10px;font-size: 20px;text-align: center;">
            填写楼盘楼栋单元信息
        </div>
        <div class="house_content" id="house">
            <?php if(!empty($_list)): if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="house_item">
                    <div class="house_input_s"><input type="text" id="b_<?php echo ($vo["id"]); ?>" value="<?php echo ($vo["b_name"]); ?>"></div><label>栋名</label>
                    <label><?php echo ($vo["type"]); ?></label>
                    <div class="house_input_s" style="width: 3rem;"><input type="number" value="<?php echo ($vo["unit_num"]); ?>" disabled="disabled"></div><label>单元数量</label>
                    <div onclick="edit('<?php echo ($vo["id"]); ?>');" style="padding-top: 3px;" class="confirm"><li class="edit_s_icon"></li></div>
                    <div onclick="del(this,'<?php echo ($vo["id"]); ?>');" style="padding-top: 3px;" class="confirm"><li class="del_icon"></li></div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <?php else: ?>
                <div class="house_item">
                    <div class="house_input_s"><input type="" name="b_name[]"></div><label>栋名</label>
                    <select name="type">
                        <option value="0">商品房</option>
                        <option value="1">别墅</option>
                    </select>
                    <div class="house_input_s" style="width: 3rem;"><input type="number" name="unit_num[]"></div><label>单元数量</label>
                    <div onclick="del(this);" style="padding-top: 3px;"><li class="del_icon"></li></div>
                </div><?php endif; ?>
        </div>
        <center class="house_content add" style="margin-top: -10px;padding-top: 20px;">
            <li class="add_icon"></li>
        </center>
        <center style="margin: 20px auto;">
            <button class="button_l btn_submit">提交</button>
        </center>
    </form>


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

    <script type="text/javascript" charset="utf-8">
    $('.add').on('click', function() {
        var html = '<div class="house_item">'+
                '<div class="house_input_s"><input type="" name="b_name[]"></div><label>栋名</label>'+
                '<select name="type">'+
                    '<option value="0">商品房</option>'+
                    '<option value="1">别墅</option>'+
                '</select>'+
                '<div class="house_input_s"  style="width: 3rem;"><input type="number" name="unit_num[]" ></div><label>单元数量</label>'+
                '<div onclick="del(this);" style="padding-top: 3px;"><li class="del_icon"></li></div>'+
            '</div>';
        $('#house').append(html);
    });
    hightLine('Room/index');
    function del(i,id) {
        id = id != undefined ? id : 0;
        if(id != 0){
            //删除原有的栋号
            if(confirm('是否删除！')){
                $.ajax({
                    url:'/marke/index.php?s=/Home/Room/del_building',
                    data:'id=' + id,
                    error:function(msg){
                        alert('删除失败!' + msg);
                        history.go(0);
                    },
                    success:function(msg){
                        if(msg.status == 1){
                            $(i).parent().remove();
                        }else{
                            alert('删除失败');
                            history.go(0);
                            return;
                        }
                    }
                });
            }
        }else{
            $(i).parent().remove();
        }
    }

    /**
     * 修改董浩名称
     * @param  {[type]} $id [description]
     * @return {[type]}     [description]
     */
    function edit($id) {
        var b_name = $('#b_'+$id).val();
        if(confirm('是否修改该栋名称?')){
            $.ajax({
                url:'/marke/index.php?s=/Home/Room/edit_building',
                data:{'id':$id,'b_name':b_name},
                error:function(msg){
                    alert('修改失败！');
                    history.go(0);
                    return;
                },
                success:function(msg){
                    if(msg.status == 1){
                        alert('修改成功！');
                    }else{
                        alert('修改失败！');
                        history.go(0);
                        return;
                    }
                }
            });
        }
    }
    </script>



	<!-- /底部 -->
</body>
</html>