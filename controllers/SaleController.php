<?php 

include_once("models/Bill.php");
include_once("models/BillDetail.php");
include_once("models/Customer.php");
include_once('public/vendor/email.php');
include_once("models/Product.php");
class SaleController 
{
    var $model;
    function __construct(){
        $this->model= new Bill;
    }
    public function purchase(){
		if (isset($_GET['CODE'])) {
			$CODEKH=$_GET['CODE'];
			$customer_model= new Customer;
			$customer= $customer_model->find($CODEKH);
			$_SESSION['customer']=$customer;
			header('Location: ?mod=product&act=listProduct');
		}else{
			header('Location: ?mod=customer&act=listCustomer');
		}
	}

public function add2cart(){
	if (isset($_GET['CODE'])) {
			$CODESP=$_GET['CODE'];
			$product_model= new Product;
			$product= $product_model->find($CODESP);
			if ($product['QUANTITY']>0) {


			if (isset($_SESSION['cart_user'][$CODESP])) {

				if ($_SESSION['cart_user'][$CODESP]['QUANTITY']<$product['QUANTITY']) {
					$_SESSION['cart_user'][$CODESP]['QUANTITY']++;
				}else {
					$product['QUANTITY'];
					setcookie('quantity','Số lượng',time()+5);
				}
			}
			else{
				$product['QUANTITY']=1;
				$_SESSION['cart_user'][$CODESP]=$product;
			}	
			}else {
				setcookie('notquantity','Hết',time()+5);
			}				
	header('Location: ?mod=product&act=list');
	}    
	}    

public function cart(){
	$product= new Product;
	$data_type=$product->typeProduct();

	
require_once('views/sale/cart.php');
}

public function removeProduct(){
	$CODESP=isset($_GET['CODE'])?$_GET['CODE']:'';

if ($_SESSION['cart_user'][$CODESP]['QUANTITY']>1) {
	$_SESSION['cart_user'][$CODESP]['QUANTITY']--;
}else{

unset($_SESSION['cart_user'][$CODESP]);
} 
header('Location: ?mod=sale&act=cart');  
}

public function deleteAll(){
unset($_SESSION['cart_user']);
header('Location: ?mod=sale&act=cart');  
}

public function deleteProduct(){
$CODESP=isset($_GET['CODE'])?$_GET['CODE']:'';
unset($_SESSION['cart_user'][$CODESP]);
header('Location: ?mod=sale&act=cart');  
}

public function payment(){
	$dataBill=$_SESSION['bill_user'];

	foreach ($_SESSION['cart_user'] as $product) {
		$prod['BILL_CODE']=$dataBill['CODE'];
		$prod['PRODUCT_CODE']=$product['CODE'];
		$prod['QUANTITY_BUY']=$product['QUANTITY'];
		$prod['PRICE']=$product['PRICE'];
		$prod['TOTAL_MONEY']=$product['PRICE']*$product['QUANTITY'];
	$detailBill= new BillDetail();
	$detailBill->create($prod);
	}
	$statusBill= $this->model->create($dataBill);
	 if($statusBill==true){
	 	if (isset($prod)) {
	 		

  //cấu hình thông tin do google cung cấp   
    $subject='Netherrealm';
    $email=$_SESSION['user']['EMAIL'];
    $name=$_SESSION['user']['NAME'];
    ob_start();
    include_once('views/content_email/checkout.php');
    $contents=ob_get_contents();
    ob_end_clean();
    send_email($email,$name,$contents,$subject); 	
	 	}
	 	unset($_SESSION['cart_user']);
	 	unset($_SESSION['bill_user']);
        setcookie('bill','Tạo hóa đơn thành công',time()+5);
        header('Location:?mod=product&act=list');
            
        }else {
            setcookie('notbill','Tạo hóa đơn thất bại',time()+5);
        header('Location:?mod=sale&act=checkBill');
        }
}

public function checkout(){

	$_SESSION['user']=$_POST;
	$_SESSION['user']['CODE']=$_POST['NAME'];
	header('Location:?mod=sale&act=checkBill');
	}
public function checkBill(){


	if (isset($_SESSION['user'])) {
		
	

	
	$CUSTOMER_CODE=$_SESSION['user']['CODE'];
	
	$CART=$_SESSION['cart_user'];
	$dataBill=array();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$dataBill['CODE']='ONLINE_'.$CUSTOMER_CODE.'_'.time();
	$dataBill['TIME']=date('Y-m-d H:i:s');
	$dataBill['CUSTOMER_CODE']=$CUSTOMER_CODE;
	$dataBill['EMPLOYEE_CODE']='ONLINE';
	$dataBill['STATUS']='ST01';
	$dataBill['TOTAL_MONEY']=0;
	foreach ($CART as $product) {
		$dataBill['TOTAL_MONEY']+=$product['PRICE']*$product['QUANTITY'];
	};
	$_SESSION['bill_user']=$dataBill;
	require_once("views/sale/sendCustomer.php");
}else{

	require_once('views/sale/checkout.php');

}

}



}
 ?>
