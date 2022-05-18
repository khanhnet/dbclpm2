
<?php 
include_once('views/layout/header.php');
?>

<div class="container bootstrap snippet">

  <div class="text-center"><h1>Thêm mới sản phẩm</h1></div>

  <form action="?mod=product&act=store" method="POST" role="form" " enctype="multipart/form-data" id="registrationForm">
    <div class="row">

      <div class="col-sm-3">
        <div class="text-center">
          <img src="public/images/products/profile_product.png" class="avatar img-circle img-thumbnail" alt="avatar">
          <input type="file" name="PICTURE" class="text-center center-block file-upload">
        </div><hr><br>              
      </div>

      <div class="col-sm-9">
        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <hr>
            <div class="form-group">

              <div class="col-xs-6">
                <label for=""><h4>Tên sản phẩm</h4></label>
                <input type="text" class="form-control"  placeholder="Nhập vào tên sản phẩm" name="NAME">
              </div>
            </div>
            <div class="form-group">

              <div class="col-xs-6">
                <label for=""><h4>Số lượng</h4></label>
                <input type="number" class="form-control"  name="QUANTITY">
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-6">
                <label for=""><h4>Đơn giá</h4></label>
                <input type="number" class="form-control"   name="PRICE">
              </div>
            </div>

            <div class="form-group">

              <div class="col-xs-6">
                <label for="inputState">Loại sản phẩm</label>
                <select id="inputState" class="form-control" name="TYPE">
                  <?php foreach ($data_type as $value) {
                    if (substr($value['CATEGORY_CODE'],0,3)=='LSP') {
                   ?>
                    
                   <option value='<?=$value['CATEGORY_CODE']?>'><?=$value['CATEGORY_NAME']?></option>
                 
                <?php  } } ?>
                </select>
              </div>
            </div>




            <div class="form-group">
             <div class="col-xs-12">
              <br>
              <button class="btn btn-lg btn-success" type="submit" name="submit">
                <i class="glyphicon glyphicon-ok-sign"></i> Lưu</button>
                <button class="btn btn-lg" type="reset">
                  <i class="glyphicon glyphicon-repeat"></i>Làm mới</button>
                </div>
              </div>

            </div>



          </div> 
        </div> 

      </div> 
    </form>

    <?php 
    include_once('views/layout/footer.php');
    ?>
    <script type="text/javascript">
      $(document).ready(function() {


        var readURL = function(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
              $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }


        $(".file-upload").on('change', function(){
          readURL(this);
        });
      });
    </script>

    <?php if(isset($_COOKIE['notnew'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Thêm mới thất bại","Thông báo:");
    </script>
<?php } ?>