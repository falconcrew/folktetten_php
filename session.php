<?php
	// Establishing Connection with Server by passing server_name, user_id and password as a parameter
	define('DB_HOST', 'localhost'); 
	define('DB_NAME', 'folktetten'); 
	define('DB_USER','admin'); 
	define('DB_PASSWORD','folkpass'); 
	$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
	// Selecting Database
	$db = mysql_select_db(DB_NAME,$connection); 
	session_start();// Starting Session
	// Storing Session
	$user_check=$_SESSION['login_user'];
	// SQL Query To Fetch Complete Information Of User
	$query = mysql_query("select user_name from User where user_name='$user_check'", $connection);
	//$row = mysql_fetch_assoc($ses_sql);
	$rows = mysql_num_rows($query);
	//echo $rows;
	//$login_session = $row['user_name'];
	//echo $login_session;
	if(!isset($rows)){
		mysql_close($connection); // Closing Connection
		#header('Location: index.php'); // Redirecting To Home Page
	}
?>