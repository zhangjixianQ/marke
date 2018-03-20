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
    
    <link rel="stylesheet" type="text/css" href="/marke/Public/Mobile/css/ownership.css">
    <style type="text/css">
    <?php if($ownership_man['bg_img'] != '' ): ?>.container {
        background: url('./<?php echo get_cover($ownership_man['bg_img']);?>')  repeat !important;
        background-size:100% 100%;
    }<?php endif; ?>
   
    </style>
    <div style="height: 30px;width: 100%;border: #ccc solid;border-width: 0 0 2px 0;background-color: #fff;">
        <div class="left" style="height:100%;width: 50%; font-size: 1.5rem;line-height: 30px;text-align: center;color: #f00;border: #f00 solid;border-width: 0 0 2px 0;">
            置业计划
        </div>
        <span style="padding-left: 1px;background-color: #EBEBEB;padding-bottom: 17px;" ></span>
        <div class="right" style="height:100%;width: 49%;font-size: 1.5rem;line-height: 30px;text-align: center;" onclick="redirect('<?php echo U('OwnerShip/lists',array('id'=>$id));?>')" >
            置业列表
        </div>
    </div>
    <div style="border:2px solid #B89068;margin: 10px;">
        <div class="mod-hd" style="text-align: center;">
            <h2 style="margin-top: 10px;margin-bottom: 0px;padding-bottom: 0px;font-size: 3rem;">置业计划表</h2>
        </div>
        <form class="form-horizontal" role="form" action="" method="POST" id="ac_form" style='min-height: 1400px;margin: 5px 10px;font-family:"微软雅黑";'>
            <div class="lagar">
                <input type="hidden" name="title" value="<?php if( $web_title != null ): echo ($web_title); else: ?> 1<?php endif; ?>">
                <!-- 楼盘标题 -->
               <!--  <input type="hidden" name="download_id" value="<?php echo ($download_id); ?>"> -->
                <table>
                    <tr>
                        <td class="o_title">客户：</td>
                        <td class="value">
                            <input type="text" name="name" placeholder="请输入姓名">
                        </td>
                    </tr>
                    <tr>
                        <td class="o_title">性别：</td>
                        <td class="value">
                            <input type="radio" name="sex" value="先生" checked="checked">先生
                            <input type="radio" name="sex" value="女士">女士
                        </td>
                    </tr>
                </table>
                <table id="house_table">
                    <tr>
                        <td><h3>认购单位：</h3></td>
                    </tr>
                    <tr name="house_tr_1">
                        <td name="house_td_1">
                            <select id="building" name="building">
                                <?php if(is_array($_building)): $i = 0; $__LIST__ = $_building;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["b_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>栋
                        </td>
                    </tr>
                    <tr name="house_tr_1">
                        <td name="house_td_1">
                            <select id="unit" name="unit" >
                                <?php if(is_array($_unit[$_building[0]['id']])): $i = 0; $__LIST__ = $_unit[$_building[0]['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$unit): $mod = ($i % 2 );++$i;?><option value="<?php echo ($unit["u_name"]); ?>"><?php echo ($unit["u_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>单元
                        </td>
                    </tr>
                    <tr name="house_tr_1">
                        <td name="house_td_1">
                            <!-- 去除第一个单元的信息 -->
                            <?php $firstUnit = current($_unit[$_building[0]['id']]); ?>
                            <select id="room" name="room">
                                <?php if(is_array($_room[$firstUnit['id']] )): $i = 0; $__LIST__ = $_room[$firstUnit['id']] ;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$room): $mod = ($i % 2 );++$i;?><option value="<?php echo ($room["room_number"]); ?>1"><?php echo ($room["room_number"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>房
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td class="o_title">日期：</td>
                        <td class="value"><input type="text" class="date" name="create_time" placeholder="请选择日期" readonly=""></td>
                    </tr>
                    <tr>
                        <td class="o_title">建筑面积：</td>
                        <td class="value"><input type="text" name="area" value="">m²</td>
                    </tr>
                    <tr>
                        <td class="o_title">建筑面积单价：</td>
                        <td class="value"><input type="text" name="unit_price" value="">元</td>
                    </tr>
                    <tr>
                        <td class="o_title">套内面积：</td>
                        <td class="value"><input type="text" name="usbale_area" value="">m²</td>
                    </tr>
                    <tr>
                        <td class="o_title">套内面积单价：</td>
                        <td class="value"><input type="text" name="usbale_unit_price" value="">元</td>
                    </tr>
                    <tr>
                        <td class="o_title">公摊面积：</td>
                        <td class="value"><input type="text" name="pool_area" value="">m²</td>
                    </tr>
                    <tr>
                        <td class="o_title">销售代理：</td>
                        <td class="value"><input type="text" name="selling_agent" placeholder="请填写销售代理"></td>
                    </tr>
                    <tr>
                        <td class="o_title">联系电话：</td>
                        <td class="value"><input type="text" name="phone" placeholder="请填写联系电话"></td>
                    </tr>
                </table>
            </div>
            <div class="lagar">
                <table>
                    <tr>
                        <td colspan="2">
                            <h3 >*付款计划</h3>
                        </td>
                    </tr>
                    <tr>
                        <td class="o_title">原总价：</td>
                        <td class="value"><input type="text" name="total_price_pre">元</td>
                    </tr>
                    <tr>
                        <td class="o_title">当前优惠折扣：</td>
                        <td class="value"><input type="number"  name="total_price_discount" style="width: 5rem;" value="100">%<span style="font-size: 10px;">(1-100)</span> </td>
                    </tr>
                    <tr>
                        <td class="o_title">折后总价：</td>
                        <td class="value"><input type="text" name="total_price_now">元</td>
                    </tr>
                </table>
            </div>
            <table>
                <tr>
                    <td colspan="2">
                        <h3>
                          <input type="radio" name="pay_way" value="1" id="radio1" checked="checked">一次性付款
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="div_pay_1" style="display: block;">
                            <div class="modle">
                                1、定金：
                                <input type="text" name="front_money_1">元，在签署《认购书》时付清；
                            </div>
                            <div class="modle">
                                2、折后总价：
                                <input type="text" name="downpayment_1">元（含定金），于认购书签署后
                                <input type="text" style="width: 50px;" name="sign_date_1">日内付清，同时签署《商品房买卖合同》；
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>
                            <input type="radio" name="pay_way" value="2" id="radio2">分期付款
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="div_pay_2" style="display: none;">
                            <div class="modle">
                                1、定金：
                                <input type="text" name="front_money_2">元，在签署《认购书》时付清；
                            </div>
                            <div class="modle">
                                2、首期款：房价
                                <span class='frm_select_box'>
                                    <select name='percent_2[]' >
                                        <option value=''>选择首付</option>
                                        <option value='10'>1成</option>
                                        <option value='20'>2成</option>
                                        <option value='30'>3成</option>
                                        <option value='40'>4成</option>
                                        <option value='50'>5成</option>
                                        <option value='60'>6成</option>
                                        <option value='70'>7成</option>
                                        <option value='80'>8成</option>
                                        <option value='90'>9成</option>
                                        <option value='100'>10成</option>
                                    </select>
                                </span>，既
                                <input type="text" name="downpayment_2[]">元（含定金），于认购书签署后
                                <input type="text" style="width: 50px;" name="sign_date_2[]">日内付清，同时签署《商品房买卖合同》；
                            </div>
                            <div class="modle">
                                3、第二期房款：房价 <span class='frm_select_box'>
                                    <select  name='percent_2[]'>
                                        <option value=''>第二期房款</option>
                                        <option value='10'>1成</option>
                                        <option value='20'>2成</option>
                                        <option value='30'>3成</option>
                                        <option value='40'>4成</option>
                                        <option value='50'>5成</option>
                                        <option value='60'>6成</option>
                                        <option value='70'>7成</option>
                                        <option value='80'>8成</option>
                                        <option value='90'>9成</option>
                                        <option value='100'>10成</option>
                                    </select>
                                  </span>，既
                                <input type="text" name="downpayment_2[]">元，于签署《商品房买卖合同》后
                                <input type="text" style="width: 50px;" name="sign_date_2[]">日内付清；
                            </div>
                            <div class="modle">
                                4、第三期房款：房价 
                                <span class='frm_select_box'>
                                    <select name='percent_2[]'>
                                        <option value=''>第三期房款</option>
                                    </select>
                                </span>，既
                                <input type="text" name="downpayment_2[]">元，于签署《商品房买卖合同》后
                                <input type="text" style="width: 50px;" name="sign_date_2[]">日内付清；
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3>
                            <input type="radio" name="pay_way" value="3" id="radio3">银行按揭
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="div_pay_3" style="display: none;">
                            <div class="modle">
                                1、定金：
                                <input type="text" name="front_money_3">元，在签署《认购书》时付清；
                            </div>
                            <div class="modle">
                                2、首期款：房价
                                <span class='frm_select_box'>
                                    <select name='percent_3'>
                                        <option value=''>选择首付</option>
                                        <option value='10'>1成</option>
                                        <option value='20'>2成</option>
                                        <option value='30'>3成</option>
                                        <option value='40'>4成</option>
                                        <option value='50'>5成</option>
                                        <option value='60'>6成</option>
                                        <option value='70'>7成</option>
                                        <option value='80'>8成</option>
                                        <option value='90'>9成</option>
                                        <option value='100'>10成</option>
                                    </select>
                                </span>，既
                                <input type="text" name="downpayment_3">元（含定金），于签署《商品房买卖合同》后
                                <input type="text" style="width: 50px;" name="sign_date_3">日内付清；
                            </div>
                            <div class="modle">
                                贷款额：
                                <input type="text" name="loan_value">元（取整到千位数）办理银行按揭。
                                <br> 贷款利率：
                                <select name='rate1' onchange="changeRate(this.value)" style="width: 180px;">
                                    <option value="28">15年8月26日利率上限（1.1倍）</option>
                                    <option value="27">15年8月26日利率下限（85折）</option>
                                    <option value="26">15年8月26日利率下限（7折）</option>
                                    <option selected="selected" value="25">15年8月26日基准利率</option>
                                </select>
                                利率值:
                                <input type="text" name="rate" value="5.15"> 按揭年数
                                <select id='year' name='year' style="width: 150px;">
                                    <option value="1">1年（12期）</option>
                                    <option value="2">2年（24期）</option>
                                    <option value="3">3年（36期）</option>
                                    <option value="4">4年（48期）</option>
                                    <option value="5">5年（60期）</option>
                                    <option value="6">6年（72期）</option>
                                    <option value="7">7年（84期）</option>
                                    <option value="8">8年（96期）</option>
                                    <option value="9">9年（108期）</option>
                                    <option value="10">10年（120期）</option>
                                    <option value="11">11年（132期）</option>
                                    <option value="12">12年（144期）</option>
                                    <option value="13">13年（156期）</option>
                                    <option value="14">14年（168期）</option>
                                    <option value="15">15年（180期）</option>
                                    <option value="16">16年（192期）</option>
                                    <option value="17">17年（204期）</option>
                                    <option value="18">18年（216期）</option>
                                    <option value="19">19年（228期）</option>
                                    <option value="20" selected="true">20年（240期）</option>
                                    <option value="25">25年（300期）</option>
                                    <option value="30">30年（360期）</option>
                                </select>
                                <br>
                                <input type="radio" name="calcdivate_type" value="1" checked="checked">等额本息计算
                                <input type="radio" name="calcdivate_type" value="2">等额本金计算
                                <input type="radio" name="calcdivate_type" value="3">两者计算
                                <input type="button" name="calcdivate_total" class="btn" value="计算房贷">
                                <br>
                                <div id="calculate_res">
                                    <!-- 存放银行贷款计算结果 -->
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="text-align: center;" colspan="2">
                        <h3>
                            购房相关综合费用
                        </h3>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="modle">
                            契税：
                            <input type="text" name="contract" value="">元（总房款的
                            <input type="text" name="contract_rate">%,地税收取）<span style="font-size: 10px;color: red;" id="tip_contract"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="modle">
                            公共维修基金：
                            <input type="text" name="maintenance_fund" value="">元（建筑面积
                            <input type="text" name="maintenance_fund_rate">元/m²房管局监管专用账户）<span style="font-size: 10px;color: red;" id="tip_maintenance"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="modle">
                            价格调节基金：
                            <input type="text" name="price_regulation_fund" value="">元（总房款的
                            <input type="text" name="price_regulation_fund_rate">%，财务局收取）<span style="font-size: 10px;color: red;" id="tip_regulation"></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="title2">
                        权证综合费：
                    </td>
                    <td class="value">
                        <input type="text" name="warrant_fee" value="">元
                    </td>
                </tr>
                <tr>
                    <td class="title2">
                        燃气管道初装费：
                    </td>
                    <td class="value">
                        <input type="text" name="gas_fee" value="">元
                    </td>
                </tr>
                <tr>
                    <td class="title2">
                        有线电视安装费：
                    </td>
                    <td class="value">
                        <input type="text" name="TV_fee" value="">元
                    </td>
                </tr>
                <tr>
                    <td class="title2">
                        其他费用：
                    </td>
                    <td class="value">
                        <input type="text" name="another_fee" value="">元
                    </td>
                </tr>
            </table>
            <div>
                <span style="font-size: 10px;color: red;">*以上所有数据，仅表示截止至当日的信息，仅供参考。最终价格、优惠等以签约为准。实际签约面积以政府批准测绘及商品房买卖合同最准。
                </span>
            </div>
            <div>
                <span style="font-size: 10px;color: red;">
                    *备注:<?php echo ($ownership_man["remark"]); ?>
                </span>
            </div>
            <div>
                <div class="button btn_submit" id="loadpic" >生成图片</div>
                <div id="remind" style="color: red;display: none;">图片已经生成，可点击底部列表查看</div>
            </div>
        </form>
    </div>

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
    var $houses_info_json = '<?php echo ($houses_info_json); ?>';
    </script>
    <link href="/marke/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
    <link href="/marke/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="/marke/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="/marke/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/marke/Public/Mobile/js/ownership_scheme_m.js" charset="UTF-8">
    </script>
    <script>
    var calculate_date = '';
    $(document).ready(function() {
        $('.footer').css("float", "left");
        $('.footer').css("width", "100%");
    });

    $(function() {
        $('.date').datetimepicker({
            format: 'yyyy-mm-dd',
            language: "zh-CN",
            minView: 2,
            autoclose: true
        });
        $('.time').datetimepicker({
            format: 'yyyy-mm-dd hh:ii',
            language: "zh-CN",
            minView: 2,
            autoclose: true
        });
    });

    _building = JSON.parse('<?php echo ($_building_json); ?>');
    _unit     = JSON.parse('<?php echo ($_unit_json); ?>');
    _room     = JSON.parse('<?php echo ($_room_json); ?>');
    b_id = '<?php echo ($b_id); ?>';
    u_id = '<?php echo ($u_id); ?>';
    r_id = '<?php echo ($r_id); ?>';
    type = '<?php echo ($_type); ?>';
    </script>



	<!-- /底部 -->
</body>
</html>