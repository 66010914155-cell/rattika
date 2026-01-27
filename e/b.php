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
<title>ใบสมัครงานออนไลน์</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">

<style>
body{
    font-family: 'Kanit', sans-serif;
    background:#e9ecef;
}
.form-card{
    max-width:800px;
    margin:40px auto;
    border-radius:15px;
    box-shadow:0 15px 25px rgba(0,0,0,.1);
}
.header-bg{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    color:#fff;
    padding:30px;
}
.section-title{
    color:#1e3c72;
    border-bottom:2px solid #dee2e6;
    margin-bottom:20px;
}
</style>
</head>

<body>

<div class="container mb-5">
<div class="card form-card">
<div class="header-bg text-center">
    <h2><i class="bi bi-briefcase-fill"></i> ใบสมัครงานออนไลน์</h2>
    <p class="opacity-75">กรุณากรอกข้อมูลให้ครบถ้วน</p>
</div>

<div class="card-body p-4 p-md-5">

<form method="post">

<!-- =================== ข้อมูลส่วนตัว =================== -->
<h5 class="section-title"><i class="bi bi-person-fill"></i> ข้อมูลส่วนตัว</h5>

<div class="mb-3">
    <label class="form-label">ชื่อ-นามสกุล *</label>
    <input type="text" name="a_name" class="form-control" required>
</div>

<div class="mb-3">
    <label class="form-label">วันเดือนปีเกิด</label>
    <input type="date" name="a_bird" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">ที่อยู่</label>
    <textarea name="a_mailingaddress" class="form-control" rows="2"></textarea>
</div>

<!-- =================== งานและเงินเดือน =================== -->
<h5 class="section-title mt-4"><i class="bi bi-building"></i> ตำแหน่งงาน</h5>

<div class="mb-3">
    <label class="form-label">ตำแหน่งที่สมัคร *</label>
    <select name="a_positionappliedfor" class="form-select" required>
        <option value="">-- เลือกตำแหน่ง --</option>
        <option value="Programmer">Programmer</option>
        <option value="Accounting">Accounting</option>
        <option value="HR">HR</option>
        <option value="Marketing">Marketing</option>
        <option value="Admin">Admin</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">วันที่เริ่มงานได้</label>
    <input type="date" name="a_startdateavailable" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">เงินเดือนที่คาดหวัง *</label>
    <input type="number" name="a_expectedsalary" class="form-control" required>
</div>

<div class="d-flex justify-content-end gap-2 mt-4">
    <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
    <button type="submit" name="Submit" class="btn btn-primary px-5">
        <i class="bi bi-send-fill"></i> ส่งใบสมัคร
    </button>
</div>

</form>

<?php
// =======================
// บันทึกข้อมูลลงฐานข้อมูล
// =======================
if(isset($_POST['Submit'])){

    $a_name  = $_POST['a_name'];
    $a_bird  = $_POST['a_bird'];
    $a_mailingaddress = $_POST['a_mailingaddress'];
    $a_positionappliedfor = $_POST['a_positionappliedfor'];
    $a_startdateavailable = $_POST['a_startdateavailable'];
    $a_expectedsalary = $_POST['a_expectedsalary'];

    $sql = "INSERT INTO application
    (a_name, a_bird, a_mailingaddress, a_positionappliedfor, a_startdateavailable, a_expectedsalary)
    VALUES
    ('$a_name','$a_bird','$a_mailingaddress','$a_positionappliedfor','$a_startdateavailable','$a_expectedsalary')";

    if(mysqli_query($conn,$sql)){
        echo "<div class='alert alert-success mt-4'>
              <i class='bi bi-check-circle-fill'></i>
              บันทึกข้อมูลใบสมัครเรียบร้อย
              </div>";
    }else{
        echo "<div class='alert alert-danger mt-4'>
              เกิดข้อผิดพลาด
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
