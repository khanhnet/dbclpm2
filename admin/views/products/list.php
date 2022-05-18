<?php 
include_once('views/layout/header.php');
 ?>
  <legend><h1 class="text-center">Quản lí sản phẩm</h1></legend>

    <div class="container " >
    
    <a href="?mod=product&act=add" class="btn btn-primary">Thêm mới sản phẩm</a>
    <hr>
  <table id="myTable" class="table table-striped">
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
          <td><?= $row['NAME']?></td>
          <td><?= $row['QUANTITY'] ?></td>
          <td><?= number_format($row['PRICE']); ?></td>
          <td>
          <a href="javascript: ;" class="btn btn-success btn-show" data-id="<?= $row['CODE'] ?>"
                  data-toggle="modal" data-target="#modalShow"><span class="text-white">Chi tiết</span></a>
        <a href="?mod=product&act=edit&CODE=<?= $row['CODE'] ?>" class="btn btn-warning">Sửa</a>  
        <a href="?mod=product&act=delete&CODE=<?= $row['CODE'] ?>" class="btn btn-danger btn-delete">Xóa</a> </td> 
          </tr>
        <?php } ?>
      </tbody>
    </table>    
  </div>



         <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title text-center" id="exampleModalLabel">Chi tiết sản phẩm</h2>

              </div>
              <div class="modal-body">
                <div class="card" >
                  <img width="100px" id="picture_show"   class="card-img-top">
                  <div class="card-body">
                    <p >Mã sản phẩm : <span id="code_show"></span></p>
                    <p >Tên sản phẩm : <span id="name_show"></span></p>
                    <p >Số lượng sản phẩm : <span id="quantity_show"></span></p>
                    <p >Đơn giá sản phẩm : <span id="price_show"></span></p>

                  </div>
                </div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
              </div>
            </div>
          </div>
        </div>

<?php 
 include_once('views/layout/footer.php');
 ?>
  <script type="text/javascript">
    
            $('.btn-show').on('click',function(){
        //$('#modalShow').modal('show');


        var id = $(this).data('id');


      //alert(id);  
      $.ajax({
        type: 'get',
        dataType: 'json',
        url: '?mod=product&act=detail&CODE='+id,
        success: function(response){
         console.log(response);
         $('#picture_show').attr("src","public/images/products/"+response.PICTURE+"");
         $('#code_show').html(response.CODE);
         $('#name_show').html(response.NAME);
         $('#quantity_show').html(response.QUANTITY);
         $('#price_show').html(response.PRICE);
       }

     });
     });

        $('#myTable').DataTable();


          $('.btn-delete').click(function(e){
          e.preventDefault();
          var url =$(this).attr('href');
          swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {

              window.location.href=url;
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Your imaginary file is safe!");
            }
          });

        });






  </script>

 
        
     
 
   <?php if(isset($_COOKIE['update'])){ ?>
      <script type="text/javascript">
        toastr.success("Cập nhật thành công","Thông báo:");
    </script>
<?php } ?>
  <?php if(isset($_COOKIE['notupdate'])){
  ?>
  <script type="text/javascript">
    toastr["error"]("Cập nhật thất bại","Thông báo:");
  </script>
<?php } ?>

<?php if(isset($_COOKIE['new'])){ ?>
      <script type="text/javascript">
        toastr["success"]("Thêm mới thành công","Thông báo:");
    </script>
<?php } ?>

<?php if(isset($_COOKIE['delete'])){ ?>
      <script type="text/javascript">
        toastr["success"]("Xóa thành công","Thông báo:");
    </script>
<?php } ?>
<?php if(isset($_COOKIE['notdelete'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Xóa thất bại","Thông báo:");
    </script>
<?php } ?>
