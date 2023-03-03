<?php 
	// var_dump($_SERVER);
	header('Access-Control-Allow-Origin: *');  
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('Asia/Bangkok');
	ob_start();
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// echo $_SERVER['SERVER_NAME'];exit();
	// echo "อยู่ระหว่างการปรับปรุงระบบ";exit();
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		require_once($_SERVER['DOCUMENT_ROOT'].'/thaisport/config/domains/thaisport/config.php'); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/thaisport/lib/function/main_function.php');
		require_once($_SERVER['DOCUMENT_ROOT'].'/thaisport/public_html/catalog/setup.php'); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/thaisport/lib/system/loader/autoload.php'); 
	}else{
		require_once('/home/thaisport/domains/thaisport-stadium.com/config/domains/thaisport/config.php'); 
		require_once('/home/thaisport/domains/thaisport-stadium.com/lib/function/main_function.php');
		require_once('catalog/setup.php'); 
		require_once('/home/thaisport/domains/thaisport-stadium.com/lib/system/loader/autoload.php'); 
	}
?>