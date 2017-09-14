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
							<?php foreach($komentar_item as $row){?>
								<li>
									<div class="comment">
										<span class="comment-image">
											<img alt="avatar image" src="images/home/home4/blog/comment-1.png" class="avatar">
										</span>
										<span class="comment-info d-text-c">
											<span>10 Min ago </span><?php echo $row['nama'];?>
										</span>
										<p><?= $row['comment_post'];?></p>
										<a class="comment-reply-link d-text-c" href="#"><i class="fa fa-mail-reply"></i> Reply</a>
									</div>
								</li>
								<?php }?>
								<!-- <li>
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
								</li> -->
							</ul>
						</div>
						
							<?php 
			      	  // $action = 'artikel/artikel/feedartikel';

			      	  $attribute = array('id'=>'comment','class'=>'form-horizontal','role'=>'form');
			      	  echo form_open($action,$attribute);?>
						<div class="comment-form">
							<!-- Section Header -->
							<div class="section-header">
								<h2>Tulis Komentar</h2>
							</div>
							<!-- Section Header /- -->
								<input type="hidden" id="id_artikel" name="id_artikel" value="<?php echo $artikel_item['id_artikel'];?>">			      	    
						<?php if(!isset($sesdat)){?>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
										<input id="nama" name="nama" type="text" class="form-control" placeholder="Nama *" aria-describedby="sizing-addon1" required />

									</div>
									<?php echo form_error('nama');?>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope"></i></span>
										<input id="email" type="email" name="email" class="form-control" placeholder="Email *" aria-describedby="sizing-addon2" required />
									</div>
									<?php echo form_error('email');?>
								</div>
							<?php }?>
								<div class="col-md-12">
									<div class="input-group textarea-control">
										<span class="input-group-addon" id="sizing-addon4"><i class="fa fa-pencil"></i></span>
										<textarea id="komentar" name="komentar" class="form-control " required rows="6"  placeholder="Pesan"></textarea>
									</div>
									<?php echo form_error('komentar');?>
								</div>
								<button class="btn btn-default pull-right" type="submit" id="send">Kirim</button>
						</div>
						<?php echo form_close();?>
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