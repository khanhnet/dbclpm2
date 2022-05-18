<?php 

include_once('public/vendor/uploads.php');
include_once('views/layout/header.php');


    if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("public/images","PICTURE",500000,array('JPG', 'png','jpg'));
        if(gettype($uploads) == "array"){
            print_r($uploads); // Trả về mảng lỗi nếu ko upload được
        }else{
            echo "File name is: " . $uploads; // Trả về tên file nếu upload thành công
        }
    }
 ?>


<div class="container bootstrap snippet">

  <div><h1>Thêm mới nhân viên</h1></div>

          <form action="?mod=employee&act=store" method="POST" role="form" " enctype="multipart/form-data" id="registrationForm">
  <div class="row">

    <div class="col-sm-3">
      <div class="text-center">
        <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
        <input type="file" name="PICTURE" class="text-center center-block file-upload">
      </div><hr><br>              
    </div>
    
    <div class="col-sm-9">
      <div class="tab-content">
        <div class="tab-pane active" id="home">
          <hr>
            <div class="form-group">

              <div class="col-xs-6">
                <label for=""><h4>Mã nhân viên</h4></label>
               <input type="text" class="form-control"  placeholder="Mã khách hàng" name="CODE" >
             </div>
           </div>
           <div class="form-group">

            <div class="col-xs-6">
              <label for=""><h4>Tên nhân viên</h4></label>
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
          <button class="btn btn-lg" type="reset">
            <i class="glyphicon glyphicon-repeat"></i>Làm mới</button>
        </div>
      </div>


    <hr>

  </div>



</div> 
</div> 

</div> 
    </form>


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