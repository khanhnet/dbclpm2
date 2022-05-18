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


      public function typeProduct(){
        $query = "SELECT * FROM categories ";
        $data_type=array();
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()) { 
           $data_type[]=$row;
       }
       return $data_type;


      }

      public function type($CATEGORY){
        $query = "SELECT * FROM products WHERE TYPE='".$CATEGORY."' ";
        $data_type=array();
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()) { 
           $data_type[]=$row;
       }
       return $data_type;


      }

      public function search($search){
        $query = "SELECT * FROM products WHERE NAME LIKE '%".$search."%'";
        $data_search=array();
        $result = $this->conn->query($query);
        while($row = $result->fetch_assoc()) { 
           $data_search[]=$row;
       }
       return $data_search;


      }
}


?>