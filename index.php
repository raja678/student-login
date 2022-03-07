<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
</head>
<body>
	
	Hello, <?php echo $user_data['user_name']; ?>
	<div style="font-size: 30px; margin: 20p; colour: white;"><h1>YOUR DATA HAS BEEN SUCCESSFULLY REGISTERED</h1></div>
	</h3>GOODLUCK</h3>
	<br>
	<a href="logout.php">Logout</a>
</body>
</html>