
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đổi mật khẩu</title>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="public/styles/login.css">
<link href="https://fonts.googleapis.com/css?family=Akronim" rel="stylesheet">
<style type="text/css">
  label.error,.red{
    text-align: center;
  color: red;
  font-size: 15px;
  width: 100% !important;
    padding: 0px;
    margin: 10px 0px 0px;
}
input {
  width: 100% !important;
}
</style>
</head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading" ><a href="?mod=product&act=list" style="font-family: 'Akronim', cursive;font-size: 3rem">Netherrealm</a></h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Đổi mật khẩu</h2>
   
   </div>
    <form id="Login" action="?mod=login&act=formUpdatePasswordProcess" method="post">

        <div class="form-group">
           <label>Mật khẩu mới</label>


            <input type="password" class="form-control form-control-user"  name="PASS" >

        </div>

         <div class="form-group">
           <label>Xác nhận mật khẩu mới</label>
                      <input type="password" class="form-control form-control-user"  name="CHECKPASS" >

        </div>
         <?php if(isset($_COOKIE['notcheckpass'])){
                      ?>
          <div class="alert alert-danger" role="alert">
                        <span>Mật khẩu mới và xác nhận mật khẩu phải trùng nhau</span>
                      </div>
                    <?php } ?>


        <button type="submit" class="btn btn-primary">Đặt lại mật khẩu</button>
        <hr>

        <a href="?mod=login&act=register" class="btn btn-success my-2">Tạo tài khoản</a>
        <a  href="?mod=login&act=login" class="btn btn-warning my-2">Bạn đã có tài khoản? Đăng nhập!</a>

    </form>
    </div>
</div></div></div>


</body>
</html>


 <!-- Bootstrap core JavaScript-->
 <script src="../admin/public/vendor/jquery/jquery.min.js"></script>
 <script src="../admin/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="../admin/public/vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="//code.jquery.com/jquery.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <!-- Custom scripts for all pages-->

<script type="text/javascript">
  $(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#Login").validate({
            rules: {
                
                PASSWORD: {
                    required: true,
                    minlength: 6
                }
                CHECKPASS: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
               
                PASSWORD: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải dài hơn 6 kí tự"
                }
                CHECKPASS: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải dài hơn 6 kí tự"
                }
            }
        });


    });

</script>
</body>

</html>
<?php if(isset($_COOKIE['checkrandom'])){ ?>
  <script type="text/javascript">
    toastr["success"]("Xác nhận thành công","Thông báo:");
  </script>
<?php } ?>
