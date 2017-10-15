<?php	
	
	//Database configuration
	define('DB_SERVER', "127.0.0.1");
	define('DB_USERNAME', "root");
	define('DB_PASSWORD', "");
	define('DB_DATABASE', "athletics");
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	
	if(!$db)
		{
			$conn_error = 'Database connection failed '.mysqli_connect_error();
			$title = 'Database connection error!';
	
			include_once 'NewLogin.php';
			exit();
		}
		else
		{
			return $db;
		}
	
?>