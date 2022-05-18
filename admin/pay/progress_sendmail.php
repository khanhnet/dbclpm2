<?php
include_once('email.php');
//cấu hình thông tin do google cung cấp
$api_url     = 'https://www.google.com/recaptcha/api/siteverify';
$site_key    = '6LfPzJgUAAAAAEIov5YRTPZHCPCUarq3WvYZoi3x';
$secret_key  = '6LfPzJgUAAAAAFKkzC3krTD2tFaf-WXDMYBWQ1r2';

//kiem tra submit form
if(isset($_POST['submit']))
{
    //lấy dữ liệu được post lên
	$site_key_post    = $_POST['g-recaptcha-response'];

    //lấy IP của khach
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$remoteip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$remoteip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$remoteip = $_SERVER['REMOTE_ADDR'];
	}

    //tạo link kết nối
	$api_url = $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
	echo $api_url;
    //lấy kết quả trả về từ google
	$response = file_get_contents($api_url);
    //dữ liệu trả về dạng json
	$response = json_decode($response);
	if(!isset($response->success))
	{
		echo 'Captcha sai';
	}
	if($response->success == true)
	{
		
		$subject='ban hang';
		$email=$_POST['emailkh'];
		$name=$_POST['tenkh'];
		ob_start();
		include_once('checkout.php');
		$contents=ob_get_contents();
		ob_end_clean();
		send_email($email,$name,$contents,$subject);

	}else{
		header('Location: formkhachhang.php');
	}
}

?>

