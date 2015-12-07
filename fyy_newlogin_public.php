<?php if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); }
//index.php?pub_plugin=fyy_newlogin&bduss=xxxxxx
if (isset($_REQUEST['bduss'])){
	global $m;
	$bduss = str_replace('"', '', $_REQUEST['bduss']);
	$bduss = str_ireplace('bduss=', '', $bduss);
	$baiduid = getBaiduID($bduss);
	if(!empty($baiduid)){
		$uid = $m->once_fetch_array("SELECT `uid` FROM  `".DB_NAME."`.`".DB_PREFIX."baiduid` WHERE `name` = '{$baiduid}'");
		if(!empty($uid)){
			$uid = $uid['uid'];
			$p = $m->once_fetch_array("SELECT * FROM  `".DB_NAME."`.`".DB_PREFIX."users` WHERE `id` = '{$uid}'");
		}
		else msg ('无相应绑定信息，请尝试使用其他方式登陆');
	}
	else msg ('您输入的bduss有误');
	$cktime = (int) option::get('cktime');
	setcookie("wmzz_tc_user",$p['name'], time() + $cktime);
	setcookie("wmzz_tc_pw",$p['pw'], time() + $cktime);
	ReDirect('index.php');
}
loadhead();
?>
<div class="panel panel-success" style="margin:5% 15% 5% 15%;">
	<div class="panel-heading">
		<h3 class="panel-title">花式登录</h3>
	</div>   
	<div style="margin:0% 5% 5% 5%;"><br/>
		<form name="form" method="post" action="<?php echo SYSTEM_URL; ?>index.php?pub_plugin=fyy_newlogin&">
			<div class="input-group">
				<span class="input-group-addon">BDUSS</span>
				<input type="text" class="form-control" name="bduss" id="bduss" placeholder="登录百度账号后，点击Get it可以获取BDUSS信息"/>
				</div><br/>
				<div class="btn-group" role="group" style="width:100%">
					<button type="submit" class="btn btn-primary" style="width:100%">Login!</button>
				</div><br/>
		</form>
		<p>插件作者：<a href="http://fyy.l19l.com/">FYY</a> // 程序作者：<a href="http://zhizhe8.net">无名智者</a> & <a href="http://www.longtings.com/">mokeyjay</a></p>
    </div>
</div>
