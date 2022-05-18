<?php 
include_once('Model.php');
    class BillDetail extends Model
    {
      var $table='detail_bill';
      var $key ='CODE';

      public function detailBill($CODE){
      	 $query = "SELECT d.*, b.CODE FROM detail_bill d JOIN bills b   ON b.CODE = d.BILL_CODE WHERE BILL_CODE='".$CODE."'";

        $data=array();
        $result = $this->conn->query($query);
         while($row = $result->fetch_assoc()) { 
           $data[]=$row;
       }
       return $data;
      }

      
}


?>