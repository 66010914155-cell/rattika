<?php
    session_start();
    session_destroy(); // ลบข้อมูลการ Login ทั้งหมด
    header("Location: index.php"); // กลับไปหน้า Login
    exit();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
