<?php




use DB;
	session_start();

	if (isset($_SESSION['aaa'])==Null){ $URL = 'index.html';
    header('Location: '.$URL);}
	require ("lib/php/connect1.php");
	$sql = "SELECT * FROM phong where maloai = '1' order by maloai ASC " ;
    $temp = mysqli_query($connect,$sql);
    $sql1 = "SELECT * FROM phong where maloai = '2' order by maloai  " ;
    $temp1 = mysqli_query($connect,$sql1);
     $sql2 = "SELECT * FROM hoadon where maphong =  order by maloai DESC limit 4" ;
    $temp2 = mysqli_query($connect,$sql2);



<!DOCTYPE html>
<html>
<title>Quoc Tuan Hotel | ADMIN</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="lib\css\w3.css">
<link rel="stylesheet" href="lib\css\admin.css">
<script src="lib\script\w3.js"></script>
<link rel="stylesheet" href="lib\css\fonts.css">
<script src="lib\script\admin.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Amatic SC", sans-serif}

</style>
<body>
<!-- Start Content -->


<!-- Navbar (Sits on top) -->
<div class="w3-top w3-bar w3-xlarge w3-black w3-opacity-min">
<a href="index.html" class="w3-bar-item w3-button">HOME</a>
<a href="admin.php" class="w3-bar-item w3-button">ROOM</a>
<a href="about.html" class="w3-bar-item w3-button">ABOUT</a>
<a href="Manager.php" class="w3-bar-item w3-button">MANAGER</a>
<a href="xulylogout.php" class="w3-bar-item w3-button">LOGOUT</a>
</div>

<!-- Header image -->
<div class="w3-display-container w3-grayscale-min nen">

<div class="contianer">


  	<?php foreach($temp as $item):?>

    	<div  class="flip-box">
			<div class="flip-box-inner">
				<div  class="flip-box-front">
					<h1 style="<?php if($item['trangthai']==1) { echo "background-color: red";}else{ echo "background-color: blue";}?>" class="button button3" id="r1" ><strong>ROOM <?php   echo $item['tenphong']?> </strong> </h1>

				</div>
				<div  class="flip-box-back">
					<h2>ROOM <?php echo $item['tenphong']?></h2>
					<p>	<a href="admin/checkin.php?id=<?php echo $item['maphong']?>"> <button class="w3-button w3-xlarge w3-black"  >Check in</button></a></p>
					<p>	<a href="admin/checkout.php?id=<?php echo $item['maphong']?>"><button class="w3-button w3-xlarge w3-black" >Check out</button></a></p>
					<a href="admin/pay.php?id=<?php echo $item['maphong']?>"><button class="w3-button w3-xlarge w3-black" >Pay</button></a>
					<a href="admin/xoa.php?id=<?php echo $item['maphong']?>"> <button class="w3-button w3-xlarge w3-black"  >xoa</button></a>
				</div>
			</div>
		</div>
<?php endforeach?>
</div>
<!--  -->
<div class="contianer">
 <?php foreach($temp1 as $item1):?>
  	<div class="flip-box">
  		<div class="flip-box-inner">
   			<div class="flip-box-front">
  					<h1 style="<?php if($item1['trangthai']==1) { echo "background-color: red";}else{ echo "background-color: blue";}?>" class="button button3" id="r1" ><strong>ROOM <?php echo $item1['tenphong']?></strong> </h1>
			</div>
			<div  class="flip-box-back">
					<h2>ROOM VIP <?php echo $item1['tenphong']?></h2>
					<p>	<a href="admin/checkin.php?id=<?php echo $item1['maphong']?>"><button class="w3-button w3-xlarge w3-black" >Check in</button></a></p>
					<p>	<a href="admin/checkout.php?id=<?php echo $item1['maphong']?>"><button class="w3-button w3-xlarge w3-black" >Check out</button></a></p>
					<a href="admin/pay.php?id=<?php echo $item1['maphong']?>"><button class="w3-button w3-xlarge w3-black" >Pay</button></a>
					<a href="admin/xoa.php?id=<?php echo $item1['maphong']?>"> <button class="w3-button w3-xlarge w3-black"  >xoa</button></a>
  			</div>
		</div>
	</div>
<?php endforeach?>
</div>
<!--  -->
</div>


</div>

</body>
</html>
