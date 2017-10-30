
<?php 
//echo $sesdat['foto_profil'];
//echo print_r($sesdat);
		$attribute = array('id'=>'form','class'=>'form-horizontal','role'=>'form',);
		echo form_open_multipart($action,$attribute);?>
			<div class="container" style="padding-right: 50px;">
				<div class="form-group">
					<div class="row">
						<div class="col-md-5 col-md-offset-3">
							<img style="height:83px;width: 83px;" alt="foto profil" data-toggle="tooltip" title="Foto Profil" style="width: 120px;" id="gambar_profil" name=gambar_profil"" class="img-circle" src="<?php 
							if(!isset($sesdat['foto_profil'])){
								echo base_url("assets/images/footer/popular-post-3.png");	
							}else{
								echo base_url('assets/images/my_foto'.'/'.strtolower($sesdat['foto_profil']));
							}
							?>">
							<div class="col-md-11" style="padding-top: 5px;padding-right: 0px;">
								<input required data-toogle="tooltip" title="Foto Profil" type="file" name="img_profil" id="img_profil" class="form-control">
							</div>
							<div class="col-md-1" style="padding-top: 10px;">
								<p style="color: #f0ad4e;" data-toogle="tooltip" title="ukuran file max 200kb" ><span class="fa fa-info"></span></p>
							</div>
						</div>
						<?php echo form_error('img_profil');?>
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
							<input type="email" name="email" id="email" class="form-control" readonly disabled placeholder="<?php if(!isset($sesdat['email'])){
								echo "kosong";
							}else{
								echo $sesdat['email'];
							}?>">
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
							<input type="text" name="name" id="name" class="form-control" readonly disabled placeholder="<?php 
							if(!isset($sesdat['nama_contributor'])){
								echo "kosong";
							}else{
								echo $sesdat['nama_contributor'];
							}?>">
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
							<input value="<?php
							$oridate = $sesdat['tgl_lahir'];
							$newDate = date("d/m/Y",strtotime($oridate));
							
							if(!isset($sesdat['tgl_lahir']))
								{echo "";}
							else{
								echo $newDate;
							}
							?>" type="text" name="date" id="date" class="form-control" placeholder="
							
							">
						</div>
					</div>
					<?php echo form_error('date');?>
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
							<textarea rows="5" name="address" id="address" class="form-control"><?php if(!isset($sesdat['alamat'])){
									echo "";
								}else{
									echo $sesdat['alamat'];
								}?></textarea>
						</div>
					</div>
					<?php echo form_error('address');?>
				</div>
				<br>
				<?= $this->session->flashdata('pesan');?>
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

<script type="text/javascript" src="<?php echo base_url()?>assets/libraries/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/test/jquery.datetimepicker.full.js"></script>
<script type="text/javascript">

		jQuery.datetimepicker.setLocale('id');
    		jQuery('#date').datetimepicker({
	      //lang:'id',
	      	timepicker:false,
	     	datepicker:true,
	     	format:'d/m/Y',
        });

	function bacaGambar(input) {
	   if (input.files && input.files[0]) {
	      var reader = new FileReader(); 
	      var load_profil = document.getElementById('gambar_profil');
	      reader.onload = function (e) {
	          load_profil.attr('src', e.target.result);
	          //load_profil.css('height')
	      }
	 
	      reader.readAsDataURL(input.files[0]);
	   }
	}

	$("#img_profil").change(function(){
   		bacaGambar(this);
	});
</script>