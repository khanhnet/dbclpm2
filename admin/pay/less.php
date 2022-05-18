<?php 
session_start();
$CODESP=isset($_GET['CODESP'])?$_GET['CODESP']:'';

if ($_SESSION['cart'][$CODESP]['QUANTITY']>1) {
	$_SESSION['cart'][$CODESP]['QUANTITY']--;
}else{

unset($_SESSION['cart'][$CODESP]);
}
header('Location: cart.php');
 ?>
 