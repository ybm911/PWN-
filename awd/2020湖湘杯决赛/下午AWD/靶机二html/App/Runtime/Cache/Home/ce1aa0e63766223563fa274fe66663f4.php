<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo ($seo["title"]); ?></title>
<meta name="keywords" content="<?php echo ($seo["keys"]); ?>" />
<meta name="description" content="<?php echo ($seo["desc"]); ?>" />
<script src="__PUBLIC__/statics/js/jquery/jquery-1.7.2.min.js"></script>
<script src="__PUBLIC__/statics/js/ThinkAjax.js"></script>
<script src="__TMPL__Public/js/common.js?1"></script>

<script src="__TMPL__Public/js/masonry.js"></script>
<script type="text/javascript" src="__PUBLIC__/statics/js/jquery.masonry.min.js"></script> 
<link href="__TMPL__Public/css/meta.css" type="text/css" rel="stylesheet"/>
<link href="__TMPL__Public/css/list.css" type="text/css" rel="stylesheet"/>
<link href="__TMPL__Public/css/profile.css" type="text/css" rel="stylesheet"/>
<link href="__TMPL__Public/css/album.css" type="text/css" rel="stylesheet"/>
</head>
<script>
$(document).ready(function(){
	//登录
	var id = $.cookie('id');
	var username =$.cookie('name');
	if(id > 0){
		$(".op .info_show").show();
		$(".op .login").hide();
		if(username != ''){
			$('#username').text(username);
		}
	}else{
		$(".op .info_show").hide();
		$(".op .login").show();
	}
	//搜索
	var web_path=$('#web_path').text();
	<?php if(isset($album)): ?>$('#album').addClass('cur').siblings().removeClass('cur');
		$(".selectbox .selected").text('搜专辑');
		$(".selectbox .selected").append('<em></em>');
		$("#search_form").attr('action',web_path+'index.php?a=album&m=Search&g=Home');
		$('#a').val('album');<?php endif; ?>
	
	$(".selectbox").hover(
		function(){
			$(this).find(".selected").addClass('hover');
			$(".selectbox ol").show();
		},
		function(){
			$(this).find(".selected").removeClass('hover');
			$(".selectbox ol").hide();
		}
	)
	
	$(".se").click(function(){
		$(this).addClass('cur').siblings().removeClass('cur');
		var v = $(this).find("a").text();
		$(".selectbox .selected").text('搜'+v);
		$(".selectbox .selected").append('<em></em>');
		$(".selectbox ol").hide();
		var a = $(this).attr('id');
		$("#search_form").attr('action',web_path+'index.php?a='+a+'&m=Search&g=Home');
		$('#a').val(a);
	})
	
	$(".se").hover(function(){
		$(this).addClass('cur').siblings().removeClass('cur');
	})
	var key = $(".txt").attr('placeholder');
	
	$(".txt").focus(function(){
		if($(".txt").val() == key){
			$(this).val('');
		}
	});
	
	$(".txt").blur(function(){
		if($(".txt").val() == ''){
			$(this).val(key);
		}
	});
});
$(function(){
		var nav_top = $('.nav_offsetTop').offset().top; 
		$show_nav = function() {
		var st = $(document).scrollTop();
		if(st > nav_top){
			$("#header_fixed").show();
		}else{
			$("#header_fixed").hide();
		}
	};
	$(window).bind("scroll", $show_nav);
})
$(function(){
	var nav_top = $('.nav_offsetTop').offset().top; 
	var st = $(document).scrollTop();
	if(st > nav_top){
		$("#header_fixed").show();
	}else{
		$("#header_fixed").hide();
	}
})
</script>

