<?php
require_once('settings.inc');
require_once('common/smarty.php');
require_once('common/api.class.php');

$api = new API;

$template = 'display.tpl';

$result = $api->getImage(array('image'=>$_GET['image']));

//TODO: check to make sure there is a result

$tpl->assign('image', WEB_ROOT.'media/'.$result['filename']);
$tpl->assign('image_name', $result['filename']);
$tpl->assign('web_root',WEB_ROOT);
$tpl->assign('type',$result['type']);
$tpl->assign('width',$result['width']);
$tpl->assign('height',$result['height']);

if ($_COOKIE['theme']) {
 $tpl->assign('theme',$_COOKIE['theme']);
}
else {
 $tpl->assign('theme','light');
}

$tpl->assign('brazzify',FALSE);
if (isset($_GET['brazzify'])) $tpl->assign('brazzify',TRUE);

$tpl->display($template);
