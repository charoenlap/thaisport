<?php 
	header('Access-Control-Allow-Origin: *');  
	header('Content-Type: text/html; charset=utf-8');
	date_default_timezone_set('Asia/Bangkok');
	
	ini_set( 'upload_max_size' , '64M' );
    ini_set( 'post_max_size', '64M');
    ini_set( 'max_execution_time', '300' );

	ob_start();
	session_start();
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	if($_SERVER['SERVER_NAME'] == 'localhost'){
		require_once($_SERVER['DOCUMENT_ROOT'].'/_gosport/config/domains/gosport/config.php'); 
		require_once($_SERVER['DOCUMENT_ROOT'].'/_gosport/lib/function/main_function.php');
		require_once('catalog/setup.php'); 
	}else{
		require_once('/var/www/html/config/domains/gosport/config.php'); 
		require_once('/var/www/html/lib/function/main_function.php');
		require_once('/var/www/html/public_html/admin_back_office/catalog/setup.php'); 
		require_once('/var/www/html/lib/system/loader/autoload.php'); 
	}
?>