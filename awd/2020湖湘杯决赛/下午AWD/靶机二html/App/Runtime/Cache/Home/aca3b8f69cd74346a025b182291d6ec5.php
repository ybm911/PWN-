<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($seo["title"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keys"]); ?>" />
<meta name="description" content="<?php echo ($seo["desc"]); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link href="__TMPL__Public/css/meta.css" type="text/css" rel="stylesheet"/>
<link href="__TMPL__Public/css/reg-login.css" type="text/css" rel="stylesheet"/>
<script src="__PUBLIC__/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script src="__PUBLIC__/statics/js/ThinkAjax.js"></script>
<script src="__TMPL__Public/js/common.js"></script>
</head>
<body id="login">
<div class="main">
	<div class="logo" ><a href="<?php echo C('site_domain');?>" title="<?php echo C("site_name");?>" ><?php echo C("site_name");?></a></div>
    <div class="content">
<div class="lg_left">
         <h1>用户登录</h1>
    <div class="lg_form">
        <form id="myform" action="/nlogin" method="post">
            <fieldset class="lg_name">
				<label>用户名：</label>
				<input type="text" value="" id="uname" name="uname" class="text" maxlength="32" />
				<p class="err_name error">请输入用户名!</p>
			</fieldset>
            <fieldset class="lg_pass">
                <label>密码：</label>
				<input type="password" value="" name="pass" id="pwd" class="text" maxlength="32" />
				<p class="err_pass error">请输入密码!</p>
            </fieldset>
            <fieldset class="lg_chk">
                <label>验证码：</label>
				<input type="text" id="verification_login" verify_post_action="<?php echo get_url('verify_test','','user');?>" name="check" class="text" maxlength="4" /><img src="<?php echo get_url('verify','','user');?>"  verify_action="<?php echo get_url('verify','','user');?>" url_model="<?php echo C(url_model);?>" id="img_checkcode" alt="验证码" width="100" height="35"/>
				<a href="javascript:void(0);" onclick="changeVerify();return false;" id="checkcode_change">换一张</a>
            	<p class="err_chk error">请输入验证码</p>
            </fieldset>
            <fieldset class="lg_remember">
                <label>记住我（一周免登录）</label>
				<input type="checkbox" value="1" name="remember" class="check" id="autologin_checkBox" checked="checked" />
            </fieldset>
            <fieldset class="lg_login">
            	<input type="hidden" name="referer" value="<?php echo ($referer); ?>" id="referer">
                <input type="button" value=" " id="loginBtn" class="sub" loginBtn_post_action="<?php echo get_url('loginAction','','user');?>" loginBtn_post_location="<?php echo get_url('index','','user');?>" />
				<div id="loading" style="margin-left:30px;display:none;"><img src="__PUBLIC__/statics/images/loading_d.gif" style=""></div>
            </fieldset>
        </form>
        <div class="ot_login">
            <h2>您也可以用以下方式登录：</h2>
            <div class="ot_btn">
                <a href="<?php echo get_url('sinalogin','','user');?>" style="margin-left:0;"><img src="__TMPL__Public/img/login_sina_01.png" /></a>
                <a href="<?php echo get_url('qqlogin','','user');?>" class="login_qq"><img src="__TMPL__Public/img/login_qq.png" /></a>
				<a href="<?php echo get_url('taobaologin','','user');?>" class="login_qq"><img src="__TMPL__Public/img/login_taobao.png" /></a>
            </div>
		</div>
    </div>
</div>
<div class="lg_right">
    <h2>注册</h2>
	<p>还没有账号？<a class="reg" href="<?php echo get_url('register','','user');?>">注册</a></p>
</div>
</div>
    <p class="copyright" title="SERVER: juanniuF3046">&copy;Copyright 2010-<?php echo date('Y'); ?> <a href="<?php echo C('site_domain');?>"><?php echo C("site_name");?></a>  (备案：<?php echo C('site_icp');?>)</p>
</div>
<script>
	//刷新验证码
	function changeVerify(){
		var src=$("#img_checkcode").attr("verify_action");
		var url_model=$("#img_checkcode").attr("url_model");
		if(url_model==0){
			var nowTime="&nowTime="+new Date().getTime();
		}else if(url_model==2){
			var nowTime="?nowTime="+new Date().getTime();
		}
		$("#img_checkcode").attr("src",src+nowTime);
	}
</script>
</body>
</html>