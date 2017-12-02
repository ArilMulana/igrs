<?php 
//echo print_r($get['game'][0]['logo']);
?>
	<div class="home-style2">
	<!-- list direktori -->
	<div id="list-direktori" class="latest-articles">
		
		<!-- Container -->
		<div class="container">
			<div class="row">
			
			<!-- panel kiri mulai -->
        <div class="col-md-3" >
          <form>
            <div class="form-group">
              <label for="carinamagame">Kata kunci</label>
              <input type="text" class="form-control" id="carinamagame" aria-describedby="emailHelp" placeholder="Ketikan kata kunci">
            </div>

            <div class="form-group">
              <label for="cariJenis">Jenis Pencarian</label>
              <select class="form-control" name="cariJenis" id="cariJenis">
				<option value="0"></option>
                <option value="1">Berita</option>
                <option value="2">Direktori</option>
              </select>
            </div>

            <div id="apakahBerita" class="hide">
				<div class="form-group">
	              <label for="cariberita">Kategori Berita</label>
	              <select class="form-control" id="cariberita">
					<option></option>
	                <option>Semua Berita</option>
	                <option>Game</option>
	                <option>Kebijakan</option>
	                <option>Politik</option>
	                <option>Industri Game</option>
	              </select>
	            </div>
	        </div>

	        <div id="ataukahDirektori" class="hide">

	            <div class="form-group">
	              <label for="caripenyelenggara">Penyelenggara</label>
	              <select class="form-control" id="caripenyelenggara">
					<option></option>
	                <option>Semua Penyelenggara</option>
	                <option>Agate Jogja</option>
	                <option>Digital Happiness</option>
	                <option>Agate Jogja</option>
	                <option>Digital Happiness</option>
	                <option>Agate Jogja</option>
	                <option>Digital Happiness</option>
	              </select>
	            </div>

	            <div class="form-group">
	              <label for="carigenre">Genre</label>
	              <select class="form-control" id="carigenre">
	                <option></option>
					<option>Semua Genre</option>
	                <option>Action</option>
	                <option>Shooter</option>
	                <option>Adventure</option>
	                <option>Role-playing</option>
	                <option>Strategy</option>
	                <option>Sports</option>
	              </select>
	            </div>

	            <div class="form-group">
	              <label for="cariplatform">Platform</label>
	              <select class="form-control" id="cariplatform">
	                <option></option>
					<option>Semua Platform</option>
	                <option>Android</option>
	                <option>PS3</option>
	                <option>PS4</option>
	                <option>Windows</option>
	              </select>
	            </div>

	            <div class="form-group">
	              <label for="carihasilpengujian">Hasil Pengujian</label>
	              <select class="form-control" id="carihasilpengujian">
	                <option></option>
					<option>Semua Hasil Pengujian</option>
	                <option>IGRS 3+</option>
	                <option>IGRS 7+</option>
	                <option>IGRS 13+</option>
	                <option>IGRS 18+</option>
	                <option>IGRS Semua Umur</option>
	              </select>
	            </div>

            </div>

            <button type="submit" class="btn btn-primary btn-block">Cari</button>

          </form>
        </div>
        <!-- ./panel kiri akhir -->
		
		<div class="col-md-8">
		
			<div class="row">
				
				<!-- col-md-3 -->
					<?php foreach($get['game'] as $game){?>
				<div class="col-md-4 col-sm-6">
					<div class="post-box">
						<div class="image-box">
							<img src="<?php echo base_url('assets/images/sample/dreadout.jpg')?>"/>
						</div>
						<div class="post-box-inner">							
							<div class="box-content">
							<div class="row">
								<div class="col-md-9">
									<a href="detail_applikasi.html" class="block-title">Dreadout</a>
								</div>
								<div class="col-md-3 ">
									<img src="<?php echo base_url('assets/images/sample/rate18.png')?>" width="47" height="67" class="img-responsive center-block">
								</div>
							</div>
							</div>
						</div>
					</div>
				</div><!-- Col-md-3 /- -->
					<?php }?>
				<!-- col-md-3 -->
		</div>
	
		
		<div class="row">
				<!-- col-md-3 -->
				<?php foreach($get['artikel'] as $artikel){?>
				<div class="col-md-4 col-sm-6">
					<div class="post-box">
						<div class="image-box">
							<img src="<?php if(isset($artikel['cover'])){echo 
								base_url('assets/images/Artikel').'/'.$artikel['cover'];
							}else{echo "";}?>"/>
						</div>
						<div class="post-box-inner">
									<a href="#" class="box-read-more"><img src="images/icon/arrow.png" alt="arrow" /> Read More</a>
									<div class="box-content">
										<span><?php echo $artikel['judul']?></span>
										<a href="#" class="block-title"><?php echo $artikel['slug']?> </a>
										
										<p> <?php echo substr($artikel['isi'],0,20);?> </p>
									</div>
						</div>
						
					</div>
				</div><!-- Col-md-3 /- -->		
				<?php }?>
				<!-- col-md-3 -->
				
		</div>
		
		
		</div>
				<nav>
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
				</nav>

			</div><!-- /row -->
		</div><!-- container /- -->
	</div><!-- list direktori /- -->
	</div>
	
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cariJenis').on('change', function(){       
			    if($(this).val() != 0 ){
			    	 if ($(this).val() == 1 ) {
				        $('#apakahBerita').removeClass('hide');
				        $('#ataukahDirektori').addClass('hide');      
				    }
				    
				    if ($(this).val() == 2 ) {
				        $('#apakahBerita').addClass('hide'); 
				        $('#ataukahDirektori').removeClass('hide');        
				    }
			    }else{
			    	$('#apakahBerita').addClass('hide');
			    	$('#ataukahDirektori').addClass('hide');
			    }
			})
		});
		
	</script>