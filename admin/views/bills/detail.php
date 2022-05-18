<?php 
include_once('views/layout/header.php');
 ?>
  <legend><h1 class="text-center">Chi tiết hóa đơn</h1></legend>

 <div class="container " >
   <h4>Hóa đơn:<?=$CODE ?></h4>
   <hr>  
    <table class="myTable" class="table table-striped">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Số lượng mua</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">#</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $i=0;
  foreach ($details as $row) {
        $i++;
     ?>
     <tr>
        <td><?= $i ?></td>
        <td><?= $row['PRODUCT_CODE'] ?></td>
        <td><?= $row['QUANTITY_BUY']?></td>
        <td><?= number_format($row['PRICE']) ?></td>
        <td><?= number_format($row['TOTAL_MONEY']) ?></td>
        <td>
          <a href="javascript: ;" class="btn btn-success btn-show" data-id="<?= $row['PRODUCT_CODE'] ?>"
                  data-toggle="modal" data-target="#modalShow"><span class="text-white">Chi tiết</span></a>
          </td> 
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
        $('.myTable').DataTable();



  </script>
   