<?php
	session_start();
	$nilai = $_SESSION['nilai'];
	$userInfo = isset($_COOKIE['Game_Angka'])? json_decode($_COOKIE['Game_Angka'])	: "";
	$val = [$userInfo[0],$nilai,date("d/m/Y")];
	setcookie("Game_Angka",json_encode($val),time() + 86400*7,"/game%20angka");
	session_destroy();
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
?>