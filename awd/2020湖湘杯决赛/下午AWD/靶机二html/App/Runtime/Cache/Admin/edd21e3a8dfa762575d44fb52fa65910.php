<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>后台管理_<?php echo C('site_name');?></title>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />

<script language="javascript" type="text/javascript" src="__PUBLIC__/statics/js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/statics/js/common.js"></script>

<link rel='stylesheet' type='text/css' href='__PUBLIC__/statics/css/admin_style.css'>
<style type="text/css">.input{ font-size:14px}</style> 

<script type="text/javascript">
	function showtab(mid,val,n){
	 	for(var i=1;i<=n;i++){
			$('#'+mid+i).hide();
		}
		$('#'+mid+val).show();
	}
	
	function showtabs(mid,val,n){
	    if(val==1){
			for(var i=1;i<=n;i++){
				$('#'+mid+i).show();
			}
		}else{
			for(var i=1;i<=n;i++){
				$('#'+mid+i).hide();
			}
		}
	}
	
	$(document).ready(function(){

		$('#html_cache_on').change(function(){
			showtabs('html',$(this).val(),4);
		});
		<?php if(C('home.html_cache_on') == '1'): ?>showtabs('html',1,4);<?php endif; ?>
	});
</script>

</head>
<body>
<table width="98%" border="0" cellpadding="4" cellspacing="1" class="table">
<form action="<?php echo U('Config/cache');?>" method="post" id="gxform"> 
<tr class="table_title"><td colspan="4">网站缓存设置</td></tr>

<tr class="ji">
  <td class="left">缓存功能</td>
  <td colspan="3">
  	<select name="con[html_cache_on]" id="html_cache_on" class="w100">
	  <option value="1" <?php if(C('home.html_cache_on') == '1'): ?>selected="selected"<?php endif; ?>>开启</option>
	  <option value="0" <?php if(C('home.html_cache_on') == '0'): ?>selected="selected"<?php endif; ?>>关闭</option>
  	</select>
  <span id="html1" style="display:none">后缀名：
	  	<select name="con[html_file_suffix]">
		  <option value=".html" <?php if(C('home.html_file_suffix') == '.html'): ?>selected="selected"<?php endif; ?>>.html</option>
		  <option value=".htm" <?php if(C('home.html_file_suffix') == '.htm'): ?>selected="selected"<?php endif; ?>>.htm</option>
		  <option value=".shtml" <?php if(C('home.html_file_suffix') == '.shtml'): ?>selected="selected"<?php endif; ?>>.shtml</option>
		  <option value=".shtm" <?php if(C('home.html_file_suffix') == '.shtm'): ?>selected="selected"<?php endif; ?>>.shtm</option>
	  	</select>
  	</span>
  </td>
</tr>     
<tr class="tr" id="html2" style="display:none">
  <td class="left">首页缓存时间(小时)</td>
  <td colspan="3"><input type="text" name="con[html_cache_index]" maxlength="6" value="<?php echo C('home.html_cache_index');?>" class="w100">
  </td>
</tr>
<tr class="tr" id="html3" style="display:none">
  <td class="left">列表页缓存时间(小时)</td>
  <td colspan="3"><input type="text" name="con[html_cache_cate]" maxlength="6" value="<?php echo C('home.html_cache_cate');?>" class="w100">
  </td>
</tr>
<tr class="tr" id="html4" style="display:none">
  <td class="left">专辑页缓存时间(小时)</td>
  <td colspan="3"><input type="text" name="con[html_cache_album]" maxlength="6" value="<?php echo C('home.html_cache_album');?>" class="w100">
  </td>
</tr>     
<tr class="tr">
  <td colspan="4"><input type="hidden" name="setting_sub" value="true">
    <input class="bginput" type="submit" name="submit" value="提交">
  </td>
</tr>
</form>
</table>

</body>
</html>