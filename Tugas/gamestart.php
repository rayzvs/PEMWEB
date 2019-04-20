<?php
	$user = empty($_POST['nama'])? "" : $_POST['nama'];
	$val = [$user,0,date("d/m/Y")];
	setcookie("Game_Angka",json_encode($val),time()+(86400*7)), "/game%20angka");
	echo "<h3>Profil User anda akan di hapus dalam 1 minggu</h3>";
?>
<idv id="countdown"><h3>game akan dimulai dalam 5 detik</h3></div>
<script>
	var time = 5;
	window.setInterval(function()
	{
		if(time > 0)
		{
			time--;
			document.getElementById("countdown").innerHTML="<h3>game akan mulai dalam "+time+"</h3>";
		}
		else
		{
			window.location.replace(game.php)
		}
	},1000;
</script>
	