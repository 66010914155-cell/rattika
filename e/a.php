<?php
// =======================
// เชื่อมต่อฐานข้อมูล
// =======================
$conn = mysqli_connect("localhost","root","","4155db");
$conn->set_charset("utf8");

if(!$conn){
    die("เชื่อมต่อฐานข้อมูลไม่ได้");
}
?>

<!doctype html>
<html lang="th">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>รัตติกา บุญจันทร์สุนี (พิม)</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Kanit',sans-serif;
    background:#f8f9fa;
}
.main-card{
    max-width:700px;
    margin:50px auto;
    border-radius:15px;
    box-shadow:0 10px 20px rgba(0,0,0,.1);
}
.header-bg{
    background:linear-gradient(135deg,#0d6efd,#0dcaf0);
    color:#fff;
}
.color-dot{
    width:25px;
    height:25px;
    border-radius:50%;
    display:inline-block;
    border:2px solid #fff;
}
</style>
</head>

<body>

<div class="container">

<div class="card main-card">
<div class="card-header header-bg text-center py-4">
    <h2 class="mb-0 fw-bold">รัตติกา บุญจันทร์สุนี (พิม)</h2>
</div>

<div class="card-body p-4 p-md-5">

<form method="post">

<div class="mb-3">
    <label class="form-label fw-bold">ชื่อ-สกุล *</label>
    <input type="text" name="fullname" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label fw-bold">เบอร์โทร *</label>
    <input type="text" name="phone" class="form-control" required>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">เงินเดือน *</label>
        <div class="input-group">
            <input type="number" name="saraly" class="form-control" required>
            <span class="input-group-text">บาท</span>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">ความสูง *</label>
        <div class="input-group">
            <input type="number" name="height" class="form-control" required>
            <span class="input-group-text">ซม.</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">สีที่ชอบ</label>
        <input type="color" name="color" class="form-control form-control-color w-100">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">สาขาวิชา</label>
        <select name="major" class="form-select">
            <option value="การบัญชี">การบัญชี</option>
            <option value="การจัดการ">การจัดการ</option>
            <option value="การตลาด">การตลาด</option>
            <option value="การคอมพิวเตอร์ธุรกิจ">การคอมพิวเตอร์ธุรกิจ</option>
            <option value="การตลก">การตลก</option>
        </select>
    </div>
</div>

<div class="text-center mt-4">
    <button type="submit" name="Submit" class="btn btn-success px-4">
        สมัครสมาชิก
    </button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</div>

</form>

<?php
// =======================
// บันทึกข้อมูลลง DB
// =======================
if(isset($_POST['Submit'])){

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $saraly = $_POST['saraly'];
    $height = $_POST['height'];
    $color = $_POST['color'];
    $major = $_POST['major'];

    $sql = "INSERT INTO register
    (r_name, r_phone, r_salary, r_height, r_color, r_field)
    VALUES
    ('$fullname','$phone','$saraly','$height','$color','$major')";

    if(mysqli_query($conn,$sql)){
        echo "<div class='alert alert-success mt-4'>
              ✔ สมัครสมาชิกเรียบร้อย
              </div>";
    }else{
        echo "<div class='alert alert-danger mt-4'>
              ❌ เกิดข้อผิดพลาด
              </div>";
    }
}
?>

</div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
