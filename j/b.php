<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>รัตติกา บุญจันทร์สุนี (พิม)</title>
</head>
<body>
    <h1> รัตติกา บุญจันทร์สุนี (พิม) </h1>

    <form method="post" action="" enctype="multipart/form-data">
        ชื่อจังหวัด <input type="text" name="pname" autofocus required><br>
        รูปภาพ <input type="file" name="pimage" required><br>
        ชื่อภาค
        <select name="rid">
            <?php
            include_once("connectdb.php");
            $sql3 = "SELECT * FROM regions ORDER BY r_id ASC";
            $rs3 = mysqli_query($conn, $sql3);
            while($data3 = mysqli_fetch_array($rs3)){
                echo "<option value='{$data3['r_id']}'>{$data3['r_name']}</option>";
            }
            ?>
        </select><br><br>
        <button type="submit" name="Submit">บันทึก</button>
    </form>

    <br><hr><br>

    <?php 
    if(isset($_POST['Submit'])){
        include_once("connectdb.php");

        $pname = $_POST['pname'];
        $rid = $_POST['rid'];
        
        // จัดการเรื่องนามสกุลไฟล์
        $filename = $_FILES['pimage']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        // คำสั่ง SQL แบบระบุชื่อคอลัมน์ (ช่วยให้ไม่งงและลด Error)
        // ตรวจสอบชื่อคอลัมน์ใน DB ของคุณอีกครั้งว่าสะกดแบบนี้หรือไม่
        $sql2 = "INSERT INTO provinces (p_name, p_ext, r_id) VALUES ('$pname', '.$ext', '$rid')";
        
        if(mysqli_query($conn, $sql2)){
            $pic_id = mysqli_insert_id($conn);
            // ตรวจสอบว่ามีโฟลเดอร์ชื่อ img หรือยัง
            if(!is_dir("img")){
                mkdir("img");
            }
            move_uploaded_file($_FILES['pimage']['tmp_name'], "img/".$pic_id.".".$ext);
            echo "<script>alert('บันทึกข้อมูลสำเร็จ'); window.location='b.php';</script>";
        } else {
            // ถ้า insert ไม่ได้ จะแสดง error จากระบบออกมาตรงๆ
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>

    <table border="1" width="80%">
        <tr>
            <th>รหัส</th>
            <th>ชื่อจังหวัด</th>
            <th>รูปภาพ</th>
            <th>ภาค</th>
            <th>จัดการ</th>
        </tr>

        <?php
        $sql = "SELECT * FROM provinces AS p 
                INNER JOIN regions AS r ON p.r_id = r.r_id 
                ORDER BY p.p_id DESC"; // เรียงจากใหม่ไปเก่า
        $rs = mysqli_query($conn, $sql);
        
        while($data = mysqli_fetch_array($rs)){
            // ตรวจสอบจุดเชื่อมต่อนามสกุลไฟล์
            $image_path = "img/" . $data['p_id'] . $data['p_ext'];
        ?>
        <tr>
            <td><?php echo $data['p_id']; ?></td>
            <td><?php echo $data['p_name']; ?></td>
            <td align="center">
                <?php if(file_exists($image_path)){ ?>
                    <img src="<?php echo $image_path; ?>" width="100">
                <?php } else { echo "ไม่มีรูป"; } ?>
            </td>
            <td><?php echo $data['r_name']; ?></td>
            <td align="center">
                <a href="delete_provinces.php?id=<?php echo $data['p_id'];?>" 
                   onClick="return confirm('ยืนยันการลบ?');">ลบ</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>