<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ถ้าไม่มีการ Login ให้เด้งกลับไปหน้าแรกทันที
if (!isset($_SESSION['a_id'])) {
    header("Location: index.php");
    exit();
}
?>