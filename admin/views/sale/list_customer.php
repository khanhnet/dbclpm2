<?php 
  include_once('views/layout/header.php');
?>
<legend><h1 class="text-center">Danh sách khách hàng</h1></legend>
<div class="container " >
    <a href="?mod=customer&act=add" class="btn btn-primary">Thêm mới khách hàng</a>
    <hr>
    <table id="myTable" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã khách hàng</th>
      <th scope="col">Tên khách hàng</th>
      <th scope="col">Email</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ</th>
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
        <td><?= $row['NAME']?></td>
        <td><?= $row['EMAIL'] ?></td>
        <td><?= $row['MOBILE'] ?></td>
        <td><?= $row['ADDRESS'] ?></td>
        <td><a href="?mod=sale&act=purchase&CODE=<?= $row['CODE'] ?>" class="btn btn-primary">
          <i class="fas fa-cart-arrow-down"></i>
        <span>Tạo hóa đơn</span></a></td> 
     </tr>
 <?php } ?>
  </tbody>
</table>    
</div>

<script type="text/javascript">
     
  $(document).ready( function () {
    $('#myTable').DataTable();
  });

</script>

<?php 

  include_once('views/layout/footer.php');
?>

<?php if(isset($_COOKIE['bill'])){ ?>
      <script type="text/javascript">
        toastr["success"]("Tạo hóa đơn thành công","Thông báo:");
    </script>
<?php } ?>