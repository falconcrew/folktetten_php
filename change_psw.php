<?php 
	session_start();	
	$error = '';

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
		}else{
		
		
		// Define $username and $password
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		define('DB_HOST', 'localhost'); 
		define('DB_NAME', 'folktetten'); 
		define('DB_USER','admin'); 
		define('DB_PASSWORD','folkpass'); 
		$connection = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
		// To protect MySQL injection for Security purpose		
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Selecting Database
		$db = mysql_select_db(DB_NAME,$connection); 
		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("UPDATE User set password = '$newPassword' WHERE password='$password' AND user_name='$username'", $connection);
		$rows = mysql_num_rows($query);
		
		if ($rows == 1) {
			$_SESSION['login_user'] = $username; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
		} else {
			$error = "<br>Username or Password is invalid";
		}
			mysql_close($connection); // Closing Connectio
		}	
	}
?>