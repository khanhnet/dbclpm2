
<?php 
include_once('views/layout/header.php');
?>
<style type="text/css">
  label.error,.red{
    
  color: red;
  font-size: 15px;
  width: 100% !important;
    padding: 0px;
    margin: 10px 0px 0px;
}
.error{
  font-size: 15px;
}
input {
  width: 100% !important;
}
</style>

<div class="container bootstrap snippet">

  <div><h1>Thêm mới khách hàng</h1></div>

          <form action="?mod=customer&act=store" method="POST" role="form" " enctype="multipart/form-data" class="formValidate" >
  <div class="row">

    <div class="col-sm-3">
      <div class="text-center">
        <img src="public/images/customers/profile.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" name="PICTURE" class="text-center center-block file-upload">
      </div><hr><br>              
    </div>
    
    <div class="col-sm-9">
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <hr>
           <div class="form-group">

            <div class="col-xs-6">
              <label for=""><h4>Tên khách hàng</h4></label>
              <input type="text" class="form-control"  placeholder="Nhập vào tên khách hàng" name="NAME">
            </div>
          </div>
           <div class="form-group">

            <div class="col-xs-6">
              <label for=""><h4>Ngày sinh</h4></label>
              <input type="date" class="form-control"  name="DATE">
            </div>
          </div>
          
          <div class="form-group">

            <div class="col-xs-6">
              <label for=""><h4>Email</h4></label>
              <input type="email" class="form-control"  placeholder="Nhập vào email" name="EMAIL">
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-xs-6">
             <label for=""><h4>Số điện thoại</h4></label>
             <input type="number" class="form-control"  placeholder="Nhập vào số điện thoại" name="MOBILE">
           </div>
         </div>
         <div class="form-group">

          <div class="col-xs-6">
            <label for=""><h4>Địa chỉ</h4></label>
            <input type="text" class="form-control"  placeholder="Nhập vào địa chỉ" name="ADDRESS">
          </div>
        </div>
         <div class="col-xs-6">
            <label for=""><h4>Mật khẩu</h4></label>
            <input type="password" class="form-control"  placeholder="Nhập vào địa chỉ" name="PASSWORD">
          </div>
        </div>


        <div class="form-group">
         <div class="col-xs-12">
          <br>
          <button class="btn btn-lg btn-success" type="submit" name="submit">
            <i class="glyphicon glyphicon-ok-sign"></i> Lưu</button>
        </div>
      </div>


    <hr>

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

  $(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $(".formValidate").validate({
            rules: {
                EMAIL: "required",
                NAME: "required",
                DATE: "required",
                MOBILE: "required",
                ADDRESS: "required",
                PASSWORD: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                EMAIL: "Vui lòng nhập email",
                NAME: "Vui lòng nhập họ và tên",
                DATE: "Vui lòng nhập ngày sinh",
                MOBILE: "Vui lòng nhập số điện thoại",
                ADDRESS: "Vui lòng nhập địa chỉ",
                PASSWORD: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải dài hơn 6 kí tự"
                }
            }
        });


    });
</script>
<?php if(isset($_COOKIE['notnew'])){ ?>
      <script type="text/javascript">
        toastr["error"]("Thêm mới thất bại","Thông báo:");
    </script>
<?php } ?>