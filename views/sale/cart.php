<?php 
include_once('views/layout/header.php');
include_once('public/vendor/chuyen_hoa.php');
 ?>

<link rel="stylesheet" type="text/css" href="public/styles/cart.css">
<link rel="stylesheet" type="text/css" href="public/styles/cart_responsive.css">
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
										<li>Giỏ hàng</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->
	<?php 
	if (isset($_SESSION['cart_user'])) {
	 ?>

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Sản phẩm</div>
						<div class="cart_info_col cart_info_col_price">Giá</div>
						<div class="cart_info_col cart_info_col_quantity">Số lượng</div>
						<div class="cart_info_col cart_info_col_total">Tổng</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">

				<?php 
				
				$total_money=0;
				$total=0;
				foreach ($_SESSION['cart_user'] as $value){
					$total_money+=$value['PRICE']*$value['QUANTITY'];
					$total+=$value['QUANTITY'];

				?>
					


					<!-- Cart Item -->
					<div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
							<div class="cart_item_image">
								<div><img src="../admin/public/images/products/<?= $value['PICTURE']?>" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="?mod=product&act=detail&CODE=<?= $value['CODE']?>"><?=$value['NAME'] ?></a></div>
								
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price"><?=number_format($value['PRICE']) ?></div>
						<!-- Quantity -->
						<div class="cart_item_quantity">
							<div class="product_quantity_container">
								<div class="product_quantity clearfix">
									<span>SL</span>
									<input id="quantity_input" type="text" pattern="[0-9]*" readonly="" value="<?=$value['QUANTITY'] ?>">
									<div class="quantity_buttons">
										<a id="quantity_inc_button"
										href="?mod=sale&act=add2cart&CODE=<?= $value['CODE'] ?>" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
										<a id="quantity_dec_button" href="?mod=sale&act=removeProduct&CODE=<?= $value['CODE'] ?>" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
									</div>
								</div>
								</div>
							</div>
						
						<!-- Total -->
						<div class="cart_item_total"><?=number_format($value['PRICE']*$value['QUANTITY']) ?></div>
					</div>
				<?php } 
				$_SESSION['cart']['total']=$total;

				 ?>

				</div>
			</div>
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
						<div class="button continue_shopping_button"><a href="?mod=product&act=list">Tiếp tục mua hàng</a></div>
						<div class="cart_buttons_right ml-lg-auto">
							<div class="button clear_cart_button"><a href="?mod=sale&act=deleteAll">Xóa giỏ hàng</a></div>
							
						</div>
					</div>
				</div>
			</div>
			<hr>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Tổng hóa đơn</div>
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng tiền</div>
									<div class="cart_total_value ml-auto"><?= number_format($total_money) ?></div>
								</li>
								
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Tổng tiền bằng chữ</div>
									<div class="cart_total_value ml-auto">
										<?=convert_number_to_words( $total_money ) ?></div>
								</li>
								

							</ul>
						</div>
						<div class="button checkout_button"><a href="?mod=sale&act=checkBill">Tiến hành kiểm tra</a></div>
					</div>
				</div>
			<?php }else {
				 ?>
				 <div class="text-center">
				 	<h1 class="text-center my-5">Bạn chưa chọn sản phẩm nào</h1>
				 <div class="button continue_shopping_button my-4 " style="margin: auto"><a href="?mod=product&act=list">Bắt đầu mua hàng</a></div>
				 </div>
				 
				<?php } ?>
			</div>
		</div>		
	</div>
  <?php 
include_once('views/layout/footer.php');
 ?>
<script src="public/js/cart.js"></script>
