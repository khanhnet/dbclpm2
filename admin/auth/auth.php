<?php 


  


class auth 
{
   function check(){
   	if (!isset($_SESSION['login'])) {
  setcookie('dang_nhap','Vui lòng đăng nhập',time()+3);
  header('Location:?mod=login&act=logout');
}
   }
    
}
 ?>