<?php 
session_start();
include_once('auth/auth.php');
$mod = isset($_GET['mod'])?$_GET['mod']:'';//model đối tượng
$act = isset($_GET['act'])?$_GET['act']:'';//action hành động
$auth=new auth;

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
		case 'logout':
		$login->logout();
		break;

		default:
		header('Location:?mod=login&act=login');
		break;
	}
	break;

	// quản lí sản phẩm
	case 'product':
	$auth=$auth->check();
	require_once("controllers/ProductController.php");
	$product= new ProductController;
	switch ($act) {
		case 'list':
		$product->list();
		break;
		case 'detail':
		$product->detail();
		break;
		case 'add':
		$product->add();
		break;
		case 'store':
		$product->store();
		break;

		case 'edit':
		$product->edit();
		break;
		case 'update':
		$product->update();
		break;

		case 'delete':
		$product->delete();
		break;
		case 'listProduct':
		$product->listProduct();
		break;


		default:
		header('Location:?mod=login&act=login');
		break;
	}
	break;

		// quản lí nhân viên

	case 'employee':
	$auth=$auth->check();
	require_once("controllers/EmployeeController.php");
	$employee= new EmployeeController;
	switch ($act) {
		case 'list':
		$employee->list();
		break;

		case 'profile':
		$employee->profile();
		break;

		case 'detail':
		$employee->detail();
		break;
		case 'add':
		$employee->add();
		break;
		case 'store':
		$employee->store();
		break;

		case 'edit':
		$employee->edit();
		break;
		case 'update':
		$employee->update();
		break;
		case 'delete':
		$employee->delete();
		break;

		case 'birthday':
		$employee->birthday();
		break;
		case 'sendMailBirth':
		$employee->sendMailBirth();
		break;





		default:
		header('Location:?mod=login&act=login');
		break;
	}
	break;

		// quản lí khách hàng
	case 'customer':
	$auth=$auth->check();
	require_once("controllers/CustomerController.php");
	$customer= new CustomerController;
	switch ($act) {
		case 'list':
		$customer->list();
		break;
		case 'detail':
		$customer->detail();
		break;
		case 'add':
		$customer->add();
		break;
		case 'store':
		$customer->store();
		break;

		case 'edit':
		$customer->edit();
		break;
		case 'update':
		$customer->update();
		break;
		case 'delete':
		$customer->delete();
		break;
		case 'sendMailBirth':
		$customer->sendMailBirth();
		break;

		case 'listCustomer':
		$customer->listCustomer();
		break;

		default:
		header('Location:?mod=login&act=login');
		break;
	}
	break;
			// quản lí hóa đơn
	case 'bill':
	$auth=$auth->check();
	require_once("controllers/BillController.php");
	$bill= new BillController;
	switch ($act) {
		case 'list':
		$bill->list();
		break;
		case 'detail':
		$bill->detail();
		break;
		case 'dashboard':
		$bill->dashboard();
		break;

		case 'status':
		$bill->status();
		break;
		case 'statusShip':
		$bill->statusShip();
		break;
		case 'timeShip':
		$bill->timeShip();
		break;
		

		default:
		header('Location:?mod=login&act=login');
		break;
	}
	break;
	//quản lí bán hàng
	case 'sale':
	$auth=$auth->check();
	require_once("controllers/SaleController.php");
	$sale= new SaleController;
	switch ($act) {		
		case 'purchase':
		$sale->purchase();
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
		header('Location:?mod=login&act=login');
		break;
	}
	break;
	
	default:
	header('Location:?mod=login&act=login');
	break;
	
}
?>