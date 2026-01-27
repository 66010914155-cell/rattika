<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>รัตติกา บุญจันทร์สุนี (พิม)</title>
</head>

<body>
<h1> รัตติกา บุญจันทร์สุนี (พิม)</h1>
<form method="post" action="">
กรอกตัวเลข<input type="text"  name="a" autofocus>
<button type="submit" name="Submit"> OK</button>

<hr>

<table border="1";
<tr>
	<th>Order ID</th>
    <th>สินค้า</th>
    <th>ประเภทสินค้า</th>
    <th>วันที่</th>
    <th>ประเทศ</th>
	<th>จำนวนเงิน</th>
     <th>รูปภาพสินค้า</th>
</tr>
<?php
	include_once("connectdb.php");
	@$kw = $_POST['a'];
	//$sql ="SELECT * FROM popsupermarket  
	//WHERE p_country = 'Sweden' 
	//AND p_category='Vegetables'
	//ORDER BY p_product_name ASC  " ;
	//$sql ="SELECT * FROM popsupermarket "  ;
	$sql ="SELECT * FROM popsupermarket WHERE p_product_name LIKE '%{$kw}%' OR p_category LIKE '%{$kw}%' ";
	$total = 0;
	$rs = mysqli_query($conn, $sql);
	while ($data = mysqli_fetch_array($rs)){
		$total += $data['p_amout'];
		
?>
<tr>
	<td><?php echo $data['p_order_id'];?></td>
    <td><?php echo $data['p_product_name'];?></td>
    <td><?php echo $data['p_category'];?></td>
    <td><?php echo $data['p_date'];?></td>
    <td><?php echo $data['p_country'];?></td>
    <td align="right"><?php echo number_format($data['p_amout'],0);?>
    </td>
    <td><img src ="<?php echo $data['p_product_name'];?>.jpg " width="100"></td>
<?php } ?>
</tr> 
	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><b><?php echo number_format($total,0);?></b></td>
    <td>&nbsp;</td>
</tr>
</table>
</body>
</html>