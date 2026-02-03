<?php
    session_start();
    include_once("connectdb.php");
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - รัตติกา</title>
    <style>
        /* ตั้งค่าพื้นหลังแบบไล่สี Vibrant Gradient */
        body { 
            font-family: 'Kanit', sans-serif; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
        }

        /* การ์ด Login แบบกระจกใส (Glassmorphism) */
        .login-card { 
            background: rgba(255, 255, 255, 0.95); 
            padding: 2.5rem; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.2); 
            width: 380px; 
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
        }

        h1 { 
            font-size: 1.8rem; 
            color: #4a148c; 
            margin-bottom: 1.5rem; 
            font-weight: 600;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #666;
            font-size: 0.9rem;
            margin-left: 5px;
        }

        /* ปรับแต่งช่องกรอกข้อมูล */
        input { 
            width: 100%; 
            padding: 12px 15px; 
            margin-bottom: 20px; 
            border: 2px solid #eee; 
            border-radius: 12px; 
            box-sizing: border-box; 
            outline: none;
            transition: 0.3s;
            font-size: 1rem;
        }

        input:focus { 
            border-color: #764ba2; 
            box-shadow: 0 0 8px rgba(118, 75, 162, 0.2);
        }

        /* ปุ่ม Login แบบมีสีสันและเงา */
        button { 
            width: 100%; 
            padding: 12px; 
            background: linear-gradient(to right, #6a11cb 0%, #2575fc 100%); 
            color: white; 
            border: none; 
            border-radius: 12px; 
            cursor: pointer; 
            font-size: 1.1rem; 
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(37, 117, 252, 0.4);
            transition: 0.3s; 
        }

        button:hover { 
            filter: brightness(1.1);
            box-shadow: 0 6px 20px rgba(37, 117, 252, 0.6);
            transform: scale(1.02);
        }

        .footer { 
            text-align: center; 
            font-size: 0.85rem; 
            color: #aaa; 
            margin-top: 2rem; 
            border-top: 1px solid #eee;
            padding-top: 1rem;
        }

        /* ตกแต่ง Alert */
        .error-msg { color: #ff4d4d; font-size: 0.9rem; margin-bottom: 1rem; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-card">
    <h1>ADMIN LOGIN</h1>
    <form method="post" action="">
        <label>ชื่อผู้ใช้งาน (Username)</label>
        <input type="text" name="auser" placeholder="Enter your username" autofocus required>
        
        <label>รหัสผ่าน (Password)</label>
        <input type="password" name="apwd" placeholder="Enter your password" required>
        
        <button type="submit" name="Submit">เข้าสู่ระบบ</button>
    </form>
    
    <div class="footer">
        <strong>รัตติกา บุญจันทร์สุนี (พิม)</strong><br>
        Backend Management System
    </div>

    <?php
    if(isset($_POST['Submit'])) {
        // กรองข้อมูลเพื่อความปลอดภัย
        $user = mysqli_real_escape_string($conn, $_POST['auser']);
        $pwd  = mysqli_real_escape_string($conn, $_POST['apwd']);

        // SQL: ใช้ a_ussernam (ไม่มี e) ตามโครงสร้างในฐานข้อมูล
        $sql = "SELECT * FROM admin WHERE a_ussernam='{$user}' AND a_password='{$pwd}' LIMIT 1";
        $rs = mysqli_query($conn, $sql);
        
        if ($rs && mysqli_num_rows($rs) == 1) {
            $data = mysqli_fetch_array($rs);
            $_SESSION['a_id'] = $data['a_id'];
            $_SESSION['a_name'] = $data['a_name'];
            
            echo "<script>window.location='index2.php';</script>";
        } else {
            echo "<script>alert('ขออภัย! ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        }
    }
    ?>
</div>

</body>
</html>