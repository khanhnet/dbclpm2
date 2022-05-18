<?php 
include_once('views/layout/header.php');
?>
<legend><h1 class="text-center">Quản lí hóa đơn</h1></legend>
<div class="container " >  

            <form action="?mod=bill&act=dashboard" method="POST" role="form">
              
              <div class="form-group">
                <label>Thống kê ngày</label>
                <input type="date" class="form-control" id="" name="DATE" placeholder="Input field" >
              </div>
              <button type="submit" class="btn btn-primary mb-5">Gửi</button>
            </form>

             <a href= "?mod=bill&act=list&STT=ST01" class="btn btn-success ">Đơn chưa xác nhận</a>
             <a href= "?mod=bill&act=list&STT=ST02" class="btn btn-success ">Đơn hàng đang giao</a>
  <table class="myTable" class="table table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Mã hóa đơn</th>
        <th scope="col">Thời gian</th>
        <th scope="col">Mã khách hàng</th>
        <th scope="col">Mã nhân viên</th>
        <th scope="col">Tổng tiền</th>
        <th scope="col">Trạng thái</th>
        <th scope="col">#</th>
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
          <td><?= $row['TIME']?></td>
          <td><?= $row['CUSTOMER_CODE'] ?></td>
          <td><?= $row['EMPLOYEE_CODE'] ?></td>
          <td><?= number_format($row['TOTAL_MONEY']) ?></td>
          
          <td>
            <a href="?mod=bill&act=detail&CODE=<?=$row['CODE']?> " class="btn btn-success ">Chi tiết</a>
          </td>
          
          <td>
            <?php 
            if ($row['STATUS']!='ST03') {
             ?>
             <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                STATUS
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenu2">

                <?php 
                if ($row['STATUS']=='ST01') {
                  ?>
                  <a class="dropdown-item" href="?mod=bill&act=statusShip&CODE=<?=$row['CODE']?>&ST=ST02">Giao hàng</a>
                  <a class="dropdown-item" href="?mod=bill&act=status&CODE=<?=$row['CODE']?>&ST=ST03">Đã thanh toán</a>
                <?php } ?>
                <?php 
                if ($row['STATUS']=='ST02') {
                  ?>
                 <p class="text-center"><?=$row['TIME_SHIP'] ?></p>
                  <a class="dropdown-item" href="?mod=bill&act=status&CODE=<?=$row['CODE']?>&ST=ST03">Đã thanh toán</a>
                <?php } ?>

              </div>
            </div>
            
           <?php } ?>
            



            
            
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>    
</div>


<?php 
include_once('views/layout/footer.php');
?>
<script type="text/javascript">
  $('.myTable').DataTable();
</script>

 <?php if(isset($_COOKIE['status'])){ ?>
      <script type="text/javascript">
        toastr.success("Thay đổi trạng thái thành công","Thông báo:");
    </script>
<?php } ?>

<?php if(isset($_COOKIE['status'])){ ?>
      <script type="text/javascript">
        toastr.eror("Thay đổi trạng thái không thành công","Thông báo:");
    </script>
<?php } ?>
