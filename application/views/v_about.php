<?php 
    $site = $this->m_konfigurasi->listing();
?>
<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo ($site->namaweb)?> | Tentang kita</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="Adrian Dandi Dika " />
	<link rel="shorcut icon" type="text/css" href="<?php echo base_url('assets/upload/image/').$site->icon?>">
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/animate.css'?>">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/icomoon.css'?>">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/bootstrap.css'?>">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/flexslider.css'?>">
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url().'theme/css/style.css'?>">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url().'theme/js/modernizr-2.6.2.min.js'?>"></script>

	</head>
	<body>


	<div id="fh5co-page">
	<header id="fh5co-header" role="banner">
		<div class="container">
			<div class="header-inner">
				<h1><a href="<?php echo base_url().''?>"><?php echo ($site->namaweb)?><span>.</span></a></h1>
				<nav role="navigation">
					<ul>
						<li><a href="<?php echo base_url().''?>">Beranda</a></li>
						<li class="active"><a href="<?php echo base_url().'about'?>">Tentang Kita</a></li>
						<li><a href="<?php echo base_url().'portfolio'?>">Portfolio</a></li>
						<li><a href="<?php echo base_url().'event'?>">Pendaftaran Event</a></li>
						<li><a href="<?php echo base_url().'artikel'?>">Event</a></li>
						<li><a href="<?php echo base_url().'kontak'?>">Kontak</a></li>
						<li class="cta"><a href="<?php echo base_url().'event'?>">Daftar event</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>


	<aside id="fh5co-hero" clsas="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(<?php echo base_url().'assets/upload/image/team.png'?>);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<h2><?php echo ($site->namaweb)?></h2>
		   					<p class="fh5co-lead"> We are team <?php echo ($site->namaweb)?></p>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div class="fh5co-about animate-box">
		<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
			<h2>Tentang kita</h2>
			<p><?php echo ($site->about_us)?></p>
		</div>
		<div class="container">
			<div class="col-md-6">
				<figure>
					<img src="<?php echo base_url().'assets/upload/image/team.png'?>" alt="Free HTML5 Template" class="img-responsive">
				</figure>
			</div>
			<div class="col-md-6">
				<h3>Visi</h3>
				<ul>
					<li><?php echo ($site->visi)?>.</li>
				</ul>
				<h3>Misi</h3>
				<ul>
					<li><?php echo ($site->misi)?>.</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="fh5co-team animate-box">
		<div class="container">

				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
						<h2>Team kita</h2>
						<p>Kami memiliki tim yang solid.</p>
					</div>
					<div class="col-md-4 fh5co-staff">
						<img src="<?php echo base_url().'theme/images/18390100037.jpg'?>" alt="Free HTML5 Bootstrap Template" class="img-responsive">
						<h3>Muhammad Dhika Firmansyah</h3>
						<h4>Bagian :</h4>
						<p>Aplikasi pendaftaran event</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-google"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
					<div class="col-md-4 fh5co-staff">
						<img src="<?php echo base_url().'theme/images/18390100020.jpg'?>" alt="Free HTML5 Bootstrap Template" class="img-responsive">
						<h3>Adrian Alfauzi</h3>
						<h4>Bagian :</h4>
						<p>Aplikasi validasi event</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-google"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
					<div class="col-md-4 fh5co-staff">
						<img src="<?php echo base_url().'theme/images/18390100041.jpg'?>" alt="Free HTML5 Bootstrap Template" class="img-responsive">
						<h3>Dandi Septian Gali Pratama</h3>
						<h4>Bagian :</h4>
						<p>Aplikasi publikasi event</p>
						<ul class="fh5co-social">
							<li><a href="#"><i class="icon-google"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-instagram"></i></a></li>
						</ul>
					</div>
				</div>
		</div>
	</div>


	<?php $this->load->view('v_footer');?>
	</div>


	<!-- jQuery -->
	<script src="<?php echo base_url().'theme/js/jquery.min.js'?>"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url().'theme/js/jquery.easing.1.3.js'?>"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url().'theme/js/bootstrap.min.js'?>"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url().'theme/js/jquery.waypoints.min.js'?>"></script>
	<!-- Flexslider -->
	<script src="<?php echo base_url().'theme/js/jquery.flexslider-min.js'?>"></script>

	<!-- MAIN JS -->
	<script src="<?php echo base_url().'theme/js/main.js'?>"></script>

	</body>
</html>
