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

    $score = $_POST['a'];
    $color = "black"; 

    if ($score >= 80) {
        $grade = "A";
        $color = "green";
    } else if ($score >= 70) {
        $grade = "B";
        $color = "purple";
    } else if ($score >= 60) {
        $grade = "C";
        $color = "orange";
    } else if ($score >= 50) {
        $grade = "D";
        $color = "brown";
    } else {
        $grade = "F";
        $color = "red";
    }
    echo "คุณได้คะแนน 
    <span style='color:blue; font-weight:bold;'>$score</span> 
    ได้เกรด 
    <span style='color:$color; font-weight:bold;'>$grade</span>";
}
?>


</body>
</html>
