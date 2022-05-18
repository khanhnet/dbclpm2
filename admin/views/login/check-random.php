<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Xác minh</title>
  <!-- Latest compiled and minified CSS & JS -->

  <!-- Latest compiled and minified CSS & JS -->
  <script src="//code.jquery.com/jquery.js"></script>
  <!-- Custom fonts for this template-->
  <link href="public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="public/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="bg-gradient-primary">

  <div class="container">
   
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Xác thực danh tính</h1>
                  </div>
                  <form class="user" action="?mod=login&act=checkRandom" method="post">
                    <div class="form-group">
                      <label>Mã xác thực</label>
                      <div class="alert alert-secondary" role="alert">
                        Vui lòng kiểm tra Email để lấy mã xác thực
                      </div>
                      <input type="number" class="form-control form-control-user" id="random"  name="random" >
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Xác nhận
                    </button>
                    <?php if(isset($_COOKIE['notcheckrandom'])){ ?>
                        <div class="alert alert-danger my-2" role="alert">
                          Mã xác thực không chính xác
                        </div>
                      <?php } ?>
                    
                  </form>

                  <hr>
                  <div class="text-center">
                    <a class="small" href="?mod=login&act=login">Bạn đã có tài khoản? Đăng nhập!</a>
                  </div>
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
        $(".user").validate({
            rules: {
                
              
                random: {
                    required: true,
                    minlength: 6,
                    maxlength: 6,
                }
            },
            messages: {
               
                
                random: {
                    required: "Vui lòng nhập mã xác minh",
                    minlength: "Mã xác minh chỉ chứa 6 kí tự"
                }
            }
        });


    });

</body>

</html>
<?php if(isset($_COOKIE['checkrandom'])){ ?>
  <script type="text/javascript">
    toastr["success"]("Xác nhận thành công","Thông báo:");
  </script>
<?php } ?>
