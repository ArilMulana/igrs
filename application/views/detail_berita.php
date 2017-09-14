<!-- Container -->
<div class="container">
	<div class="row">
		<!-- col-md-8 -->
		<div class="col-md-8 col-sm-6">
				<article>						
				<!-- blog-box -->
				<div class="blog-box">
					<div class="entry-cover">
						<a href="#"><img src="<?php echo base_url('assets/images/'.$artikel_item["cover"])?>" style="width:765px; height: 535px"></a>
					</div>
			
					<div class="blog-content">
						<h2 class="entry-title"><?php echo $artikel_item['judul']; ?></h2>
						<p class="time"><i class="fa fa-clock-o"></i><?php echo $artikel_item['artikel_time']; ?></p>
						<?php echo $artikel_item['isi']; ?>

						<div class="tags">
							<a href="#">Kemkominfo</a>
							<a href="#">AGI</a>
							<a href="#">IGRS</a>
						</div>
						<div class="blog-social blog-content-inner">
							<aside class="widget widget_social_icons">
								<h4>Share this post</h4>
								<ul class="pull-right">
									<li><a href="#" target="_blank" class="fb"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#" target="_blank" class="tw"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#" target="_blank" class="gp"><i class="fa fa-google-plus"></i></a></li>
									<li><a href="#" target="_blank" class="lin"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#" target="_blank" class="dr"><i class="fa fa-dribbble"></i></a></li>						
								</ul>
							</aside>
						</div>
						
						<div class="blog-content-inner single-post-comment">
							<!-- Section Header -->
							<div class="section-header">
								<h2>Komentar</h2>
							</div>
							<!-- Section Header /- -->
							
							<ul class="commentlist"> 
								<li>
									<div class="comment">
										<span class="comment-image">
											<img alt="avatar image" src="images/home/home4/blog/comment-1.png" class="avatar">
										</span>
										<span class="comment-info d-text-c">
											<span>10 Min ago </span>Chris Hemsworth
										</span>
										<p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper faster than lightning. No one you see is smarter than he</p>
										<a class="comment-reply-link d-text-c" href="#"><i class="fa fa-mail-reply"></i> Reply</a>
									</div>

									<ul class="children">
										<li>
											<div class="comment">
												<span class="comment-image">
													<img alt="avatar image" src="images/home/home4/blog/comment-2.png" class="avatar">
												</span>
												<span class="comment-info d-text-c">
													<span>10 Min ago </span>jEsS ben
												</span>
												<p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper faster than lightning. No one you see is smarter than he</p>
												<a class="comment-reply-link d-text-c" href="#"><i class="fa fa-mail-reply"></i> Reply</a>
											</div>
										</li>
									</ul>
								</li>
								<li>
									<div class="comment">
										<span class="comment-image">
											<img alt="avatar image" src="images/home/home4/blog/comment-3.png" class="avatar">
										</span>
										<span class="comment-info d-text-c">
											<span>10 Min ago </span>Chris evans
										</span>
										<p>They call him Flipper Flipper faster than lightning. No one you see is smarter than he. They call him Flipper Flipper faster than lightning. No one you see is smarter than he</p>
										<a class="comment-reply-link d-text-c" href="#"><i class="fa fa-mail-reply"></i> Reply</a>
									</div>
								</li>
							</ul>
						</div>
						
						<div class="comment-form">
							<!-- Section Header -->
							<div class="section-header">
								<h2>Tulis Komentar</h2>
							</div>
							<!-- Section Header /- -->
							<form action="#" method="post">
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon1"><img src="images/icon/user.png" alt="user"></span>
										<input type="text" class="form-control" placeholder="Nama *" aria-describedby="sizing-addon1" required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
										<input type="email" class="form-control" placeholder="Email *" aria-describedby="sizing-addon2" required />
									</div>
								</div>
								<div class="col-md-12">
									<div class="input-group textarea-control">
										<span class="input-group-addon" id="sizing-addon4"><i class="fa fa-pencil"></i></span>
										<textarea class="form-control " rows="6"  placeholder="Pesan"></textarea>
									</div>
								</div>
								<a href="" type="submit" class="btn btn-default pull-right">Kirim</a>
							</form>
						</div>
						
					</div>								
					
				</div><!-- blog-box /- -->
			</article>
		</div><!-- col-md-8 /- -->
	
		<!-- col-md-4 -->
		<div class="col-md-4 col-sm-6 widget-sidebar">
			
			<!-- Latest Post -->
			<aside class="widget widget_latest_post">
				<h3 class="widget-title">Berita Terkait</h3>
				<div class="widget-inner">
					<ul class="post">
						<li>
							<div class="col-md-5 col-sm-5 col-xs-4">
								<a href="#"><img src="images/widget/widget-post-1.jpg" alt="popular-post" /></a>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-8">
								<a href="#" class="post-title">where you can see our  of troubles are all </a>
								<p>
									<a href="#"><i class="fa fa-heart"></i> 33</a> 
									<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
								</p>
							</div>
						</li>
						<li>
							<div class="col-md-5 col-sm-5 col-xs-4">
								<a href="#"><img src="images/widget/widget-post-2.jpg" alt="popular-post" /></a>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-8">
								<a href="#" class="post-title">crew the Minnow would be lost the Minnow</a>
								<p>
									<a href="#"><i class="fa fa-heart"></i> 30</a> 
									<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
								</p>
							</div>
						</li>
						<li>
							<div class="col-md-5 col-sm-5 col-xs-4">
								<a href="#"><img src="images/widget/widget-post-3.jpg" alt="popular-post" /></a>
							</div>
							<div class="col-md-7 col-sm-7 col-xs-8">
								<a href="#" class="post-title">Come and listen to a story about Jed</a>
								<p>
									<a href="#"><i class="fa fa-heart"></i> 25</a> 
									<span><i class="fa fa-clock-o"></i> 1 Hour ago</span>
								</p>
							</div>
						</li>
					</ul>
				</div>
			</aside><!-- Latest Post /- -->
			
		</div><!-- col-md-4 /- -->
	</div>
</div><!-- container /- -->