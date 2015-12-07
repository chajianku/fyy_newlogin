<?php
/*
Plugin Name: 花式登录
Version: 1.2
Plugin URL: http://fyy.l19l.com
Description: 允许用户使用BDUSS登录
Author: FYY
Author Email:fyy@l19l.com
Author URL: http://fyy.l19l.com
For: V3.8+
*/
if (!defined('SYSTEM_ROOT')) { die('Insufficient Permissions'); } 

function fyy_newlogin_navi() {
	echo '<li ';
	if(isset($_GET['pub_plugin']) && $_GET['pub_plugin'] == 'fyy_newlogin') { echo 'class="active"'; }
	echo '><a href="index.php?pub_plugin=fyy_newlogin"><span class="glyphicon glyphicon-send"></span> 花式登录</a></li>';
}

addAction('navi_10','fyy_newlogin_navi');
addAction('navi_11','fyy_newlogin_navi');
?>