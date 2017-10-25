<!-- home2 -->
<div class="home-style2">
	<!-- container -->
	<div class="container">
		<div class="row">
			<div id="political-world" class="owl-carousel owl-theme">
				<?php foreach ($artikel as $artikel_item): ?>
				<div class="item">
					<div class="col-md-12">
						<div class="post-box">
							<div class="image-box">
								<img src="<?php echo base_url('assets/images/'.$artikel_item["cover"])?>" style="width:271px; height: 248px" /> 
							</div>
							<ul class="comments-social">
								<li><a href="#"><img src="<?php echo base_url('assets/images/icon/like-icon.png')?>" alt="like" /></a></li>
								<li class="dropdown">
									<a href="#"><img src="<?php echo base_url('assets/images/icon/more-icon.png')?>" alt="more-icon" /></a>
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Facebook</a></li>
										<li><a href="#">Twitter</a></li>
										<li><a href="#">Google</a></li>
										<li><a href="#">Linkedin</a></li>
									</ul>
								</li>
							</ul>
							<div class="post-box-inner">
								<a href="<?php echo site_url('berita/'.$artikel_item['slug']); ?>" class="box-read-more"><img src="<?php echo base_url('assets/images/icon/arrow.png')?>" alt="arrow" /> Read More</a> 
								<div class="box-content">
									<a href="#" class="block-title"><?php echo $artikel_item["judul"] ?></a>
									<p class="time"><i class="fa fa-clock-o"></i> <?php echo substr($artikel_item["artikel_time"], 0, 10) ?></p>
									<?php echo $artikel_item["isi"] ?>
									<a href="#"><i class="fa fa-heart"></i> 8</a>
									<a href="#"><img src="<?php echo base_url('assets/images/icon/comment-icon.png')?>" alt="comment" /> 13</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
		<div class="row">
			<!-- col-md-8 -->
			<div class="col-md-8 col-sm-6">	
				<div class="row">	
					<!-- col-md-4 -->
					<?php foreach ($publish as $publish_item):?>
					<div class="col-md-4">
						<div class="post-box">
							<div class="image-box">
								<img src="<?php echo base_url('assets/images/'.$publish_item["cover"])?>" style="width:243px; height: 248px"> 
							</div>
							<ul class="comments-social">
								<li><a href="#"><img src="<?php echo base_url('assets/images/icon/like-icon.png')?>" alt="like" /></a></li>
								<li class="dropdown">
									<a href="#"><img src="<?php echo base_url('assets/images/icon/more-icon.png')?>" alt="more-icon" /></a> 
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">Facebook</a></li>
										<li><a href="#">Twitter</a></li>
										<li><a href="#">Google</a></li>
										<li><a href="#">Linkedin</a></li>
									</ul>
								</li>
							</ul>
							
							<div class="post-box-inner">
								<a href="<?php echo site_url('berita/'.$publish_item['slug']); ?>" class="box-read-more"><img src="<?php echo base_url('assets/images/icon/arrow.png')?>" alt="arrow" /> Read More</a> 
								<div class="box-content">
									<span>Industri Game</span>
									<a href="#" class="block-title"><?php echo $publish_item["judul"] ?></a>
									<p class="time"><i class="fa fa-clock-o"></i> <?php echo substr($publish_item["artikel_time"], 0, 10) ?></p>
									<?php echo $publish_item["isi"] ?>
									<a href="#"><i class="fa fa-heart"></i> 8</a>
									<a href="#"><img src="images/icon/comment-icon.png" alt="comment" /> 13</a>
								</div>
							</div>
						</div>
					</div><!-- col-md-4 -->
					<?php endforeach; ?>
				</div>
								
			</div><!-- col-md-8 /- -->				
			
			<!-- col-md-4 -->
			<div class="col-md-4 col-sm-6 widget-sidebar">
				<div class="search">
					<input type="text" name="search">
					<button class="btn btn-primary" type="submit">Search</button>
				</div>
				<br>
				<!-- Latest Post -->
				<aside class="widget widget_categories">
					<h3 class="widget-title">Kategori</h3>
					<div class="widget-inner">
						<ul>
							<li class="cat-item">
								<a title="design" href="#">Game <span>(10)</span></a>
							</li>
							<li class="cat-item">
								<a title="design" href="#">Kebijakan <span>(7)</span></a>
							</li>
							<li class="cat-item">
								<a title="design" href="#">Politik <span>(9)</span></a>
							</li>
							<li class="cat-item">
								<a title="design" href="#">Industri Game <span>(15)</span></a>
							</li>
						</ul>
					</div>
				</aside><!-- Latest Post /- -->

				<!-- Latest Post -->
				<aside class="widget widget_latest_post">
					<h3 class="widget-title">latest Post</h3>
					<div class="widget-inner">
						<?php foreach (array_slice($latestpost, 0, 3) as $latestpost_item):?>
						<ul class="post">
							<li>
								<div class="col-md-5 col-sm-5 col-xs-4">
									<a href="#"><img src="<?php echo base_url('assets/images/'.$latestpost_item["cover"])?>" alt="popular-post" /></a>
								</div>
								<div class="col-md-7 col-sm-7 col-xs-8">
									<a href="<?php echo site_url('berita/'.$latestpost_item['slug']); ?>" class="post-title"><?php echo $latestpost_item["judul"] ?> </a>
									<p>
										<a href="#"><i class="fa fa-heart"></i> 33</a> 
										<span><i class="fa fa-clock-o"></i> <?php echo substr($latestpost_item["artikel_time"], 0, 10) ?></span>
									</p>
								</div>
							</li>							
						</ul>
						<?php endforeach; ?>
					</div>
				</aside><!-- Latest Post /- -->
			</div><!-- col-md-4 /- -->
		</div>
	
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
	</div><!-- Container /- -->
</div> <!-- home2 /- -->