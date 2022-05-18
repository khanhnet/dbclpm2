<?php 
session_start();
include_once('../vendor/connection.php');
$CODESP=$_GET['CODESP'];

if (isset($_GET['CODESP'])) {
    $query = "SELECT * FROM products WHERE CODE='".$CODESP."'";


    // Thuc thi cau lenh truy van co so du lieu
$result = $conn->query($query);

$row= $result->fetch_assoc(); 
  $product=$row;
}
if (isset($_SESSION['cart'][$CODESP])) {
	if ($_SESSION['cart'][$CODESP]['QUANTITY']<$product['QUANTITY']) {
		
$_SESSION['cart'][$CODESP]['QUANTITY']++;
	}else {
		$product['QUANTITY'];
	}	
}else{
	$product['QUANTITY']=1;
	$_SESSION['cart'][$CODESP]=$product;
}

echo '<pre>';
print_r($_SESSION['cart']);
echo '<pre>';

//session_destroy();
header('Location: cart.php');

 ?>