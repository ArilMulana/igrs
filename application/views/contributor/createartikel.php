<style type="text/css">
.kotak{
	border-radius: 5px;
	border-style: inset;
	background-color: white;
	width: 170px;
	height: 153px;
}
</style>
<div  class="container">
<?= $this->session->flashdata('pesan');?>
		<div class="row">
			<!-- col-md-8 -->
			<div class="col-md-9">
				<div class="well well-lg">
					<section class="content">
			      <!-- Main row -->
			      <?php 
			      	  // $action = 'artikel/artikel/feedartikel';
			      	  $attribute = array('id'=>'artikel','class'=>'form-horizontal','role'=>'form');
			      	  echo form_open_multipart($action,$attribute);?>
			      	    
			      <div class="box box-info">
			        <div class="box-body">
			          <div class="alert alert-warning" role="alert">
			            <i class="fa fa-info-circle hint"></i> Ukuran Gambar Maksimal 300KB
			          </div>
			      	  <!--  -->
			      	 
			          	<div class="form-group">
			            <!--   <label for="gambar" class="col-sm-2 control-label">Gambar</label> -->
			              <div class="col-md-5 col-md-offset-5">
			                <div class="input-group input-group-sm col-md-8 clearfix">
			                	<div class="kotak">
			                  		<img data-toggle="tooltip" title="Cover Artikel" src="<?php 
							if(!isset($get['cover'])){
								echo base_url("assets/images/footer/popular-post-3.png");	
							}else{
								echo base_url('assets/images/Artikel'.'/'.strtolower($get['cover']));
							}
							?>" id="gambar_nodin" alt="Preview Cover Image" style="width: 170px;height: 153px;">
			                  	</div>
			                   <input data-toggle="tooltip" title="Input Cover Artikel" style="width: 170px;" id="cover" name="cover" required type="file" class="form-control" />
			                  <span class="label label-danger"><i>Gambar ini ditampilkan untuk cover artikel</i></span>
			                 
			                  
			                  <!-- <span class="input-group-btn">
			                    <input type="submit" value="Upload" class="btn btn-info btn-flat" />
			                  </span> -->
			                </div>
			                <?php echo form_error('cover');?>
			              </div>
			            </div>
			              
			            <div class="form-group">
			              <label for="judul" class="col-sm-2 control-label" style="text-align: center;">Judul berita <span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
			              <div class="col-sm-10">
			               <input id="judul" name="judul" type="text" maxlength="100" class="form-control" placeholder="" value="<?php if(isset($get['judul']))
			               {echo $get['judul'];}
			               else{echo "";}?>">
			               <span id="count" class="label label-info"> </span>
			               <?php echo form_error('judul');?>
			              </div>	              
			            </div>
			            <div class="form-group">
		                  <label for="inputIsi" style="text-align: center;" class="col-sm-2 control-label">Isi<span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
		                  <div class="col-sm-10">
		                    <div class="box">
		                        <textarea id="isi" name="isi" class="textarea" placeholder="" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
		                        	 <?php if(isset($get['isi'])){
		                        	 	echo $get['isi'];}else{echo "";}?>
		                        </textarea>
		                      
		                    </div>
		                   <?php echo form_error('isi')?>
		                  </div>
		                </div>
		                <div class="form-group">
		                  <label for="inputIsi" style="text-align: center;" class="col-sm-2 control-label">Kategori<span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
		                  <div class="col-sm-10">
		                    <div class="box">
		                    	<select name="cat" id="cat" class="form-control">
		                    		<option value="" <?php if(!isset($get['artikel_kategori'])){echo "selected";}?>>Pilih Kategori</option>
		                    		<option value="Edukasi" <?php 
		                    		if(isset($get['artikel_kategori'])){
		                    			if($get['artikel_kategori'] == "Edukasi"){
		                    				echo "selected";
		                    			}else{
		                    				echo"";
		                    			}
		                    		}?>>Edukasi</option>
		                    		<option value="Tips dan trick" <?php 
		                    		if(isset($get['artikel_kategori'])){
		                    			if($get['artikel_kategori'] == "Tips dan trick"){
		                    				echo "selected";
		                    			}else{
		                    				echo"";
		                    			}
		                    		}?>>Tips dan trick</option>
		                    		<option value="Keluarga" <?php 
		                    		if(isset($get['artikel_kategori'])){
		                    			if($get['artikel_kategori'] == "Keluarga"){
		                    				echo "selected";
		                    			}else{
		                    				echo"";
		                    			}
		                    		}?>>Keluarga</option>
		                    		<option value="Pendidikan" <?php 
		                    		if(isset($get['artikel_kategori'])){
		                    			if($get['artikel_kategori'] == "Pendidikan"){
		                    				echo "selected";
		                    			}else{
		                    				echo"";
		                    			}
		                    		}?>>Pendidikan</option>
		                    		<option value="Lain-lain" <?php 
		                    		if(isset($get['artikel_kategori'])){
		                    			if($get['artikel_kategori'] == "Lain-lain"){
		                    				echo "selected";
		                    			}else{
		                    				echo"";
		                    			}
		                    		}?>>Lain-lain</option>
		                    	</select>
		                        
		                    </div>
		                   <?php echo form_error('cat')?>
		                  </div>
		                </div>
			            <!-- <div class="form-group">
			              <label style="text-align: center;" for="referensi" class="col-sm-2 control-label">Referensi<span style="font-weight: bold;color: red;margin-left: 10px;">*</span></label>
			              <div class="col-sm-9">
			               <input id="refer" name="refer" type="url" class="form-control" placeholder="http://www.lalala.com">
			              </div>
			              	<a data-toogle="tooltip" title="referensi tambahan" id="add_refer" class="btn btn-primary"><span class="fa fa-plus"></span></a>
			             </div> -->
			            <!--   <div id="refer2" style="">
			             	<div class="form-group">
			              		<div class="col-sm-9 col-sm-offset-2">
			               			<input id="refer2" name="refer2" type="url" class="form-control" placeholder="http://www.lalala.com">
			              		</div>
			              			<a id="del_refer2" class="btn btn-danger"><span class="fa fa-close"></span></a>
			              			<a id="add_refer2" class="btn btn-primary"><span class="fa fa-plus"></span></a>
			              	</div>
			              </div> -->
			              <!-- <div id="refer3" style="">
			             	<div class="form-group">
			              		<div class="col-sm-9 col-sm-offset-2">
			               			<input id="refer3" name="refer3" type="url" class="form-control" placeholder="http://www.lalala.com">
			              		</div>
			              			<a id="del_refer3" class="btn btn-danger"><span class="fa fa-close"></span></a>
			              	</div>
			              </div> -->
			              <?php //echo form_error('refer');?>
			            <br><br>
			            <div class="form-group">
			            	<div class="col-md-12 text-center">
					        	<div class="box-footer form-inline">
					              <button id="save" type="submit" class="btn btn-primary">Save</button>
					           <!--   <a href="<?php base_url()?>artikel/feedartikel" class="btn btn-primary" type="submit">Save</a> -->
					              <!-- <button type="submit" class="btn btn-primary">Lihat</button> -->
					            </div>
				            </div>
			            </div>
			          <!-- </form>  -->
			   	
			        </div>
			      </div>
			      <?php echo form_close();?>
			      <!-- /.row (main row) -->
			    	</section>	
				</div>
				
			</div><!-- col-md-8 /- -->
			<div class="col-md-3">
				<div class="widget-sidebar">
					<aside class="widget widget_latest_post">
						<h3 class="widget-title">Most Popular</h3>
						<div class="widget-inner">
							<ul class="post">
								<li>
									<div class="col-md-5 col-sm-5 col-xs-4">
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-1.jpg" alt="popular-post" /></a>
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
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-2.jpg" alt="popular-post" /></a>
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
										<a href="#"><img src="<?php echo base_url()?>assets/images/widget/widget-post-3.jpg" alt="popular-post" /></a>
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
				</div>
			</div>
		</div>
