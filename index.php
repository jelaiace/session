<?php

session_start();

if ( !isset($_SESSION['login_id']) ) {
	header('Location: login.php');
	die();
}

$users = require 'users.php';

$id = $_SESSION['login_id'];

foreach($users as $user) {
	if ( $user['id'] == $id ) {
		$loggedUser = $user;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	Hello, <?php echo $loggedUser['username']; ?>

	<a href="logout.php">Logout</a>
</body>
</html>