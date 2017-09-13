	<div class="container">
		<div class="row">
			<!-- col-md-8 -->
			<div class="col-md-8">
				<h2>Developer</h2>
				<p>
					IGRS (Indonesia Game Rating System) atau Klasifikasi Permainan Interaktif Elektronik. IGRS merupakan implemetasi peraturan Menteri Komunikasi dan Informatika Republik Indonesia nomor 11 tahun 2016 tentang Klasifikasi Permainan Interaktif Elektronik</p>

				<p>	Klasifikasi Permainan Interaktif  Elektronik berdasarkan :</p>

				<p>	1. Kategori konten

					Rokok, minuman keras, dan narkotika, psikotropika dan zat adiktif lainnya;;
					Kekerasan;
					Darah, mutilasi, dan kanibalisme;
					Penggunaan bahasa;
					Penampilan tokoh;
					Seksual;
					Penyimpangan seksual;
					Simulasi judi;
					Horor; dan
					Interaksi daring (dalam jaringan).</p>
					
				<p>	2. Kelompok usia pengguna

					Kelompok usia 3+
					Kelompok usia 7+
					Kelompok usia 13+
					Kelompok usia 18+ dan
					Kelompok pengguna semua usia.</p>
			</div>
			<!-- col-md-8 /- -->
		
			<!-- col-md-4 -->
			<div class="col-md-4 col-sm-6" style="">
				<h1>MASUK</h1>
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
	                        </div>
	                        <?php echo form_error('email')?>
	                    </div>
	                </div>
	                <div class="form-group">
	                    <label for="email" class="cols-sm-2 control-label">Kata Sandi</label>
	                    <div class="cols-sm-10">
	                        <div class="input-group">
	                            <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
	                           <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
	                        </div>
	                         <?php echo form_error('pass')?>
	                    </div>
	                </div>
	                <span class="button-checkbox">
	                	<div class="col-sm-10">
		                	<div id="remember" class="checkbox">
			                    <label>
			                        <input type="checkbox" value="remember-me"> Ingat Saya
			                    </label>
			                    <a href="" class="text pull-right"><i class="fa fa-lock"></i> Lupa Kata Sandi?</a>
			                </div>
		                </div>
	                </span>
	                
	      			<div class="row">
	      			<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="daftar.html" class="btn btn-lg btn-primary btn-block">Daftar</a>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Masuk">
					</div>
				</div>
	                
	            
	            <?php echo form_close();?>
			</div><!-- col-md-4 /- -->
		</div>
	</div><!-- container /- -->
