<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รายการสินค้า - รัตติกา บุญจันทร์สุนี</title>
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

<style>
    body {
        font-family: 'Kanit', sans-serif;
        background-color: #f4f7f6;
        margin: 0;
        padding: 40px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 25px;
        font-weight: 500;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 10px;
    }

    th {
        background-color: #6c5ce7;
        color: white;
        text-align: left;
        padding: 15px;
        font-weight: 400;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid #eee;
        color: #636e72;
    }

    tr:last-child td {
        border-bottom: none;
    }

    tr:hover {
        background-color: #f9f9ff;
        transition: 0.3s;
    }

    /* ตกแต่งปุ่มสถานะ */
    .status-badge {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.85em;
        background: #e1ffed;
        color: #27ae60;
        font-weight: 500;
    }

    .price-tag {
        font-weight: 500;
        color: #e67e22;
    }

    .text-center { text-align: center; }
</style>
</head>

<body>

<div class="container">
    <h2><span style="border-bottom: 3px solid #6c5ce7; padding-bottom: 5px;">📦 รายการสินค้าคงคลัง</span></h2>

    <table>
        <thead>
            <tr>
                <th class="text-center" width="15%">รหัส</th>
                <th>ชื่อรายการสินค้า</th>
                <th class="text-center">ราคา/หน่วย</th>
                <th class="text-center">สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><b>#P001</b></td>
                <td>MacBook Air M2 (Space Gray)</td>
                <td class="text-center price-tag">39,900.-</td>
                <td class="text-center"><span class="status-badge">พร้อมส่ง</span></td>
            </tr>
            <tr>
                <td class="text-center"><b>#P002</b></td>
                <td>iPad Pro 11-inch</td>
                <td class="text-center price-tag">32,900.-</td>
                <td class="text-center"><span class="status-badge">พร้อมส่ง</span></td>
            </tr>
            <tr>
                <td class="text-center"><b>#P003</b></td>
                <td>Magic Mouse 2</td>
                <td class="text-center price-tag">2,490.-</td>
                <td class="text-center"><span class="status-badge">พร้อมส่ง</span></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>