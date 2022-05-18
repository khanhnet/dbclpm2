
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Đăng nhập</title>

  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  
  <!-- Latest compiled and minified CSS & JS -->
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

  <!-- bg-gradient-primary-->

</head>

<body class="body bg-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chào mừng trở lại!</h1>
                  </div>
                  <form class="user" id="formLogin" action="?mod=login&act=loginProcess" method="post" >
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="EMAIL" aria-describedby="emailHelp" name="EMAIL" placeholder="Vui lòng nhập địa chỉ email...">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="PASSWORD" name="PASSWORD" placeholder="Mật khẩu">
                    </div>
                    <?php if(isset($_COOKIE['notlogin'])){
                      ?>
                      <div class="alert alert-danger" role="alert">
                        <span>Email hoặc mật khẩu không chính xác!</span>
                      </div>
                    <?php } ?>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Nhớ mật khẩu</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="?mod=login&act=forgotPassword">Quên mật khẩu?</a>
                  </div> 
                 <!--  <div class="text-center">
                   <a class="small" href="?mod=login&act=register">Tạo một tài khoản!</a>
                 </div> -->
               </div>
             </div>
           </div>
         </div>
       </div>

     </div>

   </div>

 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="public/vendor/jquery/jquery.min.js"></script>
 <script src="public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="public/vendor/jquery-easing/jquery.easing.min.js"></script>
 <script src="//code.jquery.com/jquery.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
 <!-- Custom scripts for all pages-->
 <script src="public/js/sb-admin-2.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
 
        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#formLogin").validate({
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

