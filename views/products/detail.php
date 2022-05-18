<?php 
include_once('views/layout/header.php');
 ?>
<link rel="stylesheet" type="text/css" href="public/styles/product.css">
<link rel="stylesheet" type="text/css" href="public/styles/product_responsive.css">
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(public/images/categories.jpg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Weapons<span>.</span></div>
								<div class="home_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros. Sed viverra velit venenatis fermentum luctus.</p></div>
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
						<div class="details_image_large"><img src="../admin/public/images/products/<?= $detail['PICTURE']?>" alt="">
							<?php 
                        if ($detail['PRICE']<$detail['OLD_PRICE']&&!$detail['OLD_PRICE']==null) {
                            ?>   
                           <div class="product_extra product_sale"><a href="categories.html">Sale</a></div>
                         <?php } ?>
							
						</div>
						
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name"><?=$detail['NAME'] ?></div>
						<?php 
                        if (!$detail['OLD_PRICE']==null) {
                            ?>   
                            <div class="details_discount"><?=number_format($detail['OLD_PRICE']) ?>VNĐ</div>
                         <?php } ?>
						
						<div class="details_price"><?=number_format($detail['PRICE']) ?>VNĐ</div>

						<!-- In Stock -->
						<div class="in_stock_container">
							<div class="availability">Tình trạng:</div>
							<?php 
							if ($detail['QUANTITY']>0) {
								echo '<span>Còn hàng</span>';
							}else{
								echo '<span>Hết hàng</span>';
							}

							 ?>
							
						</div>
						<div class="details_text">
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
						</div>

						<!-- Product Quantity -->
						<div class="product_quantity_container">
							<div class="button cart_button"><a href="?mod=sale&act=add2cart&CODE=<?=$detail['CODE']?>">Thêm vào giỏ</a></div>

							<div class="button cart_button"><a href="?mod=sale&act=add2cart&CODE=<?=$detail['CODE']?>">Mua ngay</a></div>
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