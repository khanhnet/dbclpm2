<?php 
include_once('Model.php');
    class Product extends Model
    {
      var $table='products';
      var $key ='CODE';

      public function getQuantity($CODE){

      	$query = "SELECT QUANTITY FROM ".$this->table." WHERE ".$this->key."='".$CODE."'";
      	$result = $this->conn->query($query);
    	$getQuan = $result->fetch_assoc();
    	return $getQuan;
    	
      }

      
      public function reduceQuantity($CODE,$QUANTITY_BUY){
        $reQuan=$this->getQuantity($CODE)['QUANTITY'] - $QUANTITY_BUY;
        $query = "UPDATE ".$this->table." SET QUANTITY='".$reQuan."' WHERE ".$this->key."='".$CODE."'";
        $result = $this->conn->query($query);
      return $result;


      }

      public function typeProduct(){
        $query = "SELECT * FROM categories ";
        $data_type=array();
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()) { 
           $data_type[]=$row;
       }
       return $data_type;


      }
}


?>