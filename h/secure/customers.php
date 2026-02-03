<?php
// ไฟล์ check_login.php ต้องมี session_start() เพื่อป้องกัน Error
include_once("../check_login.php"); 
include_once("../connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Management - Backend</title>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Kanit', sans-serif; background-color: #f8f9fa; margin: 0; display: flex; }
        
        /* Sidebar เมนูสีเขียวสดใส */
        .sidebar { width: 260px; background: #fff; height: 100vh; box-shadow: 2px 0 10px rgba(0,0,0,0.1); position: fixed; }
        .sidebar-header { padding: 25px; text-align: center; background: linear-gradient(135deg, #00b09b, #96c93d); color: white; }
        .sidebar ul { list-style: none; padding: 0; margin-top: 15px; }
        .sidebar ul a { text-decoration: none; color: #444; display: flex; align-items: center; padding: 15px 25px; transition: 0.3s; border-left: 4px solid transparent; }
        .sidebar ul a:hover { background: #f0fff4; color: #00b09b; border-left-color: #00b09b; }
        .sidebar ul a i { margin-right: 15px; width: 20px; font-size: 1.1rem; }
        .active { background: #f0fff4; color: #00b09b !important; border-left-color: #00b09b !important; font-weight: 600; }

        /* Main Content */
        .main-content { margin-left: 260px; flex: 1; padding: 40px; }
        .header-box { background: white; padding: 25px; border-radius: 20px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .header-box h1 { margin: 0; font-size: 1.6rem; color: #2d3436; }
        
        /* Table Style */
        .data-table { width: 100%; background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-collapse: collapse; }
        .data-table th { background: #00b09b; color: white; padding: 18px; text-align: left; }
        .data-table td { padding: 18px; border-bottom: 1px solid #eee; color: #636e72; }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <h2>ADMIN PANEL</h2>
        </div>
        <ul>
            <a href="../index2.php"><i class="fas fa-home"></i> Dashboard</a>
            <a href="../products.php"><i class="fas fa-box"></i> Manage Products</a>
            <a href="../orders.php"><i class="fas fa-shopping-cart"></i> Manage Orders</a>
            <a href="../customers.php" class="active"><i class="fas fa-users"></i> Customers</a>
            <a href="../logout.php" style="color: #e17055;"><i class="fas fa-power-off"></i> Logout</a>
        </ul>
    </div>

    <main class="main-content">
        <div class="header-box">
            <h1><i class="fas fa-user-friends"></i> จัดการลูกค้า</h1>
            <span>Admin: <strong><?php echo $_SESSION['a_name']; ?></strong></span> 
        </div>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>คุณมานะ ขยันเรียน</td>
                    <td>mana@example.com</td>
                    <td>081-234-5678</td>
                    <td><a href="#" style="color: #0984e3;">Edit</a> | <a href="#" style="color: #d63031;">Delete</a></td>
                </tr>
            </tbody>
        </table>
    </main>

</body>
</html>