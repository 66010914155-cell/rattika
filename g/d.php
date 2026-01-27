<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>สรุปยอดขาย - รัตติกา บุญจันทร์สุนี (พิม)</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Sarabun', sans-serif; 
            background-color: #f4f7f6;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 90%;
            max-width: 900px;
        }
        h1, h3 { text-align: center; color: #333; }
        .chart-container { 
            position: relative; 
            margin: auto; 
            height: 40vh; 
            width: 100%; 
            margin-bottom: 30px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px;
            background-color: #fff;
        }
        th, td { 
            padding: 12px; 
            border: 1px solid #ddd; 
            text-align: center; 
        }
        th { background-color: #5d6d7e; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .total-row { background-color: #FFFFCC; font-weight: bold; }
    </style>
</head>

<body>

<div class="container">
    <h1>รัตติกา บุญจันทร์สุนี (พิม)</h1>
    <h3>รายงานยอดขายแยกตามประเทศ</h3>

    <?php
        include_once("connectdb.php");
        
        // Query ข้อมูล
        $sql = "SELECT p_country, SUM(p_amount) AS total FROM popsupermarket GROUP BY p_country";
        $rs = mysqli_query($conn, $sql);

        // เตรียมตัวแปร Array สำหรับใช้งาน
        $countrie = 0;
        $total = 0;
        $grand_total = 0;

        while ($data = mysqli_fetch_array($rs)) {
            $countries[] = $data['p_country']; 
            $totals[] = (float)$data['total'];
            $grand_total += $data['total'];
        }
    ?>

    <div class="chart-container">
        <canvas id="myChart"></canvas>
    </div>

    <table>
        <thead>
            <tr>
                <th>ประเทศ</th>
                <th>ยอดขาย (บาท)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($countries as $index => $name) { ?>
            <tr>
                <td><?php echo $name; ?></td>
                <td align="right"><?php echo number_format($totals[$index], 2); ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr class="total-row">
                <td>รวมทั้งสิ้น</td>
                <td align="right"><?php echo number_format($grand_total, 2); ?></td>
            </tr>
        </tfoot>
    </table>
</div>

<script>
    // ส่งข้อมูลจาก PHP ไปยัง JavaScript
    const labelData = <?php echo json_encode($countries); ?>;
    const valueData = <?php echo json_encode($totals); ?>;

    const ctx = document.getElementById('myChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // เปลี่ยนเป็น 'pie' หรือ 'doughnut' ได้ตามชอบ
        data: {
            labels: labelData,
            datasets: [{
                label: 'ยอดขายรวม',
                data: valueData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return value.toLocaleString() + ' บาท';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false // ปิด Legend เพราะมีแค่ Dataset เดียว
                }
            }
        }
    });
</script>

</body>
</html>