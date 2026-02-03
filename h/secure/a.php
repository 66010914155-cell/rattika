<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัตติกา บุญจันทร์สุนี(พิม)</title>
</head>

<body>
<h1>a.php</h1>

<?php
	$_SESSION['name'] = "รัตติกา บุญจันทร์สุนี";
	$_SESSION['nickname'] = "พิม";
	
	echo $_SESSION ['name']."<br>";
	echo $_SESSION ['nickname']."<br>";
?>
</body>
</html>
