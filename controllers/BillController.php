<?php 
include_once("models/Bill.php");
include_once("models/BillDetail.php");
include_once("models/Employee.php");
class BillController 
{
    var $model;
    function __construct(){
        $this->model= new Bill;
    }
    public function list()
    {
        $data= $this->model->list();
        require_once("views/bills/list.php");
    }
    public function detail()
    {

        $CODE=$_GET['CODE'];   
        $details= $this->model->find($CODE);
        echo $details;
        print_r($details);
        
        //require_once("views/customers/detail.php");
    }
    public function dashboard()
    {
        require_once("views/dashboard/dashboard.php");
    }

    

}
?>