<?php 
	print_r($direktori_item);
	die();
 ?>
<!-- isi apapun dibawah ini -->

	<!-- Slider Section -->
<div id="slider-section" class="slider-section slider2">
	<!-- slider1-container -->
	<div id="slider1_container" class="slider2-container">
		<!-- Slides Container -->
		<div data-u="slides" class="slides-new">

			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="<?php echo base_url('assets/images/direktori/'.$direktori_item["logo"])?>"  style="width: 1170px;height: 508px;" alt="home 2 slide" />
									<!-- a href="#" class="add-sign-big color-green"><img src="images/icon/big-plus.png" alt="big-plus" /></a -->
								</div>
								<div class="box-content">
									<a href="#" class="block-title"><?php echo $direktori_item["nama_produk"] ?></a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- item /- -->

			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="images/sample/samplec2.jpg"  style="width: 1170px;height: 508px;" alt="home 2 slide" />
									<!-- a href="#" class="add-sign-big color-green"><img src="images/icon/big-plus.png" alt="big-plus" /></a --->
								</div>
								<div class="box-content">
									<a href="#" class="block-title"><?php echo $direktori_item["nama_produk"] ?></a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- item 2 /- -->

			<div>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="full-box-inner">
								<div class="image-box">
									<img src="images/sample/samplec3.jpg"  style="width: 1170px;height: 508px;" alt="home 2 slide" />
									<!--a href="#" class="add-sign-big color-green"><img src="images/icon/big-plus.png" alt="big-plus" /></a-->
								</div>

								<div class="box-content">
									<a href="#" class="block-title"><?php echo $direktori_item["nama_produk"] ?></a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- item 3 /- -->
		</div>

		<!-- Arrow Left -->
		<span data-u="arrowleft" class="jssora13l">
			<i class="fa fa-angle-left"></i>
		</span>
		<!-- Arrow Right -->
		<span data-u="arrowright" class="jssora13r">
			<i class="fa fa-angle-right"></i>
		</span>
	</div><!-- slider-container1 /- -->

</div>
<!-- Slider Section /- -->

<div class="home-style2">
	<!-- container -->
	<div class="container">
		<div class="row">
			<!-- col-md-8 -->
			<div class="col-md-8 col-sm-6">

				<table class="table table-striped table-bordered">
  						<tr>
  							<th width="25%">Nama Aplikasi</th>
  							<td width="75%"><?php echo $direktori_item['nama_produk']; ?></td>
  						</tr>
  						<tr>
  							<th>Nama Perusahaan/Studio</th>
  							<td><?php echo $direktori_item['nama_perusahaan']; ?></td>
  						</tr>
  						<tr>
  							<th>Genre</th>
  							<td><?php echo $direktori_item['genre']; ?></td>
  						</tr>
  						<tr>
  							<th>Tanggal Rilis</th>
  							<td><?php echo $direktori_item['tanggal_rilis']; ?></td>
  						</tr>
  						<tr>
  							<th>Versi</th>
  							<td><?php echo $direktori_item['versi']; ?></td>
  						</tr>
  						<tr>
  							<th>Tipe Pendapatan</th>
  							<td><?php echo $direktori_item['tipe_pendapatan']; ?></td>
  						</tr>
  						<tr>
  							<th>Informasi Pengemasan</th>
  							<td><?php echo $direktori_item['informasi_pengemasan']; ?></td>
  						</tr>
  						<tr>
  							<th>Fitur Game</th>
  							<td><?php echo $direktori_item['fitur_gameplay']; ?></td>
  						</tr>
  						<tr>
  							<th>Cerita</th>
  							<td><?php echo $direktori_item['cerita']; ?></td>
  						</tr>
  						<tr>
  							<th>Deskripsi</th>
  							<td><?php echo $direktori_item['deskripsi']; ?></td>
  						</tr><tr>
  							<th>Anjuran Waktu</th>
  							<td><?php echo $direktori_item['anjuran_waktu']; ?></td>
  						</tr>
  					</table>
				<form>
					<h2> Berikan ulasan anda</h2>
					<input value="4" type="text" class="rating" data-min=0 data-max=5 data-step=0.2 data-size="lg">
					<button type="button" class="btn btn-primary btn-md">Masukan</button>
					<div class="clearfix"></div>

				</form>
			</div>	<!-- col md 8 akhir -->

			<div class="col-md-4 widget-sidebar">

				<aside class="widget widget_Flicker">
					<h3 class="widget-title">Informasi umum</h3>
					<div class="widget-inner">
						<div id="widget-flicker" class="owl-carousel owl-theme">
							<div class="item">
								<a href="#">
									<img src="images/sample/dreadout.jpg" alt="flicker" />
									<span>DreadOut: Keepers of The Dark</span>
								</a>
							</div>
							<div class="item">
								<a href="#">
									<img src="images/sample/rate18.png" alt="flicker" />
									<span>HASIL PENGUJIAN: PENYELENGGARA</span>
								</a>
							</div>
							<div class="item">
								<a href="#">
									<img src="images/sample/qrcode.png" alt="flicker" />
									<span>Scan untuk mengunduh</span>
								</a>
							</div>
							<div class="item">
							<div class="author-rating">
								<a href="#">
									<i class="rating">9.2</i>
									<div class="about-skill-progres author-rating-progress">
									<div class="skill-progress-box">
										<h3 class="block-title">Topic 9.4 <span id="skill_type2_count-1" data-skill2_percent="95"></span></h3>
										<div class="progress">
											<div id="skill_bar2_count-1" class="progress-bar progress-bar-danger" role="progressbar" data-color="#3f51b5">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</div>
									<div class="skill-progress-box">
										<h3 class="block-title">content   9.0 <span id="skill_type2_count-2" data-skill2_percent="89"></span></h3>
										<div class="progress">
											<div  id="skill_bar2_count-2" class="progress-bar progress-bar-danger illustrator" role="progressbar" data-color="#d500f9">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</div>
									<div class="skill-progress-box">
										<h3 class="block-title">vocabulary   9.2 <span id="skill_type2_count-3" data-skill2_percent="80"></span></h3>
										<div class="progress">
											<div  id="skill_bar2_count-3" class="progress-bar progress-bar-danger html" role="progressbar" data-color="#4caf50">
												<span class="sr-only">60% Complete</span>
											</div>
										</div>
									</div>
								</div>
								</a>
							</div>
							</div>
						</div>
					</div>
				</aside><!-- poster logo /- -->

			</div>
		</div>
	</div>
</div>

<div class="home-style2">
<!-- Carousel game pilihan -->
<div id="gamepilihan" class="political-world-section">

	<!-- Container -->
	<div class="container">
		<div class="row">
			<div id="political-world" class="owl-carousel owl-theme">

				<div class="item">
					<div class="col-md-12">
						<div class="post-box">
							<div class="image-box">
								<img src="images/sample/dadufall.jpg" alt="political world" />
							</div>
							<div class="post-box-inner">
								<div class="box-content">
									<a href="#" class="block-title">Dadufall</a>
									<p class="time"><i class="fa fa-clock-o"></i> 1 Hour ago</p>
								</div>
							</div>
						</div>
					</div>
				</div>			

			</div>
		</div>
	</div><!-- container /- -->
</div><!-- Carousel game pilihan  -->
</div>
