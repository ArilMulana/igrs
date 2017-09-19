<style type="text/css">
.jumbotron{
	padding: 25px;
}
.biodata{
	font: bold 20px arial;
}
.contrainer{
	padding-right: 10px;
}
</style>
<div class="jumbotron">
	<div class="container">
	<div class="col-md-2">
		<div class="panel-group">
		<div class="panel panel-default">
			<div style="padding-top:35px;text-align: center;height: auto;" class="panel-heading">
				<img class="img-circle" src="<?php echo base_url()?>assets/images/footer/popular-post-3.png">
				<p><span style="font-size: 12px;" class="label label-info">Aril Mulana</span></p>
				<br>
			</div>
			<div class="panel-body">
				<ul class="nav nav-pills nav-stacked" role="tablist">
				    <li class="active"><a href="#">Profil</a></li>
				    <li><a href="#">Ubah Sandi</a></li>
				    <li><a href="#">Artikel Saya</a></li>
				    <li><a href="#">Komentar Terakhir</a></li>        
  				</ul>
			</div>
		</div>
		</div>
	</div>
	<div style="padding-left:0px;" class="col-md-10">
		<div class="panel panel-info" style="padding-top: 35px;text-align: center; background-color: #fff;height: auto;">
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
		</div>
	</div>
	</div>
</div>

<script type="text/javascript">
	var foto_profil = document.getElementById('img_profil');
	$(document).ready(function(){
		var save = document.getElementById('save');
		$(save).click(function(){
			$.ajax({
				type:"POST",
				url:base_url + "contributor/artikel/upload",
				data:{
					cover:$("#cover").val(),
					isi:$("#isi").val(),
					//kategori:$("#")
				},
				success:function(res){
					console.log('Bisa');
				}
			})
		})
	})

	})
</script>