<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Please enter some valid information!";
		}else
		{
			echo "Please enter some valid information!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="box">

<img src="user.png" class="user">

		<form method="post">
			<div style="font-size: 30px;margin: 20px">Login</div>

            <p>Username</p>
			<input id="text" type="text" name="user_name" required=""><br><br>
			<p>Password</p>
			<input id="text" type="password" name="password" required=""><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>