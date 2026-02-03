<?php include_once("../check_login.php"); ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Kanit', sans-serif; margin: 0; background-color: #f8f9fa; display: flex; flex-direction: column; height: 100vh; }
        .navbar { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 15px 30px; color: white; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 12px rgba(0,0,0,0.1); }
        .logout-btn { background: #ff4757; color: white; padding: 8px 18px; text-decoration: none; border-radius: 50px; font-weight: bold; transition: 0.3s; }
        .logout-btn:hover { background: #ff6b81; transform: scale(1.05); }
        .main-container { display: flex; flex: 1; padding: 25px; gap: 25px; }
        .sidebar { width: 250px; background: white; border-radius: 15px; padding: 20px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); }
        .sidebar ul { list-style: none; padding: 0; }
        .sidebar a { display: block; padding: 15px; color: #555; text-decoration: none; border-radius: 12px; margin-bottom: 8px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #764ba2; color: white; transform: translateX(5px); }
        .sidebar i { margin-right: 10px; width: 20px; }
        .content-area { flex: 1; background: white; padding: 40px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .welcome-box { border-left: 8px solid #764ba2; padding-left: 20px; margin-bottom: 30px; }
        .stat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; }
        .stat-card { background: #f0f2ff; padding: 25px; border-radius: 15px; text-align: center; border-bottom: 4px solid #764ba2; }
    </style>
</head>
<body>

    <nav class="navbar">
        <h2><i class="fas fa-chart-line"></i> ADMIN PANEL</h2>
        <div class="user-section">
            <span>ยินดีต้อนรับ: <strong><?php echo $_SESSION['a_name']; ?></strong></span>
            <a href="../logout.php" class="logout-btn" onclick="return confirm('คุณต้องการออกจากระบบใช่หรือไม่?')">Logout</a>
        </div>
    </nav>

    <div class="main-container">
        <aside class="sidebar">
    <ul>
        <li><a href="../index2.php"><i class="fas fa-home"></i> หน้าหลัก</a></li>
        <li><a href="../products.php"><i class="fas fa-box"></i> จัดการสินค้า</a></li>
        <li><a href="../orders.php"><i class="fas fa-shopping-cart"></i> จัดการออเดอร์</a></li>
        <li><a href="../customers.php"><i class="fas fa-users"></i> จัดการลูกค้า</a></li>
    </ul>
</aside>

        <main class="content-area">
            <div class="welcome-box">
                <h1>สวัสดี, <?php echo $_SESSION['a_name']; ?> 👋</h1>
                <p>เลือกเมนูด้านซ้ายเพื่อเริ่มต้นจัดการระบบของคุณ</p>
            </div>

            <div class="stat-grid">
                <div class="stat-card"><i class="fas fa-box fa-2x"></i> <h3>สินค้า</h3><span>15 รายการ</span></div>
                <div class="stat-card"><i class="fas fa-shopping-bag fa-2x"></i> <h3>ออเดอร์</h3><span>8 รายการ</span></div>
                <div class="stat-card"><i class="fas fa-users fa-2x"></i> <h3>ลูกค้า</h3><span>1,250 คน</span></div>
            </div>
        </main>
    </div>

</body>
</html>