<body id="index">
<div id="web_path" style="display:none;"><?php echo C('web_path');?></div>
<div id="header_fixed">
<div class="navWrap clearfix">
	<div id="nav">
		<ul class="nav_list clearfix">
			<li class="shopping"><a href="javascript:;">逛街啦</a></li>
			<li><a class=<?php if('index' == $curpage): ?>cur<?php else: ?>split<?php endif; ?> href="<?php echo C('site_domain');?>">首页</a></li>
			<li class=<?php if('album' == $curpage): ?>cur<?php else: ?>split<?php endif; ?>><a href="<?php echo get_url('index','','album');?>">专辑</a></li>
			<?php if(is_array($p_cate_list)): $i = 0; $__LIST__ = $p_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vop): $mod = ($i % 2 );++$i;?><li class=<?php if($vop['id'] == $id): ?>cur<?php else: ?>split<?php endif; ?>><a href="<?php echo get_url('index',$vop['id'],'cate');?>"><?php echo ($vop["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		
<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_b"><img src="__TMPL__Public/img/bdshare.png" width="96"/>
		<a class="shareCount"></a>	</div>
<script type="text/javascript" id="bdshare_js" data="type=button" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
		</div>
		</div>
</div>
<div id="header">
	<div class="toolsBar clearfix op">
			<ul class="info_show" style="display:none">
				<li class="uname">
						<a href="<?php echo get_url('index','','user');?>" class="item"><img class="mb_avt r3" onerror="this.src='__PUBLIC__/statics/images/avatar-60.png'" src=<?php if($nav_user_info['img'] == ''): ?>__PUBLIC__/statics/images/avatar-60.png<?php else: echo C('web_path');?>Uploads/avatar_small/<?php echo ($nav_user_info["img"]); endif; ?> /><b id="username"><?php echo ($nav_user_info["name"]); ?></b></a>
						<span></span>
						<p>
							<a href="<?php echo get_url('account','','user');?>">个人设置</a>
							<a href="<?php echo get_url('sns','','user');?>">账号绑定</a>
							<a href="<?php echo get_url('logout','','user');?>">退出</a></p>
				</li>
				<li class="globe_publish"><a class="item" href="<?php echo get_url('release','','user');?>">发表</a></li>
				<li class="myalbum" ><a class="item" href="<?php echo get_url('album','','user');?>">专辑</a></li>
				<li class="myfavs"><a class="item" href="<?php echo get_url('like','','user');?>">喜欢</a></li>
			</ul>                    
		<ul class="login clearfix">
			<li class="ways">
				<a href="<?php echo get_url('register','','user');?>" class="mr5"><span>注册</span></a>
				<a href="<?php echo get_url('login','','user');?>"><span>登录</span></a>
			</li>
			<li class="other_ways">
				<a href="<?php echo get_url('sinalogin','','user');?>" class="weibo_login">微博登录</a>
				<a href="<?php echo get_url('qqlogin','','user');?>" class="qq_login">QQ登录</a>
				<a href="<?php echo get_url('taobaologin','','user');?>" class="tb_login">淘宝登录</a>
			</li>
		</ul>
</div>
	<div class="logo-search  clearfix">
		<h1 class="logo"><a href="<?php echo C('site_domain');?>" class="logo" ><img src="__TMPL__Public/img/logo.png" width="146" height="47" class="png_bg"/></a></h1>
		<div id="searchBar">
			<div class="selectbox">
				<span class="selected">搜宝贝<em></em></span>
				<ol>
					<li class="se cur" id="index"><a href="javascript:;">宝贝</a></li>
					<li class="se" id="album"><a href="javascript:;">专辑</a></li>
					<li class="lastli"></li>
				</ol>
			</div>
			<form target="_blank" action="<?php echo get_url('index','','search');?>" id="search_form">
				<input id="a" name="a" type="hidden" value="index">
				<input name="m" type="hidden" value="Search">
				<input name="g" type="hidden" value="Home">
				<input id="keywd" class="txt" name="keywords" type="text" value="<?php if(isset($keywords)): echo ($keywords); else: echo C('default_kw'); endif; ?>" placeholder="<?php echo C('default_kw');?>" autoComplete= "Off"/>
				<input class="btn" type="submit" value=""/>
			</form>
		</div>
	</div>
	<div class="navWrap clearfix">
	<div id="nav" class="nav_offsetTop">
		<ul class="nav_list clearfix">
			<li class="shopping"><a href="javascript:;">逛街啦</a></li>
			<li><a class=<?php if('index' == $curpage): ?>cur<?php else: ?>split<?php endif; ?> href="<?php echo C('site_domain');?>">首页</a></li>
			<li class=<?php if('album' == $curpage): ?>cur<?php else: ?>split<?php endif; ?>><a href="<?php echo get_url('index','','album');?>">专辑</a></li>
			<?php if(is_array($p_cate_list)): $i = 0; $__LIST__ = $p_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vop): $mod = ($i % 2 );++$i;?><li class=<?php if($vop['id'] == $id): ?>cur<?php else: ?>split<?php endif; ?>><a href="<?php echo get_url('index',$vop['id'],'cate');?>"><?php echo ($vop["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		
<!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_b"><img src="__TMPL__Public/img/bdshare.png" width="96"/>
		<a class="shareCount"></a>	</div>
<script type="text/javascript" id="bdshare_js" data="type=button" ></script>
<script type="text/javascript" id="bdshell_js"></script>
<script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script>
<!-- Baidu Button END -->
<?php if(('index' == $curpage) OR ($cate_name != '')): ?><!-- OR ('album' eq $curpage)-->
<div id="nav_sub">
		<ul class="album_new">
			<li><a class="clearfix" href="<?php echo get_url('index','','album');?>"><strong>最新专辑</strong><span></span></a></li>
		</ul>
        <ul class="items_num">
			<li><a class="clearfix" href="javascript:;"><strong>单品：<?php echo ($itemCount); ?></strong><em></em></a></li>			
		</ul>
		
		<ul class="cate_show">
		<?php if(is_array($p_cate_list)): $i = 0; $__LIST__ = $p_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vop): $mod = ($i % 2 );++$i;?><li class="<?php if($vop['id'] == $id): ?>curr<?php endif; ?>">
				<a class="clearfix" href="<?php echo get_url('index',$vop['id'],'cate');?>"><strong><img src="<?php echo C('web_path').ltrim($vop['img'],'/'); ?>" width="20" height="20"><?php echo ($vop["name"]); ?></strong><span></span></a>    
                <!-- <p>
				<?php if(is_array($vop['tags'])): $i = 0; $__LIST__ = $vop['tags'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voTag): $mod = ($i % 2 );++$i;?><a href="<?php echo get_url('tag',$voTag['id'],'cate');?>" class="cate_word"><?php echo ($voTag["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				</p>-->
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		</div><?php endif; ?>
		</div>
		</div>
</div>
<div id="head_bottom"></div>
<div class="main">
<div id="content_top">
								
   <div class="home_top_box mb20 r5">
		<div class="home_top_bg rt5"  style="background-image:url(__TMPL__Public/img/bgimg.jpg);">
			<div class="home_top_all">
				<span class="h_t_bg png_bg"></span>
				<div class="top_avatar"> 
				   <img alt="<?php echo ($user_info["name"]); ?>" onerror="this.src='__PUBLIC__/statics/images/avatar.png'" src=<?php if($user_info['img'] == ''): ?>__PUBLIC__/statics/images/avatar.png<?php else: echo C('web_path');?>Uploads/avatar_big/<?php echo ($user_info["img"]); endif; ?> class="r5 u_i">
													<ul class="record">
						<li class="fans">
						<a title="关注" href="<?php echo get_url('follow',$oUid,'user');?>">
								<span class="ft18" <?php if($curPage == uc_follow): ?>style="color:#ff6fa6"<?php endif; ?>><?php echo ($user_info["follow_num"]); ?></span>
								<span>关注</span>
							</a>
						</li>
						
						<li class="popular">
							<a title="粉丝" href="<?php echo get_url('fans',$oUid,'user');?>">
								<span class="ft18" id="fans_num" <?php if($curPage == uc_fans): ?>style="color:#ff6fa6"<?php endif; ?>><?php echo ($user_info["fans_num"]); ?></span>
								<span>粉丝</span>
							</a>
						</li>
						
						<li class="liked">
							<div>
								 <a title="喜欢" href="<?php echo get_url('like',$oUid,'user');?>">
								<span class="ft18" <?php if($curPage == uc_like): ?>style="color:#ff6fa6"<?php endif; ?>><?php echo ($user_info["likes_num"]); ?></span>
								<span class="t" >喜欢</span>
								</a>
							</div>
						</li>
					</ul>
				</div> 

				<div class="home_top_user">
					<div class="name_fav" follow_post_action="<?php echo get_url('add_follow',$oUid,'user');?>"  login_location="<?php echo get_url('login','','user');?>">
						<h1 class="fl"><a href="<?php echo get_url('index',$oUid,'user');?>" title="<?php echo ($user_info["name"]); ?>" ><?php echo ($user_info["name"]); ?></a></h1>
						<?php if(isset($oUid)): ?><div type="all" uid="1ebdl2" class="followdiv fl" id="addfollow" style=<?php if($followed == 1): ?>"display:none"<?php else: ?>"display:block"<?php endif; ?>>
							<a href="javascript:;" class="addfo"></a>
						</div>
						<div type="all" uid="15tgbg" class="followdiv fl" id="delfollow" style=<?php if($followed == 1): ?>"display:block"<?php else: ?>"display:none"<?php endif; ?>><span class="add_ok">已关注</span><a href="javascript:void(0);" class="unfollow">取消</a></div><?php endif; ?>																														<!--<div class="u_i_b fl">
							<a title="发私信" toid="1ebdl2" class="send_message" href="javascript:;">发私信</a>
							<a style="color:#999;" toid="1ebdl2" class="add_blacklist" href="javascript:;">加入黑名单</a>                 
						</div>-->
														</div>
					<p class="home_top_p">
														   <?php echo ($user_info["info"]); ?>                                                                           <!--<a href="/u/1ebdl2/settingdetail" target="_blank" class="pl10">查看更多<span>&gt;&gt;</span></a>--> 
					</p>
					<p class="home_top_x">
														 <!--<span>星座/摩羯座</span> -->   
																								<span><?php if($user_info['sex'] == 0): ?>女<?php else: ?>男<?php endif; ?></span>        
																								<span><?php if($user_info['age'] == 80): ?>80后<?php elseif($user_info['age'] == 90): ?>90后<?php else: ?>70后<?php endif; ?></span> 
																								<span><?php echo ($user_info["address"]); ?></span> 
														</p>
				   <!-- <p class="home_top_x user_label">标签：
																<span>十七岁</span>
																<span>漫长。夏。</span>
															</p>-->
				</div>
										</div>
							</div>
	   <div class="home_top_nav rb5">
			<ul class="home_nav">
				<li <?php if(ACTION_NAME == 'index'): ?>class='c'<?php endif; ?>>
					<a href="<?php echo get_url('index',$oUid,'user');?>" title="首页" >封面</a>
				</li>
				<li <?php if(ACTION_NAME == 'share'): ?>class='c'<?php endif; ?>>
					<a href="<?php echo get_url('share',$oUid,'user');?>" title="分享" >分享</a>
				</li>
				<li <?php if(ACTION_NAME == 'like'): ?>class='c'<?php endif; ?>>
					<a href="<?php echo get_url('like',$oUid,'user');?>" title="喜欢" >喜欢</a>
				</li>
				<li <?php if((ACTION_NAME == 'album') or (ACTION_NAME == 'albumDetail')): ?>class='c'<?php endif; ?>>
					<a href="<?php echo get_url('album',$oUid,'user');?>" title="专辑" >专辑</a>
				</li>
			</ul>
	   </div>
   </div>

</div>
<div class="clearfix" id="content_wrap">
<?php if((!$album_list) AND (!$items_list)): ?><div class="home_empty">
	<img src="__TMPL__Public/img/dragon_icon_yaya.png">
	<span class="des">
	<?php if($oUid): ?>他<?php else: ?>你<?php endif; ?>的封面还无内容哦！<!--，去<a title="蘑菇达人" href="/daren" target="_blank">蘑菇达人</a>看看她们如何装饰自己的空间吧！ -->
	</span>
</div>
<?php else: ?>
<div class="content">
<?php if(is_array($album_list)): $i = 0; $__LIST__ = $album_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voAlbum): $mod = ($i % 2 );++$i;?><div class="album_item col">
    <div class="album_item_bd">
        <ul>
            <li class="big" >
				<img class="big item_img" <?php if(($voAlbum['cover']['img'] == '') and ($voAlbum['cover'])): ?>src="__TMPL__Public/img/undefined.jpg"<?php else: ?>src="<?php echo (get_img($voAlbum["cover"]["img"],210)); ?>"<?php endif; ?> width="225" />

			</li>
			<li class="small">
			<?php if(is_array($voAlbum['items'])): $i = 0; $__LIST__ = array_slice($voAlbum['items'],0,4,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voItems): $mod = ($i % 2 );++$i;?><img class="item_img" <?php if($voItems['img'] != ''): ?>src="<?php echo (get_img($voItems["img"],100)); ?>"<?php else: ?>src="__TMPL__Public/img/undefined.jpg"<?php endif; ?> /><?php endforeach; endif; else: echo "" ;endif; ?>
			</li>   
      	</ul>  	      
        <div class="album_author" >
        	<a title="<?php echo ($voAlbum["title"]); ?>" href="<?php echo get_url('albumDetail',$voAlbum['id'],'user');?>" class="album_title" target="_blank"><?php echo ($voAlbum["title"]); ?></a>
        </div>
        <b class="mask" ></b>
        <a target="_blank" href="<?php echo get_url('albumDetail',$voAlbum['id'],'user');?>" class="album_link" ></a>
    </div>
    <div class="album_item_ft"></div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(is_array($items_list)): $i = 0; $__LIST__ = $items_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voItems): $mod = ($i % 2 );++$i;?><div class="col">
		<div class="pic bgload">
			<a target="_blank" href="<?php echo get_url('index',$voItems['id'],'item');?>" title="<?php echo ($voItems["title"]); ?>"><img class="item_img" alt="<?php echo ($voItems["title"]); ?>" <?php if($voItems['img'] != ''): ?>src="<?php echo (get_img($voItems["img"],210)); ?>"<?php else: ?>src="__TMPL__Public/img/undefined.jpg"<?php endif; ?> width="225" /></a>
			<a href="<?php echo get_url('addAlbum',$voItems['id'],'album');?>" target="_blank"><span class="add_to_album">加入专辑</span></a>
			<span class="price item_pruce">￥<?php echo ($voItems["price"]); ?></span>
		</div>
		<p class="btn">
			<span class="favaImg"><em class="s1 <?php if($likes[$voItems['id']] == 1): ?>favored<?php endif; ?>" item_id="<?php echo ($voItems['id']); ?>"><?php if($likes[$voItems['id']] == 1): ?>已喜欢<?php else: ?>喜欢一下<?php endif; ?></em><a href="<?php echo get_url('index',$voItems['id'],'item');?>" target="_blank"><i class="l" id="<?php echo ($voItems['id']); ?>"><?php echo ($voItems["likes"]); ?></i><i class="r"></i></a></span>
			<input type="hidden" name="" id="like_post_action" value="<?php echo get_url('createlike','','user');?>"><input type="hidden" name="" id="like_post_location" value="<?php echo get_url('login','','user');?>">
			<a class="creply" href="<?php echo get_url('index',$voItems['id'],'item');?>" target="_blank"><em>评论</em>(<i><?php echo ($voItems["comments"]); ?></i>)</a>              
		</p>
		<p class="fava"> 
			<span>
				<a class="avt" target="_blank" href="<?php echo get_url('index',$voItems['uid'],'user');?>"><img onerror="this.src='__PUBLIC__/statics/images/avatar-60.png'" src=<?php if($voItems['userimg'] != ''): ?>"/<?php echo C('web_path');?>Uploads/avatar_small/<?php echo ($voItems["userimg"]); ?>"<?php else: ?>"__PUBLIC__/statics/images/avatar-60.png"<?php endif; ?> style="width:24px;height:24px;"/></a>
				<em><a target="_blank" href="<?php echo get_url('index',$voItems['uid'],'user');?>" class="name"><?php echo ($voItems["username"]); ?></a>分享于<?php echo (date('Y年m月d日 H:i:s',$voItems["add_time"])); ?></em>
			</span>
			<?php if(isset($voItems['ablum_info'])): ?><span><a class="avt" target="_blank" href="<?php echo get_url('index',$voItems['ablum_info']['uid'],'user');?>"><img onerror="this.src='__PUBLIC__/statics/images/avatar-60.png'" src=<?php if($voItems['ablum_info']['img'] != ''): ?>"/<?php echo C('web_path');?>Uploads/avatar_small/<?php echo ($voItems["ablum_info"]["img"]); ?>"<?php else: ?>"__PUBLIC__/statics/images/avatar-60.png"<?php endif; ?> style="width:24px;height:24px;"/></a>
				<em><a target="_blank" href="<?php echo get_url('index',$voItems['ablum_info']['uid'],'user');?>" class="name"><?php echo ($voItems["ablum_info"]["uname"]); ?></a>加入<a href="<?php echo get_url('detail',$voItems['ablum_info']['id'],'album');?>" target="_blank" class="clrff8"><?php echo ($voItems["ablum_info"]["title"]); ?></a></em></span><?php endif; ?>
			<?php if(isset($voItems['commnets_info'])): ?><span><a class="avt" target="_blank" href="<?php echo get_url('index',$voItems['commnets_info']['uid'],'user');?>"><img onerror="this.src='__PUBLIC__/statics/images/avatar-60.png'" src=<?php if($voItems['commnets_info']['img'] != ''): ?>"/<?php echo C('web_path');?>Uploads/avatar_small/<?php echo ($voItems["commnets_info"]["img"]); ?>"<?php else: ?>"__PUBLIC__/statics/images/avatar-60.png"<?php endif; ?> style="width:24px;height:24px;"/></a>
				<em><a target="_blank" href="<?php echo get_url('index',$voItems['commnets_info']['uid'],'user');?>" class="name"><?php echo ($voItems["commnets_info"]["name"]); ?>：</a><?php echo ($voItems["commnets_info"]["info"]); ?></em></span><?php endif; ?>             
		</p>
		<i class="shadow"></i>		
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div><?php endif; ?>
</div>
</div>
<div class="footerWrap">
		<div class="radius-top">
			<span class="hl"></span>
			<span class="hr"></span>
		</div>
<div id="footer">
	<div class="fl">
		<dl style="margin-left:30px;">
			<dt>网站</dt>
			<dd>
				<ul>
				<?php if(is_array($p_cate_list)): $i = 0; $__LIST__ = $p_cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cval): $mod = ($i % 2 );++$i;?><li>·<a href="<?php echo get_url('index',$cval['id'],'cate');?>" target="_blank"><?php echo ($cval["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</dd>
		</dl>
		<dl>
			<dt>网站相关</dt>
			<dd style="margin-bottom: 18px;">
				<ul>
				<dd><a href="__PUBLIC__/statics/sitemap.html" target="_blank">网站地图</a></dd>
    			<dd><a href="__PUBLIC__/statics/sitemap.xml" target="_blank">sitemap</a></dd>
				<dd><?php echo strclean(C('site_icp')); ?></dd>
				<dd><?php echo strclean(C('statistics_code')); ?></dd>
				</ul>
			</dd>
			
		</dl>
		
	</div>
	<div class="fr">     
		<dl class="followus">
			<dt>关注我们</dt>
			<dd>
				<ul>
				<dd><?php echo strclean(C('follow_us')); ?></dd>
				<dd><?php echo strclean(C('follow_us2')); ?></dd>
				<dd><?php echo strclean(C('follow_us3')); ?></dd>
				<dd><?php echo strclean(C('follow_us4')); ?></dd>
				<dd><?php echo strclean(C('follow_us5')); ?></dd>
				<dd><?php echo strclean(C('follow_us6')); ?></dd>
				</ul>
			</dd>
		</dl>
		
		<dl>
			<dt>友情链接</dt>
			<dd>
				<ul>
				<?php if(is_array($linkList)): $i = 0; $__LIST__ = $linkList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>·<a href="<?php echo ($val["url"]); ?>" target="_blank"><?php echo ($val["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</dd>
		</dl>
	</div>

<p class="cr"><?php echo strclean(C('record')); ?></p>
</div>
		<div class="radius-bottom">
			<span class="hl"></span>
			<span class="hr"></span>
		</div>
</div>

<div class="back2top"><a href="javascript:;" title="返回顶部"></a></div>
</body>
</html>
<script>
/*返回顶部*/
$(function() {
		$(".back2top").click(function() {
			$("html, body").animate({ scrollTop: 0 }, 120);
	}), $backToTopFun = function() {
		var st = $(document).scrollTop(), winh = $(window).height();
		(st > 0)? $(".back2top").show(): $(".back2top").hide();    
		//IE6下的定位
		if (!window.XMLHttpRequest) {
			$(".back2top").css("top", st + winh - 166);    
		}
	};
	$(window).bind("scroll", $backToTopFun);
	$(function() { $backToTopFun(); });
});
$(function(){
	$(".info_show .uname").hover(function(){
		$(".info_show .uname p").show();
	},function(){
		$(".info_show .uname p").hide();
	})
	$(".info_show .msg_notice").hover(function(){
		$(".info_show .msg_notice p").show();
	},function(){
		$(".info_show .msg_notice p").hide();
	})
/*	$("#searchBar .selectbox").hover(function(){
		$("#searchBar .selectbox ol").show();
	},function(){
		$("#searchBar .selectbox ol").hide();
	})*/
})
</script>