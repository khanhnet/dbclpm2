<?php 
include_once('views/layout/header.php');
?>
<link rel="stylesheet" type="text/css" href="public/styles/checkout.css">
<link rel="stylesheet" type="text/css" href="public/styles/checkout_responsive.css">

	<!-- Menu -->


	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(public/images/cart.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="?mod=product&act=list">Trang chủ</a></li>
										<li><a href="?mod=sale&act=cart">Mua hàng</a></li>
										<li>Thông tin</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Thông tin khách hàng</div>
						<div class="checkout_form_container">
							<form action="?mod=sale&act=checkout" method="POST" id="checkout_form" class="checkout_form">
								<div class="row">
									<div class="col-xl-12">
										<!-- Name -->
										<label for="checkout_name">Họ và tên</label>
										<input type="text" id="checkout_name" class="checkout_input" required="required" name="NAME">
									</div>
								</div>
								<div>
									<!-- Company -->
									<label for="checkout_company">Email</label>
									<input type="email" id="checkout_company" class="checkout_input" name="EMAIL">
								</div>
								<div>
									<!-- Company -->
									<label for="checkout_company">Địa chỉ</label>
									<input type="text" id="checkout_company" class="checkout_input" name="ADDRESS">
								</div>
								
								
								
	
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Số điện thoại</label>
									<input type="number" id="checkout_phone" class="checkout_input" required="required" name="MOBILE">
								</div>
								<button type="submit">Xác nhận</button>

								
								 
								
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

	
			</div>
		</div>
	</div>

	<!-- Footer -->
	
	<?php 
include_once('views/layout/footer.php');
?>
<script src="public/js/checkout.js"></script>
