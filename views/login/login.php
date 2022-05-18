
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng nhập</title>
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
   <h2>Đăng nhập</h2>
   <p>Vui lòng nhập email và mật khẩu</p>
   </div>
    <form id="Login"  action="?mod=login&act=loginProcess" method="post">

        <div class="form-group">


            <input type="email" class="form-control" id="inputEmail" name="EMAIL" placeholder="Email">

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" name="PASSWORD" placeholder="Mật khẩu">

        </div>
        <div class="forgot">
        <a href="?mod=login&act=forgotPassword">Quên mật khẩu?</a>
        </div>
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
        <hr>

        <a href="?mod=login&act=register" class="btn btn-success my-2">Tạo tài khoản</a>

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
                EMAIL: "required",
                PASSWORD: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                EMAIL: "Vui lòng nhập email",
                PASSWORD: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Mật khẩu phải dài hơn 6 kí tự"
                }
            }
        });


    });

</script>
</body>

</html>

<?php if(isset($_COOKIE['changepass'])){ ?>
      <script type="text/javascript">
        toastr["success"]("Đổi mật khẩu thành công","Thông báo:");
    </script>
<?php } ?>

<?php if(isset($_COOKIE['logout'])){ ?>
      <script type="text/javascript">
        toastr["success"]("Đăng xuất thành công","Thông báo:");
    </script>
<?php } ?>

