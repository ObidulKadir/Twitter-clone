<?php
		
		session_start();
		require_once('dbconnect.php');

		if (isset($_SESSION['user'])) {
			header('location: home.php');

		}
		if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
			# code...
			$username = $_POST['username'];
			$password = hash('sha256', $_POST['password']);
			$result = $db->users->findOne(array('username'=>$username, 'password' => $password));
			if (!result) {
				# code...
			}else{
				$_SESSION['user'] = $result->_id;
				header("Location: home.php");
			}
		}

?>

<html>
	<head>
		<title>Twitter Clone</title>
	</head>
	<body>
		
		<form action="post" action="index.php">
			<fieldset>
				<label for="username">Username:</label>
				<input type="text" name="username">
				<label for="password">Password:</label>
				<input type="password" name="password">
				<input type="submit" value="login">
			</fieldset>
		</form>
		<a href="register.php">No account? Register here...</a>
	</body>
</html>