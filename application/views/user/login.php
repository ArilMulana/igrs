<div id="single-post" class="single-post">
<div class="container">
	<div class="row">
			<!-- col-md-8 -->
		<div class="col-md-8 col-sm-6">
				<h1>Masuk</h1>
				  <?php
			          $attributes = array('id' => 'login','class' =>'form-signin');
			          echo form_open('logging', $attributes);
        		 ?>
	                <span id="reauth-email" class="reauth-email"></span>
	                <div class="form-group">
	                    <label for="email" class="cols-sm-2 control-label">Email</label>
	                    <div class="cols-sm-10">
	                        <div class="input-group">
	                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
	                            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
	                            	<?php echo form_error('email')?>
	                        </div>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="cols-sm-2 control-label">Kata Sandi</label>
	                    <div class="cols-sm-10">
	                        <div class="input-group">
	                            <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
	                            <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
	                            <?php echo form_error('pass')?>
	                        </div>
	                    </div>
	                </div>
	                
	                <div id="remember" class="checkbox">
	                    <label>
	                        <input autofocus type="checkbox" value="remember-me"> Ingat Saya
	                    </label>
	                </div>
	                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Masuk</button>
	            <?php echo form_close();?>
		</div><!-- col-md-8 /- -->
		
			<!-- col-md-4 -->
		<div class="col-md-4 col-sm-6 widget-sidebar">				
				<!-- Latest Post -->
			<aside class="widget widget_latest_post">
					<h3 class="widget-title">Related Post</h3>
					<div class="widget-inner">
						<ul class="post">
							<li>
								<div class="col-md-5 col-sm-5 col-xs-4">
									<a href="#"><img src="<?php echo base_url('assets/images/widget/widget-post-1.jpg"')?> alt="popular-post" /></a>
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
									<a href="#"><img src="<?php echo base_url('assets/images/widget/widget-post-2.jpg')?>" alt="popular-post" /></a>
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
									<a href="#"><img src="<?php echo base_url('assets/images/widget/widget-post-3.jpg')?>" alt="popular-post" /></a>
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
</div>
</div>