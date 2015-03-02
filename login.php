<?php

session_start();

var_dump($_SESSION);


if(isset($_SESSION['login_id'])){
	header('Location: /index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$users = require 'users.php';

	$username = $_POST['username'];
	$password = $_POST['password'];

	foreach($users as $user) {
		if ( $username == $user['username'] && $password = $user['password'] ) {
			$_SESSION['login_id'] = $user['id']; 
			header('Location: /index.php');
			die();
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
	<div>
		<form method="POST">
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<button>submit</button>
		</form>
	</div>
</body>
</html>