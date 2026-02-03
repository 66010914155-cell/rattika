<?php include_once("../check_login.php"); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>จัดการสินค้า - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* ใช้ Style เดียวกับ index2.php เพื่อความต่อเนื่อง */
        body { font-family: 'Kanit', sans-serif; margin: 0; background-color: #f8f9fa; display: flex; flex-direction: column; height: 100vh; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 30px; color: white; display: flex; justify-content: space-between; align-items: center; }
        .main-container { display: flex; flex: 1; padding: 25px; gap: 25px; }
        .sidebar { width: 250px; background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .sidebar a { display: block; padding: 15px; color: #555; text-decoration: none; border-radius: 12px; margin-bottom: 8px; }
        .sidebar a:hover { background: #764ba2; color: white; }
        .content-area { flex: 1; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #764ba2; color: white; }
    </style>
</head>
<body>
    <nav class="navbar">
        <h2>ADMIN DASHBOARD</h2>
        <a href="../logout.php" style="color:white; text-decoration:none;">Logout</a>
    </nav>
    <div class="main-container">
        <aside class="sidebar">
            <ul>
                <li><a href="../index2.php"><i class="fas fa-home"></i> หน้าหลัก</a></li>
                <li><a href="../products.php" style="background:#764ba2; color:white;"><i class="fas fa-box"></i> จัดการสินค้า</a></li>
                <li><a href="../orders.php"><i class="fas fa-shopping-cart"></i> จัดการออเดอร์</a></li>
                <li><a href="../customers.php"><i class="fas fa-users"></i> จัดการลูกค้า</a></li>
            </ul>
        </aside>
        <main class="content-area">
            <h1>รายการสินค้าทั้งหมด</h1>
            <table>
                <tr>
                    <th>รหัส</th><th>ชื่อสินค้า</th><th>ราคา</th><th>จัดการ</th>
                </tr>
                <tr>
                    <td>P001</td><td>ตัวอย่างสินค้า</td><td>1,000</td><td>แก้ไข | ลบ</td>
                </tr>
            </table>
        </main>
    </div>
</body>
</html>