<?php 
session_start();
ob_start();
include_once('auth/auth.php');
$mod = isset($_GET['mod'])?$_GET['mod']:'';//model đối tượng
$act = isset($_GET['act'])?$_GET['act']:'';//action hành động
//$auth=new auth;

switch ($mod) {

	//chức năng login
	case 'login':
	require_once("controllers/LoginController.php");
	$login= new LoginController;
	switch ($act) {

		case 'loginProcess':
		$login->loginProcess();
		break;
		case 'login':
		$login->login();
		break;
		case 'formcheck':
		$login->formcheck();
		break;
		case 'forgotPassword':
		$login->forgotPassword();
		break;
		case 'forgotProcess':
		$login->forgotProcess();
		break;
		case 'checkRandom':
		$login->checkRandom();
		break;
		case 'formUpdatePassword':
		$login->formUpdatePassword();
		break;
		case 'formUpdatePasswordProcess':
		$login->formUpdatePasswordProcess();
		break;
		case 'register':
		$login->register();
		break;
		case 'logout':
		$login->logout();
		break;

		default:
		header('Location:?mod=product&act=list');
		break;
	}
	break;

		// quản lí khách hàng
	case 'customer':
	require_once("controllers/CustomerController.php");
	$customer= new CustomerController;
	switch ($act) {
		case 'detail':
		$customer->detail();
		break;
		case 'store':
		$customer->store();
		break;

		case 'listProduct':
		$customer->listProduct();
		break;
		case 'edit':
		$customer->edit();
		break;
		case 'update':
		$customer->update();
		break;
		case 'contact':
		$customer->contact();
		break;
		default:
		header('Location:?mod=product&act=list');
		break;
	}
	break;

	case 'product':
	require_once("controllers/ProductController.php");
	$product= new ProductController;
	switch ($act) {
		case 'list':
		$product->list();
		break;

		case 'detail':
		$product->detail();
		break;
		case 'search':
		$product->search();
		break;

		default:
		header('Location:?mod=product&act=list');
		break;
	}
	break;
	
	//quản lí bán hàng
	case 'sale':
	require_once("controllers/SaleController.php");
	$sale= new SaleController;
	switch ($act) {		
		case 'purchase':
		$sale->purchase();
		break;
		case 'checkout':
		$sale->checkout();
		break;
		case 'cart':
		$sale->cart();
		break;
		case 'add2cart':
		$sale->add2cart();
		break;
		case 'removeProduct':
		$sale->removeProduct();
		break;
		case 'deleteProduct':
		$sale->deleteProduct();
		break;
		case 'deleteAll':
		$sale->deleteAll();
		break;
		case 'payment':
		$sale->payment();
		break;
		case 'checkBill':
		$sale->checkBill();
		break;

		


		default:
		header('Location:?mod=product&act=list');
		break;
	}
	break;
	
	default:
	header('Location:?mod=product&act=list');
	break;
	
}
?>