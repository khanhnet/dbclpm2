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

        if (isset($_GET['CATEGORY'])) {
            $CATEGORY=$_GET['CATEGORY'];
             $data= $this->model->type($CATEGORY);
        }else {
            
        $data= $this->model->getAll();
        }
        $data_type=$this->model->typeProduct();


        require_once("views/products/list.php");
    }
    public function detail()
    {
        $data_type=$this->model->typeProduct();

        $CODE=$_GET['CODE']; 	
        $detail= $this->model->find($CODE);
        require_once("views/products/detail.php");
    }

     public function search()
    {
        $search=$_POST['search'];
        $data_type=$this->model->typeProduct();
       
        $data_search= $this->model->search($search);
        require_once("views/products/search.php");
       
    }

}
 ?>