<?php
//set true if production environment else false for development
define('IS_ENV_PRODUCTION', false);
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', !IS_ENV_PRODUCTION);
@ini_set('memory_limit', '48M');
@set_time_limit(3600);
date_default_timezone_set('America/New_York');
$config['db_host'] = 'localhost';
$config['db_user'] = 'root';
$config['db_password'] = '';
$config['db_name'] = '2016_video';
$con = mysql_connect($config['db_host'], $config['db_user'], $config['db_password']);
if (!$con) {
    die('Error : Unable to connect to the database server.');
}
if (!mysql_select_db($config['db_name'])) {
    mysql_close();
    die('Error : Unable to select database schema');
}
$_SESSION['siteName'] = "http://" . $_SERVER['HTTP_HOST'] . "/video/";
?>