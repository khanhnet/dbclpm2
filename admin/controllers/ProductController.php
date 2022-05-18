<?php 

include_once("models/Product.php");
include_once('public/vendor/uploads.php');
class ProductController 
{
    var $model;
    function __construct(){
        $this->model= new Product;
    }
    public function list()
    {
        $data= $this->model->getAll();
        require_once("views/products/list.php");
    }
    public function detail()
    {

        $CODE=$_GET['CODE']; 	
        $details= $this->model->detail($CODE);
        
        

        //require_once("views/products/detail.php");
    }

    public function add()
    {
     $data_type=$this->model->typeProduct();

     include("views/products/add.php");
 }

 public function store()
 {


    $data=$_POST;
    unset($data['submit']);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $data['CODE']='SP'.time();
    
    if(isset($_POST['submit'])){ 
              // kiểm tra xem button Submit đã được click hay chưa ? 
        $uploads = file_upload("public/images/products","PICTURE",500000,array('JPG', 'png','jpg','jpeg'));
        if(gettype($uploads) == "array"){
            setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
            $data['PICTURE']= 'profile_product.png';
             // Trả về mảng lỗi nếu ko upload được
        }else{
            $data['PICTURE']= $_FILES['PICTURE']["name"]; // Trả về tên file nếu upload thành công
        }
    }
    $status= $this->model->create($data);
    if($status==true){
        setcookie('new','Thêm mới thành công',time()+5);
        header('Location:?mod=product&act=list');

    }else {
        setcookie('notnew','Thêm mới thất bại',time()+5);
        header('Location:?mod=product&act=add');
    }
}



public function edit()
{
 $CODE=$_GET['CODE'];

 $details= $this->model->find($CODE);
 $data_type=$this->model->typeProduct();
 include("views/products/edit.php");
}
public function update()
{

    $data=$_POST;
    $CODE=$_GET['CODE'];
    $details= $this->model->find($CODE);
    $data['OLD_PRICE']=$details['PRICE'];
    unset($data['submit']);
    $CODE=$_GET['CODE'];
           if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 
            $uploads = file_upload("public/images/products","PICTURE",500000,array('JPG', 'png','jpg','PNG'));
            if(gettype($uploads) == "array"){
                setcookie('notpic','Thêm mới ảnh thất bại',time()+5);
                $data['PICTURE']= 'profile_product.png';
             // Trả về mảng lỗi nếu ko upload được
            }else{
            $data['PICTURE']= $_FILES['PICTURE']["name"]; // Trả về tên file nếu upload thành công
        }
    }
    $status= $this->model->update($data,$CODE);
    if($status==true){
        setcookie('update','Cập nhật thành công',time()+5);
        header('Location:?mod=product&act=list');

    }else {
        setcookie('notupdate','Cập nhật thất bại',time()+5);
        header('Location:?mod=product&act=edit&CODESP='.$data['CODE'].'');
    }

}

public function delete()
{
 $CODE=$_GET['CODE'];

 $status= $this->model->delete($CODE);
 if($status==false){
    setcookie('delete','Xóa thành công',time()+5);
    header('Location:?mod=product&act=list');

}else {
    setcookie('notdelete','Xóa thất bại',time()+5);
    header('Location:?mod=product&act=list');
}
}

    //hỗ trợ sale
public function listProduct()
{
    $data= $this->model->getAll();
    require_once("views/sale/get_products.php");
}
}
?>