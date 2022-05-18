<?php 
session_start();
//session_destroy();
include_once('../vendor/chuyen_hoa.php');
if (isset($_SESSION['cart'])) {  
$products_cart=$_SESSION['cart'];
}else{
  $products_cart=array();
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 </head>
 <body>
 	<legend><h1 class="text-center">Danh sách sản phẩm đã chọn</h1></legend>
 	
 <div class="container">

 	<a href="../products/products.php"><button class="btn btn-success">Trang chủ</button></a>
 	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Ảnh sản phẩm</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>


    <?php 
    $i=0;
    $tong=0;
    foreach ($products_cart as $product) {
    	$i++;
    	$tong+=$product['PRICE']*$product['QUANTITY'];
     ?>
     <tr>
     	<td><?= $i ?></td>
     	<td><?= $product['CODE'] ?></td>
     	<td><?=  $product['NAME']?></td>
        <td><img width="100px" src="<?=  $product['PICTURE']?>"></td>
     	<td><a href="add2cart.php?CODESP=<?= $product['CODE'] ?>" class="btn btn-success">+</a>
     		<?=  $product['QUANTITY'] ?>
     		<a href="less.php?CODESP=<?= $product['CODE'] ?>" class="btn btn-danger">-</a>
     		</td>
      <td><?= number_format($product['PRICE']); ?></td>
     	<td><?= number_format($product['PRICE']*$product['QUANTITY']); ?></td>
     	<td><a href="delete.php?CODESP=<?= $product['CODE'] ?>" class="btn btn-danger">Xóa</a></td>
     	
     </tr>
     
 <?php } ?>
 		<tr>
     	<td colspan="6">Tổng tiền</td>
     	<td colspan="2"><?=number_format($tong)?></td>
     </tr>
     <tr>
     	<td colspan="6">Tổng tiền bằng chữ</td>
     	<td colspan="2"><?=convert_number_to_words( $tong )?></td>
     </tr>
      

  </tbody>
</table>  
     <div class="text-center">
      <a href="formkhachhang.php" class="btn btn-success">Thanh toán</a> 
      <a href="deleteall.php" class="btn btn-danger">Xóa hết</a> 
     </div>
 </div>
 </body>
 </html>