</div><!-- container /- -->
<script type="text/javascript" src="<?= base_url()?>assets/libraries/jquery.min.js"></script>
<script type="text/javascript">
	var judul = document.getElementById('judul');
	var length = judul.getAttribute("maxlength");
	var count = document.getElementById('count');
	count.innerHTML = length;
	judul.onkeyup = function () {
  		document.getElementById('count').innerHTML = (length - this.value.length);
  		if(length-this.value.length <20){

  		}
	};
		tinymce.init({
  			selector: 'textarea',  // change this value according to your HTML
  			auto_focus: 'element1',
  			plugins: "image imagetools",
  			imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
  			images_upload_base_path: './assets/images'
		});	
	function bacaGambar(input) {

	   if (input.files && input.files[0]) {
	      var reader = new FileReader();
	 
	      reader.onload = function (e) {
	          $('#gambar_nodin').attr('src', e.target.result);
	      }
	 
	      reader.readAsDataURL(input.files[0]);
	   }
	}

	$("#cover").change(function(){
   		bacaGambar(this);
	});

	//post ajax
	// $(document).ready(function(){
	// 	var save = document.getElementById('save');
	// 	$(save).click(function(){
	// 		$.ajax({
	// 			type:"POST",
	// 			url:base_url + "artikel/artikel/upload",
	// 			data:{
	// 				cover:$("#cover").val(),
	// 				isi:$("#isi").val(),

	// 			}
	// 		})
	// 	})
	// })
	
</script>