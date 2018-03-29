<?php
header('Content-Type: text/html; charset=utf-8');

$dbhost = "taximurom.ru";
$dbuser = "taximurom";
$dbpswd = "taximurom2009";
$dbname = "taximurom";
$db = mysql_pconnect($dbhost, $dbuser, $dbpswd) or die("1" . mysql_error());
mysql_query("set character_set_results='utf8'") or die("2" . mysql_error());
mysql_query("set collation_connection='utf8_general_ci'") or die("3" . mysql_error());
mysql_query("SET NAMES 'utf8'") or die("4" . mysql_error());
mysql_select_db($dbname) or die("5" . mysql_error());

define('__DIR__', $_SERVER['DOCUMENT_ROOT']);
define('__ROUTE__', $_GET['route']);
define('SMARTY_DIR', __DIR__ . '/smarty/');
require(SMARTY_DIR . 'Smarty.class.php');
$smarty = new Smarty ();

$smarty->template_dir = __DIR__ . '/templates/default/tpl/';
$smarty->compile_dir = __DIR__ . '/cache/';


require __DIR__ . "/modules/core.php";