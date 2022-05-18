<?php 
include_once("models/Customer.php");
include_once('public/vendor/uploads.php');
include_once('public/vendor/email.php');
class CustomerController 
{
    var $model;
    function __construct(){
        $this->model= new Customer;
    }
    public function list()
    {
        $data= $this->model->getAll();
        require_once("views/customers/list.php");
    }
    public function detail()
    {

        $CODE=$_GET['CODE'];   
        $details= $this->model->detail($CODE);

        
        //require_once("views/customers/detail.php");
    }

     public function add()
    {
       include("views/customers/add.php");
    }
    
     public function store()
    {

        $data=$_POST;
        $data['PASSWORD']=md5($data['PASSWORD']);
        unset($data['submit']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['CODE']='KH'.time();
              if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("public/images/customers","PICTURE",500000,array('JPG', 'png','jpg'));
        if(gettype($uploads) == "array"){
            setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
            $data['PICTURE']= 'profile.png';
             // Trả về mảng lỗi nếu ko upload được
        }else{
            $data['PICTURE']= $_FILES['PICTURE']["name"]; // Trả về tên file nếu upload thành công
        }
    }
        $status= $this->model->create($data);
        if($status==true){
            setcookie('new','Thêm mới thành công',time()+5);
        header('Location:?mod=customer&act=list');
            
        }else {
            setcookie('notnew','Thêm mới thất bại',time()+5);
        header('Location:?mod=customer&act=add');
        }
    }



         public function edit()
    {
         $CODE=$_GET['CODE'];
        
        $details= $this->model->find($CODE);
       include("views/customers/edit.php");
    }
     public function update()
    {

        $data=$_POST;
        $data['PASSWORD']=md5($data['PASSWORD']);
        unset($data['submit']);
        $CODE=$_GET['CODE'];
          if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("public/images/employees","PICTURE",500000,array('JPG', 'png','jpg'));
        if(gettype($uploads) == "array"){
            setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
            $data['PICTURE']= 'profile.png';
             // Trả về mảng lỗi nếu ko upload được
        }else{
            $data['PICTURE']= $_FILES['PICTURE']["name"]; // Trả về tên file nếu upload thành công
        }
    }
        $status= $this->model->update($data,$CODE);
        if($status==true){
            setcookie('update','Cập nhật thành công',time()+5);
        header('Location:?mod=customer&act=list');
            
        }else {
            setcookie('notupdate','Cập nhật thất bại',time()+5);
        header('Location:?mod=customer&act=edit&CODESP='.$data['CODE'].'');
        }

    }
     public function delete()
    {
         $CODE=$_GET['CODE'];
        
        $status= $this->model->delete($CODE);
        if($status==false){
            setcookie('delete','Xóa thành công',time()+5);
        header('Location:?mod=customer&act=list');
            
        }else {
            setcookie('notdelete','Xóa thất bại',time()+5);
       header('Location:?mod=customer&act=list');
        }
    }

    //hỗ trợ sale
     public function listCustomer()
    {
        unset($_SESSION['cart']);
        unset($_SESSION['customer']);
        unset($_SESSION['bill']);
        $data= $this->model->getAll();
        require_once("views/sale/list_customer.php");
    }

     public function sendMailBirth()
    {
        $CODE=$_GET['CODE'];
        $details= $this->model->find($CODE);

         if(isset($details))
{
  //cấu hình thông tin do google cung cấp
    
    $subject='Netherrealm ';
    $email=$details['EMAIL'];
    $name='admin';
    ob_start();
    include_once('views/content_email/sendBirth.php');
    $contents=ob_get_contents();
    ob_end_clean();
    send_email($email,$name,$contents,$subject);
} 
       header('Location:?mod=employee&act=birthday');
    }
}
 ?>