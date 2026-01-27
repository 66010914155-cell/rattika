<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบจัดการข้อมูล Pop Supermarket</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    
    <style>
        body {
            font-family: 'Mitr', sans-serif;
            background-color: #f4f7f6; /* สีพื้นหลังอ่อนๆ */
            color: #444;
        }
        .header-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); /* ไล่เฉดสีม่วง-น้ำเงิน */
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .table thead {
            background-color: #764ba2;
            color: white;
        }
        .img-product {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #eee;
            transition: transform 0.2s;
        }
        .img-product:hover {
            transform: scale(1.5); /* ซูมรูปเมื่อเอาเมาส์ไปวาง */
        }
        .badge-category {
            background: #e0e7ff;
            color: #4338ca;
            padding: 5px 10px;
            border-radius: 8px;
            font-size: 0.85em;
        }
        .total-row {
            background-color: #fdf2f2 !important;
            color: #d32f2f;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

<div class="header-section text-center">
    <h1 class="fw-bold">🛒 Pop Supermarket Data Center</h1>
    <p>ผู้จัดการระบบ: <span class="badge bg-warning text-dark">รัตติกา บุญจันทร์สุนี (พิม)</span></p>
</div>

<div class="container mb-5">
    <div class="card p-4">
        <table id="myTable" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ชื่อสินค้า</th>
                    <th>หมวดหมู่</th>
                    <th>วันที่บันทึก</th>
                    <th>ประเทศ</th>
                    <th class="text-end">จำนวนเงิน</th>
                    <th class="text-center">รูปภาพ</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include_once("connectdb.php");
                $sql = "SELECT * FROM popsupermarket";
                $total = 0;
                $rs = mysqli_query($conn, $sql);
                
                while ($data = mysqli_fetch_array($rs)) {
                    $total += $data['p_amout'];
            ?>
                <tr>
                    <td><strong>#<?php echo $data['p_order_id']; ?></strong></td>
                    <td><span class="fw-bold text-primary"><?php echo $data['p_product_name']; ?></span></td>
                    <td><span class="badge-category"><?php echo $data['p_category']; ?></span></td>
                    <td><small class="text-muted"><?php echo date('d/m/Y', strtotime($data['p_date'])); ?></small></td>
                    <td>🌍 <?php echo $data['p_country']; ?></td>
                    <td class="text-end fw-bold"><?php echo number_format($data['p_amout'], 0); ?></td>
                    <td class="text-center">
                        <img src="<?php echo $data['p_product_name']; ?>.jpg" 
                             class="img-product" 
                             onerror="this.src='https://via.placeholder.com/50?text=None'">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
                <tr class="total-row">
                    <td colspan="5" class="text-end fw-bold">ยอดรวมสุทธิ:</td>
                    <td class="text-end fw-bold text-decoration-underline"><?php echo number_format($total, 0); ?></td>
                    <td class="text-center text-muted small">บาท</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.7/i18n/th.json"
            },
            "pageLength": 10,
            "responsive": true
        });
    });
</script>

</body>
</html>