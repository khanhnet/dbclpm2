<?php 
include_once('views/layout/header.php');
 ?>

<link rel="stylesheet" type="text/css" href="public/styles/contact.css">
<link rel="stylesheet" type="text/css" href="public/styles/contact_responsive.css">
<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(public/images/contact.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="?mod=product&act=list">Trang chủ</a></li>
										<li>Liên hệ</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">Get in Touch</div>
						<div class="section_subtitle">Say hello</div>
						<div class="contact_form_container">
							<form action="#" id="contact_form" class="contact_form">
								<div class="row">
									
									<div class="col-xl-12 last_name_col">
										<!-- Last Name -->
										<label for="contact_last_name">Họ và tên</label>
										<input type="text" id="contact_last_name" class="contact_input" required="required">
									</div>
								</div>
								<div>
									<!-- Subject -->
									<label for="contact_company">Email</label>
									<input type="text" id="contact_company" class="contact_input" name="EMAIL">
								</div>
								<div>
									<label for="contact_textarea">Tin nhắn*</label>
									<textarea id="contact_textarea" class="contact_input contact_textarea" required="required"></textarea>
								</div>
								<button class="button contact_button"><span>Gửi</span></button>
							</form>
						</div>
					</div>
				</div>

				<!-- Contact Info -->
				<div class="col-lg-3 offset-xl-1 contact_col">
					<div class="contact_info">
						<div class="contact_info_section">
							<div class="contact_info_title">Marketing</div>
							<ul>
								<li>Phone: <span>+9 581 9200</span></li>
								<li>Email: <span>khanhnet2632000@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Giao hàng và trả hàng</div>
							<ul>
								<li>Phone: <span>+9 581 9200</span></li>
								<li>Email: <span>khanhnet2632000@gmail.com</span></li>
							</ul>
						</div>
						<div class="contact_info_section">
							<div class="contact_info_title">Thông tin</div>
							<ul>
								<li>Phone: <span>+9 581 9200</span></li>
								<li>Email: <span>khanhnet2632000@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row map_row">
				<div class="col">

					<!-- Google Map -->
					<div class="map">
						<div id="google_map" class="google_map">
							<div class="map_container">
								<div id="map"></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<?php 
include_once('views/layout/footer.php');
?>
	
<script src="public/js/contact.js"></script>
