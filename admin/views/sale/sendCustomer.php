<?php 
  include_once('views/layout/header.php');
  include_once('public/vendor/chuyen_hoa.php');
?>
<legend><h1 class="text-center">Hóa đơn</h1></legend>

<div class="container" >

  <ul>
  <li class="list-group">Mã hóa đơn:<?= $_SESSION['bill']['CODE'] ?></li>
  <li class="list-group">Thời gian:<?= $_SESSION['bill']['TIME'] ?></li>
  <li class="list-group">Mã khách hàng:<?= $_SESSION['customer']['CODE'] ?></li>
  <li class="list-group">Tên khách hàng:<?= $_SESSION['customer']['NAME'] ?></li>
  <li class="list-group">Số điện thoại:<?= $_SESSION['customer']['MOBILE'] ?></li>
  <li class="list-group">Địa chỉ:<?= $_SESSION['customer']['ADDRESS'] ?></li>
  </ul>
  <br>
  

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
    </tr>
  </thead>
  <tbody>


    <?php 
       $i=0;
    $tong=0;
    $total=0;
    foreach ($_SESSION['cart'] as $product) {
      $i++;
      $tong+=$product['PRICE']*$product['QUANTITY'];
      $total+=$product['QUANTITY'];
     ?>
     <tr>
      <td><?= $i ?></td>
      <td><?= $product['CODE'] ?></td>
      <td><?=  $product['NAME']?></td>
        <td><img width="100px" class="border border-dark" src="public/images/products/<?=  $product['PICTURE']?>"></td>
      <td><?=  $product['QUANTITY'] ?></td>
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
<div class="text-center">
  <a href="?mod=product&act=listProduct" class="btn btn-success">
    <i class="fas fa-undo"></i>
    <span>Quay lại chọn sản phẩm</span></a>
  <a href="?mod=sale&act=payment" class="btn btn-outline-dark">
    <i class="fas fa-print"></i>
  <span>In hóa đơn</span></a>
<a href="?mod=sale&act=payment" class="btn btn-outline-dark">
  <i class="far fa-envelope"></i>
<span>Gửi Email</span></a>
</div>
</div>

<script type="text/javascript">
     
  $(document).ready( function () {
    $('#myTable').DataTable();
  });

</script>

<?php 

  include_once('views/layout/footer.php');
?>