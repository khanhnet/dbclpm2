<?php 
include_once("models/Bill.php");
include_once("models/BillDetail.php");
include_once("models/Employee.php");
include_once("models/Product.php");
class BillController 
{
    var $model;
    function __construct(){
        $this->model= new Bill;
    }
    public function list()
    {
        if (isset($_GET['STT'])) {
            $data= $this->model->getStatus($_GET['STT']);
        }else {

            $data= $this->model->getAll();
            //$data->list();
        }

        //var_dump( $data);
        

        require_once("views/bills/list.php");
    }
    public function detail()
    {
        $detail= new BillDetail();
        $CODE=$_GET['CODE'];   

        $details=  $detail->detailBill($CODE);
        require_once("views/bills/detail.php");
        

    }




    public function dashboard()
    {
        if (isset($_POST['DATE'])) {
           $DAY=$_POST['DATE'];
       }else{
           $DAY=date('Y-m-d');
       }

       

        //thống kê tiền theo time
       $data= $this->model->list();
       $total=0;
       $totalDay=0;
       $totalMon=0;
       $totalYear=0;

       foreach ($data as $value) {
        $total+=$value['TOTAL_MONEY'];   
        $time= substr($value['TIME'],0,10);
           //ngày
        if ($time==$DAY) {           
            $totalDay+=$value['TOTAL_MONEY'];
        } 
            //tháng
        if (substr($time,0,7)==substr($DAY,0,7)) {           
            $totalMon+=$value['TOTAL_MONEY']; 
        }
            //năm
        if (substr($time,0,4)==substr($DAY,0,4)) {           
            $totalYear+=$value['TOTAL_MONEY']; 
        }
    }
    for ($i = 1; $i <13 ; $i++) {
        if ($i<10) {
            $month[]=date("".substr($DAY,0,4)."-0".$i.""); 
        }else {
            $month[]=date("".substr($DAY,0,4)."-".$i.""); 
        }  
    }
    $total0=0;
    $total1=0;
    $total2=0;
    $total3=0;
    $total4=0;
    $total5=0;
    $total6=0;
    $total7=0;
    $total8=0;
    $total9=0;
    $total10=0;
    $total11=0;
    foreach ($data as $value) {
     $time= substr($value['TIME'],0,7);

     if (substr($time,0,7)==$month[0]) {           
        $total0+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[1]) {           
        $total1+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[2]) {           
        $total2+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[3]) {           
        $total3+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[4]) {           
        $total4+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[5]) {           
        $total5+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[6]) {           
        $total6+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[7]) {           
        $total7+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[8]) {           
        $total8+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[9]) {           
        $total9+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[10]) {           
        $total10+=$value['TOTAL_MONEY']; 
    }
    if (substr($time,0,7)==$month[11]) {           
        $total11+=$value['TOTAL_MONEY']; 
    }
}
$valueChart= $total0.','.$total1.','.$total2.','.$total3.','.$total4.','.$total5.','.$total6.','.$total7.','.$total8.','.$total9.','.$total10.','.$total11;



           //danh sách kiếm dc theo nhân viên
$chartEM='';
$chartEC='';
$employee= new Employee();
$dataE=$employee->getAll();
foreach ($dataE as $value) {
 $dataMon= $this->model->getMoney($value['CODE']);
 $chartEM.=$dataMon.',';
 $chartEC.='"'.$value['CODE'].'",';

 $maxel[]=$dataMon; 
}
$chartEM=trim($chartEM,',');
$chartEC=trim($chartEC,',');

$ST01= $this->model->getStatus('ST01');
if ($ST01==null) {
    $total01=0; 
}else {
    $total01=0;
    foreach ($ST01 as $value) {
        $total01++;

    }

}
$ST02= $this->model->getStatus('ST02');
if ($ST02==null) {
    $total02=0; 
}else {
    $total02=0;
    foreach ($ST01 as $value) {
        $total02++;

    }

}

require_once("views/dashboard/dashboard.php");
}

public function status()
{

    $detail= new BillDetail();
    $CODE=$_GET['CODE'];   

    $details=  $detail->detailBill($CODE);
    
    $STATUS=$_GET['ST'];
    if ($STATUS=='ST03') {
        foreach ($details as $value) {
            $product=new Product();
            $product->reduceQuantity($value['PRODUCT_CODE'],$value['QUANTITY_BUY']);                
        }
    }
    $data=array();
    $data['STATUS']=$STATUS;
    $status= $this->model->update($data,$CODE);
    if($status==true){
        setcookie('status','Thay đổi trạng thái thành công',time()+5);


    }else {
        setcookie('notstatus','Thay đổi trạng thái thất bại',time()+5);
        
    }
    header('Location:?mod=bill&act=list');
}

public function statusShip()
{
    $detail= new BillDetail();
    $CODE=$_GET['CODE'];   

    $details=  $detail->detailBill($CODE);

    $STATUS=$_GET['ST'];
    $data['STATUS']=$STATUS;
    $data['CODE']=$CODE;
    $bill= $this->model->find($CODE);
    
    require_once("views/bills/ship.php");

}

public function timeShip()
{
    $CODE=$_GET['CODE'];
    $data1=$_POST;
    $data=array();
    $data['STATUS']='ST02';
    $status= $this->model->update($data,$CODE);
    $SHIP=$this->model->update($data1,$CODE);
    header('Location:?mod=bill&act=list');


}

}
?>