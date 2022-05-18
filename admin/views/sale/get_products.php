<?php 
include_once('views/layout/header.php');
include_once('public/vendor/chuyen_hoa.php');
?>

<div class="container"  >
<legend><h1 class="text-center">Sản phẩm</h1></legend>
	<table id="myTable" class="table table-striped" >
		<thead>
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Mã sản phẩm</th>
				<th scope="col">Tên sản phẩm</th>
				<th scope="col">Số lượng</th>
				<th scope="col">Đơn giá</th>
				<th scope="col">#</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i=0;
			foreach ($data as $row) {
				$i++;
				?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $row['CODE'] ?></td>
					<td>
            <?= $row['NAME']?>
              <?php 
       if ($row['PRICE']>$row['OLD_PRICE']&&!$row['OLD_PRICE']==null) {
        ?>  
       <span class="badge badge-success">+<?= round(100-$row['OLD_PRICE']*100/($row['PRICE'])) ?>%</span>
        <?php } ?>
        <?php 
        if ($row['PRICE']<$row['OLD_PRICE']&&!$row['OLD_PRICE']==null) {
        ?>  
       <span class="badge badge-danger">-<?= round(100-$row['PRICE']*100/($row['OLD_PRICE'])) ?>%</span>
        <?php } ?>
            </td>
					<td><?= $row['QUANTITY'] ?></td>
					<td><?= number_format($row['PRICE']); ?></td>
					<td>
			<a href="?mod=sale&act=add2cart&CODE=<?= $row['CODE'] ?>" class="btn btn-success " data-toggle="tooltip" data-placement="bottom" title="Thêm vào giỏ hàng">
				<i class="fas fa-cart-plus"></i>
        Thêm vào giỏ
			</a></td> 
			</tr>
<?php } ?>
			</tbody>
		</table>    
	





<?php 
if (isset($_SESSION['cart'])) {
 ?>

 <!-- Button modal -->


<!-- Modal -->
<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông tin giỏ hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
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
        <td><img width="100px" src="public/images/products/<?= $product['PICTURE']?>"></td>
      <td><a href="?mod=sale&act=add2cart&CODE=<?= $product['CODE'] ?>" class="btn btn-success btn-sm">
      <i class="fas fa-caret-up"></i></a>
        <?=  $product['QUANTITY'] ?>
        <a href="?mod=sale&act=removeProduct&CODE=<?= $product['CODE'] ?>" class="btn btn-danger btn-sm">
          <i class="fas fa-caret-down"></i></a>
        </td>
      <td><?= number_format($product['PRICE']); ?></td>
      <td><?= number_format($product['PRICE']*$product['QUANTITY']); ?></td>
      <td><a href="?mod=sale&act=deleteProduct&CODE=<?= $product['CODE'] ?>" class="btn btn-danger">Xóa</a></td>
      
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
      
      <a href="?mod=sale&act=deleteAll" class="btn btn-danger">Xóa hết</a> 
     </div>
 </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <a href="?mod=sale&act=checkBill" class="btn btn-success">
          <span>Thanh toán</span> 
          <i class="fas fa-truck-moving"></i></a> 
      </div>
    </div>
  </div>
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  
  <i class="fa fa-shopping-bag"></i>
  <span>Xem giỏ hàng</span>
  <!-- Số lượng hàng trong giỏ -->
<span class="badge badge-danger badge-counter"><?=$total ?></span>
</button>

 <?php } ?>
 </div>     

<?php 

include_once('views/layout/footer.php');
?>

<script type="text/javascript">

  $(document).ready( function () {
    $('#myTable').DataTable();
  });

 
</script>

<?php if(isset($_COOKIE['notbill'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Tạo hóa đơn không thành công","Thông báo:");
    </script>
<?php } ?>

<?php if(isset($_COOKIE['notquantity'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Hết hàng","Thông báo:");
    </script>
<?php } ?>

<?php if(isset($_COOKIE['quantity'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Số lượng không đủ","Thông báo:");
    </script>
<?php } ?>