<?php 
 include_once("models/Login.php");
 include_once('public/vendor/email.php');
class  LoginController
{
  var $model;
    function __construct(){
        $this->model= new Login;
    }
	public function loginProcess()
  {
   $data=$_POST;
$EMAIL=isset($_POST['EMAIL'])?$_POST['EMAIL']:'';
$PASSWORD=isset($_POST['PASSWORD'])?$_POST['PASSWORD']:'';
$PASSWORD=md5($PASSWORD);
$check=$this->model->check($EMAIL,$PASSWORD);
if ($check!=null) {
	$_SESSION['login']=$check;
	setcookie('logincomplete','đăng nhập thành công',time()+10);
	header('Location: ?mod=bill&act=dashboard');
}else{
	setcookie('notlogin','đăng nhập không thành công',time()+10);
	header('Location: ?mod=login&act=login');
}
 }

  public function logout()
  {
   session_destroy();
   setcookie('logout','đăng xuất thành công',time()+10);
  header('Location: ?mod=login&act=login');
 }
 public function login()
   {
   require_once('views/login/login.php');
 }
 public function forgotPassword()
   {
    require_once('views/login/forgot-password.php');
  
 }
 public function forgotProcess()
   {
    $random=rand(100000,999999);
   $forgot=array();
   $forgot['random']=$random;
   $forgot['EMAIL']=$_POST['EMAIL'];
   $checkEmail=$this->model->checkEmail($forgot['EMAIL']);
   if ($checkEmail!=null) {
  $_SESSION['forgot']=$forgot;

  header('Location:?mod=login&act=formcheck');
}else{
  setcookie('faulseEmail','Email không chính xác',time()+5);
  header('Location: ?mod=login&act=forgotPassword');
}
 }
 public function formcheck()
   {
    if(isset($_SESSION['forgot']))
{
  //cấu hình thông tin do google cung cấp
    
    $subject='Netherrealm Shop';
    $email=$_SESSION['forgot']['EMAIL'];
    $name='admin';
    ob_start();
    include_once('views/content_email/confirmUser.php');
    $contents=ob_get_contents();
    ob_end_clean();
    send_email($email,$name,$contents,$subject);
}
    require_once('views/login/check-random.php');
 }

 public function checkRandom()
   {

    $random=$_POST['random'];
    $random_data=$_SESSION['forgot']['random'];
    if ($random_data==$random) {
      setcookie('checkrandom','Xác nhận thành công',time()+10);
  header('Location: ?mod=login&act=formUpdatePassword');
    }else {
      setcookie('notcheckrandom','Xác nhận thất bại',time()+10);
  header('Location: ?mod=login&act=formcheck');
    }
 }
 public function formUpdatePassword()
   {
    
    require_once('views/login/form-Update-Password.php');
 }
 public function formUpdatePasswordProcess()
   {
    
    $PASWORD=$_POST['PASS'];
    $EMAIL=$_SESSION['forgot']['EMAIL'];
    if ($PASWORD==$_POST['CHECKPASS']) {
      $PASSWORD=md5($PASWORD);
      $update=$this->model->updatePassword($PASWORD,$EMAIL);
      setcookie('changepass','Đổi mật khẩu thành công',time()+10);
      header('Location: ?mod=login&act=login');
    }else {
      setcookie('notcheckpass','Xác nhận thất bại',time()+10);
      header('Location: ?mod=login&act=formUpdatePassword');
    }
 }







 }
 ?>