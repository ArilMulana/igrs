<?php 
		$attribute = array('id'=>'form','class'=>'form-horizontal','role'=>'form',);
		echo form_open_multipart($action,$attribute);?>
			<div class="container" style="padding-right: 50px;">
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 col-md-offset-3">
							<img alt="foto profil" style="width: 120px;" class="img-circle" src="<?php echo base_url()?>assets/images/footer/popular-post-3.png">
							<div class="col-md-11" style="padding-top: 5px;padding-right: 0px;">
								<input data-toogle="tooltip" title="Foto Profil" type="file" name="img_profil" id="img_profil" class="form-control">
							</div>
							<div class="col-md-1" style="padding-top: 10px;">
								<p style="color: #f0ad4e;" data-toogle="tooltip" title="ukuran file max 200kb" ><span class="fa fa-info"></span></p>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div style="padding-top: 5px;" class="col-md-2">
							<label class="control-label">Alamat Email</label>
						</div>
						<div style="padding-top: 5px;" class="col-md-1">
							<label>:</label>
						</div>
						<div class="col-md-9">
							<input type="email" name="email" id="email" class="form-control" readonly disabled placeholder="arilmulana@gmail.com">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div style="padding-top: 5px;" class="col-md-2">
							<label class="control-label">Nama</label>
						</div>
						<div style="padding-top: 5px;" class="col-md-1">
							<label>:</label>
						</div>
						<div class="col-md-9">
							<input type="text" name="name" id="name" class="form-control" readonly disabled placeholder="Aril Mulana">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div style="padding-top: 5px;" class="col-md-2">
							<label class="control-label">Tanggal Lahir</label>
						</div>
						<div style="padding-top: 5px;" class="col-md-1">
							<label>:</label>
						</div>
						<div class="col-md-9">
							<input type="date" name="date" id="date" class="form-control" placeholder="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div style="padding-top: 5px;" class="col-md-2">
							<label class="control-label">Alamat</label>
						</div>
						<div style="padding-top: 5px;" class="col-md-1">
							<label>:</label>
						</div>
						<div class="col-md-9">
							<textarea style="height: 100px;" class="form-control" id="address" name="address">
							</textarea>
						</div>
					</div>
				</div>
				<br>
				<div class="form-group">
					<div class="row">
						<div class="col-md-9 col-md-offset-2">
							<button id="save" type="submit" class="btn btn-primary">Save</button>
							<a class="btn btn-danger">Cancel</a>
						</div>
					</div>
				</div>
			</div>
		<?php echo form_close();?>