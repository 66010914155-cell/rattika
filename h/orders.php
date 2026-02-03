<?php
// ไฟล์นี้ต้องมี session_start() อยู่ข้างในเพื่อไม่ให้เกิด Error Undefined array key
include_once("check_login.php"); 
include_once("connectdb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f0f2f5; margin: 0; display: flex; }
        
        /* Sidebar Menu */
        .sidebar { width: 250px; background: #fff; height: 100vh; box-shadow: 2px 0 10px rgba(0,0,0,0.05); position: fixed; }
        .sidebar-header { padding: 20px; text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .sidebar ul { list-style: none; padding: 0; margin-top: 20px; }
        .sidebar ul a { text-decoration: none; color: #555; display: flex; align-items: center; padding: 15px 25px; transition: 0.3s; }
        .sidebar ul a:hover { background: #f0f2ff; color: #764ba2; }
        .sidebar ul a i { margin-right: 15px; width: 20px; }
        .active { background: #f0f2ff; color: #764ba2 !important; border-left: 5px solid #764ba2; }

        /* Main Content */
        .main-content { margin-left: 250px; flex: 1; padding: 30px; }
        .header-box { background: white; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .header-box h1 { margin: 0; font-size: 1.5rem; color: #333; }
        
        /* Table Style */
        .order-table { width: 100%; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-collapse: collapse; }
        .order-table th { background: #764ba2; color: white; padding: 15px; text-align: left; }
        .order-table td { padding: 15px; border-bottom: 1px solid #eee; }
        .status-badge { padding: 5px 12px; border-radius: 50px; font-size: 0.8rem; background: #fff3cd; color: #856404; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h3>ADMIN PANEL</h3>
        </div>
        <ul>
            <a href="index2.php"><i class="fas fa-home"></i> หน้าหลักแอดมิน</a>
            <a href="products.php"><i class="fas fa-box"></i> จัดการสินค้า</a>
            <a href="orders.php" class="active"><i class="fas fa-shopping-cart"></i> จัดการออเดอร์</a>
            <a href="customers.php"><i class="fas fa-users"></i> จัดการลูกค้า</a>
            <a href="logout.php" style="color: #ff4757;"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
        </ul>
    </div>

    <div class="main-content">
        <div class="header-box">
            <h1><i class="fas fa-receipt"></i> จัดการออเดอร์ (Order Management)</h1>
            <span>ยินดีต้อนรับ: <strong><?php echo $_SESSION['a_name']; ?></strong></span> 
        </div>

        <table class="order-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#ORD-001</td>
                    <td>คุณสมชาย ใจดี</td>
                    <td>03 Feb 2026</td>
                    <td>฿1,250.00</td>
                    <td><span class="status-badge">รอดำเนินการ</span></td>
                    <td><a href="#" style="color:#764ba2; text-decoration:none;">รายละเอียด</a></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>