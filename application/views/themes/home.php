<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	
	<title>Login</title>
		
	<link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png')?>">
    <?php
	  /** -- Copy from here -- */
	  if(!empty($meta))
	  foreach($meta as $name=>$content){
	    echo "\n\t\t";
	    ?><meta name="<?php echo $name; ?>" content="<?php echo $content; ?>" /><?php
	       }
	  echo "\n";

	  if(!empty($canonical))
	  {
	    echo "\n\t\t";
	    ?><link rel="canonical" href="<?php echo $canonical?>" /><?php
	  }
	  echo "\n\t";

	  foreach($css as $file){
	    echo "\n\t\t";
	    ?><link rel="stylesheet" href="<?php echo $file; ?>" type="text/css" /><?php
	  } echo "\n\t";

	  foreach($js as $file){
	      echo "\n\t\t";
	      ?><script src="<?php echo $file; ?>"></script><?php
	  } echo "\n\t";
	  ?>
    <style type="text/css">

	 .menu-block .navbar-default .navbar-nav > .active > a, .menu-block .navbar-default .navbar-nav > .active > a:focus, .menu-block .navbar-default .navbar-nav > .active > a:hover, .menu-block .navbar-default .navbar-nav > li > a:focus, .menu-block .navbar-default .navbar-nav > li > a:hover, .latest-update h3 {
    	background-color: #337ab7;
	}
	.menu-block .follow{
		background-color: #3f51b5;
	}
	.menu-block.follow>a:hover{
		background-color: #337ab7;
	}
	.glyphicon.glyphicon-user > li > a > span {
		padding-right: 10px;
	}
    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5/html5shiv.min.js"></script>
      <script src="js/html5/respond.min.js"></script>
    <![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    
</head>
<body data-offset="200" data-spy="scroll" data-target=".primary-navigation">
	
	<a id="top"></a>
	
	<!-- Header Section /- -->
	<header id="header" class="header">
		<!-- logo-add-block -->
		<div class="logo-add-block">
			<!-- container -->
			<div class="container">
				<div class="row">
					<div class="col-md-3 logo-block col-sm-3">
						<a href="<?php echo base_url('home')?>"><img src="<?php echo base_url('assets/images/logo.png')?>" alt="logo"></a>
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- logo-add-block /- -->

		<!-- menu-block -->
		<div class="menu-block">
			<!-- container -->
			<div class="container">
				<div class="row">
					
					<div class="col-md-12">
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a href="index.html"><img src="images/responsive-logo.png" alt="logo" /></a>
							</div>
							<div class="navbar-collapse collapse" id="navbar">
								<ul class="nav navbar-nav navbar-left">
									<li>
										<a class="nav-brand"><i class="fa fa-home"></i>
										</a>
									</li>
									<li><a href="#">Berita</a></li>
									<li><a href="about-us.html">Direktori</a></li>
									<li><a href="#">Pengaduan</a></li>
									<li><a href="#">Pertanyaan Umum</a></li>
									<li><a href="#">Hubungi Kami</a></li>
								</ul>
								<ul class="nav navbar-nav navbar-right">

									<?php 
									$sesdat = $this->session->userdata('logged_in');
									if($this->session->userdata('logged_in') == NULL){?>
									<li class="">

										<a href="<?php echo base_url('login');?>"><span class="glyphicon glyphicon-login">Login</span></a>
									</li>
									<li>
										<a><span class="glyphicon glyphicon-user">Daftar</span></a>
									</li>
									<?php }else{?>
									<li>
										<a href=""><span class="glyphicon glyphicon-user"><?php 
											if($sesdat['role'] < "6")
												{echo $sesdat['nama'];}else{
												echo $sesdat['nama_pemilik'];	
											};?></span></a>
									</li>
									<li>
										<a href="<?php echo base_url()?>logout"><span>Logout</span></a>
									</li>
									<?php }?>
								</ul>
							</div><!-- .nav-collapse /- -->
						</nav> <!-- nav /- -->
					</div>
				</div>
			</div><!-- container /- -->
		</div><!-- menu-block /- -->
	</header>
	<!-- Header Section /- -->
	
	<!-- Single Post -->
	
		<?php echo $output ?>	
		<!-- Container -->
		<!-- container /- -->
	</div><!-- Single Post /- -->
	
	<!-- Footer Section -->
	<div id="footer-section" class="footer-section">
		<!-- container -->
		<div class="container">
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_about_us">
					<h3 class="widget-title">Tentang Kami</h3>
					<p>IGRS (Indonesia Game Rating System) atau Klasifikasi Permainan Interaktif Elektronik. IGRS merupakan implemetasi peraturan Menteri Komunikasi dan Informatika Republik Indonesia nomor 11 tahun 2016 tentang Klasifikasi Permainan Interaktif Elektronik</p>
				</aside>
			</div><!-- col-md-4 /- -->
			
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_about_us">
				<h3 class="widget-title">Alamat</h3>
					<p>Kementrian Komunikasi dan Informatika</p>
					<p>Direktorat Pemberdayaan Industri Informatika</p>
					<p>Jl. Medan Merdeka Barat No. 9, Jakarta 10110</p>
					<p>021- 3451363</p>
				</aside>
			</div>
			
			<!-- col-md-4 -->
			<div class="col-md-4">
				<aside class="widget widget_about_us">
					<aside class="widget widget_social_icons">
					<h3 class="widget-title">Ikuti kami</h3>
					<ul>
						<li><a href="#" target="_blank" class="fb"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="_blank" class="tw"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="_blank" class="lin"><i class="fa fa-instagram"></i></a></li>
					</ul>
				</aside>
				</aside>
			</div>
		</div><!-- container /- -->
	</div>
	<!-- Footer Section /- -->
	
	<!-- jQuery Include -->

</body>
</html>
