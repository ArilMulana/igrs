<div class="home-style2">
<!-- Carousel game pilihan -->
<div id="gamepilihan" class="political-world-section">
	
	<!-- Container -->
	<div class="container">
		<div class="row">
			<div id="political-world" class="owl-carousel owl-theme">	
				<?php foreach ($populer as $populer_item): ?>
				<div class="item">
					<div class="col-md-12">
						<div class="post-box">
							<div class="image-box">
								<img src="<?php echo base_url('assets/images/direktori/'.$populer_item["logo"])?>" alt="political world" />
							</div>
							<div class="post-box-inner">
								<div class="box-content">
									<div class="row">
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-12">
												<a href="<?php echo site_url('direktori/'.$populer_item['slug']); ?>" class="block-title"><?php echo $populer_item["nama_produk"] ?></a>
												</div>
												<div class="col-md-12">
												<input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="2" data-readonly/>
												</div>
											</div>
										</div>
										<div class="col-md-3 ">
											<img src="images/sample/rate3.png" width="47" height="67" class="img-responsive center-block">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				
			</div>
		</div>
	</div><!-- container /- -->
</div><!-- Carousel game pilihan  -->
</div>

<div class="home-style2">
<!-- list direktori -->
<div id="list-direktori" class="latest-articles">
	
	<!-- Container -->
	<div class="container">
		<div class="row">
		
		<!-- Recent Articles -->
		<div id="recent-article" class="recent-article row">
				<!-- Section Header -->
				<div class="section-header">
					<h2>Direktori Game Terbaru</h2>
				</div>
				<!-- Section Header /- -->
			<?php foreach ($direktori as $direktori_item): ?>			
			<!-- col-md-3 -->
			<div class="col-md-3 col-sm-6">
				<div class="post-box">
					<div class="image-box">
						<img src="<?php echo base_url('assets/images/direktori/'.$direktori_item["logo"])?>"/>
					</div>
					<div class="post-box-inner">							
						<div class="box-content">
						<div class="row">
							<div class="col-md-9">
								<div class="row">
									<div class="col-md-12">
									<a href="<?php echo site_url('direktori/'.$direktori_item['slug']); ?>" class="block-title"><?php echo $direktori_item["nama_produk"] ?></a>
									</div>
									<div class="col-md-12">
									<input type="number" name="your_awesome_parameter" id="rating-readonly" class="rating" data-clearable="remove" value="2" data-readonly/>
									</div>
								</div>
							</div>
							<div class="col-md-3 ">
								<img src="<?php echo base_url('assets/images/sample/rate18.png')?>" width="47" height="67" class="img-responsive center-block">
							</div>
						</div>
					</div>
					</div>
				</div>
			</div><!-- Col-md-3 /- -->
			<?php endforeach; ?>
			<nav>
				<ul class="pagination">
					<li>
						<a href="#" aria-label="Previous">
							<span aria-hidden="true">Previous</span>
						</a>
					</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li>
						<a href="#" aria-label="Next">
							<span aria-hidden="true">Next</span>
						</a>
					</li>
				</ul>
			</nav>
		</div><!-- Recent Articles /- -->
		</div><!-- /row -->
	</div><!-- container /- -->
</div><!-- list direktori /- -->
</div>