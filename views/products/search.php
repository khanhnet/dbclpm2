<?php 
include_once('views/layout/header.php');
 ?>
 <link rel="stylesheet" type="text/css" href="public/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="public/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="public/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="public/styles/list.css">
<link rel="stylesheet" type="text/css" href="public/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="public/styles/responsive.css">



    <div class="home">
        <div class="home_slider_container">
            
            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">
                <?php 
                foreach ($data_search as $product) {
                    

                 ?>
                
                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(../admin/public/images/products/<?= $product['PICTURE']?>)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title"><?= $product['NAME'] ?></div>
                                        <div class="home_slider_subtitle">Giá bán:<?= number_format($product['PRICE']) ?>VNĐ</div>
                                        <div class="button  newsletter_button"><a href="?mod=product&act=detail&CODE=<?= $product['CODE'] ?>">Xem chi tiết</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
            

            </div>

            <!-- Home Slider Dots -->
            
            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <?php
                                    $i=0;
                                     foreach ($data_search as $value){
                                        $i++;
                                        ?>
                                    <li class="home_slider_custom_dot"><?=$i ?></li>
                                    <?php  }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>

        </div>
    </div>
<!-- products -->
<div class="products">

<div class="container my-5">
    <div class="row">
        <?php 
        foreach ($data_search as $product) {
         ?>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="#">
                        <img class="pic-1 " style="width: 260px;height: 350px" src="../admin/public/images/products/<?= $product['PICTURE']?>">
                        <img class="pic-2 " style="width: 260px;height: 350px" src="../admin/public/images/products/<?= $product['PICTURE']?>">
                         
                       
                    </a>
                    <ul class="social">
                        <li><a href="?mod=product&act=detail&CODE=<?= $product['CODE'] ?>" data-tip="Chi tiết"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Mua ngay"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="?mod=sale&act=add2cart&CODE=<?=$product['CODE']?>" data-tip="Thêm vào giỏ"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="?mod=sale&act=add2cart&CODE=<?=$product['CODE']?>">Thêm vào giỏ</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="?mod=product&act=detail&CODE=<?= $product['CODE'] ?>"><?= $product['NAME'] ?></a></h3>
                    <span class="price"><?= number_format($product['PRICE']) ?>VNĐ</span>
                </div>
            </div>
        </div>
        <?php } ?>
        
   
    </div>
</div>
</div>



    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">
                
                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="public/images/icon_1.svg" alt=""></div>
                        <div class="icon_box_title">Miễn phí vận chuyển toàn quốc</div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="public/images/icon_2.svg" alt=""></div>
                        <div class="icon_box_title">Miễn phí trả lại</div>
                        <div class="icon_box_text">
                           
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="public/images/icon_3.svg" alt=""></div>
                        <div class="icon_box_title">Hỗ trợ nhanh 24h</div>
                       
                    </div>
                </div>

            </div>
        </div>
    </div>


 <?php 
include_once('views/layout/footer.php');
 ?>
 <script src="public/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
 <script src="public/js/custom.js"></script>