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
									<p class="time"><i class="fa fa-clock-o"></i> <?php echo $artikel_item["artikel_time"] ?></p>
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