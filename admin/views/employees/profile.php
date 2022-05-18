<?php 
include_once('views/layout/header.php');
?>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
	body {
  background:linear-gradient(90deg, #e8e8e8 50%, #3d009e 50%);
}

.portfolio {
  padding:6%;
  text-align:center;
}

.heading {
  background:#fff;
  padding:1%;
  text-align:left;
  box-shadow:0px 0px 4px 0px #545b62;
}

.heading img {
  width:10%;
}

.bio-info {
  padding:5%;
  background:#fff;
  box-shadow:0px 0px 4px 0px #b0b3b7;
}

.name {
  font-family:'Charmonman', cursive;
  font-weight:600;
}

.bio-image {
  text-align:center;
}

.bio-image img {
  width:350px;
  height:350px;
  border-radius:50%;
}

.bio-content {
  text-align:left;
}

.bio-content p {
  font-weight:600;
  font-size:30px;
}


</style>
<div class="container portfolio">
	<div class="row">
		<div class="col-md-12">
			<div class="heading">	<img src="https://image.ibb.co/cbCMvA/logo.png" />
			</div>
		</div>	
	</div>
	<div class="bio-info">
		<div class="row">
			<div class="col-md-6">
				<div class="row">
					<div class="col-md-12">
						<div class="bio-image">
							<img src="public/images/employees/<?= $details['PICTURE'] ?>" alt="image" />
						</div>			
					</div>
				</div>	
			</div>
			<div class="col-md-6">
				<div class="bio-content">
					<h1><?= $details['NAME'] ?></h1>
					<h6>Ngày sinh:<?= $details['DATE'] ?></h6>
					<h6>Số điện thoại:<?= $details['MOBILE'] ?></h6>
					<h6>Email:<?= $details['EMAIL'] ?></h6>
					<h6>Địa chỉ:<?= $details['ADDRESS'] ?></h6>
                  
				</div>
			</div>
		</div>	
	</div>
</div>
   




<?php 
include_once('views/layout/footer.php');
?>