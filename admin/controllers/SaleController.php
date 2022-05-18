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


			if (isset($_SESSION['cart'][$CODESP])) {

				if ($_SESSION['cart'][$CODESP]['QUANTITY']<$product['QUANTITY']) {
					$_SESSION['cart'][$CODESP]['QUANTITY']++;
				}else {
					$product['QUANTITY'];
					setcookie('quantity','Số lượng',time()+5);
				}
			}
			else{
				$product['QUANTITY']=1;
				$_SESSION['cart'][$CODESP]=$product;
			}	
			}else {
				setcookie('notquantity','Hết',time()+5);
			}				
	header('Location: ?mod=product&act=listProduct');
	}    
	}    


public function removeProduct(){
	$CODESP=isset($_GET['CODE'])?$_GET['CODE']:'';

if ($_SESSION['cart'][$CODESP]['QUANTITY']>1) {
	$_SESSION['cart'][$CODESP]['QUANTITY']--;
}else{

unset($_SESSION['cart'][$CODESP]);
} 
header('Location: ?mod=product&act=listProduct');  
}

public function deleteAll(){
unset($_SESSION['cart']);
header('Location: ?mod=product&act=listProduct');  
}

public function deleteProduct(){
$CODESP=isset($_GET['CODE'])?$_GET['CODE']:'';
unset($_SESSION['cart'][$CODESP]);
header('Location: ?mod=product&act=listProduct');  
}

public function payment(){
	$dataBill=$_SESSION['bill'];

	foreach ($_SESSION['cart'] as $product) {
		$prod['BILL_CODE']=$dataBill['CODE'];
		$prod['PRODUCT_CODE']=$product['CODE'];
		$prod['QUANTITY_BUY']=$product['QUANTITY'];
		$prod['PRICE']=$product['PRICE'];
		$prod['TOTAL_MONEY']=$product['PRICE']*$product['QUANTITY'];
	$detailBill= new BillDetail();
	$detailBill->create($prod);
	$product=new Product();
	 $product->reduceQuantity($prod['PRODUCT_CODE'],$prod['QUANTITY_BUY']);	
	}
	
	$statusBill= $this->model->create($dataBill);
	 if($statusBill==true){
	 	if (isset($prod)) {
	 		

		  //cấu hình thông tin do google cung cấp   
		    $subject='Netherrealm Shop';
		    $email=$_SESSION['customer']['EMAIL'];
		    $name=$_SESSION['customer']['NAME'];
		    ob_start();
		    include_once('views/content_email/checkout.php');
		    $contents=ob_get_contents();
		    ob_end_clean();
		    send_email($email,$name,$contents,$subject);

	 	}
        setcookie('bill','Tạo hóa đơn thành công',time()+5);
        header('Location:?mod=customer&act=listCustomer');
            
     }else {
            setcookie('notbill','Tạo hóa đơn thất bại',time()+5);
        header('Location:?mod=product&act=listProduct');
        }
}
public function checkBill(){
	$EMPLOYEE_CODE=$_SESSION['login']['CODE'];
	$CUSTOMER=$_SESSION['customer'];
	$CART=$_SESSION['cart'];
	$dataBill=array();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$dataBill['CODE']=$EMPLOYEE_CODE.'_'.$CUSTOMER['CODE'].'_'.time();
	$dataBill['TIME']=date('Y-m-d H:i:s');
	$dataBill['EMPLOYEE_CODE']=$EMPLOYEE_CODE;
	$dataBill['CUSTOMER_CODE']=$CUSTOMER['CODE'];
	$dataBill['STATUS']='ST03';
	$dataBill['TOTAL_MONEY']=0;
	foreach ($CART as $product) {
		$dataBill['TOTAL_MONEY']+=$product['PRICE']*$product['QUANTITY'];
	};
	$_SESSION['bill']=$dataBill;
	require_once("views/sale/sendCustomer.php");
}



}
 ?>
