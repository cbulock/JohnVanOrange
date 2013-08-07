<?php
namespace JohnVanOrange\jvo;

require('twig.php');

$api = new API();

$username = $route->get_data(0);

$data = [
	'images'	=>	$api->call('user/uploaded',array('username'=>$username)),
	'title_text'	=>	'Uploaded Images'
];

require_once('common.php');

header("Content-type: text/html; charset=UTF-8");

$template = $twig->loadTemplate('thumbs.twig');
echo $template->render($data);