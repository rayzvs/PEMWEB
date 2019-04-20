<!DOCTYPE html>
<html>

<?php
	session_start();
	$userInfo = isset($_COOKIE['Game_Angka'])? json_decode($_COOKIE['Game_Angka']): "";
	if(empty($_SESSION['jawab']))
	{
		$_SESSION['nilai'] = 0;
		$_SESSION['nyawa'] = 5;
	}
	else
	{
		if(isset($_POST['jawab']))
		{
			if($_POST['jawab'] == $_SESSION['jawaban'])
			{
				$_SESSION['nilai'] = $_SESSION['nilai'] + 10;
			}
			else
			{
				$_SESSION['nilai'] = $_SESSION['nilai'] - 5;
				$_SESSION['nyawa']--;
			}
		}
	}
	if($_SESSION['nilai'] > $userInfo[1])
	{
		$userInfo[1] = $_SESSION['nilai'];
		$userInfo[2] = date("d/m/Y");
		setcookie("Game_Angka", json_encode($userInfo),time() + 86400*7,"/game%20angka");
	}
	else
	{
		$_SESSION['nilai'] = $_SESSION['nilai'] - 5;
		$_SESSION['nyawa']--;
	}
	$angka1 = rand(0,100);
	$angka2 = rand(0,100);
	$_SESSION['jawaban'] = $angka1 + $angka2;
?>
<head></head>
<body>
	<h1>Crazy Math</h1>
	<p>User		: <?php echo $userInfo[0];?></p>
    <p>Score	: <?php echo $_SESSION['nilai'];?></p>
    <p>Nyawa	: <?php for($i=1;$i<=$_SESSION['nyawa'];$i++) {echo "X";}?></p>
    <?php if($_SESSION['nyawa'] > 0)
		{?>
			<form method="POST" action=#>
				<table>
					<tr>
						<td align="center"><?php echo $angka1;?></td>
                    	<td>+</td>
                    	<td align="center"><?php echo $angka2;?></td>
                        <td><input type="text" name="jawab" autofocus/></td>
                    </tr>
                    <tr>
                    	<td colspan=4>
                        	<input type="submit" value="jawab"/>
                        </td>
                    </tr>
                </table>
             </form>
		<?php }
        else
        { echo "<h1>Gameover</h1>";}
        ?>
      	<a href="exit.php"<button>ulang game</button></a>
</body>
</html>