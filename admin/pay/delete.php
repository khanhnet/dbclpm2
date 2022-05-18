<?php 
session_start();
$CODESP=isset($_GET['CODESP'])?$_GET['CODESP']:'';


	unset($_SESSION['cart'][$CODESP]);

header('Location: cart.php');
 ?>
 