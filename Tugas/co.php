<?php

$username = $_POST['username'];
setcookie('username', $username, time()+3600);

if(isset($_COOKIE['username']))
{
	echo('username :' .$COOKIE['username']);
}
else
{
	$username = $POST['username'];
	setcookie('username', $username, time()+3600);
	header("Location: co.php");
}

?>