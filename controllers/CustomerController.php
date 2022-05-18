<?php 
include_once("models/Customer.php");
include_once("models/Product.php");
include_once('public/vendor/uploads.php');
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
        $product= new Product;
    $data_type=$product->typeProduct();

        $CODE=$_GET['CODE'];   
        $detail= $this->model->find($CODE);
        
        require_once("views/customers/profile.php");
    }

         public function edit()
    {
         $product= new Product;
    $data_type=$product->typeProduct();
         $CODE=$_GET['CODE'];
        
        $details= $this->model->find($CODE);
       include("views/customers/edit.php");
    }
     public function update()
    {

        $data=$_POST;
        unset($data['submit']);
    
        $data['PASSWORD']=md5($data['PASSWORD']);
        $CODE=$_GET['CODE'];
          if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("../admin/public/images/employees","PICTURE",500000,array('JPG', 'png','jpg'));
        if(gettype($uploads) == "array"){
            setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
            $data['PICTURE']= 'profile.png';
             // Trả về mảng lỗi nếu ko upload được
        }else{
            $data['PICTURE']= $uploads; // Trả về tên file nếu upload thành công
        }
    }
        $status= $this->model->update($data,$CODE);
        if($status==true){
            setcookie('update','Cập nhật thành công',time()+5);
        header('Location:?mod=product&act=list');
            
        }else {
            setcookie('notupdate','Cập nhật thất bại',time()+5);
        header('Location:?mod=customer&act=edit&CODESP='.$data['CODE'].'');
        }

    }

     public function store()
    {

        $data=$_POST;
        $data['PASSWORD']=md5($data['PASSWORD']);
        unset($data['submit']);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data['CODE']='KH'.time();
              if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("../admin/public/images/customers","PICTURE",500000,array('JPG', 'png','jpg'));
        if(gettype($uploads) == "array"){
            setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
            $data['PICTURE']= 'profile.png';
             // Trả về mảng lỗi nếu ko upload được
        }else{
            $data['PICTURE']= $uploads; // Trả về tên file nếu upload thành công
        }
    }
        $status= $this->model->create($data);
        if($status==true){
            setcookie('new','Thêm mới thành công',time()+5);
        header('Location:?mod=login&act=login');
            
        }else {
            setcookie('notnew','Thêm mới thất bại',time()+5);
        header('Location:?mod=login&act=register');
        }
    }


    public function contact()
    {
         $product= new Product;
    $data_type=$product->typeProduct();
         
       include("views/customers/contact.php");
    }
     

    
}
 ?>