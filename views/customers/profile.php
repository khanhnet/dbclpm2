<?php 
include_once('views/layout/header.php');
 ?>
 <link rel="stylesheet" type="text/css" href="public/styles/product.css">
<link rel="stylesheet" type="text/css" href="public/styles/product_responsive.css">
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="
			background-image:url(../admin/public/images/employees/<?= $detail['PICTURE']?>")></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title text-dark">Thông tin khách hàng</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<div class="product_details">
		<div class="container">
			<div class="row details_row">

				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="../admin/public/images/employees/<?= $detail['PICTURE']?>" alt=""></div>
						
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name">Tên khách hàng: <?=$detail['NAME'] ?></div>
						<div class="details_text"><p>Ngày sinh: <?=$detail['DATE'] ?></p></div>
						<div class="details_text"><p>Email: <?=$detail['EMAIL'] ?></p></div>
						<div class="details_text"><p>Số điện thoại: <?=$detail['MOBILE'] ?></p></div>
						<div class="details_text"><p>Địa chỉ: <?=$detail['ADDRESS'] ?></p></div>

						<!-- In Stock -->
						<div class="in_stock_container">
						</div>
						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<div class="button cart_button"><a href="?mod=customer&act=edit&CODE=<?=$detail['CODE']?>">Sửa thông tin cá nhân</a></div>
							<div class="button cart_button"><a href="?mod=login&act=logout">Đăng xuất</a></div>

							
						</div>

						
					</div>
				</div>
			</div>

			<div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Miêu tả</div>
						
					</div>
					<div class="description_text">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
					</div>
				</div>
			</div>
		</div>
	</div>	





<?php 
include_once('views/layout/footer.php');
 ?>
 <script src="public/js/product.js"></script>