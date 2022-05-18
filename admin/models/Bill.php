<?php 
include_once('Model.php');
    class Bill extends Model
    {
      var $table='bills';
      var $key ='CODE';

      public function list(){
      	$query = 'SELECT b.*, c.CATEGORY_NAME FROM bills b JOIN categories c ON b.STATUS = c.CATEGORY_CODE';

        $data=array();
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()) { 
           $data[]=$row;
       }
       return $data;
      }

      public function getMoney($CODE){
        $query = "SELECT TOTAL_MONEY FROM bills WHERE EMPLOYEE_CODE='".$CODE."'";

        $data=array();
        $result = $this->conn->query($query);
         while($row = $result->fetch_assoc()) { 
           $data[]=$row;
       }
       $totalEm=0;
       foreach ($data as $value) {
        $totalEm+=$value['TOTAL_MONEY'];
      }
      return $totalEm;
       
      }

       public function getStatus($STATUS){
        $query = "SELECT b.*, c.CATEGORY_NAME FROM bills b JOIN categories c ON b.STATUS = c.CATEGORY_CODE WHERE STATUS='".$STATUS."'";

        $data=array();
        $result = $this->conn->query($query);
         while($row = $result->fetch_assoc()) { 
           $data[]=$row;
       }

      return $data;
       
      }


}

//SELECT b.*, d.BILL_CODE FROM bills b JOIN detail_bill d ON b.CODE = d.BILL_CODE 



?>