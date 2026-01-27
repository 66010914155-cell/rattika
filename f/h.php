<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัตติกา บุญจันทร์สุนี (พิม)</title>
</head>

<body>
<form method="post"action="">
รหัสนิสิต <input type="number"name="a"autofocus required>
<button type="submit"name="Submit">OK</button> 
</form>

<?php
if (isset($_POST['Submit'])) {

    $id = $_POST['a'];
	$y = substr($id,0,2);
	echo "<img src='http://202.28.32.210/picture/{$y}/{$id}.jpg'width='400'>";

}
?>
</body>
</html>
