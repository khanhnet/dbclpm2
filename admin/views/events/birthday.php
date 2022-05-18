<?php 
include_once('views/layout/header.php');
 ?>
 <style type="text/css">
   .container1 {

   }
 </style>
 
  <legend><h4 class="text-center">Sinh nhật khách hàng</h4></legend>

   
    
 <div class="container1 container " >
    <hr>
    <table class="myTable" class="table table-striped">
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
    if (isset($birthdayCus)) {
      
    
    $i=0;
  foreach ($birthdayCus as $row) {
        $i++;
     ?>
     <tr>
        <td><?= $i ?></td>
        <td><?= $row['CODE'] ?></td>
        <td><?= $row['NAME']?></td>
        
        <td><?= $row['EMAIL'] ?></td>
        <td><?= $row['MOBILE'] ?></td>
        <td><?= $row['ADDRESS'] ?></td>
        
        <td>
        <a href="?mod=customer&act=sendMailBirth&CODE=<?= $row['CODE'] ?>" class="btn btn-warning">
          <i class="fas fa-birthday-cake"></i>
          <span>Gửi Email chúc mừng</span>
        </a> </td> 
     </tr>
     </tr>
 <?php } }?>
  </tbody>
</table>    
 </div>


 <legend><h4 class="text-center">Sinh nhật nhân viên</h4></legend>

   
    
 <div class="container1 container" >
    <hr>
    <table class="myTable" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã nhân viên</th>
      <th scope="col">Tên nhân viên</th>
      <th scope="col">Email</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    if (isset($birthdayEm)) {

    $i=0;
  foreach ($birthdayEm as $row) {
        $i++;
     ?>
     <tr>
        <td><?= $i ?></td>
        <td><?= $row['CODE'] ?></td>
        <td><?= $row['NAME']?></td>
        
        <td><?= $row['EMAIL'] ?></td>
        <td><?= $row['MOBILE'] ?></td>
        <td><?= $row['ADDRESS'] ?></td>
        
        <td>
        <a href="?mod=employee&act=sendMailBirth&CODE=<?= $row['CODE'] ?>" class="btn btn-warning">
          <i class="fas fa-birthday-cake"></i>
          <span>Gửi Email chúc mừng</span>
        </a> </td> 
     </tr>
 <?php } } ?>
  </tbody>
</table>    
 </div>


 
 <?php 
include_once('views/layout/footer.php');
 ?>
 <script type="text/javascript">
     
     $(document).ready( function () {
    $('.myTable').DataTable();
} );
 </script>
