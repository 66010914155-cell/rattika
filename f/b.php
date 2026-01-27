<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัตติกา บุญจันทร์สุนี (พิม)</title>
</head>

<body>
<h1>รัตติกา บุญจันทร์สุนี (พิม)</h1>

<form method="post"action="">
กรอกตัวเลข <input type="number"name="a" autofocus required>
<button type="submit"name="Submit">OK</button> 
</form>
<hr>


<?php
if (isset($_POST['Submit'])) {
	
	$gender = $_POST['a'];
	
	if($gender == 1){
	echo"เพศชาย";
	}
	if($gender == 2){
	echo"เพศหญิง";
	}
	if($gender == 3){
	echo"LGBTQ";
	}
	else {
		echo "อื่นๆ";
		}

}
?>

</body>
</html>
