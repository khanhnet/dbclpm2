<?php 
include_once('public/vendor/chuyen_hoa.php');
$products_cart=$_SESSION['cart'];

 ?>

 <!DOCTYPE html>
 <html>
 <head>
  <title></title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 </head>
 <body>
  <legend><h1 class="text-center">Danh sách sản phẩm đã chọn</h1></legend>
  
 <div class="container">

  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      
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
       
      <td>
        <?=  $product['QUANTITY'] ?>
        
        </td>
      <td><?= number_format($product['PRICE']); ?></td>
      <td><?= number_format($product['PRICE']*$product['QUANTITY']); ?></td>
     
      
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
     
 </div>
 </body>
 </html>