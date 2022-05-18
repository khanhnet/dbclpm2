<?php 
include_once('Model.php');
    class Login extends Model
    {
  public function check($EMAIL,$PASSWORD)
  {
    $query = "SELECT * FROM customers WHERE EMAIL='".$EMAIL."' AND PASSWORD='".$PASSWORD."'";
    $result = $this->conn->query($query);
    $check= $result->fetch_assoc();
    return $check;
  }
   public function checkEmail($EMAIL)
  {
    $query = "SELECT * FROM customers WHERE EMAIL='".$EMAIL."'";
    $result = $this->conn->query($query);
    $check= $result->fetch_assoc();
    return $check;
  }
   public function updatePassword($PASSWORD,$EMAIL)
  {
   $query = "UPDATE customers SET PASSWORD='".$PASSWORD."' WHERE EMAIL = '".$EMAIL."' ";
    $result = $this->conn->query($query);
    return $result;
  }


}
?>