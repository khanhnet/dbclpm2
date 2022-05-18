<?php 
include_once('views/layout/header.php');
include_once('public/vendor/chuyen_hoa.php');
?>

<link rel="stylesheet" type="text/css" href="public/styles/cart.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
<div class="home">
  <div class="home_container">
    <div class="home_background" style="background-image:url(public/images/cart.jpg)"></div>
    <div class="home_content_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="home_content">
              <div class="breadcrumbs">
                <ul>
                  <li><a href="?mod=product&act=list">Trang chủ</a></li>
                  <li>Giỏ hàng</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container my-5" >
  <?php if (isset($_SESSION['bill_user'])) {
    
 ?>

  <ul >
    <li class="list-group">Mã hóa đơn:<?= $_SESSION['bill_user']['CODE'] ?></li>
    <li class="list-group">Thời gian:<?= $_SESSION['bill_user']['TIME'] ?></li>
    <li class="list-group">Mã khách hàng:<?= $_SESSION['user']['CODE'] ?></li>
    <li class="list-group">Tên khách hàng:<?= $_SESSION['user']['NAME'] ?></li>
    <li class="list-group">Số điện thoại:<?= $_SESSION['user']['MOBILE'] ?></li>
    <li class="list-group">Địa chỉ:<?= $_SESSION['user']['ADDRESS'] ?></li>
  </ul>
<?php } ?>
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
      if (isset($_SESSION['cart_user'])) {
      $i=0;
      $tong=0;
      $total=0;
      foreach ($_SESSION['cart_user'] as $product) {
        $i++;
        $tong+=$product['PRICE']*$product['QUANTITY'];
        $total+=$product['QUANTITY'];
        ?>
        <tr>
          <td><?= $i ?></td>
          <td><?= $product['CODE'] ?></td>
          <td><?=  $product['NAME']?></td>
          <td><img width="100px" class="border border-dark" src="../admin/public/images/products/<?=  $product['PICTURE']?>"></td>
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
<?php } ?>


  <div class="text-center">
    <div class="button continue_shopping_button my-4 " style="margin: auto">
      <a href="?mod=sale&act=payment">Gửi Email</a></div>
    </div>
    <div class="button continue_shopping_button my-4 " style="margin: auto">
      <a href="?mod=product&act=list">Quay lại chọn sản phẩm</a></div>
    </div>



  </div>
</div>

<?php 
include_once('views/layout/footer.php');
?>
<script src="public/js/cart.js"></script>
