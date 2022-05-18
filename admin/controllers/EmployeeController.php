<?php 
include_once('public/vendor/email.php');
include_once("models/Employee.php");
include_once("models/Customer.php");
include_once('public/vendor/uploads.php');
class EmployeeController 
{
    var $model;
    function __construct(){
        $this->model= new Employee;
    }
    public function list()
    {
        $data= $this->model->getAll();
        require_once("views/employees/list.php");
    }
    public function detail()
    {

   $CODE=$_GET['CODE'];   
    $details= $this->model->detail($CODE);

        
    }

       public function profile()
    {

   $CODE=$_GET['CODE'];   
    $details= $this->model->find($CODE);
    include("views/employees/profile.php");


        
    }


     public function add()
    {
       include("views/employees/add.php");
    }
    
     public function store()
    {



        $data=$_POST;
        $data['PASSWORD']=md5($data['PASSWORD']);
        unset($data['submit']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['CODE']='NV'.time();
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

        $status= $this->model->create($data);
        if($status==true){
             setcookie('new','Thêm mới thành công',time()+5);
        header('Location:?mod=employee&act=list');
            
        }else {
            setcookie('notnew','Thêm mới thất bại',time()+5);
        header('Location:?mod=employee&act=add');
        }
    }



         public function edit()
    {
         $CODE=$_GET['CODE'];
        
        $details= $this->model->find($CODE);
       include("views/employees/edit.php");
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
        header('Location:?mod=employee&act=list');
            
        }else {
            setcookie('notupdate','Cập nhật thất bại',time()+5);
        header('Location:?mod=employee&act=edit&CODESP='.$data['CODE'].'');
        }

    }
     public function delete()
    {
         $CODE=$_GET['CODE'];
        
        $status= $this->model->delete($CODE);
        if($status==false){
            setcookie('delete','Xóa thành công',time()+5);
        header('Location:?mod=employee&act=list');
            
        }else {
            setcookie('notdelete','Xóa thất bại',time()+5);
       header('Location:?mod=employee&act=list');
        }
    }

     public function birthday()
    {
        //$DATE=date('m-d');

        $DATE=date('m-d');


        $customer=new Customer();
        $listCus=$customer->getAll();
        $listEm= $this->model->getAll();
        $birthday=array();
        foreach ($listCus as $value) {
           $birth= substr($value['DATE'],5,10);
           if ($birth==$DATE) {           
            $birthdayCus[]=$value;
        }
        }
        foreach ($listEm as $value) {
           $birth= substr($value['DATE'],5,10);
           if ($birth==$DATE) {
            $birthdayEm[]=$value;
        }   
        }
        include_once("views/events/birthday.php");
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