
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://www.google.com/recaptcha/api.js?hl=vi"></script>
</head>
<body>
	<div class="container ">
		<form action="progress_sendmail.php" method="POST" role="form">
		<legend>Thông tin khách hàng</legend>
	
		<div class="form-group">
			<label for="">Tên khách hàng</label>
			<input type="text" class="form-control" id="" placeholder="Input name" name="tenkh">
		</div>
		<div class="form-group">
			<label for="">Số điện thoại</label>
			<input type="number" class="form-control" id="" placeholder="Input phone number" name="sdt">
		</div>
		<div class="form-group">
			<label for="">Email</label>
			<input type="email" class="form-control" id="" placeholder="Input email" name="emailkh">
		</div>
		<div class="form-group">
			<label for="">Địa chỉ</label>
			<input type="text" class="form-control" id="" placeholder="Input address" name="dckh">
		</div>
		<div class="g-recaptcha" data-sitekey="6LfPzJgUAAAAAEIov5YRTPZHCPCUarq3WvYZoi3x"></div>
	
		
	
		 <button type="submit" name="submit" class="btn btn-primary">Submit</button> 
		</form>

		
	</div>
	<div class="text-center"><a href="cart.php" class="btn btn-primary  ">Trở lại</a></div>

</body>
</html>