<!-- Container -->
<div class="container">
	<div class="row">
		<!-- col-md-6 -->
		<div class="col-md-6">
				<h1>Hubungi Kami</h1>
							<form class="form-signin">
									<span id="reauth-email" class="reauth-email"></span>
									<div class="form-group">
											<label for="name" class="cols-sm-2 control-label">Nama Lengkap</label>
											<div class="cols-sm-10">
													<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
															<input type="name" class="form-control" name="name" id="inputName"  placeholder="Masukkan Nama Lengkap" required autofocus>
													</div>
											</div>
									</div>
									<div class="form-group">
											<label for="email" class="cols-sm-2 control-label">Email</label>
											<div class="cols-sm-10">
													<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
															<input type="email" id="inputEmail" class="form-control" placeholder="Masukkan Email" required>
													</div>
											</div>
									</div>
									<div class="form-group">
											<label for="telepon" class="cols-sm-2 control-label">Nomor Telepon</label>
											<div class="cols-sm-10">
													<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
															<input type="telepon" class="form-control" name="telepon" id="inputTelepon"  placeholder="Masukkan Nomor Telepon"/ required>
													</div>
											</div>
									</div>
									<div class="form-group">
											<label for="subjek" class="cols-sm-2 control-label">Subjek</label>
											<div class="cols-sm-10">
													<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
															<input type="subjek" id="inputSubjek" class="form-control" placeholder="Masukkan Subjek" required>
													</div>
											</div>
									</div>
									<div class="form-group">
											<label for="pesan" class="cols-sm-2 control-label">Pesan</label>
											<div class="cols-sm-10">
													<div class="input-group">
															<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
															<textarea type="pesan" id="inputPesan" class="form-control" placeholder="Masukkan Pesan" required></textarea>
													</div>
											</div>
									</div>
									<div class="form-group">
											<label for="captcha" class="cols-sm-2 control-label">Captcha</label>
											<div class="cols-sm-10">
												<div class="input-group">
												<img src="images/captcha.png">
												<input type="captcha" id="inputCaptcha" class="form-control" placeholder="Masukkan Captcha">
											</div>
											</div>
									</div>
									<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Kirim</button>
							</form><!-- /form -->
				</div>
		<!-- col-md-6 /- -->

		<!-- col-md-6 -->
		<div class="col-md-6">
		<!--Map -->
			<div class="map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14768.000382022743!2d70.79132657620428!3d22.27798622206572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1427300504383"></iframe>
			</div>
		<!--Map -->
		</div>
		<!-- col-md-6 /- -->
	</div>
</div><!-- container /- -->

	<script type="text/javascript">
		$(function(){
			new UISearch( document.getElementById( 'sb-search' ) );
		})
	</script>
