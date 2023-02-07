<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	exec('mysqldump --user=root --password=bybS8Yqq9lJkZMWgKlOYLhhcT --host=gosport_db_1 goport > db/bak/'.date('Y_m_d').'.sql');
?>